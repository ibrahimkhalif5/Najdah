<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SponsorResource\Pages;
use App\Models\Sponsor;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class SponsorResource extends Resource
{
    protected static ?string $model = Sponsor::class;

    protected static ?string $navigationIcon = 'heroicon-o-banknotes';

    protected static ?string $navigationGroup = 'Management';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('sponsor')
                ->required()
                ->maxLength(255)
                ->prefixIcon('heroicon-m-building-office'),
            TextInput::make('amount')
                ->required()
                ->numeric()
                ->prefix('Ksh')
                ->prefixIcon('heroicon-m-currency-dollar'),
            TextInput::make('website_url')
                ->label('Website')
                ->url()
                ->maxLength(255)
                ->prefixIcon('heroicon-m-globe-alt'),
            ToggleButtons::make('is_active')
                ->label('Active')
                ->boolean()
                ->default(true)
                ->grouped(),
            Repeater::make('media')
                ->relationship('media')
                ->label('Sponsor Logos')
                ->schema([
                    FileUpload::make('path')
                        ->label('Logo')
                        ->image()
                        ->directory('sponsors')
                        ->maxSize(20480)
                        ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp']),
                    Hidden::make('sort_order'),
                ])
                ->orderable('sort_order')
                ->reorderable()
                ->addable()
                ->deletable()
                ->defaultItems(0)
                ->maxItems(5)
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
                TextColumn::make('sponsor')
                    ->searchable()
                    ->sortable()
                    ->weight('semibold'),
                TextColumn::make('amount')
                    ->sortable()
                    ->money('KES')
                    ->color('success'),
                TextColumn::make('media_count')
                    ->label('Images')
                    ->counts('media')
                    ->badge()
                    ->color('primary'),
                IconColumn::make('is_active')
                    ->boolean()
                    ->sortable(),
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
            'index' => Pages\ListSponsors::route('/'),
            'create' => Pages\CreateSponsor::route('/create'),
            'edit' => Pages\EditSponsor::route('/{record}/edit'),
        ];
    }
}
