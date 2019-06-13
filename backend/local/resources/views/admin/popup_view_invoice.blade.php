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
                    <b>Số Hóa Đơn: </b>{{$invo->invo_code}}<br>
                    <b>Nhà cung cấp: </b>{{$invo->prov_name}}<br>
                    <b>Ngày nhập: </b>{{$invo->invo_date}}<br>
                    <b>Mã Nhân viên nhập: </b>{{$invo->empl_id}}<br>
                    <b>Tên nhân viên nhập: </b>{{$invo->empl_name}}<br>
                </div>
                <div class="col-sm-6">
                    <b>Tổng số lượng: </b>{{$invo->invo_total_prod}}<br>
                    <b>Tổng tiền: </b>{{number_format($invo->invo_total_price,0,',','.')}} VNĐ<br>
                    <b>Trạng thái: </b>@if ($invo->invo_status == 0)
                        <span class="badge badge-danger">Chưa duyệt</span>
                    @else
                        <span class="badge badge-dark">Đã duyệt</span>
                    @endif<br>
                </div>
            </div>
        </div>
        <div class="col-12">
            <!-- Table Head Dark -->
                <h3 class="block-title mb-3">Chi tiết đơn hàng</h3>
                <div class="table-responsive">
                    <table class="table table-sm table-vcenter table-bordered table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>STT</th>
                                <th>Tên sản phẩm</th>
                                <th class="d-none d-sm-table-cell text-center">
                                    Số lượng</th>
                                <th>Giá</th>
                                <th>Tổng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($list_invodetail as $item)
                            <tr>
                                <td class="text-center">{{$i}}</td>
                                <td class="font-w600 font-size-sm">
                                    {{$item->prod_name}} {{$item->propt_ram}} gb {{$item->propt_rom}} {{$item->propt_color}}
                                </td>
                                <td class="d-none d-table-cell text-center">
                                    {{$item->invdt_quantity}}
                                </td>
                                <td class="text-right">{{number_format($item->invdt_unit_price,0,',','.')}} VNĐ</td>
                                <td class="d-none d-table-cell text-right">
                                    {{number_format($item->invdt_total,0,',','.')}} VNĐ
                                </td>
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