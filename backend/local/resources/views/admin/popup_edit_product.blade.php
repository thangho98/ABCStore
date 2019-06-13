<div class="popup-form hidden" id="popup-form-edit">
    {{-- <base href="{{asset('public/admin')}}/">
    <link rel="stylesheet" href="{{asset('public/admin')}}/assets/js/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css"> --}}
    <div class="content-popup">
        <div class="js-wizard-validation scrollbar content-form">
            <!-- Step Tabs -->
            <ul class="nav nav-tabs nav-tabs-block nav-justified" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" href="#wizard-edit-step1" data-toggle="tab">1. Chung</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#wizard-edit-step2" data-toggle="tab">2. Thông số kỹ thuật</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#wizard-edit-step3" data-toggle="tab">3. Hình ảnh</a>
                </li>
            </ul>
            <!-- END Step Tabs -->

            <!-- Form -->
            <form class="js-wizard-validation-form" action="{{asset('admin/product/edit/'.$prod->prod_id)}}"
                id="edit-form" method="POST" novalidate enctype="multipart/form-data">
                <!-- Steps Content -->
                <div class="block-content-full tab-content" style="min-height: 300px;">
                    <!-- Step 1 -->
                    <div class="tab-pane active" id="wizard-edit-step1" role="tabpanel">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputName">Tên sản phẩm <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="inputName" name="name"
                                    value="{{$prod->prod_name}}" placeholder="Nhập tên sản phẩm" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="selectBrand">Thương hiệu <span class="text-danger">*</span></label>
                                <select class="form-control" id="selectBrand" name="brand" required>
                                    @foreach ($list_brand as $item)
                                    <option value="{{$item->brand_id}}" @if ($item->brand_id == $prod->prod_brand)
                                        selected
                                        @endif>{{$item->brand_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="selectCate">Danh mục <span class="text-danger">*</span></label>
                                <select class="form-control" id="selectCate" name="cate" required>
                                    @foreach ($list_cate as $item)
                                    <option value="{{$item->cate_id}}" @if ($item->cate_id == $prod->prod_cate)
                                        selected
                                        @endif>{{$item->cate_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Thời gian bảo hành <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="number" class="form-control text-center"
                                        id="inputWarrantyPeriodEdit" name="warranty_period" min="1"
                                        placeholder="Nhập thời gian bảo hành" value="{{$prod->prod_warranty_period}}">
                                    <div class="input-group-append">
                                        <span class="input-group-text">tháng</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label class="d-block">Sản phẩm mới <span class="text-danger">*</span></label>
                                <div class="ml-5 custom-control custom-radio custom-control-inline">
                                    <input @if ($prod->prod_status!=1)
                                        disabled
                                    @endif type="radio" class="custom-control-input" id="example-rd-custom-edit1" name="prod_new"
                                        value="0" @if ($prod->prod_new == 0) checked @endif>
                                    <label class="custom-control-label" for="example-rd-custom-edit1">Không</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input  @if ($prod->prod_status !=1)
                                            disabled
                                        @endif type="radio" class="custom-control-input" id="example-rd-custom-edit2" name="prod_new"
                                        value="1" @if ($prod->prod_new == 1) checked @endif>
                                    <label class="custom-control-label" for="example-rd-custom-edit2">Có</label>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="selectStatus">Trạng thái <span class="text-danger">*</span></label>
                                <select class="form-control" id="selectStatus" name="status" required>
                                    <option value="0" @if ($prod->prod_status==0) selected @else disabled @endif>Sắp ra
                                        mắt</option>
                                    <option value="1" @if ($prod->prod_status==1) selected @elseif($prod->prod_status != 0) disabled @endif>Đang kinh doanh
                                    </option>
                                    <option value="2" @if ($prod->prod_status==2) selected @elseif($prod->prod_status != 1) disabled @endif>Ngừng kinh doanh
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <h4>Thêm các phiên bản của điện thoại</h4>
                            <div id="list-options-edit">
                                <datalist id="list-color">
                                    <option value="Đen">
                                    <option value="Trắng">
                                    <option value="Vàng">
                                    <option value="Bạc">
                                    <option value="Xanh Dương">
                                    <option value="Xanh Lá">
                                    <option value="Xám">
                                    <option value="Gold">
                                </datalist>
                                <datalist id="list-ram">
                                    <option value="0.5">
                                    <option value="1">
                                    <option value="2">
                                    <option value="3">
                                    <option value="4">
                                    <option value="6">
                                    <option value="8">
                                    <option value="10">
                                    <option value="12">
                                    <option value="16">
                                    <option value="32">
                                </datalist>
                                <datalist id="list-rom">
                                    <option value="4 gb">
                                    <option value="8 gb">
                                    <option value="16 gb">
                                    <option value="32 gb">
                                    <option value="64 gb">
                                    <option value="128 gb">
                                    <option value="256 gb">
                                    <option value="512 gb">
                                    <option value="1 TB">
                                    <option value="2 TB">
                                </datalist>
                                @foreach ($prod_options as $item)
                                    <div id="options-edit-{{$item->propt_id}}" class="options mb-3">
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label for="inputEditColor{{$item->propt_id}}">Màu sắc<span class="text-danger">*</span></label>
                                                <input list="list-color" type="text" class="form-control" id="inputEditColor{{$item->propt_id}}"
                                                    name="option_edit[{{$item->propt_id}}][color]" placeholder="Nhập màu sắc" value="{{$item->propt_color}}" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputEditRam{{$item->propt_id}}">Bộ nhớ ram (gb) <span
                                                        class="text-danger">*</span></label>
                                                <input list="list-ram" type="text" class="form-control" id="inputEditRam{{$item->propt_id}}"
                                                    name="option_edit[{{$item->propt_id}}][ram]" placeholder="Nhập bộ nhớ ram" value="{{$item->propt_ram}}" required>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputEditRom{{$item->propt_id}}">Bộ nhớ rom <span class="text-danger">*</span></label>
                                                <input list="list-rom" type="text" class="form-control" id="inputEditRom{{$item->propt_id}}"
                                                    name="option_edit[{{$item->propt_id}}][rom]" placeholder="Nhập bộ nhớ rom" value="{{$item->propt_rom}}" required>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputPrice{{$item->propt_id}}">Giá <span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <input type="number" class="form-control text-center" id="inputPrice{{$item->propt_id}}"
                                                        name="option_edit[{{$item->propt_id}}][price]" min="0" placeholder=".." value="{{$item->propt_price}}">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text">VNĐ</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6 d-flex align-items-end justify-content-center">
                                                <button class="btn btn-danger" onclick="removeOptionAvailable({{$item->propt_id}});"
                                                    type="button">Xóa phiên bản</button>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="row">
                                <div class="col-lg-12 text-right">
                                    <button class="btn btn-info" type="button" onclick=addOptionsEdit();>Thêm phiên
                                        bản</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END Step 1 -->

                    <!-- Step 2 -->
                    <div class="tab-pane" id="wizard-edit-step2" role="tabpanel">
                        <div class="form-group">
                            <label for="inputDetail">Thông số kĩ thuật <span class="text-danger">*</span></label>
                            <textarea class="js-maxlength form-control" id="inputDetail" name="detail" rows="10"
                                required maxlength="1000" placeholder="Nhập thông tin chi tiết"
                                data-always-show="true">{{$prod->prod_detail}}</textarea>
                        </div>
                    </div>
                    <!-- END Step 2 -->

                    <!-- Step 3 -->
                    <div class="tab-pane" id="wizard-edit-step3" role="tabpanel">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <td class="text-left">Ảnh poster<span class="text-danger">*</span>
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-left">
                                        <img id="image-edit-poster" class="thumbnail"
                                            @if ($prod->prod_poster == '')
                                            src="{{asset('public/admin')}}/assets/media/img/new_seo-10-75.png"
                                            @else
                                                src="{{asset('local/storage/app/images/product/'.$prod->prod_poster)}}"
                                            @endif
                                            onclick="chooseEditImgAvailable('poster');"
                                            height="75px;" width="75px;">
                                        <input type="file" hidden name="poster" value=""
                                            id="input-image-edit-poster" onchange="changeEditImgAvailable(this, 'poster');" accept="image/*">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="table-responsive" id="edit-image-available">
                            <table id="images-edit" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <td class="text-left">Hình ảnh bổ sung<span class="text-danger">*</span></td>
                                        <td></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($prod_imgs as $item)
                                    <tr id="image-edit-row{{$item->pimg_id}}">
                                        <td class="text-left">
                                            <img id="image-edit-{{$item->pimg_id}}" class="thumbnail"
                                                src="{{asset('local/storage/app/images/product/'.$item->pimg_name)}}"
                                                onclick="chooseEditImgAvailable({{$item->pimg_id}});" height="75px;"
                                                width="100px;">
                                            <input type="file" hidden
                                                name="product_image_edit[{{$item->pimg_id}}][image]" value=""
                                                id="input-image-edit-{{$item->pimg_id}}"
                                                onchange="changeEditImgAvailable(this, {{$item->pimg_id}});"
                                                accept="image/*">
                                        </td>
                                        <td class="text-left"><button type="button"
                                                onclick="removeImageAvailable({{$item->pimg_id}})" data-toggle="tooltip"
                                                class="btn btn-danger" title="Loại bỏ"><i
                                                    class="fa fa-minus-circle"></i></button></td>
                                    </tr>
                                    @endforeach

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="1"></td>
                                        <td class="text-left">
                                            <button type="button" onclick="addNewImage();" data-toggle="tooltip"
                                                class="btn btn-primary" title="Thêm hình ảnh"><i
                                                    class="fa fa-plus-circle"></i></button>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <!-- END Step 3 -->
                </div>
                <!-- END Steps Content -->
                <!-- Steps Navigation -->

                <!-- END Steps Navigation -->
                {{ csrf_field() }}
            </form>
            <!-- END Form -->
        </div>

        <div class="tile-footer">
            <button class="btn btn-primary" type="button" id="submitEdit">Sửa</button>
            <button class="btn btn-danger" type="button" id="cancelEdit">Hủy</button>
        </div>
    </div>

    <script>

        var tempAdd = 1;
        function addOptionsEdit() {
            tempAdd++;
            let option =`
            <div id="options-add-${tempAdd}" class="options mb-3">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputAddColor${tempAdd}">Màu sắc<span class="text-danger">*</span></label>
                        <input list="list-color" type="text" class="form-control" id="inputAddColor${tempAdd}" name="option_add[${tempAdd}][color]"
                            placeholder="Nhập màu sắc" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputAddRam${tempAdd}">Bộ nhớ ram (gb) <span class="text-danger">*</span></label>
                        <input list="list-ram" type="text" class="form-control" id="inputAddRam${tempAdd}" name="option_add[${tempAdd}][ram]"
                            placeholder="Nhập bộ nhớ ram" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputAddtRom${tempAdd}">Bộ nhớ rom <span class="text-danger">*</span></label>
                        <input list="list-rom" type="text" class="form-control" id="inputAddRom${tempAdd}" name="option_add[${tempAdd}][rom]"
                            placeholder="Nhập bộ nhớ rom" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputAddPrice${tempAdd}">Giá <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <input type="number" class="form-control text-center" id="inputAddPrice${tempAdd}" name="option_add[${tempAdd}][price]"
                                min="0" placeholder="..">
                            <div class="input-group-append">
                                <span class="input-group-text">VNĐ</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-6 d-flex align-items-end justify-content-center">
                        <button class="btn btn-danger" onclick="$('#options-add-${tempAdd}').remove();" type="button">Xóa phiên bản</button>
                    </div>
                </div>
            </div>
            `
            $('#list-options-edit').append(option);
        }

        function removeOptionAvailable(id) {
            $('#options-edit-' + id).remove();
            let inputRemoveOption = `<input name="OptionRemove[]" hidden value="${id}">`;
            $('#list-options-edit').append(inputRemoveOption);
        }

        function removeImageAvailable(id) {
            $('#image-edit-row' + id).remove();
            let inputRemoveImage = `<input name="ImageRemove[]" hidden value="${id}">`;
            $('#edit-image-available').append(inputRemoveImage);
        }

        function chooseEditImgAvailable(id) {
            $('#input-image-edit-' + id).click();
        }

        function changeEditImgAvailable(input, id) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                //Sự kiện file đã được load vào website
                reader.onload = function (e) {
                    //Thay đổi đường dẫn ảnh
                    $('#image-edit-' + id).attr('src', e.target.result);
                    //let inputEdit = `<input name="ImageEdit[]" hidden value="${id}">`;
                    //$('#edit-image-available').append(inputEdit);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        function chooseAddImg(index) {
            $('#input-image-add' + index).click();
        }

        function changeAddImg(input, index) {
            //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                //Sự kiện file đã được load vào website
                reader.onload = function (e) {
                    //Thay đổi đường dẫn ảnh
                    $('#image-add' + index).attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        var indexAdd = 0;
        function addNewImage() {
            indexAdd++;
            let row = `
        <tr id="image-row${indexAdd}">
            <td class="text-left">
                <img id="image-add${indexAdd}" class="thumbnail"
                    src="{{asset('public/admin')}}/assets/media/img/new_seo-10-75.png" onclick="chooseAddImg(${indexAdd});"
                    height="75px;" width="75px;">
                <input type="file" hidden name="product_add_image[${indexAdd}][image]" value=""
                    id="input-image-add${indexAdd}" onchange="changeAddImg(this, ${indexAdd});" accept="image/*">
            </td>
            <td class="text-left"><button type="button" onclick="$('#image-row${indexAdd}').remove();"
                    data-toggle="tooltip" class="btn btn-danger" title="Loại bỏ"><i
                        class="fa fa-minus-circle"></i></button></td>
        </tr>
        `;
            $('#images-edit > tbody').append(row);
        }

        $(document).ready(function () {
            $('#submitEdit').on('click', function () {
                $form = $('#edit-form');
                // $form.submit();
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
                else {
                    swal("Lỗi", "Bạn điền Form chưa đầy đủ :(", "error");
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