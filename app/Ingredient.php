<?php

namespace App;

class Ingredient extends BaseModel{
    const NAME = "name";
    const DES = "des";
    const TABLE = "ingredient";

    protected $table = self::TABLE;
}
