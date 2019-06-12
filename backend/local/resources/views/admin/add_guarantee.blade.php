@extends('admin.layout.master')
@section('title','Thanh toán đơn hàng')
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
                    Thêm bảo hành mới <small
                        class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted"></small>
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">Bảo hành</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="">Thêm bảo hành</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- END Hero -->

    <!-- Page Content -->
    <div class="content">
        <div class="block">
            <div class="block-header">
            </div>
            <div class="block-content block-content-full">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{asset('admin/guarantee/add')}}" id="add-form" method="POST">
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label>Hóa đơn <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="inputOrder" name="order_id"
                                        placeholder="Nhập mã hóa đơn" required>
                                </div>
                                <div class="form-group col-md-4">
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
                                <div class="form-group col-md-4">
                                    <label>Sản phẩm <span class="text-danger">*</span></label>
                                    <select id="select-options" class="form-control" name="propt_id"
                                        style="width: 100%;">
                                        <option value="" disabled selected hidden>Chọn một phiên bản
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="button" class="btn btn-primary">Kiểm tra</button>
                            </div>
                            <div class="content-check-orders">
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label>Tên khách hàng <span class="text-danger">*</span></label>
                                        <input type="text" readonly class="form-control" id="inputSerial">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Số điện thoại <span class="text-danger">*</span></label>
                                        <input type="text" readonly class="form-control" id="inputSerial">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Ngày mua<span class="text-danger">*</span></label>
                                        <input type="text" readonly class="form-control" id="inputSerial">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label>Thời lượng bảo hành <span class="text-danger">*</span></label>
                                        <input type="text" readonly class="form-control" id="inputSerial">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Ngày hết hạn bảo hành <span class="text-danger">*</span></label>
                                        <input type="text" readonly class="form-control" id="inputSerial">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="">
                                <button class="btn btn-primary" type="button" id="submitAdd">Thêm</button>
                                <button class="btn btn-danger" type="button" id="cancelAdd">Hủy</button>
                            </div>
                            {{ csrf_field() }}
                        </form>
                    </div>
                </div>
            </div>
        </div>
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
<script src="assets/js/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
<script src="assets/js/plugins/select2/js/select2.full.min.js"></script>
<script src="assets/js/plugins/jquery.maskedinput/jquery.maskedinput.min.js"></script>
<script src="assets/js/plugins/ion-rangeslider/js/ion.rangeSlider.min.js"></script>

<!-- Page JS Helpers (BS Datepicker + BS Colorpicker + BS Maxlength + Select2 + Masked Inputs + Ion Range Slider plugins) -->
<script>
    jQuery(function () {
        One.helpers(['maxlength', 'select2', 'masked-inputs', 'rangeslider']);
    });
</script>
<!-- Page JS Code -->
<script>
    $(document).ready(function () {
        
    });
</script>
@endsection