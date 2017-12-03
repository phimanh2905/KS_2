@foreach($statusroomtypes as $statusroomtype)
<tr>
    <td>{{$statusroomtype->id}}</td>
    <td>{{$statusroomtype->TenLoaiTinhTrang}}</td>
    <td>
        {!! Form::button('<i class="fa fa-eye" aria-hidden="true"></i> Xem', ['class' => 'btn btn-info detailValue', 'data-toggle' => 'modal', 'data-target' => '#myModal','value'=> $statusroomtype->id]) !!}
    </td>
    <td>
        {!! Form::button('<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa', ['class' => 'btn btn-warning editValue', 'data-toggle' => 'modal', 'data-target' => '#myModal','value'=> $statusroomtype->id]) !!}
    </td>
    <td>
        {!! Form::open(['method'=>'DELETE','route' => ['statusroomtype.destroy',$statusroomtype->id]]) !!}
        {!! Form::button(' <i class="fa fa-trash-o"></i>  Xóa',['class'=> 'btn btn-danger deleteValue', 'type' => 'submit', 'value'=> $statusroomtype->id]) !!}
        {!! Form::close() !!}
    </td>
</tr>
@endforeach