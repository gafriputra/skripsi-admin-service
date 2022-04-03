@extends('layouts.admin')
@section('title','Gallery')
@if(isset($item))
    @php
        $id = $item->id;
        $button = "Update";
        $action = route("gallery.update",$id);
        $image = $item->image;
        $product_id = $item->product_id;
    @endphp
@else
    @php
        $id = false;
        $button = "Tambah";
        $action = route("gallery.store");
        $image = false;
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
            <div>{{$button}} Gallery
                <div class="page-title-subheading">Gallery Produk.
                </div>
            </div>
        </div>
        <div class="page-title-actions">
            <div class="d-inline-block dropdown">
                <a href="{{route('gallery.show', $product_id)}}" class="btn btn-outline-success">List Gallery Produk</a>
            </div>
        </div>
    </div>
</div>
<div class="main-card mb-3 card">
    <div class="card-body">
        <h5 class="card-title">Form Gallery Produk</h5>
        <form class="needs-validation" novalidate action="{{$action}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="product_id" value="{{$product_id}}">
            @if ($id)
                @method('PUT')
                <input type="hidden" name="id" value="{{$id}}">
            @endif
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="validationCustom01">Foto Produk</label>
                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="validationCustom01" placeholder="File Foto" value="{{$image}}">
                    @error('image') <div class="text-muted">{{$message}}</div> @enderror
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="default">Gambar Utama?</label>
                <div class="switch has-switch">
                    <div class="switch-animate switch-on @error('is_default') is-invalid @enderror" onclick="gantiNilai('default')">
                        @if ($id)
                            @if ($item->is_default == 1)
                                <input type="checkbox" id="default" name="is_default" data-toggle="toggle" data-onstyle="primary" value="1" checked>
                            @else
                                <input type="checkbox" id="default" name="is_default" data-toggle="toggle" data-onstyle="primary" value="0">
                            @endif
                        @else
                            <input type="checkbox" id="default" name="is_default" data-toggle="toggle" data-onstyle="primary" value="1" checked>
                        @endif
                        @error('is_default') <div class="text-muted">{{$message}}</div> @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
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
            <button class="btn btn-primary" type="submit">{{$button}} Gallery</button>
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
                }, false);~
            })();
        </script>
    </div>
</div>
@endsection
