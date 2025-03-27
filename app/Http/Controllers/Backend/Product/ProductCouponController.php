<?php

namespace App\Http\Controllers\Backend\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Coupon;
use App\Services\ErrorHandlerService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ProductCouponController extends Controller
{
    public function index(Request $request)
    {
        $data['title'] = "Coupon List";

        if ($request->ajax()) {
            $coupons = Coupon::orderBy('created_at', 'desc');
            return DataTables::eloquent($coupons)
                ->addColumn('name', function ($coupon) {
                    return $coupon->name;
                })
                ->addColumn('discount', function ($coupon) {
                    return "$coupon->discount";
                })
                ->addColumn('created_at', function ($coupon) {
                    return Carbon::parse($coupon->created_at)->format('Y-m-d');
                })
                ->addColumn('action', function ($coupon) {
                    return '
                        <div class="dropdown text-right">
                            <button type="button" class="btn btn-info action-dropdown-btn dropdown-toggle">
                                <i class="ti-time"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="' . route('admin.product.coupon.edit', ['coupon' => $coupon->id]) . '">Edit</a>
                                <div class="dropdown-divider"></div>
                                <form class="delete-form" method="POST" action="' . route('admin.product.coupon.destroy', ['coupon' => $coupon->id]) . '">
                                    ' . csrf_field() . '
                                    ' . method_field("DELETE") . '
                                    <button type="submit" class="dropdown-item text-danger show-alert-delete-box">Delete</button>
                                </form>
                            </div>
                        </div>
                    ';
                })
                ->rawColumns(['discount', 'action'])
                ->make(true);
        }
        return view('admin.pages.product.coupon.list', $data);
    }



    public function create()
    {
        $data['title'] = "Coupon Create";
        return view('admin.pages.product.coupon.create', $data);
    }


    public function store(Request $request)
    {
        return ErrorHandlerService::handle(function () use ($request) {
            $data = $this->validateCoupon($request);
            $done = Coupon::create($data);
            throw_if_fail(!$done, "Product Coupon Can't be Added!");
            return redirect()->route('admin.product.coupon.index')->with('success', "Product Coupon Added Successfully!");
        });
    }


    public function edit(string $id)
    {
        $data['title'] = "Coupon Edit";
        $data['coupon'] = Coupon::findOrFail($id);
        return view('admin.pages.product.coupon.edit', $data);
    }

    public function update(Request $request, string $id)
    {
        return ErrorHandlerService::handle(function () use ($request, $id) {
            $data = $this->validateCoupon($request);
            $coupon = Coupon::findOrFail($id);
            $done = $coupon->update($data);
            throw_if_fail(!$done, "Product Coupon Can't be Updated!");
            return redirect()->route('admin.product.coupon.index')->with('success', "Product Coupon Updated Successfully!");
        });
    }

    public function destroy(string $id)
    {
        return ErrorHandlerService::handle(function () use ($id) {
            $coupon = Coupon::findOrFail($id);
            $done = $coupon->delete();
            throw_if_fail(!$done, "Product Coupon Can't be Deleted!");
            return back()->with('success', "Product Coupon Deleted Successfully!");
        });
    }

    public function validateCoupon($request)
    {
        return $request->validate([
            'name' => 'required',
            'discount' => 'required',
        ]);
    }
}
