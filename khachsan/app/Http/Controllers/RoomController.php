<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = Room::all();
        return view('admin.room.room',compact('rooms'));
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
        $room = new Room();
        $room->TenPhong = $request->TenPhong;
        $room->MaLoaiPhong = $request->MaLoaiPhong;
        $room->MaLoaiTinhTrangPhong = $request->MaLoaiTinhTrangPhong;
        $room->GhiChu = $request->GhiChu;
        // $room->TrangThai = $request->TrangThai;
        $room->save();
        return response()->json($room);
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
        $room = Room::findOrFail($id);
        $room->TenPhong = $request->TenPhong;
        $room->MaLoaiPhong = $request->MaLoaiPhong;
        $room->MaLoaiTinhTrangPhong = $request->MaLoaiTinhTrangPhong;
        $room->GhiChu = $request->GhiChu;
        // $room->TrangThai = $request->TrangThai;
        $room->save();
        return response()->json($room);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $rooms = Room::find($request->id)->delete();
        return response()->json();
    }

    public function search(Request $req) {
        $result = '';
        $rooms = Room::where('MaLoaiPhong','like','%'.$req->key.'%')
        ->orWhere('MaLoaiTinhTrangPhong','like','%'.$req->key.'%')->orWhere('GhiChu','like','%'.$req->key.'%')->orWhere('TenPhong','like','%'.$req->key.'%')->get();
        $html = view('admin.room.search',compact('rooms'))->render();
        return response($html); 
    }
}
