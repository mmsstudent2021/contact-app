<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Transaction extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['sender_id','receiver_id','transferred_amount','status','transferred_at'];

    public function scopeIndex($query){

        return $query
        ->when(request('type') == 'send' ,function($q)
        {
            $q->where('sender_id',Auth::user()->id);
        })
        ->when(request('type') == 'receive' ,function($q)
        {
            $q->where('receiver_id',Auth::user()->id);
        });
    }
}
