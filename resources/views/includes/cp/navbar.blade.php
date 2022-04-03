<div class="bg-top navbar-light">
    <div class="container">
        <div class="row no-gutters d-flex align-items-center align-items-stretch">
            <div class="col-md-4 d-flex align-items-center py-4">
                <a class="navbar-brand" href="index.html"><span class="flaticon-bee mr-1"></span>Mitrabakti</a>
            </div>
            <div class="col-lg-8 d-block">
                <div class="row d-flex">
                    <div class="col-md d-flex topper align-items-center align-items-stretch py-md-4">
                        <div class="icon d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
                        <div class="text d-flex align-items-center">
                            <span>gafri.putra@email.com</span>
                        </div>
                    </div>
                    <div class="col-md d-flex topper align-items-center align-items-stretch py-md-4">
                        <div class="icon d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
                        <div class="text d-flex align-items-center">
                            <span>Call Us: + 62 838 3011 6257</span>
                        </div>
                    </div>
                    <div class="col-md topper d-flex align-items-center align-items-stretch">
                        <p class="mb-0 d-flex d-block">
                            <a href="#" class="btn btn-primary d-flex align-items-center justify-content-center">
                                <span>Request A Quote</span>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
      </div>
</div>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container d-flex align-items-center">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>
      <form action="#" class="searchform order-lg-last">
      <div class="form-group d-flex">
        <input type="text" class="form-control pl-3" placeholder="Search">
        <button type="submit" placeholder="" class="form-control search"><span class="ion-ios-search"></span></button>
      </div>
    </form>
      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item {{ Route::currentRouteNamed('Home') ? 'active' : '' }}"><a href="{{route('Home')}}" class="nav-link pl-0">Home</a></li>
            <li class="nav-item {{ Route::currentRouteNamed('About') ? 'active' : '' }}"><a href="{{route('About')}}" class="nav-link">About</a></li>
            <li class="nav-item {{ Route::currentRouteNamed('Projects') ? 'active' : '' }}"><a href="{{route('Projects')}}" class="nav-link">Project</a></li>
            <li class="nav-item {{ Route::currentRouteNamed('Blog') ||Route::currentRouteNamed('BlogDetail') ? 'active' : '' }}"><a href="{{route('Blog')}}" class="nav-link">Blog</a></li>
          <li class="nav-item {{ Route::currentRouteNamed('Contact') ? 'active' : '' }}"><a href="{{route('Contact')}}" class="nav-link">Contact</a></li>
          <li class="nav-item "><a href="{{url('/invoice')}}" class="nav-link">Invoice</a></li>
        </ul>
      </div>
    </div>
  </nav>
<!-- END nav -->
