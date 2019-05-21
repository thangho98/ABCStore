<div class="popup-form hidden" id="popup-view-detail">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLongTitle">Thông tin chi tiết đơn hàng online</h3>
                <button type="button" class="close" id="closeDetail">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <b>Tên khách hàng: </b>{{$cart->cus_name}}<br>
                <b>SĐT: </b>{{$cart->cus_phone}}<br>
                <b>CMND: </b>{{$cart->cus_identity_card}}<br>
                <b>Tổng số lượng: </b>{{$cart->cart_identity_card}}<br>
                <b>Tổng tiền: </b>{{number_format($cart->cart_phone,0,',','.')}} VNĐ<br>
                <b>Ngày đặt hàng: </b>{{$cart->cart_email}}<br>
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
                                    <th>Tổng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list_cartdetail as $item)
                                <tr>
                                    <th class="text-center" scope="row">
                                        {{$item->prod_id}}
                                    </th>
                                    <td class="font-w600 font-size-sm">
                                        {{$item->prod_name}}
                                    </td>
                                    <td class="d-none d-table-cell">
                                        {{$item->cartdt_prod_quantity}}
                                    </td>
                                    <td>{{number_format($item->cartdt_prod_unit_price,0,',','.')}} VNĐ</td>
                                    <td>{{number_format($cart->cartdt_prod_promotion_price,0,',','.')}} VNĐ</td>
                                    <td class="d-none d-table-cell">
                                        {{$item->cartdt_total}}
                                    </td>
                                </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>
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
    