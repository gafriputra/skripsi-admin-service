<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class PdfController extends Controller
{
    public function print($id)
    {
       $item = Transaction::with('details.product.category')->find($id);

        $pdf = PDF::loadview('pages.admin.transaction.print', ['item'=>$item])->setPaper('A4','landscape');
        return $pdf->stream('invoice '.$item->uuid.'.pdf');
    }
}
