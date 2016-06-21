<?php
namespace App\Traits;
trait ModelForeignKey{
    /**
     * @param string $column column name
     * @return string
     */
    public function getForeignKeyAt($column){
        return "{$this->getTable()}_{$column}_foreign";
    }
}