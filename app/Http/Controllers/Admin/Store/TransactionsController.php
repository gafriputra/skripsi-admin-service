<?php

namespace App\Http\Controllers\Admin\Store;

use App\Http\Controllers\Controller;
use App\Models\Transaction;

use Illuminate\Http\Request;

class TransactionsController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index(Request $request)
   {
       $status = $request->input('status');
       $items = Transaction::orderBy('id','DESC')->get();

       if ($status) {
            $items = Transaction::where('transaction_status', $status)->orderBy('id', 'DESC')->get();
       }

       return view('pages.admin.transaction.index')->with([
           'items' => $items, 'status' => $status
       ]);
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
       //
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
       //
   }

   /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function show($id)
   {
       $item = Transaction::with('details.product.category')->findOrFail($id);

       return view('pages.admin.transaction.show')->with([
           'item' => $item
       ]);
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function edit($id)
   {
       $item = Transaction::findOrFail($id);

       return view('pages.admin.transaction.edit')->with([
           'item' => $item
       ]);
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, $id)
   {
       $data = $request->all();

       $item = Transaction::findOrFail($id);
       $item->update($data);

       return redirect()->route('transaction.index');
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
       $item = Transaction::findOrFail($id);
       $item->delete();

       return redirect()->route('transaction.index');
   }

   public function setStatus(Request $request)
   {
       $request->validate([
           'status' => 'required|in:PENDING,ONGOING,SHIPPING,SUCCESS,FAILED'
       ]);

       $item = Transaction::findOrFail($request->id);
       $item->transaction_status = $request->status;

       $item->save();

       return redirect()->route('transaction.index', 'status='. $request->status);
   }
}
