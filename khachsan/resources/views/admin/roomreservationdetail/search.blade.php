@foreach($roomreservationdetails as $roomreservationdetail)
<tr>
    <td>{{$roomreservationdetail->id}}</td>
    <td>{{$roomreservationdetail->MaKhachHang}}</td>
    <td>{{$roomreservationdetail->MaPhong}}</td>
    <td>{{$roomreservationdetail->NgayDangKi}}</td>
    <td>{{$roomreservationdetail->NgayNhan}}</td>
    <td>
        {!! Form::button('<i class="fa fa-eye" aria-hidden="true"></i> Xem', ['class' => 'btn btn-info detailValue', 'data-toggle' => 'modal', 'data-target' => '#myModal','value'=> $roomreservationdetail->id]) !!}
    </td>
    <td>
        {!! Form::button('<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa', ['class' => 'btn btn-warning editValue', 'data-toggle' => 'modal', 'data-target' => '#myModal','value'=> $roomreservationdetail->id]) !!}
    </td>
    <td>
        {!! Form::open(['method'=>'DELETE','route' => ['roomreservationdetail.destroy',$roomreservationdetail->id]]) !!}
        {!! Form::button(' <i class="fa fa-trash-o"></i>  Xóa',['class'=> 'btn btn-danger deleteValue', 'type' => 'submit', 'value'=> $roomreservationdetail->id]) !!}
        {!! Form::close() !!}
    </td>
</tr>
@endforeach