<?php

namespace App\Http\Controllers;

use App\Models\movie;
use Illuminate\Http\Request;

class showmovie extends Controller
{
    public function all_movies(){
        $movies = movie::paginate(2);
        return response()->json($movies);
    }

    public function treading_movies(){
        $movies = movie::where('treading',1)->first();
        return response()->json($movies);
    }

    public function popular_movies(){
        $movies = movie::where('treading',0)->first();
        return response()->json($movies);
    }

    public function search(Request $request){
        $search = $request->get('q');
        return movie::where('title','like','%'.$search.'%')->get();
    }
}
