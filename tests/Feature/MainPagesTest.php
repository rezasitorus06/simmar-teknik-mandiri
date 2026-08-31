<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MainPagesTest extends TestCase
{
    use RefreshDatabase;

    public function test_home_page_loads(): void
    {
        $response = $this->get('/');

        $response->assertOk();
    }

    public function test_about_page_loads(): void
    {
        $response = $this->get('/tentang-kami');

        $response->assertOk();
    }

    public function test_product_listing_page_loads(): void
    {
        $response = $this->get('/produk');

        $response->assertOk();
    }

    public function test_login_page_loads(): void
    {
        $response = $this->get('/login');

        $response->assertOk();
    }
}
