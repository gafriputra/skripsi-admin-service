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
            <div>Dokumen Produk
                <div class="page-title-subheading">List Foto Produk
                </div>
            </div>
        </div>
        <div class="page-title-actions">
            {{-- <button type="button" data-toggle="tooltip" title="Example Tooltip"
                data-placement="bottom" class="btn-shadow mr-3 btn btn-dark">
                <i class="fa fa-star"></i>
            </button> --}}
            <div class="d-inline-block dropdown">
                <a href="{{route('products.index')}}" class="btn btn-outline-warning"> <i class="pe-7s-angle-left-circle"></i> Kembali</a>
                <a href="{{route('document.create', 'p='.$product->id)}}" class="btn btn-outline-primary"> <i class="pe-7s-plus"></i> Tambah Dokumen Produk</a>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title text-capitalize">Dokumen Produk {{$product->name}}</h5>
                <table class="mb-0 table table-striped text-center table-responsive-sm">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Link</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1
                        @endphp
                        @forelse ($items as $item)
                            <tr>
                                <th scope="row">{{$i}}</th>
                                <td>
                                    {{$item->name}}
                                </td>
                                <td>
                                    <a href="{{$item->document_link}}" target="_blank">{{$item->document_link}}</a>
                                </td>
                                <td class="text-uppercase font-weight-bold font-italic">
                                    .{{$item->type}}
                                </td>
                                <td>
                                    @if ($item->status == 1)
                                        <div class="badge badge-warning">ON</div>
                                    @else
                                        <div class="badge badge-danger">OFF</div>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('document.edit',$item->id)}}" class="btn btn-outline-primary" data-toggle="tooltip" data-placement="bottom" title="Edit Dokumen">
                                        <i class="pe-7s-pen"></i>
                                    </a>
                                    <a href="" class="btn btn-outline-danger" data-toggle="tooltip" data-placement="bottom" title="Hapus Dokumen">
                                        <i class="pe-7s-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @php
                            $i++
                        @endphp
                        @empty
                            <tr>
                                <td colspan="5">Belum Ada Dokumen</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
