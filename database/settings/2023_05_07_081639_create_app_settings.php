<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('settings.name', 'Laravel');
        $this->migrator->add('settings.description', 'Laravel is a web application framework with expressive, elegant syntax.');
        $this->migrator->add('settings.keywords', ['laravel', 'php']);

        $this->migrator->add('settings.dark_mode', true);
        $this->migrator->add('settings.logo', null);
        $this->migrator->add('settings.favicon', null);

        $this->migrator->add('settings.auth_registration', true);
        $this->migrator->add('settings.auth_login', true);
        $this->migrator->add('settings.auth_2fa', true);

        $this->migrator->add('settings.restrict_ips', []);
        $this->migrator->add('settings.restrict_users', []);
    }
};
