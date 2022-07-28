<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Product;

class ProductComponent extends Component
{
    public $product;
    
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render($data=[])
    {
        return view('components.product-component', $data);
    }
}
