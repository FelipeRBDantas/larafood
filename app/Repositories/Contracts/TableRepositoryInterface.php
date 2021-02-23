<?php

namespace App\Repositories\Contracts;

interface TableRepositoryInterface
{
    public function getTablesByTenantUUID(string $uuid);
    public function getTablesByTenantId(int $idTenant);
    public function getTableByUUID(string $uuid);
}