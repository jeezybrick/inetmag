@extends('app')

@section('content')

  
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

                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}" id="formLogin">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <div class="form-group">
                                    <label class="col-md-4 control-label">E-Mail Address</label>
                                    <div class="col-md-6">
                                        <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">Пароль</label>
                                    <div class="col-md-6">
                                        <input type="password" class="form-control" name="password" id="loginPass" required>
                                        
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="remember"> Запомнить меня
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" class="btn btn-primary">Войти!</button>
                                        <a class="btn btn-link" href="{{ url('/password/email') }}">Забыли пароль?</a>
                                    </div>
                                </div>
                            </form>
                            Или войдите, используя социальные сети:
                            <br>
                            <a href="/github" style="color:black;"><i class="fa fa-github fa-4x"></i></a>


                        </div>
                    </div>
                </div>    

@stop