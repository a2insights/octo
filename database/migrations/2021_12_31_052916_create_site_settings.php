<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class() extends SettingsMigration {
    public function up(): void
    {
        $this->migrator->add('site.name', 'Octo');
        $this->migrator->add('site.description', 'This project was created to help other developers makes web app in a easy way using TALL Stack.');
        $this->migrator->add('site.active', true);
        $this->migrator->add('site.demo', config('app.env') === 'demo' || config('app.env') === 'local') || config('app.env') === 'demo';
    }
};
