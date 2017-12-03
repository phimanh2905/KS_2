<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BillDetail;

class BilldetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $billdetails = BillDetail::all();
        return view('admin.billdetail.billdetail',compact('billdetails'));
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
        $billdetail = new Billdetail();
        $billdetail->MaPhong = $request->MaPhong;
        $billdetail->MaSuDungDichVu = $request->MaSuDungDichVu;
        $billdetail->MaChinhSach = $request->MaChinhSach;
        $billdetail->PhuThu = $request->PhuThu;
        $billdetail->TienPhong = $request->TienPhong;
        $billdetail->TienDichVu = $request->TienDichVu;
        $billdetail->GiamGiaKhachHang = $request->GiamGiaKhachHang;
        $billdetail->HinhThucThanhToan = $request->HinhThucThanhToan;
        $billdetail->SoNgay = $request->SoNgay;
        $billdetail->ThanhTien = $request->ThanhTien;
        // $Billdetail->TrangThai = $request->TrangThai;
        $billdetail->save();
        return response()->json($billdetail);
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
        $billdetail = Billdetail::findOrFail($id);
        $billdetail->MaPhong = $request->MaPhong;
        $billdetail->MaSuDungDichVu = $request->MaSuDungDichVu;
        $billdetail->MaChinhSach = $request->MaChinhSach;
        $billdetail->PhuThu = $request->PhuThu;
        $billdetail->TienPhong = $request->TienPhong;
        $billdetail->TienDichVu = $request->TienDichVu;
        $billdetail->GiamGiaKhachHang = $request->GiamGiaKhachHang;
        $billdetail->HinhThucThanhToan = $request->HinhThucThanhToan;
        $billdetail->SoNgay = $request->SoNgay;
        $billdetail->ThanhTien = $request->ThanhTien;
        $billdetail->save();
        return response()->json($billdetail);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
     $billdetails = Billdetail::find($request->id)->delete();
     return response()->json();
 }

   // tim kiem theo nhan vien lap va ma khach hang
 public function search(Request $req) {
    $result = '';
    $billdetails = Billdetail::where('MaPhong','like','%'.$req->key.'%')
    ->orWhere('MaSuDungDichVu','like','%'.$req->key.'%')->orWhere('MaChinhSach','like','%'.$req->key.'%')->orWhere('PhuThu','like','%'.$req->key.'%')->orWhere('TienPhong','like','%'.$req->key.'%')->orWhere('TienDichVu','like','%'.$req->key.'%')->orWhere('GiamGiaKhachHang','like','%'.$req->key.'%')->orWhere('HinhThucThanhToan','like','%'.$req->key.'%')->orWhere('SoNgay','like','%'.$req->key.'%')->orWhere('ThanhTien','like','%'.$req->key.'%')->get();
    $html = view('admin.billdetail.search',compact('billdetails'))->render();
    return response($html); 
}
}
