@foreach($checkindetails as $checkindetail)
<tr>
    <td>{{$checkindetail->id}}</td>
    <td>{{$checkindetail->MaPhong}}</td>
    <td>{{$checkindetail->HoTenKhachHang}}</td>
    <td>{{$checkindetail->CMND}}</td>
    <td>{{$checkindetail->NgayNhan}}</td>
    <td>{{$checkindetail->NgayTraDuKien}}</td>
    <td>{{$checkindetail->NgayTraThucTe}}</td>
    <td>
        {!! Form::button('<i class="fa fa-eye" aria-hidden="true"></i> Xem', ['class' => 'btn btn-info detailValue', 'data-toggle' => 'modal', 'data-target' => '#myModal','value'=> $checkindetail->id]) !!}
    </td>
    <td>
        {!! Form::button('<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa', ['class' => 'btn btn-warning editValue', 'data-toggle' => 'modal', 'data-target' => '#myModal','value'=> $checkindetail->id]) !!}
    </td>
    <td>
        {!! Form::open(['method'=>'DELETE','route' => ['checkindetail.destroy',$checkindetail->id]]) !!}
        {!! Form::button(' <i class="fa fa-trash-o"></i>  Xóa',['class'=> 'btn btn-danger deleteValue', 'type' => 'submit', 'value'=> $checkindetail->id]) !!}
        {!! Form::close() !!}
    </td>
</tr>
@endforeach