<?php

namespace App\Filament\Widgets;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use App\Filament\Resources\MessageResource;
use Filament\Widgets\TableWidget as BaseWidget;

class Feedback extends BaseWidget
{
    protected int|string|array $columnSpan='full';
    public function table(Table $table): Table
    {
        return $table
            ->query(MessageResource::getEloquentQuery())
            ->defaultPaginationPageOption(5)
            ->defaultSort('created_at','desc')
                
            
            ->columns([
                TextColumn::make('name')->searchable()->sortable(),
                TextColumn::make('email')->searchable()->sortable(),
                TextColumn::make('subject')->searchable()->sortable(),
                TextColumn::make('message')->searchable()->sortable(),
                TextColumn::make('created_at')->searchable()->sortable()->dateTime(),
            ]);
    }
}
