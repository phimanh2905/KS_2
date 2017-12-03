@foreach($units as $unit)
<tr>
    <td>{{$unit->id}}</td>
    <td>{{$unit->TenDonVi}}</td>
    <td>
        {!! Form::button('<i class="fa fa-eye" aria-hidden="true"></i> Xem', ['class' => 'btn btn-info detailValue', 'data-toggle' => 'modal', 'data-target' => '#myModal','value'=> $unit->id]) !!}
    </td>
    <td>
        {!! Form::button('<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa', ['class' => 'btn btn-warning editValue', 'data-toggle' => 'modal', 'data-target' => '#myModal','value'=> $unit->id]) !!}
    </td>
    <td>
        {!! Form::open(['method'=>'DELETE','route' => ['unit.destroy',$unit->id]]) !!}
        {!! Form::button(' <i class="fa fa-trash-o"></i>  Xóa',['class'=> 'btn btn-danger deleteValue', 'type' => 'submit', 'value'=> $unit->id]) !!}
        {!! Form::close() !!}
    </td>
</tr>
@endforeach