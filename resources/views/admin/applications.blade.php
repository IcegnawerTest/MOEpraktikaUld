@extends('pattern.app')

@section('content')

<div class="mainProductApp">
    @foreach ($user_id as $aU)
    <h4>{{ $aU->name }}:</h4>

            {!! Form::open(['url' => route('admin.appUpdate')]) !!}
            {!! Form::text('userName', $aU->name, ['class' => 'form-check-input', 'style' => 'display:none']) !!}
            {!! Form::text('userId', $aU->id, ['class' => 'form-check-input', 'style' => 'display:none']) !!}
    @foreach ($applications as $apc)
        @if ($apc->user->name == $aU->name)
        <div class="productBlock">
            <div>
                Товар:
         {{ $apc->product->name }}
         {{ $apc->created_at }}
        </div>
        <td>
                <div class="form-check">
                    {!! Form::radio($apc->id, 'accept', false, ['class' => 'form-check-input', 'id' => 'action1']) !!}
                    {!! Form::label('action1', 'Принять', ['class' => 'form-check-label']) !!}
                </div>

                <div class="form-check">
                    {!! Form::radio($apc->id, 'refuse', false, ['class' => 'form-check-input', 'id' => 'action2']) !!}
                    {!! Form::label('action2', 'Отклонить', ['class' => 'form-check-label']) !!}
                </div>

                <div class="form-check">
                    {!! Form::radio($apc->id, 'defy', true, ['class' => 'form-check-input', 'id' => 'action3']) !!}
                    {!! Form::label('action3', 'Игнорировать', ['class' => 'form-check-label']) !!}
                </div>

        </td>
    </div>
    @endif
    @endforeach

            {!! Form::submit('Подтвердить', ['class' => 'btn btn-primary button']) !!}

            {!! Form::close() !!}

    @endforeach
</div>

@endsection
