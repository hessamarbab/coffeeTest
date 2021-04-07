<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    protected $items = [
        ['id'=>1,'type'=>'manager'],
        ['id'=>2,'type'=>'customer']
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(!Role::exists())
        {
            $this->registerData();
        }
    }
    private function registerData()
    {
        foreach ($this->items as $item) {
            Role::updateOrCreate($item);
        }
    }
}
