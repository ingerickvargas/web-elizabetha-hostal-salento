<?php

use Illuminate\Support\Facades\DB;

if (!function_exists('site_setting')) {
    function site_setting($name, $default = null)
    {
        $value = DB::table('settings')
            ->where('group', 'site')
            ->where('name', $name)
            ->value('payload') ?? $default;
		
		$value = trim($value, " \"'");

        // Si es el número de WhatsApp, limpiarlo
        if ($name === 'whatsapp') {
            $value = preg_replace('/\D/', '', $value); // Quita todo lo que no sea número
        }

        return $value;
    }
}
