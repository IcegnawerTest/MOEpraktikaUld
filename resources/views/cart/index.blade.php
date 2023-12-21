@extends('pattern.app')

@section('content')
@if(count($cartItems) > 0)

<div class="flexFormProduct">
<div class="flexForm">
        <table>
            <tbody>
                @foreach ($cartItems as $item)
                    <tr>
                        <td><img src="{{ $item->product->img }}" alt="<Картинки нет>"></td>

                        <td>{{ $item->product->name }}</td>

                        <td>{{ $item->product->description }}</td>
                        <td>
                            <form action="{{ route('cart.updateQuantity') }}" method="post">
                                @csrf
                                <input type="hidden" name="cart_item_id" value="{{ $item->id }}">
                                <input min="1" max="50" type="number" name="quantity" value="{{ $item->quantity }}" placeholder="Кол-во" required>
                                @error('number')
			                    !{{$message}}
		                        @enderror
                                <button type="submit">Изменить кол-во</button>
                            </form>
                        </td>
                        <td><a href="{{ route('detail', ['product' => $item->product_id]) }}"><button>Подробнее</button></a>
                        <td>
                            <form action="{{ route('cart.remove',  $item->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Удалить</button>
                            </form>
                        </td>
                        <!-- Другие ячейки таблицы с информацией о продукте -->
                    </tr>
                @endforeach
            </tbody>
            <div class="paginate">{{ $cartItems->withQueryString()->links('pagination::bootstrap-5') }}</div>
        </table>
    @else
        <p>Ваша корзина пуста.</p>
    @endif

    <div class="buttonCart">
        <div class="buttonCart">
            <form action="{{ route('application.add')}}" method="post">
                @csrf
                <button>
                    Заказать
                </button>
            </form>
        </div>
        <div>
            <form action="{{ route('cart.removeAll') }}" method="post">
                @csrf
                <button>
                    Очистить корзину
                </button>
            </form>
        </div>

        <input type="hidden" value="{{$lengthArrayCart = Cookie::get('lengthArrayCart')}}"><br>
        @for ($i=1; $i < $lengthArrayCart+1; $i++)
        {{$value = Cookie::get('product'.$i)}} <br>
        @endfor

    </div>
    </div>   
</div>
@endsection
