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
}
