<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
class PostsController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::denies('accessAdmin')) {
             return redirect('/home');
         }

        $posts = Post::paginate(5);
        return view('admin.posts')->with('posts' , $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

       return view('admin.createPost', ['tags' => Tag::get(['id' , 'name']) ,'categorys'=>Category::get(['id','name'])]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // $request->all();
        // $request->input('title');
            $request->validate([
                'title' => 'required|max:5',
                'body' => 'required',
                'auther' => 'required',
               'category_id' => 'required',
               'tag_id' => 'required'


            ]);

        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->auther = $request->auther;
        $post->category_id = $request->category_id;
        $post->user_id = Auth::id();
        $post->save();
        $post->tags()->attach($request->tag_id);

        return redirect('admin/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {

        return view('admin.showPost', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {

        return view('admin.editPost')
        ->with('post' , $post)
        ->with('tags' , Tag::get(['id' , 'name']))
       ->with('categories' , Category::get(['id' , 'name']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request , Post $post)
    {
        $request->validate([
            'title' => 'required|max:5',
            'body' => 'required',
            'auther' => 'required',
            'category_id' => 'required',
            'tag_id' => 'required'

        ]);

        $post->title = $request->title;
        $post->body = $request->body;
        $post->auther=$request->auther;
        $post->category_id = $request->category_id;
        $post->save();
        $post->tags()->sync($request->tag_id);

        return redirect('admin/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
        //   if (Gate::denies('deletePost', $post)) {
        //     return redirect()->back();
        // }

       $post->delete();
       $post->tags()->detach();



        return redirect('admin/posts');
    }
}
