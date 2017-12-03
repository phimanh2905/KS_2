<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RoomType;

class RoomtypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roomtypes = RoomType::all();
        return view('admin.roomtype.roomtype',compact('roomtypes'));
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
        $roomtype = new RoomType();
        $roomtype->TenLoaiPhong = $request->TenLoaiPhong;
        $roomtype->DonGia = $request->DonGia;
        $roomtype->SoNguoiChuan = $request->SoNguoiChuan;
        $roomtype->SoNguoiToiDa = $request->SoNguoiToiDa;
        $roomtype->TyLeTang = $request->TyLeTang;
        $roomtype->save();
        return response()->json($roomtype);
        
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
        $roomtype = RoomType::findOrFail($id);
        $roomtype->TenLoaiPhong = $request->TenLoaiPhong;
        $roomtype->DonGia = $request->DonGia;
        $roomtype->SoNguoiChuan = $request->SoNguoiChuan;
        $roomtype->SoNguoiToiDa = $request->SoNguoiToiDa;
        $roomtype->TyLeTang = $request->TyLeTang;
        $roomtype->save();
        return response()->json($roomtype);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $roomtypes = RoomType::find($request->id)->delete();
        return response()->json();
    }
    
    // tim kiem theo nhan vien lap va ma khach hang
    public function search(Request $req) {
        $result = '';
        $roomtypes = RoomType::where('TenLoaiPhong','like','%'.$req->key.'%')
        ->orWhere('DonGia','like','%'.$req->key.'%')->orWhere('SoNguoiChuan','like','%'.$req->key.'%')->orWhere('SoNguoiToiDa','like','%'.$req->key.'%')->orWhere('TyLeTang','like','%'.$req->key.'%')->get();
        $html = view('admin.roomtype.search',compact('roomtypes'))->render();
        return response($html); 
    }
}
