@extends('app')

@section('content')

  
        <nav id="main_nav" class="navbar navbar-inverse" style="margin-bottom:0px;border:0px;">
            <div class="container-fluid" style="padding-left:0px;padding-right:0px;">
                <ul class="nav nav-pills nav-justified">

                    <li{{-- class="active" --}} id="nout_pl_flip"><a href="#/" style="border-radius: 0;">Ноутбуки,планшеты и компьютеры<span class="caret"></span>
             </a>

                        <div id="nout_pl_panel">
                            <ul id="ul_podm" class="nav nav-pills nav-stacked text-center" style="">
                                <li><a href="/notebooks">Ноутбуки</a>
                                </li>
                                <li><a href="#">Компьютеры</a>
                                </li>
                                <li><a href="#">Мониторы</a>
                                </li>
                            </ul>
                        </div>
                    </li>


                    <li><a href="#/" id="bit_tehn_flip">Бытовая техника<span class="caret"></span>
             </a>

                        <div id="bit_tehn_panel">
                            <ul id="ul_podm" class="nav nav-pills nav-stacked text-center">
                                <li><a href="#">Крупная бытовая техника</a>
                                </li>
                                <li><a href="#">Встраиваемая техника</a>
                                </li>
                                <li><a href="#">Мелкая бытовая техника</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    </a>
                    </li>
                    <li><a href="#collapsePhone" data-toggle="collapse" href="#collapsePhone" aria-expanded="false" aria-controls="collapsePhone">Телефоны,
                    MP3<span class="caret"></span>
              </a>
                        <div class="collapse" id="collapsePhone">

                            <ul id="ul_podm" class="nav nav-pills nav-stacked text-center">
                                <li><a href="#">Телефоны</a>
                                </li>
                                <li><a href="#">Аксессуары для телефонов</a>
                                </li>
                                <li><a href="#">Планшеты и электронные книги</a>
                                </li>
                            </ul>

                        </div>
                    </li>
                    </a>
                    </li>
                    <li><a href="#collapseChildWorld" data-toggle="collapse" href="#collapsePhone" aria-expanded="false" aria-controls="collapsePhone">
                    Детский мир<span class="caret"></span>
              </a>
                      <div class="collapse" id="collapseChildWorld" style="position: absolute;">

                            <ul id="ul_podm" class="nav nav-pills nav-stacked text-center">
                                <li><a href="#">Для самых маленьких</a>
                                </li>
                                <li><a href="#">Гигиена и уход за ребенком</a>
                                </li>
                                <li><a href="#">Детское питание</a>
                                </li>
                            </ul>

                        </div>
                    </li>
                    </a>
                    </li>
                    <li><a href="admin/admin.php">Автотовары<span class="caret"></span>
              </a>
                    </li>
                    </a>
                    </li>
                    <li><a href="#">ТВ,
                    Аудио/Видео,
                    Фото<span class="caret"></span>
              </a>
                    </li>
                    </a>
                    </li>
                    <li><a href="#">Товары для дома<span class="caret"></span>
              </a>
                    </li>
                    </a>
                    </li>

                </ul>
            </div>
            <!--/.container-fluid -->
        </nav>

        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img src="/image/wpapers_ru.jpg" alt="...">
                    <div class="carousel-caption">
                        ...
                    </div>
                </div>
                <div class="item">
                    <img src="/image/wpapers_ru_Audi-R8.jpg" alt="...">
                    <div class="carousel-caption">
                        ...
                    </div>
                </div>
                <div class="item">
                    <img src="/image/wpapers_ru_Porsche-cayane.jpg" alt="...">
                    <div class="carousel-caption">
                        ...
                    </div>
                </div>
                ... ...
            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
@stop
