<?php

namespace App\Filament\Widgets;

use App\Models\Message;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Str;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class Feedback extends BaseWidget
{
    protected int|string|array $columnSpan = 'full';

    protected static ?int $sort = 2;

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Message::query()
                    ->where('is_spam', false)
                    ->latest()
                    ->limit(10)
            )
            ->columns([
                TextColumn::make('type')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'question' => 'warning',
                        'feedback' => 'success',
                        default => 'primary',
                    })
                    ->formatStateUsing(fn (string $state): string => ucfirst($state)),
                TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->weight('semibold'),
                TextColumn::make('email')
                    ->searchable()
                    ->icon('heroicon-m-envelope'),
                TextColumn::make('subject')
                    ->searchable()
                    ->limit(25),
                TextColumn::make('message')
                    ->limit(40)
                    ->html()
                    ->formatStateUsing(fn ($state) => nl2br(e(Str::limit($state, 40)))),
                TextColumn::make('created_at')
                    ->dateTime('M j, g:i A')
                    ->sortable()
                    ->color('gray'),
            ])
            ->defaultSort('created_at', 'desc');
    }
}
