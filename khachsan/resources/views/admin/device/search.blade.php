@foreach($devices as $device)
<tr>
    <td>{{$device->id}}</td>
    <td>{{$device->TenThietBi}}</td>
    <td>{{$device->MaLoaiPhong}}</td>
    <td>{{$device->SoLuong}}</td>
    <td>
        {!! Form::button('<i class="fa fa-eye" aria-hidden="true"></i> Xem', ['class' => 'btn btn-info detailValue', 'data-toggle' => 'modal', 'data-target' => '#myModal','value'=> $device->id]) !!}
    </td>
    <td>
        {!! Form::button('<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa', ['class' => 'btn btn-warning editValue', 'data-toggle' => 'modal', 'data-target' => '#myModal','value'=> $device->id]) !!}
    </td>
    <td>
        {!! Form::open(['method'=>'DELETE','route' => ['device.destroy',$device->id]]) !!}
        {!! Form::button(' <i class="fa fa-trash-o"></i>  Xóa',['class'=> 'btn btn-danger deleteValue', 'type' => 'submit', 'value'=> $device->id]) !!}
        {!! Form::close() !!}
    </td>
</tr>
@endforeach