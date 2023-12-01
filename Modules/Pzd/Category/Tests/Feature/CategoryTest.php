<?php

namespace Pzd\Category\Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    /*
     *   Test admin user can see category index page
     */
    use RefreshDatabase;

    public function test_admin_user_can_see_category_index_page(): void
    {
        $response = $this->get(route('categories.index'));

        $response->assertViewIs('Category::index');
        $response->assertViewHas('categories');
    }
}
