@extends('layouts.admin')
@section('title','Web Setting')
@section('content')
<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="lnr-picture text-danger">
                </i>
            </div>
            <div>Web Setting
                <div class="page-title-subheading">Web Setting.
                </div>
            </div>
        </div>
    </div>
</div>
<div class="main-card mb-3 card">
    <div class="card-body">
        <h5 class="card-title">Form Web Setting</h5>
        <form class="needs-validation" novalidate action="{{route('setting.update', $item->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{$item->id}}">
            <div class="form-row">
                <div class="col-md-12 mb-3">
                    <label for="slogan">Slogan</label>
                    <input type="text" name="slogan"class="form-control @error('slogan') is-invalid @enderror" id="slogan" placeholder="slogan.." value="{{$item->slogan}}" max="20" required>
                    @error('slogan') <div class="text-muted">{{$message}}</div> @enderror
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-12 mb-3">
                    <label for="email">Contact Email</label>
                    <input type="text" name="email"class="form-control @error('email') is-invalid @enderror" id="email" placeholder="email.." value="{{$item->email}}" max="20" required>
                    @error('email') <div class="text-muted">{{$message}}</div> @enderror
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-12 mb-3">
                    <label for="phone">Phone Number</label>
                    <input type="text" name="phone"class="form-control @error('phone') is-invalid @enderror" id="phone" placeholder="phone.." value="{{$item->phone}}" max="50" required>
                    @error('phone') <div class="text-muted">{{$message}}</div> @enderror
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="image" class="form-control-label">Logo</label>
                    <input type="file" name="image" value="{{ old('image') }}" accept="image/*" required
                        class="form-control @error('image') is-invalid @enderror" />
                    @error('image') <div class="text-muted">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-6 mb-3">
                        <img src="{{url('storage/',$item->image)}}" height="80px" alt="Logo Perusahaan">
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-12 mb-3">
                    <label for="description">Deskripsi</label>
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" placeholder="description..">{{$item->description}}</textarea>
                    @error('description') <div class="text-muted">{{$message}}</div> @enderror
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-12 mb-3">
                    <label for="address">address setting</label>
                    <input type="text" name="address"class="form-control @error('address') is-invalid @enderror" id="address" placeholder="address.." value="{{$item->address}}" required>
                    @error('address') <div class="text-muted">{{$message}}</div> @enderror
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-12 mb-3">
                    <label for="store_link">Link Toko</label>
                    <input type="text" name="store_link"class="form-control @error('store_link') is-invalid @enderror" id="store_link" placeholder="store_link.." value="{{$item->store_link}}" required>
                    @error('store_link') <div class="text-muted">{{$message}}</div> @enderror
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-12 mb-3">
                    <label for="google_maps">Google Maps</label>
                    <input type="text" name="google_maps"class="form-control @error('google_maps') is-invalid @enderror" id="google_maps" placeholder="google_maps.." value="{{$item->google_maps}}" required>
                    @error('google_maps') <div class="text-muted">{{$message}}</div> @enderror
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
            </div>
            <button class="btn btn-primary" type="submit">Update Setting</button>
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
