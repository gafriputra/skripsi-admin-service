<table class="table table-bordered table-striped">
    <tr>
        <th>Nama</th>
        <td>{{$item->name}}</td>
    </tr>
    <tr>
        <th>Email</th>
        <td>{{$item->email}}</td>
    </tr>
    <tr>
        <th>Nomor</th>
        <td>{{$item->phone}}</td>
    </tr>
    <tr>
        <th>Alamat</th>
        <td>{{$item->address}}</td>
    </tr>
    <tr>
        <th>Ongkos Kirim</th>
        <td>Rp. {{number_format($item->shipping, 0, ',', '.')}}</td>
    </tr>
    <tr>
        <th>Total Transaksi (+ tax 10 %)</th>
        <td>Rp. {{number_format($item->transaction_total, 0, ',', '.')}}</td>
    </tr>
    <tr>
        <th>Status Transaksi</th>
        <td>{{$item->transaction_status}}</td>
    </tr>
    <tr>
        <th>Pembelian Produk</th>
        <td>
            <table class="table table-bordered w-100">
                <tr>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                </tr>
                <?php $totalHarga = 0 ?>
                @foreach ($item->details as $detail)
                    @php
                        if ($detail->quantity == 0){
                            $quntity = 1;
                        }else {
                            $quantity = $detail->quantity;
                        }
                        $total = $detail->product->price*$quantity;
                        $totalHarga += $total
                    @endphp
                    <tr>
                        <td>{{$detail->product->name}} (x{{$quantity}})</td>
                        <td>{{$detail->product->category->name}}</td>
                        <td>Rp. {{number_format($total, 0, ',', '.')}}</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="2" class="text-right"><b>Total :</b></td>
                    <td>Rp. {{number_format($totalHarga, 0, ',', '.')}}</td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<div class="row justify-content-end">
     <div class="col-4">
        <a href="{{route('print',$item->id)}}" class="btn btn-warning btn-block" target="_blank">
            <i class="fa fa-check" aria-hidden="true"></i> Print
        </a>
    </div>
    {{--<div class="col-4">
        <a href="{{route('transaction.status',$item->id)}}?status=FAILED" class="btn btn-danger btn-block">
            <i class="fa fa-times" aria-hidden="true"></i> Set Gagal
        </a>
    </div>
    <div class="col-4">
        <a href="{{route('transaction.status',$item->id)}}?status=PENDING" class="btn btn-primary btn-block">
            <i class="fa fa-spinner" aria-hidden="true"></i> Set Pending
        </a>
    </div> --}}
</div>
