<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Gallary;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\GallaryResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\GallaryResource\RelationManagers;

class GallaryResource extends Resource
{
    protected static ?string $model = Gallary::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                ->required()
                ->rules('regex:/^[a-zA-Z\s]*$/')
                ->placeholder('Enter image title'),
                TextInput::make('description')
                ->required()
                ->rules('regex:/^[a-zA-Z\s]*$/')
                ->placeholder('Enter image description')
                ->label('Image description'),
                FileUpload::make('images')
                ->label('Upload Image')
                ->multiple()
                ->directory('gallarys')
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
            'index' => Pages\ListGallaries::route('/'),
            'create' => Pages\CreateGallary::route('/create'),
            'edit' => Pages\EditGallary::route('/{record}/edit'),
        ];
    }
}
