<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bill;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bills = Bill::all();
        return view('admin.bill.bill',compact('bills'));
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
        $bill = new Bill();
        $bill->NhanVienLap = $request->NhanVienLap;
        $bill->MaKhachHang = $request->MaKhachHang;
        $bill->MaNhanPhong = $request->MaNhanPhong;
        $bill->TongTien = $request->TongTien;
        $bill->NgayLap = $request->NgayLap;
        // $bill->TrangThai = $request->TrangThai;
        $bill->save();
        return response()->json($bill);
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
       $bill = Bill::findOrFail($id);
       $bill->NhanVienLap = $request->NhanVienLap;
       $bill->MaKhachHang = $request->MaKhachHang;
       $bill->MaNhanPhong = $request->MaNhanPhong;
       $bill->TongTien = $request->TongTien;
       $bill->NgayLap = $request->NgayLap;
        // $bill->TrangThai = $request->TrangThai;
       $bill->save();
       return response()->json($bill);
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $bills = Bill::find($request->id)->delete();
        return response()->json();
    }

// tim kiem 
    public function search(Request $req) {
        $result = '';
        $bills = Bill::where('NhanVienLap','like','%'.$req->key.'%')
        ->orWhere('MaKhachHang','like','%'.$req->key.'%')->orWhere('MaNhanPhong','like','%'.$req->key.'%')->orWhere('TongTien','like','%'.$req->key.'%')->orWhere('NgayLap','like','%'.$req->key.'%')->get();
        $html = view('admin.bill.search',compact('bills'))->render();
        return response($html); 
    }
}
