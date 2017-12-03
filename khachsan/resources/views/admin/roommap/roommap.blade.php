@extends('admin.master')
@section('content')
<div id="page-wrapper">
    @if (count($roommaps) > 0)
    <div class="row">
        <div class="col-md-12">
            @foreach($roommaps as $roommap)

            @if($roommap->MaLoaiTinhTrangPhong == 3)
            
                <div class="col-md-4">

                    <div class="panel panel-success">
                        <div class="panel-heading">

                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-home fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$roommap->TenPhong}} </div>
                                    <div>{{$roommap->GhiChu}}</div>
                                </div>
                            </div>
                            <div class="row">
                                @foreach($roommap->chiTietPhieuThuePhongs as $r)
                                <div class="col-md-6">
                                    NGÀY NHẬN: {{ $r->NgayNhan }} 
                                </div>
                                @endforeach
                                <div class="col-md-6">
                                    LOẠI PHÒNG {{ $roommap->loaiPhong->TenLoaiPhong }}
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">Xem chi tiết</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>

                </div>
            
            @elseif($roommap->MaLoaiTinhTrangPhong == 2)
            
                <div class="col-md-4">

                    <div class="panel panel-warning">
                        <div class="panel-heading">

                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-home fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$roommap->TenPhong}} </div>
                                    <div>{{$roommap->GhiChu}}</div>
                                </div>
                            </div>
                            <div class="row">
                                @foreach($roommap->chiTietPhieuThuePhongs as $r)
                                <div class="col-md-6">
                                    NGÀY NHẬN: {{ $r->NgayNhan }} 
                                </div>
                                @endforeach
                                <div class="col-md-6">
                                    LOẠI PHÒNG {{ $roommap->loaiPhong->TenLoaiPhong }}
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">Xem chi tiết</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>

                </div>
            
            @elseif($roommap->MaLoaiTinhTrangPhong == 1)
            
                <div class="col-md-4">

                    <div class="panel panel-primary">
                        <div class="panel-heading">

                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-home fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$roommap->TenPhong}} </div>
                                    <div>{{$roommap->GhiChu}}</div>
                                </div>
                            </div>
                            <div class="row">
                                @foreach($roommap->chiTietPhieuThuePhongs as $r)
                                <div class="col-md-6">
                                    NGÀY NHẬN: {{ $r->NgayNhan }} 
                                </div>
                                @endforeach
                                <div class="col-md-6">
                                    LOẠI PHÒNG {{ $roommap->loaiPhong->TenLoaiPhong }}
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">Xem chi tiết</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            @endif
            @endforeach
        </div>
    </div>
    @endif
</div>
@endsection