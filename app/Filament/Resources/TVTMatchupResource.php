<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Team;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\Tournament;
use App\Models\TVTMatchup;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\TVTMatchupResource\Pages;
use App\Filament\Resources\TVTMatchupResource\RelationManagers;

class TVTMatchupResource extends Resource
{
    protected static ?string $model = TVTMatchup::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('a_team_id')
                ->options(Team::all()->pluck('name', 'team_id')),
                Forms\Components\Select::make('b_team_id')
                ->options(Team::all()->pluck('name', 'team_id')),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\SelectColumn::make('tournament_id')
                ->label('Tournament')
                ->options(Tournament::all()->pluck('name', 'id'))
                ->searchable(),
                Tables\Columns\SelectColumn::make('a_team_id')
                ->options(Team::all()->pluck('name', 'team_id'))
                ->searchable(),
                Tables\Columns\SelectColumn::make('b_team_id')
                ->options(Team::all()->pluck('name', 'team_id'))
                ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                // Tables\Actions\ViewAction::make(),
                // Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                // Tables\Actions\BulkActionGroup::make([
                //     Tables\Actions\DeleteBulkAction::make(),
                // ]),
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
        $record = 1;
        return [
            'index' => Pages\ListTVTMatchups::route('/'),
            // 'index' => Pages\CreateTVTMatchup::route('/'),
            // 'index' => Pages\ViewTVTMatchup::route('/{record}'),
            // 'edit' => Pages\EditTVTMatchup::route('/{record}/edit'),
        ];
    }
}
