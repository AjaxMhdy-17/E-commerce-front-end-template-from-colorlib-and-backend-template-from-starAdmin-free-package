<?php

namespace App\Http\Controllers\Backend\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Services\ErrorHandlerService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ProductSubCategoryController extends Controller
{

    public function index(Request $request)
    {
        $data['title'] = "Sub Category List";
        if ($request->ajax()) {
            $subCategories = SubCategory::with(['category' => function ($query) {
                $query->select('id', 'name');
            }])
                ->select('sub_categories.*')
                ->orderBy('created_at', 'desc');

            return DataTables::eloquent($subCategories)
                ->addIndexColumn()
                ->addColumn('subCategory_name', function ($subCategories) {
                    return $subCategories->subcategory_name;
                })
                ->addColumn('category_name', function ($subCategories) {
                    return $subCategories->category ? $subCategories->category->name : 'N/A';
                })
                ->addColumn('created_at', function ($subCategory) {
                    return Carbon::parse($subCategory->created_at)->format('Y-m-d');
                })
                ->addColumn('action', function ($subCategory) {
                    return '
                    <div class="dropdown text-end">
                        <button type="button" class="btn btn-info action-dropdown-btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="ti-time"></i>
                        </button>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="' . route('admin.product.sub-category.edit', $subCategory->id) . '">Edit</a>
                            </li>
                            <li>
                                <form class="delete-form" method="POST" action="' . route('admin.product.sub-category.destroy', $subCategory->id) . '">
                                    ' . csrf_field() . method_field("DELETE") . '
                                    <button type="submit" class="dropdown-item text-danger show-alert-delete-box">Delete</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                ';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.pages.product.sub_category.list', $data);
    }


    public function create()
    {
        $data['title'] = "Sub Category Create";
        $data['categories'] = Category::orderBy('created_at', 'desc')->get();
        return view('admin.pages.product.sub_category.create', $data);
    }


    public function store(Request $request)
    {
        return ErrorHandlerService::handle(function () use ($request) {
            $data = $this->validateSubCategory($request);
            $done = SubCategory::create($data);
            throw_if_fail(!$done, "Product Sub Category Can't be Created!");
            return redirect()->route('admin.product.sub-category.index')->with('success', 'Product Sub Category Added Successfully!');
        });
    }


    public function edit(string $id)
    {
        $data['title'] = "Sub Category Edit";
        $data['categories'] = Category::all();
        $data['subCategory'] = SubCategory::with('category')->findOrfail($id);
        return view('admin.pages.product.sub_category.edit', $data);
    }


    public function update(Request $request, string $id)
    {
        return ErrorHandlerService::handle(function () use ($request, $id) {
            $data = $this->validateSubCategory($request);
            $subCategory = SubCategory::findOrFail($id);
            $done = $subCategory->update($data);
            throw_if_fail(!$done, "Product Sub Category Can't be Edited!");
            return redirect()->route('admin.product.sub-category.index')->with('success', 'Subcategory Updated Successfully!');
        });
    }


    public function destroy(string $id)
    {
        return ErrorHandlerService::handle(function () use ($id) {
            $subCategory = SubCategory::findOrFail($id);
            $done = $subCategory->delete();
            throw_if_fail(!$done, "Product Sub Category Can't be Deleted!");
            return back()->with('success', "Product Sub Category Deleted Successfully!");
        });
    }


    public function validateSubCategory($request)
    {
        return $request->validate([
            'category_id' => 'required',
            'subcategory_name' => 'required|unique:sub_categories',
        ]);
    }
}
