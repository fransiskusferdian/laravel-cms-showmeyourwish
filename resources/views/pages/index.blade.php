 <!doctype html>
<html lang="en" id="home">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!-- Required meta tags -->
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700|Montserrat:200,400,600&display=swap" rel="stylesheet">

    <!-- Fancybox -->
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery.fancybox.min.css') }}">

    <!-- My CSS-->
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    
    <!-- favicon -->
    <link rel="icon" type="image/png" href="{{ asset('frontend/img/favicon.ico') }}">
    

    

    <title>Show Me Your Wish</title>
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="47">
    <!-- Navbar -->
<header id="header" class="headroom header--fixed">    
    <nav class="navbar nav-up navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="{{ asset('frontend/img/logo.png') }}" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link scroller" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link scroller" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link scroller" href="#ourwork">Portfolio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/journal">Journal</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>    
    <!-- End Navbar -->



    <!-- Carousel (With indicator & Caption) -->
    <!-- partial:index.partial.html -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
        </ol>
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            @foreach ($banners as $banner)               
            <div class="carousel-item">
                <img class="d-block w-100" src="{{ Storage::url($banner->image) }}" data-color="lightblue" alt="First Image">
                <div class="carousel-caption d-md-block"></div>
            </div>
            @endforeach
        </div>
        <!-- Controls -->
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- End Carousel -->



    <!-- Our Work -->
    <section class="ourwork" id="ourwork">
        <div class="container mt-2 justify-content-center">
            <div class="row">
                <div class="col">
                    <h2 class="text-center">OUR WORK</h2>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col">
                    <h5 class="text-center">PHOTOGRAPHY</h5>
                </div>
            </div>
            <div class="photo-portfolio text-center mt-3">
                <ul>
                    <button class="active hover-border" data-filter="*">ALL</button>
                    @foreach ($subcategories as $subcategory)                   
                        <button class="hover-border" data-filter=".{{$subcategory->name}}">{{$subcategory->name}}</button>
                     @endforeach
                </ul>
            </div>
            <div class="row photo-item text-center ">
                <div class="grid-sizer"></div>
                <?php foreach ($photos as $p) : ?>
                    <div class="card text-white col-lg-4 mt-4 photo {{$p->subcategory->name}}">
                        <div class="hovereffect">
                            <img src="{{ Storage::url($p->display->image) }}" alt="">
                            <div class="overlay">
                                <h2><?= $p['couple_name']; ?></h2>
                                <a class="info" href="{{ $p->slug }}">View More</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="row mt-4">
                <div class="col text-center">
                    <a href="#" class="btn btn-lg btn-outline-dark">View More</a>
                </div>
            </div>
          
        </div>
    </section>

    
    <!-- End Our Work -->

    <!-- Footer -->
    <footer class="mt-5">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <h2>GET IN TOUCH</h2>
                </div>
            </div>
            <div class="row text-center mt-5">
                <div class="col-lg-4 col-sm-12">
                    <img src="{{ asset('frontend/img/icon/pin.svg') }}" width="60" height="60" alt="">
                    <h5><?= $profile['address'] ?></h5>
                </div>
                <div class="col-lg-4 col-sm-12">
                    <img src="{{ asset('frontend/img/icon/phone.svg') }}" width="60" height="60" alt="">
                    <h5><?= $profile['phone'] ?></h5>
                    <h6>Whatsapp Availabe</h6>
                </div>
                <div class="col-lg-4 col-sm-12">
                    <img src="{{ asset('frontend/img/icon/mail.svg') }}" width="60" height="60" alt="">
                    <h5><?= $profile['email'] ?></h5>
                </div>
            </div>
            <div class="row">
                <div class="col text-center mt-4">
                    <a href=""><img src="{{ asset('frontend/img/icon/facebook4.svg') }}" class="mr-2" width="40" height="40" alt=""></a>
                    <a href=""><img src="{{ asset('frontend/img/icon/instagram4.svg') }}" class="" width="40" height="40" alt=""></a>
                    <a href=""><img src="{{ asset('frontend/img/icon/youtube4.svg') }}" class="ml-2" width="45" height="45" alt=""></a>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col text-center">
                    <h6 class="text-uppercase">&copy;<?= date('Y'); ?> <?= $profile['name'] ?>, ALL RIGHTS RESERVED.</h6>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('frontend/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.easing.1.3.min.js') }}"></script>
    <script src="{{ asset('frontend/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.fancybox.min.js') }}"></script>
    <script src="{{ asset('frontend/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('frontend/js/js/fancyboxvideo.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/js/headroom.min.js') }}"></script>
    <script src="{{ asset('frontend/js/script.min.js') }}"></script>
<!-- /Getbutton.io widget -->
</body>

</html>