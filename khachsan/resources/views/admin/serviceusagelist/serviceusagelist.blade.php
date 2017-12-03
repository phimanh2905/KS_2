@extends('admin.master')
@section('content')
<div id="page-wrapper">
    @if (count($serviceusagelists) > 0)
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Danh sách sử dụng dịch vụ
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
                        <table class="table table-striped table-bordered table-hover" style="text-align:center;" >
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Mã dịch vụ</th>
                                    <th>Mã phòng</th>
                                    <th>Số lượng</th>
                                    <th>Xem chi tiết</th>
                                    <th>Sửa</th>
                                    <th>Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($serviceusagelists as $serviceusagelist)
                                <tr class="serviceusagelist{{$serviceusagelist->id}}" >
                                    <td>{{$serviceusagelist->id}}</td>
                                    <td>{{$serviceusagelist->MaDichVu}}</td>
                                    <td>{{$serviceusagelist->MaPhong}}</td>
                                    <td>{{$serviceusagelist->SoLuong}}</td>
                                    <td>
                                        <button class="btn btn-info detailValue" data-toggle="modal" data-target="#myModal" value="{{$serviceusagelist->id}}""><i class="fa fa-eye"></i> Xem</button>
                                    </td>


                                    <td>
                                        <button class="btn btn-warning editValue" data-toggle="modal" data-target="#myModal" value="{{$serviceusagelist->id}}""><i class="fa fa-pencil-square-o"></i> Sửa</button>
                                    </td>
                                    <td>
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['serviceusagelist.destroy',$serviceusagelist->id]]) !!}
                                        <button class="btn btn-danger deleteValue" type="submit" value="{{$serviceusagelist->id}}"><i class="fa fa-trash-o" ></i> Xóa</button>
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
            $('#MaDichVu').val('');
            $('#MaPhong').val('');
            $('#SoLuong').val('');
            $('#password').parent('div').show();
            $('#id').parent('div').hide();
            $('.createValue').show();
            $('.updateValue').hide();
        });
        $('.createValue').click(function(e){
            e.preventDefault();
            var MaDichVu = $('#MaDichVu').val();
            var MaPhong = $('#MaPhong').val();
            var SoLuong = $('#SoLuong').val();
            if(MaDichVu != '' && MaPhong != '' && SoLuong != '') {
                $.ajax({
                    url : '/serviceusagelist',
                    dataType : 'json',
                    type : 'POST',
                    data : {
                        _token: $('input[name=_token]').val(),
                        MaDichVu : MaDichVu,
                        MaPhong : MaPhong,
                        SoLuong : SoLuong
                    }
                }).done(function(response) {
                    $('#myModal').modal('hide');
                    // $('tbody tr').append("<tr class='serviceusagelist" + response.id + "' ><td>" + data.id + "</td><td>" + response.MaDichVu + "</td><td>" + response.MaPhong + "</td><td>" + response.SoLuong + "</td><td></td><td><button class='btn btn-warning editValue' data-toggle = 'modal' data-target='#myModal' value ='" + response.id + "'><i class='fa fa-pencil-square-o'></i> Sửa</button></td><td><button type='submit' class='btn btn-danger deleteValue' value='" + response.id + "'><i class='fa fa-trash-o'></i> Xóa</button></td></tr>");
                });
            }
            history.go(0);
        });

        /* Xem chi tiết - P.Manh - 2/12/17*/

        $('.detailValue').click(function() {
            var id = $(this).val();
            var MaDichVu = $(this).parent().prev("td").prev("td").prev("td").text();
            var MaPhong = $(this).parent().prev("td").prev("td").text();
            var SoLuong = $(this).parent().prev("td").text();
            $('#id').val(id);
            $('#MaDichVu').val(MaDichVu);
            $('#MaPhong').val(MaPhong);
            $('#SoLuong').val(SoLuong);
            $('#id').parent('div').hide();
            $('.createValue').hide();
            $('.updateValue').hide();
        });

        /* Sửa value - P.Manh - 5/11/17*/

        $('.editValue').click(function() {
            var id = $(this).val();
            var MaDichVu = $(this).parent().prev("td").prev("td").prev("td").prev("td").text();
            var MaPhong = $(this).parent().prev("td").prev("td").prev("td").text();
            var SoLuong = $(this).parent().prev("td").prev("td").text();
            $('#id').val(id);
            $('#MaDichVu').val(MaDichVu);
            $('#MaPhong').val(MaPhong);
            $('#SoLuong').val(SoLuong);
            $('#id').parent('div').hide();
            $('.createValue').hide();
            $('.updateValue').show();
        });
        $('.updateValue').click(function(e) {
            e.preventDefault();
            var id = $('#id').val();
            var MaPhong = $('#MaPhong').val();
            var MaDichVu = $('#MaDichVu').val();
            var SoLuong = $('#SoLuong').val();
            if(MaDichVu != '' && MaPhong != '' && SoLuong != '') {
                $.ajax({
                    dataType : 'json',
                    type : 'PUT',

                    // router
                    url : '/serviceusagelist/'+id,
                    data : {
                        _token: $('input[name=_token]').val(),
                        id : id,
                        MaDichVu : MaDichVu,
                        MaPhong : MaPhong,
                        SoLuong : SoLuong
                        
                    }
                }).done(function(data) {
                   $('#myModal').modal('hide');
                   // $(".serviceusagelist"+id).replaceWith(
                   //  ("<tr class='serviceusagelist" + data.id + "'><td>" + data.id + "</td><td>" + data.MaDichVu + "</td><td>" + data.MaPhong + "</td><td>" + data.SoLuong + "</td><td><button class='btn btn-info detailValue' data-toggle = 'modal' data-target='#myModal' value ='" + data.id + "'><i class='fa fa-eye'></i> Xem</button></td><td><button class='btn btn-warning editValue' data-toggle = 'modal' data-target='#myModal' value ='" + data.id + "'><i class='fa fa-pencil-square-o'></i> Sửa</button></td><td><button type='submit' class='btn btn-danger deleteValue' value='" +data.id+ "'><i class='fa fa-trash-o'></i> Xóa</button></td></tr>")
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
                url : '/serviceusagelist/'+id,
                data : {
                    _token: $('input[name=_token]').val(),
                    id : id
                }
            }).done(function(data) {
                $("tr.serviceusagelist"+id).remove();
            })
        });

        // Search info

        $('input[name=key]').keyup(function() {
            var key = $(this).val();
            setTimeout(function() {
                $.ajax({
                    url: '/serviceusagelist.search',
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
               {!! Form::open(['class' => 'form-horizontal', 'method' => 'POST', 'route' => ['serviceusagelist.update',$serviceusagelist->id]]) !!}
               <div>
                <label for="label">ID</label>
                <input type="text" name="id" class="form-control" id="id">
            </div>
            <div>
                <label for="label">Mã dịch vụ</label>
                <!-- <input type="text" name="MaDichVu" class="form-control" id="MaDichVu"> -->
                <select class="form-control" id="MaDichVu" name="MaDichVu">
                    <option value="">Select</option>
                    @foreach($loaiDichVu as $ldv)
                    <option value="{{ $ldv->id }}">{{ $ldv->TenLoaiDichVu }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="label">Mã phòng</label>
                <!-- <input type="text" name="MaPhong" class="form-control" id="MaPhong"> -->
                <select class="form-control" id="MaPhong" name="MaPhong">
                    <option value="">Select</option>
                    @foreach($nhanPhong as $np)
                    <option value="{{ $np->id }}">{{ $np->TenPhong }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="label">Số lượng</label>
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
@endsection