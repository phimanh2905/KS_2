<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RoomReservationDetail;

class RoomreservationdetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roomreservationdetails = RoomReservationDetail::all();
        return view('admin.roomreservationdetail.roomreservationdetail',compact('roomreservationdetails'));
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
       $roomreservationdetail = new RoomReservationDetail();
       $roomreservationdetail->MaPhong = $request->MaPhong;
       $roomreservationdetail->MaKhachHang = $request->MaKhachHang;
       $roomreservationdetail->NgayDangKi = $request->NgayDangKi;
       $roomreservationdetail->NgayNhan = $request->NgayNhan;
        // $roomreservationdetail->TrangThai = $request->TrangThai;
       $roomreservationdetail->save();
       return response()->json($roomreservationdetail);
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
        $roomreservationdetail = RoomReservationDetail::findOrFail($id);
        $roomreservationdetail->MaPhong = $request->MaPhong;
        $roomreservationdetail->MaKhachHang = $request->MaKhachHang;
        $roomreservationdetail->NgayDangKi = $request->NgayDangKi;
        $roomreservationdetail->NgayNhan = $request->NgayNhan;
        // $roomreservationdetail->TrangThai = $request->TrangThai;
        $roomreservationdetail->save();
        return response()->json($roomreservationdetail);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $roomreservationdetails = RoomReservationDetail::find($request->id)->delete();
        return response()->json();
    }

    public function search(Request $req) {
        $result = '';
        $roomreservationdetails = RoomReservationDetail::where('MaPhong','like','%'.$req->key.'%')
        ->orWhere('MaKhachHang','like','%'.$req->key.'%')->orWhere('NgayDangKi','like','%'.$req->key.'%')->orWhere('NgayNhan','like','%'.$req->key.'%')->get();
        $html = view('admin.roomreservationdetail.search',compact('roomreservationdetails'))->render();
        return response($html); 
    }
}
