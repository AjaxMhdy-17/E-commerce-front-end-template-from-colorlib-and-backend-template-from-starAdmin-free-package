<?php

namespace App\Http\Controllers\Frontend\Home;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){

        $data['categories'] = Category::with('subCategory')->get() ; 
        $data['subCategories'] = SubCategory::all() ; 
        $data['mainSlider'] = Product::where('main_slider',1)->first() ;
        $data['featureds'] = Product::where('hot_new',1)->get() ;
        $data['bestRateds'] = Product::where('best_rated',1)->get() ;
        $data['trends'] = Product::where('trend',1)->get() ;
        $data['hotDeals'] = Product::with('category')->where('hot_deal',1)->get() ;
        $data['midSliders'] = Product::with('category')->where('main_slider',1)->get() ;


        return view('front.pages.home.home' ,$data);
    }
}
