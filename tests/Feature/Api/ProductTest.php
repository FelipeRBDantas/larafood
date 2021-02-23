<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use App\Models\Tenant;
use App\Models\Product;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductTest extends TestCase
{
    /**
     * Error Get All Products.
     *
     * @return void
     */
    public function testGetErrorAllProducts()
    {
        $tenant = 'fake_value';

        $response = $this->getJson("/api/v1/products?uuid={$tenant}");

        $response->assertStatus(422);
    }

    /**
     *  Get All Products.
     *
     * @return void
     */
    public function testGetAllProducts()
    {
        $tenant = factory(Tenant::class)->create();

        $response = $this->getJson("/api/v1/products?uuid={$tenant->uuid}");

        $response->assertStatus(200);
    }

    /**
     *  Not Found Product By Identify.
     *
     * @return void
     */
    public function testNotFoundProductByIdentify()
    {
        $product = 'fake_value';
        $tenant = factory(Tenant::class)->create();

        $response = $this->getJson("/api/v1/products/{$product}?uuid={$tenant->uuid}");

        $response->assertStatus(404);
    }

    /**
     *  Get Product By Identify.
     *
     * @return void
     */
    public function testProductByIdentify()
    {
        $product = factory(Product::class)->create();
        $tenant = factory(Tenant::class)->create();

        $response = $this->getJson("/api/v1/products/{$product->uuid}?uuid={$tenant->uuid}");

        $response->assertStatus(200);
    }
}
