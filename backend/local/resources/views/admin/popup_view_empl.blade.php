<div class="popup-form hidden" id="popup-view-detail">
    <div class="modal-content">
        <div class="modal-header">
            <h3 class="modal-title" id="exampleModalLongTitle">Thông tin chi tiết nhân viên</h3>
            <button type="button" class="close" id="closeDetail">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <b>Mã nhân viên: </b>{{$empl->empl_id}}<br>
            <b>Họ và tên: </b>{{$empl->empl_name}}<br>
            <b>Ngày sinh: </b>{{date_format(date_create($empl->empl_birthday),"d-m-Y")}}<br>
            <b>Giới tính: </b>@if ($empl->empl_sex)
            Nữ
            @else
            Nam
            @endif<br>
            <b>CMND: </b>{{$empl->empl_identity_card}}<br>
            <b>SĐT: </b>{{$empl->empl_phone}}<br>
            <b>Email: </b>{{$empl->empl_email}}<br>
            <b>Địa chỉ: </b>{{$empl->empl_address}}<br>
            <b>Ngày vào làm: </b>{{date_format(date_create($empl->empl_start_date),"d-m-Y")}}<br>
            <b>Lương cơ bản: </b>{{number_format($empl->empl_basic_salary,0,',','.')}} VNĐ<br>
            <b>Tình trạng: </b>@if ($empl->empl_status == 0)
            Đang làm
            @else
            Đã nghỉ
            @endif<br>
        </div>
    </div>
    <script>
            $('#closeDetail').on('click', function () {
                $('#popup-view-detail').addClass('hidden');
                $('.darktheme').removeClass('active');
                $('#popup-view-detail').remove();
            });
        </script>
</div>
