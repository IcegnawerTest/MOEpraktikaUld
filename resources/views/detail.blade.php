        @extends('pattern.app')

        @section('title', $product->title)
        @section('content')
        <div class="mainDetail">
            <div class="blockDetail">
        <h2>
            {{ $product->name }}
        </h2>
        <p class="img">
            <img style="max-width: 500px; max-height: 500px" src="{{ $product->img }}" alt="Изображение отсутствует">
        </p>
        <p class="description">
            Описание: {{ $product->description }}
        </p>
        <p class="coordinates">
           Состав: {{ $product->composition }}
        </p>
        <p>
            <a href="{{ route('products') }}">
                <button>Вернуться к списку</button>
            </a>

    @guest()
            Зарегистрируйтесь для заказа товара!
    @endguest
    @auth
            @php
                $productCart = 0;
            @endphp
        @foreach ($cartProduct as $cP) <!-- перебрать все товары корзины -->
            @php
            $productCartId = $cP->product_id; //Получить айди товара -->
            $productId = $product->id; //Получить айди товара страницы -->
            @endphp

            @if ($productCartId != $productId) <!-- Если айди не одинаковы, то.. -->
                @php
                $productCart = false;
                @endphp
            @else
                @php
                $productCart = true;
                @endphp
            @endif
        @endforeach

        @if ($productCart === true)
            <p>Товар в корзине</p>
            <a href="{{ route('cart.index') }}"><button>Перейти в корзину</button></a>
        @else
        <form action="{{ route('cart.add') }}" method="post">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <input min="1" max="50" type="number" name="quantity" value="1" placeholder="Кол-во" required>
            <button>Добавить в корзину</button>
        </form>
        @endif
    @endauth
        </p>
        </div>
        </div>
        @endsection('content')


