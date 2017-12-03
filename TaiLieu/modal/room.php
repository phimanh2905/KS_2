<div class="modal fade" id="myModal" tabindex="-1" SoLuong="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Update</h4>
            </div>
            <div class="modal-body">
               {!! Form::open(['class' => 'form-horizontal', 'method' => 'POST', 'route' => ['room.update',$room->id]]) !!}
               <div>
                <label for="label">ID</label>
                <input type="text" name="id" class="form-control" id="id">
            </div>
            <div>
                <label for="label">Mã loại phòng</label>
                <input type="text" name="MaLoaiPhong" class="form-control" id="MaLoaiPhong">
            </div>
            <div>
                <label for="label">Mã loại tình trạng phòng</label>
                <input type="text" name="MaLoaiTinhTrangPhong" class="form-control" id="MaLoaiTinhTrangPhong">
            </div>
            <div>
                <label for="label">Ghi chú</label>
                <input type="text" name="GhiChu" class="form-control" id="GhiChu">
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