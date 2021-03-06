<?php

use App\Option;
use Illuminate\Database\Seeder;

class OptionSeeder extends AbstractByDataSeeder
{
    /**
     * data we need to seed
     *
     * @return array
     */
    protected function items(){
        return [
            'Size',
            'Shots',
            'kind'
        ];
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
        return ['id'=>$counterId,'name'=>$item];
    }
}
