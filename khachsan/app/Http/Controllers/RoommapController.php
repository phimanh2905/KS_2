<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Roommap;

class RoommapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roommaps = Roommap::all();
        return view('admin.roommap.roommap',compact('roommaps'));
        // return view('admin.roommap.roommap');
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
        $roommap = new Roommap();
        $roommap->TenPhong = $request->TenPhong;
        $roommap->MaLoaiPhong = $request->MaLoaiPhong;
        $roommap->MaLoaiTinhTrangPhong = $request->MaLoaiTinhTrangPhong;
        $roommap->GhiChu = $request->GhiChu;
        // $roommap->TrangThai = $request->TrangThai;
        $roommap->save();
        return response()->json($roommap);
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
        $roommap = Roommap::findOrFail($id);
        $roommap->TenPhong = $request->TenPhong;
        $roommap->MaLoaiPhong = $request->MaLoaiPhong;
        $roommap->MaLoaiTinhTrangPhong = $request->MaLoaiTinhTrangPhong;
        $roommap->GhiChu = $request->GhiChu;
        // $roommap->TrangThai = $request->TrangThai;
        $roommap->save();
        return response()->json($roommap);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $roommaps = Roommap::find($request->id)->delete();
        return response()->json();
    }

    public function search(Request $req) {
        $result = '';
        $roommaps = Roommap::where('MaLoaiPhong','like','%'.$req->key.'%')
        ->orWhere('MaLoaiTinhTrangPhong','like','%'.$req->key.'%')->orWhere('GhiChu','like','%'.$req->key.'%')->orWhere('TenPhong','like','%'.$req->key.'%')->get();
        $html = view('admin.roommap.search',compact('roommaps'))->render();
        return response($html); 
    }
}
