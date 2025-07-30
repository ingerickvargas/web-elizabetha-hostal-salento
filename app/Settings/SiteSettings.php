<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class SiteSettings extends Settings
{
    public string $whatsapp;
    public string $contact_email;

    public static function group(): string
    {
        return 'site';
    }
}
