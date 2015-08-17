@extends('app')

@section('content')

<div class="container-fluid" >


<ol class="breadcrumb">
  <li><a href="/">Главная</a></li>
  <li class="active">Ноутбуки</a></li>
</ol>
<ul>


	<div class="row">
 <div class="main col-lg-12 col-md-12 col-sm-12 col-xs-12"  ng-controller="SortCtrl" >

   <!-- ANGULAR BEGIN( SortCtrl контроллер) -->
	  <div class="col-lg-2 col-md-3 hidden-xs hidden-sm" style="border-right: 2px dotted black;">
	  	<h5 style="padding-bottom: 10px;border-bottom: 1px dotted gray;"><strong>Подбор по параметрам</strong></h5>
		<div class="col-lg-12" style="padding:0px;border-bottom: 1px dotted gray;">
			  	<h5>Цена</h5>
		<div class="row">
		  <div class="col-lg-12">
           <form id="formSort" ng-submit="sortQuery();price = !price">
		    <div class="input-group">
		    <div class="col-lg-6" style="padding:0px 5px;">
		      <input type="text" class="form-control" ng-model="priceDown" name="price_down" id="price_down_input"></div>
		    <div class="col-lg-6" style="padding:0px 5px;">
		      <input type="text" class="form-control" ng-model="priceUp"  name="priceUp" id="price_up_input"></div>
		      <span class="input-group-btn">
		        <button id="addUrl" class="btn btn-default" type="submit" {{--type="button"--}} >OK</button>
		      </span>
		    </div><!-- /input-group -->
		    </form>
		  </div><!-- /.col-lg-12 -->
		</div><!-- /.row -->
		<div class="col-lg-12" style="padding:20px 0px;">
		  <div id="slider-range"></div>
		</div>
		</div>


		<div class="col-lg-12" style="padding:0px;border-bottom: 1px dotted gray;">
			  	<h5>Обьем оперативной памяти</h5>
			  	<h6>Массив - @{{ sortAttrArray }}</h6>
			  	<h6>Строка - @{{ sortAttrString }}</h6>
			  	<h6>Price - @{{ priceArray }}</h6>
		<div class="row">
		  <div class="col-lg-12">
	<div class="list-group">
  <button ng-class="{active:class.ramFour.state }"
  ng-click = " class.ramFour.value  = class.ramFour.value  + 1;
  class.ramFour.state = !class.ramFour.state;sortQuery('ram[]=0,4','ram')"
  class="list-group-item">До @{{class.ramFour.value }} ГБ</button>

  <button ng-class="{active:class.ramFourToSix.state }"
  ng-click = "class.ramFourToSix.state = !class.ramFourToSix.state;sortQuery('ram[]=4,6','ram')"
  class="list-group-item">До 4-6 ГБ</button>

  <button ng-class="{active:class.ramEightToTen.state }"
  ng-click = "class.ramEightToTen.state = !class.ramEightToTen.state;sortQuery('ram[]=8,10','ram')"
  class="list-group-item">8-10 ГБ</button>

  <button ng-class="{active:class.ramTwelve.state }"
  ng-click = "class.ramTwelve.state = !class.ramTwelve.state;sortQuery('ram[]=12,512','ram')"
  class="list-group-item">12 ГБ и больше</button>

</div>

		  </div>
		</div>
		</div>

		<div class="col-lg-12" style="padding:0px;border-bottom: 1px dotted gray;">
			  	<h5>Операционная система</h5>
			  	<h6>Массив - @{{ sortAttrArray }}</h6>
                <h6>Строка - @{{ sortAttrString }}</h6>
		<div class="row">
		  <div class="col-lg-12">

	<div class="list-group">
	@foreach($os as $value)
  <a ng-class="{active:class.os{{$value->id}}.state }" href="" class="list-group-item"
     ng-click = "class.os{{$value->id}}.state = !class.os{{$value->id}}.state;
     sortQuery('os[]={{$value->id}}','os');
     class.os{{$value->id}}.value = {{$value->id}} ;">
    {{$value->name}}
  </a>
  @endforeach
</div>

		  </div>
		</div>
	 </div>
 </div>
  <!-- ANGULAR SortCtrl END  -->


  {{--<div class="col-lg-10 col-sm-12 col-md-9 col-xs-12">
   <div class="col-lg-12" ng-repeat="notebook in sortFullData">
            <h4>@{{ notebook.id }}</h4>
            <h4>@{{ notebook.model}}</h4>
            <h4>@{{ notebook.price }}</h4>

   </div>
  </div> --}}

<div ng-class="{hidden:!angInAction}" class="col-lg-10 col-sm-12 col-md-9 col-xs-12">

	<h1 id="zagolovok">Ноутбуки</h1>
    <h2>@{{ noMatch }}</h2>

    <div class="sort_small col-sm-12 col-xs-12 hidden-lg hidden-md" style="padding:0px;">
    <ul class="nav nav-tabs">
      <li role="presentation" class="active"><a href="/notebooks/sortM/byPopular">По популярности</a></li>
      <li role="presentation"><a href="/notebooks/sortM/byPrice">Цене</a></li>
      <li role="presentation"><a href="/notebooks/sortM/byNewest">Новизне</a></li>
    </ul>
</div>


      <div ng-repeat="notebook in sortFullData" class="notebookList col-lg-3 col-md-6 col-sm-6 col-xs-12" style="border: 1px dotted gray;">

        <div class="col-lg-12 col-sm-4 col-xs-4" style="padding: 30px 0px;">
             <a href="/notebooks/@{{ notebook.id }}/show">
              <img src="/image/note@{{ notebook.id }}.jpg" class="img-responsive" alt="">
             </a>
        </div>

        <div class="col-lg-12 col-sm-8 col-xs-8">
            <h4><a href="/notebooks/@{{ notebook.id }}/show"> @{{ notebook.model }}</a></h4>
        </div>

        <div class="col-lg-6 col-sm-6 col-xs-6"><h5>@{{ notebook.price }} грн.</h5></div>
        <div class="col-lg-6 col-sm-6 col-xs-6"><h5><a href="/notebooks/@{{ notebook.id }}/comments">228 отзыва</a></h5></div>

      </div>


	  </div>

  <!-- ANGULAR BEGIN( CartAddCtrl контроллер) -->
  <div ng-class="{hidden:angInAction}" class="col-lg-10 col-sm-12 col-md-9 col-xs-12"  ng-controller="CartAddCtrl">

	<h1 id="zagolovok">Ноутбуки</h1>

    <div class="sort_small col-sm-12 col-xs-12 hidden-lg hidden-md" style="padding:0px;">
    <ul class="nav nav-tabs">
      <li role="presentation" class="active"><a href="/notebooks/sortM/byPopular">По популярности</a></li>
      <li role="presentation"><a href="/notebooks/sortM/byPrice">Цене</a></li>
      <li role="presentation"><a href="/notebooks/sortM/byNewest">Новизне</a></li>
    </ul>
</div>
<div ng-class="{hidden:angInAction}">
    @foreach($notes as $note)
      <div class="notebookList col-lg-3 col-md-6 col-sm-6 col-xs-12" style="border: 1px dotted gray;">

        <div class="col-lg-12 col-sm-4 col-xs-4" style="padding: 30px 0px;">
             <a href="/notebooks/{{$note->id}}/show">
              <img src="/image/note{{$note->id}}.jpg" class="img-responsive" alt="">
             </a>
        </div>

        <div class="col-lg-12 col-sm-8 col-xs-8">
            <h4><a href="/notebooks/{{$note->id}}/show"> {{$note->model}}</a></h4>
        </div>

        <div class="col-lg-6 col-sm-6 col-xs-6"><h5>{{$note->price}} грн.</h5></div>
        <div class="col-lg-6 col-sm-6 col-xs-6"><h5><a href="/notebooks/{{$note->id}}/comments">{{$note->comments->count()}} отзыва</a></h5></div>


        <div class="col-lg-12 col-xs-12">

               @if(Session::has('products'))

                        @foreach (array_keys(Session::get('products')) as $value)

                           @if($value === $note->id )
                          <div class="hidden">{{$count++}}</div>
                             <div id="alreadyInCart{{$note->id}}" class="row" {{-- ng-class="{hidden:visibleElement}"--}}>
                                                     <div class="col-lg-12 col-xs-12 text-center">
                                                            <div class="alert alert-success">
                                                                  <i class="fa fa-shopping-cart fa-2x"></i>
                                  <a href="/cart" style="color:#3C763D;"><ins>Товар в корзине!</ins></a>
                                                            </div>
                                                     </div>
                              </div>

                           @endif

                        @endforeach


               @endif
 @if($count === 0)

                         <div class="col-lg-12 col-xs-12" style="padding: 10px;">
                         <button id="buttonAddToCart{{$note->id}}" ng-click="countAdd({{$note->id}})"
                         ng-class="{hidden:hiddenElement}" ng-model="buttonAddToCart_{{$note->id}}"
                         type="button" class="btn btn-block btn-success">
                         <i class="fa fa-cart-plus"></i> Купить</button>
                         </div>

                     @endif
<div class="hidden">{{$count=0}}</div>
         	{{-- <p ng-repeat="cart in cartFullData">@{{ cart }}</p>--}}
        </div>
      </div>

@endforeach
</div>
    <div class="col-lg-12 col-xs-12"><p>@{{ cartFullData }}</p></div>

	  </div>
 <!-- ANGULAR CartAddCtrl END  -->


	</div>
</div>
</div>

@stop