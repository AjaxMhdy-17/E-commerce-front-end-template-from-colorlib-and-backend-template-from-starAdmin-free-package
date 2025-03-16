<?php

namespace App\Http\Controllers\Backend\Product;

use App\Http\Controllers\Controller;
use App\Models\BrandName;
use App\Models\Category;
use App\Models\SubCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ProductSubCategoryController extends Controller
{
    public function index(Request $request)  
    {
        $data['title'] = "Sub Category List";

        if ($request->ajax()) {
            $brands = BrandName::query();

            return DataTables::eloquent($brands)
                ->addIndexColumn()
                ->addColumn('brand_img', function ($brand) {
                    return $brand->brand_img
                        ? '<img src="' . asset($brand->brand_img) . '" alt="Brand Image" width="50" height="50" class="img-thumbnail">'
                        : 'No Image';
                })
                ->addColumn('created_at', function ($brand) {
                    return Carbon::parse($brand->created_at)->format('Y-m-d');
                })
                ->addColumn('action', function ($brand) {
                    return '
                        <div class="dropdown text-end">
                           
                            <button type="button" class="btn btn-info action-dropdown-btn">
                                <i class="ti-time"></i>
                            </button>

                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="' . route('admin.product.sub-category.edit', $brand->id) . '">Edit</a>
                                </li>
                                <li>
                                    <form class="delete-form" method="POST" action="' . route('admin.product.sub-category.destroy', $brand->id) . '">
                                        ' . csrf_field() . method_field("DELETE") . '
                                        <button type="submit" class="dropdown-item text-danger show-alert-delete-box">Delete</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    ';
                })
                ->rawColumns(['brand_img', 'action'])
                ->make(true);
        }



        return view('admin.pages.product.sub_category.list', $data);
    }

    public function create()
    {
        $data['title'] = "Sub Category Create";
        $data['categories'] = Category::all();
        return view('admin.pages.product.sub_category.create', $data);
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'category_id' => 'required',
            'subcategory_name' => 'required',
        ]);

        $done = SubCategory::create($data);

        return back()->with('success', 'Subcategory Added Successfully!');
    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {
        //
    }
}
