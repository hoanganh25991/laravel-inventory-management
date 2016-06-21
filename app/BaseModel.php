<?php

namespace App;

use App\Traits\ModelForeignKey;
use App\Traits\ModelIndex;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BaseModel
 * @package App
 * @method static firstOrFail($id)
 */

class BaseModel extends Model{
    use ModelForeignKey;
    use ModelIndex;

//    /**
//     * @param string $column column name
//     * @return string
//     */
//    public function getForeignKeyAt($column){
//        return "{$this->getTable()}_{$column}_foreign";
//    }
}

