<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Post;
use App\Tag;
use Illuminate\Support\Facades\Session;
use App;
use App\Comment;

class HomeController extends Controller
{
    // function __construct()
    // {
    //     $this->middleware('auth');
    // }

    function index(){

        return view('home', ['posts' => Post::Paginate(5),'comments'=> Comment::get(['id','content','post_id'])]);
    }

    function show($id){
        return view('post')->with('post' , Post::find($id));
    }

    function lang($local){
        Session::put('lang' , $local);
        return redirect()->back();
    }
}
