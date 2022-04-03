@extends('layouts.admin')
@section('title','Banner')
@if(isset($item))
    @php
        $id = $item->id;
        $button = "Update";
        $action = route("banners.update",$id);
        $header1 = $item->header1;
        $header2 = $item->header2;
        $caption = $item->caption;
        $link = $item->link;
    @endphp
@else
    @php
        $id = false;
        $button = "Tambah";
        $action = route("banners.store");
        $header1 = false;
        $header2 = false;
        $caption = false;
        $link = false;
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
            <div>{{$button}} Banner
                <div class="page-title-subheading">Banner.
                </div>
            </div>
        </div>
        <div class="page-title-actions">
            <div class="d-inline-block dropdown">
                <a href="{{route('banners.index')}}" class="btn btn-outline-success">List Banner</a>
            </div>
        </div>
    </div>
</div>
<div class="main-card mb-3 card">
    <div class="card-body">
        <h5 class="card-title">Form Banner</h5>
        <form class="needs-validation" novalidate action="{{$action}}" method="POST" enctype="multipart/form-data">
            @csrf
            @if ($id)
                @method('PUT')
                <input type="hidden" name="id" value="{{$id}}">
            @endif
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="header1">Header 1 Banner</label>
                    <input type="text" name="header1"class="form-control @error('header1') is-invalid @enderror" id="header1" placeholder="Header1.." value="{{$header1}}" max="20" required>
                    @error('header1') <div class="text-muted">{{$message}}</div> @enderror
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="header2">Header 2 Banner</label>
                    <input type="text" name="header2"class="form-control @error('header2') is-invalid @enderror" id="header2" placeholder="Header2.." value="{{$header2}}" max="20" required>
                    @error('header2') <div class="text-muted">{{$message}}</div> @enderror
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-12 mb-3">
                    <label for="caption">Caption Banner</label>
                    <input type="text" name="caption"class="form-control @error('caption') is-invalid @enderror" id="caption" placeholder="caption.." value="{{$caption}}" max="50" required>
                    @error('caption') <div class="text-muted">{{$message}}</div> @enderror
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-12 mb-3">
                    <label for="image" class="form-control-label">Gambar Banner</label>
                    <input type="file" name="image" value="{{ old('image') }}" accept="image/*" required
                        class="form-control @error('image') is-invalid @enderror" />
                    @error('image') <div class="text-muted">{{ $message }}</div> @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-12 mb-3">
                    <label for="link">Link Banner</label>
                    <input type="text" name="link"class="form-control @error('link') is-invalid @enderror" id="link" placeholder="link.." value="{{$link}}" required>
                    @error('link') <div class="text-muted">{{$message}}</div> @enderror
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="">Status</label>
                <div class="switch has-switch">
                    <div class="switch-animate switch-on @error('status') is-invalid @enderror" onclick="changeStatus()">
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
            <button class="btn btn-primary" type="submit">{{$button}} Banner</button>
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
