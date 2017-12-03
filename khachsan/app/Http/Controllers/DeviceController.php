<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Device;

class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $devices = Device::all();
        return view('admin.device.device',compact('devices'));
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
        //
        $device = new Device();
        $device->TenThietBi = $request->TenThietBi;
        $device->MaLoaiPhong = $request->MaLoaiPhong;
        $device->SoLuong = $request->SoLuong;
        // $device->TrangThai = $request->TrangThai;
        $device->save();
        return response()->json($device);
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
        $device = Device::findOrFail($id);
        $device->TenThietBi = $request->TenThietBi;
        $device->MaLoaiPhong = $request->MaLoaiPhong;
        $device->SoLuong = $request->SoLuong;
        // $device->TrangThai = $request->TrangThai;
        $device->save();
        return response()->json($device);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $devices = Device::find($request->id)->delete();
        return response()->json();
    }

    public function search(Request $req) {
        $result = '';
        $devices = Device::where('TenThietBi','like','%'.$req->key.'%')
        ->orWhere('MaLoaiPhong','like','%'.$req->key.'%')->orWhere('SoLuong','like','%'.$req->key.'%')->get();
        $html = view('admin.device.search',compact('devices'))->render();
        return response($html); 
    }
}
