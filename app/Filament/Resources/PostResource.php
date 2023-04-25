<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Models\Post;
use Filament\Forms;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Spatie\FilamentMarkdownEditor\MarkdownEditor;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationGroup = 'Blog';

    public static function form(Form $form): Form
    {
        return $form
            ->columns(1)
            ->schema([
                SpatieMediaLibraryFileUpload::make('image')->collection('blog'),

                Forms\Components\TextInput::make('title')->required(),

                Forms\Components\Textarea::make('summary')->required(),
                MarkdownEditor::make('text')
                    ->fileAttachmentsDisk('blog')
                    ->fileAttachmentsVisibility('public')
                    ->required(),
                Forms\Components\TextInput::make('preview_secret')->disabled(),
                Forms\Components\DateTimePicker::make('publish_date')
                    ->timezone('Europe/Brussels')
                    ->withoutSeconds()
                    ->nullable(),
                Forms\Components\Checkbox::make('published')->nullable(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\SpatieMediaLibraryImageColumn::make('image')->collection('blog'),
                Tables\Columns\TextColumn::make('title')->sortable(),
                Tables\Columns\TextColumn::make('publish_date')->sortable()->dateTime(),
                Tables\Columns\TextColumn::make('created_at')->sortable()->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\Action::make('preview')
                    ->url(fn (Post $record) => $record->preview_url, shouldOpenInNewTab: true),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\AuthorsRelationManager::class,
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
