<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\TenantFormRequest;
use App\Http\Resources\CategoryResource;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function categoriesByTenant(TenantFormRequest $request)
    {
        // if(!$request->uuid){
        //     return response()->json(['message' => 'Token Not Found'], 404);
        // }
        $categories = $this->categoryService->getCategoriesByTenantUUID($request->uuid);
        return CategoryResource::collection($categories);
    }

    public function show(TenantFormRequest $request, $identify)
    {
        if(!$category = $this->categoryService->getCategoryByUUID($identify)){
            return response()->json(['message' => 'Category Not Found'], 404);
        }
        return new CategoryResource($category);
    }
}
