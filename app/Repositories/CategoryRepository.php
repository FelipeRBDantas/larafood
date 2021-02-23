<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use App\Repositories\Contracts\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface
{
    protected $table;

    public function __construct()
    {
        $this->table = 'categories';
    }

    public function getCategoriesByTenantUUID(string $uuid)
    {
        return DB::table($this->table)
            ->join('tenants', 'tenants.id', 'categories.tenant_id')
            ->where('tenants.uuid', $uuid)
            ->select('categories.*')
            ->get();
    }

    public function getCategoriesByTenantId(int $idTenant)
    {
        return DB::table($this->table)->where('tenant_id' ,$idTenant)->get();
    }

    public function getCategoryByUUID(string $uuid)
    {
        return DB::table($this->table)->where('uuid', $uuid)->first();
    }
}