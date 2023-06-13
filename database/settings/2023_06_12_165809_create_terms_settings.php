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
        return <<<'MARKDOWN'
        # Terms of Service

        Edit this content in the dashboard feature of your application.
        MARKDOWN;
    }

    private function privacyPolicy(): string
    {
        return <<<'MARKDOWN'
        # Privacy Policy

        Edit this content in the dashboard feature of your application.
        MARKDOWN;
    }
};
