<div class="popup-form hidden" id="popup-form-edit">
    {{-- <base href="{{asset('public/admin')}}/">
    <link rel="stylesheet" href="assets/js/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css"> --}}
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
                    <form class="js-wizard-validation-form" action="{{asset('admin/product/edit/'.$prod->prod_id)}}" id="edit-form"
                        method="POST" novalidate enctype="multipart/form-data">
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
                                        <label for="inputMemory">Bộ nhớ <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            @php
                                            $memory = explode(" ",$prod->prod_memory);
                                            @endphp
                                            <input type="text" class="form-control" id="inputMemory" name="memory"
                                                placeholder="Nhập bộ nhớ" aria-label="Text input with dropdown button"
                                                value="{{$memory[0]}}">
                                            <div class="input-group-append">
                                                <select class="form-control btn btn-primary dropdown-toggle dropdown-toggle-split"
                                                    id="selectMemoryTB" name="memory_type" required>
                                                    <option value="GB" @if ($memory[1]=='GB' ) selected @endif>GB</option>
                                                    <option value="TB" @if ($memory[1]=='TB' ) selected @endif>TB</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputColor">Màu sắc <span class="text-danger">*</span></label>
                                        <input type="email" class="form-control" id="inputEmail" placeholder="Nhập tên màu sắc"
                                            name="color" value="{{$prod->prod_color}}" required>
                                    </div>
                                    {{-- <div class="form-group col-md-6">
                                        <label for="example-colorpicker1">Mã Màu <span class="text-danger">*</span></label>
                                        <input type="text" class="js-colorpicker form-control" id="example-colorpicker1"
                                            data-format="hex" name="color_code" value="#5c80d1">
                                    </div> --}}
                                    <div class="form-group col-md-6">
                                            <label for="inputPrice">Giá <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <input type="number" class="form-control text-center" id="inputPrice" name="price"
                                                    min="0" placeholder=".." value="{{$prod->prod_unit_price}}">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">VNĐ</span>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="selectStatus">Trạng thái <span class="text-danger">*</span></label>
                                        <select class="form-control" id="selectStatus" name="status" required>
                                            <option value="1"@if ($prod->prod_status==0) selected @else disable @endif>Sắp ra mắt</option>
                                            <option value="2"@if ($prod->prod_status==1) selected @endif>Đang kinh doanh</option>
                                            <option value="3"@if ($prod->prod_status==2) selected @endif>Ngừng kinh doanh</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- END Step 1 -->
            
                            <!-- Step 2 -->
                            <div class="tab-pane" id="wizard-edit-step2" role="tabpanel">
                                <div class="form-group">
                                    <label for="inputDetail">Thông số kĩ thuật <span class="text-danger">*</span></label>
                                    <textarea class="js-maxlength form-control" id="inputDetail" name="detail" rows="10" required
                                        maxlength="1000" placeholder="Nhập thông tin chi tiết"
                                        data-always-show="true">{{$prod->prod_detail}}</textarea>
                                </div>
                            </div>
                            <!-- END Step 2 -->
            
                            <!-- Step 3 -->
                            <div class="tab-pane" id="wizard-edit-step3" role="tabpanel">
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
                                                    <input type="file" hidden name="product_image_edit[{{$item->pimg_id}}][image]"
                                                        value="" id="input-image-edit-{{$item->pimg_id}}"
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
    
    {{-- <script src="assets/js/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
    <script>jQuery(function () { One.helpers(['datepicker']); });</script> --}}
    <script>
        function removeImageAvailable(id) {
            $('#image-edit-row' + id).remove();
            let inputRomve = `<input name="ImageRemove[]" hidden value="${id}">`;
            $('#edit-image-available').append(inputRomve);
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
                    src="assets/media/img/new_seo-10-75.png" onclick="chooseAddImg(${indexAdd});"
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
                $form = $('#edit-form').submit();
                // if ($form.valid()) {
                //     // $form.submit();

                //     var datas = new FormData($form[0]);

                //     $.ajax({
                //         url: $form.attr('action'),
                //         enctype: 'multipart/form-data',
                //         processData: false,
                //         contentType: false,
                //         cache: false,
                //         type: $form.attr('method'),
                //         data: datas,
                //         success: function (data) {
                //             swal("Đã sửa!", "Đối tượng đã được sửa.", "success")
                //                 .then((value) => {
                //                     console.log('Submission was successful.');
                //                     location.reload();
                //                 });
                //         },
                //         error: function (data) {
                //             swal("Bị lỗi", "Đối tượng này đã bị lỗi :)", "error");
                //             console.log('An error occurred.');
                //         }
                //     });
                // }
                // else {
                //     swal("Lỗi", "Bạn điền Form chưa đầy đủ :(", "error");
                // }
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