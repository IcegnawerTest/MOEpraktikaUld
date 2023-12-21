@extends('pattern.app')

@section('content')
<div class='flexFormAdd'>
<div class="mainProductAdd">
    <form action="{{ route('admin.addPost') }}" method="post">
        <H4>Добавление товара</H4>
        @csrf
        <input type="text" name="name" placeholder="Имя нового товара" required>
        @error('name')
			!{{$message}}
		@enderror

        <select id="type" name="type">
            @foreach ($type as $typ)
                <option value="{{ $typ->id }}">{{ $typ->type }}</option>
                @endforeach
        </select>

        <input type="text" name="img" placeholder="Ссылка на картинку" required>
        @error('img')
			!{{$message}}
		@enderror
        <textarea name="description" cols="100" rows="10" placeholder="Описание" required></textarea>
        @error('description')
			!{{$message}}
		@enderror
        <input type="text" name="composition" placeholder="Состав" required>
        @error('composition')
			!{{$message}}
		@enderror
        <input type="number" name="price" placeholder="Цена" required>
        @error('price')
			!{{$message}}
		@enderror
        <button>Добавить</button>
    </form>

    <form action="{{ route('admin.addTypePost') }}" method="post">
    <H4>Добавление категории</H4>
        @csrf
        <input type="text" name="type" placeholder="Имя нового типа" required>
        @error('type')
			!{{$message}}
		@enderror
        <button>Добавить</button>
    </form>
    <form action="{{ route('admin.deleteTypePost') }}" method="post">
    <H4>Удаление категории</H4>
        @csrf
        <select id="type" name="type">
            @foreach ($type as $typ)
                <option value="{{ $typ->id }}">{{ $typ->type }}</option>
            @endforeach
        </select>
        @method('DELETE')
        <button>Удалить</button>
    </form>
    <form action="{{ route('admin.updateTypePost') }}" method="post">
    <H4>Редактирование категории</H4>
        @csrf
        <select id="type" name="type">
            @foreach ($type as $typ)
                <option value="{{ $typ->id }}">{{ $typ->type }}</option>
            @endforeach
        </select>
        <input type="text" name="typeName" placeholder="Имя нового типа" required>
        @error('type')
			!{{$message}}
		@enderror
        <button>Редактировать</button>
    </form>
    {{session("error")}}
    {{session('success')}}
</div>
</div>
@endsection
