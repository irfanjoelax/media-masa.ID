<?php

namespace App\Filament\Resources\SosialMediaResource\Pages;

use App\Filament\Resources\SosialMediaResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSosialMedia extends ListRecords
{
    protected static string $resource = SosialMediaResource::class;

    protected function getActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }

    protected function isTablePaginationEnabled(): bool
    {
        return false;
    }
}
