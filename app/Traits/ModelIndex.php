<?php
namespace App\Traits;

trait ModelIndex{
    /**
     * @param string $column column name
     * @return string
     */
    public function getUniqueIndexAt($column){
        return "{$this->getTable()}_{$column}_unique";
    }
}