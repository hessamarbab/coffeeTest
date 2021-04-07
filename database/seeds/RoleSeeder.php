<?php

use App\Role;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Seeder;

class RoleSeeder extends AbstractByDataSeeder
{

    /**
     * data we need to seed
     *
     * @return array
     */
    protected function items(){
        return $this->modelClass()::types;
    }
     /**
     *  gave data structure
     *
     * @param array $item
     * @param integer $counterId
     * @return array
     */
    protected function format($item,$counterId)
    {
        return ['id'=>$counterId,'type'=>$item];
    }
}
