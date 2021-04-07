<?php


use Illuminate\Database\Seeder;

abstract class AbstractByFactorySeeder extends Seeder
{
    /**
     * number of creating products
     *
     * @var integer
     */
    protected $number=1;

    public function __construct()
    {
        $this->modelClass = $this->modelClass();
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(!$this->modelClass()::exists())
        {
            $this->registerData();
        }
    }
    /**
     * create some models according to factory
     *
     *
     * @param array $items
     * @return void
     */
    protected function registerData(){
        for($i=0;$i<$this->number;$i++){
        factory($this->modelClass)->create();
        }
    }
    /**
     * Model class you want to seed
     *
     * @return Class
     */
    protected function modelClass(){
        return 'App\\'.str_replace("Seeder", "", get_called_class());
    }


}
