<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TransferRequest;
use App\Services\Transfer\TransferHistoryService;
use App\Services\Transfer\TransferPointService;

class TransferApiController extends Controller
{
    public function transfer(TransferRequest $request,TransferPointService $transfer)
    {
       return $transfer->proceeding($request);
    }

    public function history(TransferHistoryService $history)
    {
        return $history->records();
    }
}
