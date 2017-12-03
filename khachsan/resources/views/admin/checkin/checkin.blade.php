@extends('admin.master')
@section('content')
<div id="page-wrapper">
    @if (count($checkins) > 0)
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Danh sách phiếu nhận phòng
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
                                    <th>Mã phiếu thuê</th>
                                    <th>Mã khách hàng</th>
                                    <th>Xem chi tiết</th>
                                    <th>Sửa</th>
                                    <th>Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($checkins as $checkin)
                                <tr class="checkin{{$checkin->id}}" >
                                    <td>{{$checkin->id}}</td>
                                    <td>{{$checkin->MaPhieuThue}}</td>
                                    <td>{{$checkin->khachHang->TenKhachHang}}</td>
                                    <td>
                                        <button class="btn btn-info detailValue" data-toggle="modal" data-target="#myModal" value="{{$checkin->id}}""><i class="fa fa-pencil-square-o"></i> Sửa</button>
                                    </td>
                                    <td>
                                        <button class="btn btn-warning editValue" data-toggle="modal" data-target="#myModal" value="{{$checkin->id}}""><i class="fa fa-pencil-square-o"></i> Sửa</button>
                                    </td>
                                    <td>
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['checkin.destroy',$checkin->id]]) !!}
                                        <button class="btn btn-danger deleteValue" type="submit" value="{{$checkin->id}}"><i class="fa fa-trash-o" ></i> Xóa</button>
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
            $('#MaPhieuThue').val('');
            $('#MaKhachHang').val('');
            // $('#SoLuong').val('');
            $('#password').parent('div').show();
            $('#id').parent('div').hide();
            $('.createValue').show();
            $('.updateValue').hide();
        });
        $('.createValue').click(function(e){
            e.preventDefault();
            var MaPhieuThue = $('#MaPhieuThue').val();
            var MaKhachHang = $('#MaKhachHang').val();
            // var SoLuong = $('#SoLuong').val();
            if(MaPhieuThue != '' && MaKhachHang != '' ) {
                $.ajax({
                    url : '/checkin',
                    dataType : 'json',
                    type : 'POST',
                    data : {
                        _token: $('input[name=_token]').val(),
                        MaPhieuThue : MaPhieuThue,
                        MaKhachHang : MaKhachHang
                    }
                })
                .done(function(response) {
                    $('#myModal').modal('hide');
                //     $('tbody tr').append("<tr class='checkin" + response.id + "' ><td>" + data.id + "</td><td>" + response.MaPhieuThue + "</td><td>" + response.MaKhachHang + "</td><td><button class='btn btn-warning editValue' data-toggle = 'modal' data-target='#myModal' value ='" + response.id + "'><i class='fa fa-pencil-square-o'></i> Sửa</button></td><td><button type='submit' class='btn btn-danger deleteValue' value='" + response.id + "'><i class='fa fa-trash-o'></i> Xóa</button></td></tr>");
                });
            }
            history.go(0);
        });

                /* Xem chi tiết - P.Manh - 2/12/17*/

                $('.detailValue').click(function() {
                    var id = $(this).val();
                    var MaPhieuThue = $(this).parent().prev("td").prev("td").text();
                    var MaKhachHang = $(this).parent().prev("td").text();
            // var SoLuong = $(this).parent().prev("td").prev("td").text();
            $('#id').val(id);
            $('#MaPhieuThue').val(MaPhieuThue);
            $('#MaKhachHang').val(MaKhachHang);
            // $('#SoLuong').val(SoLuong);
            $('#id').parent('div').hide();
            $('.createValue').hide();
            $('.updateValue').hide();
        });

                /* Sửa value - P.Manh - 5/11/17*/

                $('.editValue').click(function() {
                    var id = $(this).val();
                    var MaPhieuThue = $(this).parent().prev("td").prev("td").prev("td").text();
                    var MaKhachHang = $(this).parent().prev("td").prev("td").text();
            // var SoLuong = $(this).parent().prev("td").prev("td").text();
            $('#id').val(id);
            $('#MaPhieuThue').val(MaPhieuThue);
            $('#MaKhachHang').val(MaKhachHang);
            // $('#SoLuong').val(SoLuong);
            $('#id').parent('div').hide();
            $('.createValue').hide();
            $('.updateValue').show();
        });
                $('.updateValue').click(function(e) {
                    e.preventDefault();
                    var id = $('#id').val();
                    var MaKhachHang = $('#MaKhachHang').val();
                    var MaPhieuThue = $('#MaPhieuThue').val();
            // var SoLuong = $('#SoLuong').val();
            if(MaPhieuThue != '' && MaKhachHang != '' ) {
                $.ajax({
                    dataType : 'json',
                    type : 'PUT',

                    // router
                    url : '/checkin/'+id,
                    data : {
                        _token: $('input[name=_token]').val(),
                        id : id,
                        MaPhieuThue : MaPhieuThue,
                        MaKhachHang : MaKhachHang
                        
                    }
                }).done(function(data) {
                 $('#myModal').modal('hide');
                 // $(".checkin"+id).replaceWith(
                 //    ("<tr class='checkin" + data.id + "'><td>" + data.id + "</td><td>" + data.MaPhieuThue + "</td><td>" + data.MaKhachHang + "</td> <td><button class='btn btn-info detailValue' data-toggle = 'modal' data-target='#myModal' value ='" + data.id + "'><i class='fa fa-eye'></i> Xem</button></td> <td><button class='btn btn-warning editValue' data-toggle = 'modal' data-target='#myModal' value ='" + data.id + "'><i class='fa fa-pencil-square-o'></i> Sửa</button></td><td><button type='submit' class='btn btn-danger deleteValue' value='" +data.id+ "'><i class='fa fa-trash-o'></i> Xóa</button></td></tr>")
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
                url : '/checkin/'+id,
                data : {
                    _token: $('input[name=_token]').val(),
                    id : id
                }
            }).done(function(data) {
                $("tr.checkin"+id).remove();
            })
        });

        // Search info

        $('input[name=key]').keyup(function() {
            var key = $(this).val();
            setTimeout(function() {
                $.ajax({
                    url: '/checkin.search',
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
<div class="modal fade" id="myModal" tabindex="-1" SoLuong="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Update</h4>
            </div>
            <div class="modal-body">
             {!! Form::open(['class' => 'form-horizontal', 'method' => 'POST', 'route' => ['checkin.update',$checkin->id]]) !!}
             <div>
                <label for="label">ID</label>
                <input type="text" name="id" class="form-control" id="id">
            </div>
            <div>
                <label for="label">Mã phiếu thuê</label>
                <!-- <input type="text" name="MaPhieuThue" class="form-control" id="MaPhieuThue"> -->
                <select class="form-control" id="MaPhieuThue" name="MaPhieuThue">
                    <option value="">Select</option>
                    @foreach($phieuThue as $pt)
                    <option value="{{ $pt->id }}">{{ $pt->id }}</option>
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