<?php

namespace App\Filament\Resources\ThematicDataResource\Pages;

use App\Filament\Resources\ThematicDataResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListThematicData extends ListRecords
{
    protected static string $resource = ThematicDataResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
