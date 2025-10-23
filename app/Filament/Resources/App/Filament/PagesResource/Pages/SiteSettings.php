<?php

namespace App\Filament\Resources\App\Filament\PagesResource\Pages;

use App\Filament\Resources\App\Filament\PagesResource;
use Filament\Resources\Pages\Page;

class SiteSettings extends Page
{
    protected static string $resource = SiteSettings::class;

    protected static string $view = 'filament.resources.app.filament.pages}-resource.pages.site-settings';
}
