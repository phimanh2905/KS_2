@foreach($checkoutpolicys as $checkoutpolicy)
<tr>
    <td>{{$checkoutpolicy->id}}</td>
    <td>{{$checkoutpolicy->ThoiGianQuyDinh}}</td>
    <td>{{$checkoutpolicy->PhuThu}}</td>
    <td>
        {!! Form::button('<i class="fa fa-eye" aria-hidden="true"></i> Xem', ['class' => 'btn btn-info detailValue', 'data-toggle' => 'modal', 'data-target' => '#myModal','value'=> $checkoutpolicy->id]) !!}
    </td>
    <td>
        {!! Form::button('<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa', ['class' => 'btn btn-warning editValue', 'data-toggle' => 'modal', 'data-target' => '#myModal','value'=> $checkoutpolicy->id]) !!}
    </td>
    <td>
        {!! Form::open(['method'=>'DELETE','route' => ['checkoutpolicy.destroy',$checkoutpolicy->id]]) !!}
        {!! Form::button(' <i class="fa fa-trash-o"></i>  Xóa',['class'=> 'btn btn-danger deleteValue', 'type' => 'submit', 'value'=> $checkoutpolicy->id]) !!}
        {!! Form::close() !!}
    </td>
</tr>
@endforeach