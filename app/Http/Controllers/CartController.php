<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Application;
use Illuminate\Support\Facades\Date;

class CartController extends Controller
{
    public function __construct() {
        $this->middleware('auth.cart');
    }

    public function index()
    {
        $user = auth()->id();
        $cartProduct = Cart::where('user_id', $user)->paginate(6);
        return view('cart.index', ['cartItems' => $cartProduct]);
    }

    public function updateQuantity(Request $request)
    {
        $request->validate([
            'quantity' => 'required|numeric|max:50|min:1'
        ],
        [
            'quantity.required' => 'Поле должно быть заполнено',
            'quantity.numeric' => 'Количество должно состоять из цифр',
            'quantity.max' => 'Количество может быть максимум 50',
            'quantity.min' => 'Количество может быть минимум 1',
        ]);

        $cartItemId = $request->input('cart_item_id');
        $newQuantity = $request->input('quantity');
        $expries = Date::now()->addRealWeeks(3);
        $cartItem = Cart::findOrFail($cartItemId);
        $cartItem->update(['quantity' => $newQuantity, 'expires_at' => $expries]);

        return redirect()->route('cart.index');
    }

    public function remove(Cart $item)
    {
        $item->delete();

        return redirect()->route('cart.index');
    }

    public function removeAll()
    {
        $user = auth()->user();
        Cart::where('user_id', $user->id)->delete();

        return redirect()->route('cart.index');
    }

    public function add(Request $request)
    {
        $user = auth()->id();
        $expries = Date::now()->addRealWeeks(3);
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');

        // Проверяем, существует ли товар с таким id
        $product = Product::find($productId);

        if (!$product) {
            return redirect()->route('home')->with('error', 'Товара не существует.');
        }

        // Проверяем, существует ли запись о товаре в корзине для текущего пользователя
        $cartItem = Cart::where('user_id', $user)->where('product_id', $productId)->first();

        if ($cartItem) {
            // Если товар уже есть в корзине, увеличиваем количество
            $cartItem->quantity += $quantity;
            $cartItem->expires_at = $expries;
            $cartItem->save();

            Cart::updated(['expires_at' => $expries]);
        } else {
            // Если товара нет в корзине, создаем новую запись
            Cart::create([
                'user_id' => $user,
                'product_id' => $productId,
                'quantity' => $quantity,
                'expires_at' => $expries,
            ]);
        }


        return redirect()->route('detail', $productId);
    }
}
