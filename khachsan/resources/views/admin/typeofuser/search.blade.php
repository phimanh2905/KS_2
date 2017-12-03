@foreach($typeofusers as $typeofuser)
<tr>
    <td>{{$typeofuser->id}}</td>
    <td>{{$typeofuser->TenLoaiNguoiDung}}</td>
    <td>
        {!! Form::button('<i class="fa fa-eye" aria-hidden="true"></i> Xem', ['class' => 'btn btn-info detailValue', 'data-toggle' => 'modal', 'data-target' => '#myModal','value'=> $typeofuser->id]) !!}
    </td>
    <td>
        {!! Form::button('<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa', ['class' => 'btn btn-warning editValue', 'data-toggle' => 'modal', 'data-target' => '#myModal','value'=> $typeofuser->id]) !!}
    </td>
    <td>
        {!! Form::open(['method'=>'DELETE','route' => ['typeofuser.destroy',$typeofuser->id]]) !!}
        {!! Form::button(' <i class="fa fa-trash-o"></i>  Xóa',['class'=> 'btn btn-danger deleteValue', 'type' => 'submit', 'value'=> $typeofuser->id]) !!}
        {!! Form::close() !!}
    </td>
</tr>
@endforeachs