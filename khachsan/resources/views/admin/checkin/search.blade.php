@foreach($checkins as $checkin)
<tr>
    <td>{{$checkin->id}}</td>
    <td>{{$checkin->MaPhieuThue}}</td>
    <td>{{$checkin->MaKhachHang}}</td>
    <td>
        {!! Form::button('<i class="fa fa-eye" aria-hidden="true"></i> Xem', ['class' => 'btn btn-info detailValue', 'data-toggle' => 'modal', 'data-target' => '#myModal','value'=> $checkin->id]) !!}
    </td>
    <td>
        {!! Form::button('<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa', ['class' => 'btn btn-warning editValue', 'data-toggle' => 'modal', 'data-target' => '#myModal','value'=> $checkin->id]) !!}
    </td>
    <td>
        {!! Form::open(['method'=>'DELETE','route' => ['checkin.destroy',$checkin->id]]) !!}
        {!! Form::button(' <i class="fa fa-trash-o"></i>  Xóa',['class'=> 'btn btn-danger deleteValue', 'type' => 'submit', 'value'=> $checkin->id]) !!}
        {!! Form::close() !!}
    </td>
</tr>
@endforeach