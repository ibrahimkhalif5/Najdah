<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MemberResource\Pages;
use App\Models\Member;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class MemberResource extends Resource
{
    protected static ?string $model = Member::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationGroup = 'Management';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('fullname')
                ->required()
                ->maxLength(255)
                ->prefixIcon('heroicon-m-user'),
            TextInput::make('qualification')
                ->required()
                ->maxLength(255)
                ->prefixIcon('heroicon-m-academic-cap'),
            TextInput::make('designation')
                ->required()
                ->maxLength(255)
                ->prefixIcon('heroicon-m-identification'),
            TextInput::make('sort_order')
                ->numeric()
                ->default(0)
                ->prefixIcon('heroicon-m-arrows-up-down'),
            FileUpload::make('photo')
                ->image()
                ->directory('members')
                ->maxSize(20480)
                ->avatar(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('photo')
                    ->circular()
                    ->defaultImageUrl(fn ($record): string => 'https://ui-avatars.com/api/?name=' . urlencode($record->fullname) . '&background=7D0552&color=fff&size=40'),
                TextColumn::make('fullname')
                    ->searchable()
                    ->sortable()
                    ->weight('semibold'),
                TextColumn::make('qualification')
                    ->searchable()
                    ->color('gray'),
                TextColumn::make('designation')
                    ->searchable()
                    ->badge()
                    ->color('primary'),
                TextColumn::make('sort_order')
                    ->sortable()
                    ->color('gray'),
            ])
            ->defaultSort('sort_order')
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
            'index' => Pages\ListMembers::route('/'),
            'create' => Pages\CreateMember::route('/create'),
            'edit' => Pages\EditMember::route('/{record}/edit'),
        ];
    }
}
