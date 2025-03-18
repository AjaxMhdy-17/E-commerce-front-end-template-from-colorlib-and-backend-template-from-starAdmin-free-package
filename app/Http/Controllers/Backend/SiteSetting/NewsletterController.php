<?php

namespace App\Http\Controllers\Backend\SiteSetting;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class NewsletterController extends Controller
{
    public function newsletter(Request $request)
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
        return view('admin.pages.product.category.list', $data);
    }
}
