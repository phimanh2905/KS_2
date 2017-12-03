@extends('admin.master')
@section('content')
<div id="page-wrapper">
    @if (count($services) > 0)
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Danh sách dịch vụ
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
                                    <th>Mã loại dịch vụ</th>
                                    <th>Mã đơn vị</th>
                                    <th>Đơn giá (VND)</th>
                                    <th>Xem chi tiết</th>
                                    <th>Sửa</th>
                                    <th>Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($services as $service)
                                <tr class="service{{$service->id}}" >
                                    <td>{{$service->id}}</td>
                                    <td>{{$service->loaiDichVu->TenLoaiDichVu}}</td>
                                    <td>{{$service->donVi->TenDonVi}}</td>
                                    <td>{{$service->DonGia}}</td>
                                    <td>
                                        <button class="btn btn-info detailValue" data-toggle="modal" data-target="#myModal" value="{{$service->id}}""><i class="fa fa-eye"></i> Xem</button>
                                    </td>


                                    <td>
                                        <button class="btn btn-warning editValue" data-toggle="modal" data-target="#myModal" value="{{$service->id}}""><i class="fa fa-pencil-square-o"></i> Sửa</button>
                                    </td>
                                    <td>
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['service.destroy',$service->id]]) !!}
                                        <button class="btn btn-danger deleteValue" type="submit" value="{{$service->id}}"><i class="fa fa-trash-o" ></i> Xóa</button>
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
            $('#MaLoaiDichVu').val('');
            $('#MaDonVi').val('');
            $('#DonGia').val('');
            $('#password').parent('div').show();
            $('#id').parent('div').hide();
            $('.createValue').show();
            $('.updateValue').hide();
        });
        $('.createValue').click(function(e){
            e.preventDefault();
            var MaLoaiDichVu = $('#MaLoaiDichVu').val();
            var MaDonVi = $('#MaDonVi').val();
            var DonGia = $('#DonGia').val();
            if(MaLoaiDichVu != '' && MaDonVi != '' && DonGia != '') {
                $.ajax({
                    url : '/service',
                    dataType : 'json',
                    type : 'POST',
                    data : {
                        _token: $('input[name=_token]').val(),
                        MaLoaiDichVu : MaLoaiDichVu,
                        MaDonVi : MaDonVi,
                        DonGia : DonGia
                    }
                }).done(function(response) {
                    $('#myModal').modal('hide');
                    // $('tbody tr').append("<tr class='service" + response.id + "' ><td>" + data.id + "</td><td>" + response.MaLoaiDichVu + "</td><td>" + response.MaDonVi + "</td><td>" + response.DonGia + "</td><td></td><td><button class='btn btn-warning editValue' data-toggle = 'modal' data-target='#myModal' value ='" + response.id + "'><i class='fa fa-pencil-square-o'></i> Sửa</button></td><td><button type='submit' class='btn btn-danger deleteValue' value='" + response.id + "'><i class='fa fa-trash-o'></i> Xóa</button></td></tr>");
                });
            }
            history.go(0);
        });

        /* Xem chi tiết - P.Manh - 2/12/17*/

        $('.detailValue').click(function() {
            var id = $(this).val();
            var MaLoaiDichVu = $(this).parent().prev("td").prev("td").prev("td").text();
            var MaDonVi = $(this).parent().prev("td").prev("td").text();
            var DonGia = $(this).parent().prev("td").text();
            $('#id').val(id);
            $('#MaLoaiDichVu').val(MaLoaiDichVu);
            $('#MaDonVi').val(MaDonVi);
            $('#DonGia').val(DonGia);
            $('#id').parent('div').hide();
            $('.createValue').hide();
            $('.updateValue').hide();
        });

        /* Sửa value - P.Manh - 5/11/17*/

        $('.editValue').click(function() {
            var id = $(this).val();
            var MaLoaiDichVu = $(this).parent().prev("td").prev("td").prev("td").prev("td").text();
            var MaDonVi = $(this).parent().prev("td").prev("td").prev("td").text();
            var DonGia = $(this).parent().prev("td").prev("td").text();
            $('#id').val(id);
            $('#MaLoaiDichVu').val(MaLoaiDichVu);
            $('#MaDonVi').val(MaDonVi);
            $('#DonGia').val(DonGia);
            $('#id').parent('div').hide();
            $('.createValue').hide();
            $('.updateValue').show();
        });
        $('.updateValue').click(function(e) {
            e.preventDefault();
            var id = $('#id').val();
            var MaDonVi = $('#MaDonVi').val();
            var MaLoaiDichVu = $('#MaLoaiDichVu').val();
            var DonGia = $('#DonGia').val();
            if(MaLoaiDichVu != '' && MaDonVi != '' && DonGia != '') {
                $.ajax({
                    dataType : 'json',
                    type : 'PUT',

                    // router
                    url : '/service/'+id,
                    data : {
                        _token: $('input[name=_token]').val(),
                        id : id,
                        MaLoaiDichVu : MaLoaiDichVu,
                        MaDonVi : MaDonVi,
                        DonGia : DonGia
                        
                    }
                }).done(function(data) {
                   $('#myModal').modal('hide');
                   // $(".service"+id).replaceWith(
                   //  ("<tr class='service" + data.id + "'><td>" + data.id + "</td><td>" + data.MaLoaiDichVu + "</td><td>" + data.MaDonVi + "</td><td>" + data.DonGia + "</td> <td><button class='btn btn-info detailValue' data-toggle = 'modal' data-target='#myModal' value ='" + data.id + "'><i class='fa fa-eye'></i> Xem</button></td> <td><button class='btn btn-warning editValue' data-toggle = 'modal' data-target='#myModal' value ='" + data.id + "'><i class='fa fa-pencil-square-o'></i> Sửa</button></td><td><button type='submit' class='btn btn-danger deleteValue' value='" +data.id+ "'><i class='fa fa-trash-o'></i> Xóa</button></td></tr>")
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
                url : '/service/'+id,
                data : {
                    _token: $('input[name=_token]').val(),
                    id : id
                }
            }).done(function(data) {
                $("tr.service"+id).remove();
            })
        });

        // Search info

        $('input[name=key]').keyup(function() {
            var key = $(this).val();
            setTimeout(function() {
                $.ajax({
                    url: '/service.search',
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
<div class="modal fade" id="myModal" tabindex="-1" DonGia="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Update</h4>
            </div>
            <div class="modal-body">
               {!! Form::open(['class' => 'form-horizontal', 'method' => 'POST', 'route' => ['service.update',$service->id]]) !!}
               <div>
                <label for="label">ID</label>
                <input type="text" name="id" class="form-control" id="id">
            </div>
            <div>
                <label for="label">Mã loại dịch vụ</label>
                <!-- <input type="text" name="MaLoaiDichVu" class="form-control" id="MaLoaiDichVu"> -->
                <select class="form-control" id="MaLoaiDichVu" name="MaLoaiDichVu">
                    <option value="">Select</option>
                    @foreach($loaiDichVu as $ldv)
                    <option value="{{ $ldv->id }}">{{ $ldv->TenLoaiDichVu }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="label">Mã đơn vị</label>
                <!-- <input type="text" name="MaDonVi" class="form-control" id="MaDonVi"> -->
                <select class="form-control" id="MaDonVi" name="MaDonVi">
                    <option value="">Select</option>
                    @foreach($donVi as $dv)
                    <option value="{{ $dv->id }}">{{ $dv->TenDonVi }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="label">Đơn giá (VNĐ)</label>
                <!-- <input type="text" name="DonGia" class="form-control" id="DonGia"> -->
                <div class="form-group input-group" >
                    <span class="input-group-addon">VND</span>
                    <input type="text" class="form-control" name="DonGia" id="DonGia">
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