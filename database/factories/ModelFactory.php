<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => 'administrator',
        'username' => 'administrator',
        'alamat' => 'mataram',
        'no_telp' => '',
        'ip' => '127.0.0.1',
        'email' => 'administrator@app.com',
        'password' => $password ?: $password = bcrypt('password'),
        'remember_token' => str_random(10),
    ];
});