<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Application;
use Illuminate\Support\Facades\Cookie;

class ApplicationController extends Controller
{
    public function applications(){
            $appUser = application::with(['user', 'product'])->get()->pluck('user')->unique();

            $user_id = [];
        foreach($appUser as $aU){
            $user_id[] = $aU;
        }
            $applications = application::where('status', 'Отправлено')->get();

        return view("admin.applications", compact('applications', 'user_id'));
    }

    public function add()
    {
        $lengthArrayCart=0;
        $user = auth()->id();
        $cartProduct = Cart::where('user_id', $user)->get(); //Взять все айди продукции !КОРЗИНЫ! в БД

        foreach($cartProduct as $cP){
        $lengthArrayCart++;
        $result = application::create([
            'user_id' => $cP->user_id,
            'product_id' => $cP->product_id,
            'quantity' => $cP->quantity,
            'status' => 'Отправлено',
        ]);

        if ($result) {
            $valueCookie = Product::where('id', $cP->product_id)->first(); //По айди взять имя продукта
            Cookie::queue('product'.$lengthArrayCart, "Заказ на продукт: '".$valueCookie->name."' с индификатором: '".$valueCookie->id."' прошел успешно :)", 1); //Куки меняющий свое имя от длины массива

            Cart::where('user_id', $user)->where('product_id', $valueCookie->id)->delete();
        }
        else {
            $valueCookie = Product::where('id', $cP->product_id)->first(); //По айди взять имя продукта
            Cookie::queue('product'.$lengthArrayCart, "Заказ на продукт: '".$valueCookie->name."' с индификатором: '".$valueCookie->id."' не прошел :(", 1); //Куки меняющий свое имя от длины массива
        }
        }
        Cookie::queue('lengthArrayCart', $lengthArrayCart, 2, '/'); //Куки для длины массива корзины
        return redirect()->route('cart.index');
    }

    public function appUpdate(Request $request) {
        $appUserName = $request->input('userName');
        $appUserId = $request->input('userId');

        $applications = application::where('user_id', $appUserId)->get();
        foreach($applications as $app){
            $app->id;
            $appInputId = $request->input($app->id);
            $update = application::findOrFail($app->id);
            if ($appInputId == 'accept') {
                $update -> update(['status' => 'Принято']);
            }
            elseif ($appInputId == 'refuse') {
                $update -> update(['status' => 'Отклонено']);
            }
            else {

            }
        }
        return redirect()->route('admin.applications');
    }
}
