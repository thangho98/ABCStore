<div class="popup-form hidden" id="popup-view-detail">
    <div class="modal-content">
        <div class="modal-header">
            <h3 class="modal-title" id="exampleModalLongTitle">Thông tin chi tiết khuyến mãi</h3>
            <button type="button" class="close" id="closeDetail">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <b>Mã KM: </b>{{$prom->prom_id}}<br>
            <b>Tên KM: </b>{{$prom->prom_name}}<br>
            <b>Tên sản phẩm: </b>{{$prom->prod_name}}<br>
            <b>Phiên bản: </b>{{$prom->propt_ram}} gb {{$prom->propt_rom}} {{$prom->propt_color}}<br>
            <b>Ngày bắt đầu: </b>{{date_format(date_create($prom->prom_start_date),"d-m-Y")}}<br>
            <b>Ngày kết thúc: </b>{{date_format(date_create($prom->prom_end_date),"d-m-Y")}}<br>
            <b>Hệ số: </b>{{$prom->prom_percent}}%<br>
            <b>Giá gốc: </b>{{number_format($prom->prom_unit_price,0,',','.')}} VNĐ<br>
            <b>Giá Khuyến mãi: </b>{{number_format($prom->prom_promotion_price,0,',','.')}} VNĐ<br>
            <b>Tình trạng: </b>
            @if ($prom->prom_status == 0)
            <span class="badge badge-primary">Chưa bắt đầu
            @elseif($prom->prom_status == 1)
            <span class="badge badge-secondary">Đang khuyến mãi
            @else
            <span class="badge badge-danger">Đã kết thúc
            @endif</span><br>
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