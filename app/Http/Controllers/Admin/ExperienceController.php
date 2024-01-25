<?php

namespace App\Http\Controllers\Admin;

use App\Myexperience;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Controllers\Controller;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $experiences = Myexperience::latest()->get();
        return view('experience.index',compact('experiences'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('experience.create');
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
            'designation' => 'required|unique:myexperiences',
            'description' => 'required',
            'company_name' => 'required',
            'session_start' => 'required',
            'session_end' => 'required',
        ]);

        $experience = new Myexperience();
        $experience->designation = $request->designation;
        $experience->description = $request->description;
        $experience->company_name = $request->company_name;
        $experience->session_start = $request->session_start;
        $experience->session_end = $request->session_end;
        $experience->save();
        Toastr::success('experience Successfully Saved :)' ,'Success');
        return redirect()->route('admin.experience.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\myexperience  $myexperience
     * @return \Illuminate\Http\Response
     */
    public function show(myexperience $myexperience)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\myexperience  $myexperience
     * @return \Illuminate\Http\Response
     */
    public function edit(myexperience $myexperience)
    {
        return view('experience.edit',compact('myexperience'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\myexperience  $myexperience
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, myexperience $myexperience)
    {
        $this->validate($request,[
            'designation' => 'required|unique:myexperiences',
            'description' => 'required',
            'company_name' => 'required',
            'session_start' => 'required',
            'session_end' => 'required',
        ]);

        $myexperience = new Myexperience();
        $myexperience->designation = $request->designation;
        $myexperience->description = $request->description;
        $myexperience->company_name = $request->company_name;
        $myexperience->session_start = $request->session_start;
        $myexperience->session_end = $request->session_end;
        $myexperience->save();
        Toastr::success('experience Successfully Saved :)' ,'Success');
        return redirect()->route('admin.experience.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\myexperience  $myexperience
     * @return \Illuminate\Http\Response
     */
    public function destroy(myexperience $myexperience)
    {
        $myexperience->delete();
        Toastr::success('experience Successfully Deleted :)','Success');
        return redirect()->back();
    }
}
