<?php

namespace App\Http\Controllers\Backend\Product;

use App\Http\Controllers\Controller;
use App\Models\Admin;
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
            $admins = Admin::query();
            return DataTables::eloquent($admins)
                ->addIndexColumn()
                ->addColumn('created_at', function ($admin) {
                    return Carbon::parse($admin->created_at)->format('Y-m-d');
                })
                ->addColumn('action', function ($admin) {
                    return '
                         <div class="dropdown text-right">
                            <button type="button" class="btn btn-info action-dropdown-btn">
                                <i class="ti-time"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#">Edit</a>
                                 <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Delete</a>
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
            return back()->with('success', "Product Category Created Successfully!");
        });
    }

    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        $data['title'] = "Category Edit";

        return view('admin.pages.product.category.edit', $data);
    }


    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {
        //
    }

    public function validateCategory($request)
    {
        return $request->validate([
            'name' => 'required'
        ]);
    }
}
