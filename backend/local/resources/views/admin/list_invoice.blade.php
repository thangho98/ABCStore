@extends('admin.layout.master')
@section('title','Nhập hàng')
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
                    Danh sách Đơn nhập hàng <small
                        class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted"></small>
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="">Đơn nhập hàng</a>
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
                    <a class="btn btn-primary" data-toggle="tooltip" title="Thêm" href="{{asset('admin/invoice/add')}}">
                        <i class="fa fa-fw fa-plus"></i>
                    </a>
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
                            <th class="text-center orderby" style="width: 120px;">Mã HĐ</th>
                            <th class="orderby">Ngày nhập</th>
                            <th class="d-none d-sm-table-cell orderby">Nhà cung cấp</th>
                            <th class="d-none d-sm-table-cell orderby" style="width: 180px;">Tổng sản phẩm
                            </th>
                            <th class="d-none d-sm-table-cell orderby">Tổng tiền
                            </th>
                            <th class="d-none d-sm-table-cell orderby">Trạng thái
                            </th>
                            <th style="width: 180px;" class="text-right orderby remove-sorting">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list_invoice as $item)
                        <tr>
                            <td class="text-center font-size-sm">{{$item->invo_code}}</td>
                            <td class="text-center d-sm-table-cell">
                                {{date_format(date_create($item->invo_date),"d-m-Y")}}
                            </td>
                            <td class="font-w600 font-size-sm">
                                {{$item->prov_name}}
                            </td>
                            <td class="text-center font-size-sm">{{$item->invo_total_prod}}</td>
                            <td class="text-center d-sm-table-cell">
                                {{number_format($item->invo_total_price,0,',','.')}} VNĐ
                            </td>
                            <td class="text-center d-sm-table-cell">
                                @if ($item->invo_status == 0)
                                <span class="badge badge-danger">chưa duyệt</span>
                                @else
                                <span class="badge badge-dark"> Đã duyệt</span>
                                @endif 
                            </td>
                            <td class="text-right">
                                <div class="py-2 mb-2">
                                    <button type="button" @if ($item->invo_status == 1) disabled @endif class="btn btn-sm btn-secondary" title="Xem chi tiết"
                                        data-toggle="tooltip" onclick="approvedInvo('{{$item->invo_id}}')">
                                        <i class="fa fa-fw fa-check-circle"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-info" title="Xem chi tiết"
                                        data-toggle="tooltip" onclick="showDetail('{{$item->invo_id}}')">
                                        <i class="fa fa-fw fa-eye"></i>
                                    </button>
                                    <button @if ($item->invo_status == 1 || Auth::user()->empl_id != $item->invo_empl) disabled @endif onclick="editInvo('{{$item->invo_id}}')" type="button" class="btn btn-sm btn-warning" data-toggle="tooltip" title="Sửa">
                                        <i class="fa fa-fw fa-pencil-alt"></i>
                                    </button>
                                    <button @if ($item->invo_status == 1 || Auth::user()->empl_id != $item->invo_empl) disabled @endif onclick="delInvo('{{$item->invo_id}}')" type="button" data-toggle="tooltip" title="Xóa" class="btn btn-sm btn-danger">
                                        <i class="fa fa-fw fa-trash"></i>
                                    </button>
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
<script src="assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>

<!-- Page JS Helpers (BS Datepicker + BS Colorpicker + BS Maxlength + Select2 + Masked Inputs + Ion Range Slider plugins) -->
<script>jQuery(function () { One.helpers(['datepicker', 'colorpicker', 'maxlength', 'select2', 'masked-inputs', 'rangeslider']); });</script>

<!-- Page JS Code -->
<script>
    $(document).ready(function () {
        var table = $('#table-brand').DataTable({
            'columnDefs': [{

                'targets': [6], /* column index */

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
                        columns: [0, 1, 2, 3, 4, 5]
                    },
                    text: 'Copy',
                    className: 'btn btn-sm btn-primary'
                },
                {
                    extend: 'csv',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5]
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
                        columns: [0, 1, 2, 3, 4, 5]
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
                        columns: [0, 1, 2, 3, 4, 5]
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
                        columns: [0, 1, 2, 3, 4, 5]
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
    function approvedInvo(invo_id) {
        swal({
			title: "Bạn có muốn duyệt cho hóa đơn nhập hàng này?",
			text: "Sau khi duyệt, thì bạn sẽ không được phép chỉnh sửa cho hóa đơn này!",
			icon: "warning",
			buttons: ["Không, vẫn giữ nguyên!", "Vâng, tôi chấp nhận!"],
			dangerMode: true,
		})
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: "{{asset('admin/invoice/approved')}}",
                    type: "get",
                    data: {
                        invo_id : invo_id
                    },
                    success: function (data) {
                        swal("Thành công!", "Đối tượng đã được duyệt.", "success");
                        location.reload();
                    }
                });
            }
            else {
                swal("Đã hủy", "Đối tượng vẫn được giữ lại :)", "error");
            }
        });
    }

    function delInvo(invo_id) {
        swal({
			title: "Bạn có muốn xóa?",
			text: "Sau khi xóa, bạn sẽ không thể khôi phục đối tượng này!",
			icon: "warning",
			buttons: ["Không, xóa nó đi!", "Vâng, tôi chấp nhận!"],
			dangerMode: true,
		})
        .then((willDelete) => {
            if (willDelete) {
                //window.location.href ="{{asset('admin/invoice/delete')}}?invo_id="+invo_id;
                $.ajax({
                    url: "{{asset('admin/invoice/delete')}}",
                    type: "get",
                    data: {
                        invo_id : invo_id
                    },
                    success: function (data) {
                        swal("Đã xóa!", "Đối tượng đã được xóa.", "success");
                        location.reload();
                    }
                });
            }
            else {
                swal("Đã hủy", "Đối tượng vẫn được giữ lại :)", "error");
            }
        });
    }

    function showDetail(invo_id) {
        // URL có kèm tham số number
        var url = '{{asset('admin/invoice/view')}}/' + invo_id;

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

    function editInvo(invo_id) {
        window.location.href ="{{asset('admin/invoice/edit')}}/"+invo_id;
    };
</script>
@endsection