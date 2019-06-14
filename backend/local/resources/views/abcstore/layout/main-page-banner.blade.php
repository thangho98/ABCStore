<!-- Categorie Menu & Slider Area Start Here -->
<div class="main-page-banner home-3">
    <div class="container">
        <div class="row">
            <!-- Vertical Menu Start Here -->
            <div class="col-xl-3 col-lg-4 d-none d-lg-block">
                <div class="vertical-menu mb-all-30">
                    <nav>
                        <ul class="vertical-menu-list">
                            @foreach ($catelist as $item)
                            <li>
                                <a href="{{asset('/shop')}}"><span><img src="{{asset('local/storage/app/images/category/'.$item->cate_icon)}}"
                                            alt="menu-icon"></span>{{$item->cate_name}}</a>
                            </li>
                            @endforeach
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