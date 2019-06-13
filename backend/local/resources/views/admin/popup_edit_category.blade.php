<div class="popup-form hidden" id="popup-form-edit">
    <form action="{{asset('admin/category/edit/'.$cate->cate_id)}}" id="edit-form" method="POST" enctype="multipart/form-data" novalidate>
        <div class="form-row">
            <div class="form-group col-8">
                <label for="inputEditName">Tên danh mục <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="inputEditName" name="name" placeholder="Nhập tên danh mục" value="{{$cate->cate_name}}"
                    required>
            </div>
            <div class="form-group ml-3 col-1">
                <label>icon <span class="text-danger">*</span></label>
            <input hidden type="file" name="icon" id="input-image-edit-{{$cate->cate_id}}" onchange="changeEditImg(this, '{{$cate->cate_id}}');" accept="image/*">
            </div>
            <div class="form-group mt-4 col-1">
                <img id="image-edit-{{$cate->cate_id}}" class="thumbnail"
                @if ($cate->cate_icon == '')
                    src="{{asset('public/admin')}}/assets/media/img/new_seo-10-75.png"
                @else
                    src="{{asset('local/storage/app/images/category/'.$cate->cate_icon)}}"
                @endif  onclick="chooseEditImg('{{$cate->cate_id}}');" height="50px;" width="50px;">
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
                console.log("hello");
                
                $form = $('#edit-form');
                
                if ($form.valid()) {
                    var datas = new FormData($form[0]);
                    $.ajax({
                        url: $form.attr('action'),
                        enctype: 'multipart/form-data',
                        processData: false,
                        contentType: false,
                        cache: false,
                        type: $form.attr('method'),
                        data: datas,
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
    }

    function changeEditImg(input, temp) {
        //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            //Sự kiện file đã được load vào website
            reader.onload = function (e) {
                //Thay đổi đường dẫn ảnh
                $('#image-edit-' + temp).attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    </script>
</div>