<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable=['title','slug','description','tag','photo'];

    public static function countActivePost(){
        $data=Service::count();
        if($data){
            return $data;
        }
        return 0;
    }
}
