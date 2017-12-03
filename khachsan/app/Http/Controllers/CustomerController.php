<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();
        return view('admin.customer.customer',compact('customers'));
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
        $customer = new Customer();
        $customer->TenKhachHang = $request->TenKhachHang;
        $customer->CMND = $request->CMND;
        $customer->GioiTinh = $request->GioiTinh;
        $customer->DiaChi = $request->DiaChi;
        $customer->DienThoai = $request->DienThoai;
        $customer->QuocTich = $request->QuocTich;

        // $customer->TrangThai = $request->TrangThai;
        $customer->save();
        return response()->json($customer);
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
        $customer = Customer::findOrFail($id);
        $customer->TenKhachHang = $request->TenKhachHang;
        $customer->CMND = $request->CMND;
        $customer->GioiTinh = $request->GioiTinh;
        $customer->DiaChi = $request->DiaChi;
        $customer->DienThoai = $request->DienThoai;
        $customer->QuocTich = $request->QuocTich;

        // $customer->TrangThai = $request->TrangThai;
        $customer->save();
        return response()->json($customer);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $customers = Customer::find($request->id)->delete();
        return response()->json();
    }

    // tim kiem theo nhan vien lap va ma khach hang
    public function search(Request $req) {
        $result = '';
        $customers = Customer::where('TenKhachHang','like','%'.$req->key.'%')
        ->orWhere('CMND','like','%'.$req->key.'%')->orWhere('GioiTinh','like','%'.$req->key.'%')->orWhere('DiaChi','like','%'.$req->key.'%')->orWhere('DienThoai','like','%'.$req->key.'%')->orWhere('QuocTich','like','%'.$req->key.'%')->get();
        $html = view('admin.customer.search',compact('customers'))->render();
        return response($html); 
    }
}
