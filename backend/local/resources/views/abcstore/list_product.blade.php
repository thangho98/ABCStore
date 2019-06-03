<div class="tab-content fix">
    @if (count($list_product)>0)
    <div id="grid-view" class="tab-pane fade show active">
        <div class="row">
            @foreach ($list_product as $prod)
            <!-- Single Product Start -->
            <div class="list-item-1 col-lg-4 col-md-4 col-sm-6 col-6">
                <div class="single-product">
                    <!-- Product Image Start -->
                    <div class="pro-img">
                        <a href="{{asset('/product/'.$prod->prod_id)}}">
                            <img width="268px;" height="268px;" class="primary-img"
                                src="{{asset('local/storage/app/images/product/'.$prod->prod_poster)}}"
                                alt="single-product">
                        </a>
                    </div>
                    <!-- Product Image End -->
                    <!-- Product Content Start -->
                    <div class="pro-content">
                        <div class="pro-info">
                            <h4><a href="{{asset('/product/'.$prod->prod_id)}}">{{$prod->prod_name}}</a>
                            </h4>
                            <p><span class="price">{{number_format($prod->prod_price,0,',','.')}}
                                    VNĐ</span><del class="prev-price">$105.50</del></p>
                            <div class="label-product l_sale">20<span class="symbol-percent">%</span></div>
                        </div>
                    </div>
                    <!-- Product Content End -->
                    @if ($prod->prod_new)
                    <span class="sticker-new">new</span>
                    @endif
                </div>
            </div>
            <!-- Single Product End -->
            @endforeach
        </div>
        <!-- Row End -->
    </div>
    <!-- #grid view End -->
    <div id="list-view" class="tab-pane fade">
        @foreach ($list_product as $prod)
        <!-- Single Product Start -->
        <div class="list-item-2 single-product">
            <div class="row">
                <!-- Product Image Start -->
                <div class="col-lg-4 col-md-5 col-sm-12">
                    <div class="pro-img">
                        <a href="{{asset('/product/'.$prod->prod_id)}}">
                            <img width="270px;" height="270px;" class="primary-img"
                                src="{{asset('local/storage/app/images/product/'.$prod->prod_poster)}}"
                                alt="single-product">
                        </a>
                        <span class="sticker-new">new</span>
                    </div>
                </div>
                <!-- Product Image End -->
                <!-- Product Content Start -->
                <div class="col-lg-8 col-md-7 col-sm-12">
                    <div class="pro-content hot-product2">
                        <h4><a href="{{asset('/product/'.$prod->prod_id)}}">{{$prod->prod_name}}</a>
                        </h4>
                        <p><span class="price">{{number_format($prod->prod_price,0,',','.')}}</span><del
                                class="prev-price">$205.50</del>
                            <p>{{$prod->prod_detail}}</p>
                    </div>
                </div>
                <!-- Product Content End -->
            </div>
        </div>
        <!-- Single Product End -->
        @endforeach
        <!-- Single Product End -->
    </div>
    <!-- #list view End -->
    <div class="pro-pagination">
    </div>
    <!-- Product Pagination Info -->
    @else
    <div class="alert alert-warning" role="alert">
        Không có sản phẩm nào trong danh mục này.
    </div>
    @endif
</div>