@extends('abcstore.layout.master')
@section('title','Tìm kiếm')
@section('main')
<!-- Categorie Menu & Slider Area Start Here -->
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
                <li class="active"><a href="product.html">Tìm kiếm</a></li>
            </ul>
        </div>
    </div>
    <!-- Container End -->
</div>
<!-- Breadcrumb End -->
<!-- Shop Page Start -->
<div class="main-shop-page pt-60 pb-100 ptb-sm-60">
    
    <div class="container">
        <!-- Row End -->
        <div class="row">
            <div class="col-lg-12 pb-20">
                <div class="text-right">
                    <h4>Tìm thấy <strong>{{$list_product->total()}} kết quả</strong> phù hợp với từ khóa <strong>"{{$search}}"</strong></h4>
                    <input hidden id="search" type="text" value="{{$search}}">
                </div>
            </div>
            <!-- Sidebar Shopping Option Start -->
            <div class="col-lg-3 order-2 order-lg-1">
                <div class="sidebar">
                    {{-- <!-- Price Filter Options Start -->
                    <div class="search-filter mb-40">
                        <h3 class="sidebar-title">Lọc theo giá</h3>
                        <form action="#" class="sidbar-style">
                            <div id="slider-range"></div>
                            <input type="text" id="amount" class="amount-range" readonly>
                        </form>
                    </div>
                    <!-- Price Filter Options End --> --}}
                    <!-- Sidebar Categorie Start -->
                    <div class="sidebar-categorie mb-40">
                        <h3 class="sidebar-title">Danh mục sản phẩm</h3>
                        <ul class="sidbar-style">
                            @foreach ($list_cate as $item)
                            <li class="form-check">
                                <input class="form-check-input" onclick="onClickHandler()" name="cate_id"
                                    value="{{$item->cate_id}}" @if (count($list_cate) == 1)
                                        checked disabled
                                    @endif id="{{$item->cate_id}}" type="checkbox">
                                <label class="form-check-label" for="{{$item->cate_id}}">{{$item->cate_name}}
                                    </label>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- Sidebar Categorie Start -->
                    <!-- Sidebar Categorie Start -->
                    <div class="sidebar-categorie mb-40">
                        <h3 class="sidebar-title">Thương hiệu</h3>
                        <ul class="sidbar-style" style="overflow-y: auto;">
                            @foreach ($list_brand as $item)
                            <li class="form-check">
                                <input class="form-check-input" onclick="onClickHandler()" name="brand_id"
                                    value="{{$item->brand_id}}" @if (count($list_brand) == 1)
                                        checked disabled
                                @endif id="{{$item->brand_id}}" type="checkbox">
                                <label class="form-check-label" for="{{$item->brand_id}}">{{$item->brand_name}}
                                    </label>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                        <!-- Sidebar Categorie Start -->
                    <!-- Product Size Start -->
                    <div class="size mb-40">
                        <h3 class="sidebar-title">Ram</h3>
                        <ul class="size-list sidbar-style">
                            @foreach ($list_ram as $item)
                            <li class="form-check">
                                <input class="form-check-input" onclick="onClickHandler()" name="ram"
                                    value="{{$item->propt_ram}}"@if (count($list_ram) == 1)
                                    checked disabled
                                @endif id="ram{{$item->propt_ram}}" type="checkbox">
                                <label class="form-check-label" for="ram{{$item->propt_ram}}">{{$item->propt_ram}}gb
                                    </label>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- Product Size End -->
                    <!-- Product Size Start -->
                    <div class="size mb-40">
                        <h3 class="sidebar-title">Rom</h3>
                        <ul class="size-list sidbar-style">
                            @foreach ($list_rom as $item)
                            <li class="form-check">
                                <input class="form-check-input" onclick="onClickHandler()" name="rom"
                                    value="{{$item->propt_rom}}"@if (count($list_rom) == 1)
                                    checked disabled
                            @endif id="rom{{$item->propt_rom}}" type="checkbox">
                                <label class="form-check-label" for="rom{{$item->propt_rom}}">{{$item->propt_rom}}
                                    </label>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- Product Size End -->
                    <!-- Product Top Start -->
                    <div class="top-new mb-40">
                        <h3 class="sidebar-title">Sản phẩm mới</h3>
                        <div class="side-product-active owl-carousel">
                            <!-- Side Item Start -->
                            <div class="side-pro-item">

                                @foreach ($list_new_product as $prod)
                                <!-- Single Product Start -->
                                <div class="single-product single-product-sidebar">
                                    <!-- Product Image Start -->
                                    <div class="pro-img">
                                        <a href="{{asset('/product/'.$prod->prod_id)}}">
                                            <img height="100px;" width="100px;" class="primary-img"
                                                src="{{asset('local/storage/app/images/product/'.$prod->prod_poster)}}"
                                                alt="single-product">
                                        </a>
                                        <div class="label-product l_sale">30<span class="symbol-percent">%</span></div>
                                    </div>
                                    <!-- Product Image End -->
                                    <!-- Product Content Start -->
                                    <div class="pro-content">
                                        <h4><a href="{{asset('/product/'.$prod->prod_id)}}">{{$prod->prod_name}}</a>
                                        </h4>
                                        <p><span class="price">{{number_format($prod->prod_price,0,',','.')}}
                                                VNĐ</span><del class="prev-price">180.50</del></p>
                                    </div>
                                    <!-- Product Content End -->
                                </div>
                                <!-- Single Product End -->
                                @endforeach
                            </div>
                            <!-- Side Item End -->
                        </div>
                    </div>
                    <!-- Product Top End -->
                    <!-- Single Banner Start -->
                    <div class="col-img">
                        <a href="shop.html"><img src="img/banner/banner-sidebar.jpg" alt="slider-banner"></a>
                    </div>
                    <!-- Single Banner End -->
                </div>
            </div>
            <!-- Sidebar Shopping Option End -->
            <!-- Product Categorie List Start -->
            <div class="col-lg-9 order-1 order-lg-2">
                <!-- Grid & List View Start -->
                <div
                    class="grid-list-top border-default universal-padding d-md-flex justify-content-md-between align-items-center mb-30">
                    <div class="grid-list-view  mb-sm-15">
                        <ul class="nav tabs-area d-flex align-items-center">
                            <li><a class="active" data-toggle="tab" href="#grid-view"><i class="fa fa-th"></i></a></li>
                            <li><a data-toggle="tab" href="#list-view"><i class="fa fa-list-ul"></i></a></li>
                        </ul>
                    </div>
                    <!-- Toolbar Short Area Start -->
                    <div class="main-toolbar-sorter clearfix">
                        <div class="toolbar-sorter d-flex align-items-center">
                            <label>Sắp xếp:</label>
                            <select id="selectOrder" onchange="onChangeHandler()">
                                <option value="default">Mặc định</option>
                                <option value="prod_name-asc">A → Z</option>
                                <option value="prod_name-desc">Z → A</option>
                                <option value="prod_price-asc">Giá tăng dần</option>
                                <option value="prod_price-desc">Giá giảm dần</option>
                            </select>
                        </div>
                    </div>
                    <!-- Toolbar Short Area End -->
                    <!-- Toolbar Short Area Start -->
                    <div class="main-toolbar-sorter clearfix">
                        <div class="toolbar-sorter d-flex align-items-center">
                            <label>Hiện thị:</label>
                            <select id="selectPaginate" onchange="onChangeHandler()" class="sorter wide">
                                <option value="12">12</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="75">75</option>
                                <option value="100">100</option>
                            </select>
                        </div>
                    </div>
                    <!-- Toolbar Short Area End -->
                </div>
                <!-- Grid & List View End -->
                <div class="main-categorie mb-all-40" id="list-product">
                    <!-- Grid & List Main Area End -->
                    <div class="tab-content fix">
                        @if (count($list_product) >0)
                        <div id="grid-view" class="tab-pane fade show active">
                            <div class="row">
                                @foreach ($list_product as $prod)
                                <!-- Single Product Start -->
                                <div class="col-lg-4 col-md-4 col-sm-6 col-6">
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
                                                <h4><a
                                                        href="{{asset('/product/'.$prod->prod_id)}}">{{$prod->prod_name}}</a>
                                                </h4>
                                                <p><span class="price">{{number_format($prod->prod_price,0,',','.')}}
                                                        VNĐ</span><del class="prev-price">$105.50</del></p>
                                                <div class="label-product l_sale">20<span
                                                        class="symbol-percent">%</span></div>
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
                            <div class="single-product">
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
                                            <p><span
                                                    class="price">{{number_format($prod->prod_price,0,',','.')}}</span><del
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
                            {{$list_product->links('pagination::bootstrap-4')}}
                            <div class="product-pagination">
                                <span class="grid-item-list">Showing 1 to {{$list_product->perPage()}} of
                                    {{$list_product->currentPage()}} ({{$list_product->lastPage()}} Pages)</span>
                            </div>
                        </div>
                        <!-- Product Pagination Info -->
                        @else
                        <div class="alert alert-warning" role="alert">
                            Không có sản phẩm nào trong danh mục này.
                        </div>
                        @endif
                    </div>
                    <!-- Grid & List Main Area End -->
                </div>
            </div>
            <!-- product Categorie List End -->
        </div>
        <!-- Row End -->
    </div>
    <!-- Container End -->
</div>
<!-- Shop Page End -->
@endsection
@section('scriptjs')
<script>
function onChangeHandler(){
    getListProduct();
}
function onClickHandler() {
    getListProduct();
}
function getListProduct(){
    var brand_id = [];
    $.each($("input:checkbox[name ='brand_id']:checked"), function() {
        brand_id.push($(this).val());
    });

    var cate_id = [];
    $.each($("input:checkbox[name ='cate_id']:checked"), function() {
        cate_id.push($(this).val());
    });

    var ram = [];
    $.each($("input:checkbox[name ='ram']:checked"), function() {
        ram.push($(this).val());
    });

    var rom = [];
    $.each($("input:checkbox[name ='rom']:checked"), function() {
        rom.push($(this).val());
    })
    
    var paginate = $('#selectPaginate').val();

    var orderby = $('#selectOrder').val();

    var search = $('#search').val();

    // URL có kèm tham số number
    var url = '{{asset('shop/ajax/')}}/';

    // Data lúc này cho bằng rỗng
    var data = {
        'brand_id[]': brand_id,
        'cate_id[]': cate_id,
        'rom[]': rom,
        'ram[]': ram,
        paginate: paginate,
        orderby: orderby,
        search: search
    };

    // Success Function
    var success = function(result) {
        $('#list-product').empty();
        $('#list-product').append(result);
    };

    // Result Type
    var dataType = 'text';

    // Send Ajax
    $.get(url, data, success, dataType);
}
</script>
@endsection