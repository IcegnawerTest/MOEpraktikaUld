<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use Illuminate\Support\Facades\Cookie;

class ProductController extends Controller
{
    function index(){
        $products = Product::paginate(10);
        $type = Type::all();
        return view("index", ["products" =>$products, "type" => $type]);
    }

    function products() {
        $context = Product::latest()->paginate(10);
        $type = Type::all();
        return view('products', ['products' => $context, 'type' => $type]);
    }

    public function detail(Product $product) {
        $user = auth()->user();
        if (!$user) {
            return view('detail', ['product' => $product]);
        }

        $cartProduct = Cart::where('user_id', $user->id)->get();
        return view('detail', ['product' => $product, 'cartProduct' => $cartProduct]);
    }

    public function filter(Request $request){
        $id = $request->id;
        $price = $request->price;
        $productIdFilter = 'none';
        if($price == 'below')
        {
            if($id != 'all'){
            $product = Product::where('type_id', $id)->get();
            $productIdFilter = Product::where('type_id', $id)->first();
            $productIdFilter = $productIdFilter->type_id;
            $product = $product->sortBy('price');
            }
            else {
            $product = Product::all();
            $product = $product->sortBy('price');
            }
        }
        else
        {
            if($id != 'all'){
            $product = Product::where('type_id', $id)->get();
            $productIdFilter = Product::where('type_id', $id)->first();
            $productIdFilter = $productIdFilter->type_id;
            $product = $product->sortByDesc('price');
            }
            else {
            $product = Product::all();
            $product = $product->sortByDesc('price');
            }
        }
        Cookie::queue('productIdFilter', $productIdFilter, 1);
        $type = Type::all();
        return view('products', ['products' => $product, 'type' => $type, 'productIdFilter' => $productIdFilter]);
    }
}
