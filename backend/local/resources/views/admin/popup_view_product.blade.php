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
                    <b>Tình trạng: </b>@if ($prod->prod_status==0)
                            Sắp ra mắt
                            @elseif($prod->prod_status==1)
                            Đang kinh doanh
                            @else
                            Ngừng kinh doanh
                            @endif<br>
                    <b>Poster: </b>
                    @if ($prod->prod_poster == '')
                        Chưa có poster
                    @else
                    <div class="row mt-2 d-flex justify-content-center">
                        <img class="thumbnail" height="100px;" width="100px;" src="{{asset('local/storage/app/images/product/'.$prod->prod_poster)}}" alt="">
                    </div>
                        
                    @endif 
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
            <div class="row mt-3">
                <div class="col-sm-12">
                    <h5>Các phiên bản: </h5>
                </div>
                @if (count($list_options) == 0)
                    <div class="col-sm-12 d-flex justify-content-center">
                        <strong>Chưa có phiên bản nào cho sản phẩm!!!</strong>
                    </div>  
                @else
                    <table class="table table-sm table-vcenter table-hover">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 50px;">#</th>
                                <th class="text-center">Màu sắc</th>
                                <th class="text-center">Bộ nhớ ram</th>
                                <th class="text-center">Bộ nhớ rom</th>
                                <th class="text-center">Giá</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 0; $i < count($list_options); $i++)
                            <tr>
                                <th class="text-center" scope="row">{{$i+1}}</th>
                                <th class="text-center font-w600 font-size-sm">{{$list_options[$i]->propt_color}}</th>
                                <th class="text-center font-w600 font-size-sm">{{$list_options[$i]->propt_ram}} gb</th>
                                <th class="text-center font-w600 font-size-sm">{{$list_options[$i]->propt_rom}}</th>
                                <th class="text-right font-w600 font-size-sm">{{number_format($list_options[$i]->propt_price,0,',','.')}} VNĐ</th>
                            </tr>
                            @endfor
                        </tbody>
                    </table>
                @endif     
            </div>
            <div class="row mt-3">
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