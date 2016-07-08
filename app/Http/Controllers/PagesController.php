<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Clip;

class PagesController extends Controller
{
    public function home() {
    	return view('pages.home');
    }

    public function about() {
    	return view('pages.about');
    }

    public function getNature() {
    	$clips = Clip::where('category', '=', 'Natuur')->paginate(15);
    	return view('pages.videos', compact('clips'));
    }	
}
