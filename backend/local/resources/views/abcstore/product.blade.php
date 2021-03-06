@extends('abcstore.layout.master')
@section('title','Sản phẩm')
@section('main')
<!-- Categorie Menu & Slider Area Start Here -->
{{-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous"> --}}
<div class="main-page-banner home-3">
    <div class="container">
        <div class="row">
            <!-- Vertical Menu Start Here -->
            <div class="col-xl-3 col-lg-4 d-none d-lg-block">
                <div class="vertical-menu mb-all-30">
                    <nav>
                        <ul class="vertical-menu-list">
                            <li>
                                <a href="shop.html"><span><img src="img/vertical-menu/4.png"
                                            alt="menu-icon"></span>Điện thoại</a>
                            </li>
                            <li>
                                <a href="shop.html"><span><img src="img/vertical-menu/8.png"
                                            alt="menu-icon"></span>Máy tính bảng</a>
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
                <li><a href="shop.html">Cửa hàng</a></li>
                <li class="active"><a href="product.html">Sản phẩm</a></li>
            </ul>
        </div>
    </div>
    <!-- Container End -->
</div>
<!-- Breadcrumb End -->
<!-- Product Thumbnail Start -->
<div class="main-product-thumbnail ptb-100 ptb-sm-60">
    <div class="container">
        <div class="thumb-bg">
            <div class="row">
                <!-- Main Thumbnail Image Start -->
                <div class="col-lg-5 mb-all-40">
                    <!-- Thumbnail Large Image start -->
                    <div class="tab-content">
                        @for ($i = 0; $i < count($list_image); $i++)
                            @if ($i == 0)
                                <div id="thumb{{$i}}" class="tab-pane fade show active">
                                    <a data-fancybox="images" href="{{asset('local/storage/app/images/product/'.$list_image[$i]->pimg_name)}}"><img src="{{asset('local/storage/app/images/product/'.$list_image[$i]->pimg_name)}}"
                                            alt="product-view"></a>
                                </div>
                            @else
                                <div id="thumb{{$i}}" class="tab-pane fade">
                                    <a data-fancybox="images" href="{{asset('local/storage/app/images/product/'.$list_image[$i]->pimg_name)}}"><img src="{{asset('local/storage/app/images/product/'.$list_image[$i]->pimg_name)}}"
                                        alt="product-view"></a>
                                </div>
                            @endif
                        @endfor
                    </div>
                    <!-- Thumbnail Large Image End -->
                    <!-- Thumbnail Image End -->
                    <div class="product-thumbnail mt-15">
                        <div class="thumb-menu owl-carousel nav tabs-area" role="tablist">
                            @for ($i = 0; $i < count($list_image); $i++)
                            @if ($i == 0)
                                <a class="active" data-toggle="tab" href="#thumb{{$i}}"><img src="{{asset('local/storage/app/images/product/'.$list_image[$i]->pimg_name)}}"
                                alt="product-thumbnail"></a>
                            @else
                            <a data-toggle="tab" href="#thumb2"><img src="{{asset('local/storage/app/images/product/'.$list_image[$i]->pimg_name)}}"
                                alt="product-thumbnail"></a>
                            @endif
                            @endfor
                        </div>
                    </div>
                    <!-- Thumbnail image end -->
                </div>
                <!-- Main Thumbnail Image End -->
                <!-- Thumbnail Description Start -->
                <div class="col-lg-7">
                    <div class="thubnail-desc fix">
                        <h3 class="product-header">{{$product->prod_name}}</h3>
                        <div class="rating-summary fix mtb-10">
                            <div class="rating">
                                @for ($i = 0; $i < 5; $i++)
                                    @if ($i <$avg_voted)
                                        <i class="fa fa-star yellow-st"></i>
                                    @else
                                        <i class="fa fa-star gray-st"></i>
                                    @endif
                                @endfor
                            </div>
                            <div class="rating-feedback">
                                ({{count($list_comment)}} đánh giá)
                                <a>thêm bình luận</a>
                            </div>
                        </div>
                        <div class="pro-price mtb-30">
                            <p class="d-flex align-items-center"><span class="prev-price">16.51</span><span
                                    class="price">$15.19</span><span class="saving-price">save 8%</span></p>
                        </div>
                        <div class="product-size mb-20 clearfix">
                            <label>Bộ nhớ</label>
                            <select class="memory" name="memory">
                                @foreach ($list_memory as $item)
                                    <option value="{{$item->propt_ram}}-{{$item->propt_rom}}">ram {{$item->propt_ram}}gb - rom {{$item->propt_rom}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="color clearfix mb-20">
                            <label>Màu sắc</label>
                            {{-- <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                @for ($i = 0; $i < count($list_color); $i++)
                                @if ($i==0)
                                    <label class="btn btn-light active">
                                        <input type="radio" name="color" id="option1" autocomplete="off" checked> {{$list_color[$i]->propt_color}}
                                    </label>
                                @else
                                    <label class="btn btn-light">
                                        <input type="radio" name="color" id="option1" autocomplete="off"> {{$list_color[$i]->propt_color}}
                                    </label>
                                @endif  
                                @endfor
                            </div> --}}
                            <div class="mycheckbox">
                                <form action="" hidden>
                                    <input type="radio" name="color-select" value="gray"> Xám<br>
                                    <input type="radio" name="color-select" value="silver"> Bạc<br>
                                    <input type="radio" name="color-select" value="black"> Đen
                                </form>
                                <div class="item-checkbox">
                                    Xám
                                </div>
                                <div class="item-checkbox">
                                    Bạc
                                </div>
                                <div class="item-checkbox">
                                    Đen
                                </div>
                            </div>
                        </div>
                        <div class="box-quantity d-flex hot-product2">
                            <form action="#">
                                <input class="quantity mr-15" type="number" min="1" value="1">
                            </form>
                            <div class="pro-actions">
                                <div class="actions-primary">
                                    <a href="cart.html" title="" data-original-title="Add to Cart"> + Thêm vào
                                        giỏ hàng</a>
                                </div>
                            </div>
                        </div>
                        <div class="pro-ref mt-20">
                            <p><span class="in-stock"><i class="ion-checkmark-round"></i> Còn hàng</span></p>
                        </div>
                        <div class="socila-sharing mt-25">
                            <ul class="d-flex">
                                <li>Chia sẻ</li>
                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus-official"
                                            aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Thumbnail Description End -->
            </div>
            <!-- Row End -->
        </div>
    </div>
    <!-- Container End -->
</div>
<!-- Product Thumbnail End -->
<!-- Product Thumbnail Description Start -->
<div class="thumnail-desc pb-100 pb-sm-60">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <ul class="main-thumb-desc nav tabs-area" role="tablist">
                    <li><a class="active" data-toggle="tab" href="#dtail">Thông số kĩ thuật</a></li>
                    <li><a data-toggle="tab" href="#review">Đánh giá</a></li>
                </ul>
                <!-- Product Thumbnail Tab Content Start -->
                <div class="tab-content thumb-content border-default">
                    <div id="dtail" class="tab-pane fade show active">
                        @php
                            $lines = explode("\n",$product->prod_detail);
                        @endphp
                        @foreach ($lines as $item)
                            <small>{{$item}}</small><br>
                        @endforeach
                    </div>
                    <div id="review" class="tab-pane fade">
                        <!-- Reviews Start -->
                        <div class="review border-default universal-padding">
                            <div class="group-title">
                                <h2>Đánh giá từ khách hàng</h2>
                            </div>
                            @foreach ($list_comment as $item)
                            <h4 class="review-mini-title">{{$item->cmt_name}}</h4>
                            <ul class="review-list">
                                <!-- Single Review List Start -->
                                <li>
                                    <span>Điểm đánh giá</span>
                                    @for ($i = 0; $i < 5; $i++)
                                        @if ($i < $item->cmt_voted)
                                            <i class="fa fa-star yellow-st"></i>
                                        @else
                                            <i class="fa fa-star gray-st"></i>
                                        @endif
                                    @endfor
                                    <label>{{$item->cmt_content}}</label>
                                </li>
                                <!-- Single Review List End -->
                            </ul>
                            @endforeach
                        </div>
                        <!-- Reviews End -->
                        <!-- Reviews Start -->
                        <div class="review border-default universal-padding mt-30">
                            <h2 class="review-title mb-30">Nhận xét của bạn về sản phẩm: <br>
                                <span>{{$product->prod_name}}</span></h2>
                            <p class="review-mini-title">Đánh giá của bạn</p>
                            <form method="POST">
                            <ul class="review-list">
                                <!-- Single Review List Start -->
                                <li>
                                    <span>đánh giá</span>
                                    <input id="counting-star" type="number" name="voted" value="1" min="1"
                                        max="5" hidden>
                                    <div>
                                        <i class="fa fa-star votes yellow-st"></i>
                                        <i class="fa fa-star votes gray-st"></i>
                                        <i class="fa fa-star votes gray-st"></i>
                                        <i class="fa fa-star votes gray-st"></i>
                                        <i class="fa fa-star votes gray-st"></i>
                                    </div>

                                </li>
                                <!-- Single Review List End -->
                            </ul>
                            <!-- Reviews Field Start -->
                            <div class="riview-field mt-40">
                                    <div class="form-group">
                                        <label class="req" for="sure-name">Tên</label>
                                        <input type="text" class="form-control" id="sure-name" name="name"
                                            required="required">
                                    </div>
                                    <div class="form-group">
                                        <label class="req" for="subject">Email</label>
                                        <input type="email" class="form-control" id="subject" name="email"
                                            required="required">
                                    </div>
                                    <div class="form-group">
                                        <label class="req" for="comments">Nội dung</label>
                                        <textarea class="form-control" rows="5" id="comments" name="content"
                                            required="required"></textarea>
                                    </div>
                                    <button type="submit" class="customer-btn">Thêm đánh giá</button>
                            </div>
                            {{ csrf_field() }}
                        </form>
                            <!-- Reviews Field Start -->
                        </div>
                        <!-- Reviews End -->
                    </div>
                </div>
                <!-- Product Thumbnail Tab Content End -->
            </div>
        </div>
        <!-- Row End -->
    </div>
    <!-- Container End -->
</div>
<!-- Product Thumbnail Description End -->
<!-- Realted Products Start Here -->
<div class="hot-deal-products off-white-bg pt-100 pb-90 pt-sm-60 pb-sm-50">
    <div class="container">
        <!-- Product Title Start -->
        <div class="post-title pb-30">
            <h2>Sản phẩm tương tự</h2>
        </div>
        <!-- Product Title End -->
        <!-- Hot Deal Product Activation Start -->
        <div class="hot-deal-active owl-carousel">
            @foreach ($list_related as $item)
                <!-- Single Product Start -->
            <div class="single-product">
                    <!-- Product Image Start -->
                    <div class="pro-img">
                        <a href="product.html">
                            <img class="primary-img" src="{{asset('local/storage/app/images/product/'.$item->prod_poster)}}" alt="single-product">
                        </a>
                    </div>
                    <!-- Product Image End -->
                    <!-- Product Content Start -->
                    <div class="pro-content">
                        <div class="pro-info">
                            <h4><a href="product.html">{{$item->prod_name}}</a></h4>
                            <p><span class="price">$160.45</span></p>
                        </div>
                        <div class="pro-actions">
                            <div class="actions-primary">
                                <a href="cart.html" title="Add to Cart"> + Thêm vào giỏ hàng</a>
                            </div>
                        </div>
                    </div>
                    <!-- Product Content End -->
                    @if ($item->prod_new)
                        <span class="sticker-new">new</span>
                    @endif
                    
                </div>
                <!-- Single Product End -->
            @endforeach
        </div>
        <!-- Hot Deal Product Active End -->

    </div>
    <!-- Container End -->
</div>
<!-- Realated Products End Here -->
@endsection
@section('scriptjs')
<script>
    $(document).ready(function () {
        $(".votes").click(function () {

            $(this).prevAll().removeClass("gray-st");
            $(this).prevAll().addClass("yellow-st");
            $(this).removeClass("gray-st");
            $(this).addClass("yellow-st");
            $(this).nextAll().removeClass("yellow-st");
            $(this).nextAll().addClass("gray-st");

            var numItems = $('.yellow-st').length;

            $("#counting-star").val(numItems);
        });
        $(".votes").on('mouseover', function () {

        });
    });

</script>
@endsection