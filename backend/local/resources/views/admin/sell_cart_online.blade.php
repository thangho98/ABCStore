@extends('admin.layout.master')
@section('title','Thanh toán đơn hàng')
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
                    Thanh toán đơn hàng<small
                        class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted"></small>
                </h1>
                <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                    <ol class="breadcrumb breadcrumb-alt">
                        <li class="breadcrumb-item">Bán hàng</li>
                        <li class="breadcrumb-item" aria-current="page">
                            <a class="link-fx" href="">Thanh toán đơn hàng</a>
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
                            <a class="nav-link" href="#wizard-validation-step2" data-toggle="tab">2. Thông tin
                                Khách hàng
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#wizard-validation-step3" data-toggle="tab">3. Thông tin
                                hóa đơn</a>
                        </li>
                    </ul>
                    <!-- END Step Tabs -->

                    <!-- Form -->
                    <form class="js-wizard-validation-form" action="be_forms_wizard.html" method="POST">
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
                                                <div class="col-lg-6 col-xl-5">
                                                    <div class="form-group">
                                                        <select class="js-select2 form-control" id="example-select2"
                                                            name="example-select2" style="width: 100%;"
                                                            data-placeholder="Chọn một..">
                                                            <option></option>
                                                            <!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                                            <option selected="selected" data-price="1000" value="1">
                                                                Iphone 4
                                                            </option>
                                                            <option data-price="1000" value="2">Iphone 5
                                                            </option>
                                                            <option data-price="2000" value="3">Iphone 6
                                                            </option>
                                                            <option data-price="3000" value="4">Iphone 7
                                                            </option>
                                                            <option data-price="4000" value="5">Iphone 8
                                                            </option>
                                                            <option data-price="5000" value="6">Iphone 9
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-xl-5">
                                                    <button class="btn btn-primary" type="button" id="add-product">Thêm
                                                        sản
                                                        phẩm</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <!-- Table Head Dark -->
                                    <div class="block">
                                        <div class="block-header">
                                            <h3 class="block-title">Danh sách giỏ hàng</h3>
                                        </div>
                                        <div class="block-content">
                                            <table class="table table-vcenter">
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th class="text-center" style="width: 150px;">Mã sản
                                                            phẩm
                                                        </th>
                                                        <th>Tên sản phẩm</th>
                                                        <th class="d-none d-sm-table-cell text-center"
                                                            style="width: 300px;">
                                                            Số lượng</th>
                                                        <th>Giá gốc</th>
                                                        <th>Giá khuyến mãi</th>
                                                        <th class="text-center" style="width: 120px;">Thao tác
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody id="products">
                                                    <tr>
                                                        <th class="text-center" scope="row">
                                                            1
                                                        </th>
                                                        <td class="font-w600 font-size-sm">
                                                            <a href="be_pages_generic_profile.html">Iphone 4</a>
                                                        </td>
                                                        <td class="d-none d-table-cell">
                                                            <div class="form-group">
                                                                <input id="input${product.id}"
                                                                    class="form-control text-center" type="number"
                                                                    required min="1" value="1">
                                                            </div>
                                                        </td>
                                                        <td>1.000.000 VNĐ</td>
                                                        <td>800.000 VNĐ</td>
                                                        <td class="text-center">
                                                            <div class="btn-group">
                                                                <button type="button"
                                                                    class="btn btn-sm btn-danger deleteproduct"
                                                                    data-toggle="tooltip" title="Xóa sản phẩm">
                                                                    <i class="fa fa-fw fa-times"></i>
                                                                </button>
                                                            </div>
                                                        </td>
                                                    </tr>
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
                                <div class="form-group">
                                    <label for="wizard-validation-name">Họ tên</label>
                                    <input class="form-control" type="text" id="wizard-validation-name" name="cus_name">
                                </div>
                                <div class="form-group">
                                    <label for="wizard-validation-phone">SĐT</label>
                                    <input class="form-control" type="text" id="wizard-validation-phone"
                                        name="cus_phone">
                                </div>
                                <div class="form-group">
                                    <label for="wizard-validation-address">Địa chỉ</label>
                                    <input class="form-control" type="address" id="wizard-validation-address"
                                        name="cus_address">
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
                                                        <tr class="cart_item">
                                                            <td class="product-name">
                                                                Vestibulum suscipit <span class="product-quantity"> ×
                                                                    1</span>
                                                            </td>
                                                            <td class="product-total">
                                                                <span class="amount">£165.00</span>
                                                            </td>
                                                        </tr>
                                                        <tr class="cart_item">
                                                            <td class="product-name">
                                                                Vestibulum dictum magna <span class="product-quantity">
                                                                    ×
                                                                    1</span>
                                                            </td>
                                                            <td class="product-total">
                                                                <span class="amount">£50.00</span>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr class="cart-subtotal">
                                                            <th>Cart Subtotal</th>
                                                            <td><span class="amount">£215.00</span>
                                                            </td>
                                                        </tr>
                                                        <tr class="order-total">
                                                            <th>Order Total</th>
                                                            <td><span class=" total amount">£215.00</span>
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
                                        <input type="checkbox" class="custom-control-input" id="wizard-validation-terms"
                                            name="wizard-validation-terms">
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
                                <div class="col-6">
                                    <button type="button" class="btn btn-secondary" data-wizard="prev">
                                        <i class="fa fa-angle-left mr-1"></i> Trước
                                    </button>
                                </div>
                                <div class="col-6 text-right">
                                    <button type="button" class="btn btn-secondary" data-wizard="next">
                                        Sau <i class="fa fa-angle-right ml-1"></i>
                                    </button>
                                    <button type="submit" class="btn btn-primary d-none" data-wizard="finish">
                                        <i class="fa fa-check mr-1"></i> Hoàn tất
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- END Steps Navigation -->
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

<!-- Page JS Helpers (BS Datepicker + BS Colorpicker + BS Maxlength + Select2 + Masked Inputs + Ion Range Slider plugins) -->
<script>jQuery(function () { One.helpers(['datepicker', 'colorpicker', 'maxlength', 'select2', 'masked-inputs', 'rangeslider']); });</script>

<!-- Page JS Code -->
<script>
    $(document).ready(function () {
        var table = $('#table-brand').DataTable({
            'columnDefs': [{

                'targets': [0, 8], /* column index */

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
                        columns: [1, 2, 3, 4, 5, 6, 7]
                    },
                    text: 'Copy',
                    className: 'btn btn-sm btn-primary'
                },
                {
                    extend: 'csv',
                    exportOptions: {
                        columns: [1, 2, 3, 4, 5, 6, 7]
                    },
                    text: 'Export to CSV',
                    className: 'btn btn-sm btn-primary',
                    filename: function () {
                        var d = new Date();
                        var n = d.getTime();
                        return 'danhsachdondathangonline-' + n;
                    },
                    title: function () {
                        return 'Danh sách Đơn đặt hàng online';
                    }
                },
                {
                    extend: 'excel',
                    exportOptions: {
                        columns: [1, 2, 3, 4, 5, 6, 7]
                    },
                    text: 'Export to xlsx',
                    className: 'btn btn-sm btn-primary',
                    filename: function () {
                        var d = new Date();
                        var n = d.getTime();
                        return 'danhsachdondathangonline-' + n;
                    },
                    title: function () {
                        return 'Danh sách Đơn đặt hàng online';
                    }
                },
                {
                    extend: 'pdf',
                    exportOptions: {
                        columns: [1, 2, 3, 4, 5, 6, 7]
                    },
                    text: 'Export to pdf',
                    className: 'btn btn-sm btn-primary',
                    filename: function () {
                        var d = new Date();
                        var n = d.getTime();
                        return 'danhsachdondathangonline-' + n;
                    },
                    title: function () {
                        return 'Danh sách Đơn đặt hàng online';
                    }
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: [1, 2, 3, 4, 5, 6, 7]
                    },
                    text: 'Print',
                    className: 'btn btn-sm btn-primary',
                    filename: function () {
                        var d = new Date();
                        var n = d.getTime();
                        return 'danhsachdondathangonline-' + n;
                    },
                    title: function () {
                        return 'Danh sách Đơn đặt hàng online';
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
    function showDetail(cart_id) {
        // URL có kèm tham số number
        var url = '{{asset('admin/cart/view')}}/' + cart_id;

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

    function showEdit(cart_id) {
        // URL có kèm tham số number
        var url = '{{asset('admin/cart/edit')}}/' + cart_id;

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
@endsection