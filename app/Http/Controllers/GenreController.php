<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;
class GenreController extends Controller
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
        $list = Genre::all();
        return view('admincp.genre.form',[
            'list'=>$list
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = $request->all();
        $genre = new Genre();
        $genre->tittle = $data['tittle'];
        $genre->description = $data['description'];
        $genre->status = $data['status'];
        $genre->save();
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
        $genre = Genre::find($id);
        
        return view('admincp.genre.formedit',[
            'genre'=>$genre
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $genre = Genre::find($id);
        $genre->tittle = $data['tittle'];
        $genre->description = $data['description'];
        $genre->status = $data['status'];
        $genre->save();
        return redirect('/genre/create');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        Genre::find($id)->delete();
        return redirect()->back();
    }
}
