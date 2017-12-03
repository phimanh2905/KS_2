@foreach($billdetails as $billdetail)
<tr>
    <td>{{$billdetail->id}}</td>
    <td>{{$billdetail->MaPhong}}</td>
    <td>{{$billdetail->MaSuDungDichVu}}</td>
    <td>{{$billdetail->MaChinhSach}}</td>
    <td>{{$billdetail->PhuThu}}</td>
    <td>{{$billdetail->TienPhong}}</td>
    <td>{{$billdetail->TienDichVu}}</td>
    <td>{{$billdetail->GiamGiaKhachHang}}</td>
    <td>{{$billdetail->HinhThucThanhToan}}</td>
    <td>{{$billdetail->SoNgay}}</td>
    <td>{{$billdetail->ThanhTien}}</td>
    <td>
        {!! Form::button('<i class="fa fa-eye" aria-hidden="true"></i> Xem', ['class' => 'btn btn-info detailValue', 'data-toggle' => 'modal', 'data-target' => '#myModal','value'=> $billdetail->id]) !!}
    </td>
    <td>
        {!! Form::button('<i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa', ['class' => 'btn btn-warning editValue', 'data-toggle' => 'modal', 'data-target' => '#myModal','value'=> $billdetail->id]) !!}
    </td>
    <td>
        {!! Form::open(['method'=>'DELETE','route' => ['billdetail.destroy',$billdetail->id]]) !!}
        {!! Form::button(' <i class="fa fa-trash-o"></i>  Xóa',['class'=> 'btn btn-danger deleteValue', 'type' => 'submit', 'value'=> $billdetail->id]) !!}
        {!! Form::close() !!}
    </td>
</tr>
@endforeach