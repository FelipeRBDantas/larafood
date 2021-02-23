<?php

namespace App\Repositories\Contracts;

interface CategoryRepositoryInterface
{
    public function getCategoriesByTenantUUID(string $uuid);
    public function getCategoriesByTenantId(int $idTenant);
    public function getCategoryByUUID(string $uuid);
}