<div class="modal fade" id="myModal" tabindex="-1" SoLuong="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Update</h4>
            </div>
            <div class="modal-body">
               {!! Form::open(['class' => 'form-horizontal', 'method' => 'POST', 'route' => ['billdetail.update',$billdetail->id]]) !!}
               <div>
                <label for="label">ID</label>
                <input type="text" name="id" class="form-control" id="id">
            </div>
            <div>
                <label for="label">Mã phòng</label>
                <input type="text" name="MaPhong" class="form-control" id="MaPhong">
            </div>
            <div>
                <label for="label">Mã sử dụng dịch vụ</label>
                <input type="text" name="MaSDDichVu" class="form-control" id="MaSDDichVu">
            </div>
            <div>
                <label for="label">Mã chính sách</label>
                <input type="text" name="MaChinhSach" class="form-control" id="MaChinhSach">
            </div>
            <div>
                <label for="label">Phụ thu</label>
                <input type="text" name="PhuThu" class="form-control" id="PhuThu">
            </div>
            <div>
                <label for="label">Tiền phòng</label>
                <input type="text" name="TienPhong" class="form-control" id="TienPhong">
            </div>
            <div>
                <label for="label">Tiền dịch vụ</label>
                <input type="text" name="TienDichVu" class="form-control" id="TienDichVu">
            </div>
            <div>
                <label for="label">Giảm giá khách hàng</label>
                <input type="text" name="GiamGiaKhachHang" class="form-control" id="GiamGiaKhachHang">
            </div>
            <div>
                <label for="label">Hình thức thanh toán</label>
                <input type="text" name="HinhThucThanhToan" class="form-control" id="HinhThucThanhToan">
            </div>
            <div>
                <label for="label">Số ngày</label>
                <input type="text" name="SoNgay" class="form-control" id="SoNgay">
            </div>
            <div>
                <label for="label">Thành tiền</label>
                <input type="text" name="ThanhTien" class="form-control" id="ThanhTien">
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