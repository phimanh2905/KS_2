<div id="page-wrapper">
@if (count($checkoutpolicies) > 0)
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Chính sách trả phòng
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <button class="btn btn-primary addValue" data-toggle="modal" data-target="#myModal" style="margin-bottom: 20px;"><i class="fa fa-plus"></i>
                                Thêm mới
                            </button>
                        </div>
                        <div class="col-lg-6">
                            {!! Form::text('key','', ['class'=>'form-control key','placeholder' => 'Nhập từ khóa tìm kiếm']) !!}
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" >
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Thời gian quy định</th>
                                    <th>Phụ thu</th>
                                    <th>Trạng thái</th>
                                    <th>Sửa</th>
                                    <th>Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($checkoutpolicies as $checkoutpolicy)
                                <tr class="checkoutpolicy{{$checkoutpolicy->id}}" style="text-align:center;">
                                    <td>{{$checkoutpolicy->id}}</td>
                                    <td>{{$checkoutpolicy->ThoiGianQuyDinh}}</td>
                                    <td>{{$checkoutpolicy->PhuThu}}</td>
                                    <td>
                                        <button class="btn btn-success btn-circle" type="button">
                                            <i class="fa fa-check"></i>
                                        </button>
                                        <button class="btn btn-danger btn-circle" type="button">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </td>
                                    <td>
                                        <button class="btn btn-warning editValue" data-toggle="" data-target="" value=""><i class="fa fa-pencil-square-o"></i> Sửa</button>
                                    </td>
                                    <td>
                                        <button class="btn btn-danger deleteValue" type="" value=""><i class="fa fa-trash-o" ></i> Xóa</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    <!-- /.table-responsive -->

             </div>
             <!-- /.panel-body -->
         </div>
         <!-- /.panel -->
     </div>
     <!-- /.col-lg-12 -->
 </div>
 <!-- /.row -->
</div>