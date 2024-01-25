<?php

namespace App\Http\Controllers\Admin;

use App\Setting;
use App\Blog;
use App\Subscriber;
use App\Product;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use File;

class DashboardController extends Controller
{
    public  function index()
    {
        $setting = Setting::all()->first();
        $blogs = Blog::all();
        $subscribers = Subscriber::all();
        $products = Product::all();
        $blogs = Blog::all();
        return view('dashboard', compact('blogs', 'subscribers', 'products', 'setting'));
    }

    public  function adminProfile()
    {
        $admin = User::all()->first();
        return view('profile.index',compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('profile.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $user = Auth::user();

        $this->validate($request,[
            'name' => 'required|unique:users,name,'.$user->id,
            'email' => 'required|unique:users,email,'.$user->id,
            'email2' => 'required|unique:users,email2,'.$user->id,
            'designation' => 'required',
            'contact1' => 'required|unique:users,contact1,'.$user->id,
            'contact2' => 'required|unique:users,contact2,'.$user->id,
            'address' => 'required',
            'website1' => 'required',
            'about_me' => 'required',
            'about_skill' => 'required',
            'about_service' => 'required',
            'about_quality' => 'required',
            'website2' => 'required',
            //'avatar' => 'required|image|mimes:jpeg,bmp,png,jpg,gif'
        ]);

          //get form image
        $slug = str_slug($request->name);
        $user = User::find($id);
        
        if ($request->hasFile('avatar')) {
            if(File::exists('storage/user/' .$user->avatar)){
                File::delete('storage/user/' .$user->avatar);
            }

            $image = $request->file('avatar');
            $currentDate = Carbon::now()->toDateString();
            $img = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            $location = public_path('storage/user/'.$img);
            Image::make($image)->resize(561, 750)->save($location);
        }else{
            $img = 'demo.png';
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->email2 = $request->email2;
        $user->designation = $request->designation;
        $user->contact1 = $request->contact1;
        $user->contact2 = $request->contact2;
        $user->about_me = $request->about_me;
        $user->about_skill = $request->about_skill;
        $user->about_service = $request->about_service;
        $user->about_quality = $request->about_quality;
        $user->address = $request->address;
        $user->website1 = $request->website1;
        $user->website2 = $request->website2;
        $user->avatar = $img;
        $user->save();
        Toastr::success('product Successfully Updated :)' ,'Success');
        return redirect()->route('admin.product.index');
    }

    public function editPassword()
    {
        return view('profile.changePassword');
    }

    public function updatePassword(Request $request)
    {
        $this->validate($request,[
            'old_password' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->old_password,$hashedPassword))
        {
            if (!Hash::check($request->password,$hashedPassword))
            {
                $user = User::find(Auth::id());
                $user->password = Hash::make($request->password);
                $user->save();
                Toastr::success('Password Successfully Changed','Success');
                Auth::logout();
                return redirect()->route('admin.profile.index');
            } else {
                Toastr::error('New password cannot be the same as old password.','Error');
                return redirect()->back();
            }
        } else {
            Toastr::error('Current password not match.','Error');
            return redirect()->back();
        }

    }


}
