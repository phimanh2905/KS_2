@foreach($serviceusagelists as $serviceusagelist)
<tr>
    <td>{{$serviceusagelist->id}}</td>
    <td>{{$serviceusagelist->MaDichVu}}</td>
    <td>{{$serviceusagelist->MaNhanPhong}}</td>
    <td>{{$serviceusagelist->SoLuong}}</td>
    <td>
        {!! Form::button('<i class="fa fa-eye" aria-hidden="true"></i> Xem', ['class' => 'btn btn-info detailValue', 'data-toggle' => 'modal', 'data-target' => '#myModal','value'=> $serviceusagelist->id]) !!}
    </td>
    <td>
        {!! Form::button('<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa', ['class' => 'btn btn-warning editValue', 'data-toggle' => 'modal', 'data-target' => '#myModal','value'=> $serviceusagelist->id]) !!}
    </td>
    <td>
        {!! Form::open(['method'=>'DELETE','route' => ['serviceusagelist.destroy',$serviceusagelist->id]]) !!}
        {!! Form::button(' <i class="fa fa-trash-o"></i>  Xóa',['class'=> 'btn btn-danger deleteValue', 'type' => 'submit', 'value'=> $serviceusagelist->id]) !!}
        {!! Form::close() !!}
    </td>
</tr>
@endforeach