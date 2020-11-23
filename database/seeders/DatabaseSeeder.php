<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();
        $this->call(chenloaisp::class);
        $this->call(chenPhuong::class);
        $this->call(chenQuan::class);
        $this->call(chenquan_to_phuong::class);
    }
}
