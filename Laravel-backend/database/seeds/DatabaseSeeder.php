<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
	    Storage::deleteDirectory('products');
	    Storage::makeDirectory('products');

	    //factory(\App\Product::class, 5)->create();

        factory(\App\Role::class, 1)->create(['name' => 'admin']);
        factory(\App\Role::class, 1)->create(['name' => 'manager']);
        factory(\App\Role::class, 1)->create(['name' => 'user']);

        factory(\App\User::class, 1)->create([
            'name' => 'admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('secret'),
            'role_id' => \App\Role::ADMIN
        ]);

        factory(\App\User::class, 1)->create([
            'name' => 'manager',
            'email' => 'manager@mail.com',
            'password' => bcrypt('secret'),
            'role_id' => \App\Role::MANAGER
        ]);

        factory(\App\User::class, 1)->create([
            'name' => 'user',
            'email' => 'user@mail.com',
            'password' => bcrypt('secret'),
            'role_id' => \App\Role::USER
        ]);

        factory(\App\League::class, 1)->create([
            'name' => 'My League',
            'description' => 'this is a description'
        ]);

        factory(\App\Team::class, 30)->create();

        factory(\App\Player::class, 120)->create();

        factory(\App\Match::class, 150)->create();

        factory(\App\MatchPlayer::class, 300)->create();

    }
}
