<?php

namespace Tests\Feature\Categories;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryIndexTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function tes_it_returns_a_collection_of_categories()
    {
        $category = factory(Category::class)->create();

        $this->json('GET', 'api/categories')
               ->assertJsonFragment([
               	    'slug' => $category->slug
               ]);
    }
}
