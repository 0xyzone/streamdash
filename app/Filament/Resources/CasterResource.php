<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Caster;
use Filament\Forms\Set;
use Filament\Forms\Form;
use App\Models\Tournament;
use Filament\Tables\Table;
use App\Events\FetchDetails;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Filament\Infolists\Components\TextEntry;
use App\Filament\Resources\CasterResource\Pages;
use Filament\Tables\Actions\Action;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\CasterResource\RelationManagers;

class CasterResource extends Resource
{
    protected static ?string $model = Caster::class;

    protected static ?int $navigationSort = 3;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name'),
                TextInput::make('link'),
                FileUpload::make('image')
                ->directory('caster-photo')
                ->columnSpanFull()
                ->image()
                ->imageEditor()
                ->required()
                ->imagePreviewHeight('250'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image'),
                TextColumn::make('name')
                ->sortable()
                ->searchable(),
                TextColumn::make('link')
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
            'index' => Pages\ListCasters::route('/'),
            // 'create' => Pages\CreateCaster::route('/create'),
            // 'edit' => Pages\EditCaster::route('/{record}/edit'),
        ];
    }
}
