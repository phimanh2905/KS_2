@foreach($customers as $customer)
<tr>
    <td>
        {{ $customer->id}}
    </td>
    <td>
        {{ $customer->TenKhachHang}}
    </td>
    <td>
        {{ $customer->CMND}}
    </td>
    <td>
        {{ $customer->GioiTinh}}
    </td>
    <td>
        {{ $customer->DiaChi}}
    </td>
    <td>
        {{ $customer->DienThoai}}
    </td>
    <td>
        {{ $customer->QuocTich}}
    </td>
    <td>
        {!! Form::button('<i class="fa fa-eye" aria-hidden="true"></i> Xem', ['class' => 'btn btn-info detailValue', 'data-toggle' => 'modal', 'data-target' => '#myModal','value'=> $customer->id]) !!}
    </td>
    <td>
        {!! Form::button('<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa', ['class' => 'btn btn-warning editValue', 'data-toggle' => 'modal', 'data-target' => '#myModal','value'=> $customer->id]) !!}
    </td>
    <td>
        {!! Form::open(['method'=>'DELETE','route' => ['customer.destroy',$customer->id]]) !!}
        {!! Form::button(' <i class="fa fa-trash-o"></i>  Xóa',['class'=> 'btn btn-danger deleteValue', 'type' => 'submit', 'value'=> $customer->id]) !!}
        {!! Form::close() !!}
    </td>
</tr>
@endforeach