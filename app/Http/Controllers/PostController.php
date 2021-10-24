<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {
        $posts=Post::all();
        return view('posts.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags=Tag::all();
        if ($tags->count()==0) {
            return redirect()->route('tag.create');
        }
        return view('posts.create')->with('tags',$tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'content'=>'required',
            'tags'=>'required',
            'photo'=>'required|image',
            

        ]);
        $photo=$request->photo;
        $newPhoto=time().$photo->getClientOriginalName();
        $photo->move('uploads/posts',$newPhoto);
        $posts=Post::create([
            'user_id'=>Auth::id(),
            'title'=>$request->title,
            'content'=>$request->content,
            'photo'=>'uploads/posts/'.$newPhoto,
            'slug'=>str_slug($request->title),
        ]);
        $posts->tag()->attach($request->tags);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $slug)
    {
        //بما اني عاوز اعرض حاجه واحدة بس يبقا هقولة هاتلي بفانكشن الوير السلاج من الدولار سلاج اللى فوق  وهاتلي واحدة بس
       $posts= Post::where('slug',$slug)->first();
        return view('posts.show')->with('posts',$posts);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posts=Post::find($id);
        return view('posts.edit')->with('posts',$posts);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        
        $this->validate($request,[
            'title'=>'required',
            'content'=>'required',
            'photo'=>'required|image',

        ]);
        $posts=Post::find($id);
        if ($request->has('photo')) {
            $photo=$request->photo;
        $newPhoto=time().$photo->getClientOriginalName();
        $photo->move('uploads/posts',$newPhoto);
        $posts->photo='uploads/posts'.$newPhoto;

        }
        $posts->title=$request->title;
        $posts->content=$request->content;
        $posts->save();
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posts=Post::find($id);
        $posts->delete();
        return redirect()->back();
    }
}
