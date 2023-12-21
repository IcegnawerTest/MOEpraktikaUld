<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Type;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;

class AdminController extends Controller
{
    public function __construct() {
        $this->middleware('auth.cart');
    }

    public function products() {
        $user = auth()->id();
        $product = Product::where('user_id', $user)->paginate(6);
        $type = Type::all();
        return view("admin.product", ['products' => $product, 'type' => $type]);
    }

    public function filter(Request $request){
        $user = auth()->id();
        $id = $request->id;
        if($id != 'all'){
        $product = Product::where('user_id', $user)->where('type_id', $id)->paginate(6);
        }
        else {
        $product = Product::paginate(6);
        }
        $type = Type::all();
        return view('admin.product', ['products' => $product, 'type' => $type]);
    }

    public function add(){
        $type = Type::all();

        return view("admin.add", ['type' => $type]);
    }

    public function addPost(Request $request)
    {
        $request->validate([
            'name' => "required|max:100|min:2",
            'img' => "required|max:100|url",
            'description' => "required|max:1000|min:20",
            'composition' => "required|max:800|min:10",
            'price' => "required|numeric",
        ], [
            "name.required"=>"Поле обязательного заполнения",
            "img.required"=>"Поле обязательного заполнения",
            "description.required"=>"Поле обязательного заполнения",
            "composition.required"=>"Поле обязательного заполнения",
            "price.required"=>"Поле обязательного заполнения",

            "name.max"=>"Наименование должно содержать максимум 100 символов",
            "description.max"=>"Описание должно содержать максимум 1000 символов",
            "img.max"=>"Картинка может содержать максимум 60 символов",
            "composition.max"=>"Состав должен содержать максимум 800 символов",

            "name.min"=>"Наименование должно содержать минимум 2 символа",
            "description.min"=>"Описание должно содержать минимум 20 символов",
            "composition.min"=>"Состав должен содержать минимум 10 символов",

            "price.numeric"=>"Цена должна состоять только из цифр",
            "img.url"=>"В поле картинки должна быть действующая ссылка",
        ]);

        $user = auth()->id();
        $name = $request->input('name');
        $type = $request->input('type');
        $img = $request->input('img');
        $description = $request->input('description');
        $composition = $request->input('composition');
        $price = $request->input('price');

            Product::create([
                'user_id' => $user,
                'name' => $name,
                'type_id' => $type,
                'img' => $img,
                'description' => $description,
                'composition' => $composition,
                'price' => $price,
            ]);

        return redirect()->route('admin.products');
    }

    public function addTypePost(Request $request) {
        $request->validate([
            'type' => "required|max:50|min:2",
        ], [
            "type.required"=>"Поле обязательного заполнения",
            "type.max"=>"Тип может содержать максимум 800 символов",
            "type.min"=>"Тип должен содержать минимум 2 символа",
        ]);
        $type = $request->input('type');
            Type::create([
                'type' => $type,
            ]);
        return redirect()->route('admin.add');
    }

    public function remove(Request $request)
    {   $id = $request->input('id');
        try {
            // Попытка найти и удалить объект Type
            $product = Product::findOrFail($id);
            $product->delete();
            return redirect()->route('admin.products')->with('success', 'Категория успешно удалена.');
        } catch (ModelNotFoundException $e) {
            // Обработка случая, когда объект Type не найден
            return redirect()->route('admin.products')->with('error', 'Не удалось найти категорию для удаления.');
        } catch (\Exception $e) {
            // Обработка других исключений
            return redirect()->route('admin.products')->with('error', 'Произошла ошибка при удалении категории: ' . $e->getMessage());
        }

    }

    public function update(Product $product)
    {
        $user = auth()->user();
        $type = Type::all();
        $cartProduct = Product::where('user_id', $user->id)->get();
        return view('admin.update', ['product' => $product, 'cartProduct' => $cartProduct, 'type' => $type]);
    }

    public function updatePost(Request $request)
    {
        $request->validate([
            'name' => "required|max:100|min:2",
            'type' => "required",
            'img' => "required|max:100|url",
            'description' => "required|max:1000|min:20",
            'composition' => "required|max:800|min:10",
            'price' => "required|numeric",
        ], [
            "name.required"=>"Поле обязательного заполнения",
            "type.required"=>"Поле обязательного заполнения",
            "img.required"=>"Поле обязательного заполнения",
            "description.required"=>"Поле обязательного заполнения",
            "composition.required"=>"Поле обязательного заполнения",
            "price.required"=>"Поле обязательного заполнения",

            "name.max"=>"Наименование должно содержать максимум 100 символов",
            "description.max"=>"Описание должно содержать максимум 1000 символов",
            "img.max"=>"Картинка может содержать максимум 60 символов",
            "composition.max"=>"Состав должен содержать максимум 800 символов",

            "name.min"=>"Наименование должно содержать минимум 2 символа",
            "description.min"=>"Описание должно содержать минимум 20 символов",
            "composition.min"=>"Состав должен содержать минимум 10 символов",

            "price.numeric"=>"Цена должна состоять только из цифр",
            "img.url"=>"В поле картинки должна быть действующая ссылка",
        ]);

        $id = $request->input('product_id');
        $name = $request->input('name');
        $type = $request->input('type');
        $img = $request->input('img');
        $description = $request->input('description');
        $composition = $request->input('composition');
        $price = $request->input('price');

        $cartItem = Product::findOrFail($id);
        $cartItem->update(['name' => $name, 'type_id' => $type, 'img' => $img, 'description' => $description, 'composition' => $composition, 'price' => $price]);

        return redirect()->route('admin.products');
    }

    public function deleteTypePost(Request $request){
        $id = $request->input('type');

        try {
            // Попытка найти и удалить объект Type
            $type = Type::findOrFail($id);
            $type->delete();

            return redirect()->route('admin.add')->with('success', 'Категория успешно удалена.');
        } catch (ModelNotFoundException $e) {
            // Обработка случая, когда объект Type не найден
            return redirect()->route('admin.add')->with('error', 'Не удалось найти категорию для удаления.');
        } catch (\Exception $e) {
            // Обработка других исключений
            return redirect()->route('admin.add')->with('error', 'Произошла ошибка при удалении категории: ' . $e->getMessage());
        }
    }

    public function updateTypePost(Request $request){
        $id = $request->input('type');
        $appUserName = $request->input('typeName');
        $Type = Type::findOrFail($id);
        $Type->update(['type' => $appUserName]);
        return redirect()->route('admin.add');
    }
}
