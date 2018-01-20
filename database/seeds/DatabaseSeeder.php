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
        // $this->call(UsersTableSeeder::class);
        DB::table('categories')->insert([
           'title' => 'Новости ' .str_random(2),
           'description' => 'Magna aliquip de firmissimum nam laboris se eiusmod.',
           'slug' => str_random(10),
       ]);
    }
}
