<?php

namespace App\Http\Controllers\Backend\Product;

use App\Http\Controllers\Controller;
use App\Models\BrandName;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use App\Traits\HandlesImageUploads;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{

    use HandlesImageUploads;

    public function index(Request $request)
    {
        $data['title'] = "Product List";

        if ($request->ajax()) {
            $products = Product::orderBy('created_at', 'desc');

            return DataTables::eloquent($products)
                ->addIndexColumn()
                ->addColumn('name', function ($product) {
                    return $product->name;
                })
                ->addColumn('image_one', function ($product) {
                    return $product->image_one
                        ? '<img src="' . asset($product->image_one) . '" alt="Brand Image" style="width : 80px ; height : 60px ; border-radius : 5px; ">'
                        : 'No Image';
                })
                ->addColumn('size', function ($product) {
                    return $product->size;
                })
                ->addColumn('color', function ($product) {
                    return $product->color;
                })
                ->addColumn('selling_price', function ($product) {
                    return $product->selling_price;
                })
                ->addColumn('status', function ($product) {
                    return $product->status == 1
                        ? '<div class="badge badge-success">Active</div>'
                        : '<div class="badge badge-warning">InActive</div>';
                })
                ->addColumn('created_at', function ($product) {
                    return Carbon::parse($product->created_at)->format('Y-m-d');
                })
                ->addColumn('action', function ($product) {
                    return '
                        <div class="dropdown text-right">
                            <button type="button" class="btn btn-info action-dropdown-btn">
                                <i class="ti-time"></i>
                            </button>
                            <div class="dropdown-menu">
                                <form class="status-form" method="POST" action="' . route('admin.product.product.status', ['product_id' => $product->id]) . '">
                                    ' . csrf_field() . '
                                    ' . ($product->status == 1
                        ? '<button type="submit" class="dropdown-item">Set Inactive</button>'
                        : '<button type="submit" class="dropdown-item">Set Active</button>') . '
                                </form>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="' . route('admin.product.list.edit', ['list' => $product->id]) . '">Edit</a>
                                <div class="dropdown-divider"></div>
                                <form class="delete-form" method="POST" action="' . route('admin.product.list.destroy', ['list' => $product->id]) . '">
                                    ' . csrf_field() . '
                                    ' . method_field("DELETE") . '
                                    <button type="submit" class="dropdown-item show-alert-delete-box">Delete</button>
                                </form>
                            </div>
                        </div>
                    ';
                })
                ->rawColumns(['image_one', 'status', 'action'])
                ->make(true);
        }
        return view('admin.pages.product.index.list', $data);
    }


    public function create()
    {
        $data['title'] = "Product Create";
        $data['categories'] = Category::all();
        $data['sub_categories'] = SubCategory::all();
        $data['brands'] = BrandName::all();
        return view('admin.pages.product.index.create', $data);
    }

    public function store(Request $request)
    {
        $data = $this->validateRequest($request);
        $data = $this->booleanConvertion($data);
        unset($data['existing_image_one']);
        unset($data['existing_image_two']);
        unset($data['existing_image_three']);
        if (isset($data['image_one']) && $data['image_one']) {
            $data['image_one'] = $this->uploadImage($data['image_one'], 'public/media/product/', 300, 300);
        }
        if (isset($data['image_two']) && $data['image_two']) {
            $data['image_two'] = $this->uploadImage($data['image_two'], 'public/media/product/', 200, 200);
        }
        if (isset($data['image_three']) && $data['image_three']) {
            $data['image_three'] = $this->uploadImage($data['image_three'], 'public/media/product/', 120, 120);
        }
        Product::create($data);
        return redirect()->route('admin.product.list.index')->with('success', "Product Created Successfully!");
    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {

        $data['title'] = "Product Edit";
        $data['categories'] = Category::all();
        $data['sub_categories'] = SubCategory::all();
        $data['brands'] = BrandName::all();
        return view('admin.pages.product.index.edit', $data);
    }


    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {
        //
    }


    public function validateRequest($request)
    {
        return $request->validate([
            'name' => 'required|unique:products',
            'code' => 'required',
            'quantity' => 'required',
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'brand_id' => 'required',
            'size' => 'required',
            'color' => 'required',
            'selling_price' => 'required',
            'details' => 'required',
            'video_link' => 'required',
            'existing_image_one' => 'sometimes',
            'existing_image_two' => 'sometimes',
            'existing_image_three' => 'sometimes',
            'image_one' => 'sometimes',
            'image_two' => 'sometimes',
            'image_three' => 'sometimes',
            'main_slider' => 'sometimes',
            'mid_slider' => 'sometimes',
            'hot_deal' => 'sometimes',
            'best_rated' => 'sometimes',
            'trend' => 'sometimes',
            'hot_new' => 'sometimes',
        ]);
    }

    public function booleanConvertion($data)
    {
        $data['main_slider'] = isset($_POST['main_slider']) ? 1 : 0;
        $data['mid_slider'] = isset($_POST['mid_slider']) ? 1 : 0;
        $data['hot_deal'] = isset($_POST['hot_deal']) ? 1 : 0;
        $data['best_rated'] = isset($_POST['best_rated']) ? 1 : 0;
        $data['trend'] = isset($_POST['trend']) ? 1 : 0;
        $data['hot_new'] = isset($_POST['hot_new']) ? 1 : 0;
        return $data;
    }


    public function getSubCategory($category_id)
    {

        $subCategories = SubCategory::where('category_id', $category_id)->get();
        return json_encode($subCategories);
    }


    public function changeStatus(Request $request, $product_id)
    {
        $product = Product::findOrFail($product_id);
        $product->status = $product->status == 1 ? 0 : 1;
        $product->save();
        return back()->with('success',"Product Status Updated Successfully!") ; 
    }
}
