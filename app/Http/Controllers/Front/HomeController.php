<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slide;
use App\Models\Feature;
use App\Models\Testimonial;
use App\Models\Post;
use App\Models\Room;
use App\Models\Customer;

class HomeController extends Controller
{


    public function index() {

        $slide_all = Slide::get();
        $feature_all = Feature::get();
        $testimonial_all = Testimonial::get();
        // $post_all = Post::orderBy('id','desc')->limit(6)->get();
        // $post_all = Post::orderBy('id','desc')->limit(6)->get();
        $post_all = Post::select()->inRandomOrder()->limit(6)->get();
        // $rooms=Room::select()->where('active',true)->inRandomOrder()->limit(4)->get();
        $room_all = Room::get();

        return view('front.home', compact('slide_all', 'feature_all', 'testimonial_all', 'post_all', 'room_all'));

    }

}
