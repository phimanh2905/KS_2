@foreach($bills as $bill)
<tr>
    <td>{{$bill->id}}</td>
    <td>{{$bill->NhanVienLap}}</td>
    <td>{{$bill->MaKhachHang}}</td>
    <td>{{$bill->MaNhanPhong}}</td>
    <td>{{$bill->TongTien}}</td>
    <td>{{$bill->NgayLap}}</td>
    <td>
        {!! Form::button('<i class="fa fa-eye" aria-hidden="true"></i> Xem', ['class' => 'btn btn-info detailValue', 'data-toggle' => 'modal', 'data-target' => '#myModal','value'=> $bill->id]) !!}
    </td>
    <td>
        {!! Form::button('<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa', ['class' => 'btn btn-warning editValue', 'data-toggle' => 'modal', 'data-target' => '#myModal','value'=> $bill->id]) !!}
    </td>
    <td>
        {!! Form::open(['method'=>'DELETE','route' => ['bill.destroy',$bill->id]]) !!}
        {!! Form::button(' <i class="fa fa-trash-o"></i>  Xóa',['class'=> 'btn btn-danger deleteValue', 'type' => 'submit', 'value'=> $bill->id]) !!}
        {!! Form::close() !!}
    </td>
</tr>
@endforeach