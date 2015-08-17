@extends('app')

@section('content')
<div class="container-fluid">
    <div class="row">

    <ol class="breadcrumb">
      <li><a href="/">Главная</a></li>
      <li><a href="/notebooks">Ноутбуки</a></li>
      <li class="active">Корзина</li>
    </ol>
     <div class="col-lg-12 col-xs-12">

        <h1>{{ $answer or 'Корзина' }}</h1>

        <hr>
        @if(isset($cartProducts))
            @foreach( $cartProducts as $product )

              {{$product->model}}<a href="/cart/remove_product/{{$product->id}}"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
               <hr>
            @endforeach
        @endif
     </div>
    </div>
</div>



@stop