@extends('abcstore.layout.master')
@section('title','Hoàn thành')
@section('main')
<div class="main-page-banner home-3">
    <div class="container">
        <div class="row">
            <!-- Vertical Menu Start Here -->
            <div class="col-xl-3 col-lg-4 d-none d-lg-block">
                <div class="vertical-menu mb-all-30">
                    <nav>
                        <ul class="vertical-menu-list">
                            <li>
                                <a href="shop.html"><span><img src="img/vertical-menu/4.png" alt="menu-icon"></span>Điện
                                    thoại</a>
                            </li>
                            <li>
                                <a href="shop.html"><span><img src="img/vertical-menu/8.png" alt="menu-icon"></span>Máy
                                    tính bảng</a>
                            </li>
                            <li>
                                <a href="shop.html"><span><img src="img/vertical-menu/9.png"
                                            alt="menu-icon"></span>Laptop</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- Vertical Menu End Here -->
        </div>
        <!-- Row End -->
    </div>
    <!-- Container End -->
</div>
<!-- Categorie Menu & Slider Area End Here -->
<!-- Breadcrumb Start -->
<div class="breadcrumb-area mt-30">
    <div class="container">
        <div class="breadcrumb">
            <ul class="d-flex align-items-center">
                <li><a href="index.html">Trang chủ</a></li>
                <li class="active"><a href="complete.html">hoàn thành</a></li>
            </ul>
        </div>
    </div>
    <!-- Container End -->
</div>
<!-- Breadcrumb End -->
<!-- About Us Start Here -->
<div class="about-us pt-30 pb-30 pt-sm-60">
    <div class="container ">
        <div class="row text-center justify-content-center pb-10">
            <div id="complete" class="col-auto">
                <p class="info">Quý khách đã đặt hàng thành công!</p>
                <p>• Hóa đơn mua hàng của Quý khách đã được chuyển đến Địa chỉ Email có trong phần Thông tin
                    Khách hàng
                    của chúng Tôi</p>
                <p>• Sản phẩm của Quý khách sẽ được chuyển đến Địa có trong phần Thông tin Khách hàng của chúng
                    Tôi sau
                    thời gian 2 đến 3 ngày, tính từ thời điểm này.</p>
                <p>• Nhân viên giao hàng sẽ liên hệ với Quý khách qua Số Điện thoại trước khi giao hàng 24 tiếng
                </p>
                <p>• Trụ sở chính: B8A Võ Văn Dũng - Hoàng Cầu Đống Đa - Hà Nội</p>
                <p>Cám ơn Quý khách đã sử dụng Sản phẩm của Công ty chúng Tôi!</p>

            </div>
        </div>
        <div class="row">
            <a href="{{asset('/')}}" class="ml-auto pt-15" style="padding-right: 96px"><button type="button"
                    class="btn btn-success">Quay lại
                    trang
                    chủ</button></a>
        </div>
    </div>
</div>
<!-- About Us End Here -->
@endsection