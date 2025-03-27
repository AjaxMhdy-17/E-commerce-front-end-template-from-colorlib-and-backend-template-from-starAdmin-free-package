<?php

namespace App\Http\Controllers\Backend\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Services\ErrorHandlerService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ProductCategoryController extends Controller
{

    public function index(Request $request)
    {
        $data['title'] = "Category List";
        
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
                            <button type="button" class="btn btn-info action-dropdown-btn dropdown-toggle">
                                <i class="ti-time"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="' . route('admin.product.category.edit', ['category' => $category->id]) . '">Edit</a>
                                <div class="dropdown-divider"></div>
                                <form class="delete-form" method="POST" action="' . route('admin.product.category.destroy', ['category' => $category->id]) . '">
                                    ' . csrf_field() . '
                                    ' . method_field("DELETE") . '
                                    <button type="submit" class="dropdown-item text-danger show-alert-delete-box">Delete</button>
                                </form>
                            </div>
                        </div>
                    ';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.pages.product.category.list', $data);
    }


    public function create()
    {
        $data['title'] = "Category Create";
        return view('admin.pages.product.category.create', $data);
    }


    public function store(Request $request)
    {
        // $data = $this->validateCategory($request);
        // try {
        //     $done = Category::create($data);
        //     throw_if(!$done, "Product Category Can't be Created!");
        //     return back()->with('success', "Product Category Created Successfully!");
        // } catch (\Exception $exp) {
        //     return back()->with('error', $exp->getMessage());
        // }
        return ErrorHandlerService::handle(function () use ($request) {
            $data = $this->validateCategory($request);
            $done = Category::create($data);
            throw_if_fail(!$done, "Product Category Can't be Created!");
            return redirect()->route('admin.product.category.index')->with('success', "Product Category Created Successfully!");
        });
    }

    
    public function edit(string $id)
    {
        $data['title'] = "Category Edit";
        $data['category'] = Category::findOrFail($id);
        return view('admin.pages.product.category.edit', $data);
    }


    public function update(Request $request, string $id)
    {
        return ErrorHandlerService::handle(function () use ($request, $id) {
            $category = Category::findOrFail($id);
            $data = $this->validateCategory($request);
            $done = $category->update($data);
            throw_if_fail(!$done, "Product Category Can't be Updated!");
            return redirect()->route('admin.product.category.index')->with('success', "Product Category Updated Successfully!");
        });
    }


    public function destroy(string $id)
    {
        return ErrorHandlerService::handle(function () use ($id) {
            $category = Category::findOrFail($id);
            $done = $category->delete();
            throw_if_fail(!$done, "Product Category Can't be Deleted!");
            return back()->with('success', "Product Category Deleted Successfully!");
        });
    }

    public function validateCategory($request)
    {
        return $request->validate([
            'name' => 'required'
        ]);
    }
}
