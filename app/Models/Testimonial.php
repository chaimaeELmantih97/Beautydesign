<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable=['name','job','description','photo'];

    public static function countActivePost(){
        $data=Testimonial::count();
        if($data){
            return $data;
        }
        return 0;
    }
}
