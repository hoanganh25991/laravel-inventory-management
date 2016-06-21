<?php

use App\Order;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableOrder extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create(Order::TABLE, function (Blueprint $table){
            $table->increments("id");
            $table->timestamps();

            $table->unsignedInteger(Order::ORDER_ID);
            $table->string(Order::ORDER_TYPE);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::drop(Order::TABLE);
    }
}
