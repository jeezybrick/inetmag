<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notebook;
use App\OperationSystem;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Input;

class NotebooksController extends Controller
{
    /*Метод для сортировки на Angular*/
    public function sort(Request $request)
    {
        if(empty($request->all())){
            return null;
        }
        $input = $request->all();

        $data = Notebook::sort($input)->get();

        return $data;
    }

    /*Метод для сортировки для xs-devices*/
    public function sortM($id)

    {
     //   dd($id);

        $notes = Notebook::sortM($id)->get();
        $os = OperationSystem::all();
        $min = Notebook::min('price');
        $max = Notebook::max('price');

        $session = session()->all();
        $count = 0;

        //  dd($session );
        if (session()->has('products')) {

            if (!empty(session()->get('products'))) {

                $countOfProducts = '(' . Notebook::getCountOfProductsInCart() . ')';

            }
        }
        return view('notebooks.index', compact('notes', 'os', 'min', 'max','session','count','countOfProducts'));
    }

    public function index()
    {
        /*Стирает все данные из сессии*/
        //session()->flush();

        $input = array_filter(Input::all());
        // dd($input["ram1"][2]);
        $notes = Notebook::sort($input)->get();
        //dd($notes);
        $os = OperationSystem::all();
        $min = Notebook::min('price');
        $max = Notebook::max('price');

        $session = session()->all();
        $count = 0;

     //  dd($session );
       if (session()->has('products')) {

          if (!empty(session()->get('products'))) {

              $countOfProducts = '(' . Notebook::getCountOfProductsInCart() . ')';

          }
       }

    //    dd($countOfProducts);

        return view('notebooks.index', compact('notes', 'os', 'min', 'max','session','count','countOfProducts'));

    }

   /*Метод для поиска на Angular*/
    public function search()
    {

        return Notebook::all();

    }

    public function show($id)
    {

        $note = Notebook::find($id);

        return view('notebooks.show', compact('note'));
    }

    public function characteristics($id)
    {

        $note = Notebook::find($id);
        //  dd($note->operationSystem);
        return view('notebooks.characteristics', compact('note'));
    }

    public function create(){

        return view('notebooks.create');
    }


}
