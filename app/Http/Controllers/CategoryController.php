<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $list = Category::all();
        return view('admincp.category.form',[
            'list'=>$list
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = $request->all();
        $category = new Category();
        $category->tittle = $data['tittle'];
        $category->description = $data['description'];
        $category->status = $data['status'];
        $category->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::find($id);
        
        return view('admincp.category.formedit',[
            'category'=>$category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $category = Category::find($id);
        $category->tittle = $data['tittle'];
        $category->description = $data['description'];
        $category->status = $data['status'];
        $category->save();
        return redirect('/category/create');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        Category::find($id)->delete();
        return redirect()->back();
    }
}
