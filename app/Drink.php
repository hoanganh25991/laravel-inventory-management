<?php

namespace App;

class Drink extends BaseModel{
    const NAME = "name";
    const DES = "des";
    const PRICE = "price";

    const TABLE = "drink";
    protected $table = self::TABLE;

    public function recipe(){
        return $this->morphMany(Recipe::class, "item");
    }
    
    public function order(){
        return $this->morphMany(Order::class, "order");
    }
}
