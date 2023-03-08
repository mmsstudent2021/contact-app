<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\GenerateRequest;
use App\Http\Requests\TopUpRequest;
use App\Services\Bill\BillCollectionService;
use App\Services\Bill\BillGenerateService;
use App\Services\Bill\BillTopUpService;
use Illuminate\Http\Request;

class BillingApiController extends Controller
{
    public function index(Request $request,BillCollectionService $bill_service)
    {
        $bills = $bill_service->index($request);
        return response()->json([
            'bills' => $bills,
        ]);
    }

    public function generate(GenerateRequest $request,BillGenerateService $generate_service)
    {
        $created_bills = $generate_service->generate($request);
        return $created_bills;
    }

    public function topUp(TopUpRequest $request,BillTopUpService $top_up)
    {
        $result = $top_up->fill($request);
        return $result;
    }
}
