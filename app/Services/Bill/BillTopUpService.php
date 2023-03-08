<?php
namespace App\Services\Bill;

use App\Models\Billing;
use App\Traits\GetPoint;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Mockery\Expectation;

class BillTopUpService
{
    use GetPoint;
    public $success;
    public function checkUsed($bill)
    {
        try
        {
            $used = $bill->used;
            if($used === 0)
            {
                return $bill;
            }
            else
            {
                $this->success = false;
                throw new Exception('The Top Up is pin already used!');
            }
        }
        catch (Exception $e) {
            return  $this->invalidFeedback($e->getMessage(),400);
        }
    }

    protected function checkCode($code)
    {
       try
       {
        $bill = Billing::where('code',$code)->first();
        if($bill)
        {
         $this->success = true;
         return $this->checkUsed($bill);

        }
        else{
            $this->success = false;
            throw new Exception('the code you put is invalid');
        }
       }
       catch (Exception $e)
       {
        return  $this->invalidFeedback($e->getMessage(),400);
       }
    }

    protected function invalidFeedback($message,$code)
    {
        return response()->json(['bill' => $message],$code);
    }

    protected function addTopUp($amount,$balance)
    {
        $result = $balance += $amount;
        return $result;
    }

    public function fill($request)
    {
        $bill = $this->checkCode($request->code);
        $user_point = $this->getUser(Auth::user()->id);
        if($this->success == false){
            return $bill;
        }
        $bill_amount = $bill->amount;
        $user_balance =  $user_point->balance;

        DB::beginTransaction();
        try
        {
            $added = $this->addTopUp($bill_amount,$user_balance);

            $user_point->balance = $added;
            $user_point->update();

            $bill->used = 1;
            $bill->user_id = Auth::user()->id;
            $bill->filled_at = Date::now();
            $bill->update();

            $this->success = true;
            DB::commit();
            return response()->json(['bill' => "Top up amount " . $bill_amount . " was added to your point"]);
        }
        catch(\Exception $error)
        {
            DB::rollBack();
        }
    }

}
