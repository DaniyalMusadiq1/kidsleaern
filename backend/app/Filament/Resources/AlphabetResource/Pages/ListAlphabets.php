<?php

namespace App\Filament\Resources\AlphabetResource\Pages;

use App\Filament\Resources\AlphabetResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAlphabets extends ListRecords
{
    protected static string $resource = AlphabetResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
