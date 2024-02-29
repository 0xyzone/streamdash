<?php

namespace App\Filament\Resources\TVTMatchupResource\Pages;

use App\Filament\Resources\TVTMatchupResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewTVTMatchup extends ViewRecord
{
    protected static string $resource = TVTMatchupResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
