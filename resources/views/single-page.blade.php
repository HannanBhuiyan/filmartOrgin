
@extends('layouts.fontend.fontend-master')
@section('title', 'Single Page')
@section('content')

    <!-- ============================================== HEADER : END ============================================== -->
    <div class="breadcrumb">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="list-inline list-unstyled">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Clothing</a></li>
                    <li class='active'>Floral Print Buttoned</li>
                </ul>
            </div><!-- /.breadcrumb-inner -->
        </div><!-- /.container -->
    </div><!-- /.breadcrumb -->
    <div class="body-content outer-top-xs">
        <div class='container'>
            <div class='row single-product'>
                <div class='col-md-3 sidebar'>
                    <div class="sidebar-module-container">
                        <div class="home-banner outer-top-n">
                            <img src="{{ asset('fontend') }}/assets/images/banners/LHS-banner.jpg" alt="Image">
                        </div>
                        <!-- =============== HOT DEALS ========== -->
                        @include('layouts.fontend.inc.hot-deals');
                        <!-- =============== HOT DEALS: END ================= -->
                        <!-- ============ Testimonials ================== -->
                        @include('layouts.fontend.inc.testmonial');
                        <!-- ========== Testimonials: END ============ -->
                    </div>
                </div><!-- /.sidebar -->
                <div class='col-md-9'>
                    <div class="detail-block">
                        <div class="row  wow fadeInUp">
                            <div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
                                <div class="product-item-holder size-big single-product-gallery small-gallery">
                                    <div id="owl-single-product">
                                            @forelse($multiImg as $img)
                                                <div class="single-product-gallery-item" id="slide{{ $img->id }}">
                                                    <a data-lightbox="image-1" data-title="Gallery">
                                                        <img class="img-responsive" alt="" src="{{ asset($img->photo_name) }}"  />
                                                    </a>
                                                </div><!-- /.single-product-gallery-item -->
                                            @empty
                                            <div class="single-product-gallery-item" id="slide{{ $product->product_thumbnail }}">
                                                <a data-lightbox="image-1" data-title="Gallery">
                                                    <img class="img-responsive" alt="" src="{{ asset($product->product_thumbnail) }}"  />
                                                </a>
                                            </div>
                                            @endforelse
                                    </div><!-- /.single-product-slider -->
                                    <div class="single-product-gallery-thumbs gallery-thumbs">
                                        <div id="owl-single-product-thumbnails">
                                            @foreach ($multiImg as $img)
                                            <div class="item">
                                                <a class="horizontal-thumb active" data-target="#owl-single-product" data-slide="{{ $img->id }}" href="#slide{{ $img->id }}">
                                                    <img class="img-responsive" width="85" alt="" src="{{ asset($img->photo_name) }}"/>
                                                </a>
                                            </div>
                                            @endforeach
                                        </div><!-- /#owl-single-product-thumbnails -->
                                    </div><!-- /.gallery-thumbs -->

                                </div><!-- /.single-product-gallery -->
                            </div><!-- /.gallery-holder -->
                            <div class='col-sm-6 col-md-7 product-info-block'>
                                <div class="product-info">
                                    <h1 class="name">
                                        @if(session()->get('language') == 'bangle')
                                            {{ $product->product_name_bn }}
                                        @else
                                            {{ $product->product_name_en }}
                                        @endif
                                    </h1>
                                    <div class="rating-reviews m-t-20">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="rating rateit-small"></div>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="reviews">
                                                    <a href="#" class="lnk">(13 Reviews)</a>
                                                </div>
                                            </div>
                                        </div><!-- /.row -->
                                    </div><!-- /.rating-reviews -->

                                    <div class="stock-container info-container m-t-10">
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <div class="stock-box">
                                                    <span class="label">Availability :</span>
                                                </div>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="stock-box">
                                                    <span class="value">
                                                        @if( $product->product_qty > 0)
                                                            In Stock
                                                        @else
                                                            Stock Out
                                                        @endif
                                                    </span>
                                                </div>
                                            </div>
                                        </div><!-- /.row -->
                                    </div><!-- /.stock-container -->

                                    <div class="description-container m-t-20">
                                        @if(session()->get('language') == 'bangle')
                                            {{ $product->product_title_bn }}
                                        @else
                                            {{ $product->product_title_en }}
                                        @endif
                                    </div><!-- /.description-container -->

                                    <div class="price-container info-container m-t-20">
                                        <div class="row">
                                            @php
                                                function bn_replace($str){
                                                     $en = array('1', '2', '3', '4', '5', '6', '7', '8', '9', '0');
                                                     $bn =  array('১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯', '০');
                                                     $str = str_replace($en, $bn, $str);
                                                     return $str;
                                                 }
                                            @endphp

                                            <div class="col-sm-6">
                                                <div class="price-box">
                                                    @if( $product->discount_price == NULL)
                                                        @if(session()->get('language') == 'bangle')
                                                            <span class="price">৳{{ bn_replace($product->selling_price) }} </span>
                                                        @else
                                                            <span class="price">${{ $product->selling_price }} </span>
                                                        @endif
                                                    @else
                                                        @if(session()->get('language') == 'bangle')
                                                            <span class="price">${{ bn_replace( $product->discount_price)  }} </span>
                                                            <span class="price-strike">${{ bn_replace($product->selling_price) }}</span>
                                                        @else
                                                            <span class="price">${{ $product->discount_price }} </span>
                                                            <span class="price-strike">${{ $product->selling_price }}</span>
                                                        @endif
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="favorite-button m-t-10">
                                                    <a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Wishlist" href="#">
                                                        <i class="fa fa-heart"></i>
                                                    </a>
                                                    <a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Add to Compare" href="#">
                                                        <i class="fa fa-signal"></i>
                                                    </a>
                                                    <a class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="E-mail" href="#">
                                                        <i class="fa fa-envelope"></i>
                                                    </a>
                                                </div>
                                            </div>

                                        </div><!-- /.row -->
                                        {{-- ============================ product dropdown started   ================================= --}}

                                        <div class="row" style="margin:20px 0px">
                                            <div class="col-sm-6">
                                                <div class="input-group mb-3">
                                                    <label class="input-group-text">Select Color</label>
                                                    <select class="form-control">
                                                        <option value>Choose...</option>

                                                            @if(session()->get('language') == 'bangle')
                                                                @foreach ($product_color_bn as $color_bn)
                                                                    <option value="{{ $color_bn }}">{{ $color_bn }}</option>
                                                                @endforeach
                                                            @else
                                                                @foreach ($product_color_en as $color_en)
                                                                    <option value="{{ $color_en }}">{{ $color_en }}</option>
                                                                @endforeach
                                                           @endif



                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="input-group mb-3">
                                                    <label class="input-group-text">Select Size</label>
                                                    <select class="form-control">
                                                        <option value>Choose...</option>
                                                        @if(session()->get('language') == 'bangle')
                                                            @foreach ($product_size_bn as $size_bn)
                                                                <option value="{{ $size_bn }}">{{ $size_bn }}</option>
                                                            @endforeach
                                                        @else
                                                            @foreach ($product_size_en as $size_en)
                                                                <option value="{{ $size_en }}">{{ $size_en }}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                        </div><!-- /.row -->

                                        {{-- ============================ product dropdown ended  ================================= --}}

                                    </div><!-- /.price-container -->

                                    <div class="quantity-container info-container">
                                        <div class="row">

                                            <div class="col-sm-2">
                                                <span class="label">Qty :</span>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="cart-quantity">
                                                    <div class="quant-input">
                                                        <div class="arrows">
                                                            <div class="arrow plus gradient"><span class="ir"><i class="icon fa fa-sort-asc"></i></span></div>
                                                            <div class="arrow minus gradient"><span class="ir"><i class="icon fa fa-sort-desc"></i></span></div>
                                                        </div>
                                                        <input type="text" value="1">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-7">
                                                <a href="#" class="btn btn-primary"><i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART</a>
                                            </div>
                                        </div><!-- /.row -->
                                    </div><!-- /.quantity-container -->
                                </div><!-- /.product-info -->
                            </div><!-- /.col-sm-7 -->
                        </div><!-- /.row -->
                    </div>

                    <div class="product-tabs inner-bottom-xs  wow fadeInUp">
                        <div class="row">
                            <div class="col-sm-3">
                                <ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
                                    <li class="active"><a data-toggle="tab" href="#description">DESCRIPTION</a></li>
                                    <li><a data-toggle="tab" href="#review">REVIEW</a></li>
                                    <li><a data-toggle="tab" href="#tags">TAGS</a></li>
                                </ul><!-- /.nav-tabs #product-tabs -->
                            </div>
                            <div class="col-sm-9">

                                <div class="tab-content">

                                    <div id="description" class="tab-pane in active">
                                        <div class="product-tab">
                                            <p class="text">
                                                @if(session()->get('language') == 'bangle')
                                                    {{ $product->product_desc_bn }}
                                                @else
                                                    {{ $product->product_desc_en }}
                                                @endif
                                            </p>
                                        </div>
                                    </div><!-- /.tab-pane -->

                                    <div id="review" class="tab-pane">
                                        <div class="product-tab">

                                            <div class="product-reviews">
                                                <h4 class="title">Customer Reviews</h4>

                                                <div class="reviews">
                                                    <div class="review">
                                                        <div class="review-title"><span class="summary">We love this product</span><span class="date"><i class="fa fa-calendar"></i><span>1 days ago</span></span></div>
                                                        <div class="text">"Lorem ipsum dolor sit amet, consectetur adipiscing elit.Aliquam suscipit."</div>
                                                    </div>

                                                </div><!-- /.reviews -->
                                            </div><!-- /.product-reviews -->



                                            <div class="product-add-review">
                                                <h4 class="title">Write your own review</h4>
                                                <div class="review-table">
                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <thead>
                                                            <tr>
                                                                <th class="cell-label">&nbsp;</th>
                                                                <th>1 star</th>
                                                                <th>2 stars</th>
                                                                <th>3 stars</th>
                                                                <th>4 stars</th>
                                                                <th>5 stars</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td class="cell-label">Quality</td>
                                                                <td><input type="radio" name="quality" class="radio" value="1"></td>
                                                                <td><input type="radio" name="quality" class="radio" value="2"></td>
                                                                <td><input type="radio" name="quality" class="radio" value="3"></td>
                                                                <td><input type="radio" name="quality" class="radio" value="4"></td>
                                                                <td><input type="radio" name="quality" class="radio" value="5"></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="cell-label">Price</td>
                                                                <td><input type="radio" name="quality" class="radio" value="1"></td>
                                                                <td><input type="radio" name="quality" class="radio" value="2"></td>
                                                                <td><input type="radio" name="quality" class="radio" value="3"></td>
                                                                <td><input type="radio" name="quality" class="radio" value="4"></td>
                                                                <td><input type="radio" name="quality" class="radio" value="5"></td>
                                                            </tr>
                                                            <tr>
                                                                <td class="cell-label">Value</td>
                                                                <td><input type="radio" name="quality" class="radio" value="1"></td>
                                                                <td><input type="radio" name="quality" class="radio" value="2"></td>
                                                                <td><input type="radio" name="quality" class="radio" value="3"></td>
                                                                <td><input type="radio" name="quality" class="radio" value="4"></td>
                                                                <td><input type="radio" name="quality" class="radio" value="5"></td>
                                                            </tr>
                                                            </tbody>
                                                        </table><!-- /.table .table-bordered -->
                                                    </div><!-- /.table-responsive -->
                                                </div><!-- /.review-table -->

                                                <div class="review-form">
                                                    <div class="form-container">
                                                        <form role="form" class="cnt-form">

                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputName">Your Name <span class="astk">*</span></label>
                                                                        <input type="text" class="form-control txt" id="exampleInputName" placeholder="">
                                                                    </div><!-- /.form-group -->
                                                                    <div class="form-group">
                                                                        <label for="exampleInputSummary">Summary <span class="astk">*</span></label>
                                                                        <input type="text" class="form-control txt" id="exampleInputSummary" placeholder="">
                                                                    </div><!-- /.form-group -->
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="exampleInputReview">Review <span class="astk">*</span></label>
                                                                        <textarea class="form-control txt txt-review" id="exampleInputReview" rows="4" placeholder=""></textarea>
                                                                    </div><!-- /.form-group -->
                                                                </div>
                                                            </div><!-- /.row -->

                                                            <div class="action text-right">
                                                                <button class="btn btn-primary btn-upper">SUBMIT REVIEW</button>
                                                            </div><!-- /.action -->

                                                        </form><!-- /.cnt-form -->
                                                    </div><!-- /.form-container -->
                                                </div><!-- /.review-form -->

                                            </div><!-- /.product-add-review -->

                                        </div><!-- /.product-tab -->
                                    </div><!-- /.tab-pane -->

                                    <div id="tags" class="tab-pane">
                                        <div class="product-tag">

                                            <h4 class="title">Product Tags</h4>
                                            <form role="form" class="form-inline form-cnt">
                                                <div class="form-container">

                                                    <div class="form-group">
                                                        <label for="exampleInputTag">Add Your Tags: </label>
                                                        <input type="email" id="exampleInputTag" class="form-control txt">


                                                    </div>

                                                    <button class="btn btn-upper btn-primary" type="submit">ADD TAGS</button>
                                                </div><!-- /.form-container -->
                                            </form><!-- /.form-cnt -->

                                            <form role="form" class="form-inline form-cnt">
                                                <div class="form-group">
                                                    <label>&nbsp;</label>
                                                    <span class="text col-md-offset-3">Use spaces to separate tags. Use single quotes (') for phrases.</span>
                                                </div>
                                            </form><!-- /.form-cnt -->

                                        </div><!-- /.product-tab -->
                                    </div><!-- /.tab-pane -->

                                </div><!-- /.tab-content -->
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div>

                    <!-- ============================================== UPSELL PRODUCTS ============================================== -->
                    <section class="section featured-product wow fadeInUp">
                        <h3 class="section-title">
                            @if(session()->get('language') == 'bangle') সম্পর্কিত পণ্য @else Related products @endif
                        </h3>



                        <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
                            @forelse($relatedProduct as $product)
                                <div class="item item-carousel">
                                    <div class="products">
                                        <div class="product">
                                            <div class="product-image">
                                                <div class="image">
                                                    @if(session()->get('language') == 'bangle')
                                                        <a href="{{ url('/single/product/'. $product->id . '/' .$product->product_slug_bn) }}"><img  src="{{ asset($product->product_thumbnail) }}" alt=""></a>
                                                    @else
                                                        <a href="{{ url('/single/product/'. $product->id . '/' .$product->product_slug_en) }}"><img  src="{{ asset($product->product_thumbnail) }}" alt=""></a>
                                                    @endif
                                                </div><!-- /.image -->
                                                @php
                                                    $amount = $product->selling_price - $product->discount_price;
                                                    $persentage = ($amount / $product->selling_price)*100;
                                                @endphp
                                                @if($product->discount_price == NULL)
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
                                                        <a href="{{ url('/single/product/'. $product->id . '/' .$product->product_slug_bn) }}">{{ $product->product_title_bn }}</a>
                                                    @else
                                                        <a href="{{ url('/single/product/'. $product->id . '/' .$product->product_slug_en) }}">{{ $product->product_title_en }}</a>
                                                    @endif
                                                </h3>
                                                <div class="rating rateit-small"></div>
                                                <div class="description"></div>
                                                <div class="product-price">
                                                    @if( $product->discount_price == NULL)
                                                        @if(session()->get('language') == 'bangle')
                                                            <span class="price">৳{{ bn_replace($product->selling_price) }} </span>
                                                        @else
                                                            <span class="price">${{ $product->selling_price }} </span>
                                                        @endif
                                                    @else
                                                        @if(session()->get('language') == 'bangle')
                                                            <span class="price">৳{{ bn_replace( $product->discount_price)  }} </span>
                                                            <span class="price-before-discount">${{ bn_replace($product->selling_price) }}</span>
                                                        @else
                                                            <span class="price">${{ $product->discount_price }} </span>
                                                            <span class="price-before-discount">${{ $product->selling_price }}</span>
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
                                                                    <a href="{{ url('/single/product/'. $product->id . '/' .$product->product_slug_bn) }}">
                                                                        <i class="fa fa-shopping-cart"></i>
                                                                    </a>
                                                                </button>
                                                            @else
                                                                <button data-toggle="tooltip" class="btn btn-primary icon" type="button" title="Add Cart">
                                                                    <a href="{{ url('/single/product/'. $product->id . '/' .$product->product_slug_en ) }}">
                                                                        <i class="fa fa-shopping-cart"></i>
                                                                    </a>
                                                                </button>
                                                            @endif
                                                        </li>
                                                        <li class="lnk wishlist">
                                                            @if(session()->get('language') == 'bangle')
                                                                <a data-toggle="tooltip" class="add-to-cart" href="{{ url('/single/product/'. $product->id . '/' .$product->product_slug_bn) }}" title="ইচ্ছেতালিকা">
                                                                    <i class="icon fa fa-heart"></i>
                                                                </a>
                                                            @else
                                                                <a data-toggle="tooltip" class="add-to-cart" href="{{ url('/single/product/'. $product->id . '/' .$product->product_slug_en) }}" title="Wishlist">
                                                                    <i class="icon fa fa-heart"></i>
                                                                </a>
                                                            @endif
                                                        </li>
                                                        <li class="lnk">
                                                            @if(session()->get('language') == 'bangle')
                                                                <a data-toggle="tooltip" class="add-to-cart" href="{{ url('/single/product/'. $product->id . '/' .$product->product_slug_bn) }}" title="তুলনা করা">
                                                                    <i class="fa fa-signal" aria-hidden="true"></i>
                                                                </a>
                                                            @else
                                                                <a data-toggle="tooltip" class="add-to-cart" href="{{ url('/single/product/'. $product->id . '/' .$product->product_slug_en) }}" title="Compare">
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
                                <h5 style="color:red; font-weight:700"> @if (session()->get('language') == 'bangle')সম্পর্কিত পণ্য পাওয়া যায় নি @else Related Product Not Found @endif </h5>
                            @endforelse
                        </div><!-- /.home-owl-carousel -->




                    </section><!-- /.section -->
                    <!-- ============================================== UPSELL PRODUCTS : END ============================================== -->

                </div><!-- /.col -->
                <div class="clearfix"></div>
            </div><!-- /.row -->
            <!-- ============================================== BRANDS CAROUSEL ============================================== -->

            @include('layouts.fontend.brandlogo');

            <!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
    </div><!-- /.body-content -->

    <!-- ============================================================= FOOTER ============================================================= -->

@endsection()
