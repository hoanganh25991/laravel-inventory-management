<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model{
    const ORDER_ID = "order_id";
    const ORDER_TYPE = "order_type";

    const TABLE = "order";
    protected $table = self::TABLE;
    
    public function order(){
        /** morph to a type of drink */
        return $this->morphTo();
    }
}
