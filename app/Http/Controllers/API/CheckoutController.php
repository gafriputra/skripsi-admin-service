<?php

namespace App\Http\Controllers\API;



use App\Http\Controllers\Controller;
use App\Http\Mail\TransactionSuccess;
use App\Http\Requests\API\CheckoutRequest;
// ambil model
// use App\Models\Product\Product;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    public function checkout(Request $request)
    {
        // masukkan semua dari transaction_details
        $data = $request->except('transaction_details');
        $data['uuid'] = 'TRX-' . mt_rand(10000, 99999) . mt_rand(100, 999);
        $data['shipping'] = 0 ;
        $data['status'] = 'order';

        DB::beginTransaction();
        try {
            $transaction = Transaction::create($data);
            foreach ($request->transaction_details as $product) {
                $details[] = new TransactionDetail([
                    'transaction_id' => $transaction->id,
                    'product_id' => $product['product_id'],
                    'quantity' => $product['qty']
                ]);
            }
            // nyimpan relasinya, lalu save langsung banyak
            $transaction->details()->saveMany($details);
            $transaction = Transaction::with('details.product.galleries')->where('uuid', $data['uuid'])->first();
            // Email
            try {
                Mail::to($transaction->email)->send(
                    new TransactionSuccess($transaction)
                );
            } catch (\Throwable $th) {
                $transaction->error = $th->getMessage();
            }
            DB::commit();
            return ResponseFormatter::success($transaction);
        } catch (\Throwable $th) {
            DB::rollBack();
            return ResponseFormatter::error($th->getMessage(), 'error', 500);
        }

    }
}
