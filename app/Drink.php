<?php

namespace App;

class Drink extends BaseModel{
    const NAME = "name";
    const DES = "des";

    const TABLE = "drink";
    protected $table = self::TABLE;

    public function recipe(){
        return $this->morphMany(Recipe::class, "item");
    }
}
