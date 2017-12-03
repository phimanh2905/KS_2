@foreach($typeofservices as $typeofservice)
<tr>
    <td>{{$typeofservice->id}}</td>
    <td>{{$typeofservice->TenLoaiDichVu}}</td>
    <td>
        {!! Form::button('<i class="fa fa-eye" aria-hidden="true"></i> Xem', ['class' => 'btn btn-info detailValue', 'data-toggle' => 'modal', 'data-target' => '#myModal','value'=> $typeofservice->id]) !!}
    </td>
    <td>
        {!! Form::button('<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa', ['class' => 'btn btn-warning editValue', 'data-toggle' => 'modal', 'data-target' => '#myModal','value'=> $typeofservice->id]) !!}
    </td>
    <td>
        {!! Form::open(['method'=>'DELETE','route' => ['typeofservice.destroy',$typeofservice->id]]) !!}
        {!! Form::button(' <i class="fa fa-trash-o"></i>  Xóa',['class'=> 'btn btn-danger deleteValue', 'type' => 'submit', 'value'=> $typeofservice->id]) !!}
        {!! Form::close() !!}
    </td>
</tr>
@endforeach