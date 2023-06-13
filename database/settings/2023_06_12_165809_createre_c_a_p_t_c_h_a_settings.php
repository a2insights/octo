<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('settings_recaptcha.project_id', false);
        $this->migrator->add('settings_recaptcha.site_key', null);
        $this->migrator->add('settings_recaptcha.secret_key', null);
    }
};
