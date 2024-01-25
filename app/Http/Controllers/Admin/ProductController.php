<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Category;
use File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->get();
        return view('product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('product.create' ,compact('categories'));
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
            'url' => 'required',
            'image' => 'required|image|mimes:jpeg,bmp,png,jpg,gif'
        ]);

        //get form image
        $image = $request->file('image');
        $slug = str_slug($request->title);
        $currentDate = Carbon::now()->toDateString();
        if ($request->hasFile('image')) {
            $filename = $slug .'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            $location = public_path('images/product/'.$filename);
            Image::make($image)->resize(700, 550)->save($location);
        }else{
            $filename = 'product.png';
        }


        $product = new Product();
        $product->title = $request->title;
        $product->slug = $slug;
        $product->url = $request->url;
        $product->category_id = $request->category_id;
        $product->image = $filename;
        $product->save();
        Toastr::success('product Successfully Saved :)' ,'Success');
        return redirect()->route('admin.product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        $categories = Category::all();
        //$product = Product::find($id);
        return view('product.edit',compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {
        $this->validate($request,[
            'title' => 'required',
            'url' => 'required',
            //'image' => 'required|image|mimes:jpeg,bmp,png,jpg,gif'
        ]);
          //get form image
          $image = $request->file('image');
          $slug = str_slug($request->title);
          $currentDate = Carbon::now()->toDateString();
          if ($request->hasFile('image')) {
            if(File::exists('images/product/'.$product->image)){
                File::delete('images/product/'.$product->image);
               }
              $filename = $slug .'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
              $location = public_path('images/product/'.$filename);
              Image::make($image)->resize(700, 550)->save($location);
              $product->image = $filename;
          }

        $product->title = $request->title;
        $product->slug = $slug;
        $product->url = $request->url;
        $product->category_id = $request->category_id;

        $product->save();
        Toastr::success('product Successfully Updated :)' ,'Success');
        return redirect()->route('admin.product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        if (Storage::disk('public')->exists('product/'.$product->image))
        {
            Storage::disk('public')->delete('product/'.$product->image);
        }

        $product->delete();
        Toastr::success('product Successfully Deleted :)','Success');
        return redirect()->back();
    }
}
