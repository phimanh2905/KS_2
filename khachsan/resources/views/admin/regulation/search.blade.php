@foreach($regulations as $regulation)
<tr>
    <td>{{$regulation->id}}</td>
    <td>{{$regulation->TenQuyDinh}}</td>
    <td>{{$regulation->MoTa}}</td>
    <td>
        {!! Form::button('<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa', ['class' => 'btn btn-warning editValue', 'data-toggle' => 'modal', 'data-target' => '#myModal','value'=> $regulation->id]) !!}
    </td>
    <td>
        {!! Form::open(['method'=>'DELETE','route' => ['regulation.destroy',$regulation->id]]) !!}
        {!! Form::button(' <i class="fa fa-trash-o"></i>  Xóa',['class'=> 'btn btn-danger deleteValue', 'type' => 'submit', 'value'=> $regulation->id]) !!}
        {!! Form::close() !!}
    </td>
</tr>
@endforeach