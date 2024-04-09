<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Item;
use App\Models\Admin;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        Admin::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make(123456789),
        ]);
        $this->call(CategorySeeder::class);
        //Item::factory(50)->create();
    }
}
