<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class () extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('general.site', [
            'name' => 'Octo',
            'description' => 'This project was created to help other developers makes web app in a easy way using TALL Stack.',
            'active' => true,
            'footer' => [
                'links' => [
                    [
                      'id' => 'WHfAcI3kEW',
                      'title' => 'ABOUT',
                      'url' => 'https://example.com'
                    ],
                    [
                        'id' => '2fG4vHjNNx',
                        'title' => 'SERVICES',
                        'url' => 'https://example.com'
                    ],
                    [
                        'id' => 'GuruDgBf6V',
                        'title' => ' WHY US',
                        'url' => 'https://example.com'
                    ],
                    [
                        'id' => 'E7GlSOf1LT',
                        'title' => 'CONTACT',
                        'url' => 'https://example.com'
                   ]
                ],
                'networks' => [
                    [
                        'id' => 'Vc46UE86ZV',
                        'title' => 'Facebook',
                        'url' => 'https://facebook.com'
                    ],
                    [
                        'id' => 'J6DYynAh3v',
                        'title' => 'Twitter',
                        'url' => 'https://twitter.com'
                    ],
                    [
                        'id' => 'ecq4mPVrMx',
                        'title' => 'Instagram',
                        'url' => 'https://instagram.com'
                    ],
                    [
                        'id' => 'Azvj3nLpD2',
                        'title' => 'Youtube',
                        'url' => 'https://youtube.com'
                    ]
                ]
            ],
            'sections' => [
                [
                    'id' => '27d4asd232s4',
                    'title' => 'Start a web! It’s easy and free.',
                    'description' => 'Create a web under laravel power. Easy and faster application & fully open source. Than you can imagine.',
                    'theme' => 'Hero',
                    'theme_color' => 'bg-gradient-to-br from-indigo-900 to-green-900',
                    'title_color' => 'text-white',
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
                    'title_color' => 'text-dark',
                    'description_color' => 'text-gray-600',
                ],
                [
                    'id' => '234fasd2v74',
                    'title' => 'Where is writing less code better than writing more code?',
                    'description' => 'Measuring programming progress by lines of code is like measuring aircraft building progress by weight. — Bill Gates',
                    'theme' => 'Clean',
                    'theme_color' => 'bg-indigo-600',
                    'title_color' => 'text-white',
                    'description_color' => 'text-gray-300',
                ],
            ]
        ]);
    }
};
