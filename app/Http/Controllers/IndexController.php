<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Genre;
use App\Models\Movie;
class IndexController extends Controller
{
    public function search () {
        if(isset($_GET['search'])){
            $search = $_GET['search'];
            
            $category = Category::all();
            $genre = Genre::all();
            $movie = Movie::where('tittle','LIKE',''.$search.'')->get();
            $movie_home = Movie::all();
            // dd($movie);
            return view('pages.search',[
                'category'=>$category,
                'genre'=>$genre,
                'movie' => $movie,
                'movie_home' => $movie_home
            ]);
        }
        else{
            return redirect()->to('/');
        }
        
    }

    public function home () {
        $category = Category::all();
        $genre = Genre::all();
        $category_home = Category::with('movie')->get();
        $category_home1 = Category::with('movie')->where('tittle','=','Phim chieu rap')->first();
        $movie = Movie::all();
        // dd($category_home1);
        return view('pages.home',[
            'category'=>$category,
            'genre' => $genre,
            'category_home' => $category_home,
            'category_home1' => $category_home1,
            'movie' => $movie
        ]);
    }

    public function category (string $id) {
        $category_home = Category::with('movie')->where('id',$id)->get();
        $category = Category::all();
        $genre = Genre::all();
        $movie = Movie::all();
        // dd($category);
        return view('pages.category',[
            'category'=>$category,
            'genre'=>$genre,
            'category_home' => $category_home,
            'movie' => $movie
        ]);
    }

    public function genre (string $id) {
        
        $category = Category::all() ;
        $genre = Genre::all();
        $genre_home = Genre::with('movie')->where('id',$id)->first();
        $movie = Movie::all();
        // dd($genre_home);
        return view('pages.genre',[
            'category'=>$category,
            'genre'=>$genre,
            'genre_home' => $genre_home,
            'movie' => $movie
        ]);
    }

    public function movie ($id) {
        $category = Category::all();
        $genre = Genre::all();
        $movie = Movie::with('genre','category')->where('id',$id)->first();
        // dd($movie);
        return view('pages.movie',[
            'category'=>$category,
            'genre'=>$genre,
            'movie' => $movie
        ]);
    }

    public function watch ($id) {
        $category = Category::all();
        $genre = Genre::all();
        $movie = Movie::find($id);
        $movie_sidebar = Movie::all()->take(5);
        return view('pages.watch',[
            'category'=>$category,
            'genre'=> $genre,
            'movie' => $movie,
            'movie_sidebar' => $movie_sidebar
        ]);
    }
 }
