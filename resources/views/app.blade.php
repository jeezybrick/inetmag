<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Inet-magaz 2015">
    <meta name="author" content="Stacenko Andrey">
    <meta name="csrf-token" id="token" content="{{ csrf_token() }}">
    <title>Интернет-магазин </title>
    <link rel="shortcut icon" href="">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/font-awesome.min.css">

    <style>
        body {
            padding-top: 50px;
        }
        
        .starter-template {
            padding: 40px 15px;
            text-align: center;
        }
    </style>




    <!--[if IE]>
        <script src="https://cdn.jsdelivr.net/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://cdn.jsdelivr.net/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body ng-app="countryApp">
    <div class="container-fluid" style="padding-left:0px;padding-right:0px;">
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle pull-left" data-toggle="collapse" data-target="#navbar-collapse" style="margin-left:15px;">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="/cart" class="hidden-lg hidden-md hidden-sm">
                     <i class="fa fa-shopping-cart fa-3x " style="float:right;margin-right:15px;margin-top:4px;"></i>
                    </a>
                    <a href="#" class="hidden-lg hidden-md hidden-sm">
                      <i class="fa fa-heart-o fa-3x" style="float:right;margin-right:15px;margin-top:4px;"></i>
                    </a>
                       <div class="dropdown pull-right">
                                              <a href="#" class="dropdown-toggle hidden-lg hidden-md hidden-sm" data-toggle="dropdown" role="button" aria-expanded="false">
                                              <i class="fa fa-user fa-3x" style="float:right;margin-right:15px;margin-top:4px;"></i>
                                         </a>
                                              <ul class="dropdown-menu" role="menu">
                                                 <li><a href="/user">Личные данные</a>
                                                 </li>
                                                 <li><a href="/user/orders">Мои заказы</a>
                                                 </li>
                                                 <li class="active"><a href="/auth/logout">Выйти</a>
                                                 </li>
                                               </ul>
                       </div>

                </div>

                <div class="collapse navbar-collapse" id="navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="#" data-toggle="tooltip" data-placement="bottom" title="Выбрать способ и стоимость доставки"><i class="fa fa-truck"></i>
Доставка</a>
                        </li>
                        <li><a href="#about"><i class="fa fa-money"></i> Оплата</a>
                        </li>
                        <li><a href="#contact"><i class="fa fa-info"></i>
О магазине</a>
                        </li>
                        <li><a href="#contact"><i class="fa fa-paper-plane"></i>
Пункты выдачи</a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                      <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-credit-card"></i>
                    Грн.нал. <span class="caret"></span></a>
                           <ul class="dropdown-menu" role="menu">
                               <li><a href="#">Безнал./Кредит</a>
                               </li>
                              <li><a href="#">Webmoney</a>
                              </li>
                           </ul>
                       </li>
                      @if (Auth::guest())
                        <li class="navbar-right"><a href="/auth/login"><i class="fa fa-sign-in"></i>
Войти в кабинет</a>
                        </li>
                        @else
                          <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <i class="fa fa-user"></i>
                        {{Auth::user()->name}} <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                 <li><a href="/user">Личные данные</a>
                                   </li>
                                    <li><a href="/user/orders">Мои заказы</a>
                                   </li>
                                   <li class="active"><a href="/auth/logout">Выйти</a>
                                  </li>
                              </ul>
                         </li>
                        @endif

                    </ul>

                </div>
                <!--.nav-collapse -->
            </div>
        </nav>
        <div class="headd" style="height:110px;">
            <div class="container-fluid">
                <div class="row" style="border-bottom: 2px;">
                    <div class="top_name col-lg-3 col-md-3 col-sm-4 col-xs-12 text-center">
                        <a href="/"><img src="/image/f_ua_top_logo.png" alt=""></a>
                    </div>
                    <!-- Поиск для lg,md,sm  -->
                     <div  ng-controller="SearchCtrl">
                       <div class="image_top col-lg-6  col-md-5 col-sm-8  hidden-xs" style="margin-top:35px;">
                        <div class="input-group">
                              <!-- query.model для поиска конкретно по модели ноутбука.
                              Для поиска по всем параметрам просто query-->
                            <input ng-model="query.model" id="searchHead" type="text" class="form-control" aria-label="..." placeholder="Поиск товара" name="typeahead" style="height:50px;">
                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="height:50px;">Найти <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                    <li><a href="#">Action</a>
                                    </li>
                                    <li><a href="#">Another action</a>
                                    </li>
                                    <li><a href="#">Something else here</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li><a href="#">Separated link</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Angular - поиск товара-->
                        <div ng-if="query.model" class="table-responsive hidden" id="sortProductAngular" style="position: absolute;z-index: 99999; ">
                             <div class="table-responsive" style="background-color:#F8F8F8;margin-right: 15px;">
                                  <div  class="search_list col-lg-12" ng-repeat="notebook in notebooks | filter:query | orderBy:sortField:reverse"
                                  style="padding: 15px 0px;border-bottom: dotted 1px #000000;">
                                  <div class="col-lg-1" style="padding-left: 5px;padding-right: 0px;">
                                   <a href="/notebooks/@{{notebook.id}}/show">
                                      <img src="/image/note@{{notebook.id}}.jpg" class="img-responsive" alt="">
                                   </a>
                                  </div>
                                   <div class="col-lg-11" style="padding: 5px;">
                                    <a href="/notebooks/@{{notebook.id}}/show">@{{notebook.model}}</a>
                                    <br>
                                    <span style="color: #0FA900;"><strong>@{{notebook.price |number:0}} грн.</strong></span>
                                   </div>

                                   <hr>
                              </div>
                           </div>
                         </div>
                        <!-- END Angular - поиск товара-->
                      </div>
                    </div>
                     <div class="btn-group btn-group-lg  col-lg-3 col-md-4  hidden-sm hidden-xs" style="padding-top:23px;padding-left:23px;">
                        <a class="btn btn-default" href="#" style="font-size:12px;"><i class="fa fa-money fa-2x"></i><br>Сравнить
</a>
                        <a class="btn btn-default" href="#" style="font-size:12px;"><i class="fa fa-heart-o fa-2x"></i>
                        <br>Желания
</a>
                        <a class="btn btn-default" href="/cart" style="font-size:12px;"><i class="fa fa-shopping-cart fa-2x"></i><br>
                        Корзина<span style="color: red">{{$countOfProducts or ''}}</span>
</a>
                    </div>
                    <!-- !Поиск для lg и md -->

                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <!-- Поиск для xs -->
                <div ng-controller="SearchCtrl" class="image_topp col-xs-12 hidden-lg hidden-md hidden-sm" style="margin-bottom:35px;">
                    <div class="input-group">
                        <input ng-model="query.model" type="text" class="form-control" aria-label="..." placeholder="Поиск товара" style="height:50px;">
                        <div class="input-group-btn">
                            <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="height:50px;">Найти <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                <li><a href="#">Action</a>
                                </li>
                                <li><a href="#">Another action</a>
                                </li>
                                <li><a href="#">Something else here</a>
                                </li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                         <div ng-if="query.model" class="table-responsive"  style="z-index: 999999;">
                                                 <div class="table-responsive" style="background-color:#F8F8F8;">
                                                      <div  class="search_list col-xs-12" ng-repeat="notebook in notebooks | filter:query | orderBy:sortField:reverse"
                                                      style="padding: 15px 0px;border-bottom: dotted 1px #000000;">
                                                      <div class="col-xs-3" style="padding-left: 5px;padding-right: 0px;">
                                                       <a href="/notebooks/@{{notebook.id}}/show">
                                                          <img src="/image/note@{{notebook.id}}.jpg" class="img-responsive" alt="">
                                                       </a>
                                                      </div>
                                                       <div class="col-xs-9" style="padding: 5px;">
                                                        <a href="/notebooks/@{{notebook.id}}/show">@{{notebook.model}}</a>
                                                        <br>
                                                        <span style="color: #0FA900;"><strong>@{{notebook.price |number:0}} грн.</strong></span>
                                                       </div>

                                                       <hr>
                                                  </div>
                                               </div>
                         </div>
                </div>
            </div>
            <!--END Поиск для sm и xs -->

<!-- end of container-->
             </div>

     
            @yield('content')


        <!-- footer -->
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center" style="margin-top:20px;padding:20px;border-top: 1px dotted #9cafc4;background-color: #EDEDED;">
                Copyright © Стаценко А.С. 2015. All Rights Reserved.
                <h4><a href="/guestbook">Оставить отзыв</a></h4>
                </div>
        <!-- !footer -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

        <script src="/js/my.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.3/angular.min.js"></script>
        <script src="/js/myAngular.js"></script>

        <!-- Скрипт для AJAX-вставки комментария в таблицу comments -->
        <script>
        $(document).ready(function(){
        var request;

            $("#addComment").submit(function(event){
            $(this).modal('show')
            $("#spinnerFormComment").removeClass("hidden");
              // Abort any pending request
                if (request) {
                    request.abort();
                }
                // setup some local variables
                var $form = $(this);

                // Let's select and cache all the fields
                var $inputs = $form.find("input, select, button, textarea");

                // Serialize the data in the form
                var serializedData = $form.serialize();

                // Let's disable the inputs for the duration of the Ajax request.
                // Note: we disable elements AFTER the form data has been serialized.
                // Disabled form elements will not be serialized.
                $inputs.prop("disabled", true);
                request =  $.ajax({
                  headers: {
                             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                         },
                   type: "POST",
                   url: 'comments',
                   data: serializedData,
                   success: function(){
                   /*  alert('Load was performed.');*/

                     $("#divAddComment").addClass("hidden");
                     $("#spinnerFormComment").addClass("hidden");
                     $("#divFlashMessage").removeClass("hidden");
                     $("#addComment").modal('hide');
                   },
                     error:function(){

                        $("#addComment").modal('hide');
                        //Тут проверка на ошибку
                     }
                 });
                    // Callback handler that will be called on success
                     request.done(function (response, textStatus, jqXHR){
                         // Log a message to the console
                         console.log("Hooray, it worked!");
                     });

                     // Callback handler that will be called on failure
                     request.fail(function (jqXHR, textStatus, errorThrown){
                         // Log the error to the console
                         console.error(
                             "The following error occurred: "+
                             textStatus, errorThrown
                         );
                     });

                     // Callback handler that will be called regardless
                     // if the request failed or succeeded
                     request.always(function () {
                         // Reenable the inputs
                         $inputs.prop("disabled", false);
                     });

                     // Prevent default posting of form
                     event.preventDefault();
            });
        });
        </script>


        <!--Слайдер цены при сортировке-->
        <script>
    $( "#slider-range" ).slider({
      range: true,
      min: {{ isset($min) ? $min : '0' }},
      max: {{ isset($max) ? $max : '100000' }},
      values: [ {{ isset($min) ? $min : '0' }}, {{ isset($max) ? $max : '100000' }} ],
      slide: function( event, ui ) {
        $( "#price_down_input" ).val(ui.values[ 0 ]);
        $( "#price_up_input" ).val(ui.values[ 1 ]);
      }
    
    });
  </script>

        <!-- Tooltip -->
        <script>
            $(function () {
                $('[data-toggle="tooltip"]').tooltip()
            });

            $(document).ready(function () {
                $("#nout_pl_panel").hide();
                $("#bit_tehn_panel").hide();

                $("#nout_pl_flip").click(function () {
                    $("#nout_pl_panel").slideToggle(400);
                });

                $("#bit_tehn_flip").click(function () {
                    $("#bit_tehn_panel").slideToggle(400);
                });
            });
        </script>
    </div>
</body>

</html>