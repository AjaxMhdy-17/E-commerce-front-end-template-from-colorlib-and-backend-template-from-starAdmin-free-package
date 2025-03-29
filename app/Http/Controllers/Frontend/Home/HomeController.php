<?php

namespace App\Http\Controllers\Frontend\Home;

use App\Http\Controllers\Controller;
use App\Models\BrandName;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {

        $data['categories'] = Category::with('subCategory')->get();
        $data['subCategories'] = SubCategory::all();
        $data['brands'] = BrandName::all();
        $data['mainSlider'] = Product::where('main_slider', 1)->first();
        $data['featureds'] = Product::where('hot_new', 1)->get();
        $data['bestRateds'] = Product::where('best_rated', 1)->get();
        $data['trends'] = Product::where('trend', 1)->get();
        $data['hotDeals'] = Product::with('category')->where('hot_deal', 1)->get();

        $deals = [];
        foreach ($data['hotDeals'] as $new) {
            if (isset($new->category)) {
                $deals[] = [
                    'name' => $new->category->name,
                    'id' => $new->category->id
                ];
            }
        }
        $uniqueCats = [];
        $seen = [];
        foreach ($deals as $deal) {
            $key = $deal['name'] . '|' . $deal['id'];
            if (!isset($seen[$key])) {
                $seen[$key] = true;
                $uniqueCats[] = $deal;
            }
        }
        $data['deals'] = $uniqueCats ; 

        $data['midSliders'] = Product::with('category')->where('main_slider', 1)->get();
        $data['hotsNew'] = Product::with('category')->where('hot_new', 1)->get();

        $cats = [];
        foreach ($data['hotsNew'] as $new) {
            if (isset($new->category)) {
                $cats[] = [
                    'name' => $new->category->name,
                    'id' => $new->category->id
                ];
            }
        }
        $uniqueCats = [];
        $seen = [];
        foreach ($cats as $cat) {
            $key = $cat['name'] . '|' . $cat['id'];
            if (!isset($seen[$key])) {
                $seen[$key] = true;
                $uniqueCats[] = $cat;
            }
        }
        $data['cats'] = $uniqueCats;
        return view('front.pages.home.home', $data);
    }
}
