<?php

namespace App\Http\Controllers\Admin;

use App\Setting;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use File;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting = Setting::all()->first();
        return view('themeSettings.index',compact('setting'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $setting = Setting::findOrFail($id);
        return view('themeSettings.edit', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request,[
            'logo' => 'required|image|mimes:jpeg,bmp,png,jpg,gif'
        ]);
            $setting = Setting::findOrfail($id);
          //get form image

            $image = $request->file('image');
            $currentDate = Carbon::now()->toDateString();
            if ($request->hasFile('image')) {
                if(File::exists('images/logo/'.$setting->image)){
                    File::delete('images/logo/'.$setting->image);
                   }
                $filename = $currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
                $location = public_path('images/logo/'.$filename);
                Image::make($image)->resize(200, 200)->save($location);
            }
              $setting->logo = $filename;
              $setting->save();
              Toastr::success('Logo Successfully Updated :)' ,'Success');
              return redirect()->route('admin.settings.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
}
