<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Category;

class CategoryTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function add_a_category() {
        $this->withoutExceptionHandling();
        $this->assertCount(0, Category::all());
        $this->post('/categories', [
            'name'=>'Pistols',
        ]);
        $this->assertCount(1, Category::all());
    }

    /** @test */
    public function edit_a_category() {
        $category = Category::create(['name'=>'Pistols']);

        $this->assertEquals('Pistols', $category->name);
        $this->patch('/categories', [
            'category_id'=>$category->id,
            'name'=>'Snipers'
        ]);
        $this->assertEquals('Snipers', $category->refresh()->name);
    }

    /** @test */
    public function delete_a_category() {
        $category = Category::create(['name'=>'Pistols']);

        $this->assertCount(1, Category::all());
        $this->delete('/categories', [ 'category_id'=>$category->id ]);
        $this->assertCount(0, Category::all());
    }

    /** @test */
    public function a_category_can_have_many_products() {
        $category0 = Category::create(['name'=>'Snipers']);
        $category1 = Category::create(['name'=>'Nuclear Weapons']);

        /**
         * Here we'll create some products that share the same category (category0)
         */
        $this->post('/products', [
            'name' => 'U.S. Army Staff Sergeant Adelbert Waldron',
            'price' => 1444.99,
            'description' => 'U.S. Army Staff Sergeant Adelbert Waldron description',
            'image' => '/snipers/985/snp.png',
            'categories' => [$category0->id]
        ]);

        $this->post('/products', [
            'name' => 'Red Army Captain Vasily Zaytsev',
            'price' => 3899.99,
            'description' => 'Red Army Captain Vasily Zaytsev description',
            'image' => '/snipers/54/snp.png',
            'categories' => [$category0->id, $category1->id]
        ]);

        $this->assertCount(2, $category0->products);
        $this->assertCount(1, $category1->products);
    }
}
