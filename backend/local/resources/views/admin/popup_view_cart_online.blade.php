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
                    <b>Tên khách hàng: </b>{{$carts->cart_cus_name}}<br>
                    <b>SĐT: </b>{{$carts->cart_cus_phone}}<br>
                    <b>Email: </b>{{$carts->cart_cus_email}}<br>
                </div>
                <div class="col-sm-6">
                    <b>Tổng số lượng: </b>{{$carts->cart_total_prod}}<br>
                    <b>Tổng tiền: </b>{{number_format($carts->cart_total_price,0,',','.')}} VNĐ<br>
                    <b>Ngày đặt hàng: </b>{{ date("d/m/Y",strtotime($carts->cart_date))}}<br>
                    <b>Trạng thái : </b>@if ($carts->cart_status == 0)
                    <span class="badge badge-secondary">Chờ xác nhận
                    @elseif($carts->cart_status == 1)
                    <span class="badge badge-primary">Đã xác nhận
                    @elseif($carts->cart_status == 2)
                    <span class="badge badge-success">Đã thanh toán
                    @else
                    <span class="badge badge-dark">Hết hạn
                    @endif </span><br>
                </div>
            </div>
        </div>
        <div class="col-12">
            <!-- Table Head Dark -->
                <h3 class="block-title mb-3">Chi tiết đơn hàng</h3>
                <div class="table-responsive">
                    <table class="table table-vcenter table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th style="width: 50%;">Tên sản phẩm</th>
                                <th style="width: 30%;" class="d-none d-sm-table-cell text-center">
                                    Số lượng</th>
                                <th style="width: 30%;">Giá gốc</th>
                                <th style="width: 30%;">Giá khuyến mãi</th>
                                <th style="width: 30%;">Tổng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list_cartdetail as $item)
                            <tr>
                                <td class="font-w600 font-size-sm text-center">
                                    {{$item->prod_name}} {{$item->propt_ram}} gb {{$item->propt_rom}} {{$item->propt_color}}
                                </td>
                                <td class="d-none d-table-cell text-center">
                                    {{$item->cartdt_prod_quantity}}
                                </td>
                                <td class="text-right">{{number_format($item->cartdt_prod_unit_price,0,',','.')}} VNĐ</td>
                                <td class="text-right">{{number_format($item->cartdt_prod_promotion_price,0,',','.')}} VNĐ</td>
                                <td class="d-none d-table-cell text-right">
                                    {{number_format($item->cartdt_total,0,',','.')}} VNĐ
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