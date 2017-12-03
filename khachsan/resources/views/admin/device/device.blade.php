@extends('admin.master')
@section('content')
<div id="page-wrapper">
    @if (count($devices) > 0)
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Danh sách thiết bị
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
                            <thead >
                                <tr >
                                    <th>ID</th>
                                    <th>Tên thiết bị</th>
                                    <th>Mã loại phòng</th>
                                    <th>Số lượng</th>
                                    <th>Xem chi tiết</th>
                                    <th>Sửa</th>
                                    <th>Xóa</th>
                                </tr>
                            </thead>
                            <tbody >
                                @foreach($devices as $device)
                                <tr class="device{{$device->id}}">
                                    <td>{{$device->id}}</td>
                                    <td>{{$device->TenThietBi}}</td>
                                    <td>{{$device->loaiPhong->TenLoaiPhong}}</td>
                                    <td>{{$device->SoLuong}}</td>
                                    <td>
                                        <button class="btn btn-info detailValue" data-toggle="modal" data-target="#myModal" value="{{$device->id}}""><i class="fa fa-eye"></i> Xem</button>
                                    </td>

                                    <td>
                                        <button class="btn btn-warning editValue" data-toggle="modal" data-target="#myModal" value="{{$device->id}}""><i class="fa fa-pencil-square-o"></i> Sửa</button>
                                    </td>
                                    <td>
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['device.destroy',$device->id]]) !!}
                                        <button class="btn btn-danger deleteValue" type="button" value="{{$device->id}}"><i class="fa fa-trash-o" ></i> Xóa</button>
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


<div class="modal fade" id="myModal" tabindex="-1" SoLuong="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Update</h4>
            </div>
            <div class="modal-body">
               {!! Form::open(['class' => 'form-horizontal', 'method' => 'POST', 'route' => ['device.update',$device->id]]) !!}
               <div>
                <label for="label">ID</label>
                <input type="text" name="id" class="form-control" id="id">
            </div>
            <div>
                <label for="label">Tên thiết bị</label>
                <input type="text" name="TenThietBi" class="form-control" id="TenThietBi">
            </div>
            <div>
                <label for="label">Mã loại phòng</label>
                <!-- <input type="text" name="MaLoaiPhong" class="form-control" id="MaLoaiPhong"> -->
                <select class="form-control" id="MaLoaiPhong" name="MaLoaiPhong">
                    <option value="">Select</option>
                    @foreach($loaiPhong as $lp)
                    <option value="{{ $lp->id }}">{{ $lp->DonGia }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="password">Số lượng</label>
                <input type="text" name="SoLuong" class="form-control" id="SoLuong">
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
@endif
@endsection
@section('script')
<script type="text/javascript">

    $(document).ready(function() {

        /* Add value - P.Manh - 4/11/17*/

        $('.addValue').click(function() {
            $('#id').val('');
            $('#TenThietBi').val('');
            $('#MaLoaiPhong').val('');
            $('#SoLuong').val('');
            $('#password').parent('div').show();
            $('#id').parent('div').hide();
            $('.createValue').show();
            $('.updateValue').hide();
        });
        $('.createValue').click(function(e){
            e.preventDefault();
            var TenThietBi = $('#TenThietBi').val();
            var MaLoaiPhong = $('#MaLoaiPhong').val();
            var SoLuong = $('#SoLuong').val();
            if(TenThietBi != '' && MaLoaiPhong != '' && SoLuong != '') {
                $.ajax({
                    url : '/device',
                    dataType : 'json',
                    type : 'POST',
                    data : {
                        _token: $('input[name=_token]').val(),
                        TenThietBi : TenThietBi,
                        MaLoaiPhong : MaLoaiPhong,
                        SoLuong : SoLuong
                    }
                }).done(function(response) {
                    $('#myModal').modal('hide');
                    // $('tbody tr').append("<tr class='device" + response.id + "' ><td>" + data.id + "</td><td>" + response.TenThietBi + "</td><td>" + response.MaLoaiPhong + "</td><td>" + response.SoLuong + "</td><td></td><td><button class='btn btn-warning editValue' data-toggle = 'modal' data-target='#myModal' value ='" + response.id + "'><i class='fa fa-pencil-square-o'></i> Sửa</button></td><td><button type='submit' class='btn btn-danger deleteValue' value='" + response.id + "'><i class='fa fa-trash-o'></i> Xóa</button></td></tr>");
                });
            }
            history.go(0);
        });

        /* Xem chi tiết - P.Manh - 2/12/17*/

        $('.detailValue').click(function() {
            var id = $(this).val();
            var TenThietBi = $(this).parent().prev("td").prev("td").prev("td").text();
            var MaLoaiPhong = $(this).parent().prev("td").prev("td").text();
            var SoLuong = $(this).parent().prev("td").text();
            $('#id').val(id);
            $('#TenThietBi').val(TenThietBi);
            $('#MaLoaiPhong').val(MaLoaiPhong);
            $('#SoLuong').val(SoLuong);
            $('#id').parent('div').hide();
            $('.createValue').hide();
            $('.updateValue').hide();
        });

        /* Sửa value - P.Manh - 5/11/17*/

        $('.editValue').click(function() {
            var id = $(this).val();
            var TenThietBi = $(this).parent().prev("td").prev("td").prev("td").prev("td").text();
            var MaLoaiPhong = $(this).parent().prev("td").prev("td").prev("td").text();
            var SoLuong = $(this).parent().prev("td").prev("td").text();
            $('#id').val(id);
            $('#TenThietBi').val(TenThietBi);
            $('#MaLoaiPhong').val(MaLoaiPhong);
            $('#SoLuong').val(SoLuong);
            $('#id').parent('div').hide();
            $('.createValue').hide();
            $('.updateValue').show();
        });
        $('.updateValue').click(function(e) {
            e.preventDefault();
            var id = $('#id').val();
            var MaLoaiPhong = $('#MaLoaiPhong').val();
            var TenThietBi = $('#TenThietBi').val();
            var SoLuong = $('#SoLuong').val();
            if(TenThietBi != '' && MaLoaiPhong != '' && SoLuong != '') {
                $.ajax({
                    dataType : 'json',
                    type : 'PUT',

                    // router
                    url : '/device/'+id,
                    data : {
                        _token: $('input[name=_token]').val(),
                        id : id,
                        TenThietBi : TenThietBi,
                        MaLoaiPhong : MaLoaiPhong,
                        SoLuong : SoLuong
                        
                    }
                }).done(function(data) {
                 $('#myModal').modal('hide');
                 // $(".device"+id).replaceWith(
                 //    ("<tr class='device" + data.id + "'><td>" + data.id + "</td><td>" + data.TenThietBi + "</td><td>" + data.MaLoaiPhong + "</td><td>" + data.SoLuong + "</td> <td><button class='btn btn-info detailValue' data-toggle = 'modal' data-target='#myModal' value ='" + data.id + "'><i class='fa fa-eye'></i> Xem</button></td>  <td><button class='btn btn-warning editValue' data-toggle = 'modal' data-target='#myModal' value ='" + data.id + "'><i class='fa fa-pencil-square-o'></i> Sửa</button></td><td><button type='submit' class='btn btn-danger deleteValue' value='" +data.id+ "'><i class='fa fa-trash-o'></i> Xóa</button></td></tr>")
                 //    );
             })
            }
            history.go(0);
        })

        // Xóa value - P.Manh - 5/11/17

        $(document).on('click', '.deleteValue', function(e) {
            var id = $(this).val();
            $.ajax({
                type : 'DELETE',
                url : '/device/'+id,
                data : {
                   _token: $('input[name=_token]').val(),
                   id : id
               }
           }).done(function(data) {
            $("tr.device"+id).remove();
        })
       });

        // Search info

        $('input[name=key]').keyup(function() {
            var key = $(this).val();
            setTimeout(function() {
                $.ajax({
                    url: '/device.search',
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
@endsection