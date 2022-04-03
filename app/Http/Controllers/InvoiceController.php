<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index(Request $request)
    {
        $uuid = $request->input('uuid');
        $email = $request->input('email');

        return view('pages.cp.invoice');
    }

    public function tampil(Request $request)
   {
       $uuid = $request->input('noInvoice');
       $email = $request->input('email');
       $item = Transaction::with('details.product.category')->where(['uuid' => $uuid, 'email'=> $email])->first();

       if ($item) {
        //    dd($item);
           return view('pages.admin.transaction.show')->with([
               'item' => $item
           ]);
       }else{
           echo "<h1>Data Tidak Ada</h1>";
       }

   }
}
