<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BlogResource\Pages;
use App\Filament\Resources\BlogResource\RelationManagers;
use App\Models\Blog;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class BlogResource extends Resource
{
    protected static ?string $model = Blog::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    protected static ?string $recordTitleAttribute = 'title';

    protected static ?string $navigationGroup = 'Main';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(12)->schema([
                    Section::make('Detail Blog')
                        ->columnSpan(8)
                        ->schema([
                            TextInput::make('title')
                                ->placeholder('Enter blog title')
                                ->maxLength(200)
                                ->reactive()
                                ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state)))
                                ->required(),

                            Hidden::make('slug')
                                ->required(),

                            Grid::make(12)->schema([
                                Select::make('category_id')
                                    ->columnSpan(8)
                                    ->relationship('category', 'name')
                                    ->required(),

                                TextInput::make('hit')
                                    ->placeholder('0')
                                    ->columnSpan(4)
                                    ->numeric()
                                    ->required(),
                            ]),

                            Select::make('tags')
                                ->multiple()
                                ->preload()
                                ->relationship('tags', 'name'),

                            RichEditor::make('content')
                                ->fileAttachmentsDirectory('contents')
                                ->disableToolbarButtons([
                                    'blockquote',
                                    'strike',
                                    'codeBlock',
                                ]),

                        ]),

                    Section::make('Media Published')
                        ->columnSpan(4)
                        ->schema([
                            FileUpload::make('image')
                                ->image()
                                ->enableDownload()
                                ->directory('blogs')
                                ->required(),

                            DatePicker::make('date_published')
                                ->default(now())
                                ->displayFormat('d M Y')
                                ->required(),

                            Toggle::make('is_published')
                                ->default(true)
                        ]),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image'),

                TextColumn::make('title')
                    ->wrap(),

                BadgeColumn::make('category.name')
                    ->color('primary')
                    ->wrap(),

                TextColumn::make('date_published')
                    ->date('d M Y')
                    ->wrap(),

                IconColumn::make('is_published')
                    ->boolean(),

                BadgeColumn::make('hit')
                    ->wrap(),
            ])
            ->defaultSort('created_at', 'DESC')
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
            RelationManagers\TagsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBlogs::route('/'),
            'create' => Pages\CreateBlog::route('/create'),
            'edit' => Pages\EditBlog::route('/{record}/edit'),
        ];
    }
}
