<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\Posts\CreatePostsRequest;
use App\Http\Requests\Posts\UpdatePostRequest;
use Illuminate\Http\Request;
use App\Post;


class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('verifyCategory')->only(['create','store']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posts.index')->with('posts', Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create')->with('categories',Category::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostsRequest $request)
    {
       $image = $request->image->store('postsimg');
        // $image = $request->file('image');
        // $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
        // $destinationPath = public_path('/images');
        // $image->move($destinationPath, $input['imagename']);
       //dd($request->image);
       Post::create([
           'title' => $request->title,
           'description' => $request->description,
           'memo' => $request->memo,
           'published_at' => $request->published_at,
           'image' => $image,
           'category_id' => $request->category_id
       ]);

       session()->flash('success', 'Post Successfully Created.');

       return redirect(route('posts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.create')->with('post',$post)->with('categories',Category::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $data = $request->only(['title','description','published_at','memo','category_id']);
        if($request->hasFile('image')){
            $image = $request->image->store('postsimg');
            $post->deleteImage();
            $data['image']= $image;
        }

        $post->update($data);

        session()->flash('success','Post Sucessfully Updated');
        return redirect(route('posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::withTrashed()->where('id',$id)->firstOrFail();

        if($post->trashed()){
            $post->deleteImage();
            $post->forceDelete();
        }else{
            $post->delete();
        }

        session()->flash('success','Post Deleted Sucessfully.');
        return redirect(route('posts.index'));
    }

    public function trashed()
    {
        $trashed = Post::onlyTrashed()->get();
        return view('posts.index')->withPosts($trashed);
    }

    public function restore($id)
    {
        $post=Post::withTrashed()->where('id',$id)->firstOrFail();
        $post->restore();
        session()->flash('success','Successfully restored.');
        return redirect()->back();
    }
}
