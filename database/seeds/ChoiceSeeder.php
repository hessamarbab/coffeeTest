<?php

use Illuminate\Database\Seeder;

class ChoiceSeeder extends AbstractByDataSeeder
{
  /**
     * data we need to seed
     *
     * @return array
     */
    protected function items(){
        return [
            ['name'=>'single','option_id'=>2],
            ['name'=>'double','option_id'=>2],
            ['name'=>'triple','option_id'=>2],
            ['name'=>'small','option_id'=>1],
            ['name'=>'medium','option_id'=>1],
            ['name'=>'large','option_id'=>1],
            ['name'=>'chocolate chip','option_id'=>3],
            ['name'=>'ginger','option_id'=>3]
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
        return ['id'=>$counterId,'name'=>$item['name'],'option_id'=>$item['option_id']];
    }
}
