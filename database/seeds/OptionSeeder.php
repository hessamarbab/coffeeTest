<?php

use Abstracts\AbstractByDataSeeder;
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
     * model class
     *
     * @return class
     */
    protected function modelClass()
    {
        return Option::class;
    }
}
