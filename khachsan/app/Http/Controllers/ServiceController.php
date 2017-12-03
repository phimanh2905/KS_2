<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();
        return view('admin.service.service',compact('services'));
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
        $service = new Service();
        $service->MaLoaiDichVu = $request->MaLoaiDichVu;
        $service->MaDonVi = $request->MaDonVi;
        $service->DonGia = $request->DonGia;
        $service->save();
        return response()->json($service);
        
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
        $service = Service::findOrFail($id);
        $service->MaLoaiDichVu = $request->MaLoaiDichVu;
        $service->MaDonVi = $request->MaDonVi;
        $service->DonGia = $request->DonGia;
        
        $service->save();
        return response()->json($service);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $services = Service::find($request->id)->delete();
        return response()->json();
    }

    // tim kiem theo nhan vien lap va ma khach hang
    public function search(Request $req) {
        $result = '';
        $services = Service::where('MaLoaiDichVu','like','%'.$req->key.'%')
        ->orWhere('MaDonVi','like','%'.$req->key.'%')->orWhere('DonGia','like','%'.$req->key.'%')->get();
        $html = view('admin.service.search',compact('services'))->render();
        return response($html); 
    }
}
