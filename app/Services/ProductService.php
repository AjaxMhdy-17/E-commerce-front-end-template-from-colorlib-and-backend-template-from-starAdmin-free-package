<?php

namespace App\Services;

use App\Models\Product;
use Yajra\DataTables\Facades\DataTables;


class ProductService
{


    public function getProductsDataTable()
    {
        $products = Product::with(['category', 'brand'])
            ->select([
                'products.id',  // Always include the primary key
                'products.name',
                'products.image_one',
                'products.category_id',  // Required for the category relationship
                'products.brand_id',    // Required for the brand relationship
                'products.selling_price',
                'products.quantity',
                'products.status',
                'products.created_at'
            ])
            ->orderBy('created_at', 'desc');

        return DataTables::eloquent($products)
            ->addIndexColumn()
            ->addColumn('name', fn($product) => $product->name)
            ->addColumn('image_one', fn($product) => $this->getProductImage($product->image_one))
            ->addColumn('category', fn($product) => $product->category->name ?? 'N/A')
            ->addColumn('brand', fn($product) => $product->brand->brand_name ?? 'N/A')
            ->addColumn('selling_price', fn($product) => number_format($product->selling_price, 2))
            ->addColumn('quantity', fn($product) => $product->quantity)
            ->addColumn('status', fn($product) => $this->getStatusBadge($product->status))
            ->addColumn('created_at', fn($product) => $product->created_at->format('Y-m-d'))
            ->addColumn('action', fn($product) => $this->getActionButtons($product))
            ->rawColumns(['image_one', 'status', 'action'])
            ->make(true);
    }


    public function createProduct(array $data)
    {
        return Product::create($data);
    }

    public function updateProduct($id, array $data)
    {
        $product = Product::findOrFail($id);
        $product->update($data);
        return $product;
    }


    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);
        foreach (['image_one', 'image_two', 'image_three'] as $imageField) {
            if ($product->$imageField) {
                unlink($product->$imageField);
            }
        }

        $product->delete();
    }

    public function toggleStatus($product_id)
    {
        $product = Product::findOrFail($product_id);
        $product->status = !$product->status;
        $product->save();
    }

    protected function getProductImage(?string $imagePath): string
    {
        return $imagePath
            ? '<img src="' . asset($imagePath) . '" alt="Product Image" style="width:80px;height:60px;border-radius:5px;">'
            : 'No Image';
    }

    protected function getStatusBadge(int $status): string
    {
        return $status == 1
            ? '<span class="badge bg-success">Active</span>'
            : '<span class="badge bg-warning">Inactive</span>';
    }

    protected function getActionButtons(Product $product): string
    {
        $statusButton = $product->status == 1
            ? '<button type="submit" class="dropdown-item">Set Inactive</button>'
            : '<button type="submit" class="dropdown-item">Set Active</button>';

        return '
        <div class="dropdown text-end">
            <button type="button" class="btn btn-info action-dropdown-btn dropdown-toggle" data-bs-toggle="dropdown">
                <i class="ti-time"></i>
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="' . route('admin.product.list.show', $product->id) . '">Details</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <form class="status-form" method="POST" action="' . route('admin.product.product.status', $product->id) . '">
                        ' . csrf_field() . $statusButton . '
                    </form>
                </li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="' . route('admin.product.list.edit', $product->id) . '">Edit</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <form class="delete-form" method="POST" action="' . route('admin.product.list.destroy', $product->id) . '">
                        ' . csrf_field() . method_field("DELETE") . '
                        <button type="submit" class="dropdown-item text-danger show-alert-delete-box">Delete</button>
                    </form>
                </li>
            </ul>
        </div>';
    }
}
