<div class="popup-form hidden scrollbar" id="popup-view-detail">
    <div class="modal-content">
        <div class="modal-header">
            <h3 class="modal-title" id="exampleModalLongTitle">Thông tin chi tiết sản phẩm</h3>
            <button type="button" class="close" id="closeDetail">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-6">
                    <b>Mã sản phẩm: </b>{{$prod->prod_id}}<br>
                    <b>Tên sản phẩm: </b>{{$prod->prod_name}}<br>
                    <b>Danh mục: </b>{{$prod->cate_name}}<br>
                    <b>Thương hiệu: </b>{{$prod->brand_name}}<br>
                    <b>Giá: </b>{{number_format($prod->prod_unit_price,0,',','.')}} VNĐ<br>
                    <b>Màu: </b>{{$prod->prod_color}}<br>
                    <b>Bộ nhớ: </b>{{$prod->prod_memory}}<br>
                    <b>Tình trạng: </b>@if ($prod->prod_status==0)
                            Sắp ra mắt
                            @elseif($prod->prod_status==1)
                            Đang kinh doanh
                            @else
                            Ngừng kinh doanh
                            @endif<br>
                </div>
                <div class="col-6">
                    <b>Thông số kỹ thuật:</b><br>
                    @php
                        $lines = explode("\n",$prod->prod_detail);
                    @endphp
                    @foreach ($lines as $item)
                        <small class="ml-3">{{$item}}</small><br>
                    @endforeach
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <h5>Hình ảnh: </h5>
                </div>
                <div class="col-sm-12 d-flex justify-content-center">
                    @if (count($prod_imgs) == 0)
                        <strong>Chưa có hình ảnh!!!</strong>
                    @else
                    @foreach ($prod_imgs as $item)
                        <img class="thumbnail" height="100px;" width="100px;" src="{{asset('local/storage/app/images/product/'.$item->pimg_name)}}" alt="">
                    @endforeach
                    @endif
                   
                </div>                
            </div>
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