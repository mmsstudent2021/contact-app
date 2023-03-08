<?php
namespace App\Services\Transfer;

use App\Http\Resources\TransactionResource;
use App\Models\Transaction;

class TransferHistoryService
{
    public function records(){
        $records = Transaction::
        index()
        ->paginate(10)
        ->withQueryString();
        return TransactionResource::collection($records);
    }
}
