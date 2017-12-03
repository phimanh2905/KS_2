<div class="modal fade" id="myModal" tabindex="-1" SoLuong="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Update</h4>
            </div>
            <div class="modal-body">
               {!! Form::open(['class' => 'form-horizontal', 'method' => 'POST', 'route' => ['checkindetail.update',$checkindetail->id]]) !!}
               <div>
                <label for="label">ID</label>
                <input type="text" name="id" class="form-control" id="id">
            </div>
            <div>
                <label for="label">Mã phòng</label>
                <input type="text" name="MaPhong" class="form-control" id="MaPhong">
            </div>
            <div>
                <label for="label">Hỗ trợ khách hàng</label>
                <input type="text" name="HoTroKhachHang" class="form-control" id="HoTroKhachHang">
            </div>
            <div>
                <label for="label">CMND</label>
                <input type="text" name="CMND" class="form-control" id="CMND">
            </div>
            <div>
                <label for="label">Ngày nhận</label>
                <input type="text" name="NgayNhan" class="form-control" id="NgayNhan">
            </div>
            <div>
                <label for="label">Ngày trả dự kiến</label>
                <input type="text" name="NgayTraDuKien" class="form-control" id="NgayTraDuKien">
            </div>
            <div>
                <label for="label">Ngày trả thực tế</label>
                <input type="text" name="NgayTraThucTe" class="form-control" id="NgayTraThucTe">
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