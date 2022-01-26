<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::latest()->get();
        //$categories = Category::paginate(5);

        return response()->json([
            'categories' => $categories
        ],Response::HTTP_OK );
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
            'name' => 'required|min:2|max:12'
        ]);

        $category = new Category();
        $category->name = $request->name;
        $result = $category->save();

        if($result)
        {
            return response()->json([
                'category' => $category
            ], Response::HTTP_CREATED);
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
        $category = Category::find($id);

        return response()->json([
            'category' => $category
        ],Response::HTTP_OK );
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
            'name' => 'required|min:2|max:12'
        ]);

        $category = Category::find($id);
        $category->name = $request->name;
        $result = $category->save();

        if($result)
        {
            return response()->json([
                'category' => $category
            ], Response::HTTP_CREATED);
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
        $category = Category::find($id);

        $category->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
