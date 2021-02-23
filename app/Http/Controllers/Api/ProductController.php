<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\ProductService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\TenantFormRequest;
use App\Http\Resources\ProductResource;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function productsByTenant(TenantFormRequest $request)
    {
        $products = $this->productService->getProductsByTenantUUID(
            $request->uuid,
            $request->get('categories', [])
        );
        return ProductResource::collection($products);
    }

    public function show(TenantFormRequest $request, $identify)
    {
        if(!$product = $this->productService->getProductByUUID($identify)){
            return response()->json(['message' => 'Product Not Found'], 404);
        }
        return new ProductResource($product);
    }
}
