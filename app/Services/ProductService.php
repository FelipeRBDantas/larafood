<?php

namespace App\Services;

use App\Repositories\Contracts\TenantRepositoryInterface;
use App\Repositories\Contracts\ProductRepositoryInterface;

class ProductService
{
    protected $productRepository, $tenantRepository;

    public function __construct(
        ProductRepositoryInterface $productRepository,
        TenantRepositoryInterface $tenantRepository
    )
    {
        $this->productRepository  = $productRepository;
        $this->tenantRepository   = $tenantRepository;
    }

    public function getProductsByTenantUUID(string $uuid, array $categories)
    {
        $tenant = $this->tenantRepository->getTenantByUUID($uuid);
        return $this->productRepository->getProductByTenantId($tenant->id, $categories);
    }

    public function getProductByUUID(string $uuid)
    {
        return $this->productRepository->getProductByUUID($uuid);
    }
}