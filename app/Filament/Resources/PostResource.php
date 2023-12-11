<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Models\Post;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->live(debounce: 500)
                    ->required()
                    ->string()
                    ->afterStateUpdated(function (string $operation, $state, Set $set) {
                        if ($operation === 'edit') {
                            return;
                        }
                        $set('slug', Str::slug($state));
                    }),
                TextInput::make('slug')
                    ->required()
                    ->minLength(1)
                    ->unique(ignoreRecord: true)
                    ->maxLength(150)
                    ->string()
                    ->readOnly(),
                Select::make('tags')
                    ->multiple()
                    ->relationship('tags', 'name')
                    ->columnSpan(2),
                FileUpload::make('post_image_path')
                    ->required()
                    ->label('Post Image')
                    ->image()
                    ->directory('images')
                    ->columnSpan(2),
                RichEditor::make('body')
                    ->required()
                    ->columnSpan(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\ImageColumn::make('post_image_path')
                    ->label('Post Image')
                    ->circular(),
                Tables\Columns\TextColumn::make('created_at')->since()
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')->since()
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Author')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
