@extends('layouts.admin')
@section('title','Produk')
@if(isset($item))
    @php
        $id = $item->id;
        $button = "Update";
        $action = route("products.update",$id);
        $name = $item->name;
        $deskripsi = $item->description;
        $price = $item->price;
        $categoryId = $item->category_id;
    @endphp
@else
    @php
        $id = false;
        $button = "Tambah";
        $action = route("products.store");
        $name = false;
        $deskripsi = false;
        $price = false;
        $categoryId = false;
    @endphp
@endif
@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="lnr-picture text-danger">
                </i>
            </div>
            <div>{{$button}} Produk
                <div class="page-title-subheading">Produk.
                </div>
            </div>
        </div>
        <div class="page-title-actions">
            <div class="d-inline-block dropdown">
                <a href="{{route('products.index')}}" class="btn btn-outline-success">List Produk</a>
            </div>
        </div>
    </div>
</div>
<div class="main-card mb-3 card">
    <div class="card-body">
        <h5 class="card-title">Form Produk</h5>
        <form class="needs-validation" novalidate action="{{$action}}" method="POST">
            @csrf
            @if ($id)
                @method('PUT')
                <input type="hidden" name="id" value="{{$id}}">
            @endif
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="exampleCustomSelect" class="">Kategori Produk</label>
                    <select type="select" id="exampleCustomSelect" name="category_id" class="custom-select">
                        @forelse ($itemCategory as $item)
                            @if ($item->id == $categoryId)
                                <option value="{{$item->id}}" selected>{{$item->name}}</option>
                            @else
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endif
                        @empty
                            <option aria-readonly="true">Kategory Kosong</option>
                        @endforelse
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-12 mb-3">
                    <label for="validationCustom01">Nama Produk</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="validationCustom01" placeholder="Nama.." value="{{$name}}" required>
                    @error('name') <div class="text-muted">{{$message}}</div> @enderror
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-12 mb-3">
                    <label for="description">Deskripsi </label>
                    <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" required >{{$deskripsi}}</textarea>
                    @error('description') <div class="text-muted">{{$message}}</div> @enderror
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="price">Harga Produk</label>
                    <input type="number" name="price"class="form-control @error('price') is-invalid @enderror" id="price" placeholder="Harga.." value="{{$price}}" required>
                    @error('price') <div class="text-muted">{{$message}}</div> @enderror
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="">Status</label>
                <div class="switch has-switch">
                    <div class="switch-animate switch-on @error('status') is-invalid @enderror" onclick="gantiNilai('status')">
                        @if ($id)
                            @if ($item->status == 1)
                                <input type="checkbox" id="status" name="status" data-toggle="toggle" data-onstyle="primary" value="1" checked>
                            @else
                                <input type="checkbox" id="status" name="status" data-toggle="toggle" data-onstyle="primary" value="0">
                            @endif
                        @else
                            <input type="checkbox" id="status" name="status" data-toggle="toggle" data-onstyle="primary" value="1" checked>
                        @endif
                        @error('status') <div class="text-muted">{{$message}}</div> @enderror
                    </div>
                </div>
            </div>
            <button class="btn btn-primary" type="submit">{{$button}} </button>
        </form>

        <script>

            // Example starter JavaScript for disabling form submissions if there are invalid fields
            (function() {
                'use strict';
                window.addEventListener('load', function() {
                    // Fetch all the forms we want to apply custom Bootstrap validation styles to
                    var forms = document.getElementsByClassName('needs-validation');
                    // Loop over them and prevent submission
                    var validation = Array.prototype.filter.call(forms, function(form) {
                        form.addEventListener('submit', function(event) {
                            if (form.checkValidity() === false) {
                                event.preventDefault();
                                event.stopPropagation();
                            }
                            form.classList.add('was-validated');
                        }, false);
                    });
                }, false);
            })();
        </script>
    </div>
</div>
@endsection
