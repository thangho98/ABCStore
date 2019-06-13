<div class="popup-form hidden scrollbar" id="popup-form-edit">
    <form action="{{asset('admin/guarantee/edit/'.$guarantee->gtd_id)}}" id="edit-form" method="POST" novalidate> 
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Mã Hóa đơn <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="order_id"
                    disabled value="{{$guarantee->gtd_orders}}">
            </div>
            <div class="form-group col-md-6">
                <label>Tên khách hàng <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="cus_name"
                    disabled value="{{$guarantee->cus_name}}">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Sản phẩm <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="order_id"
                    disabled value="{{$guarantee->prod_name}} ram {{$guarantee->propt_ram}} gb, rom {{$guarantee->propt_rom}}, màu
                    {{$guarantee->propt_color}}">
            </div>
            <div class="form-group col-md-6">
                <label>Số serial <span class="text-danger">*</span></label>
                <input type="text" value="{{$guarantee->gtd_serial}}" class="form-control" disabled id="inputSerial" name="serial">
            </div>
        </div>
        <div class="form-group">
            <label>Thông tin yêu cầu bảo hành <span class="text-danger">*</span></label>
            <textarea class="js-maxlength form-control" disabled name="required_content" rows="5" maxlength="255" placeholder="Nhập thông tin yêu cầu bảo hành" data-always-show="true" required>{{$guarantee->gtd_required_content}}
            </textarea>
        </div>
        <div class="form-group">
            <label>Nội dung bảo hành <span class="text-danger">*</span></label>
            <textarea @if ($guarantee->gtd_status != 1)
                disabled
            @endif class="js-maxlength form-control" name="content" rows="5" maxlength="255" placeholder="Nhập nội dung bảo hành" data-always-show="true" required>{{$guarantee->gtd_content}}</textarea>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Trạng thái <span class="text-danger">*</span></label>
                <select class="form-control" id="inputStatus" name="status">
                    <option  @if ($guarantee->gtd_status == 0) selected @else disabled @endif value="0">Đang chờ đi bảo hành</option>
                    <option  @if ($guarantee->gtd_status == 1) selected @elseif($guarantee->gtd_status != 0) disabled @endif value="1">Đang bảo hành</option>
                    <option  @if ($guarantee->gtd_status == 2) selected @elseif($guarantee->gtd_status != 1) disabled @endif value="2">Đã xong</option>
                    <option  @if ($guarantee->gtd_status == 3) selected disabled @elseif ($guarantee->gtd_status != 2) disabled @endif value="3">Đã trả sản phẩm</option>
                </select>
            </div>
        </div>
        
        <div class="tile-footer-1">
            <button class="btn btn-primary"  @if ($guarantee->gtd_status == 3) disabled @endif type="button" id="submitEdit">Sửa</button>
            <button class="btn btn-danger" type="button" id="cancelEdit">Hủy</button>
        </div>
        {{ csrf_field() }}
    </form>
    <script>
            $(document).ready(function () {
                $('#submitEdit').on('click', function () {
                    var status = $("#inputStatus").val();
                    $form = $('#edit-form');
                    if ($form.valid()) {
                    $.ajax({
                        url: $form.attr('action'),
                        type: $form.attr('method'),
                        data: $form.serialize(),
                        success: function (data) {
                            swal("Đã sửa!", "Đối tượng đã được sửa.", "success")
                                .then((value) => {
                                    // if(status == 3){

                                    // }
                                    // else{
                                    //     location.reload();
                                    // }
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
                });
                $('#cancelEdit').on('click', function () {
                    $('#popup-form-edit').addClass('hidden');
                    $('.darktheme').removeClass('active');
                    $('#edit-form').attr('novalidate', 'true');
                    $('#popup-form-edit').remove();
                });
            });
        </script>
</div>
