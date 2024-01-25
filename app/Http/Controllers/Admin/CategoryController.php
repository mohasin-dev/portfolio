<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::latest()->get();
        return view('category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
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
            'name' => 'required|unique:categories',
            //'url' => 'required|unique:categories',
            //'image' => 'required|image|mimes:jpeg,bmp,png,jpg,gif'
        ]);


        $category = new Category();
        $category->name = $request->name;
        $category->slug = str_slug($request->name);
        $category->save();
        Toastr::success('Category Successfully Saved :)' ,'Success');
        return redirect()->route('admin.category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //$category = Category::find($id);
        return view('category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $this->validate($request,[
            'name' => 'required',
            // 'url' => 'required',
            // 'image' => 'required|image|mimes:jpeg,bmp,png,jpg,gif'
        ]);
        // get form image
//         $image = $request->file('image');
//         $slug = str_slug($request->name);
//         if (isset($image))
//         {
// //            make unique name for image
//             $currentDate = Carbon::now()->toDateString();
//             $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
// //            check category dir is exists
//             if (!Storage::disk('public')->exists('category'))
//             {
//                 Storage::disk('public')->makeDirectory('category');
//             }
//            // delete old image
//             if (Storage::disk('public')->exists('category/'.$category->image))
//             {
//                 Storage::disk('public')->delete('category/'.$category->image);
//             }
// //            resize image for category and upload
//             //$category = Image::make($image)->resize(700,550)->save();
//             $categoryImage = Image::make($image)->resize(700,550)->stream();
//             Storage::disk('public')->put('category/'.$imagename,$categoryImage);

//         }

        $category->name = $request->name;
        $category->slug = str_slug($request->name);
        $category->save();
        Toastr::success('Category Successfully Updated :)' ,'Success');
        return redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        // if (Storage::disk('public')->exists('category/'.$category->image))
        // {
        //     Storage::disk('public')->delete('category/'.$category->image);
        // }

        $category->delete();
        Toastr::success('category Successfully Deleted :)','Success');
        return redirect()->back();
    }
}
