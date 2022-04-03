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
            <div>Galeri Produk
                <div class="page-title-subheading">List Foto Produk
                </div>
            </div>
        </div>
        <div class="page-title-actions">
            <div class="d-inline-block dropdown">
                <a href="{{route('products.index')}}" class="btn btn-outline-warning"> <i class="pe-7s-angle-left-circle"></i> Kembali</a>
                <a href="{{route('gallery.create', 'p='.$product->id)}}" class="btn btn-outline-primary"> <i class="pe-7s-plus"></i> Tambah Foto Produk</a>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">{{$product->name}}</h5>
                <table class="mb-0 table table-striped text-center table-responsive-sm">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Gambar</th>
                            <th>Is Default</th>
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
                                    <img src="{{$item->image}}" alt="{{$product->name}}">
                                </td>
                                <td>
                                    @if ($item->is_default == 1)
                                        <div class="badge badge-warning">YES</div>
                                    @else
                                        <div class="badge badge-danger">NO</div>
                                    @endif
                                </td>
                                <td>
                                    @if ($item->status == 1)
                                        <div class="badge badge-warning">ON</div>
                                    @else
                                        <div class="badge badge-danger">OFF</div>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('gallery.edit',$item->id)}}" class="btn btn-outline-primary" data-toggle="tooltip" data-placement="bottom" title="Edit Gambar">
                                        <i class="pe-7s-pen"></i>
                                    </a>
                                    <form action="{{route('gallery.destroy', $item->id)}}" method="POST" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-outline-danger" data-toggle="tooltip" data-placement="bottom" title="Hapus Gambar">
                                            <i class="pe-7s-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @php
                            $i++
                        @endphp
                        @empty
                            <tr>
                                <td colspan="6"> Data Kosong </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
