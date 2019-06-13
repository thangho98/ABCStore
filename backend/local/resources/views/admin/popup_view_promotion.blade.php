<div class="popup-form hidden" id="popup-view-detail">
    <div class="modal-content">
        <div class="modal-header">
            <h3 class="modal-title" id="exampleModalLongTitle">Thông tin chi tiết khuyến mãi</h3>
            <button type="button" class="close" id="closeDetail">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-12">
                    <b>Mã KM: </b>{{$prom->prom_id}}<br>
                    <b>Tên KM: </b>{{$prom->prom_name}}<br>
                    <b>Ngày bắt đầu: </b>{{date_format(date_create($prom->prom_start_date),"d-m-Y")}}<br>
                    <b>Ngày kết thúc: </b>{{date_format(date_create($prom->prom_end_date),"d-m-Y")}}<br>
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
        </div>
        <div class="col-12">
            <!-- Table Head Dark -->
                <h3 class="block-title mb-3">Danh sách sản phẩm khuyến mãi</h3>
                <div class="table-responsive">
                    <table class="table table-sm table-vcenter table-bordered table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>STT</th>
                                <th>Tên sản phẩm</th>
                                <th>Hệ số</th>
                                <th>Giá gốc</th>
                                <th>Giá KM</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($list_promotiondetail as $item)
                            <tr>
                                <td class="text-center">{{$i}}</td>
                                <td class="font-w600 font-size-sm">
                                    {{$item->prod_name}} {{$item->propt_ram}} gb {{$item->propt_rom}} {{$item->propt_color}}
                                </td>
                                <td class="d-none d-table-cell text-center">
                                    {{$item->promdt_percent}} %
                                </td>
                                <td class="text-right">{{number_format($item->promdt_unit_price,0,',','.')}} VNĐ</td>
                                <td class="text-right">{{number_format($item->promdt_promotion_price,0,',','.')}} VNĐ</td>
                                @php
                                    $i++;
                                @endphp
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            <!-- END Table Head Dark -->
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