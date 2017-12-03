@foreach($roomtypes as $roomtype)
<tr>
    <td>{{$roomtype->id}}</td>
    <td>{{$roomtype->TenLoaiPhong}}</td>
    <td>{{$roomtype->DonGia}}</td>
    <td>{{$roomtype->SoNguoiChuan}}</td>
    <td>{{$roomtype->SoNguoiToiDa}}</td>
    <td>{{$roomtype->TyLeTang}}</td>
    <td>
        {!! Form::button('<i class="fa fa-eye" aria-hidden="true"></i> Xem', ['class' => 'btn btn-info detailValue', 'data-toggle' => 'modal', 'data-target' => '#myModal','value'=> $roomtype->id]) !!}
    </td>
    <td>
        {!! Form::button('<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa', ['class' => 'btn btn-warning editValue', 'data-toggle' => 'modal', 'data-target' => '#myModal','value'=> $roomtype->id]) !!}
    </td>
    <td>
        {!! Form::open(['method'=>'DELETE','route' => ['roomtype.destroy',$roomtype->id]]) !!}
        {!! Form::button(' <i class="fa fa-trash-o"></i>  Xóa',['class'=> 'btn btn-danger deleteValue', 'type' => 'submit', 'value'=> $roomtype->id]) !!}
        {!! Form::close() !!}
    </td>
</tr>
@endforeach