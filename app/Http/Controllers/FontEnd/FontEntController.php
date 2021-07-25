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
        $categorys = Category::orderBy('category_name_en', 'ASC')->get();
        $featureds = Product::where('featured', 1)->where('status', 1)->orderBy('id', 'DESC')->get();
        $hot_deals = Product::where('hot_deals', 1)->where('status', 1)->orderBy('id', 'DESC')->get();
        $spacial_offers = Product::where('spacial_offer',1)->where('status',1)->limit(5)->orderBy('id', 'DESC')->get();
        $spacial_deals = Product::where('spacial_deals',1)->where('status',1)->limit(5)->orderBy('id', 'DESC')->get();
        return view('index', compact('tabAllProducts', 'categorys', 'featureds', 'hot_deals', 'spacial_offers', 'spacial_deals'));
    }

    public function singleProduct($id, $slug){
        $product = Product::findOrFail($id);
        $multiImg = MultiImage::where('product_id', $id)->get();
        return view('single-page', compact('multiImg', 'product'));
    }
}
