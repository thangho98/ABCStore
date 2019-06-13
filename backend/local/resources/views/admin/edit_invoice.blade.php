@extends('admin.layout.master')
@section('title','Sửa hóa đơn nhập hàng')
@section('add_css_and_script')
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
                    Thêm hóa đơn nhập hàng mới <small
                        class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted"></small>
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">Nhập hàng</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="">Thêm mới</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content">
        <!-- Form Wizards (.js-wizard-* classes are initialized in js/pages/be_forms_wizard.min.js which was auto compiled from _es6/pages/be_forms_wizard.js) -->
        <!-- For more examples you can check out https://github.com/VinceG/twitter-bootstrap-wizard -->

        <!-- Validation Wizards -->
        <div class="row">
            <div class="col-md-12">
                <!-- Validation Wizard -->
                <div class="js-wizard-validation block block">
                    <!-- Step Tabs -->
                    <ul class="nav nav-tabs nav-tabs-block nav-justified" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="#wizard-validation-step1" data-toggle="tab">1.
                                Chi tiết đơn hàng</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#wizard-validation-step2" data-toggle="tab">2. Thông tin đơn hàng
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#wizard-validation-step3" data-toggle="tab">3. Thông tin
                                hóa đơn</a>
                        </li>
                    </ul>
                    <!-- END Step Tabs -->

                    <!-- Form -->
                    <form class="js-wizard-validation-form" method="POST">
                        <!-- Steps Content -->
                        <div class="block-content block-content-full tab-content px-md-5" style="min-height: 300px;">
                            <!-- Step 1 -->
                            <div class="tab-pane active" id="wizard-validation-step1" role="tabpanel">
                                <div class="col-md-12">
                                    <div class="block">
                                        <div class="block-header">
                                        </div>
                                        <div class="block-content">
                                            <div class="row">
                                                <div class="col-4">
                                                    <div class="form-group">
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
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <select id="select-options" class="form-control" name="propt_id"
                                                            style="width: 100%;">
                                                            <option value="" disabled selected hidden>Chọn một phiên bản
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <button class="btn btn-primary" type="button" id="add-product">Thêm
                                                        sản phẩm</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <!-- Table Head Dark -->
                                    <div class="block">
                                        <div class="block-header">
                                            <h3 class="block-title">Danh sách sản phẩm</h3>
                                        </div>
                                        <div class="block-content">
                                            <table class="table table-vcenter">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th class="text-center" style="width: 100px;">Mã SP</th>
                                                        <th>Tên sản phẩm</th>
                                                        <th style="width: 250px;">Phiên bản</th>
                                                        <th class="d-none d-sm-table-cell text-center"
                                                            style="width: 150px;">Số lượng</th>
                                                        <th class="text-center">Giá</th>
                                                        <th class="text-center" style="width: 120px;">Thao tác
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($content as $item)
                                                    <tr>
                                                        <th class="text-center" scope="row">
                                                            {{$item['id']}}
                                                        </th>
                                                        <td class="font-w600 font-size-sm">{{$item['name']}}</td>
                                                        <td class="font-w600 font-size-sm">Màu:
                                                            {{$item['attributes']['propt_color']}}, Ram:
                                                            {{$item['attributes']['propt_ram']}} gb, Rom:
                                                            {{$item['attributes']['propt_rom']}}</td>
                                                        <td class="d-none d-table-cell">
                                                            <div class="form-group">
                                                                <input id="inputQty${product.id}"
                                                                    class="form-control text-center" type="number" onchange="updateQtyItem(this.value,'{{$item['id']}}');"
                                                                    required min="1" value="{{$item['quantity']}}">
                                                            </div>
                                                        </td>
                                                        <td class="d-none d-table-cell">
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                    <input type="number" class="form-control text-center"
                                                                        id="inputQty" name="price" min="0"
                                                                        placeholder=".." value="{{$item['price']}}" onchange="updatePriceItem(this.value,'{{$item['id']}}');">
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text">VNĐ</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="text-center">
                                                            <div class="btn-group">
                                                                <button type="button"
                                                                    class="btn btn-sm btn-danger deleteproduct" onclick="deleteItem({{$item['id']}})"
                                                                    data-toggle="tooltip" title="Xóa sản phẩm">
                                                                    <i class="fa fa-fw fa-times"></i>
                                                                </button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- END Table Head Dark -->
                                </div>
                            </div>
                            <!-- END Step 1 -->

                            <!-- Step 2 -->
                            <div class="tab-pane" id="wizard-validation-step2" role="tabpanel">
                                <div class="form-row">
                                    <div class="form-group col-6">
                                        <label for="wizard-validation-name">Mã hóa đơn</label>
                                        <input class="form-control" type="text" id="invo_code"
                                            name="invo_code" disabled value="{{$invo->invo_code}}" required>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="wizard-validation-phone">Ngày nhập</label>
                                        <input type="text" class="js-datepicker form-control" value="{{date_format(date_create($invo->invo_date),"d-m-Y")}}"
                                        id="invo_date" disabled name="invo_date" required data-week-start="1" data-autoclose="true" data-today-highlight="true" data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-6">
                                        <label for="wizard-validation-email">Nhà cung cấp</label>
                                        <select disabled class="js-select2 form-control" id="invo_prov" style="width: 100%;"
                                            data-placeholder="Chọn một nhà cung cấp.." required name="invo_prov">
                                            {{-- <option></option> --}}
                                            <!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                            @foreach ($list_provider as $item)
                                            <option @if ($invo->invo_prod == $item->prov_id)
                                                selected
                                            @endif value="{{$item->prov_id}}">{{$item->prov_name}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- END Step 2 -->

                            <!-- Step 3 -->
                            <div class="tab-pane" id="wizard-validation-step3" role="tabpanel">
                                <div class="col-12 row m-4">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="your-order">
                                            <h3>Thông tin giỏ hàng</h3>
                                            <div class="your-order-table table-responsive">
                                                <table>
                                                    <thead>
                                                        <tr>
                                                            <th class="product-name">Sản phẩm</th>
                                                            <th class="product-total">giá</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($content as $item)
                                                            <tr class="cart_item">
                                                                <td class="product-name">
                                                                        {{$item['name']}} {{$item['attributes']['propt_ram']}} gb {{$item['attributes']['propt_rom']}} {{$item['attributes']['propt_color']}} 
                                                                    <span class="product-quantity"> × {{$item['quantity']}}</span>
                                                                </td>
                                                                <td class="product-total">
                                                                    <span class="amount">{{number_format($item['price']*$item['quantity'],0,',','.')}} VNĐ</span>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                    <tfoot>
                                                        <tr class="order-total">
                                                            <th>Tổng tiền hóa đơn</th>
                                                            <td><span class=" total amount">{{number_format($total,0,',','.')}} VNĐ</span>
                                                            </td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox custom-control-primary">
                                            <input type="checkbox" class="custom-control-input" id="wizard-validation-terms" name="wizard-validation-terms">
                                        <label class="custom-control-label" for="wizard-validation-terms">Đồng
                                            ý với các điều khoản</label>
                                    </div>
                                </div>
                            </div>
                            <!-- END Step 3 -->
                        </div>
                        <!-- END Steps Content -->

                        <!-- Steps Navigation -->
                        <div class="block-content block-content-sm block-content-full bg-body-light rounded-bottom">
                            <div class="row">
                                <div class="col-4">
                                    <button type="button" class="btn btn-secondary" data-wizard="prev">
                                        <i class="fa fa-angle-left mr-1"></i> Trước
                                    </button>
                                </div>
                                <div class="col-4 text-center">
                                    <button type="button" id="cancelAddOrders" class="btn btn-danger">
                                        <i class="fa fa-times-circle"></i></i> Hủy
                                    </button>
                                </div>
                                <div class="col-4 text-right">
                                    <button id="btnNext" type="button" class="btn btn-secondary" data-wizard="next">
                                        Sau <i class="fa fa-angle-right ml-1"></i>
                                    </button>
                                    <button type="submit" class="btn btn-primary d-none" data-wizard="finish">
                                        <i class="fa fa-check mr-1"></i> Hoàn tất
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- END Steps Navigation -->
                        {{ csrf_field() }}
                    </form>
                    <!-- END Form -->
                </div>
                <!-- END Validation Wizard Classic -->
            </div>
        </div>
        <!-- END Validation Wizards -->
    </div>
    <!-- END Page Content -->

</main>
@endsection
@section('scriptjs')

<script src="assets/js/plugins/jquery-bootstrap-wizard/bs4/jquery.bootstrap.wizard.min.js"></script>
<script src="assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="assets/js/plugins/jquery-validation/additional-methods.js"></script>

<!-- Page JS Code -->
<script src="assets/js/pages/be_forms_wizard.min.js"></script>

<!-- Page JS Plugins -->
<script src="assets/js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="assets/js/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
<script src="assets/js/plugins/select2/js/select2.full.min.js"></script>
<script src="assets/js/plugins/jquery.maskedinput/jquery.maskedinput.min.js"></script>
<script src="assets/js/plugins/ion-rangeslider/js/ion.rangeSlider.min.js"></script>

<!-- Page JS Helpers (BS Datepicker + BS Colorpicker + BS Maxlength + Select2 + Masked Inputs + Ion Range Slider plugins) -->
<script>
jQuery(function() {
    One.helpers(['datepicker','maxlength', 'select2', 'masked-inputs', 'rangeslider']);
});
</script>
<!-- Page JS Code -->
<script>
$(document).ready(function() {

    var toltal_qty = {{$total_qty}};
    if(toltal_qty <= 0){
        $("#btnNext").attr("disabled", true);
    }
    else{
        $('#btnNext').removeAttr("disabled");
    }

    $('#select-product').change(function() {
        var id = $('#select-product').val();

        // URL
        var url = "{{asset('admin/invoice/options')}}/" + id;

        // Data
        var data = {};

        // Success Function
        var success = function(result) {
            //console.log(result);
            $('#select-options').empty();
            var html = `<option value="" disabled selected hidden>Chọn một phiên bản</option> \n`;
            $.each(result, function(key, item) {
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
    
    $('#add-product').click(function(){
        var id = $('#select-options').val();
        // URL
        console.log(id);
        if(id == null) {
            swal("Bị lỗi", "Bạn chưa chọn một phiên bản", "error");
            return;
        }

        // Data
        var data = {
            id: id
        };

        $.ajax({
            url: "{{asset('admin/invoice/item/add')}}",
            type: "get",
            data: data,
            success: function (result) {
                location.reload();
            },
            error: function (result) {
                swal("Bị lỗi", "Sản phẩm này đã có rồi", "error");
            }
        });
    });



    $('#cancelAddOrders').click(function(){
        swal({
			title: "Bạn có muốn hủy?",
			text: "Sau khi hủy, bạn sẽ không thể khôi phục đối tượng này!",
			icon: "warning",
			buttons: ["Không, hủy nó đi!", "Vâng, tôi chấp nhận!"],
			dangerMode: true,
		})
		.then((willDelete) => {
			if (willDelete) {
                swal("Đã thoát!", "Đối tượng đã được xóa.", "success")
                .then((value) => {
                    window.location.href = '{{asset('admin/invoice/cancel')}}';
                });
                            }
			else {
				swal("Đã hủy", "Đối tượng vẫn được giữ lại :)", "error");
			}
		});
    });
});

    function deleteItem(id) {
        if(id == null) return;
        var url = "{{asset('admin/invoice/item/delete')}}";

        // Data
        var data = {
            id: id
        };

        // Success Function
        var success = function(result) {
            //console.log(result);
            location.reload();
        };

        // Send Ajax
        $.get(url, data, success);
    }

    function updateQtyItem(qty, id){
		$.get(
			"{{asset('admin/invoice/item/update/qty')}}",
			{qty:qty, id:id},
			function(){
				location.reload();
			}
		);
	}

    function updatePriceItem(price, id){
		$.get(
			"{{asset('admin/invoice/item/update/price')}}",
			{price:price, id:id},
			function(){
				location.reload();
			}
		);
	}
</script>
@endsection