@include('layouts.header')
<main id="main">
    <div class="container">

        <!--MAIN SLIDE-->
        <div class="wrap-main-slide">
            <div class="slide-carousel owl-carousel style-nav-1" data-items="1" data-loop="1" data-nav="true"
                data-dots="false">
                <div class="item-slide">
                    <img src="{{ asset('assets/images/main-slider-1-1.jpg') }}" alt="" class="img-slide">
                    <div class="slide-info slide-1">
                        <h2 class="f-title">Kid Smart <b>Watches</b></h2>
                        <span class="subtitle">Compra todos tus productos Smart por internet.</span>
                        <p class="sale-info">Only price: <span class="price">$59.99</span></p>
                        <a href="#" class="btn-link">Shop Now</a>
                    </div>
                </div>
                <div class="item-slide">
                    <img src="{{ asset('assets/images/main-slider-1-2.jpg') }}" alt="" class="img-slide">
                    <div class="slide-info slide-2">
                        <h2 class="f-title">Extra 25% Off</h2>
                        <span class="f-subtitle">On online payments</span>
                        <p class="discount-code">Use Code: #FA6868</p>
                        <h4 class="s-title">Get Free</h4>
                        <p class="s-subtitle">TRansparent Bra Straps</p>
                    </div>
                </div>
                <div class="item-slide">
                    <img src="{{ asset('assets/images/main-slider-1-3.jpg') }}" alt="" class="img-slide">
                    <div class="slide-info slide-3">
                        <h2 class="f-title">Great Range of <b>Exclusive Furniture Packages</b></h2>
                        <span class="f-subtitle">Exclusive Furniture Packages to Suit every need.</span>
                        <p class="sale-info">Stating at: <b class="price">$225.00</b></p>
                        <a href="#" class="btn-link">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>

        <!--BANNER-->
        <div class="wrap-banner style-twin-default">
            <div class="banner-item">
                <a href="#" class="link-banner banner-effect-1">
                    <figure><img src="{{ asset('assets/images/home-1-banner-1.jpg') }}" alt="" width="580"
                            height="190"></figure>
                </a>
            </div>
            <div class="banner-item">
                <a href="#" class="link-banner banner-effect-1">
                    <figure><img src="{{ asset('assets/images/home-1-banner-2.jpg') }}" alt="" width="580"
                            height="190"></figure>
                </a>
            </div>
        </div>

        <!--On Sale-->
        <div class="wrap-show-advance-info-box style-1 has-countdown">
            <h3 class="title-box">sản phẩm nổi bật</h3>
            <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container " data-items="5"
                data-loop="false" data-nav="true" data-dots="false"
                data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>

                @foreach ($product_news as $row)
                    <div class="product product-style-2 equal-elem ">
                        <div class="product-thumnail">
                            <a href="{{ route('product_detail', $row->id) }}" title="{{ $row->product_title }}">
                                <figure><img src="{{ asset('images/' . $row->product_avatar) }}" width="800"
                                        height="800" alt="{{ $row->product_title }}"></figure>
                            </a>
                            <div class="group-flash">
                                <span class="flash-item sale-label">hot</span>
                            </div>
                            <div class="wrap-btn">
                                <a href="{{ route('product_detail', $row->id) }}" class="function-link">quick view</a>
                            </div>
                        </div>
                        <div class="product-info">
                            <a href="{{ route('product_detail', $row->id) }}"
                                class="product-name"><span>{{ $row->product_title }} [{{ $row->brand->brand_title }} 
                                    {{$row->product_gender == 1 ? 'Nam' : 'Nữ'}} - {{ $row->product_size }}mm]</span></a>
                            <div class="wrap-price"><span class="product-price">{{ $row->product_price }} VND</span>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>

        <!--Latest Products-->
        <div class="wrap-show-advance-info-box style-1">
            <h3 class="title-box">sản phẩm mới</h3>
            <div class="wrap-top-banner">
                <a href="#" class="link-banner banner-effect-2">
                    <figure><img src="{{ asset('assets/images/digital-electronic-banner.jpg') }}" width="1170"
                            height="240" alt="">
                    </figure>
                </a>
            </div>
            <div class="wrap-products">
                <div class="wrap-product-tab tab-style-1">
                    <div class="tab-contents">
                        <div class="tab-content-item active" id="digital_1a">
                            <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container"
                                data-items="5" data-loop="false" data-nav="true" data-dots="false"
                                data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>

                                @foreach ($product_news as $row)
                                    <div class="product product-style-2 equal-elem ">
                                        <div class="product-thumnail">
                                            <a href="{{ route('product_detail', $row->id) }}"
                                                title="{{ $row->product_title }}">
                                                <figure><img src="{{ asset('images/' . $row->product_avatar) }}"
                                                        width="800" height="800" alt="{{ $row->product_title }}">
                                                </figure>
                                            </a>
                                            <div class="group-flash">
                                                <span class="flash-item new-label">new</span>
                                            </div>
                                            <div class="wrap-btn">
                                                <a href="{{ route('product_detail', $row->id) }}"
                                                    class="function-link">quick view</a>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <a href="{{ route('product_detail', $row->id) }}" class="product-name">
                                                <span>{{ $row->product_title }} [{{ $row->brand->brand_title }} 
                                                    {{$row->product_gender == 1 ? 'Nam' : 'Nữ'}} - {{ $row->product_size }}mm]</span></a>
                                            <div class="wrap-price"><span class="product-price">{{ $row->product_price }} VND</span></div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Product Categories-->
        <div class="wrap-show-advance-info-box style-1">
            <h3 class="title-box">Product Categories</h3>
            <div class="wrap-top-banner">
                <a href="#" class="link-banner banner-effect-2">
                    <figure><img src="{{ asset('assets/images/fashion-accesories-banner.jpg') }}" width="1170"
                            height="240" alt="">
                    </figure>
                </a>
            </div>
            <div class="wrap-products">
                <div class="wrap-product-tab tab-style-1">
                    <div class="tab-control">
                        @foreach ($cates as $row)
                            <a href="#homeCate{{ $row->id }}"
                                class="tab-control-item">{{ $row->cate_title }}</a>
                        @endforeach
                    </div>
                    <div class="tab-contents">
                        @foreach ($cates as $row)
                            <div class="tab-content-item" id="homeCate{{ $row->id }}">
                                <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container"
                                    data-items="5" data-loop="false" data-nav="true" data-dots="false"
                                    data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>

                                    @foreach ($row->mapCateDisplay as $rowMapCate)
                                        <div class="product product-style-2 equal-elem ">
                                            <div class="product-thumnail">
                                                <a href="{{ route('product_detail', $rowMapCate->product->id) }}"
                                                    title="{{ $rowMapCate->product->product_title }}">
                                                    <figure><img
                                                            src="{{ asset('images/' . $rowMapCate->product->product_avatar) }}"
                                                            width="800" height="800"
                                                            alt="{{ $rowMapCate->product->product_title }}">
                                                    </figure>
                                                </a>
                                                <div class="wrap-btn">
                                                    <a href="{{ route('product_detail', $rowMapCate->product->id) }}"
                                                        class="function-link">quick view</a>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <a href="{{ route('product_detail', $rowMapCate->product->id) }}"
                                                    class="product-name"><span>{{ $rowMapCate->product->product_title }} [{{ $rowMapCate->product->brand->brand_title }} 
                                                        {{$rowMapCate->product->product_gender == 1 ? 'Nam' : 'Nữ'}} - {{ $rowMapCate->product->product_size }}mm]</span></a>
                                                <div class="wrap-price"><span
                                                        class="product-price">{{ $rowMapCate->product->product_price }}
                                                        VND</span></div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>
@include('layouts.footer')
