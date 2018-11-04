<?php

namespace App\Http\Controllers;

use App\pharmacy;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PharmacyController extends Controller
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
        pharmacy::create($request->all());
        \Session::flash("success","تم الحفظ بنجاح ");
        return redirect("home");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\pharmacy  $pharmacy
     * @return \Illuminate\Http\Response
     */
    public function show(pharmacy $pharmacy)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\pharmacy  $pharmacy
     * @return \Illuminate\Http\Response
     */
    public function edit(pharmacy $pharmacy,$id)
    {
        $data=$pharmacy::find($id);
        return view('edite_ph')->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\pharmacy  $pharmacy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pharmacy $pharmacy,$id)
    {
        $pharmacy::find($id)->update($request->all());
        \Session::flash("success","تم الحفظ بنجاح ");
        return redirect("home");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\pharmacy  $pharmacy
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(pharmacy::find($id)->user()->count() > 0){

            \Session::flash("alert","لايمكن الحذف  الصيدية تحتوي  علي مستخدمين");
            return back();
        }
        else{
            pharmacy::find($id)->delete();
            \Session::flash("success","تم الحذف بنجاح ");
            return back();
        }
    }
}
