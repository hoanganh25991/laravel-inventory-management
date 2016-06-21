<?php

namespace App;

class Record extends BaseModel{
    const ITEM_ID = "item_id";
    const ITEM_TYPE = "item_type";
    
    const INGREDIENT_ID = "ingredient_id";
    
    const RECORD_ID = "record_id";
    const RECORD_TYPE = "record_type";

    const QUANITY = "quanity";
    const PRICE = "price";
    const I_E = "i_e";

    const TABLE = "record";
    protected $table = self::TABLE;
}
