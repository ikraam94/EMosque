<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Resume - Start Bootstrap Theme</title>
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('front') }}/css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
            <a class="navbar-brand js-scroll-trigger" href="#page-top">
                <span class="d-block d-lg-none">E-Mosque</span>
                <span class="d-none d-lg-block"><img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="{{ asset('front') }}/assets/img/zaid.jpg" alt="..." /></span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#homepage">Homepage</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#history">History</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#activity">Activity</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#association">Association</a></li>
                </ul>
            </div>
        </nav>
        <!-- Page Content-->
        <div class="container-fluid p-0">
            <!-- About-->
            <section class="resume-section" id="homepage">
                <div class="resume-section-content">
                    <h1 class="mb-0">Homepage</h1>
                    @foreach ($homepage as $item)
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                            <h3 class="mb-0">{{ $item->homepage}}</h3>
                            {!! $item->content!!}
                        </div>
                    @endforeach  
                </div>
            </section>
            <hr class="m-0" />
            <!-- History-->
            <section class="resume-section" id="history">
                <div class="resume-section-content">
                    <h2 class="mb-5">History</h2>
                    @foreach ($history as $item)
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                            <h3 class="mb-0">{{ $item->history}}</h3>
                            {!! $item->kandungan!!}
                    @endforeach
                </div>
            </section>
            <hr class="m-0" />
                        <!-- Activity-->
            <section class="resume-section" id="activity">
                <div class="resume-section-content">
                    <h2 class="mb-5">Activity</h2>
                    @foreach ($activity as $item)
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                            <h3 class="mb-0">{{ $item->activity}}</h3>
                            {!! $item->content!!}
                        </div>
                        <div class="flex-shrink-0"><span class="text-primary">{{$item->starting_date}} - {{$item->ending_date}}</span></div>
                    </div>
                    @endforeach
                </div>
            </section>
            <hr class="m-0" />
            <!-- Association-->
            <section class="resume-section" id="association">
                <div class="resume-section-content">
                    <h2 class="mb-5">Association</h2>
                    @foreach ($association as $item)
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                            <h3 class="mb-0">{{ $item->association}}</h3>
                            <div class="subheading mb-3">{{ $item->jawatan }}</div>
                            {!! $item->content!!}
                        </div>
                    </div>
                    @endforeach
                </div>
            </section>
            <hr class="m-0" />
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{ asset('front') }}js/scripts.js"></script>
    </body>
</html>
