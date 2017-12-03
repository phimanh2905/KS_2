@extends('admin.master')
@section('content')
<div id="page-wrapper">
    @if (count($bills) > 0)
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Danh sách hóa đơn
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
                                    <th>Nhân viên lập</th>
                                    <th>Mã khách hàng</th>
                                    <th>Mã nhận phòng</th>
                                    <th>Tổng tiền</th>
                                    <th>Ngày lập</th>
                                    <th>Xem chi tiết</th>
                                    <th>Sửa</th>
                                    <th>Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($bills as $bill)
                                <tr class="bill{{$bill->id}}" >
                                    <td>{{$bill->id}}</td>
                                    <td>{{$bill->NhanVienLap}}</td>
                                    <td>{{$bill->khachHang->TenKhachHang}}</td>
                                    <td>{{$bill->MaNhanPhong}}</td>
                                    <td>{{$bill->TongTien}}</td>
                                    <td>{{$bill->NgayLap}}</td>
                                    <td>
                                        <button class="btn btn-info detailValue" data-toggle="modal" data-target="#myModal" value="{{$bill->id}}""><i class="fa fa-eye"></i> Xem</button>
                                    </td>
                                    <td>
                                        <button class="btn btn-warning editValue" data-toggle="modal" data-target="#myModal" value="{{$bill->id}}""><i class="fa fa-pencil-square-o"></i> Sửa</button>
                                    </td>
                                    <td>
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['bill.destroy',$bill->id]]) !!}
                                        <button class="btn btn-danger deleteValue" type="submit" value="{{$bill->id}}"><i class="fa fa-trash-o" ></i> Xóa</button>
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
            $('#NhanVienLap').val('');
            $('#MaKhachHang').val('');
            $('#MaNhanPhong').val('');
            $('#TongTien').val('');
            $('#NgayLap').val('');
            $('#password').parent('div').show();
            $('#id').parent('div').hide();
            $('.createValue').show();
            $('.updateValue').hide();
        });
        $('.createValue').click(function(e){
            e.preventDefault();
            var NhanVienLap = $('#NhanVienLap').val();
            var MaKhachHang = $('#MaKhachHang').val();
            var MaNhanPhong = $('#MaNhanPhong').val();
            var TongTien = $('#TongTien').val();
            var NgayLap = $('#NgayLap').val();
            if(NhanVienLap != '' && MaKhachHang != '' && MaNhanPhong != '' && TongTien != ''&& NgayLap != '') {
                $.ajax({
                    url : '/bill',
                    dataType : 'json',
                    type : 'POST',
                    data : {
                        _token: $('input[name=_token]').val(),
                        NhanVienLap : NhanVienLap,
                        MaKhachHang : MaKhachHang,
                        MaNhanPhong : MaNhanPhong,
                        TongTien : TongTien,
                        NgayLap : NgayLap
                    }
                }).done(function(response) {
                    $('#myModal').modal('hide');

                    // $('tbody tr').append("<tr class='bill" + response.id + "' ><td>" + data.id + "</td><td>" + response.NhanVienLap + "</td><td>" + response.MaKhachHang + "</td><td>" + response.MaNhanPhong + "</td><td>" + response.TongTien + "</td><td>" + response.NgayLap + "</td><td><button class='btn btn-warning editValue' data-toggle = 'modal' data-target='#myModal' value ='" + response.id + "'><i class='fa fa-pencil-square-o'></i> Sửa</button></td><td><button type='submit' class='btn btn-danger deleteValue' value='" + response.id + "'><i class='fa fa-trash-o'></i> Xóa</button></td></tr>");
                });
            }
            history.go(0);
        });

        /* Xem chi tiết - P.Manh - 2/12/17*/

        $('.detailValue').click(function() {
            var id = $(this).val();
            var NhanVienLap = $(this).parent().prev("td").prev("td").prev("td").prev("td").prev("td").text();
            var MaKhachHang = $(this).parent().prev("td").prev("td").prev("td").prev("td").text();
            var MaNhanPhong = $(this).parent().prev("td").prev("td").prev("td").text();
            var TongTien = $(this).parent().prev("td").prev("td").text();
            var NgayLap = $(this).parent().prev("td").text();
            $('#id').val(id);
            $('#NhanVienLap').val(NhanVienLap);
            $('#MaKhachHang').val(MaKhachHang);
            $('#MaNhanPhong').val(MaNhanPhong);
            $('#TongTien').val(TongTien);
            $('#NgayLap').val(NgayLap);
            $('#id').parent('div').hide();
            $('.createValue').hide();
            $('.updateValue').hide();
        });

        /* Sửa value - P.Manh - 5/11/17*/

        $('.editValue').click(function() {
            var id = $(this).val();
            var NhanVienLap = $(this).parent().prev("td").prev("td").prev("td").prev("td").prev("td").prev("td").text();
            var MaKhachHang = $(this).parent().prev("td").prev("td").prev("td").prev("td").prev("td").text();
            var MaNhanPhong = $(this).parent().prev("td").prev("td").prev("td").prev("td").text();
            var TongTien = $(this).parent().prev("td").prev("td").prev("td").text();
            var NgayLap = $(this).parent().prev("td").prev("td").text();
            $('#id').val(id);
            $('#NhanVienLap').val(NhanVienLap);
            $('#MaKhachHang').val(MaKhachHang);
            $('#MaNhanPhong').val(MaNhanPhong);
            $('#TongTien').val(TongTien);
            $('#NgayLap').val(NgayLap);
            $('#id').parent('div').hide();
            $('.createValue').hide();
            $('.updateValue').show();
        });
        $('.updateValue').click(function(e) {
            e.preventDefault();
            var id = $('#id').val();
            var MaKhachHang = $('#MaKhachHang').val();
            var NhanVienLap = $('#NhanVienLap').val();
            var MaNhanPhong = $('#MaNhanPhong').val();
            var TongTien = $('#TongTien').val();
            var NgayLap = $('#NgayLap').val();
            if(NhanVienLap != '' && MaKhachHang != '' && MaNhanPhong != '' && TongTien != ''&& NgayLap != '') {
                $.ajax({
                    dataType : 'json',
                    type : 'PUT',

                    // router
                    url : '/bill/'+id,
                    data : {
                        _token: $('input[name=_token]').val(),
                        id : id,
                        NhanVienLap : NhanVienLap,
                        MaKhachHang : MaKhachHang,
                        MaNhanPhong : MaNhanPhong,
                        TongTien : TongTien,
                        NgayLap : NgayLap
                        
                    }
                }).done(function(data) {
                 $('#myModal').modal('hide');
                 // $(".bill"+id).replaceWith(
                 //    ("<tr class='bill" + data.id + "'><td>" + data.id + "</td><td>" + data.NhanVienLap + "</td><td>" + data.MaKhachHang + "</td><td>" + data.MaNhanPhong + "</td><td>" + data.TongTien + "</td><td>" + data.NgayLap + "</td> <td><button class='btn btn-info detailValue' data-toggle = 'modal' data-target='#myModal' value ='" + data.id + "'><i class='fa fa-eye'></i> Xem</button></td>  <td><button class='btn btn-warning editValue' data-toggle = 'modal' data-target='#myModal' value ='" + data.id + "'><i class='fa fa-pencil-square-o'></i> Sửa</button></td><td><button type='submit' class='btn btn-danger deleteValue' value='" +data.id+ "'><i class='fa fa-trash-o'></i> Xóa</button></td></tr>")
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
                url : '/bill/'+id,
                data : {
                    _token: $('input[name=_token]').val(),
                    id : id
                }
            }).done(function(data) {
                $("tr.bill"+id).remove();
            })
        });

        // Search info

        $('input[name=key]').keyup(function() {
            var key = $(this).val();
            setTimeout(function() {
                $.ajax({
                    url: '/bill.search',
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
<div class="modal fade" id="myModal" tabindex="-1" MaNhanPhong="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Update</h4>
            </div>
            <div class="modal-body">
             {!! Form::open(['class' => 'form-horizontal', 'method' => 'POST', 'route' => ['bill.update',$bill->id]]) !!}
             <div>
                <label for="label">ID</label>
                <input type="text" name="id" class="form-control" id="id">
            </div>
            <div>
                <label for="label">Nhân viên lập</label>
                <!-- <input type="text" name="NhanVienLap" class="form-control" id="NhanVienLap"> -->
                <select class="form-control" id="NhanVienLap" name="NhanVienLap">
                    <option value="">Select</option>
                    @foreach($nhanVienLap as $nvl)
                    <option value="{{ $nvl->name }}">{{ $nvl->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="label">Mã khách hàng</label>
                <!-- <input type="text" name="MaKhachHang" class="form-control" id="MaKhachHang"> -->
                <select class="form-control" id="MaKhachHang" name="MaKhachHang">
                    <option value="">Select</option>
                    @foreach($khachHang as $kh)
                    <option value="{{ $kh->id }}">{{ $kh->TenKhachHang }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="label">Mã nhận phòng</label>
                <!-- <input type="text" name="MaNhanPhong" class="form-control" id="MaNhanPhong"> -->
                <select class="form-control" id="MaNhanPhong" name="MaNhanPhong">
                    <option value="">Select</option>
                    @foreach($nhanPhong as $np)
                    <option value="{{ $np->id }}">{{ $np->id }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="label">Tổng tiền</label>
                
                <div class="form-group input-group" >
                    <span class="input-group-addon">VND</span>
                    <input type="text" name="TongTien" class="form-control" id="TongTien">
                    <span class="input-group-addon">.00</span>
                </div>

            </div>
            <div>
                <label for="label">Ngày lập</label>
                <input type="date" name="NgayLap" class="form-control" id="NgayLap">
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