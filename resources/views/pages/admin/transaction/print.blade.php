<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Transaction {{$item->uuid}}</title>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <style>
        html {
            font-family: sans-serif;
            line-height: 1.15;
            -webkit-text-size-adjust: 100%;
            -webkit-tap-highlight-color: rgba(0, 0, 0, 0); }

                    #invoice{
                padding: 30px;
            }

            .invoice {
                position: relative;
                background-color: #FFF;
                min-height: 680px;
                padding: 15px
            }

            .invoice header {
                padding: 10px 0;
                margin-bottom: 20px;
                border-bottom: 1px solid #3989c6
            }

            .invoice .company-details {
                text-align: right
            }

            .invoice .company-details .name {
                margin-top: 0;
                margin-bottom: 0
            }

            .invoice .contacts {
                margin-bottom: 20px
            }

            .invoice .invoice-to {
                text-align: left
            }

            .invoice .invoice-to .to {
                margin-top: 0;
                margin-bottom: 0
            }

            .invoice .invoice-details {
                text-align: right
            }

            .invoice .invoice-details .invoice-id {
                margin-top: 0;
                color: #3989c6
            }

            .invoice main {
                padding-bottom: 50px
            }

            .invoice main .thanks {
                margin-top: -100px;
                font-size: 2em;
                margin-bottom: 50px
            }

            .invoice main .notices {
                padding-left: 6px;
                border-left: 6px solid #3989c6
            }

            .invoice main .notices .notice {
                font-size: 1.2em
            }

            .invoice table {
                width: 100%;
                border-collapse: collapse;
                border-spacing: 0;
                margin-bottom: 20px
            }

            .invoice table td,.invoice table th {
                padding: 15px;
                background: #eee;
                border-bottom: 1px solid #fff
            }

            .invoice table th {
                white-space: nowrap;
                font-weight: 400;
                font-size: 16px
            }

            .invoice table td h3 {
                margin: 0;
                font-weight: 400;
                color: #3989c6;
                font-size: 1.2em
            }

            .invoice table .qty,.invoice table .total,.invoice table .unit {
                text-align: right;
                font-size: 1.2em
            }

            .invoice table .no {
                color: #fff;
                font-size: 1.6em;
                background: #3989c6
            }

            .invoice table .unit {
                background: #ddd
            }

            .invoice table .total {
                background: #3989c6;
                color: #fff
            }

            .invoice table tbody tr:last-child td {
                border: none
            }

            .invoice table tfoot td {
                background: 0 0;
                border-bottom: none;
                white-space: nowrap;
                text-align: right;
                padding: 10px 20px;
                font-size: 1.2em;
                border-top: 1px solid #aaa
            }

            .invoice table tfoot tr:first-child td {
                border-top: none
            }

            .invoice table tfoot tr:last-child td {
                color: #3989c6;
                font-size: 1.4em;
                border-top: 1px solid #3989c6
            }

            .invoice table tfoot tr td:first-child {
                border: none
            }

            .invoice footer {
                width: 100%;
                text-align: center;
                color: #777;
                border-top: 1px solid #aaa;
                padding: 8px 0
            }

            @media print {
                .invoice {
                    font-size: 11px!important;
                    overflow: hidden!important
                }

                .invoice footer {
                    position: absolute;
                    bottom: 10px;
                    page-break-after: always
                }

                .invoice>div:last-child {
                    page-break-before: always
                }
            }
    </style>
</head>
<body>

    <div id="invoice">
        <div class="invoice overflow-auto">
            <div style="min-width: 600px">
                <header>
                    <div class="row">
                        <div class="col-8">
                            <a target="_blank" href="https://gafri.id/">
                                <img src="https://gafri.id/wp-content/uploads/2020/05/logo-biru-removebg-preview.png" data-holder-rendered="true" />
                                </a>
                        </div>
                        <div class="col-4 company-details">
                            <h2 class="name">
                                <a target="_blank" href="{{url('/')}}">
                                Mitrabakti
                                </a>
                            </h2>
                            <div>JL. Brigjen Katamso 4, Waru</div>
                            <div>+62 838 3011 6257</div>
                            <div>gafri.putra@gmail.com</div>
                        </div>
                    </div>
                </header>
                <main>
                    <div class="row contacts">
                        <div class="col-6 invoice-to">
                            <div class="text-gray-light">INVOICE TO:</div>
                            <h2 class="to">{{$item->name}}</h2>
                            <div class="address">{{$item->address}}</div>
                            <div class="email"><a href="mailto:{{$item->email}}">{{$item->email}}</a></div>
                        </div>
                        <div class="col-6 invoice-details">
                            <h1 class="invoice-id">{{$item->uuid}}</h1>
                            <div class="date">Date of Invoice: {{$item->created_at}}</div>
                        </div>
                    </div>
                    <table border="0" cellspacing="0" cellpadding="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th class="text-left">Nama Barang</th>
                                <th class="text-right">Harga</th>
                                <th class="text-right">Jumlah</th>
                                <th class="text-right">TOTAL</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $totalHarga = 0; $i = 1 ;?>
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
                                    <td class="no">{{$i++}}</td>
                                    <td class="text-left">
                                        <h3>
                                            {{$detail->product->name}}
                                        </h3>
                                        <p>
                                            {{$detail->product->category->name}}
                                        </p>
                                    </td>
                                    <td class="unit">Rp. {{number_format($detail->product->price, 0, ',', '.')}}</td>
                                    <td class="qty">{{$quantity}} pcs.</td>
                                    <td class="total">Rp. {{number_format($total, 0, ',', '.')}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="2"></td>
                                    <td colspan="2">SUBTOTAL + TAX 10 %</td>
                                    <td>Rp. {{number_format($item->transaction_total, 0, ',', '.')}}</td>
                                </tr>
                                <tr>
                                    <td colspan="2"></td>
                                    <td colspan="2">SHIPPING</td>
                                    <td> Rp. {{number_format($item->shipping, 0, ',', '.')}}</td>
                                </tr>
                                <tr>
                                    <td colspan="2"></td>
                                    <td colspan="2">GRAND TOTAL</td>
                                    <td>Rp. {{number_format($item->transaction_total + $item->shipping, 0, ',', '.')}}</td>
                                </tr>
                            </tfoot>
                    </table>
                    <div class="thanks">Thank you!</div>
                    <div class="notices">
                        <div>NOTICE:</div>
                        <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
                    </div>
                </main>
                <footer>
                    Invoice was created on a computer and is valid without the signature and seal.
                </footer>
            </div>
            <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
            <div></div>
        </div>
    </div>

    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
</body>
</html>
