<?php

namespace App\Http\Controllers;

use App\Setting;
use App\User;
use App\SocialLink;
use App\Blog;
use App\Counter;
use App\Myexperience;
use App\Study;
use App\Testimonial;
use App\Service;
use App\Skill;
use App\Category;
use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Setting::all()->first();
        $user = User::all()->first();
        $socialLinks = SocialLink::latest()->take(7)->get();
        $blogs = Blog::latest()->take(2)->get();
        $counters = Counter::latest()->get();
        $experiences = Myexperience::latest()->get();
        $studies = Study::latest()->get();
        $testimonials = Testimonial::latest()->get();
        $services = Service::latest()->get();
        $skills = Skill::take(6)->get();
        $categories = Category::orderBy('name', 'asc')->get();
        $products = Product::inRandomOrder()->get();
        return view('welcome', compact('categories', 'products', 'skills', 'services', 'testimonials', 'studies', 'experiences', 'counters', 'blogs', 'socialLinks', 'user', 'settings'));
    }
}
