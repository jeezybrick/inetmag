@extends('app')

@section('content')

    <div class="container" ng-controller="guestbookCtrl">
        <div class="row">
            <div class="col-lg-12">
            <form ng-submit="addMessage()" ng-if="!subm">

                        <div class="form-group">
                            <label for="name">Имя: <span class="error" ng-if="! newMessage.name">*</span></label>
                            <input type="text" name="name" id="name" class="form-control" ng-model="newMessage.name" >
                        </div>

                        <div class="form-group">
                            <label for="message">Сообщение: <span class="error" ng-if="! newMessage.message">*</span></label>
                            <textarea type="text" name="message" id="message" class="form-control" ng-model="newMessage.message"></textarea>
                        </div>

                          <div class="form-group" ng-if="! submitted">

                              <button  type="submit" class="btn btn-default" v-attr="disabled:errors">Отправить</button>
                          </div>


                </form>
             <div class="alert alert-success" ng-if="subm">Спасибо</div>
             <h1>Отзывы</h1>
              <div class="row">
                <div ng-repeat="message in messages" class="col-lg-12">
                    <h4><strong>@{{ message.name }}</strong></h4>
                    <h4>@{{ message.message }}</h4>
                    <hr>
                </div>
              </div>
            </div>
        </div>
    </div>

@stop