<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;
use Input;

class Notebook extends Model
{

    protected $table = 'notebooks';

    protected $fillable = ['price'];

    public static $count = 0;

    /*
     * Метод для сортировки продукта с помощию Angular js
    */
    public function scopeSort($query, $input)
    {

        if (array_key_exists("os", $input)) {

            $query->where(function ($query) {

                foreach (Input::get('os') as $value) {

                    $query->orWhere('os', '=', $value);

                }
            });

        }

        if (array_key_exists("ram", $input)) {

            $query->where(function ($query) {

                foreach (Input::get('ram') as $value) {

                    $query->orWhereBetween('ram', [$value[0], $value[2]]);

                }
            });

        }

        if (array_key_exists("price", $input)) {

            $query->where(function ($query) {

                foreach (Input::get('price') as $value) {

                    $query->whereBetween('price', [$value[0], $value[2]]);

                }
            });

        }

    }

    /*
     * Сортировка для маленьких экранов
    */
    public function scopeSortM($query, $id)
    {
        switch ($id) {
            case "byPopular":
                //return "Сортировка по популярности";
                $query->orderBy('price', 'desc');
                break;
            case "byPrice":
                //return "Сортировка по цене";
                $query->orderBy('price');
                break;
            case "byNewest":
                //return "Сортировка по новизне";
                $query->orderBy('created_at');

                break;

            default:
                $query->orderBy('id');
        }

    }

    /*
     * У ноутбуков один ОС,а у одного ОС много ноутбуков
    */
    public function operationSystem()
    {
        return $this->belongsTo('App\OperationSystem', 'os', 'id');
    }

    /*
     * У одного товара есть много комментариев и
     * каждый конкретный коммент принадлежит этому товару
    */
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    /*Метод для показа какие товары у пользователя в корзине
    через перебор массива products в сессии и выборки id продуктов
    */
    public function scopeShowInCart($query)
    {


        $query->where(function ($query) {

            foreach (array_keys(Session::get('products')) as $value) {

                $query->orWhere('id', '=', $value);

                static::$count++;

            }

        });

    }

    /*
     * Подсчет общего клоичества продуктов в корзине
    */
    public function scopeGetCountOfProductsInCart()
    {
        return count(Session::get('products'));

    }


}
