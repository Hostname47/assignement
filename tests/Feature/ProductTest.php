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
}
