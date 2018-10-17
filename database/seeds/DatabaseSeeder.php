<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('columns')->insert([
            [
            'name' => 'To do',
            'capacity' => null
            ],
            [
            'name' => 'Doing',
            'capacity' => null
            ],
            [
            'name' => 'Done',
            'capacity' => null
            ]

        ]);
    }
}
