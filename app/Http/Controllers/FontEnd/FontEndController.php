<?php

namespace App\Http\Controllers\FontEnd;

use App\Http\Controllers\Controller;
use App\Models\MultiImage;
use App\Models\Wishlist;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class FontEndController extends Controller
{
    public function index()
    {
        $tabAllProducts = Product::where('status',1)->get();
        $featureds = Product::where('featured', 1)->where('status', 1)->orderBy('id', 'DESC')->get();

        $spacial_offers = Product::where('spacial_offer',1)->where('status',1)->limit(5)->orderBy('id', 'DESC')->get();
        $spacial_deals = Product::where('spacial_deals',1)->where('status',1)->limit(5)->orderBy('id', 'DESC')->get();

//        $skip_category_0 = Category::skip(0)->first();
//        $skip_category_1 = Category::skip(1)->first();

        return view('index', compact('tabAllProducts', 'featureds', 'spacial_offers', 'spacial_deals'));
    }

    public function singleProduct($id, $slug){
        $product = Product::findOrFail($id);

        $color_en = $product->product_color_en;
        $product_color_en = explode(',', $color_en);

        $color_bn = $product->product_color_bn;
        $product_color_bn = explode(',', $color_bn);

        $size_en = $product->product_size_en;
        $product_size_en = explode(',', $size_en);

        $size_bn = $product->product_size_bn;
        $product_size_bn = explode(',', $size_bn);

        $cat_id = $product->category_id;

        $multiImg = MultiImage::where('product_id', $id)->get();

        $relatedProduct = Product::where("category_id", $cat_id)->where('id', '!=', $id)->orderBy('id', 'DESC')->get();

        return view('single-page', compact('multiImg', 'product', 'product_color_en', 'product_color_bn', 'product_size_en', 'product_size_bn','relatedProduct',
        ));
    }

    // tags wise product show
    public function tagWiseProductsShow($tag){
        $categorys = Category::orderBy('id', 'DESC')->get();
        $products = Product::where('status', 1)->where('product_tags_en', $tag)->orWhere('product_tags_bn',$tag)->orderBy('id','DESC')->paginate(10);
        return view('layouts.fontend.products-tag-page', compact('products', 'categorys'));
    }


    public function subcategoryWiseProductShow($id){
        $categorys = Category::orderBy('id', 'DESC')->get();
        $products = Product::where('status', 1)->where('subcategory_id', $id)->orderBy('id','DESC')->paginate(10);
        return view('layouts.fontend.subcategory-product', compact('products', 'categorys'));
    }

    // sub sub category wise product show
    public function subSubcategoryWiseProductShow($id){
        $categorys = Category::orderBy('id', 'DESC')->get();
        $products = Product::where('status', 1)->where('subsubcategory_id', $id)->orderBy('id','DESC')->paginate(10);
        return view('layouts.fontend.subcategory-product', compact('products', 'categorys'));
    }



}
