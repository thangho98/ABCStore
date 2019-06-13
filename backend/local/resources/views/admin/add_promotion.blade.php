@extends('admin.layout.master')
@section('title','Thêm khuyến mãi')
@section('add_css_and_script')
<!-- Page JS Plugins CSS -->
<!-- Page JS Plugins CSS -->
<link rel="stylesheet" href="{{asset('public/admin')}}/assets/js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css">
<link rel="stylesheet" href="{{asset('public/admin')}}/assets/js/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
<link rel="stylesheet" href="{{asset('public/admin')}}/assets/js/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="{{asset('public/admin')}}/assets/js/plugins/ion-rangeslider/css/ion.rangeSlider.css">
<link rel="stylesheet" href="{{asset('public/admin')}}/assets/css/mystyle.css">

<link rel="stylesheet" href="{{asset('public/admin')}}/assets/css/mystyle.css">
@endsection

@section('main')
<main id="main-container">
    <!-- Hero -->
    <div class="bg-body-light">
        <div class="content content-full">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <h1 class="flex-sm-fill h3 my-2">
                    Thêm hóa khuyến mãi <small
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
        <!-- Form Wizards (.js-wizard-* classes are initialized in js/pages/be_forms_wizard.min.js which was auto compiled from _es6/pages/be_forms_wizard.js) -->
        <!-- For more examples you can check out https://github.com/VinceG/twitter-bootstrap-wizard -->
        <div class="block">
            <div class="block-header">
            </div>
            <div class="block-content">
                <div class="row">
                    <div class="col-md-12">
                        <form id="FormAdd" action="{{asset('admin/promotion/add')}}" method="POST">
                            <div class="form-group">
                                <label>Tên Khuyến mãi <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="inputName" name="name" placeholder="Nhập tên khuyến mãi"
                                    required>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Ngày bắt đầu <span class="text-danger">*</span></label>
                                    <input type="text" class="js-datepicker form-control" id="inputStartDate" name="start_date"
                                        data-week-start="1" data-autoclose="true" data-today-highlight="true"
                                        data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Ngày kết thúc <span class="text-danger">*</span></label>
                                    <input type="text" class="js-datepicker form-control" id="inputEndDate" name="end_date"
                                        data-week-start="1" data-autoclose="true" data-today-highlight="true"
                                        data-date-format="dd-mm-yyyy" placeholder="dd-mm-yyyy" required>
                                </div>
                            </div>
                            {{ csrf_field() }}
                        </form>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-4">
                        <div class="form-group">
                            <select class="js-select2 form-control" id="select-product" name="example-select2" style="width: 100%;" data-placeholder="Chọn một sản phấm..">
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
                <div class="row">
                    <div class="block-header">
                        <h3 class="block-title">Danh sách các sản phẩm khuyến mãi</h3>
                    </div>
                    <div class="block-content">
                        <table class="table table-bordered table-vcenter">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 150px;">Mã Phiên bản</th>
                                    <th style="width: 200px;">Tên sản phẩm</th>
                                    <th>Phiên bản</th>
                                    <th class="d-none d-sm-table-cell text-center">Hệ số(%)</th>
                                    <th style="width: 150px;">Giá gốc</th>
                                    <th style="width: 160px;">Giá khuyến mãi</th>
                                    <th class="text-center" style="width: 120px;">Thao tác
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="content-items">
                                @foreach ($content as $item)
                                <tr>
                                    <th class="text-center">
                                        {{$item->id}}
                                    </th>
                                    <td class="font-w600 font-size-sm">{{$item->name}}</td>
                                    <td class="font-w600 font-size-sm">Màu:
                                        {{$item->attributes['propt_color']}}, Ram:
                                        {{$item->attributes['propt_ram']}} gb, Rom:
                                        {{$item->attributes['propt_rom']}}</td>
                                    <td class="d-none d-table-cell">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input id="input${product.id}"
                                                    class="form-control text-center" type="number" min="0" max="100" onchange="updateItem(this.value,'{{$item->id}}')"
                                                    required min="1" value="{{$item->quantity}}">
                                                <div class="input-group-append">
                                                    <span class="input-group-text">
                                                        %
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{number_format($item->price,0,',','.')}} VNĐ</td>
                                    <td>{{number_format($item->price - $item->price*($item->quantity/100),0,',','.')}} VNĐ</td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <button type="button"
                                                class="btn btn-sm btn-danger deleteproduct" onclick="deleteCart({{$item->id}})"
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
                <div class="tile-footer-3">
                    <aside class="px-3">
                        <button class="btn btn-primary" type="button" id="submitAddPromotion">Thêm</button>
                        <button class="btn btn-danger" type="button" id="cancelAddPromotion">Hủy</button>
                    </aside>
                <div>
                </div>
        </div>
    </div>
    <!-- END Page Content -->

</main>
@endsection
@section('scriptjs')

<!-- Page JS Plugins -->
<script src="{{asset('public/admin')}}/assets/js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="{{asset('public/admin')}}/assets/js/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<script src="{{asset('public/admin')}}/assets/js/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
<script src="{{asset('public/admin')}}/assets/js/plugins/select2/js/select2.full.min.js"></script>
<script src="{{asset('public/admin')}}/assets/js/plugins/jquery.maskedinput/jquery.maskedinput.min.js"></script>
<script src="{{asset('public/admin')}}/assets/js/plugins/ion-rangeslider/js/ion.rangeSlider.min.js"></script>
<script src="{{asset('public/admin')}}/assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="{{asset('public/admin')}}/assets/js/plugins/jquery-validation/additional-methods.js"></script>


<!-- Page JS Helpers (BS Datepicker + BS Colorpicker + BS Maxlength + Select2 + Masked Inputs + Ion Range Slider plugins) -->
<script>jQuery(function () { One.helpers(['datepicker', 'colorpicker', 'maxlength', 'select2', 'masked-inputs', 'rangeslider']); });</script>
<!-- Page JS Code -->
<script src="{{asset('public/admin')}}/assets/js/myscript.js"></script>
<script>
$(document).ready(function() {

    $('#select-product').change(function() {
        var id = $('#select-product').val();

        // URL
        var url = "{{asset('admin/orders/options')}}/" + id;

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
            url: "{{asset('admin/promotion/item/add')}}",
            type: "get",
            data: data,
            success: function (result) {
                getItemsContent();
            },
            error: function (result) {
                swal("Bị lỗi", "Sản phẩm này đã có rồi", "error");
            }
        });
    });

    $('#cancelAddPromotion').click(function(){
        swal({
			title: "Bạn có muốn hủy?",
			text: "Sau khi hủy, bạn sẽ không thể khôi phục đối tượng này!",
			icon: "warning",
			buttons: ["Không, hủy nó đi!", "Vâng, tôi chấp nhận!"],
			dangerMode: true,
		}).then((willDelete) => {
			if (willDelete) {
                swal("Đã thoát!", "Đối tượng đã được xóa.", "success")
                .then((value) => {
                    window.location.href = '{{asset('admin/promotion/cancel')}}';
                });
                            }
			else {
				swal("Đã hủy", "Đối tượng vẫn được giữ lại :)", "error");
			}
		});
    });
    $('#submitAddPromotion').click(function(){
        $form = $('#FormAdd');

        if($form.valid()){
            let startDate = toDate($('#inputStartDate').val());
            let endDate = toDate($('#inputEndDate').val());

            console.log(startDate);
            console.log(endDate);
            if(startDate <= new Date()){
                swal("Thông báo", "Ngày bắt đầu phải lớn hơn ngày hiện tại", "error");
            }
            else if(startDate < endDate){
                $form.submit();
            }
            else{
                swal("Thông báo", "Ngày bắt đầu không được lớn hơn hoặc bằng ngày kết thúc", "error");
            }
        }
        else{
            swal("Thông báo", "Vui lòng nhập thông tin đầy đủ", "error");
        }
    });
});

    function toDate(dateStr) {
        var parts = dateStr.split("-")
        return new Date(parts[2], parts[1] - 1, parts[0])
    }

    function deleteCart(id) {
        if(id == null) return;
        var url = "{{asset('admin/promotion/item/delete')}}";

        // Data
        var data = {
            id: id
        };

        // Success Function
        var success = function(result) {
            //console.log(result);
            getItemsContent();
        };

        // Send Ajax
        $.get(url, data, success);
    }

    function updateItem(qty, id){
		$.get(
			"{{asset('admin/promotion/item/update')}}",
			{qty:qty, id:id},
			function(){
				getItemsContent();
			}
		);
	}

    function getItemsContent() {
        var url = "{{asset('admin/promotion/items')}}";

        // Data
        var data = {};

        // Success Function
        var success = function(result) {
            $('#content-items').empty();
            $('#content-items').append(result);
        };

         // Result Type
         var dataType = 'text';

        // Send Ajax
        $.get(url, data, success, dataType);
    }
</script>
@endsection