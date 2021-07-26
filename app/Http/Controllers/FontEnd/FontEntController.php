<?php

namespace App\Http\Controllers\FontEnd;

use App\Http\Controllers\Controller;
use App\Models\MultiImage;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class FontEntController extends Controller
{
    public function index()
    {
        $tabAllProducts = Product::where('status',1)->get();
        $featureds = Product::where('featured', 1)->where('status', 1)->orderBy('id', 'DESC')->get();
        $hot_deals = Product::where('hot_deals', 1)->where('status', 1)->where('discount_price', '!=', NULL)->orderBy('id', 'DESC')->get();
        $spacial_offers = Product::where('spacial_offer',1)->where('status',1)->limit(5)->orderBy('id', 'DESC')->get();
        $spacial_deals = Product::where('spacial_deals',1)->where('status',1)->limit(5)->orderBy('id', 'DESC')->get();

//        $skip_category_0 = Category::skip(0)->first();
//        $skip_category_1 = Category::skip(1)->first();

        return view('index', compact('tabAllProducts', 'featureds', 'hot_deals', 'spacial_offers', 'spacial_deals'));
    }

    public function singleProduct($id, $slug){
        $product = Product::findOrFail($id);
        $multiImg = MultiImage::where('product_id', $id)->get();
        return view('single-page', compact('multiImg', 'product'));
    }

    // tags wise product show
    public function tagWiseProductsShow($tag){
        $categorys = Category::orderBy('id', 'DESC')->get();
        $products = Product::where('status', 1)->where('product_tags_en', $tag)->orWhere('product_tags_bn',$tag)->orderBy('id','DESC')->paginate(10);
        return view('layouts.fontend.products-tag-page', compact('products', 'categorys'));
    }



}
