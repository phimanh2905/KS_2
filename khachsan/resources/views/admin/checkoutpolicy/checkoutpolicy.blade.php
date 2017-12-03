@extends('admin.master')
@section('content')
<div id="page-wrapper">
    @if (count($checkoutpolicys) > 0)
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Chính sách trả phòng
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
                                    <th>Thời gian quy định</th>
                                    <th>Phụ thu (%)</th>
                                    <th>Xem chi tiết</th>
                                    <th>Sửa</th>
                                    <th>Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($checkoutpolicys as $checkoutpolicy)
                                <tr class="checkoutpolicy{{$checkoutpolicy->id}}" >
                                    <td>{{$checkoutpolicy->id}}</td>
                                    <td>{{$checkoutpolicy->ThoiGianQuyDinh}}</td>
                                    <td>{{$checkoutpolicy->PhuThu}}</td>
                                    <td>
                                        <button class="btn btn-info detailValue" data-toggle="modal" data-target="#myModal" value="{{$checkoutpolicy->id}}""><i class="fa fa-eye"></i> Xem</button>
                                    </td>

                                    <td>
                                        <button class="btn btn-warning editValue" data-toggle="modal" data-target="#myModal" value="{{$checkoutpolicy->id}}""><i class="fa fa-pencil-square-o"></i> Sửa</button>
                                    </td>
                                    <td>
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['checkoutpolicy.destroy',$checkoutpolicy->id]]) !!}
                                        <button class="btn btn-danger deleteValue" type="submit" value="{{$checkoutpolicy->id}}"><i class="fa fa-trash-o" ></i> Xóa</button>
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
            $('#ThoiGianQuyDinh').val('');
            $('#PhuThu').val('');
            $('#password').parent('div').show();
            $('#id').parent('div').hide();
            $('.createValue').show();
            $('.updateValue').hide();
        });
        $('.createValue').click(function(e){
            e.preventDefault();
            var ThoiGianQuyDinh = $('#ThoiGianQuyDinh').val();
            var PhuThu = $('#PhuThu').val();
            
            if(ThoiGianQuyDinh != '' && PhuThu != '') {
                $.ajax({
                    url : '/checkoutpolicy',
                    dataType : 'json',
                    type : 'POST',
                    data : {
                        _token: $('input[name=_token]').val(),
                        ThoiGianQuyDinh : ThoiGianQuyDinh,
                        PhuThu : PhuThu,
                    }
                }).done(function(response) {
                    $('#myModal').modal('hide');
                    // $('tbody tr').append("<tr class='checkoutpolicy" + response.id + "' ><td>" + data.id + "</td><td>" + response.ThoiGianQuyDinh + "</td><td>" + response.PhuThu + "</td><td></td><td><button class='btn btn-warning editValue' data-toggle = 'modal' data-target='#myModal' value ='" + response.id + "'><i class='fa fa-pencil-square-o'></i> Sửa</button></td><td><button type='submit' class='btn btn-danger deleteValue' value='" + response.id + "'><i class='fa fa-trash-o'></i> Xóa</button></td></tr>");
                });
            }
            history.go(0);
        });

        /* Xem chi tiết - P.Manh - 2/12/17*/

        $('.detailValue').click(function() {
            var id = $(this).val();
            var ThoiGianQuyDinh = $(this).parent().prev("td").prev("td").text();
            var PhuThu = $(this).parent().prev("td").text();
            $('#id').val(id);
            $('#ThoiGianQuyDinh').val(ThoiGianQuyDinh);
            $('#PhuThu').val(PhuThu);
            
            $('#id').parent('div').hide();
            $('.createValue').hide();
            $('.updateValue').hide();
        });

        /* Sửa value - P.Manh - 5/11/17*/

        $('.editValue').click(function() {
            var id = $(this).val();
            var ThoiGianQuyDinh = $(this).parent().prev("td").prev("td").prev("td").text();
            var PhuThu = $(this).parent().prev("td").prev("td").text();
            $('#id').val(id);
            $('#ThoiGianQuyDinh').val(ThoiGianQuyDinh);
            $('#PhuThu').val(PhuThu);
            
            $('#id').parent('div').hide();
            $('.createValue').hide();
            $('.updateValue').show();
        });
        $('.updateValue').click(function(e) {
            e.preventDefault();
            var id = $('#id').val();
            var PhuThu = $('#PhuThu').val();
            var ThoiGianQuyDinh = $('#ThoiGianQuyDinh').val();
            if(ThoiGianQuyDinh != '' && PhuThu != '' ) {
                $.ajax({
                    dataType : 'json',
                    type : 'PUT',

                    // router
                    url : '/checkoutpolicy/'+id,
                    data : {
                        _token: $('input[name=_token]').val(),
                        id : id,
                        ThoiGianQuyDinh : ThoiGianQuyDinh,
                        PhuThu : PhuThu,
                        
                    }
                }).done(function(data) {
                 $('#myModal').modal('hide');
                 // $(".checkoutpolicy"+id).replaceWith(
                 //    ("<tr class='checkoutpolicy" + data.id + "'><td>" + data.id + "</td><td>" + data.ThoiGianQuyDinh + "</td><td>" + data.PhuThu + "</td> <td><button class='btn btn-info detailValue' data-toggle = 'modal' data-target='#myModal' value ='" + data.id + "'><i class='fa fa-eye'></i> Xem</button></td>  <td><button class='btn btn-warning editValue' data-toggle = 'modal' data-target='#myModal' value ='" + data.id + "'><i class='fa fa-pencil-square-o'></i> Sửa</button></td><td><button type='submit' class='btn btn-danger deleteValue' value='" +data.id+ "'><i class='fa fa-trash-o'></i> Xóa</button></td></tr>")
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
                url : '/checkoutpolicy/'+id,
                data : {
                    _token: $('input[name=_token]').val(),
                    id : id
                }
            }).done(function(data) {
                $("tr.checkoutpolicy"+id).remove();
            })
        });

        // Search info

        $('input[name=key]').keyup(function() {
            var key = $(this).val();
            setTimeout(function() {
                $.ajax({
                    url: '/checkoutpolicy.search',
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
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Update</h4>
            </div>
            <div class="modal-body">
             {!! Form::open(['class' => 'form-horizontal', 'method' => 'POST', 'route' => ['checkoutpolicy.update',$checkoutpolicy->id]]) !!}
             <div>
                <label for="label">ID</label>
                <input type="text" name="id" class="form-control" id="id">
            </div>
            <div>
                <label for="label">Thời gian quy định</label>
                <input type="text" name="ThoiGianQuyDinh" class="form-control" id="ThoiGianQuyDinh">
            </div>
            <div>
                <label for="label">Phụ thu (%)</label>
                <input type="text" name="PhuThu" class="form-control" id="PhuThu">
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