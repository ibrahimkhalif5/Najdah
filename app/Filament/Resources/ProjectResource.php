<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Models\Project;
use App\Models\ProjectCategory;
use App\Models\Sponsor;
use App\Models\User;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    protected static ?string $navigationGroup = 'Management';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Select::make('category_id')
                ->label('Service')
                ->options(fn () => ProjectCategory::pluck('category', 'id'))
                ->searchable()
                ->required()
                ->prefixIcon('heroicon-m-tag'),
            Select::make('sponsor_id')
                ->label('Sponsor')
                ->options(fn () => Sponsor::pluck('sponsor', 'id'))
                ->searchable()
                ->nullable()
                ->prefixIcon('heroicon-m-building-office'),
            Select::make('user_id')
                ->label('Assigned user')
                ->options(fn () => User::pluck('name', 'id'))
                ->searchable()
                ->nullable()
                ->prefixIcon('heroicon-m-user'),
            TextInput::make('title')
                ->required()
                ->maxLength(255)
                ->prefixIcon('heroicon-m-document-text'),
            Textarea::make('description')
                ->maxLength(65535)
                ->rows(3),
            TextInput::make('location')
                ->required()
                ->maxLength(255)
                ->prefixIcon('heroicon-m-map-pin'),
            Select::make('status')
                ->options([
                    'inprogress' => 'In Progress',
                    'completed' => 'Completed',
                    'cancelled' => 'Cancelled',
                ])
                ->required()
                ->prefixIcon('heroicon-m-clock'),
            TextInput::make('amount')
                ->required()
                ->numeric()
                ->prefix('Ksh')
                ->prefixIcon('heroicon-m-currency-dollar'),
            TextInput::make('project_cost')
                ->numeric()
                ->prefix('Ksh')
                ->prefixIcon('heroicon-m-calculator'),
            DatePicker::make('start_date')
                ->native(false),
            DatePicker::make('completed_date')
                ->native(false),
            Repeater::make('media')
                ->relationship('media')
                ->label('Project Images')
                ->schema([
                    FileUpload::make('path')
                        ->label('Image')
                        ->image()
                        ->directory('projects')
                        ->maxSize(5120)
                        ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp']),
                    Hidden::make('sort_order'),
                ])
                ->orderable('sort_order')
                ->reorderable()
                ->addable()
                ->deletable()
                ->defaultItems(0)
                ->maxItems(10)
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
                    ->limit(30)
                    ->weight('semibold'),
                TextColumn::make('category.category')
                    ->label('Service')
                    ->sortable()
                    ->badge()
                    ->color('primary'),
                TextColumn::make('sponsor.sponsor')
                    ->label('Sponsor')
                    ->toggleable()
                    ->color('gray'),
                TextColumn::make('location')
                    ->searchable()
                    ->toggleable()
                    ->icon('heroicon-m-map-pin'),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'completed' => 'success',
                        'inprogress' => 'warning',
                        'cancelled' => 'danger',
                        default => 'gray',
                    })
                    ->sortable(),
                TextColumn::make('amount')
                    ->sortable()
                    ->money('KES')
                    ->color('success'),
                TextColumn::make('media_count')
                    ->label('Images')
                    ->counts('media')
                    ->badge()
                    ->color('primary')
                    ->sortable(),
                TextColumn::make('start_date')
                    ->date('M j, Y')
                    ->sortable()
                    ->toggleable()
                    ->color('gray'),
                TextColumn::make('completed_date')
                    ->date('M j, Y')
                    ->sortable()
                    ->toggleable()
                    ->color('gray'),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'inprogress' => 'In Progress',
                        'completed' => 'Completed',
                        'cancelled' => 'Cancelled',
                    ]),
                SelectFilter::make('category_id')
                    ->label('Service')
                    ->options(fn () => ProjectCategory::pluck('category', 'id')),
                Filter::make('has_sponsor')
                    ->label('Has sponsor')
                    ->query(fn (Builder $q) => $q->whereNotNull('sponsor_id')),
            ])
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
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}
