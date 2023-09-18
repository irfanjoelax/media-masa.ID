<?php

namespace App\View\Components;

use App\Models\Category;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CategorySlider extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $data['categories'] = Category::with([
            'blogs' => function ($query) {
                $query->latest()->limit(4);
            }
        ])->orderBy('name')->get();

        return view('components.category-slider', $data);
    }
}