@extends('admin.layout.master')
@section('title','Tài khoản')
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
            <form id="formdata" action="{{asset('admin/user/delete')}}" method="GET" enctype="multipart/form-data">
                <div class="block-header row justify-content-end">
                    <aside class="py-2 mb-2">
                        <button type="button" class="btn btn-primary" data-toggle="tooltip" title="Thêm" id="addbutton">
                            <i class="fa fa-fw fa-plus"></i>
                        </button>
                        <button type="button" class="btn btn-success" onclick="location.reload();" data-toggle="tooltip" title="Làm mới">
                            <i class="fa fa-fw fa-sync-alt"></i>
                        </button>
                        </button>
                        <button type="button" data-toggle="tooltip" title="Xóa" class="btn btn-danger" id="btnDel"><i
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
                                <th class="text-center orderby">Tên đăng nhập</th>
                                <th class="orderby">Nhân Viên</th>
                                <th class="d-none d-sm-table-cell orderby">Phân quyền</th>
                                <th class="d-none d-sm-table-cell orderby">Trạng thái</th>
                                <th style="width: 140px;" class="text-right orderby remove-sorting">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list_user as $item)
                            <tr>
                                <td class="text-center">
                                    <input type="checkbox" name="selected[]" value="{{$item->username}}">
                                </td>
                                <td class="text-center font-size-sm">{{$item->username}}</td>
                                <td class="text-center font-size-sm">{{$item->empl_name}}</td>
                                <td class="text-center font-size-sm">{{$item->perm_name}}</td>
                                <td class="text-center font-size-sm">
                                    @if ($item->status == 0)
                                        <span class="badge badge-primary">Bình thường</span>
                                    @else
                                        <span class="badge badge-warning">Yêu cầu reset mật khẩu</span>
                                    @endif
                                    
                                </td>
                                <td class="text-right">
                                    <div class="py-2 mb-2">
                                        <button type="button" @if ($item->status == 0)
                                            disabled
                                        @endif onclick="resetPass('{{$item->username}}')" class="btn btn-sm btn-danger" data-toggle="tooltip" title="reset mật khẩu">
                                            <i class="fa fa-fw fa-sync"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-warning" data-toggle="tooltip"
                                            onclick="showEdit('{{$item->username}}')" title="Sửa">
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
@section('popup')
<div id="popupshow">
    <div class="popup-form hidden" id="popup-form-add">
        <form action="{{asset('admin/user/add')}}" id="add-form" method="POST" novalidate>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputName">Tên đăng nhập <span class="text-danger">*</span></label>
                    <input type="text" readonly class="form-control" id="username" name="username" required>
                </div>
                <div class="form-group col-md-6">
                    <label>Nhân viên <span class="text-danger">*</span></label>
                    <select class="js-select2 form-control" id="select-empl" onchange="changHandler()" name="empl_id" style="width: 100%;" data-placeholder="chọn một..." required>
                        <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                        @foreach ($list_employees as $item)
                            <option value="{{$item->empl_id}}">{{$item->empl_id}} - {{$item->empl_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Phân quyền <span class="text-danger">*</span></label>
                    <select class="custom-select" id="select-perm" name="perm_id" required>
                        @foreach ($list_permission as $item)
                        <option value="{{$item->perm_id}}">{{$item->perm_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="tile-footer-2">
                <button class="btn btn-primary" type="button" id="submitAdd">Thêm</button>
                <button class="btn btn-danger" type="button" id="cancelAdd">Hủy</button>
            </div>
            {{ csrf_field() }}
        </form>
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

<!-- Page JS Code -->
<script>
    $(document).ready(function () {
        var table = $('#table-brand').DataTable({
            'columnDefs': [{

                'targets': [0, 4], /* column index */

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
<script>

    function changHandler(){
        var empl_id = $('#select-empl').val();

        if(empl_id){
            $('#username').val("nv"+empl_id);
        }
        else{
            $('#username').val("");
        }
    }

    function showEdit(username) {
        // URL có kèm tham số number
        var url = '{{asset('admin/user/edit')}}/' + username;

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
    }

    function resetPass (username) {
		swal({
			title: "Bạn có muốn reset mật khẩu tài khoản này không?",
			text: "Sau khi reset tài khoản sẽ có trở về mật khẩu mặt định!",
			icon: "warning",
			buttons: ["Không, vẫn giữ nguyên!", "Vâng, tôi chấp nhận!"],
			dangerMode: true,
		})
        .then((result) => {
            if (result) {
                $.ajax({
                    url: "{{asset('admin/user/reset')}}",
                    type : "get",
                    data: {
                        username: username,
                    },
                    success: function (data) {
                        swal("Thành công!", "Tài khoản đã được reset về mật khẩu mặc định.", "success");
                        // console.log('Submission was successful.');
                        location.reload();
                    }
                });
            }
            else {
                swal("Đã hủy", "Mật khẩu vẫn giữ nguyên như cũ", "error");
            }
        });
	}
</script>
@endsection