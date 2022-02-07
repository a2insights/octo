<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class CreateGeneralSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('general.site_name', 'Octo');
        $this->migrator->add('general.site_description', 'This project was created to help other developers makes web app in a easy way using TALL Stack.');
        $this->migrator->add('general.site_active', true);
        $this->migrator->add('general.site_sections', [
            [
                'id' => '27d4asd232s4',
                'title' => 'Start a web! It’s easy and free.',
                'description' => 'Create a web under laravel power. Easy and faster application & fully open source. Than you can imagine.',
                'theme' => 'Hero',
                'title_color' => 'text-white',
                'color' => 'bg-primary',
                'description_color' => 'text-gray-300',
            ],
            [
                'id' => '27d4asd2v74',
                'title' => 'TALL Stack',
                'description' => 'This project was created to help other developers makes web app in a easy way using TALL Stack.',
                'theme' => 'Light',
                'image_path' => 'img/social-media.png',
                'image_url' => asset('img/social-media.png'),
                'image_align' => 'right',
                'title_color' => 'text-white',
                'color' => 'bg-primary',
                'description_color' => 'text-gray-300',
            ],
        ]);
    }
}
