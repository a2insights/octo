<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('whatsapp_chat_settings.attendants', []);
        $this->migrator->add('whatsapp_chat_settings.header', null);
        $this->migrator->add('whatsapp_chat_settings.footer', null);
    }
};
