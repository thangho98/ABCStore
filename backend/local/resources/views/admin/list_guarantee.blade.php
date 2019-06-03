@extends('admin.layout.master')
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
@endsection

@section('main')
<main id="main-container">
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                    Danh sách Bảo hành <small
                        class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted"></small>
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="">Bảo hành</a>
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
                            <th class="text-center orderby" style="width: 180px;">Mã Bảo hành</th>
                            <th class="text-center orderby" style="width: 150px;">Mã Hóa đơn</th>
                            <th class="text-center orderby" style="width: 200px;">Sản phẩm</th>
                            <th class="text-center orderby">Ngày nhận</th>
                            <th class="text-center orderby">Ngày trả</th>
                            <th class="text-center orderby" style="width: 15%;"> Trạng thái </th>
                            <th style="width: 120px;" class="text-center orderby remove-sorting">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list_guar as $item)
                        <tr>
                            <td class="text-center font-size-sm">
                                {{$item->gtd_id}}
                            </td>
                            <td class="font-w600 font-size-sm">
                                {{$item->gtd_orders}}
                            </td>
                            <td class="d-none d-sm-table-cell text-center">
                                {{$item->prod_name}} ram {{$item->propt_ram}} gb, rom {{$item->propt_rom}}, màu
                                {{$item->propt_color}}
                            </td>
                            <td class="d-none d-sm-table-cell">
                                {{$item->gtd_date_receive}}
                            </td>
                            <td class="d-none d-sm-table-cell">
                                {{$item->gtd_date_reimburse}}
                            </td>
                            <td class="text-center d-sm-table-cell">
                                @if ($item->gtd_status == 0)
                                <span class="badge badge-info"> Đang chờ đi bảo hành
                                    @elseif ($item->gtd_status == 1)
                                    <span class="badge badge-warning"> Đang bảo hành
                                        @elseif ($item->gtd_status == 2)
                                        <span class="badge badge-primary"> Đã xong
                                            @else <span class="badge badge-success"> Đã trả sản phẩm
                                                @endif </span>
                            </td>
                            <td class="text-right">
                                <div class="py-2 mb-2">
                                    <button type="button" class="btn btn-sm btn-info" title="Xem chi tiết"
                                        data-toggle="tooltip" onclick="showDetail({{$item->gtd_id}})">
                                        <i class="fa fa-fw fa-eye"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-warning" data-toggle="tooltip"
                                        onclick="showEdit({{$item->gtd_id}})" title="Cập nhập" @if ($item->gtd_status == 3)
                                            disabled
                                        @endif>
                                        <i class="fa fa-fw fa-pencil-alt"></i>
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
    <div id="popupshow">
        <div class="popup-form hidden scrollbar" id="popup-form-add">
            <form action="{{asset('admin/guarantee/add')}}" id="add-form" method="POST">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Mã Hóa đơn <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="inputOrder" name="order_id"
                            placeholder="Nhập mã hóa đơn" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Sản phẩm <span class="text-danger">*</span></label>
                        <select class="js-select2 form-control" id="select-product" style="width: 100%;"
                            data-placeholder="Chọn một sản phẩm..">
                            <option></option>
                            <!-- Required for data-placeholder attribute to work with Select2 plugin -->
                            @foreach ($list_prod as $item)
                            <option value="{{$item->prod_id}}">{{$item->prod_name}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Phiên bản <span class="text-danger">*</span></label>
                        <select id="select-options" class="form-control" name="propt_id" style="width: 100%;">
                            <option value="" disabled selected hidden>Chọn một phiên bản
                            </option>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Số serial <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="inputSerial" name="serial">
                    </div>
                </div>
                <div class="form-group d-flex justify-content-end align-items-end">
                    <button type="button" id="btnCheckOrder" class="btn btn-primary">Kiểm tra</button>
                </div>
                <div class="options mb-3">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>Tên khách hàng <span class="text-danger">*</span></label>
                            <input type="text" readonly class="form-control" id="inputCusName">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Số điện thoại <span class="text-danger">*</span></label>
                            <input type="text" readonly class="form-control" id="inputCusPhone">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Ngày mua<span class="text-danger">*</span></label>
                            <input type="text" readonly class="form-control" id="inputDateOrder">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>Thời lượng bảo hành <span class="text-danger">*</span></label>
                            <input type="text" readonly class="form-control" id="inputTimeWarrantyProd">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Ngày hết hạn bảo hành <span class="text-danger">*</span></label>
                            <input type="text" readonly class="form-control" id="inputEndWarrantyProd">
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <h3>Trạng thái: <small id="statusCheck"></small></h3> 
                    </div>
                </div>
                <div class="form-group">
                        <label>Thông tin yêu cầu bảo hành <span class="text-danger">*</span></label>
                    <textarea class="js-maxlength form-control" disabled id="textareaRequiredContent" name="required_content" rows="5" maxlength="255" placeholder="Nhập thông tin yêu cầu bảo hành" data-always-show="true" required></textarea>
                </div>
                <div class="tile-footer-1">
                    <button class="btn btn-primary" disabled type="button" id="submitAddGuarantee">Thêm</button>
                    <button class="btn btn-danger" type="button" id="cancelAdd">Hủy</button>
                </div>
                {{ csrf_field() }}
            </form>
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
                        return 'danhsachsanpham-' + n;
                    },
                    title: function () {
                        return 'Danh sách Sản phẩm';
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
                        return 'danhsachsanpham-' + n;
                    },
                    title: function () {
                        return 'Danh sách Sản phẩm';
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
                        return 'danhsachsanpham-' + n;
                    },
                    title: function () {
                        return 'Danh sách Sản phẩm';
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

        $('#select-product').change(function () {
            var id = $('#select-product').val();

            // URL
            var url = "{{asset('admin/orders/options')}}/" + id;

            // Data
            var data = {};

            // Success Function
            var success = function (result) {
                //console.log(result);
                $('#select-options').empty();
                var html = `<option value="" disabled selected hidden>Chọn một phiên bản</option> \n`;
                $.each(result, function (key, item) {
                    html +=
                        `<option value="${item['propt_id']}"> Màu: ${item['propt_color']}, Ram: ${item['propt_ram']} gb, Rom: ${item['propt_rom']}</option> \n`;
                });
                $('#select-options').append(html);
            };

            // Result Type
            var dataType = 'json';

            // Send Ajax
            $.get(url, data, success, dataType);
        });

        $("#btnCheckOrder").click(function(){

            $("#statusCheck").text('');

            var order_id = $('#inputOrder').val();
            var gtd_serial = $('#inputSerial').val();
            var option_id = $('#select-options').val();

            // URL
            console.log(option_id);
            console.log(order_id);
            if(option_id == null || gtd_serial == '' || order_id == '') {
                swal("Bị lỗi", "Bạn chưa nhập đầy đủ thông tin", "error");
                return;
            }

            // URL
            var url = "{{asset('admin/guarantee/check')}}";

            // Data
            var data = {
                order_id : order_id,
                propt_id : option_id,
                gtd_serial : gtd_serial,
            };

            // Success Function
            var success = function (result) {
                console.log(result);
                var order = result['order'];
                var status = result['status'];

                $("#statusCheck").text(status['message']);


                if(status['result'] == false){
                    $("#statusCheck").css('color', 'red');
                }
                else{
                    $("#statusCheck").css('color', 'blue');
                    $('#textareaRequiredContent').removeAttr('disabled');
                    $('#submitAddGuarantee').removeAttr('disabled');
                }
                
                if(order != null){
                    $("#inputCusName").val(order['cus_name']);
                    $("#inputCusPhone").val(order['cus_phone']);
                    $("#inputDateOrder").val(order['order_date']);
                    $("#inputTimeWarrantyProd").val(order['prod_warranty_period']);
                    $("#inputEndWarrantyProd").val(result['date_end_warranty']);
                }
            };

            // Result Type
            var dataType = 'json';

            // Send Ajax
            $.get(url, data, success, dataType);
        });
        $("#cancelAdd").click(function(){
            $('#textareaRequiredContent').prop("disabled", true);
            $('#submitAddGuarantee').prop("disabled", true);
            $("#statusCheck").text('');
            $("#inputCusName").val('');
            $("#inputCusPhone").val('');
            $("#inputDateOrder").val('');
            $("#inputTimeWarrantyProd").val('');
            $("#inputEndWarrantyProd").val('');
        });
        $('#submitAddGuarantee').on('click', function () {
		$form = $('#add-form');

		$form.submit();

		if ($form.valid()) {

			var datas = new FormData($form[0]);

			$.ajax({
				url: $form.attr('action'),
				enctype: 'multipart/form-data',
				processData: false,
				contentType: false,
				cache: false,
				type: $form.attr('method'),
				data: datas,
				success: function (data) {
					swal("Đã thêm!", "Đối tượng đã được thêm.", "success")
						.then((value) => {
							console.log('Submission was successful.');
							location.reload();
						});
				},
				error: function (data) {
					swal("Bị lỗi", "Đối tượng này đã bị lỗi :)", "error");
					console.log('An error occurred.');
				}
			});
		}
		else {
			swal("Lỗi", "Bạn điền Form chưa đầy đủ :(", "error");
		}
	});
});
</script>
<script>
    function showDetail(gtd_id) {
        // URL có kèm tham số number
        var url = '{{asset('admin/guarantee/view')}}/' + gtd_id;

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

    function showEdit(gtd_id) {
        // URL có kèm tham số number
        var url = '{{asset('admin/guarantee/edit')}}/' + gtd_id;

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
<!-- Page JS Code -->
<script src="assets/js/myscript.js"></script>
@endsection