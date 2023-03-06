<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\GenerateRequest;
use App\Models\Billing;
use App\Services\Bill\BillCollectionService;
use App\Services\Bill\BillGenerateService;
use Illuminate\Http\Request;

class BillingApiController extends Controller
{
    public function index(Request $request,BillCollectionService $billService)
    {
        return $bills = $billService->index($request);
    }

    public function generate(GenerateRequest $request,BillGenerateService $generateService)
    {
        $createdBills = $generateService->generate($request);
        return $createdBills;
    }
}
