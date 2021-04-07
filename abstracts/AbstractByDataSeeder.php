<?php
namespace Abstracts;

use Illuminate\Database\Seeder;

abstract class AbstractByDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(!$this->modelClass()::exists())
        {
            $items=$this->items();
            $this->registerData($items);
        }
    }
    /**
     * create some models according to items data
     *
     *
     * @param array $items
     * @return void
     */
    private function registerData($items){
        $counterId=1;
        foreach ($items as $item) {
            $this->modelClass()::updateOrCreate(['id'=>$counterId,'name'=>$item]);
            $counterId++;
        }
    }
    /***
     * return data you need to seed
     */
    protected abstract function items();
    /**
     * Model class you want to seed
     *
     * @return Class
     */
    protected abstract function modelClass();

}
