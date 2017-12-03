@extends('admin.master')
@section('content')
<div id="page-wrapper">
    @if (count($roomtypes) > 0)
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Danh sách loại phòng
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
                                    <th>Tên loại phòng</th>
                                    <th>Đơn giá</th>
                                    <th>Số người chuẩn</th>
                                    <th>Số người tối đa</th>
                                    <th>Tỷ lệ tăng</th>
                                    <th>Xem chi tiết</th>
                                    <th>Sửa</th>
                                    <th>Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($roomtypes as $roomtype)
                                <tr class="roomtype{{$roomtype->id}}" >
                                    <td>{{$roomtype->id}}</td>
                                    <td>{{$roomtype->TenLoaiPhong}}</td>
                                    <td>{{$roomtype->DonGia}}</td>
                                    <td>{{$roomtype->SoNguoiChuan}}</td>
                                    <td>{{$roomtype->SoNguoiToiDa}}</td>
                                    <td>{{$roomtype->TyLeTang}}</td>

                                    <td>
                                        <button class="btn btn-info detailValue" data-toggle="modal" data-target="#myModal" value="{{$roomtype->id}}""><i class="fa fa-eye"></i> Xem</button>
                                    </td>

                                    <td>
                                        <button class="btn btn-warning editValue" data-toggle="modal" data-target="#myModal" value="{{$roomtype->id}}""><i class="fa fa-pencil-square-o"></i> Sửa</button>
                                    </td>
                                    <td>
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['roomtype.destroy',$roomtype->id]]) !!}
                                        <button class="btn btn-danger deleteValue" type="submit" value="{{$roomtype->id}}"><i class="fa fa-trash-o" ></i> Xóa</button>
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
            $('#TenLoaiPhong').val('');
            $('#DonGia').val('');
            $('#SoNguoiChuan').val('');
            $('#SoNguoiToiDa').val('');
            $('#TyLeTang').val('');
            $('#password').parent('div').show();
            $('#id').parent('div').hide();
            $('.createValue').show();
            $('.updateValue').hide();
        });
        $('.createValue').click(function(e){
            e.preventDefault();
            var TenLoaiPhong = $('#TenLoaiPhong').val();
            var DonGia = $('#DonGia').val();
            var SoNguoiChuan = $('#SoNguoiChuan').val();
            var SoNguoiToiDa = $('#SoNguoiToiDa').val();
            var TyLeTang = $('#TyLeTang').val();
            if(TenLoaiPhong != '' && DonGia != '' && SoNguoiChuan != ''&& SoNguoiToiDa != ''&& TyLeTang != '') {
                $.ajax({
                    url : '/roomtype',
                    dataType : 'json',
                    type : 'POST',
                    data : {
                        _token: $('input[name=_token]').val(),
                        TenLoaiPhong : TenLoaiPhong,
                        DonGia : DonGia,
                        SoNguoiChuan : SoNguoiChuan,
                        SoNguoiToiDa : SoNguoiToiDa,
                        TyLeTang : TyLeTang
                    }
                }).done(function(response) {
                    $('#myModal').modal('hide');
                    // $('tbody tr').append("<tr class='roomtype" + response.id + "' ><td>" + data.id + "</td><td>" + response.TenLoaiPhong + "</td><td>" + response.DonGia + "</td><td>" + response.SoNguoiChuan + "</td><td>" + response.SoNguoiToiDa + "</td><td>" + response.TyLeTang + "</td><td><button class='btn btn-warning editValue' data-toggle = 'modal' data-target='#myModal' value ='" + response.id + "'><i class='fa fa-pencil-square-o'></i> Sửa</button></td><td><button type='submit' class='btn btn-danger deleteValue' value='" + response.id + "'><i class='fa fa-trash-o'></i> Xóa</button></td></tr>");
                });
            }
            history.go(0);
        });

        /* Xem chi tiết - P.Manh - 2/12/17*/

        $('.detailValue').click(function() {
            var id = $(this).val();
            var TenLoaiPhong = $(this).parent().prev("td").prev("td").prev("td").prev("td").prev("td").text();
            var DonGia = $(this).parent().prev("td").prev("td").prev("td").prev("td").text();
            var SoNguoiChuan = $(this).parent().prev("td").prev("td").prev("td").text();
            var SoNguoiToiDa = $(this).parent().prev("td").prev("td").text();
            var TyLeTang = $(this).parent().prev("td").text();
            $('#id').val(id);
            $('#TenLoaiPhong').val(TenLoaiPhong);
            $('#DonGia').val(DonGia);
            $('#SoNguoiChuan').val(SoNguoiChuan);
            $('#SoNguoiToiDa').val(SoNguoiToiDa);
            $('#TyLeTang').val(TyLeTang);
            $('#id').parent('div').hide();
            $('.createValue').hide();
            $('.updateValue').hide();
        });

        /* Sửa value - P.Manh - 5/11/17*/

        $('.editValue').click(function() {
            var id = $(this).val();
            var TenLoaiPhong = $(this).parent().prev("td").prev("td").prev("td").prev("td").prev("td").prev("td").text();
            var DonGia = $(this).parent().prev("td").prev("td").prev("td").prev("td").prev("td").text();
            var SoNguoiChuan = $(this).parent().prev("td").prev("td").prev("td").prev("td").text();
            var SoNguoiToiDa = $(this).parent().prev("td").prev("td").prev("td").text();
            var TyLeTang = $(this).parent().prev("td").prev("td").text();
            $('#id').val(id);
            $('#TenLoaiPhong').val(TenLoaiPhong);
            $('#DonGia').val(DonGia);
            $('#SoNguoiChuan').val(SoNguoiChuan);
            $('#SoNguoiToiDa').val(SoNguoiToiDa);
            $('#TyLeTang').val(TyLeTang);
            $('#id').parent('div').hide();
            $('.createValue').hide();
            $('.updateValue').show();
        });
        $('.updateValue').click(function(e) {
            e.preventDefault();
            var id = $('#id').val();
            var DonGia = $('#DonGia').val();
            var TenLoaiPhong = $('#TenLoaiPhong').val();
            var SoNguoiChuan = $('#SoNguoiChuan').val();
            var SoNguoiToiDa = $('#SoNguoiToiDa').val();
            var TyLeTang = $('#TyLeTang').val();
            if(TenLoaiPhong != '' && DonGia != '' && SoNguoiChuan != '' && SoNguoiToiDa != '' && TyLeTang != '') {
                $.ajax({
                    dataType : 'json',
                    type : 'PUT',

                    // router
                    url : '/roomtype/'+id,
                    data : {
                        _token: $('input[name=_token]').val(),
                        id : id,
                        TenLoaiPhong : TenLoaiPhong,
                        DonGia : DonGia,
                        SoNguoiChuan : SoNguoiChuan,
                        SoNguoiToiDa : SoNguoiToiDa,
                        TyLeTang : TyLeTang
                        
                    }
                }).done(function(data) {
                 $('#myModal').modal('hide');
                 // $(".roomtype"+id).replaceWith(
                 //    ("<tr class='roomtype" + data.id + "'><td>" + data.id + "</td><td>" + data.TenLoaiPhong + "</td><td>" + data.DonGia + "</td><td>" + data.SoNguoiChuan + "</td><td>" + data.SoNguoiToiDa + "</td><td>" + data.TyLeTang + "</td><td><button class='btn btn-info detailValue' data-toggle = 'modal' data-target='#myModal' value ='" + data.id + "'><i class='fa fa-eye'></i> Xem</button></td> <td><button class='btn btn-warning editValue' data-toggle = 'modal' data-target='#myModal' value ='" + data.id + "'><i class='fa fa-pencil-square-o'></i> Sửa</button></td><td><button type='submit' class='btn btn-danger deleteValue' value='" +data.id+ "'><i class='fa fa-trash-o'></i> Xóa</button></td></tr>")
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
                url : '/roomtype/'+id,
                data : {
                    _token: $('input[name=_token]').val(),
                    id : id
                }
            }).done(function(data) {
                $("tr.roomtype"+id).remove();
            })
        });

        // Search info

        $('input[name=key]').keyup(function() {
            var key = $(this).val();
            setTimeout(function() {
                $.ajax({
                    url: '/roomtype.search',
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
<div class="modal fade" id="myModal" tabindex="-1" SoNguoiChuan="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Update</h4>
            </div>
            <div class="modal-body">
             {!! Form::open(['class' => 'form-horizontal', 'method' => 'POST', 'route' => ['roomtype.update',$roomtype->id]]) !!}
             <div>
                <label for="label">ID</label>
                <input type="text" name="id" class="form-control" id="id">
            </div>
            <div>
                <label for="label">Tên loại phòng</label>
                <input type="text" name="TenLoaiPhong" class="form-control" id="TenLoaiPhong">
            </div>
            <div>
                <label for="label">Đơn giá</label>
                
                <div class="form-group input-group" >
                    <span class="input-group-addon">VND</span>
                    <input type="text" name="DonGia" class="form-control" id="DonGia">
                    <span class="input-group-addon">.00</span>
                </div>
            </div>
            <div>
                <label for="label">Số lượng người chuẩn</label>
                <input type="text" name="SoNguoiChuan" class="form-control" id="SoNguoiChuan">
            </div>
            <div>
                <label for="label">Số lượng người tối đa</label>
                <input type="text" name="SoNguoiToiDa" class="form-control" id="SoNguoiToiDa">
            </div>
            <div>
                <label for="label">Tỷ lệ tăng</label>
                <input type="text" name="TyLeTang" class="form-control" id="TyLeTang">
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