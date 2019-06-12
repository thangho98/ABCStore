@extends('admin.layout.master')
@section('title','Phân quyền')
@section('add_css_and_script')
<link rel="stylesheet" href="assets/js/plugins/datatables/dataTables.bootstrap4.css">
<link rel="stylesheet" href="assets/js/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.css">

<!-- Page JS Plugins CSS -->
<link rel="stylesheet" href="assets/css/mystyle.css">
@endsection

@section('main')
<main id="main-container">
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                    Danh sách Tài khoản <small
                        class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted"></small>
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">Quản lý</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="">Tài khoản</a>
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
            <form id="formdata" action="" method="GET" enctype="multipart/form-data">
                <div class="block-header row justify-content-end">
                    <aside class="py-2 mb-2">
                        <button type="button" disabled class="btn btn-primary" data-toggle="tooltip" title="Thêm" id="addbutton">
                            <i class="fa fa-fw fa-plus"></i>
                        </button>
                        <button type="button" class="btn btn-success" onclick="location.reload();" data-toggle="tooltip" title="Làm mới">
                            <i class="fa fa-fw fa-sync-alt"></i>
                        </button>
                        <button type="button" disabled data-toggle="tooltip" title="Xóa" class="btn btn-danger" id="btnDel"><i
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
                                <th class="text-center orderby">Tên phân quyền</th>
                                <th style="width: 30%;" class="text-right orderby remove-sorting">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list_permission as $item)
                            <tr>
                                <td class="text-center">
                                    <input type="checkbox" name="selected[]" value="{{$item->perm_name}}">
                                </td>
                                <td class="text-center font-size-sm">{{$item->perm_name}}</td>
                                <td class="text-right">
                                    <div class="py-2 mb-2">
                                        <button type="button" class="btn btn-sm btn-warning" data-toggle="tooltip"
                                            disabled title="Sửa">
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

<!-- Page JS Code -->
<script>
    $(document).ready(function () {
        var table = $('#table-brand').DataTable({
            'columnDefs': [{

                'targets': [0, 2], /* column index */

                'orderable': false, /* true or false */

            }],
            select: {
                style: 'api'
            },
            "pagingType": "full_numbers"
        });
    });
</script>
<script src="assets/js/myscript.js"></script>
@endsection