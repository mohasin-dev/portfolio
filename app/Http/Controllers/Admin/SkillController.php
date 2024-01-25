<?php

namespace App\Http\Controllers\Admin;

use App\Skill;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Controllers\Controller;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skills = Skill::latest()->get();
        return view('skill.index',compact('skills'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('skill.create');
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
            'name' => 'required|unique:skills',
            'skill_rate' => 'required',
            
        ]);

        $skill = new skill();
        $skill->name = $request->name;
        $skill->skill_rate = $request->skill_rate;
        $skill->save();
        Toastr::success('skill Successfully Saved :)' ,'Success');
        return redirect()->route('admin.skill.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function show(Skill $skill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function edit(Skill $skill)
    {
        return view('skill.edit',compact('skill'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Skill $skill)
    {
        $this->validate($request,[
            'name' => 'required',
            'skill_rate' => 'required',
            
        ]);

        $skill->name = $request->name;
        $skill->skill_rate = $request->skill_rate;
        $skill->save();
        Toastr::success('skill Successfully Saved :)' ,'Success');
        return redirect()->route('admin.skill.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Skill  $skill
     * @return \Illuminate\Http\Response
     */
    public function destroy(Skill $skill)
    {
        $skill->delete();
        Toastr::success('skill Successfully Deleted :)','Success');
        return redirect()->back();
    }
}
