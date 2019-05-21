@extends('admin.layout.master')
@section('title','Đơn đặt hàng online')
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
                    Danh sách Đơn đặt hàng online<small
                        class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted"></small>
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">Bán hàng</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="">Đơn đặt hàng online</a>
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
            <div class="block-header row justify-content-end">
                <aside class="py-2 mb-2">
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
                            <th class="text-center orderby" style="width: 130px;">Mã đơn hàng</th>
                            <th class="orderby">Tên Khách hàng</th>
                            <th class="orderby">SĐT</th>
                            <th class="orderby">CMND</th>
                            <th class="d-none d-sm-table-cell orderby">Tổng số lượng</th>
                            <th class="d-none d-sm-table-cell orderby">Tổng tiền
                            </th>
                            <th class="d-none d-sm-table-cell orderby">Trạng thái
                            </th>
                            <th style="width: 140px;" class="text-right orderby remove-sorting">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list_cart as $item)
                        <tr>
                            <td class="text-center font-size-sm">{{$item->cart_id}}</td>
                            <td class="font-w600 font-size-sm">
                                {{$item->cus_name}}
                            </td>
                            <td class="d-none d-sm-table-cell">
                                {{$item->cus_phone}}
                            </td>
                            <td class="text-center d-sm-table-cell">
                                {{$item->cus_identity_card}}
                            </td>
                            <td class="text-center d-sm-table-cell">
                                {{$item->cart_total_prod}}
                            </td>
                            <td class="text-center d-sm-table-cell">
                                {{number_format($item->cart_total_price,0,',','.')}} VNĐ
                            </td>
                            <td class="text-center d-sm-table-cell">
                                @if ($item->cart_state == 0)
                                <span class="badge badge-warning">Chờ gửi mail
                                @elseif ($item->cart_state == 1)
                                <span class="badge badge-secondary">Chờ xác nhận
                                @elseif($item->cart_state == 2)
                                <span class="badge badge-primary">Đã xác nhận
                                @elseif($item->cart_state == 3)
                                <span class="badge badge-success">Đã thanh toán
                                @else
                                <span class="badge badge-dark">Hết hạn
                                @endif </span>
                            </td>
                            <td class="text-right">
                                <div class="py-2 mb-2">
                                    <button type="button" class="btn btn-sm btn-info" title="Xem chi tiết"
                                        data-toggle="tooltip" onclick="showDetail({{$item->empl_id}})">
                                        <i class="fa fa-fw fa-eye"></i>
                                    </button>
                                    @if ($item->cart_state == 0)
                                    <a type="button" class="btn btn-sm btn-info" title="Gửi mail xác nhận"
                                        data-toggle="tooltip" href="">
                                        <i class="fa fa-fw fa-eye"></i>
                                    </a>
                                    @elseif($item->cart_state == 2)
                                    <a type="button" class="btn btn-sm btn-info" title="Thanh toán"
                                        data-toggle="tooltip" href="">
                                        <i class="fa fa-fw fa-eye"></i>
                                    </a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END Dynamic Table with Export Buttons -->
    </div>
    <!-- END Page Content -->

</main>
@endsection
@section('popup')
<div id="popupshow">
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
                        return 'danhsachdondathangonline-' + n;
                    },
                    title: function () {
                        return 'Danh sách Đơn đặt hàng online';
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
                        return 'danhsachdondathangonline-' + n;
                    },
                    title: function () {
                        return 'Danh sách Đơn đặt hàng online';
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
                        return 'danhsachdondathangonline-' + n;
                    },
                    title: function () {
                        return 'Danh sách Đơn đặt hàng online';
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
                        return 'danhsachdondathangonline-' + n;
                    },
                    title: function () {
                        return 'Danh sách Đơn đặt hàng online';
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
    function showDetail(cart_id) {
        // URL có kèm tham số number
        var url = '{{asset('admin/cart/view')}}/' + cart_id;

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

    function showEdit(cart_id) {
        // URL có kèm tham số number
        var url = '{{asset('admin/cart/edit')}}/' + cart_id;

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