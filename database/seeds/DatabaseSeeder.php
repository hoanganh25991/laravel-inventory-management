<?php

use Illuminate\Database\Seeder;
use App\Ingredient;
use App\Drink;
use App\Recipe;
use App\Record;

class DatabaseSeeder extends Seeder{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        // $this->call(UsersTableSeeder::class);
        factory(Ingredient::class, 8)->create();
        factory(Drink::class, 25)->create();
        factory(Recipe::class, 106)->create();
    }
}
