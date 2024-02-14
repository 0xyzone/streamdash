<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Set;
use Filament\Forms\Form;
use App\Models\Tournament;
use Filament\Tables\Table;
use App\Events\FetchDetails;
use Filament\Resources\Resource;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Actions;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\ColorColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\ColorPicker;
use App\Filament\Resources\TournamentResource\Pages;
use Filament\Forms\Components\Actions\Action as FormAction;

class TournamentResource extends Resource
{
    protected static ?string $model = Tournament::class;

    protected static ?int $navigationSort = 2;

    protected static ?string $navigationIcon = 'heroicon-o-trophy';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                ->label('Tournament Name')
                ->prefixIcon('heroicon-o-trophy')
                ->live(),
                ColorPicker::make('color')
                ->prefixIcon('heroicon-o-eye-dropper'),
                DatePicker::make('start_date')
                ->prefixIcon('heroicon-o-calendar-days'),
                DatePicker::make('end_date')
                ->prefixIcon('heroicon-o-calendar-days'),
                Select::make('game')
                ->options([
                    'dota'=> 'Dota 2',
                    'cs2' => 'Counter Strike 2',
                    'mlbb'=> 'Mobile Legends Bang Bang',
                    'efootball'=> 'eFootball 2023',
                    'pubgm'=> 'PUBG Mobile',
                ])
                ->prefixIcon('bi-controller'),
                FileUpload::make('logo')
                ->directory('logo')
                ->image()
                ->imageEditor(),
                Actions::make([
                    FormAction::make('push')
                    ->icon('heroicon-o-trophy')
                    ->action(function ($record, Tournament $tournament) {
                        dd($record);
                        $tournament->update($state);
                        $tournament->save();
                        event(new FetchDetails($tournament));
                        Notification::make()
                        ->title('Pushed')
                        ->body(__('Details have been pushed to frontend!'))
                        ->color('success')
                        ->send();
                    })
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('logo'),
                TextColumn::make('name'),
                ColorColumn::make('color'),
                TextColumn::make('start_date')
                ->date(),
                TextColumn::make('end_date')
                ->date(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Action::make('push')
                ->action(function (Tournament $tournament) {
                    event(new FetchDetails($tournament));
                    Notification::make()
                    ->title('Pushed')
                    ->body(__('Details have been pushed to frontend!'))
                    ->color('success')
                    ->send();
                }),
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
            'index' => Pages\ListTournaments::route('/'),
            // 'create' => Pages\CreateTournament::route('/create'),
            // 'edit' => Pages\EditTournament::route('/{record}/edit'),
        ];
    }
}
