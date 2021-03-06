<?php

namespace Tests\Feature\Api;

use App\Models\Tenant;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TenantTest extends TestCase
{
    /**
     * Test Get ALL Tenants.
     *
     * @return void
     */
    public function testGetAllTenants()
    {
        factory(Tenant::class, 4)->create();

        $response = $this->getJson('/api/v1/tenants');

        // $response->dump();

        $response->assertStatus(200)
                    ->assertJsonCount(4, 'data');
    }

    /**
     * Test Get Error Single Tenant.
     *
     * @return void
     */
    public function testGetErrorTenant()
    {
        $tenant = 'fake_value';

        $response = $this->getJson("/api/v1/tenants/{$tenant}");

        $response->assertStatus(404);
    }

    /**
     * Test Get Tenant By Identify.
     *
     * @return void
     */
    public function testGetTenantByIdentify()
    {
        $tenant = factory(Tenant::class)->create();

        $response = $this->getJson("/api/v1/tenants/{$tenant->uuid}");

        $response->assertStatus(200);
    }
}
