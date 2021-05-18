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
        return view('layouts/treands');
    }
}
