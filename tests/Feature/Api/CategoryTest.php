<?php

namespace Tests\Feature\Api;

use App\Models\Category;
use App\Models\Tenant;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    /**
     * Error Get Categories By Tenant.
     *
     * @return void
     */
    public function testGetErrorCategoriesByTenant()
    {
        $response = $this->getJson('/api/v1/categories');

        $response->assertStatus(422);
    }

    /**
     * Get All Categories By Tenant.
     *
     * @return void
     */
    public function testGetAllCategoriesByTenant()
    {
        $tenant = factory(Tenant::class)->create();

        $response = $this->getJson("/api/v1/categories?uuid={$tenant->uuid}");

        $response->assertStatus(200);
    }

    /**
     * Error Get Category By Tenant.
     *
     * @return void
     */
    public function testGetErrorCategoryByTenant()
    {
        $category = 'fake_value';
        $tenant = factory(Tenant::class)->create();

        $response = $this->getJson("/api/v1/categories/{$category}?uuid={$tenant->uuid}");

        $response->assertStatus(404);
    }

    /**
     * Get Category By Tenant.
     *
     * @return void
     */
    public function testGetCategoryByTenant()
    {
        $category = factory(Category::class)->create();
        $tenant = factory(Tenant::class)->create();

        $response = $this->getJson("/api/v1/categories/{$category->uuid}?uuid={$tenant->uuid}");

        $response->assertStatus(200);
    }
}
