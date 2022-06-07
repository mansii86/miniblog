<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers;
use App\Posts;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostFormRequest;
use Illuminate\Support\Facades\File;


class postController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('post');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $user=$request->user();
        $post=new Post();
        $post->title=$request->title;
        $post->body=$request->body;
        if($request->hasFile('image'))
        {
            $file=$request->file('image');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $file->move('uploads/post/',$filename);
            $post->image=$filename;
        }
        $user->post()->save($post);
        return redirect(route('post_index'))->with('status','Post Added');
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
    public function edit($id)
    {
        $post=Post::find($id);
        return view('editpost',['post'=>$post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $post=post::find($id);
       $post->title=$request->title;
        $post->body=$request->body;
        if($request->hasFile('image'))
        {
            $destination='uploads/post/'.$post->image;
            if(File::exists($destination))
            {
                File::delete($destination);
            }

            $file=$request->file('image');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $file->move('uploads/post/',$filename);
            $post->image=$filename;
        }
        $post->save();
        return redirect(route('dashboard'))->with('status','Post Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $post=post::find($id);
        if($request->hasFile('image'))
        {
            $destination='uploads/post/'.$post->image;
            if(File::exists($destination))
            {
                File::delete($destination);
            }

            $file=$request->file('image');
            $filename=time().'.'.$file->getClientOriginalExtension();
            $file->move('uploads/post/',$filename);
            $post->image=$filename;
        }

        Post::destroy($id);

        return redirect(route('dashboard'))->with('status','Post Deleted');
    }
}
