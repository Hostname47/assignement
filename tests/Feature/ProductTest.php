<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Product;

class ProductTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function add_a_product() {
        $this->assertCount(0, Product::all());
        $this->post('/products', [
            'name'=>'Stoeger STR-9 Semi-Auto Pistol - 9mm',
            'price'=>255.65,
            'description'=>"The Stoeger® STR-9 Semi-Auto Pistol utilizes a striker-fired mechanism and outstanding ergonomics to deliver rapid shots with unfailing reliability. The polymer frame features aggressive texturing, thumb groves, and an under-cut trigger guard to provide a non-slip hold and position the shooter's hand close to the bore axis for enhanced control and quick follow-up shots.",
            'image'=>'str-8.png'
        ]);
        $this->assertCount(1, Product::all());
    }

    /** @test */
    public function edit_a_product() {
        $this->withoutExceptionHandling();

        $product = Product::create([
            'name'=>'Stoeger STR-9 Semi-Auto Pistol - 9mm',
            'price'=>255.65,
            'description'=>"The Stoeger® STR-9 Semi-Auto Pistol description.",
            'image'=>'str-8.png'
        ]);

        $this->assertEquals('Stoeger STR-9 Semi-Auto Pistol - 9mm', $product->name);
        $this->assertEquals(255.65, $product->price);
        $this->assertEquals('The Stoeger® STR-9 Semi-Auto Pistol description.', $product->description);
        $this->assertEquals('str-8.png', $product->image);

        $this->patch('/products', [
            'product_id'=>$product->id,
            'name'=>'Stoeger STR-10 Semi-Auto Pistol - 10mm',
            'price'=>199,
            'description'=>"The Stoeger® STR-10 Semi-Auto Pistol description.",
            'image'=>'str-10.png'
        ]);

        $product->refresh();
        $this->assertEquals('Stoeger STR-10 Semi-Auto Pistol - 10mm', $product->name);
        $this->assertEquals(199, $product->price);
        $this->assertEquals('The Stoeger® STR-10 Semi-Auto Pistol description.', $product->description);
        $this->assertEquals('str-10.png', $product->image);
    }
}
