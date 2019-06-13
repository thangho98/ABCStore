<div class="popup-form hidden scrollbar" id="popup-form-edit">
    <form action="{{asset('admin/employees/edit/'.$empl->empl_id)}}" id="edit-form" method="POST" novalidate enctype="multipart/form-data"> 
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputName">Tên nhân viên <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="inputName" name="name" value="{{$empl->empl_name}}" placeholder="Nhập tên nhân viên" required>
            </div>
            <div class="form-group col-md-6">
                <label for="inputEditBirthday">Ngày sinh <span class="text-danger">*</span></label>
                <input type="text" class="js-datepicker form-control" id="inputEditBirthday" name="birthday"
                    data-week-start="1" data-autoclose="true" data-today-highlight="true" data-date-format="dd-mm-yyyy"
                    value="{{date_format(date_create($empl->empl_birthday),"d-m-Y")}}" placeholder="dd-mm-yyyy" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputIdentityCard">CMND <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="inputIdentityCard" name="identityCard" placeholder="Nhập chứng minh thư" value="{{$empl->empl_identity_card}}"
                    required>
            </div>
            <div class="form-group col-md-3 ml-4">
                <label class="d-block">Giới tính <span class="text-danger">*</span></label>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" id="example-rd-custom-edit1" name="gender"
                        value="0" @if (!$empl->empl_sex) checked @endif>
                    <label class="custom-control-label" for="example-rd-custom-edit1">Nam</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" class="custom-control-input" id="example-rd-custom-edit2" name="gender"
                        value="1" @if ($empl->empl_sex) checked @endif>
                    <label class="custom-control-label" for="example-rd-custom-edit2">Nữ</label>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEmail">Email <span class="text-danger">*</span></label>
                <input type="email" class="form-control" id="inputEmail" value="{{$empl->empl_email}}" name="email" placeholder="Nhập email"
                    required>
            </div>
            <div class="form-group col-md-6">
                <label for="inputTel">SĐT <span class="text-danger">*</span></label>
                <input type="tel" class="form-control" id="inputTel" value="{{$empl->empl_phone}}" name="phone" placeholder="Nhập số điện thoại" required>
            </div>

        </div>
        <div class="form-group">
            <label for="inputAddress">Địa chỉ <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="inputAddress" name="address" value="{{$empl->empl_address}}" placeholder="Nhập địa chỉ" required>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEditStartDate">Ngày vào làm <span class="text-danger">*</span></label>
                <input type="text" class="form-control js-datepicker" id="inputEditStartDate" name="start_date"
                    data-week-start="1" data-autoclose="true" data-today-highlight="true" data-date-format="dd-mm-yyyy"
                    value="{{date_format(date_create($empl->empl_start_date),"d-m-Y")}}" placeholder="dd-mm-yyyy" required>
            </div>
            <div class="form-group col-md-6">
                <label for="inputSalary">Lương cơ bản <span class="text-danger">*</span></label>
                <div class="input-group">
                    <input type="number" class="form-control text-center" id="inputSalary" name="salary" placeholder=".." min="0"
                        value="{{$empl->empl_basic_salary}}">
                    <div class="input-group-append">
                        <span class="input-group-text">VNĐ</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputStatus">Trạng thái <span class="text-danger">*</span></label>
                <select class="form-control" id="inputStatus" name="status">
                    <option value="0" @if ($empl->empl_status == 0)
                        selected
                    @endif>Đang làm</option>
                    <option value="1"  @if ($empl->empl_status == 1)
                            selected
                        @endif>Đã nghỉ</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="input-image-edit-avatar">Avatar <span class="text-danger">*</span></label>
                <img id="image-edit-avatar" class="thumbnail"
                @if ($empl->empl_avatar != '')
                    src="{{asset('local/storage/app/images/employees/'.$empl->empl_avatar)}}"
                @else
                    src="{{asset('public/admin')}}/assets/media/img/new_seo-10-75.png"
                @endif
                    onclick="chooseEditImg('avatar');"  height="150px;" width="150px;">
                <input type="file" hidden name="avatar" id="input-image-edit-avatar"
                    onchange="changeEditImg(this, 'avatar');" accept="image/*" required>
            </div>
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
                    //$form.submit();
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
    function chooseEditImg(temp) {
        $('#input-image-edit-' + temp).click();
        console.log('hello');
    }

    function changeEditImg(input, temp) {
        //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            //Sự kiện file đã được load vào website
            reader.onload = function(e) {
                //Thay đổi đường dẫn ảnh
                $('#image-edit-' + temp).attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    </script>
    <script src="{{asset('public/admin')}}/assets/js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <script>jQuery(function () { One.helpers(['datepicker', 'colorpicker', 'maxlength', 'select2', 'masked-inputs', 'rangeslider']); });</script>
</div>
