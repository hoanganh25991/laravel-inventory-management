<?php

namespace App;

class Recipe extends BaseModel{
    const RECIPE_ID = "item_id";
    const RECIPE_TYPE = "item_type";

    const INGREDIENT_ID = "ingredient_id";

    const QUANITY = "quanity";

    const TABLE = "recipe";
    protected $table = self::TABLE;

    public function recipe(){
        return $this->morphTo();
    }
}
