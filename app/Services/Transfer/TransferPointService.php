<?php
namespace App\Services\Transfer;

use App\Http\Resources\TransactionResource;
use App\Models\Transaction;
use App\Models\User;
use App\Traits\SingleErrorResponse;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class TransferPointService
{
    use SingleErrorResponse;
    public $invalid;

    //find the receiver
    protected function receipt($receipt)
    {
        $receipt_user = User::where('email',$receipt)->first();
        return $receipt_user ? $receipt_user : $this->invalid = 'email not found';
    }

    //find the sender
    protected function sender()
    {
        return Auth::user();
    }

    //check the balance amount is enough for transfer
    protected function sufficientAmount($amount,$sender)
    {
        return ($sender->points->balance <= $amount) ?
        $this->invalid = "Insufficient amount for balance" :
        $amount;

    }

    //calculation of balance
    protected function balanceProceeding($sender,$receiver,$send_amount)
    {
        $sender->points->balance -= $send_amount;
        $sender->points->save();

        $receiver->points->balance += $send_amount;
        $receiver->points->save();
    }

    //transfer process
    public function proceeding($request)
    {
        $receiver = $this->receipt($request->receipt);
        $sender = $this->sender();
        $send_amount = $this->sufficientAmount($request->amount,$sender);

        if($this->invalid)
        {
            return $this->eMessage($this->invalid,400);
        }

        DB::beginTransaction();
        try
        {
            $this->balanceProceeding($sender,$receiver,$send_amount);

            $trans = Transaction::create([
                'sender_id' => $sender->id,
                'receiver_id' => $receiver->id,
                'transferred_amount' => $send_amount,
                'status' => 1,
                'transferred_at' => Date::now()
            ]);

            DB::commit();

            return response()->json([
                'transfer' => new TransactionResource($trans)
            ]);
        }
        catch(\Exception $e)
        {
            Db::rollBack();
            throw $e;
        }
    }
}
