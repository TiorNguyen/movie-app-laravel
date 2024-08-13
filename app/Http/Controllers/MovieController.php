<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Category;
use App\Models\Genre;
use Illuminate\Support\Facades\File;
use Storage;
class MovieController extends Controller
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

        $list = Movie::with('category','genre')->get();
        $category = Category::all();
        $genre = Genre::all();
        $path = public_path()."/json/";
        if(!is_dir($path)){
            mkdir($path,0777,true);
        }
        File::put($path.'movies.json',json_encode($list));
        return view('admincp.movie.form',[
            'list'=>$list,
            'category' => $category,
            'genre' => $genre
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $movie = new Movie();
        $movie->tittle = $data['tittle'];
        $movie->description = $data['description'];
        $movie->status = $data['status'];
        $movie->category_id = $data['category_id'];
        $movie->genres_id = $data['genres_id'];
        $movie->linkphim = $data['linkphim'];
        $get_image = $request->file('image');
        $path = 'uploads/movie/';

        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,9999).'.'.$get_image->getClientOriginalExtension();
            $get_image->move($path,$new_image);
            $movie->image = $new_image;
        }
        
        $movie->save();

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
        $movie = Movie::find($id);
        $category = Category::all();
        $genre = Genre::all();
        return view('admincp.movie.formedit',[
            'movie' => $movie,
            'category' => $category,
            'genre' => $genre
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        $movie = Movie::find($id);
        $movie->tittle = $data['tittle'];
        $movie->description = $data['description'];
        $movie->status = $data['status'];
        $movie->category_id = $data['category_id'];
        $movie->genres_id = $data['genres_id'];
        $movie->linkphim = $data['linkphim'];

        $get_image = $request->file('image');
        $path = 'uploads/movie/';

        if($get_image){
            if(!empty($movie->image)){
                unlink('uploads/movie/'.$movie->image);
            }
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,9999).'.'.$get_image->getClientOriginalExtension();
            $get_image->move($path,$new_image);
            $movie->image = $new_image;
        }
        $movie->save();
        return redirect('/movie/create');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $movie = Movie::find($id);
        if(!empty($movie->image)){
            unlink('uploads/movie/'.$movie->image);
        }
        $movie->delete();
        return redirect()->back();
    }
}
