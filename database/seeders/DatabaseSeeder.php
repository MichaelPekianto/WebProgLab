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
        \DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'),
            'gender' => 'Male'
        ]);

        \DB::table('users')->insert([
            'name' => 'Jeconiah Sugiyanto',
            'email' => 'jecochen12@gmail.com',
            'password' => bcrypt('jecojeco'),
            'gender' => 'Male'
        ]);

        \DB::table('users')->insert([
            'name' => 'Nico Aripin',
            'email' => 'hajimefly@gmail.com',
            'password' => bcrypt('jecojeco'),
            'gender' => 'Male'
        ]);

        \DB::table('users')->insert([
            'name' => 'Wendy Susanto',
            'email' => 'wentol@gmail.com',
            'password' => bcrypt('jecojeco'),
            'gender' => 'Male'
        ]);

        \DB::table('users')->insert([
            'name' => 'chenmaisterr',
            'email' => 'chenmalichen@gmail.com',
            'password' => bcrypt('jecojeco'),
            'gender' => 'Male'
        ]);

        \DB::table('products')->insert([
            'category' => 'Animal',
            'title' => 'Chicken',
            'desc' => 'Healthy and Big Chicken',
            'price' => '150000',
            'stock' => '15',
            'image' => 'image/chicken.jpg',
        ]);

        \DB::table('products')->insert([
            'category' => 'Animal',
            'title' => 'Pig',
            'desc' => 'Healthy Pig',
            'price' => '300000',
            'stock' => '10',
            'image' => 'image/pig.jpg',
        ]);

        \DB::table('products')->insert([
            'category' => 'Dairy Products',
            'title' => 'Fresh Milk',
            'desc' => 'Freshly squeezed out of cow',
            'price' => '20000',
            'stock' => '5',
            'image' => 'image/milk.jpg',
        ]);

        \DB::table('products')->insert([
            'category' => 'Dairy Products',
            'title' => 'Fresh Goat Milk',
            'desc' => 'Freshly squeezed out of goat',
            'price' => '15000',
            'stock' => '10',
            'image' => 'image/milk.jpg',
        ]);

        \DB::table('products')->insert([
            'category' => 'Animal',
            'title' => 'Chicken',
            'desc' => 'Healthy and Big White Chicken',
            'price' => '200000',
            'stock' => '10',
            'image' => 'image/chicken.jpg',
        ]);

        \DB::table('products')->insert([
            'category' => 'Poultry',
            'title' => 'Egg',
            'desc' => 'Great Omega 3 eggs',
            'price' => '2000',
            'stock' => '120',
            'image' => 'image/egg.jpg',
        ]);

        \DB::table('products')->insert([
            'category' => 'Animal',
            'title' => 'Pig',
            'desc' => 'Healthy and Big Big Pig',
            'price' => '350000',
            'stock' => '13',
            'image' => 'image/pig.jpg',
        ]);
    }
}
