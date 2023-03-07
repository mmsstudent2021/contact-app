<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    use HasFactory;

    public function scopeIndex($query){
        return $query->select('id','code','amount','user_id as filled_by','used','filled_at')
        ->when(request('used'),function ($q){
            $q->where('used',request('used'));
        })
        ->when(request('amount_type'),function ($q){
            $q->where('amount',request('amount_type'));
        });
    }

}
