<?php

namespace App\Http\Resources;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    protected function sender($id) :object
    {
        return User::where('id',$id)->first();
    }
    protected function receiver($id) :object
    {
        return User::where('id',$id)->first();
    }
    protected function statusCheck($status) :string
    {
        return $status = 0 ? 'unsuccessful' : 'successful';
    }
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'sender' => $this->sender($this->sender_id)->name,
            'receiver' => $this->receiver($this->receiver_id)->name,
            'transferred_amount' => $this->transferred_amount,
            'status' => $this->statusCheck(($this->status)),
            'transferred_at' => $this->transferred_at
        ];
    }
}
