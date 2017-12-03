<div class="modal fade" id="myModal" tabindex="-1" SoLuong="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Update</h4>
            </div>
            <div class="modal-body">
               {!! Form::open(['class' => 'form-horizontal', 'method' => 'POST', 'route' => ['customer.update',$customer->id]]) !!}
               <div>
                <label for="label">ID</label>
                <input type="text" name="id" class="form-control" id="id">
            </div>
            <div>
                <label for="label">Tên khách hàng</label>
                <input type="text" name="TenKhachHang" class="form-control" id="TenKhachHang">
            </div>
            <div>
                <label for="label">CMND</label>
                <input type="text" name="CMND" class="form-control" id="CMND">
            </div>
            <div>
                <label for="label">Giới tính</label>
                <input type="text" name="GioiTinh" class="form-control" id="GioiTinh">
            </div>
            <div>
                <label for="label">Địa chỉ</label>
                <input type="text" name="DiaChi" class="form-control" id="DiaChi">
            </div>
            <div>
                <label for="label">Điện thoại</label>
                <input type="text" name="DienThoai" class="form-control" id="DienThoai">
            </div>
            <div>
                <label for="label">Quốc tịch</label>
                <input type="text" name="QuocTich" class="form-control" id="QuocTich">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary updateValue">Update</button>
                <button type="button" class="btn btn-primary createValue">Save</button>

            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
</div>