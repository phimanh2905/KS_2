<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ServiceUsageList;

class ServiceusagelistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $serviceusagelists = ServiceUsageList::all();
        return view('admin.serviceusagelist.serviceusagelist',compact('serviceusagelists'));
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
        $serviceusagelist = new ServiceUsageList();
        $serviceusagelist->MaDichVu = $request->MaDichVu;
        $serviceusagelist->MaNhanPhong = $request->MaNhanPhong;
        $serviceusagelist->SoLuong = $request->SoLuong;
        $serviceusagelist->save();
        return response()->json($serviceusagelist);
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
        $serviceusagelist = ServiceUsageList::findOrFail($id);
        $serviceusagelist->MaDichVu = $request->MaDichVu;
        $serviceusagelist->MaNhanPhong = $request->MaNhanPhong;
        $serviceusagelist->SoLuong = $request->SoLuong;
        
        $serviceusagelist->save();
        return response()->json($serviceusagelist);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $serviceusagelists = ServiceUsageList::find($request->id)->delete();
        return response()->json();
    }

    // tim kiem theo nhan vien lap va ma khach hang
    public function search(Request $req) {
        $result = '';
        $serviceusagelists = ServiceUsageList::where('MaDichVu','like','%'.$req->key.'%')
        ->orWhere('MaNhanPhong','like','%'.$req->key.'%')->orWhere('SoLuong','like','%'.$req->key.'%')->get();
        $html = view('admin.serviceusagelist.search',compact('serviceusagelists'))->render();
        return response($html); 
    }
}
