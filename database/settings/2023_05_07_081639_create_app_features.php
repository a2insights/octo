<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('features.dark_mode', true);

        $this->migrator->add('features.auth_registration', true);
        $this->migrator->add('features.auth_login', true);
        $this->migrator->add('features.auth_2fa', false);
        $this->migrator->add('features.webhooks', false);
        $this->migrator->add('features.recaptcha', false);
        $this->migrator->add('features.terms', false);
        $this->migrator->add('features.user_phone', false);
        $this->migrator->add('features.username', false);
    }
};
