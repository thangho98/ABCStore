@extends('admin.layout.master')
@section('title','Doanh thu')
@section('add_css_and_script')
<link rel="stylesheet" href="assets/js/plugins/datatables/dataTables.bootstrap4.css">
<link rel="stylesheet" href="assets/js/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.css">

<link rel="stylesheet" href="assets/css/mystyle.css">
@endsection

@section('main')
<main id="main-container">
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                    Thống kê doanh thu <small
                        class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted"></small>
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">Thống kê</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="">Doanh thu</a>
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
                <form id="filterForm" method="get" class="form-inline">
                    <div class="form-group mb-2">
                        <label class="mr-2">Loại:</label>
                        <select name="selectType" id="selectType" class="form-control">
                            <option @if ($selectType == 0)
                                selected
                            @endif value="0">Tất cả</option>
                            <option
                            @if ($selectType == 1)
                                selected
                            @endif value="1">Tháng</option>
                            <option
                            @if ($selectType == 2)
                                selected
                            @endif value="2">Quý</option>
                            <option
                            @if ($selectType == 3)
                                selected
                            @endif value="3">Năm</option>
                        </select>
                    </div>
                    <div class="form-group mx-sm-3 mb-2">
                        <label class="mr-2">Năm:</label>
                        <input id="inputYear" @if ($selectType == 0 || $selectType == 3)
                        disabled
                    @endif type="number" name="year" class="form-control" placeholder="Nhập vào năm...">
                    </div>
                    <button type="button" id="btnRevenue" class="btn btn-primary mb-2">Thống kê</button>
                </form>
            </div>
            <div class="block-content block-content-full">
                <div class="table-responsive" id="tableContent">
                    <table class="table table-bordered table-striped table-vcenter" id="table-brand">
                        <thead>
                            <tr>
                                <th class="orderby">Tháng</th>
                                <th class="orderby">Quý</th>
                                <th class="orderby">Năm</th>
                                <th class="d-none d-sm-table-cell orderby">Tiền bán sản phẩm
                                </th>
                                <th class="d-none d-sm-table-cell orderby">Tiền mua sản phẩm</th>
                                <th class="d-none d-sm-table-cell orderby">Tiền lương
                                </th>
                                <th class="d-none d-sm-table-cell orderby">Lợi nhuận
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($revenue as $item)
                            <tr>
                                <td class="d-none d-sm-table-cell">
                                    {{$item->reve_month}}
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    {{$item->reve_quarter}}
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    {{$item->reve_year}}
                                </td>
                                <td class="text-right d-none d-sm-table-cell">
                                    {{number_format($item->reve_sale,0,',','.')}} VNĐ
                                </td>
                                <td class="text-right d-none d-sm-table-cell">
                                    {{number_format($item->reve_buy,0,',','.')}} VNĐ
                                </td>
                                <td class="text-right d-none d-sm-table-cell">
                                    {{number_format($item->reve_salary,0,',','.')}} VNĐ
                                </td>
                                <td class="text-right d-none d-sm-table-cell">
                                    {{number_format($item->reve_income,0,',','.')}} VNĐ
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <td class="text-center" colspan="3">Tổng cộng</td>
                            <td class="text-right">{{number_format($sum_sale,0,',','.')}} VNĐ</td>
                            <td class="text-right">{{number_format($sum_buy,0,',','.')}} VNĐ</td>
                            <td class="text-right">{{number_format($sum_salary,0,',','.')}} VNĐ</td>
                            <td class="text-right">{{number_format($sum_income,0,',','.')}} VNĐ</td>
                        </tfoot>
                    </table>
                </div>
                <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->

            </div>
        </div>
        <!-- END Dynamic Table with Export Buttons -->
    </div>
    <!-- END Page Content -->

</main>
@endsection
@section('popup')

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

</script>
<script>
$(document).ready(function() {
    $('#selectType').change(function(){
        var type = $('#selectType').val();
        if(type == 0 || type == 3){
            $('#inputYear').val('');
            $('#inputYear').prop("disabled", true);
        }
        else{
            $('#inputYear').prop("disabled", false);
        }
    });

    $('#btnRevenue').click(function(){
        
        var type = $('#selectType').val();
        var year = $('#inputYear').val();

        if(type == 0){
            var url = '{{asset('admin/statistics/revenue/all')}}/';
        }
        else if(type == 1){
            var url = '{{asset('admin/statistics/revenue/month')}}/';
            if(year == ''){
                return;
            }
        }
        else if(type == 2){
            var url = '{{asset('admin/statistics/revenue/quarter')}}/';
            if(year == ''){
                return;
            }
        }
        else if(type == 3){
            var url = '{{asset('admin/statistics/revenue/year')}}/';
        }

        $('#filterForm').attr('action', url);
        
        $('#filterForm').submit();
    })

    var table = $('#table-brand').DataTable({
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
        buttons: [{
                extend: 'copy',
                text: 'Copy',
                className: 'btn btn-sm btn-primary',
                footer: true
            },
            {
                extend: 'csv',
                text: 'Export to CSV',
                className: 'btn btn-sm btn-primary',
                footer: true,
                filename: function() {
                    var d = new Date();
                    var n = d.getTime();
                    return 'thongkedoanhthu-' + n;
                },
                title: function() {
                    return 'Thống kê doanh thu';
                },
                customize: function ( win ) {
                        $(win.document.body).find('h1').css('text-align', 'center');
                        $(win.document.body).css( 'font-size', '9px' );
                        $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'font-size', 'inherit' );
                        var footer = $('tfoot');
                }
            },
            {
                extend: 'excel',
                text: 'Export to xlsx',
                className: 'btn btn-sm btn-primary',
                footer: true,
                filename: function() {
                    var d = new Date();
                    var n = d.getTime();
                    return 'thongkedoanhthu-' + n;
                },
                title: function() {
                    return 'Thống kê doanh thu';
                },
                customize: function ( win ) {
                        $(win.document.body).find('h1').css('text-align', 'center');
                        $(win.document.body).css( 'font-size', '9px' );
                        $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'font-size', 'inherit' );
                        var footer = $('tfoot');
                }
            },
            {
                extend: 'pdf',
                text: 'Export to pdf',
                className: 'btn btn-sm btn-primary',
                footer: true,
                filename: function() {
                    var d = new Date();
                    var n = d.getTime();
                    return 'thongkedoanhthu-' + n;
                },
                title: function() {
                    return 'Thống kê doanh thu';
                },
                customize: function ( win ) {
                        $(win.document.body).find('h1').css('text-align', 'center');
                        $(win.document.body).css( 'font-size', '9px' );
                        $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'font-size', 'inherit' );
                        var footer = $('tfoot');
                }
            },
            {
                extend: 'print',
                text: 'Print',
                className: 'btn btn-sm btn-primary',
                footer: true,
                filename: function() {
                    var d = new Date();
                    var n = d.getTime();
                    return 'thongkedoanhthu-' + n;
                },
                title: function() {
                    return 'Thống kê doanh thu';
                },
                customize: function ( win ) {
                        $(win.document.body).find('h1').css('text-align', 'center');
                        $(win.document.body).css( 'font-size', '9px' );
                        $(win.document.body).find( 'table' )
                        .addClass( 'compact' )
                        .css( 'font-size', 'inherit' );
                        var footer = $('tfoot');
                }
            }
        ]
    });
    table.buttons(0, null).container().prependTo(
        table.table().container()
    );

});
</script>
<!-- Page JS Code -->
<script src="assets/js/myscript.js"></script>
@endsection