<?php
namespace App\Services\Bill;

use App\Models\Billing;
use Illuminate\Support\Facades\DB;

class BillGenerateService
{

    protected function checkUnique($code)
    {
        $result=$code;
        while (DB::table('billings')->where('code', $code)->exists()) {
            // if the number already exists, generate a new one
            $result = $code . mt_rand(1000, 9999);
        }
        return $result;
    }

    protected function checkPrefix($type)
    {
        $prefix = null;
        if($type = 1000){
            $prefix = 10;
        }
        else if($type = 3000){
            $prefix = 30;
        }
        else if($type = 5000){
            $prefix = 50;
        }
        return $prefix;
    }

    public function generate($request)
    {
        $count = $request->count;
        $collection = [];
        $prefix = $this->checkPrefix($request->amount_type);
        for($i = 0; $i <= $count;$i++){
            $code = $prefix . mt_rand(1000, 9999);
            $billCode = $this->checkUnique($code);
            $collection[$i]['code'] = $billCode;
            $collection[$i]['amount'] = $request->amount_type;
        }
        $bills = Billing::insert($collection);
        return response()->json([
            'message' => "bills are generated successfully"
        ]);
    }
}
