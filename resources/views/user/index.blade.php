@extends('app')

@section('content')

<div class="container-fluid">

<ol class="breadcrumb">
  <li><a href="/">Главная</a></li>
  <li class="active">Профиль</li>
</ol>

    <div class="row">
    <div class="col-lg-12"><h1>Личные данные</h1></div>
        <div class="col-lg-6">

        <div class="row">

          <div class="col-lg-12" style="margin-bottom: 30px;">
                <div class="col-lg-6" style="color:gray;">
                Имя
                </div>
                <div class="col-lg-6">
                {{ $user->name }}
                </div>
          </div>

           <div class="col-lg-12" style="margin-bottom: 30px;">
                <div class="col-lg-6" style="color:gray;">
                Электронная почтa
                </div>
                <div class="col-lg-6">
                {{ $user->email }}
                </div>
           </div>

            <div class="col-lg-12" style="margin-bottom: 30px;">
                <div class="col-lg-6" style="color:gray;">
                Телефон
                </div>
                <div class="col-lg-6">
                {{-- isset($user->phone) ? $user->phone : 'Не указан' --}}
                {{ $user->phone or 'Не указан' }}
                </div>
            </div>

            <div class="col-lg-12" style="margin-bottom: 30px;">
                <div class="col-lg-6" style="color:gray;">
                Адрес для доставок
                </div>
                <div class="col-lg-6">
                {{ $user->city->name }},{{ $user->city->region()->first()->name }} область
                </div>
            </div>


        </div>
        </div>
    </div>
</div>

@stop