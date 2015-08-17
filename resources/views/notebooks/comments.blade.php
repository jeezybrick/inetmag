@extends('app')

@section('content')

<div id="comments_ajax">
<div class="container-fluid">

<ol class="breadcrumb">
  <li><a href="/">Главная</a></li>
  <li><a href="/notebooks">Ноутбуки</a></li>
  <li class="active">Отзывы</li>
</ol>

  <ul class="nav nav-tabs">
      <li role="presentation" {{--@if (Request::is("notebooks/$note->id/show")) --}} {{-- @endif--}}>
      <a href="/notebooks/{{$note->id}}/show" >Все о товаре</a></li>
      <li role="presentation"><a href="/notebooks/{{$note->id}}/characteristics" id="getCharacteristics">Характеристики</a></li>
      <li role="presentation"><a href="#">Фото</a></li>
      <li role="presentation" class="active" {{--@if (Request::is("notebooks/$note->id/comments")) class="active" @endif--}}>
      <a href="/notebooks/{{$note->id}}/comments" id="getComments">Отзывы <span style="color: gray;">{{$note->comments->count()}}</span></a></li>
      <li role="presentation"><a href="#">Доставка</a></li>
    </ul>
</div>
<div class="container">
    <div class="row">
     <div class="col-lg-9 col-xs-12" style="padding-top: 20px;">

        <div class="col-lg-6 col-xs-6" style="padding-left: 0px;">
        <h1 style="margin: 0px;">Отзывы покупателей <span style="color: gray">{{$comments->count()}}</span> </h1>
        </div>
        <div class="col-lg-6 col-xs-6 text-right">
        <a href="#addComment" type="button" class="btn btn-default">Написать отзыв</a>
        </div>
     </div>
    </div>
    <div class="row">
     <div class="col-lg-9">
        @foreach($comments as $comment)
            <h4><strong>{{$comment->user->name or $comment->name}}</strong> </h4>
            <h5>{{$comment->comment}}</h5>
            <h5><a href="/notebooks/comments/{{$comment->id}}/add_reply" style="border-bottom: 1px dotted;"><em>Ответить</em></a> </h5>
            @foreach($comment->replyOfComments as $reply)
                <hr>
                <div style="padding-left: 30px;">
                <h4><strong>{{$reply->user->name or $reply->name}}</strong> </h4>
                <h6>{{$reply->reply}}</h6>
                </div>
            @endforeach
        <hr>
        @endforeach
        <div id="divAddComment">
         <h2>Отзыв о отваре</h2>
             <div style="padding:20px 0px;">
                   <form id="addComment" name="addComment">
                   {{-- <input type="hidden" name="user_id" value="{{Auth::user()->id}}">--}}
                    <input type="hidden" name="notebook_id" value="{{$note->id}}">
                     <div class="form-group">
                       <label for="exampleInputEmail1">Email</label>
                       <input @if(isset(Auth::user()->email)) ng-disabled="true" @endif
                       ng-model="comment.email" type="email" class="form-control" name="email" id="exampleInputEmail1"
                       placeholder="{{isset(Auth::user()->email) ? Auth::user()->email : ''}}" required>
                       <span class="help-block" ng-show="addComment.email.$error.required">
                               Обязательное поле</span>
                       <span class="help-block" ng-show="addComment.email.$error.email">
                               Введите правильный email</span>
                     </div>
                     <div class="form-group">
                       <label for="exampleInputPassword1">Ваше имя</label>
                       <input ng-model="comment.name" type="text" class="form-control" name ="name" value="{{isset(Auth::user()->name) ? Auth::user()->name : ''}}"id="exampleInputPassword1"  required>
                        <span class="help-block" ng-show="addComment.name.$error.required">
                        Обязательное поле</span>
                     </div>

                      <div class="form-group">
                            <label for="exampleInputPassword1">Комментарий</label>
                            <textarea ng-model="comment.text" ng-minlength="5" type="text" class="form-control" name = "comment" id="exampleInputPassword1" required></textarea>
                            <span class="help-block" ng-show="addComment.comment.$error.minlength">
                                    Минимум 5 символов</span>
                                    <span class="help-block" ng-show="addComment.comment.$error.required">
                                     Обязательное поле</span>
                      </div>

                     <button ng-disabled="addComment.comment.$error.required || addComment.comment.$error.minlength ||
                     addComment.name.$error.required || addComment.email.$error.required || addComment.email.$error.email"
                     id="submitButtonAddComment" type="submit" class="btn btn-default">Оставить отзыв</button>
                   </form>

               </div>
         </div>

         <div class="spinnerFormComment col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center hidden" id="spinnerFormComment">
<i class="fa fa-spinner fa-pulse fa-3x"></i></div>
           <div class="row hidden" id="divFlashMessage">
                  <div class="col-lg-12 text-center">

                         <div class="alert alert-success">
                             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Спасибо за отзыв!
                         </div>

                  </div>
                </div>
        </div>
      </div>
    </div>

</div>


@stop