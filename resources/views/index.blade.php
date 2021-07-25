@extends('layouts.fontend.fontend-master')
@section('title', 'Home')
@section('content')
    <!-- ============================================== HEADER : END ============================================== -->
    <div class="body-content outer-top-xs" id="top-banner-and-menu">
        <div class="container">
            <div class="row">
                <!-- ============================================== SIDEBAR ============================================== -->
                <div class="col-xs-12 col-sm-12 col-md-3 sidebar">
                    <!-- ================================== TOP NAVIGATION ================================== -->
                    <div class="side-menu animate-dropdown outer-bottom-xs">
                        <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
                        <nav class="yamm megamenu-horizontal" role="navigation">
                            <ul class="nav">

                                @foreach($categorys as $cat)
                                <li class="dropdown menu-item">
                                        @if(session()->get('language') == 'bangle')
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon {{ $cat->category_icon }}" aria-hidden="true"></i>
                                                {{ $cat->category_name_bn }}
                                            </a>
                                        @else
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon {{ $cat->category_icon }}" aria-hidden="true"></i>
                                                {{ $cat->category_name_en }}
                                            </a>
                                        @endif
                                    <!-- ================================== MEGAMENU VERTICAL ================================== -->
                                    <ul class="dropdown-menu mega-menu">
                                        <li class="yamm-content">
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-12 col-lg-4">
                                                    <ul>
                                                        @php
                                                            $subCategorys = \App\Models\SubCategory::where('category_id', $cat->id)->orderBy('subcategory_name_en', 'ASC')->get();
                                                        @endphp
                                                        @foreach($subCategorys as $subcat)
                                                            <li>
                                                                @if(session()->get('language') == 'bangle')
                                                                    <a href="#">{{ $subcat->subcategory_name_bn }}</a>
                                                                @else
                                                                    <a href="#">{{ $subcat->subcategory_name_en }}</a>
                                                                @endif
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                <div class="dropdown-banner-holder">
                                                    <a href="#"><img alt="" src="{{ asset('fontend') }}/assets/images/banners/banner-side.png" /></a>
                                                </div>
                                            </div><!-- /.row -->
                                        </li><!-- /.yamm-content -->
                                    </ul><!-- /.dropdown-menu -->
                                    <!-- ================================== MEGAMENU VERTICAL ================================== -->            </li><!-- /.menu-item -->
                                @endforeach
                            </ul><!-- /.nav -->
                        </nav><!-- /.megamenu-horizontal -->
                    </div><!-- /.side-menu -->
                    <!-- ================================== TOP NAVIGATION : END ================================== -->


                    <!-- ============================================== HOT DEALS ============================================== -->
                    <div class="sidebar-widget hot-deals wow fadeInUp outer-bottom-xs">
                        <h3 class="section-title">
                          @if(session()->get('language') == 'bangle') গরম চুক্তি @else hot deals @endif
                        </h3>
                        <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">
                            @forelse($hot_deals as $hot_deal)
                                <div class="item">
                                    <div class="products">
                                        <div class="hot-deal-wrapper">
                                            <div class="image">
                                                <img src="{{ asset($hot_deal->product_thumbnail) }}" alt="">
                                            </div>
                                            @php
                                                $amount = $hot_deal->selling_price - $hot_deal->discount_price;
                                                $parsentage = ($amount /$hot_deal->selling_price)*100;
                                            @endphp
                                            @if($hot_deal->discount_price == NULL)
                                                <div class="sale-offer-tag" style="background-color:#fdd922 !important;">
                                                    @if(session()->get('language') == 'bangle')
                                                        <span>নতুন</span>
                                                    @else
                                                        <span>New</span>
                                                    @endif
                                                </div>
                                            @else
                                                <div class="sale-offer-tag">
                                                    @if(session()->get('language') == 'bangle')
                                                        <span>{{ bn_replace(round($parsentage))  }}%<br>অফার</span>
                                                    @else
                                                        <span>{{round($parsentage)}}%<br>off</span>
                                                    @endif
                                                </div>
                                            @endif
                                            <div class="timing-wrapper">
                                                <div class="box-wrapper">
                                                    <div class="date box">
                                                        <span class="key">120</span>
                                                        <span class="value">DAYS</span>
                                                    </div>
                                                </div>

                                                <div class="box-wrapper">
                                                    <div class="hour box">
                                                        <span class="key">20</span>
                                                        <span class="value">HRS</span>
                                                    </div>
                                                </div>

                                                <div class="box-wrapper">
                                                    <div class="minutes box">
                                                        <span class="key">36</span>
                                                        <span class="value">MINS</span>
                                                    </div>
                                                </div>

                                                <div class="box-wrapper hidden-md">
                                                    <div class="seconds box">
                                                        <span class="key">60</span>
                                                        <span class="value">SEC</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- /.hot-deal-wrapper -->
                                        <div class="product-info text-left m-t-20">
                                            <h3 class="name">
                                                @if(session()->get('language') == 'bangle')
                                                    <a href="{{ url('/single/product/'. $hot_deal->id . '/' .$hot_deal->product_slug_bn) }}">{{ $hot_deal->product_title_bn }}</a>
                                                @else
                                                    <a href="{{ url('/single/product/'. $hot_deal->id . '/' .$hot_deal->product_slug_en) }}">{{ $hot_deal->product_title_en }}</a>
                                                @endif
                                            </h3>
                                            <div class="rating rateit-small"></div>
                                            <div class="product-price">
                                                @if( $hot_deal->discount_price == NULL)
                                                    @if(session()->get('language') == 'bangle')
                                                        <span class="price">৳{{ bn_replace($hot_deal->selling_price) }} </span>
                                                    @else
                                                        <span class="price">${{ $hot_deal->selling_price }} </span>
                                                    @endif
                                                @else
                                                    @if(session()->get('language') == 'bangle')
                                                        <span class="price">৳{{ bn_replace( $hot_deal->discount_price)  }} </span>
                                                        <span class="price-before-discount">${{ bn_replace($hot_deal->selling_price) }}</span>
                                                    @else
                                                        <span class="price">${{ $hot_deal->discount_price }} </span>
                                                        <span class="price-before-discount">${{ $hot_deal->selling_price }}</span>
                                                    @endif
                                                @endif
                                            </div><!-- /.product-price -->
                                        </div><!-- /.product-info -->
                                        <div class="cart clearfix animate-effect">
                                            <div class="action">
                                                <div class="add-cart-button btn-group">
                                                        <button data-toggle="dropdown" class="btn btn-primary icon" type="button" title="Add Cart">
                                                                <i class="fa fa-shopping-cart"></i>
                                                        </button>
                                                    {{--  button--}}
                                                    @if(session()->get('language') == 'bangle')
                                                        <button class="btn btn-primary cart-btn" type="button">
                                                            <a style="background: none!important" href="{{ url('/single/product/'. $hot_deal->id . '/' .$hot_deal->product_slug_bn) }}">
                                                                কার্ট যোগ করুন
                                                            </a>
                                                        </button>
                                                    @else
                                                        <button class="btn btn-primary cart-btn" type="button">
                                                            <a style="background: none!important" href="{{ url('/single/product/'. $hot_deal->id . '/' .$hot_deal->product_slug_en ) }}">
                                                                Add to cart
                                                            </a>
                                                        </button>
                                                    @endif
                                                </div>
                                            </div><!-- /.action -->
                                        </div><!-- /.cart -->
                                    </div>
                                </div>
                            @empty
                            @endforelse

                        </div><!-- /.sidebar-widget -->
                    </div>
                    <!-- ============================================== HOT DEALS: END ============================================== -->


                    <!-- ============================================== SPECIAL OFFER ============================================== -->
                    <div class="sidebar-widget outer-bottom-small wow fadeInUp">
                        <h3 class="section-title">
                            @if(session()->get('language') == 'bangle')
                                বিশেষ অফার
                            @else
                             Special Offer
                            @endif
                        </h3>
                        <div class="sidebar-widget-body outer-top-xs">
                            <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
                                <div class="item">
                                    <div class="products special-product">
                                        @forelse($spacial_offers as $spacial_offer)
                                        <div class="product">
                                            <div class="product-micro">
                                                <div class="row product-micro-row">
                                                    <div class="col col-xs-5">
                                                        <div class="product-image">
                                                            <div class="image">
                                                                @if(session()->get('language') == 'bangle')
                                                                    <a href="{{ url('/single/product/'. $spacial_offer->id . '/' .$spacial_offer->product_slug_bn) }}">
                                                                        <img src="{{ asset($spacial_offer->product_thumbnail) }}" alt="">
                                                                    </a>
                                                                @else
                                                                    <a href="{{ url('/single/product/'. $spacial_offer->id . '/' .$spacial_offer->product_slug_en) }}">
                                                                        <img src="{{ asset($spacial_offer->product_thumbnail) }}" alt="">
                                                                    </a>
                                                                @endif
                                                            </div><!-- /.image -->
                                                        </div><!-- /.product-image -->
                                                    </div><!-- /.col -->
                                                    <div class="col col-xs-7">
                                                        <div class="product-info">
                                                            <h3 class="name">
                                                                @if(session()->get('language') == 'bangle')
                                                                    <a href="{{ url('/single/product/'. $spacial_offer->id . '/' .$spacial_offer->product_slug_bn) }}">{{ $spacial_offer->product_title_bn }}</a>
                                                                @else
                                                                    <a href="{{ url('/single/product/'. $spacial_offer->id . '/' .$spacial_offer->product_slug_en) }}">{{ $spacial_offer->product_title_en }}</a>
                                                                @endif
                                                            </h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price">
                                                                @if($spacial_offer->discount_price == NULL)
                                                                    @if(session()->get('language') == 'bangle')
                                                                        <span class="price">৳{{ bn_replace($spacial_offer->selling_price) }}</span>
                                                                    @else
                                                                        <span class="price">${{ $spacial_offer->selling_price }}</span>
                                                                    @endif
                                                                @else
                                                                    @if(session()->get('language') == 'bangle')
                                                                        <span class="price">৳{{ bn_replace($spacial_offer->discount_price) }}</span>
                                                                    @else
                                                                        <span class="price">${{ $spacial_offer->discount_price }}</span>
                                                                    @endif
                                                                @endif
                                                            </div><!-- /.product-price -->
                                                        </div>
                                                    </div><!-- /.col -->
                                                </div><!-- /.product-micro-row -->
                                            </div><!-- /.product-micro -->
                                        </div>
                                        @empty
                                            <h3 style="color:red; font-weight:bold;">
                                                @if(session()->get('language') == 'bangle')
                                                    কোন পণ্য পাওয়া যায় নি
                                                @else
                                                    No Product Found
                                                @endif
                                            </h3>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.sidebar-widget-body -->
                    </div><!-- /.sidebar-widget -->
                    <!-- ============================================== SPECIAL OFFER : END ============================================== -->







                    <!-- ============================================== PRODUCT TAGS ============================================== -->
                    <div class="sidebar-widget product-tag wow fadeInUp">
                        <h3 class="section-title">Product tags</h3>
                        <div class="sidebar-widget-body outer-top-xs">
                            <div class="tag-list">
                                <a class="item" title="Phone" href="category.html">Phone</a>
                                <a class="item active" title="Vest" href="category.html">Vest</a>
                                <a class="item" title="Smartphone" href="category.html">Smartphone</a>
                                <a class="item" title="Furniture" href="category.html">Furniture</a>
                                <a class="item" title="T-shirt" href="category.html">T-shirt</a>
                                <a class="item" title="Sweatpants" href="category.html">Sweatpants</a>
                                <a class="item" title="Sneaker" href="category.html">Sneaker</a>
                                <a class="item" title="Toys" href="category.html">Toys</a>
                                <a class="item" title="Rose" href="category.html">Rose</a>
                            </div><!-- /.tag-list -->
                        </div><!-- /.sidebar-widget-body -->
                    </div><!-- /.sidebar-widget -->
                    <!-- ============================================== PRODUCT TAGS : END ============================================== -->
                    <!-- ============================================== SPECIAL DEALS ============================================== -->

                    <div class="sidebar-widget outer-bottom-small wow fadeInUp">
                        <h3 class="section-title">
                            @if(session()->get('language') == 'bangle')
                                বিশেষ চুক্তি
                            @else
                                Special Deals
                            @endif
                        </h3>
                        <div class="sidebar-widget-body outer-top-xs">
                            <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
                                <div class="item">
                                    <div class="products special-product">
                                        @forelse($spacial_deals as $spacial_deal)
                                            <div class="product">
                                                <div class="product-micro">
                                                    <div class="row product-micro-row">
                                                        <div class="col col-xs-5">
                                                            <div class="product-image">
                                                                <div class="image">
                                                                    @if(session()->get('language') == 'bangle')
                                                                        <a href="{{ url('/single/product/'. $spacial_deal->id . '/' .$spacial_deal->product_slug_bn) }}">
                                                                            <img src="{{ asset($spacial_deal->product_thumbnail) }}" alt="">
                                                                        </a>
                                                                    @else
                                                                        <a href="{{ url('/single/product/'. $spacial_deal->id . '/' .$spacial_deal->product_slug_en) }}">
                                                                            <img src="{{ asset($spacial_deal->product_thumbnail) }}" alt="">
                                                                        </a>
                                                                    @endif
                                                                </div><!-- /.image -->
                                                            </div><!-- /.product-image -->
                                                        </div><!-- /.col -->
                                                        <div class="col col-xs-7">
                                                            <div class="product-info">
                                                                <h3 class="name">
                                                                    @if(session()->get('language') == 'bangle')
                                                                        <a href="{{ url('/single/product/'. $spacial_deal->id . '/' .$spacial_deal->product_slug_bn) }}">{{ $spacial_deal->product_title_bn }}</a>
                                                                    @else
                                                                        <a href="{{ url('/single/product/'. $spacial_deal->id . '/' .$spacial_deal->product_slug_en) }}">{{ $spacial_deal->product_title_en }}</a>
                                                                    @endif
                                                                </h3>
                                                                <div class="rating rateit-small"></div>
                                                                <div class="product-price">
                                                                    @if($spacial_deal->discount_price == NULL)
                                                                        @if(session()->get('language') == 'bangle')
                                                                            <span class="price">৳{{ bn_replace($spacial_deal->selling_price) }}</span>
                                                                        @else
                                                                            <span class="price">${{ $spacial_deal->selling_price }}</span>
                                                                        @endif
                                                                    @else
                                                                        @if(session()->get('language') == 'bangle')
                                                                            <span class="price">৳{{ bn_replace($spacial_deal->discount_price) }}</span>
                                                                        @else
                                                                            <span class="price">${{ $spacial_deal->discount_price }}</span>
                                                                        @endif
                                                                    @endif
                                                                </div><!-- /.product-price -->
                                                            </div>
                                                        </div><!-- /.col -->
                                                    </div><!-- /.product-micro-row -->
                                                </div><!-- /.product-micro -->
                                            </div>
                                        @empty
                                            <h3 style="color:red; font-weight:bold;">
                                                @if(session()->get('language') == 'bangle')
                                                    কোন পণ্য পাওয়া যায় নি
                                                @else
                                                    No Product Found
                                                @endif
                                            </h3>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.sidebar-widget-body -->
                    </div><!-- /.sidebar-widget -->
                    <!-- ============================================== SPECIAL DEALS : END ============================================== -->
                    <!-- ============================================== NEWSLETTER ============================================== -->
                    <div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small">
                        <h3 class="section-title">Newsletters</h3>
                        <div class="sidebar-widget-body outer-top-xs">
                            <p>Sign Up for Our Newsletter!</p>
                            <form role="form">
                                <div class="form-group">
                                    <label class="sr-only" for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Subscribe to our newsletter">
                                </div>
                                <button class="btn btn-primary">Subscribe</button>
                            </form>
                        </div><!-- /.sidebar-widget-body -->
                    </div><!-- /.sidebar-widget -->
                    <!-- ============================================== NEWSLETTER: END ============================================== -->

                    <!-- ============================================== Testimonials============================================== -->
                    <div class="sidebar-widget  wow fadeInUp outer-top-vs ">
                        <div id="advertisement" class="advertisement">
                            <div class="item">
                                <div class="avatar"><img src="{{ asset('fontend') }}/assets/images/testimonials/member1.png" alt="Image"></div>
                                <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                                <div class="clients_author">John Doe	<span>Abc Company</span>	</div><!-- /.container-fluid -->
                            </div><!-- /.item -->

                            <div class="item">
                                <div class="avatar"><img src="{{ asset('fontend') }}/assets/images/testimonials/member3.png" alt="Image"></div>
                                <div class="testimonials"><em>"</em>Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                                <div class="clients_author">Stephen Doe	<span>Xperia Designs</span>	</div>
                            </div><!-- /.item -->

                            <div class="item">
                                <div class="avatar"><img src="{{ asset('fontend') }}/assets/images/testimonials/member2.png" alt="Image"></div>
                                <div class="testimonials"><em>"</em> Vtae sodales aliq uam morbi non sem lacus port mollis. Nunc condime tum metus eud molest sed consectetuer.<em>"</em></div>
                                <div class="clients_author">Saraha Smith	<span>Datsun &amp; Co</span>	</div><!-- /.container-fluid -->
                            </div><!-- /.item -->

                        </div><!-- /.owl-carousel -->
                    </div>

                    <!-- ============================================== Testimonials: END ============================================== -->

                    <div class="home-banner">
                        <img src="{{ asset('fontend') }}/assets/images/banners/LHS-banner.jpg" alt="Image">
                    </div>




                </div><!-- /.sidemenu-holder -->
                <!-- ============================================== SIDEBAR : END ============================================== -->

                <!-- ============================================== CONTENT ============================================== -->
                <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
                    <!-- ========================================== SECTION – HERO ========================================= -->

                    <div id="hero">
                        <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
                            @php
                                $sliders = App\Models\sliders::where('status', 1)->orderBy('id', 'DESC')->limit(5)->get();
                            @endphp
                            @foreach($sliders as $slider)
                                <div class="item" style="background-image: url({{ asset($slider->sliderImage)}});">
                                    <div class="container-fluid">
                                        <div class="caption bg-color vertical-center text-left">
                                            <div class="slider-header fadeInDown-1">
                                                @if (session()->get('language') == 'bangle')
                                                    {{$slider->subTitle_bn}}
                                                @else
                                                    {{ $slider->subTitle_en }}
                                                @endif
                                            </div>
                                            <div class="big-text fadeInDown-1">
                                                @if (session()->get('language') == 'bangle')
                                                    {{$slider->title_bn}}
                                                @else
                                                    {{ $slider->title_en }}
                                                @endif
                                            </div>

                                            <div class="excerpt fadeInDown-2 hidden-xs">

                                                <span>
                                                    @if (session()->get('language') == 'bangle')
                                                        {{$slider->description_bn}}
                                                    @else
                                                        {{ $slider->description_en }}
                                                    @endif
                                                </span>

                                            </div>
                                            <div class="button-holder fadeInDown-3">
                                                <a href="index6c11.html?page=single-product" class="btn-lg btn btn-uppercase btn-primary shop-now-button">Shop Now</a>
                                            </div>
                                        </div><!-- /.caption -->
                                    </div><!-- /.container-fluid -->
                                </div><!-- /.item -->
                            @endforeach

                        </div><!-- /.owl-carousel -->
                    </div>

                    <!-- ========================================= SECTION – HERO : END ========================================= -->

                    <!-- ============================================== INFO BOXES ============================================== -->
                    <div class="info-boxes wow fadeInUp">
                        <div class="info-boxes-inner">
                            <div class="row">
                                <div class="col-md-6 col-sm-4 col-lg-4">
                                    <div class="info-box">
                                        <div class="row">

                                            <div class="col-xs-12">
                                                <h4 class="info-box-heading green">money back</h4>
                                            </div>
                                        </div>
                                        <h6 class="text">30 Days Money Back Guarantee</h6>
                                    </div>
                                </div><!-- .col -->

                                <div class="hidden-md col-sm-4 col-lg-4">
                                    <div class="info-box">
                                        <div class="row">

                                            <div class="col-xs-12">
                                                <h4 class="info-box-heading green">free shipping</h4>
                                            </div>
                                        </div>
                                        <h6 class="text">Shipping on orders over $99</h6>
                                    </div>
                                </div><!-- .col -->

                                <div class="col-md-6 col-sm-4 col-lg-4">
                                    <div class="info-box">
                                        <div class="row">

                                            <div class="col-xs-12">
                                                <h4 class="info-box-heading green">Special Sale</h4>
                                            </div>
                                        </div>
                                        <h6 class="text">Extra $5 off on all items </h6>
                                    </div>
                                </div><!-- .col -->
                            </div><!-- /.row -->
                        </div><!-- /.info-boxes-inner -->

                    </div><!-- /.info-boxes -->
                    <!-- ============================================== INFO BOXES : END ============================================== -->
                    <!-- ============================================== SCROLL TABS ============================================== -->
                    <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
                        <div class="more-info-tab clearfix ">
                            <h3 class="new-product-title pull-left">
                                @if(session()->get('language') == 'bangle') নতুন পণ্য @else New Products @endif
                            </h3>
                            @php
                                $tabcategorys = \App\Models\Category::orderBy('category_name_en', 'ASC')->limit(3)->get();
                            @endphp
                            <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
                                <li class="active"><a data-transition-type="backSlide" href="#all" data-toggle="tab">
                                        @if(session()->get('language') == 'bangle')সব @else All @endif </a></li>
                                @foreach($tabcategorys as $cat)
                                <li><a data-transition-type="backSlide" href="#category{{ $cat->id }}" data-toggle="tab">
                                        @if(session()->get('language') == 'bangle')
                                            {{ $cat->category_name_bn }}
                                        @else
                                            {{ $cat->category_name_en }}
                                        @endif
                                    </a></li>
                                @endforeach
                            </ul><!-- /.nav-tabs -->
                        </div>
                        @php
                           function bn_replace($str){
                                $en = array('1', '2', '3', '4', '5', '6', '7', '8', '9', '0');
                                $bn =  array('১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯', '০');
                                $str = str_replace($en, $bn, $str);
                                return $str;
                            }
                        @endphp
                        <div class="tab-content outer-top-xs">
                            <div class="tab-pane in active" id="all">
                                <div class="product-slider">
                                    <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
                                        @foreach($tabAllProducts as $tabAllProduct)
                                            <div class="item item-carousel">
                                                <div class="products">
                                                    <div class="product">
                                                        <div class="product-image">
                                                            <div class="image">
                                                                @if(session()->get('language') == 'bangle')
                                                                    <a href="{{ url('/single/product/'. $tabAllProduct->id . '/' .$tabAllProduct->product_slug_bn) }}"><img  src="{{ asset($tabAllProduct->product_thumbnail) }}" alt=""></a>
                                                                @else
                                                                    <a href="{{ url('/single/product/'. $tabAllProduct->id . '/' .$tabAllProduct->product_slug_en) }}"><img  src="{{ asset($tabAllProduct->product_thumbnail) }}" alt=""></a>
                                                                @endif
                                                            </div><!-- /.image -->
                                                            @php
                                                                $amount = $tabAllProduct->selling_price - $tabAllProduct->discount_price;
                                                                $parsentage = ($amount /$tabAllProduct->selling_price)*100;
                                                            @endphp
                                                            @if($tabAllProduct->discount_price == NULL)
                                                                <div class="tag sale">
                                                                    @if(session()->get('language') == 'bangle')
                                                                        <span>নতুন</span>
                                                                    @else
                                                                        <span>New</span>
                                                                    @endif
                                                                </div>
                                                            @else
                                                                <div class="tag new">
                                                                    @if(session()->get('language') == 'bangle')
                                                                        <span>{{ bn_replace(round($parsentage))  }}%</span>
                                                                    @else
                                                                        <span>{{round($parsentage)}}%</span>
                                                                    @endif
                                                                </div>
                                                            @endif
                                                        </div><!-- /.product-image -->
                                                        <div class="product-info text-left">
                                                            <h3 class="name">
                                                                @if(session()->get('language') == 'bangle')
                                                                    <a href="{{ url('/single/product/'. $tabAllProduct->id . '/' .$tabAllProduct->product_slug_bn) }}">{{ $tabAllProduct->product_title_bn }}</a>
                                                                @else
                                                                    <a href="{{ url('/single/product/'. $tabAllProduct->id . '/' .$tabAllProduct->product_slug_en) }}">{{ $tabAllProduct->product_title_en }}</a>
                                                                @endif
                                                            </h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="description"></div>
                                                            <div class="product-price">
                                                                @if( $tabAllProduct->discount_price == NULL)
                                                                    @if(session()->get('language') == 'bangle')
                                                                        <span class="price">৳{{ bn_replace($tabAllProduct->selling_price) }} </span>
                                                                    @else
                                                                        <span class="price">${{ $tabAllProduct->selling_price }} </span>
                                                                    @endif
                                                                @else
                                                                    @if(session()->get('language') == 'bangle')
                                                                        <span class="price">৳{{ bn_replace( $tabAllProduct->discount_price)  }} </span>
                                                                        <span class="price-before-discount">${{ bn_replace($tabAllProduct->selling_price) }}</span>
                                                                    @else
                                                                        <span class="price">${{ $tabAllProduct->discount_price }} </span>
                                                                        <span class="price-before-discount">${{ $tabAllProduct->selling_price }}</span>
                                                                    @endif
                                                                @endif
                                                            </div><!-- /.product-price -->
                                                        </div><!-- /.product-info -->
                                                        <div class="cart clearfix animate-effect">
                                                            <div class="action">
                                                                <ul class="list-unstyled">
                                                                    <li class="add-cart-button btn-group">
                                                                        @if(session()->get('language') == 'bangle')
                                                                            <button data-toggle="tooltip" class="btn btn-primary icon" type="button" title="কার্ড যুক্ত করুন">
                                                                                <a href="{{ url('/single/product/'. $tabAllProduct->id . '/' .$tabAllProduct->product_slug_bn) }}">
                                                                                    <i class="fa fa-shopping-cart"></i>
                                                                                </a>
                                                                            </button>
                                                                        @else
                                                                            <button data-toggle="tooltip" class="btn btn-primary icon" type="button" title="Add Cart">
                                                                                <a href="{{ url('/single/product/'. $tabAllProduct->id . '/' .$tabAllProduct->product_slug_en ) }}">
                                                                                    <i class="fa fa-shopping-cart"></i>
                                                                                </a>
                                                                            </button>
                                                                        @endif
                                                                    </li>
                                                                    <li class="lnk wishlist">
                                                                        @if(session()->get('language') == 'bangle')
                                                                            <a data-toggle="tooltip" class="add-to-cart" href="{{ url('/single/product/'. $tabAllProduct->id . '/' .$tabAllProduct->product_slug_bn) }}" title="ইচ্ছেতালিকা">
                                                                                <i class="icon fa fa-heart"></i>
                                                                            </a>
                                                                        @else
                                                                            <a data-toggle="tooltip" class="add-to-cart" href="{{ url('/single/product/'. $tabAllProduct->id . '/' .$tabAllProduct->product_slug_en) }}" title="Wishlist">
                                                                                <i class="icon fa fa-heart"></i>
                                                                            </a>
                                                                        @endif
                                                                    </li>
                                                                    <li class="lnk">
                                                                        @if(session()->get('language') == 'bangle')
                                                                            <a data-toggle="tooltip" class="add-to-cart" href="{{ url('/single/product/'. $tabAllProduct->id . '/' .$tabAllProduct->product_slug_bn) }}" title="তুলনা করা">
                                                                                <i class="fa fa-signal" aria-hidden="true"></i>
                                                                            </a>
                                                                        @else
                                                                            <a data-toggle="tooltip" class="add-to-cart" href="{{ url('/single/product/'. $tabAllProduct->id . '/' .$tabAllProduct->product_slug_en) }}" title="Compare">
                                                                                <i class="fa fa-signal" aria-hidden="true"></i>
                                                                            </a>
                                                                        @endif
                                                                    </li>
                                                                </ul>
                                                            </div><!-- /.action -->
                                                        </div><!-- /.cart -->
                                                    </div><!-- /.product -->
                                                </div><!-- /.products -->
                                            </div><!-- /.item -->
                                        @endforeach
                                    </div><!-- /.home-owl-carousel -->
                                </div><!-- /.product-slider -->
                            </div><!-- /.tab-pane -->

                            @foreach($tabcategorys as $cat)
                                <div class="tab-pane" id="category{{ $cat->id }}">
                                    <div class="product-slider">
                                        <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
                                            @php
                                                $categoryWiseProducts = \App\Models\Product::where('category_id', $cat->id)->orderBy('id', 'DESC')->get();
                                            @endphp
                                            @forelse($categoryWiseProducts as $tabAllProduct)
                                                <div class="item item-carousel">
                                                    <div class="products">
                                                        <div class="product">
                                                            <div class="product-image">
                                                                <div class="image">
                                                                    @if(session()->get('language') == 'bangle')
                                                                        <a href="{{ url('/single/product/'. $tabAllProduct->id . '/' .$tabAllProduct->product_slug_bn) }}"><img  src="{{ asset($tabAllProduct->product_thumbnail) }}" alt=""></a>
                                                                    @else
                                                                        <a href="{{ url('/single/product/'. $tabAllProduct->id . '/' .$tabAllProduct->product_slug_en) }}"><img  src="{{ asset($tabAllProduct->product_thumbnail) }}" alt=""></a>
                                                                    @endif
                                                                </div><!-- /.image -->
                                                                @if($tabAllProduct->discount_price == NULL)
                                                                    <div class="tag sale">
                                                                        @if(session()->get('language') == 'bangle')
                                                                            <span>নতুন</span>
                                                                        @else
                                                                            <span>New</span>
                                                                        @endif
                                                                    </div>
                                                                @else
                                                                    <div class="tag new">
                                                                        @if(session()->get('language') == 'bangle')
                                                                            <span>{{ bn_replace(round($parsentage))  }}%</span>
                                                                        @else
                                                                            <span>{{round($parsentage)}}%</span>
                                                                        @endif
                                                                    </div>
                                                                @endif
                                                            </div><!-- /.product-image -->
                                                            <div class="product-info text-left">
                                                                <h3 class="name">
                                                                    @if(session()->get('language') == 'bangle')
                                                                        <a href="{{ url('/single/product/'. $tabAllProduct->id . '/' .$tabAllProduct->product_slug_bn) }}">{{ $tabAllProduct->product_title_bn }}</a>
                                                                    @else
                                                                        <a href="{{ url('/single/product/'. $tabAllProduct->id . '/' .$tabAllProduct->product_slug_en) }}">{{ $tabAllProduct->product_title_en }}</a>
                                                                    @endif
                                                                </h3>
                                                                <div class="rating rateit-small"></div>
                                                                <div class="description"></div>
                                                                <div class="product-price">
                                                                    @if( $tabAllProduct->discount_price == NULL)
                                                                        @if(session()->get('language') == 'bangle')
                                                                            <span class="price">৳{{ bn_replace($tabAllProduct->selling_price) }} </span>
                                                                        @else
                                                                            <span class="price">${{ $tabAllProduct->selling_price }} </span>
                                                                        @endif
                                                                    @else
                                                                        @if(session()->get('language') == 'bangle')
                                                                            <span class="price">${{ bn_replace( $tabAllProduct->discount_price)  }} </span>
                                                                            <span class="price-before-discount">${{ bn_replace($tabAllProduct->selling_price) }}</span>
                                                                        @else
                                                                            <span class="price">${{ $tabAllProduct->discount_price }} </span>
                                                                            <span class="price-before-discount">${{ $tabAllProduct->selling_price }}</span>
                                                                        @endif
                                                                    @endif
                                                                </div><!-- /.product-price -->
                                                            </div><!-- /.product-info -->
                                                            <div class="cart clearfix animate-effect">
                                                                <div class="action">
                                                                    <ul class="list-unstyled">
                                                                        <li class="add-cart-button btn-group">
                                                                            @if(session()->get('language') == 'bangle')
                                                                                <button data-toggle="tooltip" class="btn btn-primary icon" type="button" title="কার্ড যুক্ত করুন">
                                                                                    <a href="{{ url('/single/product/'. $tabAllProduct->id . '/' .$tabAllProduct->product_slug_bn) }}">
                                                                                        <i class="fa fa-shopping-cart"></i>
                                                                                    </a>
                                                                                </button>
                                                                            @else
                                                                                <button data-toggle="tooltip" class="btn btn-primary icon" type="button" title="Add Cart">
                                                                                    <a href="{{ url('/single/product/'. $tabAllProduct->id . '/' .$tabAllProduct->product_slug_en ) }}">
                                                                                        <i class="fa fa-shopping-cart"></i>
                                                                                    </a>
                                                                                </button>
                                                                            @endif
                                                                        </li>
                                                                        <li class="lnk wishlist">
                                                                            @if(session()->get('language') == 'bangle')
                                                                                <a data-toggle="tooltip" class="add-to-cart" href="{{ url('/single/product/'. $tabAllProduct->id . '/' .$tabAllProduct->product_slug_bn) }}" title="ইচ্ছেতালিকা">
                                                                                    <i class="icon fa fa-heart"></i>
                                                                                </a>
                                                                            @else
                                                                                <a data-toggle="tooltip" class="add-to-cart" href="{{ url('/single/product/'. $tabAllProduct->id . '/' .$tabAllProduct->product_slug_en) }}" title="Wishlist">
                                                                                    <i class="icon fa fa-heart"></i>
                                                                                </a>
                                                                            @endif
                                                                        </li>
                                                                        <li class="lnk">
                                                                            @if(session()->get('language') == 'bangle')
                                                                                <a data-toggle="tooltip" class="add-to-cart" href="{{ url('/single/product/'. $tabAllProduct->id . '/' .$tabAllProduct->product_slug_bn) }}" title="তুলনা করা">
                                                                                    <i class="fa fa-signal" aria-hidden="true"></i>
                                                                                </a>
                                                                            @else
                                                                                <a data-toggle="tooltip" class="add-to-cart" href="{{ url('/single/product/'. $tabAllProduct->id . '/' .$tabAllProduct->product_slug_en) }}" title="Compare">
                                                                                    <i class="fa fa-signal" aria-hidden="true"></i>
                                                                                </a>
                                                                            @endif
                                                                        </li>
                                                                    </ul>
                                                                </div><!-- /.action -->
                                                            </div><!-- /.cart -->
                                                        </div><!-- /.product -->
                                                    </div><!-- /.products -->
                                                </div><!-- /.item -->
                                                @empty
                                                    <h3 class="text-danger font-weight-bold pb-3">
                                                        @if(session()->get('language') == 'bangle') কোন পণ্য পাওয়া যায় নি @else No Product Found @endif
                                                    </h3>
                                            @endforelse
                                        </div><!-- /.home-owl-carousel -->
                                    </div><!-- /.product-slider -->
                                </div><!-- /.tab-pane -->
                            @endforeach

                        </div><!-- /.tab-content -->
                    </div><!-- /.scroll-tabs -->
                    <!-- ============================================== SCROLL TABS : END ============================================== -->
                    <!-- ============================================== WIDE PRODUCTS ============================================== -->
                    <div class="wide-banners wow fadeInUp outer-bottom-xs">
                        <div class="row">
                            <div class="col-md-7 col-sm-7">
                                <div class="wide-banner cnt-strip">
                                    <div class="image">
                                        <img class="img-responsive" src="{{ asset('fontend') }}/assets/images/banners/home-banner1.jpg" alt="">
                                    </div>

                                </div><!-- /.wide-banner -->
                            </div><!-- /.col -->
                            <div class="col-md-5 col-sm-5">
                                <div class="wide-banner cnt-strip">
                                    <div class="image">
                                        <img class="img-responsive" src="{{ asset('fontend') }}/assets/images/banners/home-banner2.jpg" alt="">
                                    </div>

                                </div><!-- /.wide-banner -->
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.wide-banners -->

                    <!-- ============================================== WIDE PRODUCTS : END ============================================== -->
                    <!-- ============================================== FEATURED PRODUCTS ============================================== -->
                    <section class="section featured-product wow fadeInUp">
                        <h3 class="section-title">
                            @if(session()->get('language') == 'bangle') বৈশিষ্ট্যযুক্ত পণ্য @else Featured products @endif
                        </h3>
                        <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
                            @forelse($featureds as $featured)
                                <div class="item item-carousel">
                                <div class="products">
                                    <div class="product">
                                        <div class="product-image">
                                            <div class="image">
                                                @if(session()->get('language') == 'bangle')
                                                    <a href="{{ url('/single/product/'. $featured->id . '/' .$featured->product_slug_bn) }}"><img  src="{{ asset($featured->product_thumbnail) }}" alt=""></a>
                                                @else
                                                    <a href="{{ url('/single/product/'. $featured->id . '/' .$featured->product_slug_en) }}"><img  src="{{ asset($featured->product_thumbnail) }}" alt=""></a>
                                                @endif
                                            </div><!-- /.image -->
                                                @php
                                                    $amount = $featured->selling_price - $featured->discount_price;
                                                    $persentage = ($amount / $featured->selling_price)*100;
                                                @endphp
                                                @if($featured->discount_price == NULL)
                                                    <div class="tag new">
                                                        @if(session()->get('language') == 'bangle')
                                                            <span>নতুন</span>
                                                        @else
                                                            <span>New</span>
                                                        @endif
                                                    </div>
                                                @else
                                                    <div class="tag sale">
                                                        @if(session()->get('language') == 'bangle')
                                                            <span>{{ bn_replace(round($persentage)) }}%</span>
                                                        @else
                                                            <span>{{ round($persentage) }}%</span>
                                                        @endif
                                                    </div>
                                                @endif
                                        </div><!-- /.product-image -->
                                        <div class="product-info text-left">
                                            <h3 class="name">
                                                @if(session()->get('language') == 'bangle')
                                                    <a href="{{ url('/single/product/'. $featured->id . '/' .$featured->product_slug_bn) }}">{{ $featured->product_title_bn }}</a>
                                                @else
                                                    <a href="{{ url('/single/product/'. $featured->id . '/' .$featured->product_slug_en) }}">{{ $featured->product_title_en }}</a>
                                                @endif
                                            </h3>
                                            <div class="rating rateit-small"></div>
                                            <div class="description"></div>
                                            <div class="product-price">
                                                @if( $featured->discount_price == NULL)
                                                    @if(session()->get('language') == 'bangle')
                                                        <span class="price">৳{{ bn_replace($featured->selling_price) }} </span>
                                                    @else
                                                        <span class="price">${{ $featured->selling_price }} </span>
                                                    @endif
                                                @else
                                                    @if(session()->get('language') == 'bangle')
                                                        <span class="price">৳{{ bn_replace( $featured->discount_price)  }} </span>
                                                        <span class="price-before-discount">${{ bn_replace($featured->selling_price) }}</span>
                                                    @else
                                                        <span class="price">${{ $featured->discount_price }} </span>
                                                        <span class="price-before-discount">${{ $featured->selling_price }}</span>
                                                    @endif
                                                @endif
                                            </div><!-- /.product-price -->
                                        </div><!-- /.product-info -->
                                        <div class="cart clearfix animate-effect">
                                            <div class="action">
                                                <ul class="list-unstyled">
                                                    <li class="add-cart-button btn-group">
                                                        @if(session()->get('language') == 'bangle')
                                                            <button data-toggle="tooltip" class="btn btn-primary icon" type="button" title="কার্ড যুক্ত করুন">
                                                                <a href="{{ url('/single/product/'. $featured->id . '/' .$featured->product_slug_bn) }}">
                                                                    <i class="fa fa-shopping-cart"></i>
                                                                </a>
                                                            </button>
                                                        @else
                                                            <button data-toggle="tooltip" class="btn btn-primary icon" type="button" title="Add Cart">
                                                                <a href="{{ url('/single/product/'. $featured->id . '/' .$featured->product_slug_en ) }}">
                                                                    <i class="fa fa-shopping-cart"></i>
                                                                </a>
                                                            </button>
                                                        @endif
                                                    </li>
                                                    <li class="lnk wishlist">
                                                        @if(session()->get('language') == 'bangle')
                                                            <a data-toggle="tooltip" class="add-to-cart" href="{{ url('/single/product/'. $featured->id . '/' .$featured->product_slug_bn) }}" title="ইচ্ছেতালিকা">
                                                                <i class="icon fa fa-heart"></i>
                                                            </a>
                                                        @else
                                                            <a data-toggle="tooltip" class="add-to-cart" href="{{ url('/single/product/'. $featured->id . '/' .$featured->product_slug_en) }}" title="Wishlist">
                                                                <i class="icon fa fa-heart"></i>
                                                            </a>
                                                        @endif
                                                    </li>
                                                    <li class="lnk">
                                                        @if(session()->get('language') == 'bangle')
                                                            <a data-toggle="tooltip" class="add-to-cart" href="{{ url('/single/product/'. $featured->id . '/' .$featured->product_slug_bn) }}" title="তুলনা করা">
                                                                <i class="fa fa-signal" aria-hidden="true"></i>
                                                            </a>
                                                        @else
                                                            <a data-toggle="tooltip" class="add-to-cart" href="{{ url('/single/product/'. $featured->id . '/' .$featured->product_slug_en) }}" title="Compare">
                                                                <i class="fa fa-signal" aria-hidden="true"></i>
                                                            </a>
                                                        @endif
                                                    </li>
                                                </ul>
                                            </div><!-- /.action -->
                                        </div><!-- /.cart -->
                                    </div><!-- /.product -->

                                </div><!-- /.products -->
                            </div><!-- /.item -->
                            @empty
                                <h4 style="color:red; font-weight:700"> @if (session()->get('language') == 'bangle') পণ্য পাওয়া যায় নি @else Product Not Found @endif </h4>
                            @endforelse
                        </div><!-- /.home-owl-carousel -->
                    </section><!-- /.section -->
                    <!-- ============================================== FEATURED PRODUCTS : END ============================================== -->
                    <!-- ============================================== WIDE PRODUCTS ============================================== -->
                    <div class="wide-banners wow fadeInUp outer-bottom-xs">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="wide-banner cnt-strip">
                                    <div class="image">
                                        <img class="img-responsive" src="{{ asset('fontend') }}/assets/images/banners/home-banner.jpg" alt="">
                                    </div>
                                    <div class="strip strip-text">
                                        <div class="strip-inner">
                                            <h2 class="text-right">New Mens Fashion<br>
                                                <span class="shopping-needs">Save up to 40% off</span></h2>
                                        </div>
                                    </div>
                                    <div class="new-label">
                                        <div class="text">NEW</div>
                                    </div><!-- /.new-label -->
                                </div><!-- /.wide-banner -->
                            </div><!-- /.col -->

                        </div><!-- /.row -->
                    </div><!-- /.wide-banners -->
                    <!-- ============================================== WIDE PRODUCTS : END ============================================== -->
                    <!-- ============================================== BEST SELLER ============================================== -->

                    <div class="best-deal wow fadeInUp outer-bottom-xs">
                        <h3 class="section-title">Best seller</h3>
                        <div class="sidebar-widget-body outer-top-xs">
                            <div class="owl-carousel best-seller custom-carousel owl-theme outer-top-xs">
                                <div class="item">
                                    <div class="products best-product">
                                        <div class="product">
                                            <div class="product-micro">
                                                <div class="row product-micro-row">
                                                    <div class="col col-xs-5">
                                                        <div class="product-image">
                                                            <div class="image">
                                                                <a href="#">
                                                                    <img src="{{ asset('fontend') }}/assets/images/products/p20.jpg" alt="">
                                                                </a>
                                                            </div><!-- /.image -->



                                                        </div><!-- /.product-image -->
                                                    </div><!-- /.col -->
                                                    <div class="col2 col-xs-7">
                                                        <div class="product-info">
                                                            <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price">
				<span class="price">
					$450.99				</span>

                                                            </div><!-- /.product-price -->

                                                        </div>
                                                    </div><!-- /.col -->
                                                </div><!-- /.product-micro-row -->
                                            </div><!-- /.product-micro -->

                                        </div>
                                        <div class="product">
                                            <div class="product-micro">
                                                <div class="row product-micro-row">
                                                    <div class="col col-xs-5">
                                                        <div class="product-image">
                                                            <div class="image">
                                                                <a href="#">
                                                                    <img src="{{ asset('fontend') }}/assets/images/products/p21.jpg" alt="">
                                                                </a>
                                                            </div><!-- /.image -->


                                                        </div><!-- /.product-image -->
                                                    </div><!-- /.col -->
                                                    <div class="col2 col-xs-7">
                                                        <div class="product-info">
                                                            <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price">
				<span class="price">
					$450.99				</span>

                                                            </div><!-- /.product-price -->

                                                        </div>
                                                    </div><!-- /.col -->
                                                </div><!-- /.product-micro-row -->
                                            </div><!-- /.product-micro -->

                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="products best-product">
                                        <div class="product">
                                            <div class="product-micro">
                                                <div class="row product-micro-row">
                                                    <div class="col col-xs-5">
                                                        <div class="product-image">
                                                            <div class="image">
                                                                <a href="#">
                                                                    <img src="{{ asset('fontend') }}/assets/images/products/p22.jpg" alt="">
                                                                </a>
                                                            </div><!-- /.image -->


                                                        </div><!-- /.product-image -->
                                                    </div><!-- /.col -->
                                                    <div class="col2 col-xs-7">
                                                        <div class="product-info">
                                                            <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price">
				<span class="price">
					$450.99				</span>

                                                            </div><!-- /.product-price -->

                                                        </div>
                                                    </div><!-- /.col -->
                                                </div><!-- /.product-micro-row -->
                                            </div><!-- /.product-micro -->

                                        </div>
                                        <div class="product">
                                            <div class="product-micro">
                                                <div class="row product-micro-row">
                                                    <div class="col col-xs-5">
                                                        <div class="product-image">
                                                            <div class="image">
                                                                <a href="#">
                                                                    <img src="{{ asset('fontend') }}/assets/images/products/p23.jpg" alt="">
                                                                </a>
                                                            </div><!-- /.image -->



                                                        </div><!-- /.product-image -->
                                                    </div><!-- /.col -->
                                                    <div class="col2 col-xs-7">
                                                        <div class="product-info">
                                                            <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price">
				<span class="price">
					$450.99				</span>

                                                            </div><!-- /.product-price -->

                                                        </div>
                                                    </div><!-- /.col -->
                                                </div><!-- /.product-micro-row -->
                                            </div><!-- /.product-micro -->

                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="products best-product">
                                        <div class="product">
                                            <div class="product-micro">
                                                <div class="row product-micro-row">
                                                    <div class="col col-xs-5">
                                                        <div class="product-image">
                                                            <div class="image">
                                                                <a href="#">
                                                                    <img src="{{ asset('fontend') }}/assets/images/products/p24.jpg" alt="">
                                                                </a>
                                                            </div><!-- /.image -->



                                                        </div><!-- /.product-image -->
                                                    </div><!-- /.col -->
                                                    <div class="col2 col-xs-7">
                                                        <div class="product-info">
                                                            <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price">
				<span class="price">
					$450.99				</span>

                                                            </div><!-- /.product-price -->

                                                        </div>
                                                    </div><!-- /.col -->
                                                </div><!-- /.product-micro-row -->
                                            </div><!-- /.product-micro -->

                                        </div>
                                        <div class="product">
                                            <div class="product-micro">
                                                <div class="row product-micro-row">
                                                    <div class="col col-xs-5">
                                                        <div class="product-image">
                                                            <div class="image">
                                                                <a href="#">
                                                                    <img src="{{ asset('fontend') }}/assets/images/products/p25.jpg" alt="">
                                                                </a>
                                                            </div><!-- /.image -->


                                                        </div><!-- /.product-image -->
                                                    </div><!-- /.col -->
                                                    <div class="col2 col-xs-7">
                                                        <div class="product-info">
                                                            <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price">
				<span class="price">
					$450.99				</span>

                                                            </div><!-- /.product-price -->

                                                        </div>
                                                    </div><!-- /.col -->
                                                </div><!-- /.product-micro-row -->
                                            </div><!-- /.product-micro -->

                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="products best-product">
                                        <div class="product">
                                            <div class="product-micro">
                                                <div class="row product-micro-row">
                                                    <div class="col col-xs-5">
                                                        <div class="product-image">
                                                            <div class="image">
                                                                <a href="#">
                                                                    <img src="{{ asset('fontend') }}/assets/images/products/p26.jpg" alt="">
                                                                </a>
                                                            </div><!-- /.image -->



                                                        </div><!-- /.product-image -->
                                                    </div><!-- /.col -->
                                                    <div class="col2 col-xs-7">
                                                        <div class="product-info">
                                                            <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price">
				<span class="price">
					$450.99				</span>

                                                            </div><!-- /.product-price -->

                                                        </div>
                                                    </div><!-- /.col -->
                                                </div><!-- /.product-micro-row -->
                                            </div><!-- /.product-micro -->

                                        </div>
                                        <div class="product">
                                            <div class="product-micro">
                                                <div class="row product-micro-row">
                                                    <div class="col col-xs-5">
                                                        <div class="product-image">
                                                            <div class="image">
                                                                <a href="#">
                                                                    <img src="{{ asset('fontend') }}/assets/images/products/p27.jpg" alt="">
                                                                </a>
                                                            </div><!-- /.image -->


                                                        </div><!-- /.product-image -->
                                                    </div><!-- /.col -->
                                                    <div class="col2 col-xs-7">
                                                        <div class="product-info">
                                                            <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                                                            <div class="rating rateit-small"></div>
                                                            <div class="product-price">
				<span class="price">
					$450.99				</span>

                                                            </div><!-- /.product-price -->

                                                        </div>
                                                    </div><!-- /.col -->
                                                </div><!-- /.product-micro-row -->
                                            </div><!-- /.product-micro -->

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.sidebar-widget-body -->
                    </div><!-- /.sidebar-widget -->
                    <!-- ============================================== BEST SELLER : END ============================================== -->

                    <!-- ============================================== BLOG SLIDER ============================================== -->
                    <section class="section latest-blog outer-bottom-vs wow fadeInUp">
                        <h3 class="section-title">latest form blog</h3>
                        <div class="blog-slider-container outer-top-xs">
                            <div class="owl-carousel blog-slider custom-carousel">

                                <div class="item">
                                    <div class="blog-post">
                                        <div class="blog-post-image">
                                            <div class="image">
                                                <a href="blog.html"><img src="{{ asset('fontend') }}/assets/images/blog-post/post1.jpg" alt=""></a>
                                            </div>
                                        </div><!-- /.blog-post-image -->


                                        <div class="blog-post-info text-left">
                                            <h3 class="name"><a href="#">Voluptatem accusantium doloremque laudantium</a></h3>
                                            <span class="info">By Jone Doe &nbsp;|&nbsp; 21 March 2016 </span>
                                            <p class="text">Sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
                                            <a href="#" class="lnk btn btn-primary">Read more</a>
                                        </div><!-- /.blog-post-info -->


                                    </div><!-- /.blog-post -->
                                </div><!-- /.item -->


                                <div class="item">
                                    <div class="blog-post">
                                        <div class="blog-post-image">
                                            <div class="image">
                                                <a href="blog.html"><img src="{{ asset('fontend') }}/assets/images/blog-post/post2.jpg" alt=""></a>
                                            </div>
                                        </div><!-- /.blog-post-image -->


                                        <div class="blog-post-info text-left">
                                            <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla pariatur</a></h3>
                                            <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
                                            <p class="text">Sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
                                            <a href="#" class="lnk btn btn-primary">Read more</a>
                                        </div><!-- /.blog-post-info -->


                                    </div><!-- /.blog-post -->
                                </div><!-- /.item -->


                                <!-- /.item -->


                                <div class="item">
                                    <div class="blog-post">
                                        <div class="blog-post-image">
                                            <div class="image">
                                                <a href="blog.html"><img src="{{ asset('fontend') }}/assets/images/blog-post/post1.jpg" alt=""></a>
                                            </div>
                                        </div><!-- /.blog-post-image -->


                                        <div class="blog-post-info text-left">
                                            <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla pariatur</a></h3>
                                            <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
                                            <p class="text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium</p>
                                            <a href="#" class="lnk btn btn-primary">Read more</a>
                                        </div><!-- /.blog-post-info -->


                                    </div><!-- /.blog-post -->
                                </div><!-- /.item -->


                                <div class="item">
                                    <div class="blog-post">
                                        <div class="blog-post-image">
                                            <div class="image">
                                                <a href="blog.html"><img src="{{ asset('fontend') }}/assets/images/blog-post/post2.jpg" alt=""></a>
                                            </div>
                                        </div><!-- /.blog-post-image -->


                                        <div class="blog-post-info text-left">
                                            <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla pariatur</a></h3>
                                            <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
                                            <p class="text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium</p>
                                            <a href="#" class="lnk btn btn-primary">Read more</a>
                                        </div><!-- /.blog-post-info -->


                                    </div><!-- /.blog-post -->
                                </div><!-- /.item -->


                                <div class="item">
                                    <div class="blog-post">
                                        <div class="blog-post-image">
                                            <div class="image">
                                                <a href="blog.html"><img src="{{ asset('fontend') }}/assets/images/blog-post/post1.jpg" alt=""></a>
                                            </div>
                                        </div><!-- /.blog-post-image -->


                                        <div class="blog-post-info text-left">
                                            <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla pariatur</a></h3>
                                            <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
                                            <p class="text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium</p>
                                            <a href="#" class="lnk btn btn-primary">Read more</a>
                                        </div><!-- /.blog-post-info -->


                                    </div><!-- /.blog-post -->
                                </div><!-- /.item -->


                            </div><!-- /.owl-carousel -->
                        </div><!-- /.blog-slider-container -->
                    </section><!-- /.section -->
                    <!-- ============================================== BLOG SLIDER : END ============================================== -->

                    <!-- ============================================== FEATURED PRODUCTS ============================================== -->
                    <section class="section wow fadeInUp new-arriavls">
                        <h3 class="section-title">New Arrivals</h3>
                        <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">

                            <div class="item item-carousel">
                                <div class="products">

                                    <div class="product">
                                        <div class="product-image">
                                            <div class="image">
                                                <a href="detail.html"><img  src="{{ asset('fontend') }}/assets/images/products/p19.jpg" alt=""></a>
                                            </div><!-- /.image -->

                                            <div class="tag new"><span>new</span></div>
                                        </div><!-- /.product-image -->


                                        <div class="product-info text-left">
                                            <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                            <div class="rating rateit-small"></div>
                                            <div class="description"></div>

                                            <div class="product-price">
				<span class="price">
					$450.99				</span>
                                                <span class="price-before-discount">$ 800</span>

                                            </div><!-- /.product-price -->

                                        </div><!-- /.product-info -->
                                        <div class="cart clearfix animate-effect">
                                            <div class="action">
                                                <ul class="list-unstyled">
                                                    <li class="add-cart-button btn-group">
                                                        <button class="btn btn-primary icon" data-toggle="dropdown" type="button">
                                                            <i class="fa fa-shopping-cart"></i>
                                                        </button>
                                                        <button class="btn btn-primary cart-btn" type="button">Add to cart</button>

                                                    </li>

                                                    <li class="lnk wishlist">
                                                        <a class="add-to-cart" href="detail.html" title="Wishlist">
                                                            <i class="icon fa fa-heart"></i>
                                                        </a>
                                                    </li>

                                                    <li class="lnk">
                                                        <a class="add-to-cart" href="detail.html" title="Compare">
                                                            <i class="fa fa-signal" aria-hidden="true"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div><!-- /.action -->
                                        </div><!-- /.cart -->
                                    </div><!-- /.product -->

                                </div><!-- /.products -->
                            </div><!-- /.item -->

                            <div class="item item-carousel">
                                <div class="products">

                                    <div class="product">
                                        <div class="product-image">
                                            <div class="image">
                                                <a href="detail.html"><img  src="{{ asset('fontend') }}/assets/images/products/p28.jpg" alt=""></a>
                                            </div><!-- /.image -->

                                            <div class="tag new"><span>new</span></div>
                                        </div><!-- /.product-image -->


                                        <div class="product-info text-left">
                                            <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                            <div class="rating rateit-small"></div>
                                            <div class="description"></div>

                                            <div class="product-price">
				<span class="price">
					$450.99				</span>
                                                <span class="price-before-discount">$ 800</span>

                                            </div><!-- /.product-price -->

                                        </div><!-- /.product-info -->
                                        <div class="cart clearfix animate-effect">
                                            <div class="action">
                                                <ul class="list-unstyled">
                                                    <li class="add-cart-button btn-group">
                                                        <button class="btn btn-primary icon" data-toggle="dropdown" type="button">
                                                            <i class="fa fa-shopping-cart"></i>
                                                        </button>
                                                        <button class="btn btn-primary cart-btn" type="button">Add to cart</button>

                                                    </li>

                                                    <li class="lnk wishlist">
                                                        <a class="add-to-cart" href="detail.html" title="Wishlist">
                                                            <i class="icon fa fa-heart"></i>
                                                        </a>
                                                    </li>

                                                    <li class="lnk">
                                                        <a class="add-to-cart" href="detail.html" title="Compare">
                                                            <i class="fa fa-signal" aria-hidden="true"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div><!-- /.action -->
                                        </div><!-- /.cart -->
                                    </div><!-- /.product -->

                                </div><!-- /.products -->
                            </div><!-- /.item -->

                            <div class="item item-carousel">
                                <div class="products">

                                    <div class="product">
                                        <div class="product-image">
                                            <div class="image">
                                                <a href="detail.html"><img  src="{{ asset('fontend') }}/assets/images/products/p30.jpg" alt=""></a>
                                            </div><!-- /.image -->

                                            <div class="tag hot"><span>hot</span></div>
                                        </div><!-- /.product-image -->


                                        <div class="product-info text-left">
                                            <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                            <div class="rating rateit-small"></div>
                                            <div class="description"></div>

                                            <div class="product-price">
				<span class="price">
					$450.99				</span>
                                                <span class="price-before-discount">$ 800</span>

                                            </div><!-- /.product-price -->

                                        </div><!-- /.product-info -->
                                        <div class="cart clearfix animate-effect">
                                            <div class="action">
                                                <ul class="list-unstyled">
                                                    <li class="add-cart-button btn-group">
                                                        <button class="btn btn-primary icon" data-toggle="dropdown" type="button">
                                                            <i class="fa fa-shopping-cart"></i>
                                                        </button>
                                                        <button class="btn btn-primary cart-btn" type="button">Add to cart</button>

                                                    </li>

                                                    <li class="lnk wishlist">
                                                        <a class="add-to-cart" href="detail.html" title="Wishlist">
                                                            <i class="icon fa fa-heart"></i>
                                                        </a>
                                                    </li>

                                                    <li class="lnk">
                                                        <a class="add-to-cart" href="detail.html" title="Compare">
                                                            <i class="fa fa-signal" aria-hidden="true"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div><!-- /.action -->
                                        </div><!-- /.cart -->
                                    </div><!-- /.product -->

                                </div><!-- /.products -->
                            </div><!-- /.item -->

                            <div class="item item-carousel">
                                <div class="products">

                                    <div class="product">
                                        <div class="product-image">
                                            <div class="image">
                                                <a href="detail.html"><img  src="{{ asset('fontend') }}/assets/images/products/p1.jpg" alt=""></a>
                                            </div><!-- /.image -->

                                            <div class="tag hot"><span>hot</span></div>
                                        </div><!-- /.product-image -->


                                        <div class="product-info text-left">
                                            <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                            <div class="rating rateit-small"></div>
                                            <div class="description"></div>

                                            <div class="product-price">
				<span class="price">
					$450.99				</span>
                                                <span class="price-before-discount">$ 800</span>

                                            </div><!-- /.product-price -->

                                        </div><!-- /.product-info -->
                                        <div class="cart clearfix animate-effect">
                                            <div class="action">
                                                <ul class="list-unstyled">
                                                    <li class="add-cart-button btn-group">
                                                        <button class="btn btn-primary icon" data-toggle="dropdown" type="button">
                                                            <i class="fa fa-shopping-cart"></i>
                                                        </button>
                                                        <button class="btn btn-primary cart-btn" type="button">Add to cart</button>

                                                    </li>

                                                    <li class="lnk wishlist">
                                                        <a class="add-to-cart" href="detail.html" title="Wishlist">
                                                            <i class="icon fa fa-heart"></i>
                                                        </a>
                                                    </li>

                                                    <li class="lnk">
                                                        <a class="add-to-cart" href="detail.html" title="Compare">
                                                            <i class="fa fa-signal" aria-hidden="true"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div><!-- /.action -->
                                        </div><!-- /.cart -->
                                    </div><!-- /.product -->

                                </div><!-- /.products -->
                            </div><!-- /.item -->

                            <div class="item item-carousel">
                                <div class="products">

                                    <div class="product">
                                        <div class="product-image">
                                            <div class="image">
                                                <a href="detail.html"><img  src="{{ asset('fontend') }}/assets/images/products/p2.jpg" alt=""></a>
                                            </div><!-- /.image -->

                                            <div class="tag sale"><span>sale</span></div>
                                        </div><!-- /.product-image -->


                                        <div class="product-info text-left">
                                            <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                            <div class="rating rateit-small"></div>
                                            <div class="description"></div>

                                            <div class="product-price">
				<span class="price">
					$450.99				</span>
                                                <span class="price-before-discount">$ 800</span>

                                            </div><!-- /.product-price -->

                                        </div><!-- /.product-info -->
                                        <div class="cart clearfix animate-effect">
                                            <div class="action">
                                                <ul class="list-unstyled">
                                                    <li class="add-cart-button btn-group">
                                                        <button class="btn btn-primary icon" data-toggle="dropdown" type="button">
                                                            <i class="fa fa-shopping-cart"></i>
                                                        </button>
                                                        <button class="btn btn-primary cart-btn" type="button">Add to cart</button>

                                                    </li>

                                                    <li class="lnk wishlist">
                                                        <a class="add-to-cart" href="detail.html" title="Wishlist">
                                                            <i class="icon fa fa-heart"></i>
                                                        </a>
                                                    </li>

                                                    <li class="lnk">
                                                        <a class="add-to-cart" href="detail.html" title="Compare">
                                                            <i class="fa fa-signal" aria-hidden="true"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div><!-- /.action -->
                                        </div><!-- /.cart -->
                                    </div><!-- /.product -->

                                </div><!-- /.products -->
                            </div><!-- /.item -->

                            <div class="item item-carousel">
                                <div class="products">

                                    <div class="product">
                                        <div class="product-image">
                                            <div class="image">
                                                <a href="detail.html"><img  src="{{ asset('fontend') }}/assets/images/products/p3.jpg" alt=""></a>
                                            </div><!-- /.image -->

                                            <div class="tag sale"><span>sale</span></div>
                                        </div><!-- /.product-image -->


                                        <div class="product-info text-left">
                                            <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                                            <div class="rating rateit-small"></div>
                                            <div class="description"></div>

                                            <div class="product-price">
				<span class="price">
					$450.99				</span>
                                                <span class="price-before-discount">$ 800</span>

                                            </div><!-- /.product-price -->

                                        </div><!-- /.product-info -->
                                        <div class="cart clearfix animate-effect">
                                            <div class="action">
                                                <ul class="list-unstyled">
                                                    <li class="add-cart-button btn-group">
                                                        <button class="btn btn-primary icon" data-toggle="dropdown" type="button">
                                                            <i class="fa fa-shopping-cart"></i>
                                                        </button>
                                                        <button class="btn btn-primary cart-btn" type="button">Add to cart</button>

                                                    </li>

                                                    <li class="lnk wishlist">
                                                        <a class="add-to-cart" href="detail.html" title="Wishlist">
                                                            <i class="icon fa fa-heart"></i>
                                                        </a>
                                                    </li>

                                                    <li class="lnk">
                                                        <a class="add-to-cart" href="detail.html" title="Compare">
                                                            <i class="fa fa-signal" aria-hidden="true"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div><!-- /.action -->
                                        </div><!-- /.cart -->
                                    </div><!-- /.product -->

                                </div><!-- /.products -->
                            </div><!-- /.item -->
                        </div><!-- /.home-owl-carousel -->
                    </section><!-- /.section -->
                    <!-- ============================================== FEATURED PRODUCTS : END ============================================== -->

                </div><!-- /.homebanner-holder -->
                <!-- ============================================== CONTENT : END ============================================== -->
            </div><!-- /.row -->


            @include('layouts.fontend.brandlogo')


        </div><!-- /.container -->
    </div><!-- /#top-banner-and-menu -->


@endsection()
