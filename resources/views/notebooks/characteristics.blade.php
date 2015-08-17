@extends('app')

@section('content')
<div id="characteristics_ajax">
<div class="container-fluid">

<ol class="breadcrumb">
  <li><a href="/">Главная</a></li>
  <li><a href="/notebooks">Ноутбуки</a></li>
  <li class="active">Характеристики</li>
</ol>

  <ul class="nav nav-tabs">
      <li role="presentation" {{--@if (Request::is("notebooks/$note->id/show")) --}} {{-- @endif--}}>
      <a href="/notebooks/{{$note->id}}/show" >Все о товаре</a></li>
      <li role="presentation" class="active"><a href="/notebooks/{{$note->id}}/characteristics" id="getCharacteristics">Характеристики</a></li>
      <li role="presentation"><a href="#">Фото</a></li>
      <li role="presentation" {{--@if (Request::is("notebooks/$note->id/comments")) class="active" @endif--}}>
      <a href="/notebooks/{{$note->id}}/comments" id="getComments">Отзывы <span style="color: gray;">{{$note->comments->count()}}</span></a></li>
      <li role="presentation"><a href="#">Доставка</a></li>
    </ul>
<div class="col-lg-10 col-xs-12">
 <h3>Технические характеристики <span style="color: gray;">{{$note->model}}</span> </h3>

 <div class="row" style="font-size: 16px;">
     <div class="col-lg-12 col-xs-12" style="margin-bottom: 20px;padding: 0px;">
         <div class="col-lg-4 col-xs-6" style="color: gray;">
         Краткие характеристики
         </div>
         <div class="col-lg-8 col-xs-6">
         Экран {{$note->display}}/{{$note->processor}}/RAM {{$note->ram}} ГБ/
                {{$note->video_card}}/{{$note->operationSystem()->first()->name}}/{{$note->color}}
         </div>
     </div>

     <div class="col-lg-12 col-xs-12" style="margin-bottom: 20px;padding: 0px;">
         <div class="col-lg-4 col-xs-6" style="color: gray;">
              Экран
              </div>
         <div class="col-lg-8 col-xs-6">
              {{$note->display}}
         </div>
     </div>

     <div class="col-lg-12 col-xs-12" style="margin-bottom: 20px;padding: 0px;">
         <div class="col-lg-4 col-xs-6" style="color: gray;">
              Процессор
         </div>
         <div class="col-lg-8 col-xs-6">
              {{$note->processor}}
         </div>
     </div>
     <div class="col-lg-12 col-xs-12" style="margin-bottom: 20px;padding: 0px;">
         <div class="col-lg-4 col-xs-6" style="color: gray;">
             Объем оперативной памяти
         </div>
         <div class="col-lg-8 col-xs-6">
              {{$note->ram}} ГБ
         </div>
     </div>

 </div>
</div>
</div>

</div>

@stop