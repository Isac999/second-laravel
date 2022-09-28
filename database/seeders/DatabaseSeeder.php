<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $this->call(BooksSeeder::class);
        $this->call(BooksRentalsSeeder::class);
        $this->call(CustomersSeeder::class);
        $this->call(LibrariesSeeder::class);
        $this->call(RequestsToSuppliersSeeder::class);
        $this->call(SuppliersSeeder::class);
    }
}
