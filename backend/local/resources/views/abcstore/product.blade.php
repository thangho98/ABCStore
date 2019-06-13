@extends('abcstore.layout.master')
@section('title','Sản phẩm')
@section('main')
@include('abcstore.layout.main-page-banner')
<!-- Breadcrumb Start -->
<div class="breadcrumb-area mt-30">
    <div class="container">
        <div class="breadcrumb">
            <ul class="d-flex align-items-center">
                <li><a href="{{asset('/')}}">Trang chủ</a></li>
                <li><a href="{{asset('/shop')}}">Cửa hàng</a></li>
                <li class="active"><a href="#">Sản phẩm</a></li>
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
                            <a data-toggle="tab" href="#thumb{{$i}}"><img src="{{asset('local/storage/app/images/product/'.$list_image[$i]->pimg_name)}}"
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
                                <a href="#review">({{count($list_comment)}}  đánh giá)</a>
                                <a href="#add-review">thêm bình luận</a>
                            </div>
                        </div>
                        <div class="pro-price mtb-30">
                            <p class="d-flex align-items-center">
                                <span id="prev-price" class="prev-price"></span>
                                @if ($min_price->price == $max_price->price)
                                <span id="price" class="price">{{number_format($max_price->price,0,',','.')}} VNĐ</span>
                                @else
                                <span id="price" class="price">{{number_format($min_price->price,0,',','.')}} VNĐ - {{number_format($max_price->price,0,',','.')}} VNĐ</span>
                                @endif
                                <span id="saving-price"></span></p>
                        </div>
                        <div class="product-size mb-20 clearfix">
                            <label>Bộ nhớ</label>
                            <select class="memory" name="memory" id="selectMemory">
                                @foreach ($list_memory as $item)
                                    <option value="{{$item->propt_ram}}-{{$item->propt_rom}}">ram {{$item->propt_ram}}gb - rom {{$item->propt_rom}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="color clearfix mb-20">
                            <label>Màu sắc</label>
                            <div class="mycheckbox" id="rdoColor">
                                @for ($i = 0; $i < count($list_color); $i++)
                                    <div id="item-checkbox-{{$i}}" class="item-checkbox" onclick="chooseColor({{$i}})">
                                        <input id="input-checkbox-{{$i}}" hidden type="radio" onchange="getColor()" name="color_select" value="{{$list_color[$i]->propt_color}}">{{$list_color[$i]->propt_color}}
                                        <div id="triangle-check-{{$i}}"  class="triangle-check">
                                            <i class="fa fa-check mini-check"></i>
                                        </div>
                                    </div>
                                @endfor
                            </div>
                        </div>
                        <div class="box-quantity d-flex hot-product2">
                            <div class="w-auto p-3" style="width: 200px;">
                                <p id="quantity"></p>
                            </div>
                            <div class="pro-actions">
                                <div class="actions-primary">
                                    <a id="addCart" title="" data-original-title="Add to Cart"> + Thêm vào
                                        giỏ hàng</a>
                                </div>
                            </div>
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
                        <div id="add-review" class="review border-default universal-padding mt-30">
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
                    <a href="{{asset('/product/'.$item['prod_id'])}}">
                        <img width="226px;" height="226px;" class="primary-img" src="{{asset('local/storage/app/images/product/'.$item['prod_poster'])}}" alt="single-product">
                    </a>
                </div>
                <!-- Product Image End -->
                <!-- Product Content Start -->
                <div class="pro-content">
                    <div class="pro-info">
                        <h4><a href="{{asset('/product/'.$item['prod_id'])}}">{{$item['prod_name']}}</a></h4>
                        @if ($item['promdt_percent'] != 0)
                        <p><span class="price">{{number_format($item['promdt_promotion_price'],0,',','.')}}
                            VNĐ</span><del class="prev-price">{{number_format($item['prod_price'],0,',','.')}}
                            VNĐ</del></p>
                        @else
                        <p><span class="price">{{number_format($item['prod_price'],0,',','.')}}
                            VNĐ</span><del class="prev-price"></del></p>
                        @endif
                        @if ($item['promdt_percent'] != 0)
                        <div class="label-product l_sale">{{$item['promdt_percent'] }}<span
                                class="symbol-percent">%</span></div>
                        @endif
                    </div>
                </div>
                <!-- Product Content End -->
                @if ($item['prod_new'])
                    <span class="sticker-new">mới</span>
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
    function chooseColor(id) {
        $('#input-checkbox-'+id).prop("checked",true);
        $('#input-checkbox-'+id).change();
        $('.triangle-check').removeClass('show');
        $('.item-checkbox').removeClass('checked');
        $('#triangle-check-'+id).addClass('show');
        $('#item-checkbox-'+id).addClass('checked');
    }

    function formatNumber(num) {
        return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
    }

    function getColor() {
        $('#saving-price').html('');
        $('#prev-price').html('');
        $('#price').html('');
        $('#quantity').empty();

        $('#saving-price').removeClass('saving-price');

        var color = $("input:radio[name ='color_select']:checked").val();
        //alert(color);

        // $("input:radio[name ='color_select']").not(':checked').each(function() {
        //     var id = $(this).attr('data-id');
        //     $('#triangle-check-'+id).toggleClass('show');
        // });
        
        let memory = $('#selectMemory').val();
        let res = memory.split("-");
        var url = "{{asset('product/options/'.$product->prod_id)}}";

        var data = {
            ram: res[0],
            rom: res[1],
            color: color
        };

        // Success Function
        var success = function(result) {
            console.log(result);

            var options = result['options'];
            var promotion = result['promotion'];

            let urlCart = "{{asset('cart/add/')}}/";

            $("#addCart").removeAttr("href");

            
            if(promotion == null){
                $('#prev-price').html('');
                $('#price').html(formatNumber(options['propt_price'])+' VNĐ');
            }
            else{
                $('#prev-price').html(formatNumber(options['propt_price'])+' VNĐ');
                $('#price').html(formatNumber(promotion['promdt_promotion_price'])+' VNĐ');
                $('#saving-price').addClass('saving-price');
                $('#saving-price').html(`Tiết kiệm ${promotion['promdt_percent']}%`);
            }


            if(options['propt_quantity'] != 0){
                $("#addCart").attr("href", urlCart + options['propt_id']);
                $('#quantity').append(`<span class="in-stock"><i class="ion-checkmark-round"></i> Còn ${options['propt_quantity']} sản phẩm trong kho`);
            }
            else{
                $('#quantity').append('<span class="out-of-stock"><i class="fa fa-ban"></i>Hết hàng </span>');
            }
        };

        // Result Type
        var dataType = 'json';

        // Send Ajax
        $.get(url, data, success, dataType);
    }


    function url_redirect(options){
        var $form = $("<form />");
        
        $form.attr("action",options.url);
        $form.attr("method",options.method);
        
        for (var data in options.data)
        $form.append('<input type="hidden" name="'+data+'" value="'+options.data[data]+'" />');
        
        $("body").append($form);
        $form.submit();
    }
    
    $(document).ready(function () {
        var windowHeight = $(window).height();
        var scrollTop = $(window).scrollTop();
        var mid = scrollTop + Math.floor(windowHeight / 2);

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
        
        $('#selectMemory').change(function(){

            $('#saving-price').html('');
            $('#saving-price').removeClass('saving-price');
            $('#prev-price').html('');
            $('#price').html('');
            $('#quantity').empty();

            let memory = $('#selectMemory').val();
            let res = memory.split("-");
            
            // url_redirect({url: "{{asset('product/'.$product->prod_id)}}",
            //     method: "get",
            //     data: {
            //         ram: res[0],
            //         rom: res[1]
            //     }
            // });
            
            var url = "{{asset('product/options/color/'.$product->prod_id)}}";

            // Data
            var data = {
                ram: res[0],
                rom: res[1]
            };

            // Success Function
            var success = function(result) {
                console.log(result);
                $('#rdoColor').empty();
                var html = ``;
                var index = 0;
                var list_color = result['list_color'];
                $.each(list_color, function(key, item) {
                    html +=
                        `
                        <div id="item-checkbox-${index}" class="item-checkbox" onclick="chooseColor(${index})">
                            <input id="input-checkbox-${index}" hidden type="radio" onchange="getColor()" name="color_select" value="${item['propt_color']}">${item['propt_color']}
                            <div id="triangle-check-${index}"  class="triangle-check">
                                <i class="fa fa-check mini-check"></i>
                            </div>
                        </div>
                        `;
                    index++;
                });
                
                $('#rdoColor').append(html);

                var min_price = result['min_price']['price'];
                var max_price = result['max_price']['price'];

                if(min_price != max_price){
                    $('#price').html(formatNumber(min_price)+' VNĐ - '+formatNumber(max_price)+' VNĐ');
                }
                else{
                    $('#price').html(formatNumber(max_price)+' VNĐ');
                }
            };

            // Result Type
            var dataType = 'json';

            // Send Ajax
            $.get(url, data, success, dataType);
        });
    });
</script>
@endsection