<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CheckOutPolicy;

class CheckoutpolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $checkoutpolicys = CheckOutPolicy::all();
        return view('admin.checkoutpolicy.checkoutpolicy',compact('checkoutpolicys'));
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
        $checkoutpolicy = new CheckOutPolicy();
        $checkoutpolicy->ThoiGianQuyDinh = $request->ThoiGianQuyDinh;
        $checkoutpolicy->PhuThu = $request->PhuThu;
        
        // $checkoutpolicy->TrangThai = $request->TrangThai;
        $checkoutpolicy->save();
        return response()->json($checkoutpolicy);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $checkoutpolicy = CheckOutPolicy::findOrFail($id);
        $checkoutpolicy->ThoiGianQuyDinh = $request->ThoiGianQuyDinh;
        $checkoutpolicy->PhuThu = $request->PhuThu;
        
        // $checkoutpolicy->TrangThai = $request->TrangThai;
        $checkoutpolicy->save();
        return response()->json($checkoutpolicy);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $checkoutpolicys = CheckOutPolicy::find($request->id)->delete();
        return response()->json();
    }

    // tim kiem theo nhan vien lap va ma khach hang
    public function search(Request $req) {
        $result = '';
        $checkoutpolicys = CheckOutPolicy::where('ThoiGianQuyDinh','like','%'.$req->key.'%')
        ->orWhere('PhuThu','like','%'.$req->key.'%')->get();
        $html = view('admin.checkoutpolicy.search',compact('checkoutpolicys'))->render();
        return response($html); 
    }
}
