<?php

namespace App\Services;

use App\Repositories\Contracts\TableRepositoryInterface;
use App\Repositories\Contracts\TenantRepositoryInterface;

class TableService
{
    protected $tableRepository, $tenantRepository;

    public function __construct(
        TableRepositoryInterface $tableRepository,
        TenantRepositoryInterface $tenantRepository
    )
    {
        $this->tableRepository = $tableRepository;
        $this->tenantRepository   = $tenantRepository;
    }

    public function getTablesByTenantUUID(string $uuid)
    {
        $tenant = $this->tenantRepository->getTenantByUUID($uuid);
        return $this->tableRepository->getTablesByTenantId($tenant->id);
    }

    public function getTableByUUID(string $uuid)
    {
        return $this->tableRepository->getTableByUUID($uuid);
    }
}