<div class="modal fade" id="myModal" tabindex="-1" SoLuong="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Update</h4>
            </div>
            <div class="modal-body">
               {!! Form::open(['class' => 'form-horizontal', 'method' => 'POST', 'route' => ['roomtype.update',$roomtype->id]]) !!}
               <div>
                <label for="label">ID</label>
                <input type="text" name="id" class="form-control" id="id">
            </div>
            <div>
                <label for="label">Tên loại phòng</label>
                <input type="text" name="TenLoaiPhong" class="form-control" id="TenLoaiPhong">
            </div>
            <div>
                <label for="label">Đơn giá</label>
                <input type="text" name="DonGia" class="form-control" id="DonGia">
            </div>
            <div>
                <label for="label">Số lượng người chuẩn</label>
                <input type="text" name="SoLuongNguoiChuan" class="form-control" id="SoLuongNguoiChuan">
            </div>
            <div>
                <label for="label">Số lượng người tối đa</label>
                <input type="text" name="SoLuongNguoiToiDa" class="form-control" id="SoLuongNguoiToiDa">
            </div>
            <div>
                <label for="label">Tỷ lệ tăng</label>
                <input type="text" name="TyLeTang" class="form-control" id="TyLeTang">
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