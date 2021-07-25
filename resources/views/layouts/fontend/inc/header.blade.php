
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="MediaCenter, Template, eCommerce">
    <meta name="robots" content="all">

    <title>@yield('title')</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href=" {{ asset('fontend') }}/assets/css/bootstrap.min.css">

    <!-- Customizable CSS -->
    <link rel="stylesheet" href=" {{ asset('fontend') }}/assets/css/main.css">
    <link rel="stylesheet" href=" {{ asset('fontend') }}/assets/css/blue.css">
    <link rel="stylesheet" href=" {{ asset('fontend') }}/assets/css/owl.carousel.css">
    <link rel="stylesheet" href=" {{ asset('fontend') }}/assets/css/owl.transitions.css">
    <link rel="stylesheet" href=" {{ asset('fontend') }}/assets/css/animate.min.css">
    <link rel="stylesheet" href=" {{ asset('fontend') }}/assets/css/rateit.css">
    <link rel="stylesheet" href=" {{ asset('fontend') }}/assets/css/bootstrap-select.min.css">
    <link rel="stylesheet" href=" {{ asset('fontend') }}/assets/css/toastr.min.css">


    <!-- Icons/Glyphs -->
    <link rel="stylesheet" href=" {{ asset('fontend') }}/assets/css/font-awesome.css">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <style>

        .profile_section {
            margin:100px 0px;

        }
        .user-profile-image {
            width:200px;
            height:200px;
            border-radius:50%;
            margin: auto;
            position:relative;
        }
        .profile-inner {
            border: 1px solid #fff;
            padding:50px 0px;
        }


        .user-profile-image img {
            width:200px;
            height:200px;
            border-radius:50%;

        }

        .profile_file {
            position: absolute;
            top: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
            color:transparent;
            box-sizing:border-box;
            background:black;
            border-radius: 50%;
            opacity:0;
            transition: all .3s ease-in-out;
        }

        .profile_file:hover {
            opacity:1;
        }
        .profile_file::-webkit-file-upload-button{
            visibility:hidden;
        }
        .profile_file::before {
            content: '\f030';
            font-family: fontAwesome;
            font-size: 50px;
            color: #fff;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50% , -50%);
        }

        input[type=file] {
            display: block;
            outline:none !important;
        }
        input[type=text] {
            border:none;
            background:transparent;
            margin-top: 10px;
        }

        .overlay {
            position: absolute;
            width: 100%;
            height: 100%;
            background: #00000040;
            border-radius: 50%;
        }

        .profile_name {
            padding: 32px 0px 20px 0px;
            border-bottom: 1px solid #ddd;
        }

        .profile_item {
            padding: 20px 0px 20px 0px;
        }
        .profile_email {
            padding: 12px 0px 20px 0px;
            border-bottom: 1px solid #ddd;
        }
        .nameLabel, .emailLabel {
            font-size:16px;
            font-weight:700;

        }

        input[type="text"] {
            font-size: 16px;
            font-weight: 700;
            outline:none;
        }
        .profile_name i {
            color:red;
        }
        .nameEdit::before {
            content:'\f044';
            font-family:fontAwesome;
            color: #000;
            font-width: 900;
            font-size:20px;
            cursor:pointer;
        }

        .nameUpdateBtnGroup {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            padding: 15px 30px;
        }
        .nameUpdateCancelBtn {
            color: #000;
            padding: 10px 25px;
            font-weight: 700;
            font-size: 17px;
            border-radius: 5px;
            background-color:#ddd;
            border: 1px solid #ddd;
        }
        .nameUpdateCancelBtn:hover {
            background: #59b210;
            color: #fff;
            border: 1px solid #ddd;
        }
        .nameUpdateBtn {
            background: #59b210;
            border: none;
            color: #fff;
            padding: 10px 25px;
            font-weight: 700;
            font-size: 17px;
            border-radius: 5px;
        }
        input.nameInput {
            border-bottom: 1px solid #ddd;
            width: 100%;
            padding: 10px 50px;
            background: #fff;
            outline: none;
        }




    </style>

</head>
<body class="cnt-home">
<!-- ============================================== HEADER ============================================== -->
<header class="header-style-1">

    <!-- ============================================== TOP MENU ============================================== -->
    <div class="top-bar animate-dropdown">
        <div class="container">
            <div class="header-top-inner">
                <div class="cnt-account">
                    <ul class="list-unstyled">
                        <li><a href="#"><i class="icon fa fa-heart"></i>Wishlist</a></li>
                        <li><a href="#"><i class="icon fa fa-shopping-cart"></i>My Cart</a></li>
                        <li><a href="#"><i class="icon fa fa-check"></i>Checkout</a></li>
                        <li><a href="{{ route('user.dashboard') }}"><i class="icon fa fa-user"></i>

                                @if(session()->get('language') == 'bangle')
                                    আমার প্রোফাইল
                                @else
                                    My Account
                                @endif
                            </a></li>
                        <li>
                            @auth
                                <a href=" {{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" ><i class="glyphicon glyphicon-log-out"></i> Log Out
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            @else
                                <a href="{{ route('login') }}"><i class="icon fa fa-lock"></i>Login/Register</a>
                            @endauth

                        </li>
                    </ul>
                </div><!-- /.cnt-account -->

                <div class="cnt-block">
                    <ul class="list-unstyled list-inline">
                        <li class="dropdown dropdown-small">
                            <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value">USD </span><b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">USD</a></li>
                                <li><a href="#">INR</a></li>
                                <li><a href="#">GBP</a></li>
                            </ul>
                        </li>

                        <li class="dropdown dropdown-small">
                            <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><span class="value">
                                    @if (session()->get('language') == 'bangle')
                                        ভাষা
                                    @else
                                        Language
                                    @endif
                                </span><b class="caret"></b></a>
                            <ul class="dropdown-menu">

                                @if (session()->get('language') == 'bangle')
                                    <li><a href="{{ route('english.language') }}">English</a></li>
                                @else
                                    <li><a href="{{ route('bangle.language') }}">বাংলা</a></li>
                                @endif
                            </ul>
                        </li>
                    </ul><!-- /.list-unstyled -->
                </div><!-- /.cnt-cart -->
                <div class="clearfix"></div>
            </div><!-- /.header-top-inner -->
        </div><!-- /.container -->
    </div><!-- /.header-top -->
    <!-- ============================================== TOP MENU : END ============================================== -->
    <div class="main-header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
                    <!-- ============================================================= LOGO ============================================================= -->
                    <div class="logo">
                        <a href=" {{ url('/') }}">
                            <img src=" {{ asset('fontend') }}/assets/images/logo.png" alt="">
                        </a>
                    </div><!-- /.logo -->
                    <!-- ============================================================= LOGO : END ============================================================= -->				</div><!-- /.logo-holder -->

                <div class="col-xs-12 col-sm-12 col-md-7 top-search-holder">
                    <!-- /.contact-row -->
                    <!-- ============================================================= SEARCH AREA ============================================================= -->
                    <div class="search-area">
                        <form>
                            <div class="control-group">

                                <ul class="categories-filter animate-dropdown">
                                    <li class="dropdown">

                                        <a class="dropdown-toggle"  data-toggle="dropdown" href="category.html">Categories <b class="caret"></b></a>

                                        <ul class="dropdown-menu" role="menu" >
                                            <li class="menu-header">Computer</li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Clothing</a></li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Electronics</a></li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Shoes</a></li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1" href="category.html">- Watches</a></li>

                                        </ul>
                                    </li>
                                </ul>

                                <input class="search-field" placeholder="Search here..." />

                                <a class="search-button" href="#" ></a>

                            </div>
                        </form>
                    </div><!-- /.search-area -->
                    <!-- ============================================================= SEARCH AREA : END ============================================================= -->				</div><!-- /.top-search-holder -->

                <div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row">
                    <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->

                    <div class="dropdown dropdown-cart">
                        <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
                            <div class="items-cart-inner">
                                <div class="basket">
                                    <i class="glyphicon glyphicon-shopping-cart"></i>
                                </div>
                                <div class="basket-item-count"><span class="count">2</span></div>
                                <div class="total-price-basket">
                                    <span class="lbl">cart -</span>
                                    <span class="total-price">
						<span class="sign">$</span><span class="value">600.00</span>
					</span>
                                </div>


                            </div>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="cart-item product-summary">
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <div class="image">
                                                <a href="detail.html"><img src="{{ asset('fontend') }}/assets/images/cart.jpg" alt=""></a>
                                            </div>
                                        </div>
                                        <div class="col-xs-7">

                                            <h3 class="name"><a href="index8a95.html?page-detail">Simple Product</a></h3>
                                            <div class="price">$600.00</div>
                                        </div>
                                        <div class="col-xs-1 action">
                                            <a href="#"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </div>
                                </div><!-- /.cart-item -->
                                <div class="clearfix"></div>
                                <hr>

                                <div class="clearfix cart-total">
                                    <div class="pull-right">

                                        <span class="text">Sub Total :</span><span class='price'>$600.00</span>

                                    </div>
                                    <div class="clearfix"></div>

                                    <a href="checkout.html" class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a>
                                </div><!-- /.cart-total-->


                            </li>
                        </ul><!-- /.dropdown-menu-->
                    </div><!-- /.dropdown-cart -->

                    <!-- ============================================================= SHOPPING CART DROPDOWN : END============================================================= -->				</div><!-- /.top-cart-row -->
            </div><!-- /.row -->

        </div><!-- /.container -->

    </div><!-- /.main-header -->

    <!-- ============================================== NAVBAR ============================================== -->
    <div class="header-nav animate-dropdown">
        <div class="container">
            <div class="yamm navbar navbar-default" role="navigation">
                <div class="navbar-header">
                    <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="nav-bg-class">
                    <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
                        <div class="nav-outer">
                            <ul class="nav navbar-nav">
                                <li class="active dropdown yamm-fw">
                                    <a href="home.html" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">Home</a>
                                </li>

                                @php
                                    $categorys = \App\Models\Category::orderBy('category_name_en', 'ASC')->limit(5)->get();
                                @endphp

                                @foreach($categorys as $cat)
                                    <li class="dropdown yamm mega-menu">
                                            @if(session()->get('language') == 'bangle')
                                                <a href="home.html" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">
                                                    {{ $cat->category_name_bn }}
                                                </a>
                                            @else
                                                <a href="home.html" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">
                                                    {{ $cat->category_name_en }}
                                                </a>
                                            @endif
                                        <ul class="dropdown-menu container">
                                            <li>
                                                <div class="yamm-content ">
                                                    <div class="row">
                                                        @php
                                                             $subCategorys = \App\Models\SubCategory::where('category_id', $cat->id)->orderBy('subcategory_name_en', 'ASC')->get();
                                                        @endphp

                                                        @foreach($subCategorys as $subcat)
                                                            <div class="col-xs-12 col-sm-6 col-md-2 col-menu">
                                                                @if(session()->get('language') == 'bangle')
                                                                <h2 class="title">
                                                                        {{ $subcat->subcategory_name_bn }}
                                                                </h2>
                                                                @else
                                                                    <h2 class="title">
                                                                        {{ $subcat->subcategory_name_en }}
                                                                    </h2>
                                                                @endif

                                                                <ul class="links">
                                                                    @php
                                                                        $subSubCategorys = \App\Models\SubSubCategory::where('subcategory_id', $subcat->id)->orderBy('subsubcategory_name_en', 'ASC')->get();
                                                                    @endphp
                                                                    @foreach($subSubCategorys as $subSubCate)
                                                                            <li>
                                                                                @if(session()->get('language') == 'bangle')
                                                                                    <a href="#">
                                                                                        {{ $subSubCate->subsubcategory_name_bn }}
                                                                                    </a>
                                                                                @else
                                                                                    <a href="#">
                                                                                        {{ $subSubCate->subsubcategory_name_en }}
                                                                                    </a>
                                                                                @endif
                                                                            </li>
                                                                    @endforeach

                                                                </ul>
                                                            </div><!-- /.col -->

                                                        @endforeach


                                                        <div class="col-xs-12 col-sm-6 col-md-4 col-menu banner-image">
                                                            <img class="img-responsive" src="{{ asset('fontend') }}/assets/images/banners/top-menu-banner.jpg" alt="">
                                                        </div><!-- /.yamm-content -->
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>



                                @endforeach




                                <li class="dropdown  navbar-right special-menu">
                                    <a href="#">Todays offer</a>
                                </li>


                            </ul><!-- /.navbar-nav -->
                            <div class="clearfix"></div>
                        </div><!-- /.nav-outer -->
                    </div><!-- /.navbar-collapse -->


                </div><!-- /.nav-bg-class -->
            </div><!-- /.navbar-default -->
        </div><!-- /.container-class -->

    </div><!-- /.header-nav -->
    <!-- ============================================== NAVBAR : END ============================================== -->

</header>
