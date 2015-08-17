@extends('app')

@section('content')
 <div id="value">
<div class="container-fluid">

<ol class="breadcrumb">
  <li><a href="/">Главная</a></li>
  <li><a href="/notebooks">Ноутбуки</a></li>
  <li class="active">Просмотр модели</li>
</ol>

    <ul class="nav nav-tabs">
      <li role="presentation" {{--@if (Request::is("notebooks/$note->id/show")) --}}class="active" {{-- @endif--}}>
      <a href="/notebooks/{{$note->id}}/show" >Все о товаре</a></li>
      <li role="presentation"><a href="/notebooks/{{$note->id}}/characteristics" id="getCharacteristics">Характеристики</a></li>
      <li role="presentation"><a href="#">Фото</a></li>
      <li role="presentation" {{--@if (Request::is("notebooks/$note->id/comments")) class="active" @endif--}}>
      <a href="/notebooks/{{$note->id}}/comments" id="getComments">Отзывы <span style="color: gray;">{{$note->comments->count()}}</span></a></li>
      <li role="presentation"><a href="#">Доставка</a></li>
    </ul>

    <div class="row">
        <div class="col-lg-4 col-xs-12">

        <div class="col-lg-12" style="padding: 20px;">

         <img src="/image/note{{$note->id}}.jpg" class="img-responsive" alt="">
         </div>

        </div>
        <div class="col-lg-5  col-xs-12" style="padding-top: 20px;">

        Экран {{$note->display}}/{{$note->processor}}/RAM {{$note->ram}} ГБ/
        {{$note->video_card}}/{{$note->operationSystem()->first()->name}}/{{$note->color}}

        </div>
        <div class="col-lg-3 hidden-xs">
        <div style="padding: 15px;border-left: dashed 1px gray;">
        <strong>Доставка</strong>
        </div>

        </div>
    </div>
   </div>
</div>
@stop