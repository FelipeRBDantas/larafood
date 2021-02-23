<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use App\Models\Table;
use App\Models\Tenant;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TableTest extends TestCase
{
    /**
     * Error Get Tables By Tenant.
     *
     * @return void
     */
    public function testGetErrorTablesByTenant()
    {
        $response = $this->getJson('/api/v1/tables');

        $response->assertStatus(422);
    }

    /**
     * Get All Tables By Tenant.
     *
     * @return void
     */
    public function testGetAllTablesByTenant()
    {
        $tenant = factory(Tenant::class)->create();

        $response = $this->getJson("/api/v1/tables?uuid={$tenant->uuid}");

        $response->assertStatus(200);
    }

    /**
     * Error Get Table By Tenant.
     *
     * @return void
     */
    public function testGetErrorTableByTenant()
    {
        $table = 'fake_value';
        $tenant = factory(Tenant::class)->create();

        $response = $this->getJson("/api/v1/tables/{$table}?uuid={$tenant->uuid}");

        $response->assertStatus(404);
    }

    /**
     * Get Table By Tenant.
     *
     * @return void
     */
    public function testGetTableByTenant()
    {
        $table = factory(Table::class)->create();
        $tenant = factory(Tenant::class)->create();

        $response = $this->getJson("/api/v1/tables/{$table->uuid}?uuid={$tenant->uuid}");

        $response->assertStatus(200);
    }
}
