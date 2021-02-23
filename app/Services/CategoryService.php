<?php

namespace App\Services;

use App\Repositories\Contracts\CategoryRepositoryInterface;
use App\Repositories\Contracts\TenantRepositoryInterface;

class CategoryService
{
    protected $categoryRepository, $tenantRepository;

    public function __construct(
        CategoryRepositoryInterface $categoryRepository,
        TenantRepositoryInterface $tenantRepository
    )
    {
        $this->categoryRepository = $categoryRepository;
        $this->tenantRepository   = $tenantRepository;
    }

    public function getCategoriesByTenantUUID(string $uuid)
    {
        $tenant = $this->tenantRepository->getTenantByUUID($uuid);
        return $this->categoryRepository->getCategoriesByTenantId($tenant->id);
    }

    public function getCategoryByUUID(string $uuid)
    {
        return $this->categoryRepository->getCategoryByUUID($uuid);
    }
}