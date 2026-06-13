<?php

namespace App\Filament\Resources\AlphabetResource\Pages;

use App\Filament\Resources\AlphabetResource;
use Filament\Resources\Pages\CreateRecord;

class CreateAlphabet extends CreateRecord
{
    protected static string $resource = AlphabetResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
