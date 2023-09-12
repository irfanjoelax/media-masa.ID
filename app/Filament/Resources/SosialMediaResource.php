<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SosialMediaResource\Pages;
use App\Filament\Resources\SosialMediaResource\RelationManagers;
use App\Models\SosialMedia;
use Filament\Forms;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SosialMediaResource extends Resource
{
    protected static ?string $model = SosialMedia::class;

    protected static ?string $navigationIcon = 'heroicon-o-adjustments';

    protected static ?string $navigationGroup = 'Settings';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('value')
                    ->required(),

                Hidden::make('key')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('key')
                    ->wrap(),

                TextColumn::make('value')
                    ->wrap(),
            ])
            ->defaultSort('key')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                // Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSosialMedia::route('/'),
            'create' => Pages\CreateSosialMedia::route('/create'),
            'edit' => Pages\EditSosialMedia::route('/{record}/edit'),
        ];
    }
}
