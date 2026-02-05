<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\ProjectCategory;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ProjectCategoryResource\Pages;
use App\Filament\Resources\ProjectCategoryResource\RelationManagers;

class ProjectCategoryResource extends Resource
{
    protected static ?string $model = ProjectCategory::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('category')
                ->required()
                ->rules('regex:/^[a-zA-Z\s]*$/')
                ->placeholder('Enter project category')
                ->label('Project category'),
                TextInput::make('description')
                ->required()
                ->rules('regex:/^[a-zA-Z\s]*$/')
                ->placeholder('Enter project category description')
                ->label('Project category description'),
                FileUpload::make('images')
                ->label('Upload project category image')
                ->directory('project_categories')
                ->preserveFilenames()
                ->acceptedFileTypes([
                      'image/png', // PNG Images
                    'image/jpeg', // JPG Images
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('category'),
                TextColumn::make('description'),
                ImageColumn::make('images'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListProjectCategories::route('/'),
            'create' => Pages\CreateProjectCategory::route('/create'),
            'edit' => Pages\EditProjectCategory::route('/{record}/edit'),
        ];
    }
}
