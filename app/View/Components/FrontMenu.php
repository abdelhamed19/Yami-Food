<?php

namespace App\View\Components;

use App\Models\Item;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FrontMenu extends Component
{
    public $items;
    public $categories;
    /**
     * Create a new component instance.
     */
    public function __construct($items, $categories = null)
    {
        $this->items = $items;
        $this->categories = $categories;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {

        return view('components.front-menu');
    }
}
