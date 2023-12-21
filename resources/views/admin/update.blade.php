@extends('pattern.app')

@section('content')
<div class="flexFormUpdate">
<div class="mainProductAdd">
    <form action="{{ route('admin.updatePost') }}" method="post">
        @csrf
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <input type="text" value="{{ $product->name }}" name="name" placeholder="Имя" required>
        @error('name')
			!{{$message}}
		@enderror

        <select id="type" name="type">
            @foreach ($type as $typ)
                <option value="{{ $typ->id }}" {{$typ->id == $product->type_id ? 'selected' : ''}}>{{ $typ->type }}</option>
            @endforeach
        </select>
        @error('type')
        !{{$message}}
        @enderror

        <input type="text" value="{{ $product->img }}" name="img" placeholder="Ссылка на картинку" required>
        @error('img')
			!{{$message}}
		@enderror
        <textarea name="description" cols="100" rows="10" placeholder="Описание" required>{{ $product->description }}</textarea>
        @error('description')
			!{{$message}}
		@enderror
        <input type="text" name="composition" value="{{ $product->composition }}" placeholder="Состав" required>
        @error('composition')
			!{{$message}}
		@enderror
        <input type="number" name="price" value="{{ $product->price }}" placeholder="Цена" required>
        @error('price')
			!{{$message}}
		@enderror
        <button>Изменить</button>
    </form>
</div>
</div>
@endsection
