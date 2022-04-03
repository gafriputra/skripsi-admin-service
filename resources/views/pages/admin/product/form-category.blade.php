@extends('layouts.admin')
@section('title','Kategori')
@if(isset($item))
    @php
        $id = $item->id;
        $button = "Update";
        $action = route("product-categories.update",$id);
        $name = $item->name;
        $deskripsi = $item->description;
    @endphp
@else
    @php
        $id = false;
        $button = "Tambah";
        $action = route("product-categories.store");
        $name = false;
        $deskripsi = false;
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
            <div>{{$button}} Kategori
                <div class="page-title-subheading">Kategori Produk.
                </div>
            </div>
        </div>
        <div class="page-title-actions">
            <div class="d-inline-block dropdown">
                <a href="{{route('product-categories.index')}}" class="btn btn-outline-success">List Kategori Produk</a>
            </div>
        </div>
    </div>
</div>
<div class="main-card mb-3 card">
    <div class="card-body">
        <h5 class="card-title">Form Kategori Produk</h5>
        <form class="needs-validation" novalidate action="{{$action}}" method="POST">
            @csrf
            @if ($id)
                @method('PUT')
                <input type="hidden" name="id" value="{{$id}}">
            @endif
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="validationCustom01">Nama Kategori</label>
                    <input type="text" name="name"class="form-control @error('name') is-invalid @enderror" id="validationCustom01" placeholder="Nama.." value="{{$name}}" required>
                    @error('name') <div class="text-muted">{{$message}}</div> @enderror
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-12 mb-3">
                    <label for="validationCustom03">Deskripsi Kategori</label>
                    <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" id="validationCustom03" placeholder="Deskripsi.." value="{{$deskripsi}}" required>
                    @error('description') <div class="text-muted">{{$message}}</div> @enderror
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
            <button class="btn btn-primary" type="submit">{{$button}} Kategori</button>
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
{{-- <div class="main-card mb-3 card">
    <div class="card-body">
        <h5 class="card-title">Bootstrap 4 Form Validation</h5>
        <form class="needs-validation" novalidate>
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="validationCustom01">First name</label>
                    <input type="text" class="form-control" id="validationCustom01" placeholder="First name" value="Mark" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="validationCustom02">Last name</label>
                    <input type="text" class="form-control" id="validationCustom02" placeholder="Last name" value="Otto" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="validationCustomUsername">Username</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupPrepend">@</span>
                        </div>
                        <input type="text" class="form-control" id="validationCustomUsername" placeholder="Username" aria-describedby="inputGroupPrepend" required>
                        <div class="invalid-feedback">
                            Please choose a username.
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="validationCustom03">City</label>
                    <input type="text" class="form-control" id="validationCustom03" placeholder="City" required>
                    <div class="invalid-feedback">
                        Please provide a valid city.
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="validationCustom04">State</label>
                    <input type="text" class="form-control" id="validationCustom04" placeholder="State" required>
                    <div class="invalid-feedback">
                        Please provide a valid state.
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="validationCustom05">Zip</label>
                    <input type="text" class="form-control" id="validationCustom05" placeholder="Zip" required>
                    <div class="invalid-feedback">
                        Please provide a valid zip.
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                    <label class="form-check-label" for="invalidCheck">
                        Agree to terms and conditions
                    </label>
                    <div class="invalid-feedback">
                        You must agree before submitting.
                    </div>
                </div>
            </div>
            <button class="btn btn-primary" type="submit">Submit form</button>
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
<div class="main-card mb-3 card">
    <div class="card-body">
        <h5 class="card-title">Tooltips Validation</h5>
        <form class="needs-validation" novalidate>
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="validationTooltip01">First name</label>
                    <input type="text" class="form-control" id="validationTooltip01" placeholder="First name" value="Mark" required>
                    <div class="valid-tooltip">
                        Looks good!
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="validationTooltip02">Last name</label>
                    <input type="text" class="form-control" id="validationTooltip02" placeholder="Last name" value="Otto" required>
                    <div class="valid-tooltip">
                        Looks good!
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="validationTooltipUsername">Username</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="validationTooltipUsernamePrepend">@</span>
                        </div>
                        <input type="text" class="form-control" id="validationTooltipUsername" placeholder="Username" aria-describedby="validationTooltipUsernamePrepend" required>
                        <div class="invalid-tooltip">
                            Please choose a unique and valid username.
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="validationTooltip03">City</label>
                    <input type="text" class="form-control" id="validationTooltip03" placeholder="City" required>
                    <div class="invalid-tooltip">
                        Please provide a valid city.
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="validationTooltip04">State</label>
                    <input type="text" class="form-control" id="validationTooltip04" placeholder="State" required>
                    <div class="invalid-tooltip">
                        Please provide a valid state.
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="validationTooltip05">Zip</label>
                    <input type="text" class="form-control" id="validationTooltip05" placeholder="Zip" required>
                    <div class="invalid-tooltip">
                        Please provide a valid zip.
                    </div>
                </div>
            </div>
            <button class="btn btn-primary" type="submit">Submit form</button>
        </form>
    </div>
</div> --}}
@endsection
