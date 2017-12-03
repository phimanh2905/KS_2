@extends('admin.master')
@section('content')
<div id="page-wrapper">
    @if (count($roommaps) > 0)
    <div class="row">
        <div class="col-lg-12">
            @foreach($roommaps as $roommap)
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
                            <div class="col-md-6">
                                NGÀY NHẬN
                            </div>
                            <div class="col-md-6">
                                LOẠI PHÒNG
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
            @endforeach

            <!-- <div class="col-md-4">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-home fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">203</div>
                                <div>ĐÃ ĐẶT</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                
                                THỜI GIAN VÀO
                            </div>
                            <div class="col-md-6">
                                
                                LOẠI PHÒNG
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
            </div> -->
            

        </div>
    </div>
    @endif
</div>
@endsection