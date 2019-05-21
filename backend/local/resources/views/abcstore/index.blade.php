@extends('abcstore.layout.master')
@section('title','Trang chủ')
@section('main')
<!-- Categorie Menu & Slider Area Start Here -->
<div class="main-page-banner pb-50 off-white-bg">
    <div class="container">
        <div class="row">
            <!-- Vertical Menu Start Here -->
            <div class="col-xl-3 col-lg-4 d-none d-lg-block">
                <div class="vertical-menu mb-all-30">
                    <nav>
                        <ul class="vertical-menu-list">
                            @foreach ($list_cate as $item)
                            <li>
                                <a href="shop.html">
                                    <span><img src="{{asset('local/storage/app/images/category/'.$item->cate_icon)}}"
                                            alt="menu-icon"></span>{{$item->cate_name}}</a>
                            </li>
                            @endforeach
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- Vertical Menu End Here -->
            <!-- Slider Area Start Here -->
            <div class="col-xl-9 col-lg-8 slider_box">
                <div class="slider-wrapper theme-default">
                    <!-- Slider Background  Image Start-->
                    <div id="slider" class="nivoSlider">
                        @foreach ($list_slide as $item)
                        <a href="shop.html"><img src="{{asset('local/storage/app/images/slide/'.$item->slide_img)}}"
                                data-thumb="{{asset('local/storage/app/images/slide/'.$item->img)}}" alt=""
                                title="{{$item->slide_caption}}" /></a>
                        @endforeach
                    </div>
                    <!-- Slider Background  Image Start-->
                </div>
            </div>
            <!-- Slider Area End Here -->
        </div>
        <!-- Row End -->
    </div>
    <!-- Container End -->
</div>
<!-- Categorie Menu & Slider Area End Here -->
<!-- Hot Deal Products Start Here -->
<div class="hot-deal-products off-white-bg pb-60 pb-sm-50">
    <div class="container">
        <!-- Product Title Start -->
        <div class="post-title pb-30">
            <h2>KHUYẾN MẠI HOT</h2>
        </div>
        <!-- Product Title End -->
        <!-- Hot Deal Product Activation Start -->
        <div class="hot-deal-active owl-carousel">
            <div class="single-product">
                <!-- Product Image Start -->
                <div class="pro-img">
                    <a href="product.html">
                        <img class="primary-img" src="img/products/1.jpg" alt="single-product">
                        <img class="secondary-img" src="img/products/7.jpg" alt="single-product">
                    </a>
                    <div class="countdown" data-countdown="2020/03/01"></div>
                </div>
                <!-- Product Image End -->
                <!-- Product Content Start -->
                <div class="pro-content">
                    <div class="pro-info">
                        <h4><a href="product.html">Poly and Bark Vortex Side</a></h4>
                        <p><span class="price">$84.45</span><del class="prev-price">$105.50</del></p>
                        <div class="label-product l_sale">20<span class="symbol-percent">%</span></div>
                    </div>
                    <div class="pro-actions">
                        <div class="actions-primary">
                            <a href="cart.html" title="Add to Cart"> + Thêm vào giỏ hàng</a>
                        </div>
                    </div>
                </div>
                <!-- Product Content End -->
            </div>
            <!-- Single Product End -->
            <!-- Single Product Start -->
            <div class="single-product">
                <!-- Product Image Start -->
                <div class="pro-img">
                    <a href="product.html">
                        <img class="primary-img" src="img/products/24.jpg" alt="single-product">
                        <img class="secondary-img" src="img/products/25.jpg" alt="single-product">
                    </a>
                    <div class="countdown" data-countdown="2020/03/01"></div>
                </div>
                <!-- Product Image End -->
                <!-- Product Content Start -->
                <div class="pro-content">
                    <div class="pro-info">
                        <h4><a href="product.html">Light Inverted Pendant Quick</a></h4>
                        <p><span class="price">$84.45</span><del class="prev-price">$105.50</del></p>
                        <div class="label-product l_sale">20<span class="symbol-percent">%</span></div>
                    </div>
                    <div class="pro-actions">
                        <div class="actions-primary">
                            <a href="cart.html" title="Add to Cart">+ Thêm vào giỏ hàng</a>
                        </div>
                    </div>
                </div>
                <!-- Product Content End -->
            </div>
            <!-- Single Product End -->
            <!-- Single Product Start -->
            <div class="single-product">
                <!-- Product Image Start -->
                <div class="pro-img">
                    <a href="product.html">
                        <img class="primary-img" src="img/products/42.jpg" alt="single-product">
                        <img class="secondary-img" src="img/products/43.jpg" alt="single-product">
                    </a>
                    <div class="countdown" data-countdown="2020/03/01"></div>
                </div>
                <!-- Product Image End -->
                <!-- Product Content Start -->
                <div class="pro-content">
                    <div class="pro-info">
                        <h4><a href="product.html">Terra Xpress HE Cooking </a></h4>
                        <p><span class="price">$84.45</span><del class="prev-price">$105.50</del></p>
                        <div class="label-product l_sale">15<span class="symbol-percent">%</span></div>
                    </div>
                    <div class="pro-actions">
                        <div class="actions-primary">
                            <a href="cart.html" title="Add to Cart">+ Thêm vào giỏ hàng</a>
                        </div>
                    </div>
                </div>
                <!-- Product Content End -->
                <span class="sticker-new">new</span>
            </div>
            <!-- Single Product End -->
            <!-- Single Product Start -->
            <div class="single-product">
                <!-- Product Image Start -->
                <div class="pro-img">
                    <a href="product.html">
                        <img class="primary-img" src="img/products/30.jpg" alt="single-product">
                        <img class="secondary-img" src="img/products/31.jpg" alt="single-product">
                    </a>
                    <div class="countdown" data-countdown="2020/03/01"></div>
                </div>
                <!-- Product Image End -->
                <!-- Product Content Start -->
                <div class="pro-content">
                    <div class="pro-info">
                        <h4><a href="product.html">Calandiva Wrapped 12cm</a></h4>
                        <p><span class="price">$84.45</span><del class="prev-price">$105.50</del></p>
                        <div class="label-product l_sale">20<span class="symbol-percent">%</span></div>
                    </div>
                    <div class="pro-actions">
                        <div class="actions-primary">
                            <a href="cart.html" title="Add to Cart">+ Thêm vào giỏ hàng</a>
                        </div>
                    </div>
                </div>
                <!-- Product Content End -->
            </div>
            <!-- Single Product End -->
            <!-- Single Product Start -->
            <div class="single-product">
                <!-- Product Image Start -->
                <div class="pro-img">
                    <a href="product.html">
                        <img class="primary-img" src="img/products/8.jpg" alt="single-product">
                        <img class="secondary-img" src="img/products/9.jpg" alt="single-product">
                    </a>
                    <div class="countdown" data-countdown="2020/03/01"></div>
                </div>
                <!-- Product Image End -->
                <!-- Product Content Start -->
                <div class="pro-content">
                    <div class="pro-info">
                        <h4><a href="product.html">Gpoly and Bark Eames Styl...</a></h4>
                        <p><span class="price">$84.45</span><del class="prev-price">$105.50</del></p>
                        <div class="label-product l_sale">10<span class="symbol-percent">%</span></div>
                    </div>
                    <div class="pro-actions">
                        <div class="actions-primary">
                            <a href="cart.html" title="Add to Cart">+ Thêm vào giỏ hàng</a>
                        </div>
                    </div>
                </div>
                <!-- Product Content End -->
                <span class="sticker-new">new</span>
            </div>
            <!-- Single Product End -->
            <!-- Single Product Start -->
            <div class="single-product">
                <!-- Product Image Start -->
                <div class="pro-img">
                    <a href="product.html">
                        <img class="primary-img" src="img/products/10.jpg" alt="single-product">
                        <img class="secondary-img" src="img/products/11.jpg" alt="single-product">
                    </a>
                    <div class="countdown" data-countdown="2020/03/01"></div>
                </div>
                <!-- Product Image End -->
                <!-- Product Content Start -->
                <div class="pro-content">
                    <div class="pro-info">
                        <h4><a href="product.html">Poly and Bark Vortex Side</a></h4>
                        <p><span class="price">$84.45</span><del class="prev-price">$105.50</del></p>
                        <div class="label-product l_sale">37<span class="symbol-percent">%</span></div>
                    </div>
                    <div class="pro-actions">
                        <div class="actions-primary">
                            <a href="cart.html" title="Add to Cart">+ Thêm vào giỏ hàng</a>
                        </div>
                    </div>
                </div>
                <!-- Product Content End -->
                <span class="sticker-new">new</span>
            </div>
            <!-- Single Product End -->
        </div>
        <!-- Hot Deal Product Active End -->

    </div>
    <!-- Container End -->
</div>
<!-- Hot Deal Products End Here -->
<!-- Arrivals Products Area Start Here -->
<div class="arrivals-product pt-20 pb-85 pb-sm-45">
    <div class="container">
        <div class="main-product-tab-area">
            <div class="tab-menu mb-25">
                <div class="section-ttitle">
                    <h2>SẢN PHẨM MỚI</h2>
                </div>
                <!-- Nav tabs -->
                <ul class="nav tabs-area" role="tablist">
                    @for ($i = 0; $i < count($list_cate_new); $i++) 
                        @if ($i==0)
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab"
                            href="#{{$list_cate_new[$i]->cate_slug}}">{{$list_cate_new[$i]->cate_name}}</a>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab"
                                href="#{{$list_cate_new[$i]->cate_slug}}">{{$list_cate_new[$i]->cate_name}}</a>
                        </li>
                        @endif
                    @endfor
                </ul>
            </div>

            <!-- Tab Contetn Start -->
            <div class="tab-content">
                @for ($i = 0; $i < count($list_cate_new); $i++) 
                    @if ($i==0) 
                    <div id="{{$list_cate_new[$i]->cate_slug}}" class="tab-pane fade show active">
                    <!-- Arrivals Product Activation Start Here -->
                        <div class="electronics-pro-active owl-carousel">
                        <!-- Double Product Start -->
                        @php
                        $nameArr = 'by_cate_'.$list_cate_new[$i]->cate_id;
                        $index = 0;
                        @endphp
                        @while ($index < count($list_prod_new[$nameArr])) <div class="double-product">
                            <!-- Single Product Start -->
                            <div class="single-product">
                                <!-- Product Image Start -->
                                <div class="pro-img">
                                    <a href="{{asset('/product/'.$list_prod_new[$nameArr][$index]->prod_id)}}">
                                        <img class="{{asset('/product/'.$list_prod_new[$nameArr][$index]->prod_id)}}"
                                            src="{{asset('local/storage/app/images/product/'.$list_prod_new[$nameArr][$index]->prod_poster)}}"
                                            alt="single-product">
                                    </a>
                                </div>
                                <!-- Product Image End -->
                                <!-- Product Content Start -->
                                <div class="pro-content">
                                    <div class="pro-info">
                                        <h4><a
                                                href="{{asset('/product/'.$list_prod_new[$nameArr][$index]->prod_id)}}">{{$list_prod_new[$nameArr][$index]->prod_name}}</a>
                                        </h4>
                                        <p><span class="price">$320.45</span><del class="prev-price">$400.50</del></p>
                                        <div class="label-product l_sale">30<span class="symbol-percent">%</span></div>
                                    </div>
                                    <div class="pro-actions">
                                        <div class="actions-primary">
                                            <a href="cart.html" title="Add to Cart"> + Thêm vào giỏ hàng</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Product Content End -->
                                <span class="sticker-new">new</span>
                            </div>
                            <!-- Single Product End -->
                            @php
                            $index++;
                            @endphp

                            @if ($index < count($list_prod_new[$nameArr]))
                            <div class="single-product">
                                <!-- Product Image Start -->
                                <div class="pro-img">
                                    <a href="{{asset('/product/'.$list_prod_new[$nameArr][$index]->prod_id)}}">
                                        <img class="primary-img"
                                            src="{{asset('local/storage/app/images/product/'.$list_prod_new[$nameArr][$index]->prod_poster)}}"
                                            alt="single-product">
                                    </a>
                                </div>
                                <!-- Product Image End -->
                                <!-- Product Content Start -->
                                <div class="pro-content">
                                    <div class="pro-info">
                                        <h4><a
                                                href="{{asset('/product/'.$list_prod_new[$nameArr][$index]->prod_id)}}">{{$list_prod_new[$nameArr][$index]->prod_name}}</a>
                                        </h4>
                                        <p><span class="price">$320.45</span><del class="prev-price">$400.50</del></p>
                                        <div class="label-product l_sale">30<span class="symbol-percent">%</span></div>
                                    </div>
                                    <div class="pro-actions">
                                        <div class="actions-primary">
                                            <a href="cart.html" title="Add to Cart"> + Thêm vào giỏ hàng</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Product Content End -->
                                <span class="sticker-new">new</span>
                    </div>
                    @endif
                    @php
                    $index++;
                    @endphp
            </div>
            @endwhile
        </div>
        <!-- Arrivals Product Activation End Here -->
    </div>
    @else
    <div id="{{$list_cate_new[$i]->cate_slug}}" class="tab-pane fade">
        <!-- Arrivals Product Activation Start Here -->
        <div class="electronics-pro-active owl-carousel">
            <!-- Double Product Start -->
            @php
            $nameArr = 'by_cate_'.$list_cate_new[$i]->cate_id;
            $index = 0;
            @endphp
            @while ($index < count($list_prod_new[$nameArr])) <div class="double-product">
                <!-- Single Product Start -->
                <div class="single-product">
                    <!-- Product Image Start -->
                    <div class="pro-img">
                        <a href="{{asset('/product/'.$list_prod_new[$nameArr][$index]->prod_id)}}">
                            <img class="primary-img"
                                src="{{asset('local/storage/app/images/product/'.$list_prod_new[$nameArr][$index]->prod_poster)}}"
                                alt="single-product">
                        </a>
                    </div>
                    <!-- Product Image End -->
                    <!-- Product Content Start -->
                    <div class="pro-content">
                        <div class="pro-info">
                            <h4><a
                                    href="{{asset('/product/'.$list_prod_new[$nameArr][$index]->prod_id)}}">{{$list_prod_new[$nameArr][$index]->prod_name}}</a>
                            </h4>
                            <p><span class="price">$320.45</span><del class="prev-price">$400.50</del></p>
                            <div class="label-product l_sale">30<span class="symbol-percent">%</span></div>
                        </div>
                        <div class="pro-actions">
                            <div class="actions-primary">
                                <a href="cart.html" title="Add to Cart"> + Thêm vào giỏ hàng</a>
                            </div>
                        </div>
                    </div>
                    <!-- Product Content End -->
                    <span class="sticker-new">new</span>
                </div>
                <!-- Single Product End -->
                @php
                $index++;
                @endphp

                @if ($index < count($list_prod_new[$nameArr])) <div class="single-product">
                    <!-- Product Image Start -->
                    <div class="pro-img">
                        <a href="{{asset('/product/'.$list_prod_new[$nameArr][$index]->prod_id)}}">
                            <img class="primary-img"
                                src="{{asset('local/storage/app/images/product/'.$list_prod_new[$nameArr][$index]->prod_poster)}}"
                                alt="single-product">
                        </a>
                    </div>
                    <!-- Product Image End -->
                    <!-- Product Content Start -->
                    <div class="pro-content">
                        <div class="pro-info">
                            <h4><a
                                    href="{{asset('/product/'.$list_prod_new[$nameArr][$index]->prod_id)}}">{{$list_prod_new[$nameArr][$index]->prod_name}}</a>
                            </h4>
                            <p><span class="price">$320.45</span><del class="prev-price">$400.50</del></p>
                            <div class="label-product l_sale">30<span class="symbol-percent">%</span></div>
                        </div>
                        <div class="pro-actions">
                            <div class="actions-primary">
                                <a href="cart.html" title="Add to Cart"> + Thêm vào giỏ hàng</a>
                            </div>
                        </div>
                    </div>
                    <!-- Product Content End -->
                    <span class="sticker-new">new</span>
        </div>
        @endif
        @php
        $index++;
        @endphp
    </div>
    @endwhile
</div>
<!-- Arrivals Product Activation End Here -->
</div>
@endif
@endfor
</div>
<!-- Tab Content End -->
</div>
<!-- main-product-tab-area-->
</div>
<!-- Container End -->
</div>
<!-- Arrivals Products Area End Here -->
<!-- Arrivals Products Area Start Here -->
@foreach ($list_cate_featured as $item)
<div class="second-arrivals-product pb-45 pb-sm-5">
    <div class="container">
        <div class="main-product-tab-area">
            <div class="tab-menu mb-25">
                <div class="section-ttitle">
                    <h2>{{mb_strtoupper($item->cate_name,'UTF-8')}} NỔI BẬT NHẤT</h2>
                </div>
                <!-- Nav tabs -->
                <ul class="nav tabs-area" role="tablist">
                    @php
                    $nameCate = 'by_cate_'.$item->cate_id;
                    $brand_by_cate = $list_brand_featured[$nameCate];
                    @endphp
                    @for ($i = 0; $i < count($brand_by_cate); $i++) @if ($i==0) <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab"
                            href="#{{$brand_by_cate[$i]->brand_name.''.$item->cate_id}}">{{$brand_by_cate[$i]->brand_name}}</a>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab"
                                href="#{{$brand_by_cate[$i]->brand_name.''.$item->cate_id}}">{{$brand_by_cate[$i]->brand_name}}</a>
                        </li>
                        @endif
                        @endfor
                </ul>
            </div>

            <!-- Tab Contetn Start -->
            <div class="tab-content">
                @php
                $nameCate = 'by_cate_'.$item->cate_id;
                $brand_by_cate = $list_brand_featured[$nameCate];
                @endphp
                @for ($i = 0; $i < count($brand_by_cate); $i++) @if ($i==0) <div
                    id="{{$brand_by_cate[$i]->brand_name.''.$item->cate_id}}" class="tab-pane fade show active">
                    <!-- Arrivals Product Activation Start Here -->
                    <div class="best-seller-pro-active owl-carousel">
                        <!-- Single Product Start -->
                        @php
                        $nameBrand = $nameCate.'_by_brand_'.$brand_by_cate[$i]->brand_id;
                        $product_by_brand = $list_prod_featured[$nameBrand];
                        @endphp
                        @foreach ($product_by_brand as $prod)
                        <div class="single-product">
                            <!-- Product Image Start -->
                            <div class="pro-img">
                                <a href="{{asset('/product/'.$prod->prod_id)}}">
                                    <img class="primary-img"
                                        src="{{asset('local/storage/app/images/product/'.$prod->prod_poster)}}"
                                        alt="single-product">
                                </a>
                            </div>
                            <!-- Product Image End -->
                            <!-- Product Content Start -->
                            <div class="pro-content">
                                <div class="pro-info">
                                    <h4><a href="{{asset('/product/'.$prod->prod_id)}}">{{$prod->prod_name}}</a></h4>
                                    <p><span class="price">$320.45</span></p>
                                </div>
                                <div class="pro-actions">
                                    <div class="actions-primary">
                                        <a href="cart.html" title="Add to Cart"> + Thêm vào giỏ hàng</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Product Content End -->
                        </div>
                        @endforeach
                        <!-- Single Product End -->
                    </div>
                    <!-- Arrivals Product Activation End Here -->
            </div>
            @else
            <div id="{{$brand_by_cate[$i]->brand_name.''.$item->cate_id}}" class="tab-pane fade show active">
                <!-- Arrivals Product Activation Start Here -->
                <div class="best-seller-pro-active owl-carousel">
                    <!-- Single Product Start -->
                    @php
                    $nameBrand = $nameCate.'_by_brand_'.$brand_by_cate[$i]->brand_id;
                    $product_by_brand = $list_prod_featured[$nameBrand];
                    @endphp
                    @foreach ($product_by_brand as $prod)
                    <div class="single-product">
                        <!-- Product Image Start -->
                        <div class="pro-img">
                            <a href="{{asset('/product/'.$prod->prod_id)}}">
                                <img class="primary-img"
                                    src="{{asset('local/storage/app/images/product/'.$prod->prod_poster)}}"
                                    alt="single-product">
                            </a>
                        </div>
                        <!-- Product Image End -->
                        <!-- Product Content Start -->
                        <div class="pro-content">
                            <div class="pro-info">
                                <h4><a href="{{asset('/product/'.$prod->prod_id)}}">{{$prod->prod_name}}</a></h4>
                                <p><span class="price">$320.45</span></p>
                            </div>
                            <div class="pro-actions">
                                <div class="actions-primary">
                                    <a href="cart.html" title="Add to Cart"> + Thêm vào giỏ hàng</a>
                                </div>
                            </div>
                        </div>
                        <!-- Product Content End -->
                    </div>
                    @endforeach
                    <!-- Single Product End -->
                </div>
                <!-- Arrivals Product Activation End Here -->
            </div>
            @endif
            @endfor

        </div>
        <!-- Tab Content End -->
    </div>
    <!-- main-product-tab-area-->
</div>
<!-- Container End -->
</div>
@endforeach
<!-- Arrivals Products Area End Here -->
<!-- Brand Banner Area Start Here -->
<div class="main-brand-banner pt-95 pb-100 pt-sm-55 pb-sm-60">
    <div class="container">
        <div class="section-ttitle mb-20">
            <h2>Thương hiệu nổi tiếng</h2>
        </div>
        <div class="row no-gutters">
            <div class="col-lg-3">
                <div class="col-img">
                    <img src="img/banner/h1-band1.jpg" alt="">
                </div>
            </div>
            <div class="col-lg-6">
                <!-- Brand Banner Start -->
                <div class="brand-banner owl-carousel">
                    <div class="single-brand">
                        <a href="#"><img class="img" src="img/brand/1.jpg" alt="brand-image"></a>
                        <a href="#"><img src="img/brand/2.jpg" alt="brand-image"></a>
                        <a href="#"><img src="img/brand/3.jpg" alt="brand-image"></a>
                    </div>
                    <div class="single-brand">
                        <a href="#"><img class="img" src="img/brand/1.jpg" alt="brand-image"></a>
                        <a href="#"><img src="img/brand/2.jpg" alt="brand-image"></a>
                        <a href="#"><img src="img/brand/3.jpg" alt="brand-image"></a>
                    </div>
                    <div class="single-brand">
                        <a href="#"><img src="img/brand/1.jpg" alt="brand-image"></a>
                        <a href="#"><img src="img/brand/2.jpg" alt="brand-image"></a>
                        <a href="#"><img src="img/brand/3.jpg" alt="brand-image"></a>

                    </div>
                    <div class="single-brand">
                        <a href="#"><img src="img/brand/2.jpg" alt="brand-image"></a>
                        <a href="#"><img src="img/brand/3.jpg" alt="brand-image"></a>
                        <a href="#"><img src="img/brand/4.jpg" alt="brand-image"></a>
                    </div>
                    <div class="single-brand">
                        <a href="#"><img src="img/brand/2.jpg" alt="brand-image"></a>
                        <a href="#"><img src="img/brand/3.jpg" alt="brand-image"></a>
                        <a href="#"><img src="img/brand/4.jpg" alt="brand-image"></a>
                    </div>
                    <div class="single-brand">
                        <a href="#"><img src="img/brand/2.jpg" alt="brand-image"></a>
                        <a href="#"><img src="img/brand/3.jpg" alt="brand-image"></a>
                        <a href="#"><img src="img/brand/4.jpg" alt="brand-image"></a>
                    </div>
                    <div class="single-brand">
                        <a href="#"><img src="img/brand/2.jpg" alt="brand-image"></a>
                        <a href="#"><img src="img/brand/3.jpg" alt="brand-image"></a>
                        <a href="#"><img src="img/brand/4.jpg" alt="brand-image"></a>
                    </div>
                </div>
                <!-- Brand Banner End -->

            </div>
            <div class="col-lg-3">
                <div class="col-img">
                    <img src="img/banner/h1-band2.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Container End -->
</div>
<!-- Brand Banner Area End Here -->
@endsection