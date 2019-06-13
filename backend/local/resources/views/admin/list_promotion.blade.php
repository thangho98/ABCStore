@extends('admin.layout.master')
<<<<<<< HEAD
@section('title','Bảo hành')
@section('add_css_and_script')
<link rel="stylesheet" href="assets/js/plugins/datatables/dataTables.bootstrap4.css">
<link rel="stylesheet" href="assets/js/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.css">

<!-- Page JS Plugins CSS -->
<link rel="stylesheet" href="assets/js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css">
<link rel="stylesheet" href="assets/js/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
<link rel="stylesheet" href="assets/js/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="assets/js/plugins/ion-rangeslider/css/ion.rangeSlider.css">

<link rel="stylesheet" href="assets/css/mystyle.css">
=======
@section('title','Khuyến mãi')
@section('add_css_and_script')
<link rel="stylesheet" href="{{asset('public/admin')}}/assets/js/plugins/datatables/dataTables.bootstrap4.css">
<link rel="stylesheet" href="{{asset('public/admin')}}/assets/js/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.css">

<!-- Page JS Plugins CSS -->
<link rel="stylesheet" href="{{asset('public/admin')}}/assets/js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css">
<link rel="stylesheet" href="{{asset('public/admin')}}/assets/js/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
<link rel="stylesheet" href="{{asset('public/admin')}}/assets/js/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="{{asset('public/admin')}}/assets/js/plugins/ion-rangeslider/css/ion.rangeSlider.css">
<link rel="stylesheet" href="{{asset('public/admin')}}/assets/css/mystyle.css">
>>>>>>> thang
@endsection

@section('main')
<main id="main-container">
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
<<<<<<< HEAD
                    Danh sách Khuyến mãi <small
=======
                    Danh sách khuyến mãi <small
>>>>>>> thang
                        class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted"></small>
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">Quản lý</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="">Khuyến mãi</a>
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
<<<<<<< HEAD
            <div class="block-header row justify-content-end">
                <aside class="py-2 mb-2">
                    <button type="button" class="btn btn-primary" data-toggle="tooltip" title="Thêm" id="addbutton">
                        <i class="fa fa-fw fa-plus"></i>
                    </button>
                    <button type="button" class="btn btn-success" data-toggle="tooltip" title="Làm mới">
                        <i class="fa fa-fw fa-sync-alt"></i>
                    </button>
                </aside>
            </div>
            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
                <table class="table table-bordered table-striped table-vcenter" id="table-brand">
                    <thead>
                        <tr>
                            <th class="text-center orderby" style="width: 10%;">Mã Khuyến mãi</th>
                            <th class="text-center orderby" style="width: 15%;">Tên Khuyến Mãi</th>
                            <th class="text-center orderby" style="width: 15%;">Sản phẩm</th>
                            <th class="text-center orderby" style="width: 10%;">Ngày bắt đầu </th>
                            <th class="text-center orderby" style="width: 10%;">Ngày kết thúc </th>
                            <th class="text-center orderby" style="width: 10%;">Phần trăm</th>
                            <th class="text-center orderby" style="width: 10%;">Đơn giá</th>
                            <th class="text-center orderby" style="width: 10%;">Giá khuyến mãi</th>
                            <th style="width: 10%;" class="text-right orderby remove-sorting">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list_promotion as $item)
                        <tr>
                            <td class="text-center orderby" style="width: 10%;">
                                {{$item->prom_id}}
                            </td>
                            <td class="text-center orderby" style="width: 15%;">
                                {{$item->prom_name}}
                            </td>
                            <td class="text-center orderby" style="width: 15%;">
                                {{$item->prod_name}}
                            </td>
                            <td class="text-center orderby" style="width: 10%;">
                                {{date_format(date_create($item->prom_start_date),"d-m-Y")}}
                            </td>
                            <td class="text-center orderby" style="width: 10%;">
                                {{date_format(date_create($item->prom_end_date),"d-m-Y")}}
                            </td>
                            <td class="text-center orderby" style="width: 10%;">
                                {{$item->prom_percent}}
                            </td>
                            <td class="text-center orderby" style="width: 10%;">
                                {{$item->prom_unit_price}}
                            </td>
                            <td class="text-center orderby" style="width: 10%;">
                                {{$item->prom_promtion_price}}
                            </td>
                            <td class="text-right">
                                <div class="py-2 mb-2">
                                    <button type="button" class="btn btn-sm btn-info" title="Xem chi tiết"
                                        data-toggle="tooltip" onclick="showDetail({{$item->prom_id}})">
                                        <i class="fa fa-fw fa-eye"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-warning" data-toggle="tooltip"
                                        onclick="showEdit({{$item->prom_id}})" title="Sửa">
                                        <i class="fa fa-fw fa-pencil-alt"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
=======
            <form id="formdata" action="{{asset('admin/promotion/delete')}}" method="GET" enctype="multipart/form-data">
                <div class="block-header row justify-content-end">
                    <aside class="py-2 mb-2">
                        <a class="btn btn-primary" data-toggle="tooltip" title="Thêm" href="{{asset('admin/promotion/add')}}">
                            <i class="fa fa-fw fa-plus"></i>
                        </a>
                        <button type="button" class="btn btn-success" onclick="location.reload();" data-toggle="tooltip" title="Làm mới">
                            <i class="fa fa-fw fa-sync-alt"></i>
                        </button>
                        </button>
                        <button type="button" data-toggle="tooltip" title="Xóa" class="btn btn-danger" id="btnDel"><i
                                class="fa fa-fw fa-trash"></i></button>
                    </aside>
                </div>
                <div class="block-content block-content-full">
                    <div class="table-responsive-sm table-responsive table-responsive-md">
                        <table class="table table-bordered table-striped table-vcenter" id="table-brand">
                            <thead>
                                <tr>
                                    <th style="width: 1px;" class="text-center orderby remove-sorting">
                                        <input type="checkbox"
                                            onclick="$('input[name*=\'selected\']').prop('checked', this.checked);">
                                    </th>
                                    <th class="text-center orderby">Tên KM</th>
                                    <th class="d-none d-sm-table-cell orderby">Ngày bắt đầu</th>
                                    <th class="d-none d-sm-table-cell orderby">Ngày kết thúc
                                    </th>
                                    <th class="d-none d-sm-table-cell orderby">Trạng thái
                                    </th>
                                    <th style="width: 140px;" class="text-right orderby remove-sorting">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list_promotion as $item)
                                <tr>
                                    <td class="text-center">
                                        <input @if ($item->prom_status != 0) disabled @else name="selected[]" @endif type="checkbox"  value="{{$item->prom_id}}">
                                    </td>
                                    <td class="font-w600 font-size-sm">{{$item->prom_name}}</td>
                                    <td class="text-center d-sm-table-cell">
                                        {{$item->prom_start_date}}
                                    </td>
                                    <td class="text-center d-sm-table-cell">
                                        {{$item->prom_end_date}}
                                    </td>
                                    <td class="d-none d-sm-table-cell">
                                        @if ($item->prom_status == 0)
                                        <span class="badge badge-primary">Chưa bắt đầu
                                        @elseif($item->prom_status == 1)
                                        <span class="badge badge-secondary">Đang khuyến mãi
                                        @else
                                        <span class="badge badge-danger">Đã kết thúc
                                        @endif</span>
                                    </td>
                                    <td class="text-right">
                                        <div class="py-2 mb-2">
                                            <button type="button" class="btn btn-sm btn-info" title="Xem chi tiết"
                                                data-toggle="tooltip" onclick="showDetail({{$item->prom_id}})">
                                                <i class="fa fa-fw fa-eye"></i>
                                            </button>
                                            <a class="btn btn-sm btn-warning" data-toggle="tooltip"
                                                @if ($item->prom_status == 0)
                                                    href="{{asset('admin/promotion/edit/'.$item->prom_id)}}"
                                                @endif title="Sửa">
                                                <i class="fa fa-fw fa-pencil-alt"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </form>
>>>>>>> thang
        </div>
        <!-- END Dynamic Table with Export Buttons -->
    </div>
    <!-- END Page Content -->

</main>
@endsection
@section('popup')
<div id="popupshow">
<<<<<<< HEAD
    
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
=======
</div>
@endsection
@section('scriptjs')
<script src="{{asset('public/admin')}}/assets/js/plugins/sweetalert.min.js"></script>

<script src="{{asset('public/admin')}}/assets/js/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('public/admin')}}/assets/js/plugins/datatables/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('public/admin')}}/assets/js/plugins/datatables/buttons/dataTables.buttons.min.js"></script>
<script src="{{asset('public/admin')}}/assets/js/plugins/datatables/buttons/buttons.flash.min.js"></script>
<script src="{{asset('public/admin')}}/assets/js/plugins/datatables/buttons/buttons.print.min.js"></script>
<script src="{{asset('public/admin')}}/assets/js/plugins/datatables/buttons/buttons.html5.min.js"></script>
<script src="{{asset('public/admin')}}/assets/js/plugins/datatables/buttons/buttons.colVis.min.js"></script>
<script src="{{asset('public/admin')}}/assets/js/plugins/datatables/jszip/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="{{asset('public/admin')}}/assets/js/plugins/datatables/pdfmake/vfs_fonts.js"></script>

<!-- Page JS Plugins -->
<script src="{{asset('public/admin')}}/assets/js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="{{asset('public/admin')}}/assets/js/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<script src="{{asset('public/admin')}}/assets/js/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
<script src="{{asset('public/admin')}}/assets/js/plugins/select2/js/select2.full.min.js"></script>
<script src="{{asset('public/admin')}}/assets/js/plugins/jquery.maskedinput/jquery.maskedinput.min.js"></script>
<script src="{{asset('public/admin')}}/assets/js/plugins/ion-rangeslider/js/ion.rangeSlider.min.js"></script>
<script src="{{asset('public/admin')}}/assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>

<!-- Page JS Helpers (BS Datepicker + BS Colorpicker + BS Maxlength + Select2 + Masked Inputs + Ion Range Slider plugins) -->
<script>jQuery(function () { One.helpers(['datepicker', 'colorpicker', 'maxlength', 'select2', 'masked-inputs', 'rangeslider']); });</script>

<!-- Page JS Code -->
>>>>>>> thang
<script>
    $(document).ready(function () {
        var table = $('#table-brand').DataTable({
            'columnDefs': [{

<<<<<<< HEAD
                'targets': [3,5], /* column index */
=======
                'targets': [0, 5], /* column index */
>>>>>>> thang

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
                        columns: [1, 2, 3, 4]
                    },
                    text: 'Copy',
                    className: 'btn btn-sm btn-primary'
                },
                {
                    extend: 'csv',
                    exportOptions: {
                        columns: [1, 2, 3, 4]
                    },
                    text: 'Export to CSV',
                    className: 'btn btn-sm btn-primary',
                    filename: function () {
                        var d = new Date();
                        var n = d.getTime();
<<<<<<< HEAD
                        return 'danhsachsanpham-' + n;
                    },
                    title: function () {
                        return 'Danh sách Sản phẩm';
=======
                        return 'danhsachnhanvien-' + n;
                    },
                    title: function () {
                        return 'Danh sách Nhân viên';
>>>>>>> thang
                    }
                },
                {
                    extend: 'excel',
                    exportOptions: {
                        columns: [1, 2, 3, 4]
                    },
                    text: 'Export to xlsx',
                    className: 'btn btn-sm btn-primary',
                    filename: function () {
                        var d = new Date();
                        var n = d.getTime();
<<<<<<< HEAD
                        return 'danhsachsanpham-' + n;
                    },
                    title: function () {
                        return 'Danh sách Sản phẩm';
=======
                        return 'danhsachnhanvien-' + n;
                    },
                    title: function () {
                        return 'Danh sách Nhân viên';
>>>>>>> thang
                    }
                },
                {
                    extend: 'pdf',
                    exportOptions: {
                        columns: [1, 2, 3, 4]
                    },
                    text: 'Export to pdf',
                    className: 'btn btn-sm btn-primary',
                    filename: function () {
                        var d = new Date();
                        var n = d.getTime();
<<<<<<< HEAD
                        return 'danhsachsanpham-' + n;
                    },
                    title: function () {
                        return 'Danh sách Sản phẩm';
=======
                        return 'danhsachnhanvien-' + n;
                    },
                    title: function () {
                        return 'Danh sách Nhân viên';
>>>>>>> thang
                    }
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: [1, 2, 3, 4]
                    },
                    text: 'Print',
                    className: 'btn btn-sm btn-primary',
                    filename: function () {
                        var d = new Date();
                        var n = d.getTime();
<<<<<<< HEAD
                        return 'danhsachsanpham-' + n;
                    },
                    title: function () {
                        return 'Danh sách Sản phẩm';
=======
                        return 'danhsachnhanvien-' + n;
                    },
                    title: function () {
                        return 'Danh sách Nhân viên';
>>>>>>> thang
                    }
                }
            ]
        });
<<<<<<< HEAD
=======

>>>>>>> thang
        table.buttons(0, null).container().prependTo(
            table.table().container()
        );
    });
</script>
<<<<<<< HEAD
<script>
    function showDetail(gtd_id) {
        // URL có kèm tham số number
        var url = '{{asset('admin/guarantee/view')}}/' + gtd_id;
=======
<script src="{{asset('public/admin')}}/assets/js/myscript.js"></script>
<script>
    function showDetail(prom_id) {
        // URL có kèm tham số number
        var url = '{{asset('admin/promotion/view')}}/' + prom_id;
>>>>>>> thang

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

<<<<<<< HEAD
    function showEdit(prod_id) {
        // URL có kèm tham số number
        var url = '{{asset('admin/guarantee/edit')}}/' + gtd_id;
=======
    function showEdit(empl_id) {
        // URL có kèm tham số number
        var url = '{{asset('admin/promotion/edit')}}/' + empl_id;
>>>>>>> thang

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
<<<<<<< HEAD
<!-- Page JS Code -->
<script src="assets/js/myscript.js"></script>
=======
>>>>>>> thang
@endsection