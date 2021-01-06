<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    protected $fillable=['title','file'];

    public static function countActivePost(){
        $data=Catalog::count();
        if($data){
            return $data;
        }
        return 0;
    }
}
