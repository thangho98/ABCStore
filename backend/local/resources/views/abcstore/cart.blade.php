@extends('abcstore.layout.master')
@section('title','Giỏ hàng')
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
                <li><a href="index.html">Trang Chủ</a></li>
                <li class="active"><a href="{{asset('cart/show')}}">Giỏ hàng</a></li>
            </ul>
        </div>
    </div>
    <!-- Container End -->
</div>
<!-- Breadcrumb End -->
<!-- Cart Main Area Start -->
<div class="cart-main-area ptb-100 ptb-sm-60">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <!-- Form Start -->
                <form action="#">
                    <!-- Table Content Start -->
                    <div class="table-content table-responsive mb-45">
                        <table>
                            <thead>
                                <tr>
                                    <th class="product-thumbnail">Ảnh</th>
                                    <th class="product-name">Tên sản phẩm</th>
                                    <th class="product-price">Giá</th>
                                    <th class="product-quantity">Số lượng</th>
                                    <th class="product-subtotal">Thành tiền</th>
                                    <th class="product-remove">Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($content as $item)
                                    <tr>
                                        <td class="product-thumbnail">
                                            <img src="{{asset('local/storage/app/images/product/'.$item['attributes']->prod_img)}}" alt="cart-image" />
                                        </td>
                                        <td class="product-name"><a href="{{asset('product/'.$item['attributes']->propt_prod)}}">{{$item->name}}   
                                            Ram: {{$item->attributes['propt_ram']}} gb
                                            Rom: {{$item->attributes['propt_rom']}} 
                                            Màu: {{$item->attributes['propt_color']}}</a>
                                        </td>
                                        <td class="product-price"><span class="amount">{{number_format($item->price,0,',','.')}} VNĐ</span></td>
                                        <td class="product-quantity"><input type="number" min="1" value="{{$item->quantity}}" onchange="updateCart(this.value,'{{$item->id}}')" /></td>
                                        <td class="product-subtotal">{{number_format($item->price*$item->quantity,0,',','.')}} VNĐ</td>
                                        <td class="product-remove"> 
                                            <a href="{{asset('cart/delete/'.$item->id)}}"><i class="fa fa-times"
                                                    aria-hidden="true"></i></a>
                                                </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <!-- Table Content Start -->
                    <div class="row">
                        <!-- Cart Button Start -->
                        <div class="col-md-8 col-sm-12">
                            <div class="buttons-cart">
                                <a href="{{asset('/cart/delete/all')}}">Hủy giỏ hàng</a>
                                <a href="{{asset('/')}}">Tiếp tục mua sắm</a>
                            </div>
                        </div>
                        <!-- Cart Button Start -->
                        <!-- Cart Totals Start -->
                        <div class="col-md-4 col-sm-12">
                            <div class="cart_totals float-md-right text-md-right">
                                <h2>Tổng tiền giỏ hàng</h2>
                                <br />
                                <table class="float-md-right">
                                    <tbody>
                                        {{-- <tr class="cart-subtotal">
                                            <th>Giá tiền</th>
                                            <td><span class="amount">$215.00</span></td>
                                        </tr>
                                        <tr class="cart-subtotal">
                                            <th>Phụ phí</th>
                                            <td><span class="amount">$215.00</span></td>
                                        </tr> --}}
                                        <tr class="order-total">
                                            <th>Tổng tiền</th>
                                            <td>
                                                <strong><span class="amount">{{number_format($totalprice,0,',','.')}} VNĐ</span></strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="wc-proceed-to-checkout">
                                    <a href="{{asset('cart/checkout')}}">Tiến hành thanh Toán</a>
                                </div>
                            </div>
                        </div>
                        <!-- Cart Totals End -->
                    </div>
                    <!-- Row End -->
                </form>
                <!-- Form End -->
            </div>
        </div>
        <!-- Row End -->
    </div>
</div>
<!-- Cart Main Area End -->
@endsection
@section('scriptjs')
<script>
    function updateCart(qty, id){
		$.get(
			"{{asset('cart/update')}}",
			{qty:qty, id:id},
			function(){
				location.reload();
			}
		);
	}
</script>
@endsection