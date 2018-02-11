<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@fortnitecollection.com',
            'password' => bcrypt('secret')
        ]);

        factory(App\Emote::class, 20)->create();
    }
}
