<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('category', 'user')->latest()->get();

        return response()->json([
            'posts' => $posts
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:3|max:30',
            'description' => 'required',
            'category_id' => 'required',
        ]);

        $strpos = strpos($request->image, ';');
        $substr = substr($request->image, 0, $strpos);
        $extension = explode('/', $substr)[1];
        $name = time().".".$extension;
        $upload_path = public_path()."/uploadimage/";
        //return $extension;

        //http://image.intervention.io/getting_started/installation#laravel
        //image intervention
        $img = Image::make($request->image)->resize(300, 300);
        $img->save($upload_path.$name);

        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->category_id = $request->category_id;
        $post->user_id = Auth::user()->id;
        $post->image = $name;
        $result = $post->save();

        if($result)
        {
            return ['message' => 'data has been saved'];
        }
        else
        {
            return ['message' => 'error saving data'];
        }
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
        $post = Post::find($id);

        return response()->json([
            'post' => $post
        ], 200);
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
        $this->validate($request, [
            'title' => 'required|min:3|max:30',
            'description' => 'required',
            'category_id' => 'required',
        ]);

        $post = Post::find($id);

        if($request->image != $post->image)
        {
            $strpos = strpos($request->image, ';');
            $substr = substr($request->image, 0, $strpos);
            $extension = explode('/', $substr)[1];
            $name = time().".".$extension;
            $upload_path = public_path()."/uploadimage/";
            //return $extension;

            //http://image.intervention.io/getting_started/installation#laravel
            //image intervention
            $img = Image::make($request->image)->resize(300, 300);
            $img->save($upload_path.$name);

            // remove existing image from file storage
            $image = $upload_path.$post->image;

            if(file_exists($image))
            {
                @unlink($image);
            }
        }
        else
        {
            $name = $post->image;
        }

        $post->title = $request->title;
        $post->description = $request->description;
        $post->category_id = $request->category_id;
        $post->user_id = Auth::user()->id;
        $post->image = $name;
        $result = $post->save();

        if($result)
        {
            return ['message' => 'data has been saved'];
        }
        else
        {
            return ['message' => 'error saving data'];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        $image_path = public_path()."/uploadimage/";
        $image = $image_path.$post->image;

        if(file_exists($image))
        {
            @unlink($image);
        }

        $post->delete();
    }
}
