<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Models\Post;
use Filament\Forms;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Pboivin\FilamentPeek\Forms\Components\PreviewLink;
use Pboivin\FilamentPeek\Pages\Actions\PreviewAction;
use Z3d0X\FilamentFabricator\Facades\FilamentFabricator;
use Z3d0X\FilamentFabricator\Models\Contracts\Page as PageContract;
use Z3d0X\FilamentFabricator\Models\Page;

class PostResource extends Resource
{
    protected static ?string $model = Page::class;

    protected static ?string $navigationIcon = 'heroicon-o-pencil';

    public static function getNavigationLabel(): string
    {
        return __('Blog');
    }

    public static function getNavigationGroup(): ?string
    {
        return __('Core Features');
    }

    public static function getNavigationBadge(): ?string
    {
        if (static::getModel()::where('style', '=', 'blog')->count() > 0) {
            if (static::getModel()::where('style', '=', 'blog')->count() >= 999) {
                return '+999';
            } else {
                return static::getModel()::where('style', '=', 'blog')->count();
            }
        }

        return null;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                TextInput::make('slug')
                    ->required()
                    ->maxLength(255),
                TextInput::make('layout')
                    ->required()
                    ->maxLength(255)
                    ->default('default'),
                Hidden::make('style')->default('blog'),
                TextInput::make('blocks')
                    ->dehydrated()
                    ->default([['data' => [], 'type' => 'blog.post']])
                    ->required(),
                Select::make('parent_id')
                    ->relationship('parent', 'title'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->query(
                Post::query()
                    ->select()
                    ->where('style', '=', 'blog')
            )
            ->columns([
                TextColumn::make('title')
                    ->searchable(),
                TextColumn::make('slug')
                    ->prefix('/')
                    ->searchable(),
                TextColumn::make('layout')
                    ->searchable(),
                TextColumn::make('parent.title')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->label(__('New Post')),
                Action::make('visit')
                    ->label(__('filament-fabricator::page-resource.actions.visit'))
                    ->url(fn (?PageContract $record) => FilamentFabricator::getPageUrlFromId($record->id, true) ?: null)
                    ->icon('heroicon-o-arrow-top-right-on-square')
                    ->openUrlInNewTab()
                    ->color('success')
                    ->visible(config('filament-fabricator.routing.enabled')),
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
            'index'  => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit'   => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
