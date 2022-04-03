@extends('layouts.admin')
@section('title','Documents')
@if(isset($item))
    @php
        $id = $item->id;
        $button = "Update";
        $action = route("document.update",$id);
        $name = $item->name;
        $document_link = $item->document_link;
        $typeFile = $item->type;
        $product_id = $item->product_id;
    @endphp
@else
    @php
        $id = false;
        $button = "Tambah";
        $action = route("document.store");
        $name = false;
        $document_link = false;
        $typeFile = false;
    @endphp
@endif
@php
    $itemType = ["pdf","doc","ppt","excel"]
@endphp
@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="lnr-picture text-danger">
                </i>
            </div>
            <div>{{$button}} Document
                <div class="page-title-subheading">Document Produk.
                </div>
            </div>
        </div>
        <div class="page-title-actions">
            <div class="d-inline-block dropdown">
                <a href="{{route('document.show', $product_id)}}" class="btn btn-outline-success">List Document Produk</a>
            </div>
        </div>
    </div>
</div>
<div class="main-card mb-3 card">
    <div class="card-body">
        <h5 class="card-title">Form Document Produk</h5>
        <form class="needs-validation" novalidate action="{{$action}}" method="POST">
            @csrf
            <input type="hidden" name="product_id" value="{{$product_id}}">
            @if ($id)
                @method('PUT')
                <input type="hidden" name="id" value="{{$id}}">
            @endif
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="validationCustom01">Nama Document</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="validationCustom01" placeholder="Nama File Document" value="{{$name}}">
                    @error('name') <div class="text-muted">{{$message}}</div> @enderror
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="validationCustom01">Link Document</label>
                    <input type="text" name="document_link" class="form-control @error('document_link') is-invalid @enderror" id="validationCustom01" placeholder="Link File Document" value="{{$document_link}}">
                    @error('document_link') <div class="text-muted">{{$message}}</div> @enderror
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="exampleCustomSelect" class="">Type File</label>
                    <select type="select" id="exampleCustomSelect" name="type" class="custom-select">
                        @foreach ($itemType as $tipe)
                            @if ($tipe == $typeFile)
                                <option class="text-capitalize" value="{{$tipe}}" selected>{{$tipe}}</option>
                            @else
                                <option class="text-capitalize" value="{{$tipe}}">{{$tipe}}</option>
                            @endif
                        @endforeach
                    </select>
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
            <button class="btn btn-primary" type="submit">{{$button}} Document</button>
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
