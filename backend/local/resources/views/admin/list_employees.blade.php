@extends('admin.layout.master')
@section('title','Nhân viên')
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
                    Danh sách Nhân viên <small
                        class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted"></small>
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">Quản lý</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="">Nhân viên</a>
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
            <form id="formdata" action="{{asset('admin/employees/delete')}}" method="GET" enctype="multipart/form-data">
                <div class="block-header row justify-content-end">
                    <aside class="py-2 mb-2">
                        <button type="button" class="btn btn-primary" data-toggle="tooltip" title="Thêm" id="addbutton">
                            <i class="fa fa-fw fa-plus"></i>
                        </button>
                        <button type="button" class="btn btn-success" onclick="location.reload();" data-toggle="tooltip" title="Làm mới">
                            <i class="fa fa-fw fa-sync-alt"></i>
                        </button>
                        {{-- <button type="button" data-toggle="tooltip" title="Xóa" class="btn btn-danger" id="btnDel"><i
                                class="fa fa-fw fa-trash"></i></button> --}}
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
                                <th class="text-center orderby" style="width: 100px;">Mã NV</th>
                                <th class="orderby">Tên Nhân Viên</th>
                                <th class="d-none d-sm-table-cell orderby">Giới tính</th>
                                <th class="d-none d-sm-table-cell orderby">Ngày sinh
                                </th>
                                <th class="d-none d-sm-table-cell orderby">SĐT
                                </th>
                                <th class="d-none d-sm-table-cell orderby">CMND
                                </th>
                                <th class="d-none d-sm-table-cell orderby">Trạng thái
                                </th>
                                <th style="width: 140px;" class="text-right orderby remove-sorting">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list_empl as $item)
                            <tr>
                                <td class="text-center">
                                    <input type="checkbox" name="selected[]" value="{{$item->empl_id}}">
                                </td>
                                <td class="text-center font-size-sm">{{$item->empl_id}}</td>
                                <td class="font-w600 font-size-sm">
                                    {{$item->empl_name}}
                                </td>
                                <td class="d-none d-sm-table-cell">
                                        @if ($item->empl_sex)
                                        <span class="badge badge-danger">Nữ
                                        @else
                                        <span class="badge badge-primary">Nam
                                        @endif</span>
                                </td>
                                <td class="text-center d-sm-table-cell">
                                    {{date_format(date_create($item->empl_birthday),"d-m-Y")}}
                                </td>
                                <td class="text-center d-sm-table-cell">
                                    {{$item->empl_phone}}
                                </td>
                                <td class="text-center d-sm-table-cell">
                                    {{$item->empl_identity_card}}
                                </td>
                                <td class="text-center d-sm-table-cell">
                                    @if ($item->empl_status == 0)
                                    <span class="badge badge-info">Đang làm
                                        @else
                                        <span class="badge badge-dark"> Đã nghỉ
                                        @endif </span>
                                </td>
                                <td class="text-right">
                                    <div class="py-2 mb-2">
                                        <button type="button" class="btn btn-sm btn-info" title="Xem chi tiết"
                                            data-toggle="tooltip" onclick="showDetail({{$item->empl_id}})">
                                            <i class="fa fa-fw fa-eye"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-warning" data-toggle="tooltip"
                                            onclick="showEdit({{$item->empl_id}})" title="Sửa">
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
    <div class="popup-form hidden scrollbar" id="popup-form-add">
        <form action="{{asset('admin/employees/add')}}" id="add-form" method="POST" novalidate enctype="multipart/form-data">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputName">Tên nhân viên <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="inputName" name="name" placeholder="Nhập tên nhân viên"
                        required>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputBirthday">Ngày sinh <span class="text-danger">*</span></label>
                    <input type="text" class="js-datepicker form-control" id="inputBirthday" name="birthday"
                        data-week-start="1" data-autoclose="true" data-today-highlight="true"
                        data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy" required>
                </div>

            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputIdentityCard">CMND <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="inputIdentityCard" name="identityCard"
                        placeholder="Nhập chứng minh thư" required>
                </div>
                <div class="form-group col-md-3 ml-4">
                    <label class="d-block">Giới tính <span class="text-danger">*</span></label>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="example-rd-custom-inline1" name="gender"
                            value="0" checked>
                        <label class="custom-control-label" for="example-rd-custom-inline1">Nam</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" id="example-rd-custom-inline2" name="gender"
                            value="1">
                        <label class="custom-control-label" for="example-rd-custom-inline2">Nữ</label>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail">Email <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" id="inputEmail" placeholder="Nhập email" name="email"
                        required>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputTel">SĐT <span class="text-danger">*</span></label>
                    <input type="tel" class="form-control" id="inputTel" placeholder="Nhập số điện thoại" name="phone"
                        required>
                </div>
            </div>
            <div class="form-group">
                <label for="inputAddress">Địa chỉ <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="inputAddress" name="address" placeholder="Nhập địa chỉ" required>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputStartDate">Ngày vào làm <span class="text-danger">*</span></label>
                    <input type="text" class="form-control js-datepicker" id="inputStartDate" name="start_date"
                        data-week-start="1" data-autoclose="true" data-today-highlight="true"
                        data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputSalary">Lương cơ bản <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <input type="number" class="form-control text-center" id="inputSalary" name="salary" min="0"
                            placeholder="..">
                        <div class="input-group-append">
                            <span class="input-group-text">VNĐ</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="input-image-avatar">Avatar <span class="text-danger">*</span></label>
                    <img id="image-avatar" class="thumbnail"
                        src="assets/media/img/new_seo-10-75.png"
                        onclick="chooseImg('avatar');" height="150px;" width="150px;">
                    <input type="file" hidden name="avatar" id="input-image-avatar"
                        onchange="changeImg(this, 'avatar');" accept="image/*" required>
                </div>
            </div>
            <div class="tile-footer-2">
                <button class="btn btn-primary" type="button" id="submitAdd">Thêm</button>
                <button class="btn btn-danger" type="button" id="cancelAdd">Hủy</button>
            </div>
            {{ csrf_field() }}
        </form>
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
<script>
    $(document).ready(function () {
        var table = $('#table-brand').DataTable({
            'columnDefs': [{

                'targets': [0, 8], /* column index */

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
                        columns: [1, 2, 3, 4, 5, 6, 7]
                    },
                    text: 'Copy',
                    className: 'btn btn-sm btn-primary'
                },
                {
                    extend: 'csv',
                    exportOptions: {
                        columns: [1, 2, 3, 4, 5, 6, 7]
                    },
                    text: 'Export to CSV',
                    className: 'btn btn-sm btn-primary',
                    filename: function () {
                        var d = new Date();
                        var n = d.getTime();
                        return 'danhsachnhanvien-' + n;
                    },
                    title: function () {
                        return 'Danh sách Nhân viên';
                    }
                },
                {
                    extend: 'excel',
                    exportOptions: {
                        columns: [1, 2, 3, 4, 5, 6, 7]
                    },
                    text: 'Export to xlsx',
                    className: 'btn btn-sm btn-primary',
                    filename: function () {
                        var d = new Date();
                        var n = d.getTime();
                        return 'danhsachnhanvien-' + n;
                    },
                    title: function () {
                        return 'Danh sách Nhân viên';
                    }
                },
                {
                    extend: 'pdf',
                    exportOptions: {
                        columns: [1, 2, 3, 4, 5, 6, 7]
                    },
                    text: 'Export to pdf',
                    className: 'btn btn-sm btn-primary',
                    filename: function () {
                        var d = new Date();
                        var n = d.getTime();
                        return 'danhsachnhanvien-' + n;
                    },
                    title: function () {
                        return 'Danh sách Nhân viên';
                    }
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: [1, 2, 3, 4, 5, 6, 7]
                    },
                    text: 'Print',
                    className: 'btn btn-sm btn-primary',
                    filename: function () {
                        var d = new Date();
                        var n = d.getTime();
                        return 'danhsachnhanvien-' + n;
                    },
                    title: function () {
                        return 'Danh sách Nhân viên';
                    }
                }
            ]
        });

        table.buttons(0, null).container().prependTo(
            table.table().container()
        );
    });
</script>
<script src="assets/js/myscript.js"></script>
<script>
    function showDetail(empl_id) {
        // URL có kèm tham số number
        var url = '{{asset('admin/employees/view')}}/' + empl_id;

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

    function showEdit(empl_id) {
        // URL có kèm tham số number
        var url = '{{asset('admin/employees/edit')}}/' + empl_id;

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

    function chooseImg(temp) {
        $('#input-image-' + temp).click();
        console.log('hello');
    }

    function changeImg(input, temp) {
        //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            //Sự kiện file đã được load vào website
            reader.onload = function(e) {
                //Thay đổi đường dẫn ảnh
                $('#image-' + temp).attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection