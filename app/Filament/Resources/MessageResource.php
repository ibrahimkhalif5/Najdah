<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MessageResource\Pages;
use App\Models\Message;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class MessageResource extends Resource
{
    protected static ?string $model = Message::class;

    protected static ?string $navigationIcon = 'heroicon-o-inbox';

    protected static ?string $navigationGroup = 'Management';

    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Select::make('type')
                ->options(['question' => 'Question', 'feedback' => 'Feedback', 'general' => 'General Enquiry'])
                ->disabled()
                ->prefixIcon('heroicon-m-tag'),
            TextInput::make('name')->disabled()->prefixIcon('heroicon-m-user'),
            TextInput::make('email')->disabled()->prefixIcon('heroicon-m-envelope'),
            TextInput::make('subject')->disabled()->prefixIcon('heroicon-m-document-text'),
            Textarea::make('message')->disabled(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('type')
                    ->label('Type')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'question' => 'warning',
                        'feedback' => 'success',
                        default => 'primary',
                    })
                    ->formatStateUsing(fn (string $state): string => ucfirst($state))
                    ->sortable(),
                TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->weight('semibold'),
                TextColumn::make('email')
                    ->searchable()
                    ->sortable()
                    ->icon('heroicon-m-envelope'),
                TextColumn::make('subject')
                    ->searchable()
                    ->sortable()
                    ->limit(25),
                TextColumn::make('message')
                    ->limit(40)
                    ->searchable()
                    ->color('gray'),
                IconColumn::make('read_at')
                    ->label('Read')
                    ->boolean()
                    ->trueIcon('heroicon-o-envelope-open')
                    ->falseIcon('heroicon-o-envelope')
                    ->trueColor('success')
                    ->falseColor('warning')
                    ->sortable(),
                IconColumn::make('is_spam')
                    ->label('Spam')
                    ->boolean()
                    ->trueIcon('heroicon-o-exclamation-triangle')
                    ->falseIcon('heroicon-o-check')
                    ->trueColor('danger')
                    ->falseColor('gray')
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime('M j, g:i A')
                    ->sortable()
                    ->label('Received')
                    ->color('gray'),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                SelectFilter::make('type')
                    ->options(['question' => 'Question', 'feedback' => 'Feedback', 'general' => 'General Enquiry']),
                Filter::make('is_archived')
                    ->label('Archived')
                    ->query(fn (Builder $query): Builder => $query->where('is_archived', true)),
                Filter::make('is_spam')
                    ->label('Spam')
                    ->query(fn (Builder $query): Builder => $query->where('is_spam', true)),
                Filter::make('unread')
                    ->label('Unread')
                    ->query(fn (Builder $query): Builder => $query->whereNull('read_at')),
            ])
            ->actions([
                ActionGroup::make([
                    ViewAction::make()
                        ->mutateRecordDataUsing(fn (array $data): array => $data)
                        ->form([
                            Select::make('type')
                                ->options(['question' => 'Question', 'feedback' => 'Feedback', 'general' => 'General Enquiry'])
                                ->disabled()
                                ->prefixIcon('heroicon-m-tag'),
                            TextInput::make('name')->disabled()->prefixIcon('heroicon-m-user'),
                            TextInput::make('email')->disabled()->prefixIcon('heroicon-m-envelope'),
                            TextInput::make('subject')->disabled()->prefixIcon('heroicon-m-document-text'),
                            Textarea::make('message')->disabled(),
                            DateTimePicker::make('read_at')
                                ->label('Read at')
                                ->disabled()
                                ->native(false)
                                ->displayFormat('M j, Y g:i A'),
                        ])
                        ->after(fn (Message $record) => $record->markAsRead()),
                    Action::make('toggleArchive')
                        ->label(fn (Message $record): string => $record->is_archived ? 'Restore' : 'Archive')
                        ->icon(fn (Message $record): string => $record->is_archived ? 'heroicon-o-arrow-uturn-left' : 'heroicon-o-archive-box')
                        ->color(fn (Message $record): string => $record->is_archived ? 'warning' : 'gray')
                        ->action(fn (Message $record) => $record->toggleArchive()),
                    Action::make('toggleSpam')
                        ->label(fn (Message $record): string => $record->is_spam ? 'Not Spam' : 'Mark Spam')
                        ->icon(fn (Message $record): string => $record->is_spam ? 'heroicon-o-check' : 'heroicon-o-exclamation-triangle')
                        ->color(fn (Message $record): string => $record->is_spam ? 'success' : 'danger')
                        ->action(fn (Message $record) => $record->is_spam ? $record->markAsNotSpam() : $record->markAsSpam()),
                    Action::make('toggleRead')
                        ->label(fn (Message $record): string => $record->read_at ? 'Mark Unread' : 'Mark Read')
                        ->icon(fn (Message $record): string => $record->read_at ? 'heroicon-o-envelope' : 'heroicon-o-envelope-open')
                        ->action(fn (Message $record) => $record->read_at ? $record->markAsUnread() : $record->markAsRead()),
                ]),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    BulkAction::make('markAsRead')
                        ->label('Mark as Read')
                        ->icon('heroicon-o-envelope-open')
                        ->action(fn ($records) => $records->each->markAsRead()),
                    BulkAction::make('markAsSpam')
                        ->label('Mark as Spam')
                        ->icon('heroicon-o-exclamation-triangle')
                        ->color('danger')
                        ->action(fn ($records) => $records->each->markAsSpam()),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return ['index' => Pages\ListMessages::route('/')];
    }
}
