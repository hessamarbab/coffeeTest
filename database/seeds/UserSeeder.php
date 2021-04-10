<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends AbstractByDataSeeder
{
    /***
     * return data  need to seed
     */
    protected  function items(){
        return [[
            'name' => 'manager',
            'email' => 'manager@yahoo.com',
            'password' => Hash::make('password'),
            'role_id'=>1
        ]];
    }

    /**
     * give data form
     *
     * @return array
     */
    protected  function format($item,$counterId){
        return array_merge(["id"=>$counterId],$item);
    }
}
