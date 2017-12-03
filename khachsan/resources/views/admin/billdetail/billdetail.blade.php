@extends('admin.master')
@section('content')
<div id="page-wrapper">
    @if (count($billdetails) > 0)
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Chi tiết hóa đơn
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <button class="btn btn-success addValue" data-toggle="modal" data-target="#myModal" style="margin-bottom: 20px;"><i class="fa fa-plus"></i>
                                Thêm mới
                            </button>
                        </div>
                        <div class="col-lg-6">
                            {!! Form::text('key','', ['class'=>'form-control key','placeholder' => 'Nhập từ khóa tìm kiếm']) !!}
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" style="text-align:center;">
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
                                    <th>Xem chi tiết</th>
                                    <th>Sửa</th>
                                    <th>Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($billdetails as $billdetail)
                                <tr class="billdetail{{$billdetail->id}}" >
                                    <td>{{$billdetail->id}}</td>
                                    <td>{{$billdetail->MaPhong}}</td>
                                    <td>{{$billdetail->MaSuDungDichVu}}</td>
                                    <td>{{$billdetail->MaChinhSach}}</td>
                                    <td>{{$billdetail->PhuThu}}</td>
                                    <td>{{$billdetail->TienPhong}}</td>
                                    <td>{{$billdetail->TienDichVu}}</td>
                                    <td>{{$billdetail->GiamGiaKhachHang}}</td>
                                    <td>{{$billdetail->HinhThucThanhToan}}</td>
                                    <td>{{$billdetail->SoNgay}}</td>
                                    <td>{{$billdetail->ThanhTien}}</td>
                                    <td>
                                        <button class="btn btn-info detailValue" data-toggle="modal" data-target="#myModal" value="{{$billdetail->id}}""><i class="fa fa-eye"></i> Xem</button>
                                    </td>
                                    <td>
                                        <button class="btn btn-warning editValue" data-toggle="modal" data-target="#myModal" value="{{$billdetail->id}}""><i class="fa fa-pencil-square-o"></i> Sửa</button>
                                    </td>
                                    <td>
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['billdetail.destroy',$billdetail->id]]) !!}
                                        <button class="btn btn-danger deleteValue" type="submit" value="{{$billdetail->id}}"><i class="fa fa-trash-o" ></i> Xóa</button>
                                        {!! Form::close() !!}
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
@endif
@endsection
@section('script')

<script type="text/javascript">

    $(document).ready(function() {

        /* Add value - P.Manh - 7/11/17*/

        $('.addValue').click(function() {
            $('#id').val('');
            $('#MaPhong').val('');
            $('#MaSuDungDichVu').val('');
            $('#MaChinhSach').val('');
            $('#PhuThu').val('');
            $('#TienPhong').val('');
            $('#TienDichVu').val('');
            $('#GiamGiaKhachHang').val('');
            $('#HinhThucThanhToan').val('');
            $('#SoNgay').val('');
            $('#ThanhTien').val('');
            $('#password').parent('div').show();
            $('#id').parent('div').hide();
            $('.createValue').show();
            $('.updateValue').hide();
        });
        $('.createValue').click(function(e){
            e.preventDefault();
            var MaPhong = $('#MaPhong').val();
            var MaSuDungDichVu = $('#MaSuDungDichVu').val();
            var MaChinhSach = $('#MaChinhSach').val();
            var PhuThu = $('#PhuThu').val();
            var TienPhong = $('#TienPhong').val();
            var TienDichVu = $('#TienDichVu').val();
            var GiamGiaKhachHang = $('#GiamGiaKhachHang').val();
            var HinhThucThanhToan = $('#HinhThucThanhToan').val();
            var SoNgay = $('#SoNgay').val();
            var ThanhTien = $('#ThanhTien').val();
            if(MaPhong != '' && MaSuDungDichVu != '' && MaChinhSach != '' && PhuThu != '' && TienPhong != '' && TienDichVu != '' && TienDichVu != '' && GiamGiaKhachHang != '' && HinhThucThanhToan != '' && SoNgay != '' && ThanhTien != '' ) {
                $.ajax({
                    url : '/billdetail',
                    dataType : 'json',
                    type : 'POST',
                    data : {
                        _token: $('input[name=_token]').val(),
                        MaPhong : MaPhong,
                        MaSuDungDichVu : MaSuDungDichVu,
                        MaChinhSach : MaChinhSach,
                        PhuThu: PhuThu,
                        TienPhong : TienPhong,
                        TienDichVu : TienDichVu,
                        GiamGiaKhachHang : GiamGiaKhachHang,
                        HinhThucThanhToan : HinhThucThanhToan,
                        SoNgay : SoNgay,
                        ThanhTien : ThanhTien
                    }
                }).done(function(response) {
                    $('#myModal').modal('hide');
                    // $('tbody tr').append("<tr class='billdetail" + response.id + "' ><td>" + data.id + "</td><td>" + response.MaPhong + "</td><td>" + response.MaSuDungDichVu + "</td><td>" + response.MaChinhSach + "</td><td>" + response.PhuThu + "</td><td>" + response.TienPhong + "</td><td>" + response.TienDichVu + "</td><td>" + response.GiamGiaKhachHang + "</td><td>" + response.HinhThucThanhToan + "</td><td>" + response.HinhThucThanhToan + "</td><td>" + response.SoNgay + "</td><td>" + response.ThanhTien + "</td><td><button class='btn btn-warning editValue' data-toggle = 'modal' data-target='#myModal' value ='" + response.id + "'><i class='fa fa-pencil-square-o'></i> Sửa</button></td><td><button type='submit' class='btn btn-danger deleteValue' value='" + response.id + "'><i class='fa fa-trash-o'></i> Xóa</button></td></tr>");
                });
            }
            history.go(0);
        });

        /* Xem chi tiết - P.Manh - 2/12/17*/

        $('.detailValue').click(function() {
            var id = $(this).val();
            var MaPhong = $(this).parent().prev("td").prev("td").prev("td").prev("td").prev("td").prev("td").prev("td").prev("td").prev("td").prev("td").text();
            var MaSuDungDichVu = $(this).parent().prev("td").prev("td").prev("td").prev("td").prev("td").prev("td").prev("td").prev("td").prev("td").text();
            var MaChinhSach = $(this).parent().prev("td").prev("td").prev("td").prev("td").prev("td").prev("td").prev("td").prev("td").text();
            var PhuThu = $(this).parent().prev("td").prev("td").prev("td").prev("td").prev("td").prev("td").prev("td").text();
            var TienPhong = $(this).parent().prev("td").prev("td").prev("td").prev("td").prev("td").prev("td").text();
            var TienDichVu = $(this).parent().prev("td").prev("td").prev("td").prev("td").prev("td").text();
            var GiamGiaKhachHang = $(this).parent().prev("td").prev("td").prev("td").prev("td").text();
            var HinhThucThanhToan = $(this).parent().prev("td").prev("td").prev("td").text();
            var SoNgay = $(this).parent().prev("td").prev("td").text();
            var ThanhTien = $(this).parent().prev("td").text();
            $('#id').val(id);
            $('#MaPhong').val(MaPhong);
            $('#MaSuDungDichVu').val(MaSuDungDichVu);
            $('#MaChinhSach').val(MaChinhSach);
            $('#PhuThu').val(PhuThu);
            $('#TienPhong').val(TienPhong);
            $('#TienDichVu').val(TienDichVu);
            $('#GiamGiaKhachHang').val(GiamGiaKhachHang);
            $('#HinhThucThanhToan').val(HinhThucThanhToan);
            $('#SoNgay').val(SoNgay);
            $('#ThanhTien').val(ThanhTien);
            $('#id').parent('div').hide();
            $('.createValue').hide();
            $('.updateValue').hide();
        });

        /* Sửa value - P.Manh - 5/11/17*/

        $('.editValue').click(function() {
            var id = $(this).val();
            var MaPhong = $(this).parent().prev("td").prev("td").prev("td").prev("td").prev("td").prev("td").prev("td").prev("td").prev("td").prev("td").prev("td").prev("td").text();
            var MaSuDungDichVu = $(this).parent().prev("td").prev("td").prev("td").prev("td").prev("td").prev("td").prev("td").prev("td").prev("td").prev("td").prev("td").text();
            var MaChinhSach = $(this).parent().prev("td").prev("td").prev("td").prev("td").prev("td").prev("td").prev("td").prev("td").prev("td").text();
            var PhuThu = $(this).parent().prev("td").prev("td").prev("td").prev("td").prev("td").prev("td").prev("td").prev("td").text();
            var TienPhong = $(this).parent().prev("td").prev("td").prev("td").prev("td").prev("td").prev("td").prev("td").text();
            var TienDichVu = $(this).parent().prev("td").prev("td").prev("td").prev("td").prev("td").prev("td").text();
            var GiamGiaKhachHang = $(this).parent().prev("td").prev("td").prev("td").prev("td").prev("td").text();
            var HinhThucThanhToan = $(this).parent().prev("td").prev("td").prev("td").prev("td").text();
            var SoNgay = $(this).parent().prev("td").prev("td").prev("td").text();
            var ThanhTien = $(this).parent().prev("td").prev("td").text();
            $('#id').val(id);
            $('#MaPhong').val(MaPhong);
            $('#MaSuDungDichVu').val(MaSuDungDichVu);
            $('#MaChinhSach').val(MaChinhSach);
            $('#PhuThu').val(PhuThu);
            $('#TienPhong').val(TienPhong);
            $('#TienDichVu').val(TienDichVu);
            $('#GiamGiaKhachHang').val(GiamGiaKhachHang);
            $('#HinhThucThanhToan').val(HinhThucThanhToan);
            $('#SoNgay').val(SoNgay);
            $('#ThanhTien').val(ThanhTien);
            $('#id').parent('div').hide();
            $('.createValue').hide();
            $('.updateValue').show();
        });
        $('.updateValue').click(function(e) {
            e.preventDefault();
            var id = $('#id').val();
            var MaSuDungDichVu = $('#MaSuDungDichVu').val();
            var MaPhong = $('#MaPhong').val();
            var MaChinhSach = $('#MaChinhSach').val();
            var PhuThu = $('#PhuThu').val();
            var TienPhong = $('#TienPhong').val();
            var TienDichVu = $('#TienDichVu').val();
            var GiamGiaKhachHang = $('#GiamGiaKhachHang').val();
            var HinhThucThanhToan = $('#HinhThucThanhToan').val();
            var SoNgay = $('#SoNgay').val();
            var ThanhTien = $('#ThanhTien').val();
            if(MaPhong != '' && MaSuDungDichVu != '' && MaChinhSach != '' && PhuThu != '' && TienPhong != '' && TienDichVu != '' && TienDichVu != '' && GiamGiaKhachHang != '' && HinhThucThanhToan != '' && SoNgay != '' && ThanhTien != '' ) {
                $.ajax({
                    dataType : 'json',
                    type : 'PUT',

                    // router
                    url : '/billdetail/'+id,
                    data : {
                        _token: $('input[name=_token]').val(),
                        id : id,
                        MaPhong : MaPhong,
                        MaSuDungDichVu : MaSuDungDichVu,
                        MaChinhSach : MaChinhSach,
                        PhuThu: PhuThu,
                        TienPhong : TienPhong,
                        TienDichVu : TienDichVu,
                        GiamGiaKhachHang : GiamGiaKhachHang,
                        HinhThucThanhToan : HinhThucThanhToan,
                        SoNgay : SoNgay,
                        ThanhTien : ThanhTien
                        
                    }
                }).done(function(data) {
                   $('#myModal').modal('hide');
                   // $(".billdetail"+id).replaceWith(
                   //  ("<tr class='billdetail" + data.id + "' ><td>" + data.id + "</td><td>" + data.MaPhong + "</td><td>" + data.MaSuDungDichVu + "</td><td>" + data.MaChinhSach + "</td><td>" + data.PhuThu + "</td><td>" + data.TienPhong + "</td><td>" + data.TienDichVu + "</td><td>" + data.GiamGiaKhachHang + "</td><td>" + data.HinhThucThanhToan + "</td><td>" + data.SoNgay + "</td> <td><button class='btn btn-info detailValue' data-toggle = 'modal' data-target='#myModal' value ='" + data.id + "'><i class='fa fa-eye'></i> Xem</button></td>  <td>" + data.ThanhTien + "</td><td><button class='btn btn-warning editValue' data-toggle = 'modal' data-target='#myModal' value ='" + data.id + "'><i class='fa fa-pencil-square-o'></i> Sửa</button></td><td><button type='submit' class='btn btn-danger deleteValue' value='" + data.id + "'><i class='fa fa-trash-o'></i> Xóa</button></td></tr>")
                   //  );
               })
            }
            history.go(0);
        })

        // Xóa value - P.Manh - 5/11/17

        $(document).on('click', '.deleteValue', function(e) {
            e.preventDefault();
            var id = $(this).val();
            $.ajax({
                type : 'DELETE',
                url : '/billdetail/'+id,
                data : {
                    _token: $('input[name=_token]').val(),
                    id : id
                }
            }).done(function(data) {
                $("tr.billdetail"+id).remove();
            })
        });

        // Search info

        $('input[name=key]').keyup(function() {
            var key = $(this).val();
            setTimeout(function() {
                $.ajax({
                    url: '/billdetail.search',
                    type : 'GET',
                    data : {
                        key : key
                    },
                    success: function(response) {
                        $('tbody').html(response);
                    }   
                })  
            },1000);
        });
    })
</script>
<div class="modal fade" id="myModal" tabindex="-1" MaChinhSach="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Update</h4>
            </div>
            <div class="modal-body">
               {!! Form::open(['class' => 'form-horizontal', 'method' => 'POST', 'route' => ['billdetail.update',$billdetail->id]]) !!}
               <div>
                <label for="label">ID</label>
                <input type="text" name="id" class="form-control" id="id">
            </div>
            <div>
                <label for="label">Mã phòng</label>
                <!-- <input type="text" name="MaPhong" class="form-control" id="MaPhong"> -->
                <select class="form-control" id="MaPhong" name="MaPhong">
                    <option value="">Select</option>
                    @foreach($tenPhong as $tp)
                    <option value="{{ $tp->id }}">{{ $tp->TenPhong }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="label">Mã sử dụng dịch vụ</label>
                <!-- <input type="text" name="MaSuDungDichVu" class="form-control" id="MaSuDungDichVu"> -->
                <select class="form-control" id="MaSuDungDichVu" name="MaSuDungDichVu">
                    <option value="">Select</option>
                    @foreach($suDungDichVu as $sddv)
                    <option value="{{ $sddv->id }}">{{ $sddv->id }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="label">Mã chính sách</label>
                <!-- <input type="text" name="MaChinhSach" class="form-control" id="MaChinhSach"> -->
                <select class="form-control" id="MaChinhSach" name="MaChinhSach">
                    <option value="">Select</option>
                    @foreach($chinhSach as $cs)
                    <option value="{{ $cs->id }}">{{ $cs->ThoiGianQuyDinh }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="label">Phụ thu</label>
                <input type="text" name="PhuThu" class="form-control" id="PhuThu">
            </div>
            <div>
                <label for="label">Tiền phòng</label>
                
                <div class="form-group input-group" >
                    <span class="input-group-addon">VND</span>
                    <input type="text" name="TienPhong" class="form-control" id="TienPhong">
                    <span class="input-group-addon">.00</span>
                </div>
            </div>
            <div>
                <label for="label">Tiền dịch vụ</label>
                
                <div class="form-group input-group" >
                    <span class="input-group-addon">VND</span>
                    <input type="text" name="TienDichVu" class="form-control" id="TienDichVu">
                    <span class="input-group-addon">.00</span>
                </div>
            </div>
            <div>
                <label for="label">Giảm giá khách hàng</label>
                <input type="text" name="GiamGiaKhachHang" class="form-control" id="GiamGiaKhachHang">
            </div>
            <div>
                <label for="label">Hình thức thanh toán</label>
                <input type="text" name="HinhThucThanhToan" class="form-control" id="HinhThucThanhToan">
            </div>
            <div>
                <label for="label">Số ngày</label>
                <input type="text" name="SoNgay" class="form-control" id="SoNgay">
            </div>
            <div>
                <label for="label">Thành tiền</label>
                
                <div class="form-group input-group" >
                    <span class="input-group-addon">VND</span>
                    <input type="text" name="ThanhTien" class="form-control" id="ThanhTien">
                    <span class="input-group-addon">.00</span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary updateValue">Update</button>
                <button type="button" class="btn btn-primary createValue">Save</button>

            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
</div>
@endsection