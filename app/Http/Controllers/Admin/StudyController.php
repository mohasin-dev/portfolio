<?php

namespace App\Http\Controllers\Admin;

use App\Study;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Controllers\Controller;

class StudyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $studies = Study::latest()->get();
        return view('study.index',compact('studies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('study.create');
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
            'exam_title' => 'required|unique:studies',
            'description' => 'required',
            'university' => 'required',
            'session_start' => 'required',
            'session_end' => 'required',
        ]);

        $study = new Study();
        $study->exam_title = $request->exam_title;
        $study->description = $request->description;
        $study->university = $request->university;
        $study->session_start = $request->session_start;
        $study->session_end = $request->session_end;
        $study->save();
        Toastr::success('study Successfully Saved :)' ,'Success');
        return redirect()->route('admin.study.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Study  $study
     * @return \Illuminate\Http\Response
     */
    public function show(Study $study)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Study  $study
     * @return \Illuminate\Http\Response
     */
    public function edit(Study $study)
    {
        return view('study.edit',compact('study'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Study  $study
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Study $study)
    {
        $this->validate($request,[
            'exam_title' => 'required',
            'description' => 'required',
            'university' => 'required',
            'session_start' => 'required',
            'session_end' => 'required',
        ]);

        $study->exam_title = $request->exam_title;
        $study->description = $request->description;
        $study->university = $request->university;
        $study->session_start = $request->session_start;
        $study->session_end = $request->session_end;
        $study->save();
        Toastr::success('study Successfully Saved :)' ,'Success');
        return redirect()->route('admin.study.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Study  $study
     * @return \Illuminate\Http\Response
     */
    public function destroy(Study $study)
    {
        $study->delete();
        Toastr::success('study Successfully Deleted :)','Success');
        return redirect()->back();
    }
}
