@extends('admin.master')
@section('content')
<div id="page-wrapper">
    @if (count($regulations) > 0)
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
                        <table class="table table-striped table-bordered table-hover" >
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên quy định</th>
                                    <th>Mô tả</th>
                                    <th>Xem chi tiết</th>
                                    <th>Sửa</th>
                                    <th>Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($regulations as $regulation)
                                <tr class="regulation{{$regulation->id}}" style="text-align:center;">
                                    <td>{{$regulation->id}}</td>
                                    <td>{{$regulation->TenQuyDinh}}</td>
                                    <td>{{$regulation->MoTa}}</td>
                                    
                                    <td>
                                        <button class="btn btn-info detailValue" data-toggle="modal" data-target="#myModal" value="{{$checkindetail->id}}""><i class="fa fa-eye"></i> Xem</button>
                                    </td>

                                    <td>
                                        <button class="btn btn-warning editValue" data-toggle="modal" data-target="#myModal" value="{{$regulation->id}}""><i class="fa fa-pencil-square-o"></i> Sửa</button>
                                    </td>
                                    <td>
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['regulation.destroy',$regulation->id]]) !!}
                                        <button class="btn btn-danger deleteValue" type="submit" value="{{$regulation->id}}"><i class="fa fa-trash-o" ></i> Xóa</button>
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
                    url : '/regulation',
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
                    // $('tbody tr').append("<tr class='regulation" + response.id + "' ><td>" + data.id + "</td><td>" + response.TenThietBi + "</td><td>" + response.MaLoaiPhong + "</td><td>" + response.SoLuong + "</td><td></td><td><button class='btn btn-warning editValue' data-toggle = 'modal' data-target='#myModal' value ='" + response.id + "'><i class='fa fa-pencil-square-o'></i> Sửa</button></td><td><button type='submit' class='btn btn-danger deleteValue' value='" + response.id + "'><i class='fa fa-trash-o'></i> Xóa</button></td></tr>");
                });
            }
            history.go(0);
        });

        /* Xem chi tiết - P.Manh - 2/12/17*/

        $('.detailValue').click(function() {
            var id = $(this).val();
            var TenThietBi = $(this).parent().prev("td").prev("td").prev("td").prev("td").text();
            var MaLoaiPhong = $(this).parent().prev("td").prev("td").prev("td").text();
            var SoLuong = $(this).parent().prev("td").prev("td").text();
            $('#id').val(id);
            $('#TenThietBi').val(TenThietBi);
            $('#MaLoaiPhong').val(MaLoaiPhong);
            $('#SoLuong').val(SoLuong);
            $('#id').parent('div').show();
            $('.createValue').hide();
            $('.updateValue').hide();
        });

        /* Sửa value - P.Manh - 5/11/17*/

        $('.editValue').click(function() {
            var id = $(this).val();
            var TenThietBi = $(this).parent().prev("td").prev("td").prev("td").prev("td").prev("td").text();
            var MaLoaiPhong = $(this).parent().prev("td").prev("td").prev("td").prev("td").text();
            var SoLuong = $(this).parent().prev("td").prev("td").prev("td").text();
            $('#id').val(id);
            $('#TenThietBi').val(TenThietBi);
            $('#MaLoaiPhong').val(MaLoaiPhong);
            $('#SoLuong').val(SoLuong);
            $('#id').parent('div').show();
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
                    url : '/regulation/'+id,
                    data : {
                        _token: $('input[name=_token]').val(),
                        id : id,
                        TenThietBi : TenThietBi,
                        MaLoaiPhong : MaLoaiPhong,
                        SoLuong : SoLuong
                        
                    }
                }).done(function(data) {
                 $('#myModal').modal('hide');
                 // $(".regulation"+id).replaceWith(
                 //    ("<tr class='regulation" + data.id + "'><td>" + data.id + "</td><td>" + data.TenThietBi + "</td><td>" + data.MaLoaiPhong + "</td><td>" + data.SoLuong + "</td><td><button class='btn btn-warning editValue' data-toggle = 'modal' data-target='#myModal' value ='" + data.id + "'><i class='fa fa-pencil-square-o'></i> Sửa</button></td><td><button type='submit' class='btn btn-danger deleteValue' value='" +data.id+ "'><i class='fa fa-trash-o'></i> Xóa</button></td></tr>")
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
                url : '/regulation/'+id,
                data : {
                    _token: $('input[name=_token]').val(),
                    id : id
                }
            }).done(function(data) {
                $("tr.regulation"+id).remove();
            })
        });

        // Search info

        $('input[name=key]').keyup(function() {
            var key = $(this).val();
            setTimeout(function() {
                $.ajax({
                    url: '/regulation.search',
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
             {!! Form::open(['class' => 'form-horizontal', 'method' => 'POST', 'route' => ['regulations.update',$regulations->id]]) !!}
             <div>
                <label for="label">ID</label>
                <input type="text" name="id" class="form-control" id="id">
            </div>
            <div>
                <label for="label"></label>
                <input type="text" name="" class="form-control" id="">
            </div>
            <div>
                <label for="label"></label>
                <input type="text" name="" class="form-control" id="">
            </div>
            <div>
                <label for="label"></label>
                <input type="text" name="" class="form-control" id="">
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