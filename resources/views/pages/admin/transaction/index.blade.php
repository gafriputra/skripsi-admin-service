@extends('layouts.admin')
@section('title','Produk')
@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
                </i>
            </div>
            <div>Transaksi
                <div class="page-title-subheading">List Transaksi
                </div>
            </div>
        </div>
        <div class="page-title-actions">
            {{-- <button type="button" data-toggle="tooltip" title="Example Tooltip"
                data-placement="bottom" class="btn-shadow mr-3 btn btn-dark">
                <i class="fa fa-star"></i>
            </button> --}}
            <div class="d-inline-block dropdown">
                <button type="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false" class="btn-shadow dropdown-toggle btn btn-info">
                    <span class="btn-icon-wrapper pr-2 opacity-7">
                        <i class="fa fa-business-time fa-w-20"></i>
                    </span>
                    Filter
                </button>
                <div tabindex="-1" role="menu" aria-hidden="true"
                    class="dropdown-menu dropdown-menu-right">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a href="javascript:void(0);" class="nav-link">
                                <i class="nav-link-icon lnr-inbox"></i>
                                <span>
                                    Inbox
                                </span>
                                <div class="ml-auto badge badge-pill badge-secondary">86</div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:void(0);" class="nav-link">
                                <i class="nav-link-icon lnr-book"></i>
                                <span>
                                    Book
                                </span>
                                <div class="ml-auto badge badge-pill badge-danger">5</div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:void(0);" class="nav-link">
                                <i class="nav-link-icon lnr-picture"></i>
                                <span>
                                    Picture
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a disabled href="javascript:void(0);" class="nav-link disabled">
                                <i class="nav-link-icon lnr-file-empty"></i>
                                <span>
                                    File Disabled
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h4 class="box-title">Daftar Transaksi Barang</h4>
                <caption>Transaction Status : <span class="btn-shadow btn btn-info text-uppercase">{{$status ? $status : 'ALL'}}</span></caption>
                <div class="table-stats order-table ov-h mt-3">
                    <table class="table table-striped text-center table-responsive-sm ">
                        <thead>
                            <tr>
                                <th class="serial">#</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Tanggal</th>
                                <th>Total Transaksi</th>
                                <th>Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($items as $item)
                            <tr>
                                <td class="serial">{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{date_format($item->created_at,"d M Y")}}</td>
                                <td>Rp. {{number_format($item->transaction_total, 0, ',', '.')}}</td>
                                <td>
                                    @if($item->transaction_status == 'PENDING')
                                        <span class="badge badge-primary">
                                    @elseif($item->transaction_status == 'ONGOING')
                                        <span class="badge badge-secondary">
                                    @elseif($item->transaction_status == 'SHIPPING')
                                        <span class="badge badge-info">
                                    @elseif($item->transaction_status == 'SUCCESS')
                                        <span class="badge badge-warning">
                                    @elseif($item->transaction_status == 'FAILED')
                                        <span class="badge badge-danger">
                                    @else
                                        <span>
                                    @endif
                                        {{$item->transaction_status}}
                                        </span>
                                </td>
                                <td class="text-center">
                                    @if($status)
                                        @if($item->transaction_status == 'PENDING')
                                            <a href="{{route('transactionStatus', 'id='.$item->id)}}&status=ONGOING" class="btn btn-outline-secondary btn-sm">
                                                <i class="fa fa-check" aria-hidden="true"></i>
                                            </a>
                                            <a href="{{route('transactionStatus', 'id='.$item->id)}}&status=FAILED" class="btn btn-outline-danger btn-sm">
                                                <i class="fa fa-times" aria-hidden="true"></i>
                                            </a>
                                        @elseif($item->transaction_status == 'ONGOING')
                                            <a href="{{route('transactionStatus', 'id='.$item->id)}}&status=SHIPPING" class="btn btn-outline-info btn-sm">
                                                <i class="fa fa-check" aria-hidden="true"></i>
                                            </a>
                                        @elseif($item->transaction_status == 'SHIPPING')
                                            <a href="{{route('transactionStatus', 'id='.$item->id)}}&status=SUCCESS" class="btn btn-outline-warning btn-sm">
                                                <i class="fa fa-check" aria-hidden="true"></i>
                                            </a>

                                        @endif
                                    @endif
                                    <a href="#mymodal"
                                        data-remote="{{ route('transaction.show', $item->id) }}"
                                        data-toggle="modal"
                                        data-target="#mymodal"
                                        data-title="Detail Transaksi {{ $item->uuid }}"
                                        class="btn btn-outline-info btn-sm btnTRX">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{ route('transaction.edit', $item->id) }}" class="btn btn-outline-primary btn-sm">
                                        <i class="pe-7s-pen"></i>
                                      </a>
                                    {{-- <form action="{{route('transaction.destroy',$item->id)}}" method="POST"
                                        class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i></button>
                                    </form> --}}
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center p-5">Data Kosong</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('after-script')
    {{-- ajax secara otomatis --}}
    <script>
        jQuery(document).ready(function($){

            $('.btnTRX').on('click', function() {
                    const url = $(this).data("remote");
                    const button_title = $(this).data("title");
                    let modal = $('#mymodal');

                    $.ajax({
                        url: url,
                        type: 'get',
                        success: function(e) {
                            console.log(e);
                            modal.find('.modal-body').html(e);
                            modal.find('.modal-title').html(button_title);
                        }
                    });

                });
        });
    </script>

    <div class="modal" id="mymodal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Data</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <i class="fa fa-spinner fa-spin"></i>
                </div>
            </div>
        </div>
    </div>
@endpush
