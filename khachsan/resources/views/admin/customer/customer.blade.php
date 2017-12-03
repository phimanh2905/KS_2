@extends('admin.master')
@section('content')
<div id="page-wrapper">


    @if (count($customers) > 0)
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Danh sách khách hàng
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
                        <table class="table table-striped table-bordered table-hover " style="text-align:center;" >
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên khách hàng</th>
                                    <th>CMND/Căn cước</th>
                                    <th>Giới tính</th>
                                    <th>Địa chỉ</th>
                                    <th>Điện thoại</th>
                                    <th>Quốc tịch</th>
                                    <th>Xem chi tiết</th>
                                    <th>Sửa</th>
                                    <th>Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($customers as $customer)
                                <tr class="customer{{$customer->id}}" >
                                    <td>{{$customer->id}}</td>
                                    <td>{{$customer->TenKhachHang}}</td>
                                    <td>{{$customer->CMND}}</td>
                                    <td>{{$customer->GioiTinh}}</td>
                                    <td>{{$customer->DiaChi}}</td>
                                    <td>{{$customer->DienThoai}}</td>
                                    <td>{{$customer->QuocTich}}</td>
                                    <td>
                                        <button class="btn btn-info detailValue" data-toggle="modal" data-target="#myModal" value="{{$customer->id}}""><i class="fa fa-eye"></i> Xem</button>
                                    </td>

                                    <td>
                                        <button class="btn btn-warning editValue" data-toggle="modal" data-target="#myModal" value="{{$customer->id}}""><i class="fa fa-pencil-square-o"></i> Sửa</button>
                                    </td>
                                    <td>
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['customer.destroy',$customer->id]]) !!}
                                        <button class="btn btn-danger deleteValue" type="submit" value="{{$customer->id}}"><i class="fa fa-trash-o" ></i> Xóa</button>
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

        /* Add value - P.Manh - 4/11/17*/

        $('.addValue').click(function() {
            $('#id').val('');
            $('#TenKhachHang').val('');
            $('#CMND').val('');
            $('#GioiTinh').val('');
            $('#DiaChi').val('');
            $('#DienThoai').val('');
            $('#QuocTich').val('');
            $('#password').parent('div').show();
            $('#id').parent('div').hide();
            $('.createValue').show();
            $('.updateValue').hide();
        });
        $('.createValue').click(function(e){
            e.preventDefault();
            var TenKhachHang = $('#TenKhachHang').val();
            var CMND = $('#CMND').val();
            var GioiTinh = $('#GioiTinh').val();
            var DiaChi = $('#DiaChi').val();
            var DienThoai = $('#DienThoai').val();
            var QuocTich = $('#QuocTich').val();
            if(TenKhachHang != '' && CMND != '' && GioiTinh != '' && DiaChi != '' && DienThoai != '' && QuocTich != '') {
                $.ajax({
                    url : '/customer',
                    dataType : 'json',
                    type : 'POST',
                    data : {
                        _token: $('input[name=_token]').val(),
                        TenKhachHang : TenKhachHang,
                        CMND : CMND,
                        GioiTinh : GioiTinh,
                        DiaChi : DiaChi,
                        DienThoai : DienThoai,
                        QuocTich : QuocTich
                    }
                }).done(function(response) {
                    $('#myModal').modal('hide');
                    // $('tbody tr').append("<tr class='customer" + response.id + "'><td>" + data.id + "</td><td>" + response.TenKhachHang + "</td><td>" + response.CMND + "</td><td>" + response.GioiTinh + "</td><td>" + response.DiaChi + "</td><td>" + response.DienThoai + "</td><td>" + response.QuocTich + "</td><td><button class='btn btn-warning editValue' data-toggle = 'modal' data-target='#myModal' value ='" + response.id + "'><i class='fa fa-pencil-square-o'></i> Edit</button></td><td><button type='submit' class='btn btn-danger deleteValue' value='" + response.id + "'><i class='fa fa-trash-o'></i> Delete</button></td></tr>");
                });
            }
            history.go(0);
        });

        /* Xem chi tiết - P.Manh - 2/12/17*/

        $('.detailValue').click(function() {
            var id = $(this).val();
            var TenKhachHang = $(this).parent().prev("td").prev("td").prev("td").prev("td").prev("td").prev("td").text();
            var CMND = $(this).parent().prev("td").prev("td").prev("td").prev("td").prev("td").text();
            var GioiTinh = $(this).parent().prev("td").prev("td").prev("td").prev("td").text();
            var DiaChi = $(this).parent().prev("td").prev("td").prev("td").text();
            var DienThoai = $(this).parent().prev("td").prev("td").text();
            var QuocTich = $(this).parent().prev("td").text();
            
            $('#id').val(id);
            $('#TenKhachHang').val(TenKhachHang);
            $('#CMND').val(CMND);
            $('#GioiTinh').val(GioiTinh);
            $('#DiaChi').val(DiaChi);
            $('#DienThoai').val(DienThoai);
            $('#QuocTich').val(QuocTich);
            $('#id').parent('div').hide();
            $('.createValue').hide();
            $('.updateValue').hide();
        });

        /* Edit value - P.Manh - 5/11/17*/

        $('.editValue').click(function() {
            var id = $(this).val();
            var TenKhachHang = $(this).parent().prev("td").prev("td").prev("td").prev("td").prev("td").prev("td").prev("td").text();
            var CMND = $(this).parent().prev("td").prev("td").prev("td").prev("td").prev("td").prev("td").text();
            var GioiTinh = $(this).parent().prev("td").prev("td").prev("td").prev("td").prev("td").text();
            var DiaChi = $(this).parent().prev("td").prev("td").prev("td").prev("td").text();
            var DienThoai = $(this).parent().prev("td").prev("td").prev("td").text();
            var QuocTich = $(this).parent().prev("td").prev("td").text();
            
            $('#id').val(id);
            $('#TenKhachHang').val(TenKhachHang);
            $('#CMND').val(CMND);
            $('#GioiTinh').val(GioiTinh);
            $('#DiaChi').val(DiaChi);
            $('#DienThoai').val(DienThoai);
            $('#QuocTich').val(QuocTich);
            $('#id').parent('div').hide();
            $('.createValue').hide();
            $('.updateValue').show();
        });
        $('.updateValue').click(function(e) {
            e.preventDefault();
            var id = $('#id').val();
            var CMND = $('#CMND').val();
            var TenKhachHang = $('#TenKhachHang').val();
            var GioiTinh = $('#GioiTinh').val();
            var DiaChi = $('#DiaChi').val();
            var DienThoai = $('#DienThoai').val();
            var QuocTich = $('#QuocTich').val();
            if(TenKhachHang != '' && CMND != '' && GioiTinh != '' && DiaChi != '' && DienThoai != '' && QuocTich != '' ) {
                $.ajax({
                    dataType : 'json',
                    type : 'PUT',

                    // router
                    url : '/customer/'+id,
                    data : {
                        _token: $('input[name=_token]').val(),
                        id : id,
                        TenKhachHang : TenKhachHang,
                        CMND : CMND,
                        GioiTinh : GioiTinh,
                        DiaChi : DiaChi,
                        DienThoai : DienThoai,
                        QuocTich : QuocTich,
                    }
                }).done(function(data) {
                 $('#myModal').modal('hide');
                 // $(".customer"+id).replaceWith(
                 //    ("<tr class='customer" + data.id + "'><td>" + data.id + "</td><td>" + data.TenKhachHang + "</td><td>" + data.CMND + "</td><td>" + data.GioiTinh + "</td><td>" + data.DiaChi + "</td><td>" + data.DienThoai + "</td><td>" + data.QuocTich + "</td> <td><button class='btn btn-info detailValue' data-toggle = 'modal' data-target='#myModal' value ='" + data.id + "'><i class='fa fa-eye'></i> Xem</button></td>  <td><button class='btn btn-warning editValue' data-toggle = 'modal' data-target='#myModal' value ='" + data.id + "'><i class='fa fa-pencil-square-o'></i> Sửa</button></td><td><button type='submit' class='btn btn-danger deleteValue' value='" +data.id+ "'><i class='fa fa-trash-o'></i> Xóa</button></td></tr>")
                 //    );
             })
            }
            history.go(0);
        })

        // Delete value - P.Manh - 5/11/17

        $(document).on('click', '.deleteValue', function(e) {
            e.preventDefault();
            var id = $(this).val();
            $.ajax({
                type : 'DELETE',
                url : '/customer/'+id,
                data : {
                    _token: $('input[name=_token]').val(),
                    id : id
                }
            }).done(function(data) {
                $("tr.customer"+id).remove();
            })
        });

        // Search info

        $('input[name=key]').keyup(function() {
            var key = $(this).val();
            setTimeout(function() {
                $.ajax({
                    url: '/customer.search',
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
<div class="modal fade" id="myModal" tabindex="-1" GioiTinh="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Update</h4>
            </div>
            <div class="modal-body">
               {!! Form::open(['class' => 'form-horizontal', 'method' => 'POST', 'route' => ['admin.update',$customer->id]]) !!}
               <div>
                <label for="label">ID</label>
                <input type="text" name="id" class="form-control" id="id">
            </div>
            <div>
                <label for="label">Tên khách hàng</label>
                <input type="text" name="TenKhachHang" class="form-control" id="TenKhachHang">
            </div>
            <div>
                <label for="label">Số CMND/Căn cước</label>
                <input type="text" name="CMND" class="form-control" id="CMND">
            </div>
            <div>
                <label for="password">Giới tính</label>
                <!-- <input type="text" name="GioiTinh" class="form-control" id="GioiTinh"> -->

                <select class="form-control" id="GioiTinh" name="GioiTinh">
                    <option>Nam</option>
                    <option>Nữ</option>
                    <option>Khác</option>
                </select>

            </div>
            <div>
                <label for="label">Địa chỉ</label>
                <input type="text" name="DiaChi" class="form-control" id="DiaChi">
            </div>
            <div>
                <label for="label">Điện thoại</label>
                <input type="text" name="DienThoai" class="form-control" id="DienThoai">
            </div>
            <div>
                <label for="label">Quốc tịch</label>
                <input type="text" name="QuocTich" class="form-control" id="QuocTich">
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