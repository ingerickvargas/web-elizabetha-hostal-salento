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
	public ?string $default_message;
	public ?string $facebook;
	public ?string $instagram;

    public function mount(): void
    {
        $settings = app(SiteSettingsClass::class);
        $this->whatsapp = $settings->whatsapp;
        $this->contact_email = $settings->contact_email;
		$this->default_message = $settings->default_message;
		$this->facebook = $settings->facebook;
		$this->instagram = $settings->instagram;
    }

    protected function getFormSchema(): array
    {
        return [
            Forms\Components\TextInput::make('whatsapp')->label('Número de WhatsApp')->required(),
            Forms\Components\TextInput::make('contact_email')->label('Correo de contacto')->email()->required(),
			Forms\Components\Textarea::make('default_message')->label('Mensaje predeterminado de WhatsApp')->rows(3),
			Forms\Components\TextInput::make('facebook')->label('URL de Facebook')->url()->helperText('Ej: https://www.facebook.com/tuperfil')->placeholder('https://facebook.com/tu-pagina'),
        	Forms\Components\TextInput::make('instagram')->label('URL de Instagram')->url()->helperText('Ej: https://www.facebook.com/tuperfil')->placeholder('https://instagram.com/tu-pagina'),
        ];
    }

    public function save(): void
    {
        $settings = app(SiteSettingsClass::class);
        $settings->whatsapp = $this->whatsapp;
        $settings->contact_email = $this->contact_email;
		$settings->default_message = $this->default_message;
		$settings->facebook = $this->facebook;
		$settings->instagram = $this->instagram;
        $settings->save();

        session()->flash('success', 'Configuración actualizada correctamente.');
    }
}
