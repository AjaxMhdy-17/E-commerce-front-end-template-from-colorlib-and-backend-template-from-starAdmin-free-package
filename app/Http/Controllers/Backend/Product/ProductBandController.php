<?php

namespace App\Http\Controllers\Backend\Product;

use App\Http\Controllers\Controller;
use App\Models\BrandName;
use App\Services\ErrorHandlerService;
use App\Traits\HandlesImageUploads;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Yajra\DataTables\Facades\DataTables;

class ProductBandController extends Controller
{
    use HandlesImageUploads;
    public function index(Request $request)
    {
        $data['title'] = "Brand List";
        if ($request->ajax()) {
            $brands = BrandName::orderBy('created_at', 'desc');
            return $this->getBrandDataTable($brands);
        }
        return view('admin.pages.product.brand.list', $data);
    }



    public function create()
    {
        $data['title'] = "Brand Create";
        return view('admin.pages.product.brand.create', $data);
    }


    public function store(Request $request)
    {

        return ErrorHandlerService::handle(function () use ($request) {
            $data = $this->validateBrandSubmition($request);
            unset($data['existing_brand_img']);
            if (isset($data['brand_img']) && $data['brand_img']) {
                $data['brand_img'] = $this->uploadImage($data['brand_img'], 'public/media/brand/');
            }
            DB::table('brand_names')->insert($data);
            return redirect()->route('admin.product.brand.index')->with('success', 'Product Brand Added Successfully!');
        });
    }


    public function edit(string $id)
    {
        $data['title'] = "Brand Edit";
        $data['brand'] = BrandName::findOrFail($id);
        return view('admin.pages.product.brand.edit', $data);
    }


    public function update(Request $request, string $id)
    {
        return ErrorHandlerService::handle(function () use ($request, $id) {
            $data = $this->validateBrandSubmition($request, $id);
            $brand = BrandName::findOrFail($id);
            $old_img = $brand->brand_img;
            if (isset($data['brand_img']) && $data['brand_img']) {
                if ($old_img != null) {
                    unlink($old_img);
                }
                unset($data['existing_brand_img']);
                $image_url = $this->uploadImage($data['brand_img'], 'public/media/brand/');
                DB::table('brand_names')->where('id', $id)->update([
                    'brand_name' => $data['brand_name'],
                    'brand_img' => $image_url
                ]);
                return redirect()->route('admin.product.brand.index')->with('success', 'Product Brand Updated Successfully!');
            }
            DB::table('brand_names')->where('id', $id)->update([
                'brand_name' => $data['brand_name']
            ]);
            return redirect()->route('admin.product.brand.index')->with('success', 'Product Brand Updated Successfully!');
        });
    }


    public function destroy(string $id)
    {
        return ErrorHandlerService::handle(function () use ($id) {
            $data = DB::table('brand_names')->where('id', $id)->first();
            $image = $data->brand_img;
            $this->deleteImage($image);
            $brand = DB::table('brand_names')->where('id', $id)->delete();
            return back()->with('success', 'Product Brand Deleted Successfully!');
        });
    }

    public function validateBrandSubmition($request, $brandId = null)
    {
        return $request->validate([
            'brand_img' => 'sometimes|mimes:jpg,jpeg,png|max:2048',
            'brand_name' => [
                'required',
                Rule::unique('brand_names')->ignore($brandId),
            ],
            'existing_brand_img' => 'sometimes',
        ]);
    }


    public function getBrandDataTable($brands)
    {
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
                   
                    <button type="button" class="btn btn-info action-dropdown-btn dropdown-toggle">
                        <i class="ti-time"></i>
                    </button>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="' . route('admin.product.brand.edit', $brand->id) . '">Edit</a>
                        </li>
                        <li>
                            <form class="delete-form" method="POST" action="' . route('admin.product.brand.destroy', $brand->id) . '">
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
}
