<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Cart;
use App\Notebook;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CartController extends Controller
{

    public function index()
    {
        //Если в сессии у пользователя есть товары
        if (session()->has('products')) {
            //и массив с товарами НЕ пустой
            if (!empty(session()->get('products'))) {

                //Заносим в переменную массив ключей продуктов
                // $idOfProducts = session()->get('products');

                /*Заносим в переменную результат выборки в БД продуктов
                  для показа пользователю в его корзине*/
                $cartProducts = Notebook::showInCart()->get();

                // dd($cartProducts);
                $countOfProducts = '('.Notebook::$count.')';
            } else {
                //Если товара нет,то заносим в переменную сообщение
                $answer = 'У вас нет товаров в корзине';
               // $countOfProducts = null;
            }

        }else{
            $answer = 'У вас нет товаров в корзине';
        }
       // dd(session()->all());
        return view('user.cart', compact('answer', 'cartProducts','countOfProducts'));
    }


    public function store($id)
    {
        /*Стирает все данные из сессии*/
        //  session()->flush();

        /*
         * Если в сессии есть ключ product:
             * 1)Записываем в переменную currentCount количество конкретного продукта в корзине
             * 2)Добавляем +1 в этому числу через метод setCount
             * 3)Теперь удаляем это значение из сессии
             * 4)Берем новое значение количества товара
             * 5)Записываем новые данные в сессиию

           Если ключа нет:
               1)Берем  количество с переменной count (1 товар)
               2)Записываем данные в сессию
        */
        if (session()->has('products.' . $id)) {

            $currentCount = session()->get('products.' . $id);
            //  dd($currentCount);
            $count = Cart::setCount($currentCount);

            session()->pull('products.' . $id, $count);

            $count = Cart::$count;

            session()->put('products.' . $id, $count);
            //  dd($currentCount);
        } else {
            $count = Cart::getCount();
            session()->put('products.' . $id, $count);

        }
        return session()->all();
    }

    public function delete($id)
    {

        //Удаляем ключ продукта с сессии пользователя
        session()->pull('products.' . $id);

        //dd(session()->all());

        return redirect('/cart');

    }


}
