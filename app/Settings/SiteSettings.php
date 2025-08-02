<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class SiteSettings extends Settings
{
    public string $whatsapp;
    public string $contact_email;
	public string $default_message;
	public string $facebook;
	public string $instagram;

    public static function group(): string
    {
        return 'site';
    }
}
