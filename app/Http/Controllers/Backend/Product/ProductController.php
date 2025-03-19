<?php

namespace App\Http\Controllers\Backend\Product;

use App\Http\Controllers\Controller;
use App\Models\BrandName;
use App\Models\Category;
use App\Models\SubCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $data['title'] = "Product List";

        if ($request->ajax()) {
            $categories = Category::orderBy('created_at', 'desc');
            return DataTables::eloquent($categories)
                ->addIndexColumn()
                ->addColumn('created_at', function ($category) {
                    return Carbon::parse($category->created_at)->format('Y-m-d');
                })
                ->addColumn('action', function ($category) {
                    return '
                        <div class="dropdown text-right">
                            <button type="button" class="btn btn-info action-dropdown-btn">
                                <i class="ti-time"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="' . route('admin.product.category.edit', ['category' => $category->id]) . '">Edit</a>
                                <div class="dropdown-divider"></div>
                                <form class="delete-form" method="POST" action="' . route('admin.product.category.destroy', ['category' => $category->id]) . '">
                                    ' . csrf_field() . '
                                    ' . method_field("DELETE") . '
                                    <button type="submit" class="dropdown-item show-alert-delete-box">Delete</button>
                                </form>
                            </div>
                        </div>
                    ';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.pages.product.index.list', $data);
    }


    public function create()
    {
        $data['title'] = "Product Create"; 
        $data['categories'] = Category::all() ; 
        $data['sub_categories'] = SubCategory::all();
        $data['brands'] = BrandName::all() ; 
        return view('admin.pages.product.index.create', $data);
    }

    public function store(Request $request)
    {
        dd($request->all());
    }

   
    public function show(string $id)
    {
        //
    }

  
    public function edit(string $id)
    {
        
        $data['title'] = "Product Edit";
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
}
