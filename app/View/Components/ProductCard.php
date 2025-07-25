<?php

namespace App\View\Components;

use App\Models\Product;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProductCard extends Component
{
    public Product $product;
    public int $loopIteration;

    /**
     * Create a new component instance.
     */
    public function __construct(Product $product, int $loopIteration = 1)
    {
        $this->product = $product;
        $this->loopIteration = $loopIteration;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.product-card');
    }
}
