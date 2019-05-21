@extends('admin.layout.master')
@section('title','Sản phẩm')
@section('add_css_and_script')
<link rel="stylesheet" href="assets/js/plugins/datatables/dataTables.bootstrap4.css">
<link rel="stylesheet" href="assets/js/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.css">

<!-- Page JS Plugins CSS -->
<link rel="stylesheet" href="assets/js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css">
<link rel="stylesheet" href="assets/js/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
<link rel="stylesheet" href="assets/js/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="assets/js/plugins/ion-rangeslider/css/ion.rangeSlider.css">

<link rel="stylesheet" href="assets/css/mystyle.css">
@endsection

@section('main')
<main id="main-container">
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                    Danh sách Sản phẩm <small
                        class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted"></small>
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">Quản lý</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="">Sản phẩm</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content">
        <!-- Dynamic Table with Export Buttons -->
        <div class="block">
            <form id="formdata" action="{{asset('admin/product/delete')}}" method="GET" enctype="multipart/form-data">
                <div class="block-header row justify-content-end">
                    <aside class="py-2 mb-2">
                        <button type="button" class="btn btn-primary" data-toggle="tooltip" title="Thêm" id="addbutton">
                            <i class="fa fa-fw fa-plus"></i>
                        </button>
                        <button type="button" class="btn btn-success" data-toggle="tooltip" title="Làm mới">
                            <i class="fa fa-fw fa-sync-alt"></i>
                        </button>
                        <button type="button" data-toggle="tooltip" title="Xóa" class="btn btn-danger" id="btnDel"><i
                                class="fa fa-fw fa-trash"></i></button>
                    </aside>
                </div>
                <div class="block-content block-content-full">
                    <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
                    <table class="table table-bordered table-striped table-vcenter" id="table-brand">
                        <thead>
                            <tr>
                                <th style="width: 1px;" class="text-center orderby remove-sorting">
                                    <input type="checkbox"
                                        onclick="$('input[name*=\'selected\']').prop('checked', this.checked);">
                                </th>
                                <th class="text-center orderby" style="width: 60px;">Mã SP</th>
                                <th class="orderby">Tên Sản phẩm</th>
                                <th class="d-none d-sm-table-cell orderby remove-sorting">Ảnh poster
                                    </th>
                                <th class="d-none d-sm-table-cell orderby">Danh mục</th>
                                <th class="d-none d-sm-table-cell orderby">Thương hiệu
                                </th>
                                <th class="d-none d-sm-table-cell orderby">Trạng thái
                                </th>
                                <th style="width: 100px;" class="text-right orderby remove-sorting">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list_prod as $item)
                            <tr>
                                <td class="text-center">
                                    <input type="checkbox" name="selected[]" value="{{$item->prod_id}}">
                                </td>
                                <td class="text-center font-size-sm">{{$item->prod_id}}</td>
                                <td class="font-w600 font-size-sm">
                                    {{$item->prod_name}}
                                </td>
                                <td class="d-none d-sm-table-cell text-center">
                                    <img class="thumbnail" height="75px;" width="75px;"
                                        src="{{asset('local/storage/app/images/product/'.$item->prod_poster)}}">
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    {{$item->cate_name}}
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    {{$item->brand_name}}
                                </td>
                                <td class="text-center d-sm-table-cell">
                                    @if ($item->prod_status==0)
                                    Sắp ra mắt
                                    @elseif($item->prod_status==1)
                                    Đang kinh doanh
                                    @else
                                    Ngừng kinh doanh
                                    @endif
                                </td>
                                <td class="text-right">
                                    <div class="py-2 mb-2">
                                        <button type="button" class="btn btn-sm btn-info" title="Xem chi tiết"
                                            data-toggle="tooltip" onclick="showDetail({{$item->prod_id}})">
                                            <i class="fa fa-fw fa-eye"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-warning" data-toggle="tooltip"
                                            onclick="showEdit({{$item->prod_id}})" title="Sửa">
                                            <i class="fa fa-fw fa-pencil-alt"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
        <!-- END Dynamic Table with Export Buttons -->
    </div>
    <!-- END Page Content -->

</main>
@endsection
@section('popup')
<div id="popupshow">
    <div class="popup-form hidden" id="popup-form-add">
        <div class="content-popup">
            <div class="js-wizard-validation scrollbar content-form">
                <!-- Step Tabs -->
                <ul class="nav nav-tabs nav-tabs-block nav-justified" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" href="#wizard-validation-step1" data-toggle="tab">1. Chung</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#wizard-validation-step2" data-toggle="tab">2. Thông số kỹ
                            thuật</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#wizard-validation-step3" data-toggle="tab">3. Hình ảnh</a>
                    </li>
                </ul>
                <!-- END Step Tabs -->

                <!-- Form -->
                <form class="js-wizard-validation-form" action="{{asset('admin/product/add')}}" id="add-form"
                    method="POST" novalidate enctype="multipart/form-data">
                    <!-- Steps Content -->
                    <div class="block-content-full tab-content" style="min-height: 300px;">
                        <!-- Step 1 -->
                        <div class="tab-pane active" id="wizard-validation-step1" role="tabpanel">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputName">Tên sản phẩm <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="inputName" name="name"
                                        placeholder="Nhập tên sản phẩm" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="selectBrand">Thương hiệu <span class="text-danger">*</span></label>
                                    <select class="form-control" id="selectBrand" name="brand" required>
                                        @foreach ($list_brand as $item)
                                        <option value="{{$item->brand_id}}">{{$item->brand_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="selectCate">Danh mục <span class="text-danger">*</span></label>
                                    <select class="form-control" id="selectCate" name="cate" required>
                                        @foreach ($list_cate as $item)
                                        <option value="{{$item->cate_id}}">{{$item->cate_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputMemory">Bộ nhớ <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="inputMemory" name="memory"
                                            placeholder="Nhập bộ nhớ" aria-label="Text input with dropdown button">
                                        <div class="input-group-append">
                                            <select
                                                class="form-control btn btn-primary dropdown-toggle dropdown-toggle-split"
                                                id="selectMemoryTB" name="memory_type" required>
                                                <option value="GB">GB</option>
                                                <option value="TB">TB</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputColor">Màu sắc <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" id="inputEmail"
                                        placeholder="Nhập tên màu sắc" name="color" required>
                                </div>
                                {{-- <div class="form-group col-md-6">
                                <label for="inputColorCode">Mã màu <span class="text-danger">*</span></label>
                                <div class="js-colorpicker input-group" data-format="hex">
                                    <input type="text" class="form-control" id="inputColorCode" name="color_code"
                                        value="#5C80D1" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text colorpicker-input-addon">
                                            <i></i>
                                        </span>
                                    </div>
                                </div>
                            </div> --}}
                                <div class="form-group col-md-6">
                                    <label for="inputPrice">Giá <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input type="number" class="form-control text-center" id="inputPrice"
                                            name="price" min="0" placeholder="..">
                                        <div class="input-group-append">
                                            <span class="input-group-text">VNĐ</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">

                                {{-- <div class="form-group col-md-6">
                                <label for="selectStatus">Trạng thái <span class="text-danger">*</span></label>
                                        <select class="form-control" id="selectStatus" name="status" required>
                                            <option value="1">Sắp ra mắt</option>
                                            <option value="2">Đang kinh doanh</option>
                                            <option value="3">Ngừng kinh doanh</option>
                                        </select>
                            </div> --}}
                            </div>
                        </div>
                        <!-- END Step 1 -->

                        <!-- Step 2 -->
                        <div class="tab-pane" id="wizard-validation-step2" role="tabpanel">
                            <div class="form-group">
                                <label for="inputDetail">Thông số kĩ thuật <span class="text-danger">*</span></label>
                                <textarea class="js-maxlength form-control" id="inputDetail" name="detail" rows="13"
                                    required maxlength="1000" placeholder="Nhập thông tin chi tiết"
                                    data-always-show="true"></textarea>
                            </div>
                        </div>
                        <!-- END Step 2 -->

                        <!-- Step 3 -->
                        <div class="tab-pane" id="wizard-validation-step3" role="tabpanel">
                            <div class="table-responsive">
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
                                                <img id="image-poster" class="thumbnail"
                                                    src="assets/media/img/new_seo-10-75.png" onclick="chooseImg('poster');"
                                                    height="75px;" width="75px;">
                                                <input type="file" hidden name="poster" value=""
                                                    id="input-image-poster" onchange="changeImg(this, 'poster');" accept="image/*">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table id="images" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <td class="text-left">Hình ảnh bổ sung<span class="text-danger">*</span>
                                            </td>
                                            <td></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr id="image-row1">
                                            <td class="text-left">
                                                <img id="image-1" class="thumbnail"
                                                    src="assets/media/img/new_seo-10-75.png" onclick="chooseImg(1);"
                                                    height="75px;" width="75px;">
                                                <input type="file" hidden name="product_image[1][image]" value=""
                                                    id="input-image-1" onchange="changeImg(this, 1);" accept="image/*">
                                            </td>
                                            <td class="text-left"><button type="button"
                                                    onclick="$('#image-row1').remove();" data-toggle="tooltip"
                                                    class="btn btn-danger" title="Loại bỏ"><i
                                                        class="fa fa-minus-circle"></i></button></td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="1"></td>
                                            <td class="text-left">
                                                <button type="button" onclick="addImage();" data-toggle="tooltip"
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
                <button class="btn btn-primary" type="button" id="submitAdd">Thêm</button>
                <button class="btn btn-danger" type="button" id="cancelAdd">Hủy</button>
            </div>
        </div>
    </div>
</div>

@endsection
@section('scriptjs')
<script src="assets/js/plugins/sweetalert.min.js"></script>

<script src="assets/js/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/js/plugins/datatables/dataTables.bootstrap4.min.js"></script>
<script src="assets/js/plugins/datatables/buttons/dataTables.buttons.min.js"></script>
<script src="assets/js/plugins/datatables/buttons/buttons.flash.min.js"></script>
<script src="assets/js/plugins/datatables/buttons/buttons.print.min.js"></script>
<script src="assets/js/plugins/datatables/buttons/buttons.html5.min.js"></script>
<script src="assets/js/plugins/datatables/buttons/buttons.colVis.min.js"></script>
<script src="assets/js/plugins/datatables/jszip/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="assets/js/plugins/datatables/pdfmake/vfs_fonts.js"></script>

<!-- Page JS Plugins -->
<script src="assets/js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="assets/js/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<script src="assets/js/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
<script src="assets/js/plugins/select2/js/select2.full.min.js"></script>
<script src="assets/js/plugins/jquery.maskedinput/jquery.maskedinput.min.js"></script>
<script src="assets/js/plugins/ion-rangeslider/js/ion.rangeSlider.min.js"></script>
<script src="assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>
<!-- Page JS Helpers (BS Datepicker + BS Colorpicker + BS Maxlength + Select2 + Masked Inputs + Ion Range Slider plugins) -->
<script>jQuery(function () { One.helpers(['datepicker', 'colorpicker', 'maxlength', 'select2', 'masked-inputs', 'rangeslider']); });</script>

<!-- Page JS Code -->
<script src="assets/js/myscript.js"></script>
<script>
    $(document).ready(function () {
        var table = $('#table-brand').DataTable({
            'columnDefs': [{

                'targets': [0, 7], /* column index */

                'orderable': false, /* true or false */

            }],
            select: {
                style: 'api'
            },
            "pagingType": "full_numbers"
        });

        new $.fn.dataTable.Buttons(table, {
            dom: {
                container: {
                    tag: 'aside',
                    className: 'text-center bg-body-light py-2 mb-2'
                }
            },
            buttons: [
                {
                    extend: 'copy',
                    exportOptions: {
                        columns: [1, 2, 4, 5, 6]
                    },
                    text: 'Copy',
                    className: 'btn btn-sm btn-primary'
                },
                {
                    extend: 'csv',
                    exportOptions: {
                        columns: [1, 2, 4, 5, 6]
                    },
                    text: 'Export to CSV',
                    className: 'btn btn-sm btn-primary',
                    filename: function () {
                        var d = new Date();
                        var n = d.getTime();
                        return 'danhsachsanpham-' + n;
                    },
                    title: function () {
                        return 'Danh sách Sản phẩm';
                    }
                },
                {
                    extend: 'excel',
                    exportOptions: {
                        columns: [1, 2, 4, 5, 6]
                    },
                    text: 'Export to xlsx',
                    className: 'btn btn-sm btn-primary',
                    filename: function () {
                        var d = new Date();
                        var n = d.getTime();
                        return 'danhsachsanpham-' + n;
                    },
                    title: function () {
                        return 'Danh sách Sản phẩm';
                    }
                },
                {
                    extend: 'pdf',
                    exportOptions: {
                        columns: [1, 2, 4, 5, 6]
                    },
                    text: 'Export to pdf',
                    className: 'btn btn-sm btn-primary',
                    filename: function () {
                        var d = new Date();
                        var n = d.getTime();
                        return 'danhsachsanpham-' + n;
                    },
                    title: function () {
                        return 'Danh sách Sản phẩm';
                    }
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: [1, 2, 4, 5, 6]
                    },
                    text: 'Print',
                    className: 'btn btn-sm btn-primary',
                    filename: function () {
                        var d = new Date();
                        var n = d.getTime();
                        return 'danhsachsanpham-' + n;
                    },
                    title: function () {
                        return 'Danh sách Sản phẩm';
                    }
                }
            ]
        });
        table.buttons(0, null).container().prependTo(
            table.table().container()
        );
    });
</script>
<script>
    function chooseImg(temp) {
        $('#input-image-' + temp).click();
        console.log('hello');
    }

    function changeImg(input, temp) {
        //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            //Sự kiện file đã được load vào website
            reader.onload = function (e) {
                //Thay đổi đường dẫn ảnh
                $('#image-' + temp).attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    var index = 1;
    function addImage() {
        index++;
        let row = `
        <tr id="image-row${index}">
            <td class="text-left">
                <img id="image-${index}" class="thumbnail"
                    src="assets/media/img/new_seo-10-75.png" onclick="chooseImg(${index});"
                    height="75px;" width="75px;">
                <input type="file" hidden name="product_image[${index}][image]" value=""
                    id="input-image-${index}" onchange="changeImg(this, ${index});" accept="image/*">
            </td>
            <td class="text-left"><button type="button" onclick="$('#image-row${index}').remove();"
                    data-toggle="tooltip" class="btn btn-danger" title="Loại bỏ"><i
                        class="fa fa-minus-circle"></i></button></td>
        </tr>
        `;
        $('#images > tbody').append(row);
    }

    function showDetail(prod_id) {
        // URL có kèm tham số number
        var url = '{{asset('admin/product/view')}}/' + prod_id;

        // Data lúc này cho bằng rỗng
        var data = {};

        // Success Function
        var success = function (result) {
            $('#popupshow').append(result);
            $('#popup-view-detail').toggleClass('hidden');
            $('.darktheme').toggleClass('active');
        };

        // Result Type
        var dataType = 'text';

        // Send Ajax
        $.get(url, data, success, dataType);
    };

    function showEdit(prod_id) {
        // URL có kèm tham số number
        var url = '{{asset('admin/product/edit')}}/' + prod_id;

        // Data lúc này cho bằng rỗng
        var data = {};

        // Success Function
        var success = function (result) {
            $('#popupshow').append(result);
            $('#popup-form-edit').toggleClass('hidden');
            $('.darktheme').toggleClass('active');
            $('#edit-form').removeAttr('novalidate');
        };

        // Result Type
        var dataType = 'text';

        // Send Ajax
        $.get(url, data, success, dataType);
    };
</script>
@endsection