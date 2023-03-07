<?php

namespace App\Traits;

use App\Models\Point;

trait GetPoint
{
    public function getUser($id){
        return Point::where('user_id',$id)->first();
    }
}
