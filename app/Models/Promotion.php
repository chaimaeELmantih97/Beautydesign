<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $fillable=['title','photo'];

    public static function countActivePost(){
        $data=Promotion::count();
        if($data){
            return $data;
        }
        return 0;
    }
}
