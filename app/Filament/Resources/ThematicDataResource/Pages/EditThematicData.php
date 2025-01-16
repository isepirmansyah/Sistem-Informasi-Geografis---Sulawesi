<?php

namespace App\Filament\Resources\ThematicDataResource\Pages;

use App\Filament\Resources\ThematicDataResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditThematicData extends EditRecord
{
    protected static string $resource = ThematicDataResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
