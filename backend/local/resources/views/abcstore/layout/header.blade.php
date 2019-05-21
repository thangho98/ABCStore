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
                        <a href="index.html"><img src="img/logo/logo.png" alt="logo-image"></a>
                    </div>
                </div>
                <!-- Categorie Search Box Start Here -->
                <div class="col-lg-5 col-md-8 ml-auto mr-auto col-10">
                    <div class="categorie-search-box">
                        <form action="#">
                            <div class="form-group">
                                <select class="bootstrap-select" name="poscats">
                                    <option value="0">Tất cả</option>
                                    @foreach ($list_cate as $item)
                                        <option value="{{$item->cate_id}}">{{$item->cate_name}}</option> 
                                    @endforeach
                                </select>
                            </div>
                            <input type="text" name="search" placeholder="Bạn muốn tìm gì...">
                            <button><i class="lnr lnr-magnifier"></i></button>
                        </form>
                    </div>
                </div>
                <!-- Categorie Search Box End Here -->
                <!-- Cart Box Start Here -->
                <div class="col-lg-4 col-md-12">
                    <div class="cart-box mt-all-30">
                        <ul class="d-flex justify-content-lg-end justify-content-center align-items-center">
                            <li>
                                <a href="#">
                                    <i class="lnr lnr-cart"></i><span class="my-cart">
                                        <span class="total-pro">2</span><span>Giỏ hàng</span></span>
                                </a>
                                <ul class="ht-dropdown cart-box-width">
                                    <li>
                                        <!-- Cart Box Start -->
                                        <div class="single-cart-box">
                                            <div class="cart-img">
                                                <a href="#"><img src="img/products/1.jpg" alt="cart-image"></a>
                                                <span class="pro-quantity">1X</span>
                                            </div>
                                            <div class="cart-content">
                                                <h6><a href="product.html">Printed Summer Red </a></h6>
                                                <span class="cart-price">27.45</span>
                                                <span>Size: S</span>
                                                <span>Color: Yellow</span>
                                            </div>
                                            <a class="del-icone" href="#"><i class="ion-close"></i></a>
                                        </div>
                                        <!-- Cart Box End -->
                                        <!-- Cart Box Start -->
                                        <div class="single-cart-box">
                                            <div class="cart-img">
                                                <a href="#"><img src="img/products/2.jpg" alt="cart-image"></a>
                                                <span class="pro-quantity">1X</span>
                                            </div>
                                            <div class="cart-content">
                                                <h6><a href="product.html">Printed Round Neck</a></h6>
                                                <span class="cart-price">45.00</span>
                                                <span>Size: XL</span>
                                                <span>Color: Green</span>
                                            </div>
                                            <a class="del-icone" href="#"><i class="ion-close"></i></a>
                                        </div>
                                        <!-- Cart Box End -->
                                        <!-- Cart Footer Inner Start -->
                                        <div class="cart-footer">
                                            <ul class="price-content">
                                                <li>Subtotal <span>$57.95</span></li>
                                                <li>Shipping <span>$7.00</span></li>
                                                <li>Taxes <span>$0.00</span></li>
                                                <li>Total <span>$64.95</span></li>
                                            </ul>
                                            <div class="cart-actions text-center">
                                                <a class="cart-checkout" href="checkout.html">Thanh Toán</a>
                                            </div>
                                        </div>
                                        <!-- Cart Footer Inner End -->
                                    </li>
                                </ul>
                            </li>
                            <li>
                            </li>
                            <li>
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
                            <li class="active"><a href="index.html">Trang Chủ</a></li>
                            <li><a href="shop.html">Cửa hàng<i class="fa fa-angle-down"></i></a>
                                <!-- Home Version Dropdown Start -->
                                <ul class="ht-dropdown dropdown-style-two">
                                    <li><a href="product.html">chi tiết sản phẩm</a></li>
                                    <li><a href="compare.html">so sánh</a></li>
                                    <li><a href="cart.html">giỏ hàng</a></li>
                                    <li><a href="checkout.html">thanh toán</a></li>
                                </ul>
                                <!-- Home Version Dropdown End -->
                            </li>
                            <li><a href="about.html">Thông tin</a></li>
                            <li><a href="contact.html">Liên hệ</a></li>
                        </ul>
                    </nav>
                    <div class="mobile-menu d-block d-lg-none">
                        <nav>
                            <ul>
                                <li><a href="shop.html">Cửa hàng</a>
                                    <!-- Mobile Menu Dropdown Start -->
                                    <ul>
                                        <li><a href="product.html">chi tiết sản phẩm</a></li>
                                        <li><a href="compare.html">so sánh</a></li>
                                        <li><a href="cart.html">giỏ hàng</a></li>
                                        <li><a href="checkout.html">thanh toán</a></li>
                                    </ul>
                                    <!-- Mobile Menu Dropdown End -->
                                </li>
                                <li><a href="about.html">Thông tin</a></li>
                                <li><a href="contact.html">Liên hệ</a></li>
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