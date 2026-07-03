<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GallaryResource\Pages;
use App\Models\Gallary;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class GallaryResource extends Resource
{
    protected static ?string $model = Gallary::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';

    protected static ?string $navigationGroup = 'System';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('title')
                ->required()
                ->maxLength(255)
                ->prefixIcon('heroicon-m-document-text'),
            Textarea::make('description')
                ->maxLength(65535)
                ->rows(3)
                ->label('Image description'),
            Repeater::make('media')
                ->relationship('media')
                ->label('Gallery Images')
                ->schema([
                    FileUpload::make('path')
                        ->label('Image')
                        ->image()
                        ->directory('galleries')
                        ->maxSize(5120)
                        ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp']),
                    Hidden::make('sort_order'),
                ])
                ->orderable('sort_order')
                ->reorderable()
                ->addable()
                ->deletable()
                ->defaultItems(0)
                ->maxItems(20)
                ->columnSpanFull()
                ->mutateRelationshipDataBeforeCreateUsing(fn (array $data): array => array_merge($data, [
                    'filename' => basename($data['path']),
                ]))
                ->mutateRelationshipDataBeforeSaveUsing(fn (array $data): array => array_merge($data, [
                    'filename' => basename($data['path']),
                ])),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->weight('semibold'),
                TextColumn::make('description')
                    ->limit(40)
                    ->toggleable()
                    ->color('gray'),
                TextColumn::make('media_count')
                    ->label('Images')
                    ->counts('media')
                    ->badge()
                    ->color('primary')
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime('M j, Y')
                    ->sortable()
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
            'index' => Pages\ListGallaries::route('/'),
            'create' => Pages\CreateGallary::route('/create'),
            'edit' => Pages\EditGallary::route('/{record}/edit'),
        ];
    }
}
