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
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;
use App\Ingredient;
use App\Record;
use App\Drink;
use App\Recipe;
/** @var Factory $factory */
$factory->define(Ingredient::class, function (Faker $faker){
    return [
        Ingredient::NAME => $faker->name,
        Ingredient::DES => $faker->sentences(1, true),
    ];
});

$factory->define(Drink::class, function (Faker $faker){
    return [
        Drink::NAME => $faker->name,
        Drink::DES => $faker->sentences(1, true),
    ];
});

$factory->define(Recipe::class, function (Faker $faker){
    $drinkIdArray = Drink::all()->lists("id")->toArray();
    $ingredientIdArray = Ingredient::all()->lists("id")->toArray();
    return [
        Recipe::RECIPE_ID => $faker->randomElement($drinkIdArray),
        Recipe::RECIPE_TYPE => Drink::class,

        Recipe::INGREDIENT_ID => $faker->randomElement($ingredientIdArray),

        Recipe::QUANITY => $faker->randomFloat(null, 0, 100)
    ];
});

//$factory->define(Record::class, function (Faker $faker){
//    $drinkIdArray = Drink::all()->lists("id")->toArray();
//    $ingredientIdArray = Ingredient::all()->lists("id")->toArray();
//    return [
//        Record::RECORD_ID => $faker->randomElement($drinkIdArray),
//        Record::RECORD_TYPE => Drink::class,
//
//        Record::INGREDIENT_ID => $faker->randomElement($ingredientIdArray),
//
//        Record::QUANITY => $faker->randomFloat(null, 0, 100)
//    ];
//});
