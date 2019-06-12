@extends('admin.layout.master')
@section('title','Thương hiệu')
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
                    Danh sách Thương hiệu <small
                        class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted"></small>
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">Quản lý</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="">Thương hiệu</a>
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
            <form id="formdata" action="{{asset('admin/brand/delete')}}" method="GET" enctype="multipart/form-data">
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
                                <td style="width: 1px;" class="text-center orderby remove-sorting">
                                    <input type="checkbox"
                                        onclick="$('input[name*=\'selected\']').prop('checked', this.checked);">
                                </td>
                                <th class="text-center orderby" style="width: 130px;">Mã TH</th>
                                <th class="orderby">Tên Thương hiệu</th>
                                <th class="d-none d-sm-table-cell orderby" style="width: 30%;">Mô tả</th>
                                <th class="d-none d-sm-table-cell orderby" style="width: 230px;">Thương hiệu nổi
                                    tiếng
                                </th>
                                <th style="width: 140px;" class="text-right orderby remove-sorting">Thao tác
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list_brand as $item)
                            <tr>
                                <td class="text-center">
                                    <input type="checkbox" name="selected[]" value="{{$item->brand_id}}">
                                </td>
                                <td class="text-center font-size-sm">{{$item->brand_id}}</td>
                                <td class="font-w600 font-size-sm">
                                    {{$item->brand_name}}
                                </td>
                                <td class="d-none d-sm-table-cell font-size-sm">
                                    {{$item->brand_desc}}
                                </td>
                                <td class="text-center d-none d-sm-table-cell">
                                    @if ($item->brand_famous)
                                    <i class="fa fa-check fa-lg"></i>
                                    @endif
                                </td>
                                <td class="text-right">
                                    <div class="py-2 mb-2">
                                        <button type="button" class="btn btn-sm btn-warning" data-toggle="tooltip"
                                            onclick="showEdit({{$item->brand_id}})" title="Sửa">
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
        <form action="{{asset('admin/brand/add')}}" id="add-form" method="POST" novalidate>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Tên thương hiệu <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="name" placeholder="Nhập tên thương hiệu"
                        required>
                </div>
                <div class="form-group col-md-4 ml-4">
                    <label>Thương hiệu nổi tiếng <span class="text-danger">*</span></label>
                    <div class="custom-control custom-switch mb-1">
                        <input type="checkbox" class="custom-control-input" id="example-sw-custom1" name="isfamous" value="1">
                        <label class="custom-control-label" for="example-sw-custom1"></label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="example-textarea-input">Mô tả</label>
                <textarea class="form-control" id="example-textarea-input"
                    name="description" rows="4"
                    placeholder="Nhập mô tả"></textarea>
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

                'targets': [0, 5], /* column index */

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
                        columns: [1, 2, 3]
                    },
                    text: 'Copy',
                    className: 'btn btn-sm btn-primary'
                },
                {
                    extend: 'csv',
                    exportOptions: {
                        columns: [1, 2, 3]
                    },
                    text: 'Export to CSV',
                    className: 'btn btn-sm btn-primary',
                    filename: function () {
                        var d = new Date();
                        var n = d.getTime();
                        return 'danhsachthuonghieu-' + n;
                    },
                    title: function () {
                        return 'Danh sách Thương hiệu';
                    }
                },
                {
                    extend: 'excel',
                    exportOptions: {
                        columns: [1, 2, 3]
                    },
                    text: 'Export to xlsx',
                    className: 'btn btn-sm btn-primary',
                    filename: function () {
                        var d = new Date();
                        var n = d.getTime();
                        return 'danhsachthuonghieu-' + n;
                    },
                    title: function () {
                        return 'Danh sách Thương hiệu';
                    }
                },
                {
                    extend: 'pdf',
                    exportOptions: {
                        columns: [1, 2, 3]
                    },
                    text: 'Export to pdf',
                    className: 'btn btn-sm btn-primary',
                    filename: function () {
                        var d = new Date();
                        var n = d.getTime();
                        return 'danhsachthuonghieu-' + n;
                    },
                    title: function () {
                        return 'Danh sách Thương hiệu';
                    }
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: [1, 2, 3]
                    },
                    text: 'Print',
                    className: 'btn btn-sm btn-primary',
                    filename: function () {
                        var d = new Date();
                        var n = d.getTime();
                        return 'danhsachthuonghieu-' + n;
                    },
                    title: function () {
                        return 'Danh sách Thương hiệu';
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
    function showEdit(brand_id) {
        // URL có kèm tham số number
        var url = '{{asset('admin/brand/edit')}}/' + brand_id;

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