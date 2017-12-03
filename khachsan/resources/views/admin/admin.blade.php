@extends('admin.master')
@section('content')
<div id="page-wrapper">
    <!-- Button trigger modal -->
    
    @if (count($users) > 0)
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Danh sách người dùng
                </div>

                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <button class="btn btn-success addValue" data-toggle="modal" data-target="#myModal" style="margin-bottom: 20px;"><i class="fa fa-plus"></i>
                                Add user
                            </button>
                        </div>
                        <div class="col-lg-6">
                            {!! Form::text('key','', ['class'=>'form-control key','placeholder' => 'Nhập từ khóa tìm kiếm']) !!}
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" style="text-align:center;">
                            <thead >
                                <tr>
                                    <th>ID</th>
                                    <th>Tên người dùng</th>
                                    <th>Email</th>
                                    <th>Quyền</th>
                                    <th>Xem chi tiết</th>
                                    <th>Sửa</th>
                                    <th>Xóa</th>
                                </tr>
                            </thead>
                            <tbody >
                                @foreach($users as $user)
                                <tr class="user{{$user->id}}">
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role }}</td>
                                    <td>
                                        <button class="btn btn-info detailValue" data-toggle="modal" data-target="#myModal" value="{{$user->id}}""><i class="fa fa-eye"></i> Xem</button>
                                    </td>

                                    <td>
                                        <button class="btn btn-warning editValue" data-toggle="modal" data-target="#myModal" value="{{$user->id}}""><i class="fa fa-pencil-square-o"></i> Sửa</button>
                                    </td>
                                    <td>
                                        {!! Form::open(['method' => 'DELETE', 'route' => ['admin.destroy',$user->id]]) !!}
                                        <button class="btn btn-danger deleteValue" type="submit" value="{{$user->id}}"><i class="fa fa-trash-o" ></i> Xóa</button>
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
    </div>
    <!-- /.row -->
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Update</h4>
            </div>
            <div class="modal-body">
               {!! Form::open(['class' => 'form-horizontal', 'method' => 'POST', 'route' => ['admin.update',$user->id]]) !!}
               <div>
                <label for="label">ID</label>
                <input type="text" name="id" class="form-control" id="id">
            </div>
            <div>
                <label for="label">Tên người dùng</label>
                <input type="text" name="name" class="form-control" id="name">
            </div>
            <div>
                <label for="label">Email</label>
                <input type="email" name="email" class="form-control" id="email">
            </div>
            <div>
                <label for="password">Mật khẩu</label>
                <input type="password" name="password" class="form-control" id="password">
            </div>
            <div>
                <label for="label">Quyền</label>
                <!-- <input type="text" name="role" class="form-control" id="role"> -->
                <select name="role" class="form-control" id="role">
                    <option value="1">Admin</option>
                    <option value="2">User</option>
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
@endif
@endsection
@section('script')
<script type="text/javascript">


 $(document).ready(function() {

    /* Add value - Vu - 31/10/17*/

    $('.addValue').click(function() {
        $('#id').val('');
        $('#name').val('');
        $('#email').val('');
        $('#password').val('');
        $('#role').val('');
        $('#password').parent('div').show();
        $('#id').parent('div').hide();
        $('.createValue').show();
        $('.updateValue').hide();
    });
    $('.createValue').click(function(e){
        e.preventDefault();
        var name = $('#name').val();
        var email = $('#email').val();
        var password = $('#password').val();
        var role = $('#role').val();
        if(name != '' && email != '' && password != '') {
            $.ajax({
                // router admin
                url : '/admin',
                dataType : 'json',
                type : 'POST',
                data : {
                    _token: $('input[name=_token]').val(),
                    name : name,
                    email : email,
                    password : password,
                    role : role
                }
            }).done(function(response) {
                $('#myModal').modal('hide');
                // $('tbody tr').append("<tr class='user" + response.id + "'><td>" + data.id + "</td><td>" + response.name + "</td><td>" + response.email + "</td><td>" + response.role + "</td><td><button class='btn btn-warning editValue' data-toggle = 'modal' data-target='#myModal' value ='" + response.id + "'><i class='fa fa-pencil-square-o'></i> Sửa</button></td><td><button type='submit' class='btn btn-danger deleteValue' value='" + response.id + "'><i class='fa fa-trash-o'></i> Xóa</button></td></tr>");
            });
        }
        history.go(0);
    });

    /* Xem chi tiết - P.Manh - 2/12/17*/

    $('.detailValue').click(function() {
        var id = $(this).val();
        var name = $(this).parent().prev("td").prev("td").prev("td").text();
        var email = $(this).parent().prev("td").prev("td").text();
        var role = $(this).parent().prev("td").text();
        $('#id').val(id);
        $('#name').val(name);
        $('#email').val(email);
        $('#role').val(role);
        $('#id').parent('div').hide();
        $('#password').parent('div').hide();
        $('.createValue').hide();
        $('.updateValue').hide();
    });

    /* Edit value - Vu - 31/10/17*/

    $('.editValue').click(function() {
        var id = $(this).val();
        var name = $(this).parent().prev("td").prev("td").prev("td").prev("td").text();
        var email = $(this).parent().prev("td").prev("td").prev("td").text();
        var role = $(this).parent().prev("td").prev("td").text();
        $('#id').val(id);
        $('#name').val(name);
        $('#email').val(email);
        $('#role').val(role);
        $('#id').parent('div').hide();
        $('#password').parent('div').hide();
        $('.createValue').hide();
        $('.updateValue').show();
    });
    $('.updateValue').click(function(e) {
        e.preventDefault();
        var id = $('#id').val();
        var email = $('#email').val();
        var name = $('#name').val();
        var role = $('#role').val();
        if (email != '' && name != '') {
            $.ajax({
                dataType : 'json',
                type : 'PUT',
                url : '/admin/'+id,
                data : {
                    _token: $('input[name=_token]').val(),
                    id : id,
                    name : name,
                    email : email,
                    role : role
                }
            }).done(function(data) {
             $('#myModal').modal('hide');
             // $(".user"+id).replaceWith(
             //    ("<tr class='user" + data.id + "'><td>" + data.id + "</td><td>" + data.name + "</td><td>" + data.email + "</td><td>" + data.role + "</td><td><button class='btn btn-info detailValue' data-toggle = 'modal' data-target='#myModal' value ='" + data.id + "'><i class='fa fa-eye'></i> Xem</button></td><td><button class='btn btn-warning editValue' data-toggle = 'modal' data-target='#myModal' value ='" + data.id + "'><i class='fa fa-pencil-square-o'></i> Sửa</button></td><td><button type='submit' class='btn btn-danger deleteValue' value='" +data.id+ "'><i class='fa fa-trash-o'></i> Xóa</button></td></tr>")
             //    );
         })
        }
        history.go(0);
    })
    $(document).on('click', '.deleteValue', function(e) {
        e.preventDefault();
        var id = $(this).val();
        $.ajax({
            type : 'DELETE',
            url : '/admin/'+id,
            data : {
                _token: $('input[name=_token]').val(),
                id : id
            }
        }).done(function(data) {
            $("tr.user"+id).remove();
        })
    });
    $('input[name=key]').keyup(function() {
        var key = $(this).val();
        setTimeout(function() {
            $.ajax({
                url: '/search',
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