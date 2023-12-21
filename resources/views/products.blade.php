@extends('pattern.App')

@section('title', 'Пекарня')

@section('content')

@if(session('selectedType'))
    <p>Выбрать категорию {{ session('selectedType')->type }}</p>
@endif

<div class="flexFormProduct">
<form method="post" action="{{ route('filter-product') }}" class='filterProduct'>
    @csrf
    <label for="typeSelect">Выбрать категорию:</label>
    <select id="id" name="id">
            <option value="all">Все категории</option>
        @foreach ($type as $typ)
            <option value="{{ $typ->id }}" {{$typ->id == Cookie::get("productIdFilter") ? 'selected' : ''}}>{{ $typ->type }}</option>
        @endforeach
    </select>

    <input type="radio" id="price" name="price" value="higher">
    <label for="vehicle1"> От высокой цены</label>
    <input type="radio" id="price" name="price" value="below">
    <label for="vehicle2"> От низкой цены</label>

    <button type="submit">Выбрать</button>
</form>

<div class="blockFlex">
<div class="mainProduct">
    @foreach ($products as $prd)
    <div class="productBlock">
        <td>
         <img src="{{ $prd->img }}" alt="Изображения нет">
        </td>
        <td>
        <td>Наименование:
         {{$prd->name}}
        </td>
        <td><br>
         {{$prd->description}}
        </td>
        <td>
        <a href="{{ route('detail', ['product' => $prd->id]) }}"><button>Подробнее...</button></a>
        </td>
    </div>
    @endforeach
</div>
</div>
</div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

@endsection('content')
