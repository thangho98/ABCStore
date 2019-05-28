<div class="popup-form hidden" id="popup-form-edit">
    <form action="{{asset('admin/user/edit/'.$user->username)}}" id="edit-form" method="POST" novalidate>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputName">Tên đăng nhập <span class="text-danger">*</span></label>
                <input type="text" value="{{$user->username}}" disabled class="form-control" id="username-edit" name="username" required>
            </div>
            <div class="form-group col-md-6">
                <label>Nhân viên <span class="text-danger">*</span></label>
                <input type="text" disabled value="{{$employees->empl_id}} - {{$employees->empl_name}}" class="form-control" id="input-empl-edit" name="empl_id" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Phân quyền <span class="text-danger">*</span></label>
                <select class="custom-select" id="select-perm-edit" name="perm_id" required>
                    @foreach ($list_permission as $item)
                    <option @if ($item->perm_id == $user->perm_id)
                        selected
                    @endif value="{{$item->perm_id}}">{{$item->perm_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="tile-footer-2">
            <button class="btn btn-primary" type="button" id="submitEdit">Sửa</button>
            <button class="btn btn-danger" type="button" id="cancelEdit">Hủy</button>
        </div>
        {{ csrf_field() }}
    </form>
    <script>
    $(document).ready(function() {
        $('#submitEdit').on('click', function() {
            $form = $('#edit-form');
            if ($form.valid()) {
                $.ajax({
                    url: $form.attr('action'),
                    type: $form.attr('method'),
                    data: $form.serialize(),
                    success: function(data) {
                        swal("Đã sửa!", "Đối tượng đã được sửa.", "success")
                            .then((value) => {
                                console.log('Submission was successful.');
                                location.reload();
                            });
                    },
                    error: function(data) {
                        swal("Bị lỗi", "Đối tượng này đã bị lỗi :)", "error");
                        console.log('An error occurred.');
                    }
                });
            }
        });
        $('#cancelEdit').on('click', function() {
            $('#popup-form-edit').addClass('hidden');
            $('.darktheme').removeClass('active');
            $('#edit-form').attr('novalidate', 'true');
            $('#popup-form-edit').remove();
        });
    });
    </script>
</div>