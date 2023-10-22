<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('settings.name', 'Laravel');
        $this->migrator->add('settings.description', 'Laravel is a web application framework with expressive, elegant syntax.');
        $this->migrator->add('settings.keywords', ['laravel', 'php']);

        $this->migrator->add('settings.logo', null);
        $this->migrator->add('settings.logo_size', null);
        $this->migrator->add('settings.favicon', null);

        $this->migrator->add('settings.restrict_ips', []);
        $this->migrator->add('settings.restrict_users', []);

        $this->migrator->add('settings.timezone', 'America/New_York');
        $this->migrator->add('settings.locales', ['en_US', 'pt_BR', 'es']);
        $this->migrator->add('settings.locale', 'en_US');
    }
};
