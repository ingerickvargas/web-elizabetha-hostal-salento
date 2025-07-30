<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Forms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;
use App\Settings\SiteSettings as SiteSettingsClass;

class SiteSettings extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-cog';
    protected static string $view = 'filament.pages.site-settings';
    protected static ?string $navigationLabel = 'Configuración del Sitio';

    public ?string $whatsapp;
    public ?string $contact_email;

    public function mount(): void
    {
        $settings = app(SiteSettingsClass::class);
        $this->whatsapp = $settings->whatsapp;
        $this->contact_email = $settings->contact_email;
    }

    protected function getFormSchema(): array
    {
        return [
            Forms\Components\TextInput::make('whatsapp')->label('Número de WhatsApp')->required(),
            Forms\Components\TextInput::make('contact_email')->label('Correo de contacto')->email()->required(),
        ];
    }

    public function save(): void
    {
        $settings = app(SiteSettingsClass::class);
        $settings->whatsapp = $this->whatsapp;
        $settings->contact_email = $this->contact_email;
        $settings->save();

        session()->flash('success', 'Configuración actualizada correctamente.');
    }
}
