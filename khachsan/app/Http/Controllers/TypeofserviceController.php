<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TypeOfService;

class TypeofserviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typeofservices = TypeOfService::all();
        return view('admin.typeofservice.typeofservice',compact('typeofservices'));
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
        $typeofservice = new TypeOfService();
        $typeofservice->TenLoaiDichVu = $request->TenLoaiDichVu;
        $typeofservice->save();
        return response()->json($typeofservice);
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
        $typeofservice = TypeOfService::findOrFail($id);
        $typeofservice->TenLoaiDichVu = $request->TenLoaiDichVu;
        $typeofservice->save();
        return response()->json($typeofservice);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $typeofservices = TypeOfService::find($request->id)->delete();
        return response()->json();
    }

    // tim kiem theo nhan vien lap va ma khach hang
    public function search(Request $req) {
        $result = '';
        $typeofservices = TypeOfService::where('TenLoaiDichVu','like','%'.$req->key.'%')
        ->get();
        $html = view('admin.typeofservice.search',compact('typeofservices'))->render();
        return response($html); 
    }
}
