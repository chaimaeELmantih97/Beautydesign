<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable=['title','description','tag'];

    public static function countActivePost(){
        $data=Service::count();
        if($data){
            return $data;
        }
        return 0;
    }
}
