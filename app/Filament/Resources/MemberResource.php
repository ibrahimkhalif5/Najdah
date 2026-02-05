<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Member;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\MemberResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\MemberResource\RelationManagers;

class MemberResource extends Resource
{
    protected static ?string $model = Member::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('fullname')
                ->required()
                ->rules('regex:/^[a-zA-Z\s]*$/')
                ->placeholder('Enter image title'),
                TextInput::make('qualification')
                ->required()
                ->rules('regex:/^[a-zA-Z\s]*$/')
                ->placeholder('Enter qualification'),
                TextInput::make('designation')
                ->required()
                ->rules('regex:/^[a-zA-Z\s]*$/')
                ->placeholder('Enter  designation')
                ->label('Designation'),
                FileUpload::make('photo')
                ->label('Upload photo')
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
             TextColumn::make('fullname'),
             TextColumn::make('qualification'),
            TextColumn::make('designation'),
            ImageColumn::make('photo'),
               
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
            'index' => Pages\ListMembers::route('/'),
            'create' => Pages\CreateMember::route('/create'),
            'edit' => Pages\EditMember::route('/{record}/edit'),
        ];
    }
}
