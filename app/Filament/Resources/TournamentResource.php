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
use Filament\Forms\Components\Section;
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
                    ->live()
                    ->columnSpanFull(),
                ColorPicker::make('color')
                    ->label('Theme Color')
                    ->prefixIcon('heroicon-o-eye-dropper'),
                Select::make('game')
                    ->label('Tournament Game')
                    ->options([
                        'dota' => 'Dota 2',
                        'cs2' => 'Counter Strike 2',
                        'mlbb' => 'Mobile Legends Bang Bang',
                        'efootball' => 'eFootball 2023',
                        'pubgm' => 'PUBG Mobile',
                    ])
                    ->prefixIcon('bi-controller'),
                DatePicker::make('start_date')
                    ->prefixIcon('heroicon-o-calendar-days'),
                DatePicker::make('end_date')
                    ->prefixIcon('heroicon-o-calendar-days'),
                FileUpload::make('logo')
                    ->label('Tournament Logo')
                    ->image()
                    ->imageEditor()
                    ->imageEditorMode(3)
                    ->directory('logo')
                    ->rules(
                        ['dimensions:ratio=1/1'])
                        ->imagePreviewHeight('250')
                    ->openable()
                    ->uploadProgressIndicatorPosition('right')
                    ->panelAspectRatio('1:1')
                    ->uploadButtonPosition('right')
                    ->afterStateUpdated(function (Forms\Contracts\HasForms $livewire, Forms\Components\FileUpload $component) { 
                        $livewire->validateOnly($component->getStatePath());
                    }),
                Section::make('Actions')->schema([
                    Actions::make([
                        FormAction::make('push')
                            ->icon('heroicon-o-rocket-launch')
                            ->action(function ($record, $state, Tournament $tournament) {
                                $tournament['name'] = $state['name'];
                                $tournament['color'] = $state['color'];
                                $tournament->save();
                                event(new FetchDetails($tournament));
                                Notification::make()
                                    ->title('Pushed')
                                    ->body(__('Details have been pushed to frontend!'))
                                    ->color('success')
                                    ->send();
                            })
                    ])
                ]),
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
