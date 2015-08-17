<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddCommentRequest;
use App\Notebook;
use App\Http\Requests;
Use Input;
use App\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class CommentsController extends Controller
{

    public function index($id)
    {
        $comments = Notebook::find($id)->comments;
        $note =  Notebook::find($id);

       // dd(Auth::user());

        return view('notebooks.comments', compact('comments','note'));
    }

    public function create($id)
    {
        $comments = Notebook::find($id)->comments;
        $note =  Notebook::find($id);


        return view('notebooks.comments', compact('comments','note'));
    }

    public function store(Request $request)
    {
        if(empty(Auth::user())){
          return Comment::create($request->all());
        }else{
        $comments= new Comment($request->all());
       return Auth::user()->comments()->save($comments);
        }
    }

    public function addReply($id)
    {
        $comments = Notebook::find($id)->comments;

        return view('notebooks.comments', compact('comments'));
    }


}
