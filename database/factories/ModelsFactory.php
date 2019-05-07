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

$factory->define(App\Models\Favorite::class, function (Faker\Generator $faker) {
    return [
        'model_type' => $faker->word,
        'model_id' => '\App\Models\User::class',
        'user_id' => function(){ return factory(\App\Models\User::class)->create()->id; },
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
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => bcrypt('senha'),
        'remember_token' => Str::random(10),
    ];
});

$factory->afterCreating(\App\Models\User::class, function (\App\Models\User $user) {
    factory(\App\Models\Post::class, rand(20,100))->create([
        'blog_id' => factory(\App\Models\Blog::class)->create(['user_id' => $user->id])->id,
        'user_id' => $user->id
    ]);
});


$factory->define(App\Models\Post::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->text(25),
        'content' => $faker->text
    ];
});
