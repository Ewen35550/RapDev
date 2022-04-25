<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrackController extends Controller
{
    public function read($id){

        return view('read_track', ['track' => $id]);

    }
}
