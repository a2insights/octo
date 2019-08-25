<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

/**
 * Class CreateUserAndBlogTest
 * @package Tests\Feature
 */
class CreateUserAndBlogTest extends TestCase
{
    /**
     * Test register
     *
     * @return void
     */
    public function test_user_and_blog_registration()
    {
        $this->withoutMiddleware();

        $user = factory(User::class)->make();

        $faker = app('Faker\Generator');

        $password = $faker->password;

        $response = $this->json('POST', 'register' , [
            'name' => $user->name,
            'email' => $user->email,
            'password' => $password,
            'password_confirmation' => $password,
        ]);

        $response->assertRedirect('/');
    }
}
