<?php

namespace App\Services\Point;

use App\Models\Point;

class PointCreateService
{
    public function create($id)
    {
        $point = new Point();
        $point->balance = 0 ;
        $point->user_id = $id;
        $point->save();

        return $point;
    }
}
