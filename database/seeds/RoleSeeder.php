<?php

use App\Role;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{

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
        $counterId=1;
        foreach (Role::types as $type) {
            Role::updateOrCreate(['id'=>$counterId,'type'=>$type]);
            $counterId++;
        }
    }

}
