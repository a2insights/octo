<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class CreateGeneralSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('general.site_name', 'Octo');
        $this->migrator->add('general.site_description', 'This project was created to help other developers makes web app in a easy way using TALL Stack.');
        $this->migrator->add('general.site_active', true);
    }
}
