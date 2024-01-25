<?php

namespace App\Http\Controllers\Admin;

use App\Counter;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Controllers\Controller;

class CounterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $counters = Counter::latest()->get();
        return view('counter.index',compact('counters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('counter.create');
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
            'title' => 'required|unique:counters',
            'amount' => 'required|numeric',
        ]);

        $counter = new Counter();
        $counter->title = $request->title;
        $counter->amount = $request->amount;
        $counter->save();
        Toastr::success('counter Successfully Saved :)' ,'Success');
        return redirect()->route('admin.counter.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Counter  $counter
     * @return \Illuminate\Http\Response
     */
    public function show(Counter $counter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Counter  $counter
     * @return \Illuminate\Http\Response
     */
    public function edit(Counter $counter)
    {
        return view('counter.edit',compact('counter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Counter  $counter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Counter $counter)
    {
        $this->validate($request,[
            'title' => 'required',
            'amount' => 'required|numeric',
        ]);

        $counter->title = $request->title;
        $counter->amount = $request->amount;
        $counter->save();
        Toastr::success('counter Successfully Saved :)' ,'Success');
        return redirect()->route('admin.counter.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Counter  $counter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Counter $counter)
    {
        $counter->delete();
        Toastr::success('counter Successfully Deleted :)','Success');
        return redirect()->back();
    }
}
