@extends('app')

@section('content')

    <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel-body">
                                @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <strong>Whoops!</strong> There were some problems with your input.
                                    <br>
                                    <br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif

                                <form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}" id="formRegistration">
                                   {!! csrf_field() !!}

                                   <div class="form-group">
                                        <label class="col-md-4 control-label">Имя *</label>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                                        </div>
                                    </div>
                         

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">E-Mail *</label>
                                        <div class="col-md-6">
                                            <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Пароль* </label>
                                        <div class="col-md-6">
                                            <input type="password" class="form-control" name="password" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Подтвердите пароль *</label>
                                        <div class="col-md-6">
                                            <input type="password" class="form-control" name="password_confirmation" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-4">
                                            <button type="submit" class="btn btn-primary">
                                                Зарегистрироваться
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> 
                @stop