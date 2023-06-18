<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('recaptcha_settings.project_id', false);
        $this->migrator->add('recaptcha_settings.site_key', null);
        $this->migrator->add('recaptcha_settings.secret_key', null);
    }
};
