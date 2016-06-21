<?php

namespace App;

class Record extends BaseModel{
    const INGREDIENT_ID = "ingredient_id";
    
    const RECORD_ID = "record_id";
    const RECORD_TYPE = "record_type";

    const QUANITY = "quanity";
    const PRICE = "price";
    const I_E = "i_e";

    const TABLE = "record";
    protected $table = self::TABLE;
    protected $fillable = [
        self::INGREDIENT_ID,
        self::RECORD_TYPE,
        self::RECORD_ID,
        self::QUANITY,
        self::PRICE
    ];
    
    public function record(){
        return $this->morphTo();
    }
}
