<?php

namespace App\Http\Controllers\Admin;

use App\Testimonial;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = Testimonial::latest()->get();
        return view('testimonial.index',compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('testimonial.create');
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
            'client_name' => 'required',
            'description' => 'required|max:100',
            'image' => 'required|image|mimes:jpeg,bmp,png,jpg,gif'
        ]);

        //get form image
        //get form image
        $image = $request->file('image');
        $slug = str_slug($request->title);
        $currentDate = Carbon::now()->toDateString();
        if ($request->hasFile('image')) {
            $filename = $slug .'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            $location = public_path('images/testimonial/'.$filename);
            Image::make($image)->resize(150, 150)->save($location);
        }else{
            $filename = 'testimonial.png';
        }

        $testimonial = new Testimonial();
        $testimonial->client_name = $request->client_name;
        $testimonial->description = $request->description;
        $testimonial->image = $filename;
        $testimonial->save();
        Toastr::success('testimonial Successfully Saved :)' ,'Success');
        return redirect()->route('admin.testimonial.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimonial $testimonial)
    {
        return view('testimonial.edit',compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        $this->validate($request,[
            'client_name' => 'required',
            'description' => 'required|max:100',
            //'image' => 'required|image|mimes:jpeg,bmp,png,jpg,gif'
        ]);

        //get form image
        $image = $request->file('image');
          $slug = str_slug($request->title);
          $currentDate = Carbon::now()->toDateString();
          if ($request->hasFile('image')) {
            if(File::exists('images/product/'.$testimonial->image)){
                File::delete('images/product/'.$testimonial->image);
               }
              $filename = $slug .'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
              $location = public_path('images/testimonial/'.$filename);
              Image::make($image)->resize(150, 150)->save($location);
          }

        $testimonial->client_name = $request->client_name;
        $testimonial->description = $request->description;
        $testimonial->image = $filename;
        $testimonial->save();
        Toastr::success('testimonial Successfully Updated :)' ,'Success');
        return redirect()->route('admin.testimonial.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();
        Toastr::success('testimonial Successfully Deleted :)','Success');
        return redirect()->back();
    }
}
