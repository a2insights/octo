<?php
/** @noinspection PhpUndefinedVariableInspection */

use Illuminate\Support\Str;

$faker = app('Faker\Generator');
$name = $faker->name;

$factory->define(App\Models\Tag::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->text,
    ];
});

$factory->define(App\Models\Blog::class, function (Faker\Generator $faker) use ($name){
    return [
        'name' => $name,
        'description' => $faker->text,
        'sub_domain' => $faker->word,
        'guard_name' => $faker->word,
    ];
});

$factory->define(App\Models\User::class, function (Faker\Generator $faker) use ($name) {
    return [
        'name' => $name,
        'email' => 'admin@admin.com',
        'email_verified_at' => now(),
        'password' => bcrypt('senha'),
        'remember_token' => Str::random(10),
    ];
});

$factory->afterCreating(\App\Models\Blog::class, function (\App\Models\Blog $blog) {
    factory(\App\Models\Post::class, rand(20,100))->create([
        'blog_id' => $blog->id,
    ]);
});


$factory->define(App\Models\Post::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->text(25),
        'content' => $faker->text
    ];
});
