@extends('admin.layout.master')
@section('title','Lương nhân viên')
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
                    Thống kê lương <small
                        class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted"></small>
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">Thống kê</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="">Lương</a>
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
                <form action="{{asset('admin/salary')}}" id="filterForm" class="form-inline">
                    <div class="form-group mb-2">
                        <label class="mr-2">Tháng:</label>
                        <input id="inputMonth" value="{{$month}}" type="number" name="month" class="form-control" placeholder="Nhập vào tháng...">
                    </div>
                    <div class="form-group mx-sm-3 mb-2">
                        <label class="mr-2">Năm:</label>
                        <input id="inputYear" value="{{$year}}" type="number" name="year" class="form-control" placeholder="Nhập vào năm...">
                    </div>
                    <button type="button" id="btnRevenue" class="btn btn-primary mb-2">Thống kê</button>
                </form>
            </div>
            <div class="block-content block-content-full">
                <div class="table-responsive" id="tableContent">
                    <table class="table table-bordered table-striped table-vcenter" id="table-brand">
                        <thead>
                            <tr>
                                <th class="orderby">STT</th>
                                <th class="orderby">Mã nhân viên</th>
                                <th class="orderby">Tên nhân viên</th>
                                <th class="d-none d-sm-table-cell orderby">Lương cơ bản
                                </th>
                                <th class="d-none d-sm-table-cell orderby">Tiền hoa hồng</th>
                                <th class="d-none d-sm-table-cell orderby">Tổng lương
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($salary as $item)
                            <tr>
                                <td class="d-none d-sm-table-cell">
                                    {{$i}}
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    {{$item->empl_id}}
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    {{$item->empl_name}}
                                </td>
                                <td class="text-right d-none d-sm-table-cell">
                                    {{number_format($item->empl_basic_salary,0,',','.')}} VNĐ
                                </td>
                                <td class="text-right d-none d-sm-table-cell">
                                    {{number_format($item->cms_total,0,',','.')}} VNĐ
                                </td>
                                <td class="text-right d-none d-sm-table-cell">
                                    {{number_format($item->cms_total+$item->empl_basic_salary,0,',','.')}} VNĐ
                                </td>
                            </tr>
                            @php
                                $i++;
                            @endphp
                            @endforeach
                        </tbody>
                        <tfoot>
                            <td class="text-center" colspan="3">Tổng cộng</td>
                            <td class="text-right">{{number_format($sum_basic,0,',','.')}} VNĐ</td>
                            <td class="text-right">{{number_format($sum_commission,0,',','.')}} VNĐ</td>
                            <td class="text-right">{{number_format($sum_total,0,',','.')}} VNĐ</td>
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
                    return 'thongkeluongthang-{{$year}}-{{$year}}-' + n;
                },
                title: function() {
                    return 'Thống kê lương tháng {{$month}}/{{$year}}';
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
                    return 'thongkeluongthang-{{$year}}-{{$year}}-' + n;
                },
                title: function() {
                    return 'Thống kê lương tháng {{$month}}/{{$year}}';
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
                    return 'thongkeluongthang-{{$year}}-{{$year}}-' + n;
                },
                title: function() {
                    return 'Thống kê lương tháng {{$month}}/{{$year}}';
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
                    return 'thongkeluongthang-{{$year}}-{{$year}}-' + n;
                },
                title: function() {
                    return 'Thống kê lương tháng {{$month}}/{{$year}}';
                }
            }
        ]
    });
    table.buttons(0, null).container().prependTo(
        table.table().container()
    );


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

        var month = $('#inputMonth').val();
        var year = $('#inputYear').val();

        if(year == ''){
            return;
        }

        if(month == ''){
            return;
        }
        
        $('#filterForm').submit();
    })

});
</script>
<!-- Page JS Code -->
<script src="assets/js/myscript.js"></script>
@endsection