<div class="popup-form hidden scrollbar" id="popup-view-detail">
    <div class="modal-content">
        <div class="modal-header">
            <h3 class="modal-title" id="exampleModalLongTitle">Thông tin chi tiết đơn hàng online</h3>
            <button type="button" class="close" id="closeDetail">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-sm-6">
                    <b>Mã khách hàng: </b>{{$orders->cus_id}}<br>
                    <b>Tên khách hàng: </b>{{$orders->cus_name}}<br>
                    <b>SĐT: </b>{{$orders->cus_phone}}<br>
                    <b>Email: </b>{{$orders->cus_email}}<br>
                    <b>CMND: </b>{{$orders->cus_identity_card}}<br>
                </div>
                <div class="col-sm-6">
                    <b>Tổng số lượng: </b>{{$orders->order_total_prod}}<br>
                    <b>Tổng tiền: </b>{{number_format($orders->order_total_price,0,',','.')}} VNĐ<br>
                    <b>Ngày mua: </b>{{ date("d/m/Y",strtotime($orders->order_date))}}<br>
                    <b>Mã Nhân viên bán hàng: </b>{{$orders->empl_id}}<br>
                    <b>Nhân viên bán hàng: </b>{{$orders->empl_name}}<br>
                </div>
            </div>
        </div>
        <div class="col-12">
            <!-- Table Head Dark -->
                <h3 class="block-title mb-3">Chi tiết đơn hàng</h3>
                <div class="table-responsive">
                    <table class="table table-sm table-vcenter table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>Tên sản phẩm</th>
                                <th class="d-none d-sm-table-cell text-center">
                                    Số lượng</th>
                                <th>Giá gốc</th>
                                <th>Giá khuyến mãi</th>
                                <th>Tổng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list_ordersdetail as $item)
                            <tr>
                                <td class="font-w600 font-size-sm text-center">
                                    {{$item->prod_name}} {{$item->propt_ram}} gb {{$item->propt_rom}} {{$item->propt_color}}
                                </td>
                                <td class="d-none d-table-cell text-center">
                                    {{$item->orddt_quantity}}
                                </td>
                                <td class="text-right">{{number_format($item->orddt_unit_price,0,',','.')}} VNĐ</td>
                                <td class="text-right">{{number_format($item->orddt_promotion_price,0,',','.')}} VNĐ</td>
                                <td class="d-none d-table-cell text-right">
                                    {{number_format($item->orddt_total,0,',','.')}} VNĐ
                                </td>
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