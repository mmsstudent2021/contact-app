<?php

namespace App\Traits;

trait CheckLimit
{
    public function checkLimit($request_limit){
        $limit=null;
        if($request_limit){
            $limit = $request_limit;
        }
        else{
            $limit = 10;
        }
        return $limit;
    }
}
