<?php

use App\Role;
use Abstracts\AbstractByDataSeeder;
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
     * model class
     *
     * @return class
     */
    protected function modelClass()
    {
        return Role::class;
    }
}
