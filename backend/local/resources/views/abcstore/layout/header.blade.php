<!-- Banner Popup Start -->
<div class="popup_banner">
    <!-- <span class="popup_off_banner">×</span> -->
    <div class="banner_popup_area">
        <img src="{{asset('local/storage/app/images/banner/1200-75-1200x75-(1).png')}}" alt="">
    </div>
</div>
<!-- Banner Popup End -->
<!-- Newsletter Popup Start -->
<div class="popup_wrapper">
    <div class="test">
        <span class="popup_off">Đóng</span>
        <div class="subscribe_area text-center mt-60">
            <h2>Thư mới</h2>
            <p>Đăng ký vào danh sách gửi thư ABCSTORE để nhận thông tin cập nhật về hàng mới, ưu đãi đặc biệt và
                thông tin giảm giá khác.</p>
            <div class="subscribe-form-group">
                <form action="#">
                    <input autocomplete="off" type="text" name="message" id="message"
                        placeholder="Nhập email của bạn...">
                    <button type="submit">đăng kí</button>
                </form>
            </div>
            <div class="subscribe-bottom mt-15">
                <input type="checkbox" id="newsletter-permission">
                <label for="newsletter-permission">Không hiện thị lại</label>
            </div>
        </div>
    </div>
</div>
<!-- Newsletter Popup End -->
<!-- Main Header Area Start Here -->
<header>
    <!-- Header Top Start Here -->
    <div class="header-top-area">
        <div class="container">
            <!-- Header Top Start -->
            <div class="header-top">
                <ul>
                    <li><i class="lnr lnr-phone-handset"></i> +(84) 328118182</li>
                    <li><i class="lnr lnr-envelope"></i> abcstore@gmail.com</li>
                    <li><i class="lnr lnr-map-marker"></i> Linh Trung, Thủ Đức, Tp.HCM</li>
                </ul>
            </div>
            <!-- Header Top End -->
        </div>
        <!-- Container End -->
    </div>
    <!-- Header Top End Here -->
    <!-- Header Middle Start Here -->
    <div class="header-middle ptb-15">
        <div class="container">
            <div class="row align-items-center no-gutters">
                <div class="col-lg-3 col-md-12">
                    <div class="logo mb-all-30">
                        <a href="{{asset('/')}}"><img src="{{asset('public/abcstore')}}/img/logo/logo.png" alt="logo-image"></a>
                    </div>
                </div>
                <!-- Categorie Search Box Start Here -->
                <div class="col-lg-5 col-md-8 ml-auto mr-auto col-10">
                    <div class="categorie-search-box">
                        <form action="{{asset('search/')}}">
                            <div class="form-group">
                                <select class="bootstrap-select" name="category">
                                    <option value="all">Tất cả</option>
                                    @foreach ($list_cate as $item)
                                    <option value="{{$item->cate_id}}">{{$item->cate_name}}</option> 
                                    @endforeach
                                </select>
                            </div>
                            <input type="text" name="search" placeholder="Bạn tìm gì...">
                            <button type="submit"><i class="lnr lnr-magnifier"></i></button>
                        </form>
                    </div>
                </div>
                <!-- Categorie Search Box End Here -->
                <!-- Cart Box Start Here -->
                <div class="col-lg-4 col-md-12">
                    <div class="cart-box mt-all-30">
                        <ul class="d-flex justify-content-lg-center justify-content-center align-items-center">
                            <li>
                                <a href="{{asset('cart/show')}}">
                                    <i class="lnr lnr-cart"></i><span class="my-cart">
                                        <span class="total-pro">{{count(Cart::getContent())}}</span><span>Giỏ hàng</span></span>
                                </a>
                                @if (!Cart::isEmpty())
                                <ul class="ht-dropdown cart-box-width">
                                    <li>
                                        @foreach (Cart::getContent() as $item)
                                            <!-- Cart Box Start -->
                                        <div class="single-cart-box">
                                            <div class="cart-img">
                                                <a href="{{asset('product/'.$item['attributes']->propt_prod)}}"><img src="{{asset('local/storage/app/images/product/'.$item['attributes']->prod_img)}}" alt="cart-image"></a>
                                                <span class="pro-quantity">1X</span>
                                            </div>
                                            <div class="cart-content">
                                                <h6><a href="product.html">{{$item->name}}</a></h6>
                                                <span class="cart-price">{{number_format($item->price,0,',','.')}}</span>
                                                <span>Ram: {{$item['attributes']->propt_ram}} gb, Rom: {{$item['attributes']->propt_rom}}</span>
                                                <span>Màu: {{$item['attributes']->propt_color}}</span>
                                            </div>
                                            <a class="del-icone" href="{{asset('cart/delete/'.$item->id)}}"><i class="ion-close"></i></a>
                                        </div>
                                        <!-- Cart Box End -->
                                        @endforeach
                                        <!-- Cart Footer Inner Start -->
                                        <div class="cart-footer">
                                            <ul class="price-content">
                                                <li>Tổng sản phẩm: <span>{{Cart::getTotalQuantity()}}</span></li>
                                                <li>Tổng tiền <span>{{number_format(Cart::getTotal(),0,',','.')}} VNĐ</span></li>
                                            </ul>
                                            <div class="cart-actions text-center">
                                                <a class="cart-checkout" href="{{asset('cart/checkout')}}">Thanh Toán</a>
                                            </div>
                                        </div>
                                        <!-- Cart Footer Inner End -->
                                    </li>
                                </ul>
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Cart Box End Here -->
            </div>
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </div>
    <!-- Header Middle End Here -->
    <!-- Header Bottom Start Here -->
    <div class="header-bottom  header-sticky">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-3 col-lg-4 col-md-6 vertical-menu d-none d-lg-block">
                    <span class="categorie-title">Danh mục sản phẩm </span>
                </div>
                <div class="col-xl-9 col-lg-8 col-md-12 ">
                    <nav class="d-none d-lg-block">
                        <ul class="header-bottom-list d-flex">
                            <li class="active"><a href="{{asset('/')}}">Trang Chủ</a></li>
                            <li><a href="{{asset('/shop')}}">Cửa hàng</a></li>
                            <li><a href="{{asset('/about')}}">Thông tin</a></li>
                            <li><a href="{{asset('/contact')}}">Liên hệ</a></li>
                        </ul>
                    </nav>
                    <div class="mobile-menu d-block d-lg-none">
                        <nav>
                            <ul>
                                <li><a href="{{asset('/shop')}}">Cửa hàng</a>
                                </li>
                                <li><a href="{{asset('/about')}}">Thông tin</a></li>
                                <li><a href="{{asset('/contact')}}">Liên hệ</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- Row End -->
        </div>
        <!-- Container End -->
    </div>
    <!-- Header Bottom End Here -->
    <!-- Mobile Vertical Menu Start Here -->
    <div class="container d-block d-lg-none">
        <div class="vertical-menu mt-30">
            <span class="categorie-title mobile-categorei-menu">Danh mục sản phẩm</span>
            <nav>
                <div id="cate-mobile-toggle"
                    class="category-menu sidebar-menu sidbar-style mobile-categorei-menu-list menu-hidden ">
                    <ul>
                        @foreach ($list_cate as $item)
                            <li class="has-sub"><a href="#">{{$item->cate_name}}</a>
                                <!-- category submenu end-->
                            </li>
                        @endforeach
                    </ul>
                </div>
                <!-- category-menu-end -->
            </nav>
        </div>
    </div>
    <!-- Mobile Vertical Menu Start End -->
</header>
<!-- Main Header Area End Here -->