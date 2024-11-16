<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('settings_terms.service', $this->termsOfService());
        $this->migrator->add('settings_terms.privacy_policy', $this->privacyPolicy());
    }

    private function termsOfService(): string
    {
        return file_get_contents(resource_path('markdown/terms.md'));
    }

    private function privacyPolicy(): string
    {
        return file_get_contents(resource_path('markdown/policy.md'));
    }
};
