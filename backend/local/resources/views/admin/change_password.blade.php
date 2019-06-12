@extends('admin.layout.master')
@section('title','Thay đổi mật khẩu')
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
                    Thay đổi mật khẩu <small
                        class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted"></small>
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
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
        <!-- Alternative Style -->
        <div class="block">
            <div class="block-header">
                <h3 class="block-title"></h3>
            </div>
            <div class="block-content block-content-full">
                <form method="POST" id="formReset">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 col-xl-5">
                            <div class="form-group">
                                <label for="old-password">Mật khẩu cũ</label>
                                <input type="password" class="form-control form-control-alt"
                                    id="old-password" name="old_password"
                                    placeholder="Nhập mật khẩu cũ">
                            </div>
                            <div class="form-group">
                                <label for="new-password">Mật khẩu mới</label>
                                <input type="password" class="form-control" id="new-password"
                                    name="new_password" placeholder="Nhập mật khẩu mới">
                            </div>
                            <div class="form-group">
                                <label for="confirm-password">Nhập lại mật khẩu mới</label>
                                <input type="password" class="form-control" id="confirm-password"
                                    name="confirm_password" placeholder="Nhập lại mật khẩu mới">
                                <span class="d-inline" id='message'></span>
                            </div>
                            <div class="form-group">
                                <button id="btnReset" class="btn btn-danger mr-3" type="button">Thay đổi mật khẩu</button>
                                <a class="btn btn-dual" href="{{asset('admin/home')}}">Hủy</a>
                            </div>
                        </div>
                    </div>
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
        <!-- END Alternative Style -->
    </div>
    <!-- END Page Content -->
</main>
@endsection
@section('popup')
<div id="popupshow">
</div>
@endsection
@section('scriptjs')

<!-- Page JS Plugins -->
<script src="assets/js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="assets/js/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<script src="assets/js/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
<script src="assets/js/plugins/select2/js/select2.full.min.js"></script>
<script src="assets/js/plugins/jquery.maskedinput/jquery.maskedinput.min.js"></script>
<script src="assets/js/plugins/ion-rangeslider/js/ion.rangeSlider.min.js"></script>
<script src="assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="assets/js/plugins/jquery-validation/additional-methods.js"></script>

<script src="assets/js/myscript.js"></script>

<!-- Page JS Helpers (BS Datepicker + BS Colorpicker + BS Maxlength + Select2 + Masked Inputs + Ion Range Slider plugins) -->
<script>jQuery(function () { One.helpers(['datepicker', 'colorpicker', 'maxlength', 'select2', 'masked-inputs', 'rangeslider']); });</script>
<script>
    $(document).ready(function(){
        $('#new-password, #confirm-password').on('keyup', function () {
            if ($('#new-password').val() == $('#confirm-password').val()) {
                $('#message').html('Trùng khớp').css('color', 'green');
            } 
            else 
                $('#message').html('Không trùng khớp').css('color', 'red');
        });
        $('#btnReset').click(function(){
            $form = $('#formReset');
            if($form.valid()){
                if ($('#new-password').val() == $('#confirm-password').val()) {
                    $form.submit();
                }
                else{
                    swal("Thông báo", "Mật khẩu mới và mật khẩu xác nhận không giống nhau", "error");
                }
            }
        });
        
        @if (Session::has('error'))
            notifyDanger('error: ','{{Session::get('error')}}');
        @endif
        
        @if (Session::has('success'))
            notifySuccess('success: ','{{Session::get('success')}}');
        @endif
    });
</script>
@endsection