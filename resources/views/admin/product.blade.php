@extends('pattern.app')

@section('content')

<div class="blockFlexAdminProduct">
<div class="mainProductAdmin">
    <a href="{{ route('admin.add') }}" style='width: 80px'><img style='width: 80px' src="/image/Кнопка.png" alt="Нет"></a>


    @if(session('selectedType'))
    <p>Выбрать категорию {{ session('selectedType')->type }}</p>
    @endif

    <form method="post" action="{{ route('admin.filter.product') }}">
        @csrf
        <label for="typeSelect">Выбрать категорию:</label>
        <select id="id" name="id">
                <option value="all">Все категории</option>
            @foreach ($type as $typ)
                <option value="{{ $typ->id }}">{{ $typ->type }}</option>
            @endforeach
        </select>
        <button type="submit">Использовать фильтры</button>
    </form>
    @foreach ($products as $prd)
    <div class="productBlock">
        <div>
            Наименование:
         {{$prd->name}}
        </div>
        <td>
            <a href="{{ route('admin.update', ['product' => $prd->id]) }}"><button>Редактировать</button></a>
        </td>
        <td>
            <form action="{{ route('admin.remove', $prd->id) }}" method="post">
                @csrf
                @method('DELETE')
                <input type="hidden" name="id" value="{{ $prd->id }}">
                <button type="submit">Удалить</button>
            </form>
        </td>
    </div>
    @endforeach

    <div class="paginate">{{ $products->withQueryString()->links('pagination::bootstrap-5') }}</div>
    {{session("error")}}
    {{session('success')}}
</div>
</div>
@endsection
