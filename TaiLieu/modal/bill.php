<div class="modal fade" id="myModal" tabindex="-1" SoLuong="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Update</h4>
            </div>
            <div class="modal-body">
               {!! Form::open(['class' => 'form-horizontal', 'method' => 'POST', 'route' => ['bill.update',$bill->id]]) !!}
               <div>
                <label for="label">ID</label>
                <input type="text" name="id" class="form-control" id="id">
            </div>
            <div>
                <label for="label">Nhân viên lập</label>
                <input type="text" name="NhanVienLap" class="form-control" id="NhanVienLap">
            </div>
            <div>
                <label for="label">Mã khách hàng</label>
                <input type="text" name="MaKhachHang" class="form-control" id="MaKhachHang">
            </div>
            <div>
                <label for="label">Mã nhận phòng</label>
                <input type="text" name="MaNhanPhong" class="form-control" id="MaNhanPhong">
            </div>
            <div>
                <label for="label">Tổng tiền</label>
                <input type="text" name="TongTien" class="form-control" id="TongTien">
            </div>
            <div>
                <label for="label">Ngày lập</label>
                <input type="text" name="NgayLap" class="form-control" id="NgayLap">
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