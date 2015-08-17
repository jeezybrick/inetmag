/* Angular */

var countryApp = angular.module('countryApp', []),

    url = '/cart/add/';

//Контроллер для поиска товаров
countryApp.controller('SearchCtrl', function ($scope, $http) {
    $http.get('/notebooks/search').success(function (data) {
        $scope.notebooks = data;
    });
});

//Контроллер для сортировки на больших экранах
countryApp.controller('SortCtrl', function ($scope, $http) {
    //Для hidden обычных результатов выборки
    $scope.angInAction = false;
    //Массив для хранения всех параметров
    $scope.sortAttrArray = [];
    //Для перезаписи цены при последующих ее сменах
    $scope.price = false;
    //Для начального вывода цен
    $scope.priceUp = 10000;
    $scope.priceDown = 1;
    $scope.priceArray = [];

    //Функция сортировки sortQuery
    $scope.sortQuery = function (fullValue) {
        //Скрываем обычный php результат выборки
        $scope.angInAction = true;
        /*
         Заносим в переменную lol индекс,
         если переменная fullValue совпала с каким-то их элемета массива sortAttrArray
         для того,чтобы при повторном нажатии переменная убиралась из значений сортировки
         например пользователь кликнул на сортировку по 4ГБ RAM и при повторном ее нажатии
         на убирается из критерия поиска
         */
        var lol = $scope.sortAttrArray.indexOf(fullValue);
        // var loq = $scope.sortAttrArray.indexOf(parameters);
        var fullPrice = 'price=' + $scope.priceDown + ',' + $scope.priceUp;

        /*
         Если уже есть такой элемента в адресе(в массиве)
         * ,то удаляем его.
         * Если нет-вносив новое значение в конец массива sortAttrArray
         * */
        if (lol > -1) {
            $scope.sortAttrArray.splice(lol, 1);
        } else {
            $scope.sortAttrArray.push(fullValue);
        }

        /*
         Преобразуем массив sortAttrArray в строку.
         Элементы массива разделяются знаком &
         */
        $scope.sortAttrString = $scope.sortAttrArray.join('&');

        /*
         Если массив пустой - показываем обычную php выборку
         и вносим в переменную noMatch ошибку
         */
        if ($scope.sortAttrArray.length == 0) {
            $scope.angInAction = false;
            $scope.noMatch = "Совпадений не найдено";

            /*
             Если массив не пустой - отправляем запрос с адресом + элементы строки sortAttrString
             */
        } else {
            $http.get('/notebooks/sort?' + $scope.sortAttrString).success(function (data) {

                $scope.sortFullData = data;
                /*
                 Если пришли пустые денные - заносим ошибку
                 */
                if ($scope.sortFullData.length == 0) {
                    $scope.noMatch = "Совпадений не найдено";
                }
            });
        }

        /*
         Сбрасываем переменную для ошибок для следующего раза
         */
        $scope.noMatch = "";
    };
    $scope.class = {
        ramFour: {
            'value': 4,
            'state': false
        },
        ramFourToSix: {
            'value': '4-6',
            'state': false
        }

    }

});

//Контроллер для добавления товаров в корзину
countryApp.controller('CartAddCtrl', function ($scope, $http) {
    $scope.count = 0;
    $scope.visibleElement = true;
    $scope.test = function () {
        console.log(url);
    };
    $scope.countAdd = function (id) {
        $http.post(url + id).success(function (data) {
            $scope.cartFullData = data;
            //$scope.cartProductCount = $scope.cartFullData.id;

            /*
             Скрываем кнопку добавлением класса hidden
             * Директивой ng-class в button-атрибутах
             */
            $scope.hiddenElement = true;
            $scope.visibleElement = false;

            $scope.fff = [
                {id: true}
            ];

            // $('#buttonAddToCart'+id).addClass("hidden");
            //  $('#alreadyInCart'+id).removeClass("hidden");

        });
    }

});

countryApp.controller('guestbookCtrl', function ($scope, $http) {

    $scope.newMessage = {'name' :'Андрей','message':'Привет!'};
    $scope.subm = false;

    $http.get('/guestbook/api').success(function (data) {
        $scope.messages = data;
    });


    $scope.addMessage = function () {

        console.log($scope.messageArr);
        $http.post('/guestbook/api',$scope.newMessage).success(function (data) {
            $scope.messages = data;
            $scope.newMessage.name = '';
            $scope.newMessage.message = '';
            $scope.subm = true;

            $scope.hiddenElement = true;
            $scope.visibleElement = false;

        });
    }


});

/*END Angular */