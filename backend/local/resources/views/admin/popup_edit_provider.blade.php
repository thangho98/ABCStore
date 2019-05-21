<div class="popup-form hidden" id="popup-form-edit">
    <form action="{{asset('admin/provider/edit/'.$prov->prov_id)}}" id="edit-form" method="POST" novalidate>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputName">Tên nhà cung cấp <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="inputName" value="{{$prov->prov_name}}" name="name" placeholder="Nhập tên nhà cung cấp"
                    required>
            </div>
            <div class="form-group col-md-6">
                <label for="inputEmail">Email <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="inputEmail" value="{{$prov->prov_email}}" name="email" placeholder="Nhập email" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputPhone">SĐT <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="inputPhone" value="{{$prov->prov_phone}}" name="phone" placeholder="Nhập số điện thoại"
                    required>
            </div>
            <div class="form-group col-md-6">
                <label for="inpuFax">Fax <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="inpuFax" value="{{$prov->prov_fax}}" name="fax" placeholder="Nhập số fax"
                    required>
            </div>
        </div>
        <div class="form-group">
            <label for="inputAddress">Địa chỉ <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="inputAddress" value="{{$prov->prov_address}}" name="address" placeholder="Nhập địa chỉ"
                required>
        </div>
        <div class="form-group">
            <label for="inputDesc">Mô tả <span class="text-danger">*</span></label>
            <textarea class="js-maxlength form-control" id="inputDesc" name="description" rows="4" required
                maxlength="1000" placeholder="Nhập thông tin mô tả" data-always-show="true">{{$prov->prov_desc}}</textarea>
        </div>
        <div class="tile-footer-2">
            <button class="btn btn-primary" type="button" id="submitEdit">Sửa</button>
            <button class="btn btn-danger" type="button" id="cancelEdit">Hủy</button>
        </div>
        {{ csrf_field() }}
    </form>
    <script>
        $(document).ready(function () {
            $('#submitEdit').on('click', function () {
                $form = $('#edit-form');
                if ($form.valid()) {
                    $.ajax({
                        url: $form.attr('action'),
                        type: $form.attr('method'),
                        data: $form.serialize(),
                        success: function (data) {
                            swal("Đã sửa!", "Đối tượng đã được sửa.", "success")
                                .then((value) => {
                                    console.log('Submission was successful.');
                                    location.reload();
                                });
                        },
                        error: function (data) {
                            swal("Bị lỗi", "Đối tượng này đã bị lỗi :)", "error");
                            console.log('An error occurred.');
                        }
                    });
                }
            });
            $('#cancelEdit').on('click', function () {
                $('#popup-form-edit').addClass('hidden');
                $('.darktheme').removeClass('active');
                $('#edit-form').attr('novalidate', 'true');
                $('#popup-form-edit').remove();
            });
        });
    </script>
</div>