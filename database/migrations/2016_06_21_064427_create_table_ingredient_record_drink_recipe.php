<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Ingredient;
use App\Record;
use App\Drink;
use App\Recipe;

class CreateTableIngredientRecordDrinkRecipe extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        /** ingredient table */
        Schema::create(Ingredient::TABLE, function (Blueprint $table){
            $table->increments("id");
            $table->timestamps();
            $table->string(Ingredient::NAME);
            $table->string(Ingredient::DES);
        });
        /** record table */
        Schema::create(Recipe::TABLE, function (Blueprint $table){
            $table->increments("id");
            $table->timestamps();
            /*
            * poly-morphic relationship
            * ITEM_ID is id of ITEM_TYPE
            * to help laravel understand where to morph
            * class-name added in ITEM_TYPE
            */
            $table->unsignedInteger(Recipe::RECIPE_ID);
            $table->string(Recipe::RECIPE_TYPE);

            $table->unsignedInteger(Recipe::INGREDIENT_ID);
            $table->foreign(Recipe::INGREDIENT_ID)->references("id")->on(Ingredient::TABLE);

            $table->double(Recipe::QUANITY, 15, 3);
        });
        /** drink table */
        Schema::create(Drink::TABLE, function (Blueprint $table){
            $table->increments("id");
            $table->timestamps();
            $table->string(Drink::NAME);
            $table->string(Drink::DES);
        });
        /** recipe table */
        Schema::create(Record::TABLE, function (Blueprint $table){
            $table->increments("id");
            $table->timestamps();

            $table->unsignedInteger(Record::INGREDIENT_ID);
            $table->foreign(Record::INGREDIENT_ID)->references("id")->on(Ingredient::TABLE);

            /*
             * poly-morphic relationship
             * RECORD_ID is id of RECORD_TYPE
             * to help laravel understand where to morph
             * class-name added in RECORD_TYPE
             */
            $table->unsignedInteger(Record::RECORD_ID);
            $table->string(Record::RECORD_TYPE);

            $table->double(Record::QUANITY, 15, 3);
            $table->double(Record::PRICE, 15, 3);

            /** import +1|export -1 */
            $table->integer(Record::I_E)->default(-1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::table(Record::TABLE, function (Blueprint $table){
            $recipe = new Record();
            $table->dropForeign($recipe->getForeignKeyAt(Record::INGREDIENT_ID));
        });
        Schema::drop(Record::TABLE);

        Schema::table(Recipe::TABLE, function (Blueprint $table){
            $recipe = new Recipe();
            $table->dropForeign($recipe->getForeignKeyAt(Recipe::INGREDIENT_ID));
        });
        Schema::drop(Recipe::TABLE);

        Schema::drop(Drink::TABLE);
        Schema::drop(Ingredient::TABLE);
    }
}
