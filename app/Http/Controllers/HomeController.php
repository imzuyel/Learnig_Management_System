<?php

namespace App\Http\Controllers;

use App\Models\Achiement;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Post;
use App\Models\Subscriber;
use App\Models\Testimonial;
use App\Models\Upcomming;
use Illuminate\Http\Request;

class HomeController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $total_banner=Banner::count();
        $total_category=Category::count();
        $total_post=Post::count();
        $total_upcomming=Upcomming::count();
        $total_achiement=Achiement::count();
        $total_testimonial=Testimonial::count();
        $total_contact=Contact::count();
        $total_subscriber=Subscriber::count();
        return view('backend.home.index',compact('total_banner', 'total_category', 'total_post', 'total_upcomming', 'total_achiement', 'total_testimonial', 'total_contact', 'total_subscriber'));
    }
}
