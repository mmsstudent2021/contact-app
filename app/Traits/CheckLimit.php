<?php

namespace App\Traits;

trait CheckLimit
{
    public function checkLimit($requestLimit){
        $limit=null;
        if($requestLimit){
            $limit = $requestLimit;
        }
        else{
            $limit = 10;
        }
        return $limit;
    }
}
