@foreach($services as $service)
<tr>
    <td>{{$service->id}}</td>
    <td>{{$service->MaLoaiDichVu}}</td>
    <td>{{$service->MaDonVi}}</td>
    <td>{{$service->DonGia}}</td>
    <td>
        {!! Form::button('<i class="fa fa-eye" aria-hidden="true"></i> Xem', ['class' => 'btn btn-info detailValue', 'data-toggle' => 'modal', 'data-target' => '#myModal','value'=> $service->id]) !!}
    </td>
    <td>
        {!! Form::button('<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa', ['class' => 'btn btn-warning editValue', 'data-toggle' => 'modal', 'data-target' => '#myModal','value'=> $service->id]) !!}
    </td>
    <td>
        {!! Form::open(['method'=>'DELETE','route' => ['service.destroy',$service->id]]) !!}
        {!! Form::button(' <i class="fa fa-trash-o"></i>  Xóa',['class'=> 'btn btn-danger deleteValue', 'type' => 'submit', 'value'=> $service->id]) !!}
        {!! Form::close() !!}
    </td>
</tr>
@endforeach