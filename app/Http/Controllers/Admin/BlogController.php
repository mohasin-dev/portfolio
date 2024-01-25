<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Subscriber;
use App\Blog;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Broadcasting\Channel;
use Illuminate\Support\Facades\Notification;
use App\Notifications\SubscriberNotify;


class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::latest()->get();
        return view('blog.index',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,bmp,png,jpg,gif'
        ]);

        $image = $request->file('image');
        $slug = str_slug($request->title);
        $currentDate = Carbon::now()->toDateString();
        if ($request->hasFile('image')) {
            $filename = $slug .'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            $location = public_path('images/blog/'.$filename);
            Image::make($image)->resize(700, 465)->save($location);
        }else{
            $filename = 'blog.png';
        }

        $blog = new Blog();
        $blog->title = $request->title;
        $blog->slug = $slug;
        $blog->description = $request->description;
        $blog->user_id = Auth::user()->id;
        $blog->image = $filename;
        $blog->save();

        $subscribers = Subscriber::all();

        foreach($subscribers as $subscriber){
            Notification::route('mail',   $subscriber->email)
            ->notify(new SubscriberNotify($blog));
        }

        Toastr::success('blog Successfully Saved :)' ,'Success');
        return redirect()->route('admin.blog.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        //
    }
}
