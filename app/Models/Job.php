<?php

namespace App\Models;

 

class Job 
{
    public static function all()
    {
        return [
            ['title' => 'softwear Engineer','salary'=> '$1000'],
            ['title'=> 'grafic desighner','salary'=> '$2000'],
        ];
    }
}
