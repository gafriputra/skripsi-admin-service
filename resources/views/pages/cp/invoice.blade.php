@extends('layouts.cp')
@section('title', 'Invoice')

@section('content')
<section class="hero-wrap hero-wrap-2" style="background-image: url({{asset('assets_cp/images/bg_1.jpg')}});" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
          <h1 class="mb-2 bread">Invoice</h1>
          <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Invoice <i class="ion-ios-arrow-forward"></i></span></p>
        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section ftco-no-pt ftco-no-pb contact-section">
      <div class="container mt-2">
        <div class="card">
            <div class="card-header">
                Cek Invoice Anda
            </div>
            <div class="card-body">

                <form method="POST">
                    <div class="form-row align-items-center">
                        <div class="col-auto">
                            <label class="sr-only" for="noInvoice">No Invoice</label>
                            <input type="text" class="form-control mb-2" id="noInvoice" placeholder="TRX-********">
                        </div>
                        <div class="col-auto">
                            <label class="sr-only" for="email">Email</label>
                            <input type="text" class="form-control mb-2" id="email" placeholder="admin@email.com">
                        </div>
                            <div class="col-auto">
                            <button type="button" class="btn btn-primary mb-2 btnTRX" value="{{route('kirim-invoice')}}">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

            <div id="result" class="mt-3 mb-3"></div>

        </div>
  </section>
@endsection

@push('after-script')
    {{-- ajax secara otomatis --}}
    <script>
        jQuery(document).ready(function($){

            $('.btnTRX').on('click', function() {
                    const url = $(this).val();
                    let uuid = $('#noInvoice').val();
                    let email = $('#email').val();

                    $.ajax({
                        url: url,
                        type: 'get',
                        data:{
                            noInvoice : uuid,
                            email : email
                        },
                        success: function(e) {
                            console.log(e);
                            $('#result').html(e);
                        }
                    });

                });
        });
    </script>
@endpush
