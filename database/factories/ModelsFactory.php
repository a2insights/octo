<?php
/** @noinspection PhpUndefinedVariableInspection */

use Illuminate\Support\Str;

$factory->define(App\Models\Tag::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->word,
    ];
});

$factory->define(App\Models\Favorite::class, function (Faker\Generator $faker) {
    return [
        'model_type' => $faker->word,
        'model_id' => '\App\Models\User::class',
        'user_id' => function(){ return factory(\App\Models\User::class)->create()->id; },
    ];
});

$factory->define(App\Models\Blog::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->text,
        'sub_domain' => $faker->word,
        'guard_name' => $faker->word,
    ];
});

$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => bcrypt('senha'),
        'remember_token' => Str::random(10),
    ];
});

$factory->afterCreating(\App\Models\User::class, function (\App\Models\User $user) {
   $userHasBlog = factory(\App\Models\UserHasBlog::class)->create([
       'blog_id' => factory(\App\Models\Blog::class)->create()->id,
       'user_id' => $user->id
   ]);

   for ($n = 1 ; $n <= rand(1,10); $n++){
       factory(\App\Models\Post::class)->create([
           'user_has_blog_id' => $userHasBlog->id
       ]);
   }
});

$factory->define(\App\Models\UserHasBlog::class, function (){
   return [];
});


$factory->define(App\Models\Post::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'content' => $faker->text
    ];
});
