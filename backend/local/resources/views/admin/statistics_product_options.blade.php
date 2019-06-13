@extends('admin.layout.master')
@section('title','Sản phẩm bán ra')
@section('add_css_and_script')
<link rel="stylesheet" href="{{asset('public/admin')}}/assets/js/plugins/datatables/dataTables.bootstrap4.css">
<link rel="stylesheet" href="{{asset('public/admin')}}/assets/js/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.css">

<link rel="stylesheet" href="{{asset('public/admin')}}/assets/css/mystyle.css">
@endsection

@section('main')
<main id="main-container">
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                    Thống kê sản phẩm bán ra <small
                        class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted"></small>
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">Thống kê</li>
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
            <div class="block-header row justify-content-end">
                <form action="{{asset('admin/statistics/product')}}" id="filterForm" method="get" class="form-inline">
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
                        <label class="mr-2">Tháng:</label>
                        <input id="inputMonth" @if ($selectType != 1)
                        disabled
                        @else
                            value="{{$month}}"
                        @endif type="number" name="month" min="1" max="12" class="form-control">
                    </div>
                    <div class="form-group mx-sm-3 mb-2">
                        <label class="mr-2">Quý:</label>
                        <input id="inputQuarter" @if ($selectType != 2)
                        disabled
                        @else
                            value="{{$quarter}}"
                    @endif type="number" name="quarter" min="1" max="4" class="form-control">
                    </div>
                    <div class="form-group mx-sm-3 mb-2">
                        <label class="mr-2">Năm:</label>
                        <input id="inputYear" @if ($selectType == 0)
                        disabled
                        @else
                            value="{{$year}}"
                    @endif type="number" name="year" class="form-control">
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
                                <th class="orderby">Mã SP</th>
                                <th class="orderby">Tên SP</th>
                                <th class="d-none d-sm-table-cell orderby">Số lượng bán ra
                                </th>
                                <th class="d-none d-sm-table-cell orderby">Tiền bán</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($product_statistics as $item)
                            <tr>
                                <td class="d-none d-sm-table-cell">
                                    {{$i}}
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    {{$item->prod_id}}
                                </td>
                                <td class="d-none d-sm-table-cell">
                                    {{$item->prod_name}}
                                </td>
                                <td class="text-right d-none d-sm-table-cell">
                                    {{$item->quantity}}
                                </td>
                                <td class="text-right d-none d-sm-table-cell">
                                    {{number_format($item->price,0,',','.')}} VNĐ
                                </td>
                            </tr>
                            @php
                                $i++;
                            @endphp
                            @endforeach
                        </tbody>
                        <tfoot>
                            <td class="text-center" colspan="3">Tổng cộng</td>
                            <td class="text-right">@if (!empty($sum_quantity))
                                {{$sum_quantity}}
                            @endif</td>
                            <td class="text-right">@if (!empty($sum_price))
                                {{number_format($sum_price,0,',','.')}} VNĐ
                            @endif</td>
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

</script>
<script>
$(document).ready(function() {
    $('#selectType').change(function(){
        var type = $('#selectType').val();

        switch (type) {
            case '0':
                $('#inputMonth').val('');
                $('#inputMonth').prop("disabled", true);
                $('#inputQuarter').val('');
                $('#inputQuarter').prop("disabled", true);
                $('#inputYear').val('');
                $('#inputYear').prop("disabled", true);
                break;
            case '1':
                $('#inputMonth').prop("disabled", false);
                $('#inputQuarter').val('');
                $('#inputQuarter').prop("disabled", true);
                $('#inputYear').prop("disabled", false);
                break;
            case '2':
                $('#inputMonth').val('');
                $('#inputMonth').prop("disabled", true);
                $('#inputQuarter').prop("disabled", false);
                $('#inputYear').prop("disabled", false);
                break;
            case '3':
                $('#inputMonth').val('');
                $('#inputMonth').prop("disabled", true);
                $('#inputQuarter').val('');
                $('#inputQuarter').prop("disabled", true);
                $('#inputYear').prop("disabled", false);
                break;
        }
    });

    $('#btnRevenue').click(function(){
        
        var type = $('#selectType').val();
        var month = $('#inputMonth').val();
        var quarter = $('#inputQuarter').val();
        var year = $('#inputYear').val();

        if(type == 1){ 
            if(year == ''){
                return;
            }
            if(month == ''){
                return;
            }
        }
        else if(type == 2){
            if(year == ''){
                return;
            }
            if(quarter == ''){
                return;
            }
        }
        else if(type == 3){
            if(year == ''){
                return;
            }
        }
        
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
@endsection