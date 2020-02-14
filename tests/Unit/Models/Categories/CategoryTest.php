<?php

namespace Tests\Unit\Models\Categories;

use App\Models\Category as Category;
//use PHPUnit\Framework\TestCase;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    /***
     * @return void
     */
    public function test_it_has_many_children()
    {
        $category = factory(Category::class)->create();

        $category->children()->save(
            factory(Category::class)->create()
        );

        $this->assertInstanceOf(Category::class, $category->children->first());
    }

    /**
     * @return void
     */
    public function test_it_can_fetch_only_parents()
    {
        $category = factory(Category::class)->create();

        $category->children()->save(
            factory(Category::class)->create()
        );

        $this->assertEquals(1, Category::parents()->count());
    }

    /**
     * @return void
     */
    public function test_it_is_orderable_by_a_numbered_order()
    {
        $category = factory(Category::class)->create([
            'order' => 2
        ]);

        $anothercategory = factory(Category::class)->create([
            'order' => 1
        ]);

        $this->assertEquals($anothercategory->name, Category::ordered()->first()->name);
    }
}
