@foreach($rooms as $room)
<tr>
    <td>{{$room->id}}</td>
    <td>{{$room->TenPhong}}</td>
    <td>{{$room->MaLoaiPhong}}</td>
    <td>{{$room->MaLoaiTinhTrangPhong}}</td>
    <td>{{$room->GhiChu}}</td>
    <td>
        {!! Form::button('<i class="fa fa-eye" aria-hidden="true"></i> Xem', ['class' => 'btn btn-info detailValue', 'data-toggle' => 'modal', 'data-target' => '#myModal','value'=> $room->id]) !!}
    </td>
    <td>
        {!! Form::button('<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa', ['class' => 'btn btn-warning editValue', 'data-toggle' => 'modal', 'data-target' => '#myModal','value'=> $room->id]) !!}
    </td>
    <td>
        {!! Form::open(['method'=>'DELETE','route' => ['room.destroy',$room->id]]) !!}
        {!! Form::button(' <i class="fa fa-trash-o"></i>  Xóa',['class'=> 'btn btn-danger deleteValue', 'type' => 'submit', 'value'=> $room->id]) !!}
        {!! Form::close() !!}
    </td>
</tr>
@endforeach