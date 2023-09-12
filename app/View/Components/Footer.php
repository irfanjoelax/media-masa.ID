<?php

namespace App\View\Components;

use App\Models\Category;
use App\Models\Tag;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Footer extends Component
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
        $data['categories'] = Category::orderBy('name')->get();
        $data['tags'] = Tag::orderBy('name')->get();
        return view('components.footer', $data);
    }
}
