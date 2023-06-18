<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('webhooks_settings.models', []);
        $this->migrator->add('webhooks_settings.history', false);
        $this->migrator->add('webhooks_settings.poll_interval', null);
    }
};
