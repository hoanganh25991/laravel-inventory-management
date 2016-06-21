<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Drink;

class AlterTableDrinkAddColumnPrice extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::table(Drink::TABLE, function (Blueprint $table){
            $table->double(Drink::PRICE, 15, 3);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::table(Drink::TABLE, function (Blueprint $table){
            $table->dropColumn(Drink::PRICE);
        });
    }
}
