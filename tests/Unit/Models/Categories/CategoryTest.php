<?php

namespace Tests\Unit\Models\Categories;

use Tests\TestCase;
use App\Models\Category;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_it_many_children()
    {
       $category = factory(Category::class)->create();

       $category->children()->save(
       	   factory(Category::class)->create()
       );

       $this->assertInstanceOf(Category::class, $category->children->first());
    }

    public function test_it_can_fetch_only_parents()
    {
       $category = factory(Category::class)->create();

       $category->children()->save(
       	   factory(Category::class)->create()
       );

       $this->assertEquals(1, Category::parents()->count());
    }
}
