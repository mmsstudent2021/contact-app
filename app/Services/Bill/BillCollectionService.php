<?php

namespace App\Services\Bill;

use App\Models\Billing;
use App\Traits\CheckLimit;

class BillCollectionService
{
    use CheckLimit;

    public function index($request)
    {
        $limit = $this->checkLimit($request->limit);
        $bills = Billing::
        where('used',$request->used)
        ->where('amount',$request->amount)
        ->latest('id')
        ->paginate($limit)
        ->withQueryString();
        return $bills;
    }


}
