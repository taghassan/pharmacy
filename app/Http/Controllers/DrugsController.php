<?php

namespace App\Http\Controllers;

use App\drugs;
use Illuminate\Http\Request;

class DrugsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        drugs::create($request->all());
        \Session::flash("success","تم الحفظ بنجاح ");
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\drugs  $drugs
     * @return \Illuminate\Http\Response
     */
    public function show(drugs $drugs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\drugs  $drugs
     * @return \Illuminate\Http\Response
     */
    public function edit(drugs $drugs,$id)
    {
        return view("edit_drugs")->with("data",$drugs::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\drugs  $drugs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, drugs $drugs,$id)
    {
        $data=$request->all();
        if($request->status==null){
            $data["status"]=0;
        }
        $drugs::find($id)->update($data);
        \Session::flash("success","تم الحفظ بنجاح ");
        return redirect("home");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\drugs  $drugs
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $drugs= drugs::find($id)->delete();
        \Session::flash("success","تم الحذف بنجاح ");
        return back();
    }
}
