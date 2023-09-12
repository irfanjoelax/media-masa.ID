<?php

namespace App\Filament\Resources\BlogResource\Pages;

use App\Filament\Resources\BlogResource;
use App\Models\Blog;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Storage;

class EditBlog extends EditRecord
{
    public $idRecord;

    protected static string $resource = BlogResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    public function mount($record): void
    {
        $this->record = $this->resolveRecord($record);

        $this->authorizeAccess();

        $this->fillForm();

        $this->previousUrl = url()->previous();

        $this->idRecord = $record;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $image = Blog::findOrFail($this->idRecord)->image;
        Storage::delete('blogs/' . $image);

        return $data;
    }

    protected function getHeading(): string
    {
        $title = Blog::findOrFail($this->idRecord)->title;
        return $title;
    }
}
