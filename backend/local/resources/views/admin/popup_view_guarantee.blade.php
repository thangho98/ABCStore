<div class="popup-form hidden" id="popup-view-detail">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLongTitle">Thông tin chi tiết bảo hành</h3>
                <button type="button" class="close" id="closeDetail">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <b>Mã đơn bảo hành: </b>{{$item->gtd_id}}<br>
                <b>Mã đơn hàng: </b>{{$item->gtd_orders}}<br>
                <b>Sản phẩm: </b>{{$item->prod_name}}<br>
                <b>Serial: </b>{{$item->gtd_serial}} <br>
                <b>Tên Khách hàng: </b>{{$item->cus_name}}<br>
                <b>SĐT: </b>{{$item->cus_phone}}<br>
                <b>CMND: </b>{{$item->cus_identity_card}}<br>
                <b>Email: </b>{{$item->cus_email}}<br>
                <b>Nhân viên nhận: </b>{{$item->gtd_empl_receive}}<br>
                <b>Ngày nhận: </b>{{date_format(date_create($item->gtd_date_receive),"d-m-Y")}}<br>
                <b>Mô tả: </b><br>
                <b>Trạng thái </b>  @if ($item->gtd_status == 0)
                                    Recieved
                                        @elseif ($item->gtd_status == 1)
                                        Doing
                                            @elseif ($item->gtd_status == 2)
                                            Done
                                                @else 
                                                Refunded <br>
                                                <b>Nhân viên trả: </b> {{$item->gtd_emp_reimburse}}<br>
                                                <b>Ngày trả : </b> {{date_format(date_create($empl->gtd_date_reimburse),"d-m-Y")}}<br>

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
    