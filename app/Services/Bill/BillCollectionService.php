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
        $bills = Billing::index()
        ->latest('id')
        ->paginate($limit)
        ->withQueryString();
        return $bills;
    }


}
