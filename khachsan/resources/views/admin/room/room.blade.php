@extends('admin.master')
@section('content')
<div id="page-wrapper">
    @if (count($rooms) > 0)
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Danh sách phòng
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
                                    <th>Tên phòng</th>
                                    <th>Mã loại phòng</th>
                                    <th>Mã loại tình trạng phòng</th>
                                    <th>Ghi chú</th>
                                    <th>Xem chi tiết</th>
                                    <th>Sửa</th>
                                    <th>Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($rooms as $room)
                                <tr class="room{{$room->id}}" >
                                    <td>{{$room->id}}</td>
                                    <td>{{$room->TenPhong}}</td>
                                    <td>{{$room->MaLoaiPhong}}</td>
                                    <td>{{$room->MaLoaiTinhTrangPhong}}</td>
                                    <td>{{$room->GhiChu}}</td>
                                    <td>
                                        <button class="btn btn-info detailValue" data-toggle="modal" data-target="#myModal" value="{{$room->id}}""><i class="fa fa-eye"></i> Xem</button>
                                    </td>
                                    <td>
                                        <button class="btn btn-warning editValue" data-toggle="modal" data-target="#myModal" value="{{$room->id}}""><i class="fa fa-pencil-square-o"></i> Sửa</button>
                                    </td>
                                    <td>
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['room.destroy',$room->id]]) !!}
                                        <button class="btn btn-danger deleteValue" type="submit" value="{{$room->id}}"><i class="fa fa-trash-o" ></i> Xóa</button>
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
            $('#TenPhong').val('');
            $('#MaLoaiPhong').val('');
            $('#MaLoaiTinhTrangPhong').val('');
            $('#GhiChu').val('');
            $('#password').parent('div').show();
            $('#id').parent('div').hide();
            $('.createValue').show();
            $('.updateValue').hide();
        });
        $('.createValue').click(function(e){
            e.preventDefault();
            var TenPhong = $('#TenPhong').val();
            var MaLoaiPhong = $('#MaLoaiPhong').val();
            var MaLoaiTinhTrangPhong = $('#MaLoaiTinhTrangPhong').val();
            var GhiChu = $('#GhiChu').val();
            if(MaLoaiPhong != '' && MaLoaiTinhTrangPhong != '' && GhiChu != '') {
                $.ajax({
                    url : '/room',
                    dataType : 'json',
                    type : 'POST',
                    data : {
                        _token: $('input[name=_token]').val(),
                        TenPhong : TenPhong,
                        MaLoaiPhong : MaLoaiPhong,
                        MaLoaiTinhTrangPhong : MaLoaiTinhTrangPhong,
                        GhiChu : GhiChu
                    }
                }).done(function(response) {
                    $('#myModal').modal('hide');
                    // $('tbody tr').append("<tr class='room" + response.id + "' ><td>" + data.id + "</td><td>" + response.MaLoaiPhong + "</td><td>" + response.MaLoaiTinhTrangPhong + "</td><td>" + response.GhiChu + "</td><td></td><td><button class='btn btn-warning editValue' data-toggle = 'modal' data-target='#myModal' value ='" + response.id + "'><i class='fa fa-pencil-square-o'></i> Sửa</button></td><td><button type='submit' class='btn btn-danger deleteValue' value='" + response.id + "'><i class='fa fa-trash-o'></i> Xóa</button></td></tr>");
                });
            }
            history.go(0);
        });

        /* Xem chi tiết - P.Manh - 2/12/17*/

        $('.detailValue').click(function() {
            var id = $(this).val();
            var TenPhong = $(this).parent().prev("td").prev("td").prev("td").prev("td").text();
            var MaLoaiPhong = $(this).parent().prev("td").prev("td").prev("td").text();
            var MaLoaiTinhTrangPhong = $(this).parent().prev("td").prev("td").text();
            var GhiChu = $(this).parent().prev("td").text();
            $('#id').val(id);
            $('#TenPhong').val(TenPhong);
            $('#MaLoaiPhong').val(MaLoaiPhong);
            $('#MaLoaiTinhTrangPhong').val(MaLoaiTinhTrangPhong);
            $('#GhiChu').val(GhiChu);
            $('#id').parent('div').hide();
            $('.createValue').hide();
            $('.updateValue').hide();
        });

        /* Sửa value - P.Manh - 5/11/17*/

        $('.editValue').click(function() {
            var id = $(this).val();
            var TenPhong = $(this).parent().prev("td").prev("td").prev("td").prev("td").prev("td").text();
            var MaLoaiPhong = $(this).parent().prev("td").prev("td").prev("td").prev("td").text();
            var MaLoaiTinhTrangPhong = $(this).parent().prev("td").prev("td").prev("td").text();
            var GhiChu = $(this).parent().prev("td").prev("td").text();
            $('#id').val(id);
            $('#TenPhong').val(TenPhong);
            $('#MaLoaiPhong').val(MaLoaiPhong);
            $('#MaLoaiTinhTrangPhong').val(MaLoaiTinhTrangPhong);
            $('#GhiChu').val(GhiChu);
            $('#id').parent('div').hide();
            $('.createValue').hide();
            $('.updateValue').show();
        });
        $('.updateValue').click(function(e) {
            e.preventDefault();
            var id = $('#id').val();
            var TenPhong = $('#TenPhong').val();
            var MaLoaiTinhTrangPhong = $('#MaLoaiTinhTrangPhong').val();
            var MaLoaiPhong = $('#MaLoaiPhong').val();
            var GhiChu = $('#GhiChu').val();
            if(MaLoaiPhong != '' && MaLoaiTinhTrangPhong != '' && GhiChu != '') {
                $.ajax({
                    dataType : 'json',
                    type : 'PUT',

                    // router
                    url : '/room/'+id,
                    data : {
                        _token: $('input[name=_token]').val(),
                        id : id,
                        TenPhong : TenPhong,
                        MaLoaiPhong : MaLoaiPhong,
                        MaLoaiTinhTrangPhong : MaLoaiTinhTrangPhong,
                        GhiChu : GhiChu
                        
                    }
                }).done(function(data) {
                   $('#myModal').modal('hide');
                   // $(".room"+id).replaceWith(
                   //  ("<tr class='room" + data.id + "'><td>" + data.id + "</td><td>" + data.MaLoaiPhong + "</td><td>" + data.MaLoaiTinhTrangPhong + "</td><td>" + data.GhiChu + "</td> <td><button class='btn btn-info detailValue' data-toggle = 'modal' data-target='#myModal' value ='" + data.id + "'><i class='fa fa-eye'></i> Xem</button></td>  <td><button class='btn btn-warning editValue' data-toggle = 'modal' data-target='#myModal' value ='" + data.id + "'><i class='fa fa-pencil-square-o'></i> Sửa</button></td><td><button type='submit' class='btn btn-danger deleteValue' value='" +data.id+ "'><i class='fa fa-trash-o'></i> Xóa</button></td></tr>")
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
                url : '/room/'+id,
                data : {
                    _token: $('input[name=_token]').val(),
                    id : id
                }
            }).done(function(data) {
                $("tr.room"+id).remove();
            })
        });

        // Search info

        $('input[name=key]').keyup(function() {
            var key = $(this).val();
            setTimeout(function() {
                $.ajax({
                    url: '/room.search',
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
<div class="modal fade" id="myModal" tabindex="-1" GhiChu="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Update</h4>
            </div>
            <div class="modal-body">
               {!! Form::open(['class' => 'form-horizontal', 'method' => 'POST', 'route' => ['room.update',$room->id]]) !!}
               <div>
                <label for="label">ID</label>
                <input type="text" name="id" class="form-control" id="id">
            </div>
            <div>
                <label for="label">Tên phòng</label>
                <input type="text" name="TenPhong" class="form-control" id="TenPhong">
            </div>
            <div>
                <label for="label">Mã loại phòng</label><!-- 
                <input type="text" name="MaLoaiPhong" class="form-control" id="MaLoaiPhong"> -->
                <select class="form-control" id="MaLoaiPhong" name="MaLoaiPhong">
                    <option value="">Select</option>
                    @foreach($loaiPhong as $lp)
                    <option value="{{ $lp->id }}">{{ $lp->TenLoaiPhong }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="label">Mã loại tình trạng phòng</label>
                <!-- <input type="text" name="MaLoaiTinhTrangPhong" class="form-control" id="MaLoaiTinhTrangPhong"> -->
                <select class="form-control" id="MaLoaiTinhTrangPhong" name="MaLoaiTinhTrangPhong">
                    <option value="">Select</option>
                    @foreach($tinhTrangPhong as $ttp)
                    <option value="{{ $ttp->id }}">{{ $ttp->TenLoaiTinhTrang }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="label">Ghi chú</label>
                <input type="text" name="GhiChu" class="form-control" id="GhiChu">
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