<?php

namespace App\Http\Controllers\Backend\Product;

use App\Http\Controllers\Controller;
use App\Models\{BrandName, Category, Product, SubCategory};
use App\Services\{ErrorHandlerService, ProductService};
use App\Traits\HandlesImageUploads;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    use HandlesImageUploads;
    protected $productService;
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }
    public function index(Request $request)
    {
        $data['title'] = "Product List";
        if ($request->ajax()) {
            return $this->productService->getProductsDataTable();
        }
        return view('admin.pages.product.index.list', $data);
    }
    public function create()
    {
        return view('admin.pages.product.index.create', [
            'title' => "Product Create",
            'categories' => Category::all(),
            'sub_categories' => SubCategory::all(),
            'brands' => BrandName::all()
        ]);
    }
    public function store(Request $request)
    {
        return ErrorHandlerService::handle(function () use ($request) {
            $validatedData = $this->validateRequest($request);
            $processedData = $this->processProductData($validatedData);
            $this->productService->createProduct($processedData);
            return redirect()
                ->route('admin.product.list.index')
                ->with('success', "Product Created Successfully!");
        });
    }
    public function show(string $id)
    {
        $product = Product::with(['category', 'subCategory', 'brand'])->findOrFail($id);
        return view('admin.pages.product.index.details', [
            'product' => $product,
            'title' => $product->name . " details"
        ]);
    }
    public function edit(string $id)
    {
        return view('admin.pages.product.index.edit', [
            'title' => "Product Edit",
            'categories' => Category::all(),
            'sub_categories' => SubCategory::all(),
            'brands' => BrandName::all(),
            'product' => Product::findOrFail($id)
        ]);
    }
    public function update(Request $request, string $id)
    {
        $validatedData = $this->validateRequest($request, $id);
        $processedData = $this->processProductData($validatedData);
        $this->productService->updateProduct($id, $processedData);
        return back()->with('success', "Product Updated Successfully!");
    }
    public function destroy(string $id)
    {
        $this->productService->deleteProduct($id);
        return back()->with('success', "Product Deleted Successfully!");
    }
    public function changeStatus(Request $request, $product_id)
    {
        $this->productService->toggleStatus($product_id);
        return back()->with('success', "Product Status Updated Successfully!");
    }
    public function getSubCategory($category_id)
    {
        return response()->json(
            SubCategory::where('category_id', $category_id)->get()
        );
    }
    protected function validateRequest($request, $id = null)
    {
        return $request->validate([
            'name' => ['required', Rule::unique('products')->ignore($id)],
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
    protected function processProductData(array $data): array
    {
        $data = array_merge($data, [
            'main_slider' => $data['main_slider'] ?? 0,
            'mid_slider' => $data['mid_slider'] ?? 0,
            'hot_deal' => $data['hot_deal'] ?? 0,
            'best_rated' => $data['best_rated'] ?? 0,
            'trend' => $data['trend'] ?? 0,
            'hot_new' => $data['hot_new'] ?? 0,
        ]);
        unset($data['existing_image_one'], $data['existing_image_two'], $data['existing_image_three']);
        return $data;
    }
}