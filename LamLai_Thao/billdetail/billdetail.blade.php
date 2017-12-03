<div id="page-wrapper">
@if (count($billdetails) > 0)
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Danh sách hóa đơn
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
                                    <th>Mã phòng</th>
                                    <th>Mã sử dụng dịch vụ</th>
                                    <th>Mã chính sách</th>
                                    <th>Phụ thu</th>
                                    <th>Tiền phòng</th>
                                    <th>Tiền dịch vụ</th>
                                    <th>Giảm giá khách hàng</th>
                                    <th>Hình thức thanh toán</th>
                                    <th>Số ngày</th>
                                    <th>Thành tiền</th>
                                    <th>Trạng thái</th>
                                    <th>Sửa</th>
                                    <th>Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($billdetails as $billdetail)
                                <tr class="billdetail{{$billdetail->id}}" style="text-align:center;">
                                    <td>{{$billdetail->id}}</td>
                                    <td>{{$billdetail->Phong_id}}</td>
                                    <td>{{$billdetail->SDDichVu_id}}</td>
                                    <td>{{$billdetail->ChinhSach_id}}</td>
                                    <td>{{$billdetail->PhuThu}}</td>
                                    <td>{{$billdetail->TienPhong}}</td>
                                    <td>{{$billdetail->TienDichVu}}</td>
                                    <td>{{$billdetail->GiamGiaKhachHang}}</td>
                                    <td>{{$billdetail->HinhThucThanhToan}}</td>
                                    <td>{{$billdetail->SoNgay}}</td>
                                    <td>{{$billdetail->ThanhTien}}</td>
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