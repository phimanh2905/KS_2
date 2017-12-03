<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Regulation;

class RegulationController extends Controller
{
	public function index()
	{
		$regulations = Regulation::all();
		return view('admin.regulation.regulation',compact('regulations'));
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
        $regulation = new Regulation();
        $regulation->TenQuiDinh = $request->TenQuiDinh;
        $regulation->Mota = $request->Mota;
        
        // $regulation->TrangThai = $request->TrangThai;
        $regulation->save();
        return response()->json($regulation);
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
        $regulation = Regulation::findOrFail($id);
        $regulation->TenQuiDinh = $request->TenQuiDinh;
        $regulation->Mota = $request->Mota;
        
        // $regulation->TrangThai = $request->TrangThai;
        $regulation->save();
        return response()->json($regulation);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $regulations = Regulation::find($request->id)->delete();
        return response()->json();
    }

    public function search(Request $req) {
        $result = '';
        $regulations = Regulation::where('TenQuiDinh','like','%'.$req->key.'%')->orWhere('Mota','like','%'.$req->key.'%')
        ->get();
        $html = view('admin.regulation.search',compact('regulations'))->render();
        return response($html); 
    }
}
