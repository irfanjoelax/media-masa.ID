<?php

namespace App\Filament\Widgets;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Tag;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class StatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        return [
            Card::make('Categories', Category::count())
                ->description('Total Category')
                ->color('success'),

            Card::make('Tags', Tag::count())
                ->description('Total Tag')
                ->color('warning'),

            Card::make('Blogs', Blog::count())
                ->description('List Blog')
                ->color('danger'),
        ];
    }
}
