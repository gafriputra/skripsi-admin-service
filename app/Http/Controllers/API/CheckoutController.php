<?php

namespace App\Http\Controllers\API;

use Mail;
use App\Mail\TransactionSuccess;


use App\Http\Controllers\Controller;
use App\Http\Requests\API\CheckoutRequest;
// ambil model
// use App\Models\Product\Product;
use App\Models\Transaction;
use App\Models\TransactionDetail;

class CheckoutController extends Controller
{
    public function checkout(CheckoutRequest $request)
    {
        // dd($request->body);
        // masukkan semua dari transaction_details
        $data = $request->except('transaction_details');
        $data['uuid'] = 'TRX-' . mt_rand(10000, 99999) . mt_rand(100, 999);

        $transaction = Transaction::create($data);

        foreach ($request->transaction_details as $product) {
            $details[] = new TransactionDetail([
                'transaction_id' => $transaction->id,
                'product_id' => $product[0],
                'quantity' => $product[1]
            ]);
            // mengurangi jumlah produk -1
            // Product::find($product_id)->decrement('quantity');
        }
        // nyimpan relasinya, lalu save langsung banyak
        $transaction->details()->saveMany($details);


        $transaction = Transaction::with('details.product.productGalleries')->where('uuid', $data['uuid'])->first();
        // Email
        Mail::to($transaction->email)->send(
            new TransactionSuccess($transaction)
        );

        return ResponseFormatter::success($transaction);
    }
}
