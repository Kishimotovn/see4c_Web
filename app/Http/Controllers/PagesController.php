<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Video;
use App\Clip;

class PagesController extends Controller
{
    public function home() {
    	$category = 'Natures';
    	$videos = Video::where('category', '=', 'Natuur')->paginate(12);
    	$thumbLink = "http://www.ufunk.net/wp-content/uploads/2016/01/ValentinValkov-2.jpg";
    	return view('pages.videos', compact('videos', 'category', 'thumbLink'));
    }

    public function about() {
    	return view('pages.about');
    }

    public function getVideos($category) {
   		if ($category == 'Natures') {
   			$videos = Video::where('category', '=', 'Natuur')->paginate(12);
   			$thumbLink = "http://www.ufunk.net/wp-content/uploads/2016/01/ValentinValkov-2.jpg";
    		return view('pages.videos', compact('videos', 'category', 'thumbLink'));
   		} else if ($category == 'SoundVision') {
   			$thumbLink = "http://www.saklerksdorp.co.za/images/logos/1/1140_sound_vision15519611380176897.jpg";
   			$videos = Video::where('category', '=', 'SoundVision')->paginate(12);
    		return view('pages.videos', compact('videos', 'category', 'thumbLink'));
   		} else if ($category == 'Theater') {
   			$videos = Video::where('category', '=', 'Theater')->paginate(12);
   			$thumbLink = "https://upload.wikimedia.org/wikipedia/commons/6/6c/Dca_muppet_theater.jpg";
    		return view('pages.videos', compact('videos', 'category', 'thumbLink'));
   		} else {
   			return "404";
   		}
    }

    public function getClips($category, $videoName) {
    	if (($category == 'Natures') || ($category == 'SoundVision') || ($category == 'Theater')) {
    		$video = Video::where('videoName', '=', $videoName)->first();
	    	$clips = Clip::where('videoName', '=', $videoName)->paginate(4);
	    	$clipsCount = Clip::where('videoName', '=', $videoName)->count();
    		return view('pages.detail', compact('video', 'category', 'clips', 'clipsCount'));
   		} else {
   			return "404";
   		}
    }
}
