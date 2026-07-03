<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectCategoryResource\Pages;
use App\Models\ProjectCategory;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ProjectCategoryResource extends Resource
{
    protected static ?string $model = ProjectCategory::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag';

    protected static ?string $navigationGroup = 'Content';

    protected static ?string $navigationLabel = 'Services';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('category')
                ->required()
                ->maxLength(255)
                ->label('Service name')
                ->prefixIcon('heroicon-m-tag'),
            Textarea::make('description')
                ->maxLength(65535)
                ->rows(3)
                ->label('Short description'),
            FileUpload::make('images')
                ->label('Image')
                ->directory('project_categories')
                ->image()
                ->maxSize(20480),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('category')
                    ->searchable()
                    ->sortable()
                    ->weight('semibold'),
                TextColumn::make('description')
                    ->limit(50)
                    ->color('gray'),
                ImageColumn::make('images')
                    ->circular()
                    ->defaultImageUrl(fn ($record): string => 'https://ui-avatars.com/api/?name=' . urlencode($record->category) . '&background=7D0552&color=fff&size=40'),
                TextColumn::make('projects_count')
                    ->counts('projects')
                    ->label('Projects')
                    ->badge()
                    ->color('primary'),
                TextColumn::make('created_at')
                    ->dateTime('M j, Y')
                    ->sortable()
                    ->toggleable()
                    ->color('gray'),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([])
            ->actions([
                EditAction::make()
                    ->icon('heroicon-m-pencil-square'),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProjectCategories::route('/'),
            'create' => Pages\CreateProjectCategory::route('/create'),
            'edit' => Pages\EditProjectCategory::route('/{record}/edit'),
        ];
    }
}
