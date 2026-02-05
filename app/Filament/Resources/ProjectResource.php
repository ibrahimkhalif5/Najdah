<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Project;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\ProjectCategory;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ProjectResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ProjectResource\RelationManagers;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('category_id')
                ->label('Project category')
                ->options(function () {
                    return ProjectCategory::pluck('category', 'id');
                })
                ->required(),
                TextInput::make('title')
                ->required()
                ->rules('regex:/^[a-zA-Z\s]*$/')
                ->placeholder('Enter project title'),
                TextInput::make('description')
                ->required()
                ->rules('regex:/^[a-zA-Z\s]*$/')
                ->placeholder('Enter project description')
                ->label('Project description'),
                TextInput::make('location')
                ->required()
                ->rules('regex:/^[a-zA-Z\s]*$/')
                ->placeholder('Enter project location')
                ->label('Project location'),
                Select::make('status')
                ->options([
                    'completed' => 'completed',
                    'inprogress' => 'inprogress',
                ])
                ->required()
                ->label('Project status'),
                Textinput::make('amount')
                ->required()
                ->rules('numeric')
                ->placeholder('Enter project amount')
                ->label('Project amount'),
                FileUpload::make('images')
                ->label('Upload project images')
                ->directory('projects')
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
                TextColumn::make('title'),
                TextColumn::make('description'),
                TextColumn::make('location'),
                TextColumn::make('status'),
                TextColumn::make('amount'),
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
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}
