<div class="popup-form hidden" id="popup-form-edit">
    <form action="{{asset('admin/customer/edit/'.$cus->cus_id)}}" id="edit-form" method="POST" novalidate>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputName">Tên nhân viên <span class="text-danger">*</span></label>
                    <input disabled type="text" class="form-control" id="inputName" name="name" value="{{$cus->cus_name}}" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputIdentityCard">CMND <span class="text-danger">*</span></label>
                    <input disabled type="text" class="form-control" id="inputIdentityCard" name="identityCard" value="{{$cus->cus_identity_card}}"
                        required>
                </div>
            </div>   
            <div class="form-group">
                <label for="inputAddress">Email <span class="text-danger">*</span></label>
                <input type="email" class="form-control" id="inputAddress" name="email" value="{{$cus->cus_email}}" required>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputTel">SĐT <span class="text-danger">*</span></label>
                    <input type="tel" class="form-control" id="inputTel" value="{{$cus->cus_phone}}" name="phone" required>
                </div>
    
            </div>
        <div class="tile-footer-2">
            <button class="btn btn-primary" type="button" id="submitEdit">Sửa</button>
            <button class="btn btn-danger" type="button" id="cancelEdit">Hủy</button>
        </div>
        {{ csrf_field() }}
    </form>
    <script>
        $(document).ready(function () {
            $('#submitEdit').on('click', function () {
                $form = $('#edit-form');
                if ($form.valid()) {
                    $.ajax({
                        url: $form.attr('action'),
                        type: $form.attr('method'),
                        data: $form.serialize(),
                        success: function (data) {
                            swal("Đã sửa!", "Đối tượng đã được sửa.", "success")
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
