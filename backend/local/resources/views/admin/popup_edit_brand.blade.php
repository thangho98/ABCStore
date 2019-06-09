<div class="popup-form hidden" id="popup-form-edit">
    <form action="{{asset('admin/brand/edit/'.$brand->brand_id)}}" id="edit-form" method="POST" novalidate>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputName">Tên thương hiệu <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="inputName" name="name" placeholder="Nhập tên thương hiệu"
                        value="{{$brand->brand_name}}" required>
                </div>
                <div class="form-group col-md-4 ml-4">
                    <label>Thương hiệu nổi tiếng</label>
                    <div class="custom-control custom-switch mb-1">
                        <input type="checkbox" class="custom-control-input" id="example-sw-edit1" name="isfamous" value="1"
                        @if ($brand->brand_famous)
                            checked
                        @endif>
                        <label class="custom-control-label" for="example-sw-edit1"></label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="example-textarea-input">Mô tả</label>
                <textarea class="form-control" id="example-textarea-input"
                    name="description" rows="4"
                    placeholder="Nhập mô tả">{{$brand->brand_desc}}</textarea>
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