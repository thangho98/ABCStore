<div class="popup-form hidden" id="popup-view-detail">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLongTitle">Thông tin chi tiết bảo hành</h3>
                <button type="button" class="close" id="closeDetail">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <b>Mã đơn bảo hành: </b>{{$guarantee->gtd_id}}<br>
                <b>Mã đơn hàng: </b>{{$guarantee->gtd_orders}}<br>
                <b>Sản phẩm: </b>{{$guarantee->prod_name}} ram {{$guarantee->propt_ram}} gb, rom {{$guarantee->propt_rom}}, màu
                {{$guarantee->propt_color}}<br>
                <b>Serial: </b>{{$guarantee->gtd_serial}} <br>
                <b>Tên Khách hàng: </b>{{$guarantee->cus_name}}<br>
                <b>SĐT: </b>{{$guarantee->cus_phone}}<br>
                <b>CMND: </b>{{$guarantee->cus_identity_card}}<br>
                <b>Email: </b>{{$guarantee->cus_email}}<br>
                <b>Nhân viên nhận: </b>{{$gtd_empl_receive->empl_name}}<br>
                <b>Ngày nhận: </b>{{date_format(date_create($guarantee->gtd_date_receive),"d-m-Y")}}<br>
                <b>Thông tin yêu cầu bảo hành: </b>{{$guarantee->gtd_required_content}}<br>
                <b>Nội dung: </b>{{$guarantee->gtd_content}}<br>
                <b>Trạng thái </b>  @if ($guarantee->gtd_status == 0)
                                        Đang chờ đi bảo hành
                                        @elseif ($guarantee->gtd_status == 1)
                                        Đang bảo hành
                                            @elseif ($guarantee->gtd_status == 2)
                                            Đã xong
                                                @else 
                                                Đã trả sản phẩm <br>
                                                <b>Nhân viên trả: </b> {{$gtd_empl_reimburse->empl_name}}<br>
                                                <b>Ngày trả : </b> {{date_format(date_create($guarantee->gtd_date_reimburse),"d-m-Y")}}<br>
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
    