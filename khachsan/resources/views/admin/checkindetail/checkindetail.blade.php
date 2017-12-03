@extends('admin.master')
@section('content')
<div id="page-wrapper">
    @if (count($checkindetails) > 0)
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Danh sách chi tiết phiếu nhận phòng
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
                                    <th>Họ tên khách hàng</th>
                                    <th>CMND/Căn cước</th>
                                    <th>Ngày nhận</th>
                                    <th>Ngày trả dự kiến</th>
                                    <th>Ngày trả thực tế</th>
                                    <th>Xem chi tiết</th>
                                    <th>Sửa</th>
                                    <th>Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($checkindetails as $checkindetail)
                                <tr class="checkindetail{{$checkindetail->id}}" >
                                    <td>{{$checkindetail->id}}</td>
                                    <td>{{$checkindetail->MaPhong}}</td>
                                    <td>{{$checkindetail->HoTenKhachHang}}</td>
                                    <td>{{$checkindetail->CMND}}</td>
                                    <td>{{$checkindetail->NgayNhan}}</td>
                                    <td>{{$checkindetail->NgayTraDuKien}}</td>
                                    <td>{{$checkindetail->NgayTraThucTe}}</td>
                                    <td>
                                        <button class="btn btn-info detailValue" data-toggle="modal" data-target="#myModal" value="{{$checkindetail->id}}""><i class="fa fa-eye"></i> Xem</button>
                                    </td>
                                    <td>
                                        <button class="btn btn-warning editValue" data-toggle="modal" data-target="#myModal" value="{{$checkindetail->id}}""><i class="fa fa-pencil-square-o"></i> Sửa</button>
                                    </td>
                                    <td>
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['checkindetail.destroy',$checkindetail->id]]) !!}
                                        <button class="btn btn-danger deleteValue" type="submit" value="{{$checkindetail->id}}"><i class="fa fa-trash-o" ></i> Xóa</button>
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
            $('#HoTenKhachHang').val('');
            $('#CMND').val('');
            $('#NgayNhan').val('');
            $('#NgayTraDuKien').val('');
            $('#NgayTraThucTe').val('');
            $('#password').parent('div').show();
            $('#id').parent('div').hide();
            $('.createValue').show();
            $('.updateValue').hide();
        });
        $('.createValue').click(function(e){
            e.preventDefault();
            var MaPhong = $('#MaPhong').val();
            var HoTenKhachHang = $('#HoTenKhachHang').val();
            var CMND = $('#CMND').val();
            var NgayNhan = $('#NgayNhan').val();
            var NgayTraDuKien = $('#NgayTraDuKien').val();
            var NgayTraThucTe = $('#NgayTraThucTe').val();
            if(MaPhong != '' && HoTenKhachHang != '' && CMND != '' && NgayNhan != '' && NgayTraDuKien != '' && NgayTraThucTe != '') {
                $.ajax({
                    url : '/checkindetail',
                    dataType : 'json',
                    type : 'POST',
                    data : {
                        _token: $('input[name=_token]').val(),
                        MaPhong : MaPhong,
                        HoTenKhachHang : HoTenKhachHang,
                        CMND : CMND,
                        NgayNhan : NgayNhan,
                        NgayTraDuKien : NgayTraDuKien,
                        NgayTraThucTe : NgayTraThucTe
                    }
                }).done(function(response) {
                    $('#myModal').modal('hide');
                    // $('tbody tr').append("<tr class='checkindetail" + response.id + "' ><td>" + data.id + "</td><td>" + response.MaPhong + "</td><td>" + response.HoTenKhachHang + "</td><td>" + response.CMND + "</td><td>" + response.NgayNhan + "</td><td>" + response.NgayTraThucTe + "</td><td>" + response.NgayTraThucTe + "</td><td><button class='btn btn-warning editValue' data-toggle = 'modal' data-target='#myModal' value ='" + response.id + "'><i class='fa fa-pencil-square-o'></i> Sửa</button></td><td><button type='submit' class='btn btn-danger deleteValue' value='" + response.id + "'><i class='fa fa-trash-o'></i> Xóa</button></td></tr>");
                });
            }
            history.go(0);
        });

        /*Xem chi tiết - P.Manh - 2/12/17*/

        $('.detailValue').click(function() {
            var id = $(this).val();
            var MaPhong = $(this).parent().prev("td").prev("td").prev("td").prev("td").prev("td").prev("td").text();
            var HoTenKhachHang = $(this).parent().prev("td").prev("td").prev("td").prev("td").prev("td").text();
            var CMND = $(this).parent().prev("td").prev("td").prev("td").prev("td").text();
            var NgayNhan = $(this).parent().prev("td").prev("td").prev("td").text();
            var NgayTraDuKien = $(this).parent().prev("td").prev("td").text();
            var NgayTraThucTe = $(this).parent().prev("td").text();
            $('#id').val(id);
            $('#MaPhong').val(MaPhong);
            $('#HoTenKhachHang').val(HoTenKhachHang);
            $('#CMND').val(CMND);
            $('#NgayNhan').val(NgayNhan);
            $('#NgayTraDuKien').val(NgayTraDuKien);
            $('#NgayTraThucTe').val(NgayTraThucTe);
            $('#id').parent('div').hide();
            $('.createValue').hide();
            $('.updateValue').hide();
        });

        /* Sửa value - P.Manh - 5/11/17*/

        $('.editValue').click(function() {
            var id = $(this).val();
            var MaPhong = $(this).parent().prev("td").prev("td").prev("td").prev("td").prev("td").prev("td").prev("td").text();
            var HoTenKhachHang = $(this).parent().prev("td").prev("td").prev("td").prev("td").prev("td").prev("td").text();
            var CMND = $(this).parent().prev("td").prev("td").prev("td").prev("td").prev("td").text();
            var NgayNhan = $(this).parent().prev("td").prev("td").prev("td").prev("td").text();
            var NgayTraDuKien = $(this).parent().prev("td").prev("td").prev("td").text();
            var NgayTraThucTe = $(this).parent().prev("td").prev("td").text();
            $('#id').val(id);
            $('#MaPhong').val(MaPhong);
            $('#HoTenKhachHang').val(HoTenKhachHang);
            $('#CMND').val(CMND);
            $('#NgayNhan').val(NgayNhan);
            $('#NgayTraDuKien').val(NgayTraDuKien);
            $('#NgayTraThucTe').val(NgayTraThucTe);
            $('#id').parent('div').hide();
            $('.createValue').hide();
            $('.updateValue').show();
        });
        $('.updateValue').click(function(e) {
            e.preventDefault();
            var id = $('#id').val();
            var MaPhong = $('#MaPhong').val();
            var HoTenKhachHang = $('#HoTenKhachHang').val();
            var CMND = $('#CMND').val();
            var NgayNhan = $('#NgayNhan').val();
            var NgayTraDuKien = $('#NgayTraDuKien').val();
            var NgayTraThucTe = $('#NgayTraThucTe').val();
            if(MaPhong != '' && HoTenKhachHang != '' && CMND != '' && NgayNhan != '' && NgayTraDuKien != '' && NgayTraThucTe != '') {
                $.ajax({
                    dataType : 'json',
                    type : 'PUT',

                    // router
                    url : '/checkindetail/'+id,
                    data : {
                        _token: $('input[name=_token]').val(),
                        id : id,
                        MaPhong : MaPhong,
                        HoTenKhachHang : HoTenKhachHang,
                        CMND : CMND,
                        NgayNhan : NgayNhan,
                        NgayTraDuKien : NgayTraDuKien,
                        NgayTraThucTe : NgayTraThucTe
                        
                    }
                }).done(function(data) {
                 $('#myModal').modal('hide');
                 // $(".checkindetail"+id).replaceWith(
                 //    ("<tr class='checkindetail" + data.id + "'><td>" + data.id + "</td><td>" + data.MaPhong + "</td><td>" + data.HoTenKhachHang + "</td><td>" + data.CMND + "</td><td>" + response.NgayNhan + "</td><td>" + response.NgayTraThucTe + "</td><td>" + response.NgayTraThucTe + "</td> <td><button class='btn btn-info detailValue' data-toggle = 'modal' data-target='#myModal' value ='" + data.id + "'><i class='fa fa-eye'></i> Xem</button></td>  <td><button class='btn btn-warning editValue' data-toggle = 'modal' data-target='#myModal' value ='" + data.id + "'><i class='fa fa-pencil-square-o'></i> Sửa</button></td><td><button type='submit' class='btn btn-danger deleteValue' value='" +data.id+ "'><i class='fa fa-trash-o'></i> Xóa</button></td></tr>")
                 //    );
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
                url : '/checkindetail/'+id,
                data : {
                    _token: $('input[name=_token]').val(),
                    id : id
                }
            }).done(function(data) {
                $("tr.checkindetail"+id).remove();
            })
        });

        // Search info

        $('input[name=key]').keyup(function() {
            var key = $(this).val();
            setTimeout(function() {
                $.ajax({
                    url: '/checkindetail.search',
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
<div class="modal fade" id="myModal" tabindex="-1" CMND="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Update</h4>
            </div>
            <div class="modal-body">
             {!! Form::open(['class' => 'form-horizontal', 'method' => 'POST', 'route' => ['checkindetail.update',$checkindetail->id]]) !!}
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
                <label for="label">Họ tên khách hàng</label>
                <!-- <input type="text" name="HoTenKhachHang" class="form-control" id="HoTenKhachHang"> -->
                <select class="form-control" id="HoTenKhachHang" name="HoTenKhachHang">
                    <option value="">Select</option>
                    @foreach($khachHang as $kh)
                    <option value="{{ $kh->id }}">{{ $kh->TenKhachHang }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="label">CMND</label>
                <input type="text" name="CMND" class="form-control" id="CMND">
            </div>
            <div>
                <label for="label">Ngày nhận</label>
                <input type="date" name="NgayNhan" class="form-control" id="NgayNhan">

            </div>
            <div>
                <label for="label">Ngày trả dự kiến</label>
                <input type="date" name="NgayTraDuKien" class="form-control" id="NgayTraDuKien">
            </div>
            <div>
                <label for="label">Ngày trả thực tế</label>
                <input type="date" name="NgayTraThucTe" class="form-control" id="NgayTraThucTe">
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