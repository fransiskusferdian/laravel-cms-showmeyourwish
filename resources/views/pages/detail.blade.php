<!doctype html>
<html lang="en" id="home">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!-- Required meta tags -->
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/client-side/'); ?>css/bootstrap.min.css">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700|Montserrat:200,400,600&display=swap" rel="stylesheet">

    <!-- Fancybox -->
    <link rel="stylesheet" href="<?= base_url('assets/client-side/'); ?>css/jquery.fancybox.min.css">

    <!-- My CSS-->
    <link rel="stylesheet" href="<?= base_url('assets/client-side/'); ?>css/stylepages.min.css">
    
    <!-- favicon -->
    <link rel="icon" type="image/png" href="<?= base_url('assets/client-side/img/favicon.ico'); ?>">
    
    
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-157936492-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-157936492-1');
</script>


    <title>Show Me Your Wish | Detail</title>
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="47">
    <!-- Navbar -->
    <header id="header" class="headroom header--fixed">   
      <nav class="navbar nav-down navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="<?= base_url('assets/client-side/'); ?>img/logo.png" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link scroller" href="<?= base_url(); ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link scroller" href="<?= base_url(); ?>#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link scroller" href="<?= base_url(); ?>#ourwork">Portfolio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('journal') ?>">Journal</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
  </header>    
    <!-- End Navbar -->

    <!-- Title & Content -->
    <div class="container">
        <div class="row">
            <div class="col text-center" style="margin-top: 6.5rem;">
                <h1><?= $content['couple_name']; ?></h1>
                <div class="underline grey mAuto"></div>
            </div>
        </div>
        <div class="row">
            <div class="col text-center" style="margin-top: 20px;">
                <blockquote class="blockquote mb-0" style="font-size: 16px;">
                    <?= $content['content']; ?>
                </blockquote>
            </div>
        </div>
    </div>
    <!-- End Title & Content -->
    <!-- Gallery -->
    <div class="container">
        <div class="row text-center">
            <?php foreach ($gallery as $gal) : ?>
                <div class="col-lg-3 mt-4 item wedding">
                    <a href="<?= base_url('assets/admin-side/img/portfolio/' . $gal['path'] . '/' . $gal['name_image']); ?>" data-fancybox="2" style="text-decoration: none;">
                        <img class="rounded" src="<?= base_url('assets/admin-side/img/portfolio/' . $gal['path'] . '/' . $gal['name_thumbnail']); ?>" />
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    </div>
    <!-- End Gallery -->

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
                    <img src="<?= base_url('assets/client-side/'); ?>img/icon/pin.svg" width="60" height="60" alt="">
                    <h5><?= $profile['address'] ?></h5>
                </div>
                <div class="col-lg-4 col-sm-12">
                    <img src="<?= base_url('assets/client-side/'); ?>img/icon/phone.svg" width="60" height="60" alt="">
                    <h5><?= $profile['phone'] ?></h5>
                    <h6>Whatsapp Availabe</h6>
                </div>
                <div class="col-lg-4 col-sm-12">
                    <img src="<?= base_url('assets/client-side/'); ?>img/icon/mail.svg" width="60" height="60" alt="">
                    <h5><?= $profile['email'] ?></h5>
                </div>
            </div>
            <div class="row">
                <div class="col text-center mt-4">
                    <a href=""><img src="<?= base_url('assets/client-side/'); ?>img/icon/facebook4.svg" class="mr-2" width="40" height="40" alt=""></a>
                    <a href=""><img src="<?= base_url('assets/client-side/'); ?>img/icon/instagram4.svg" class="" width="40" height="40" alt=""></a>
                    <a href=""><img src="<?= base_url('assets/client-side/'); ?>img/icon/youtube4.svg" class="ml-2" width="45" height="45" alt=""></a>
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
    <script src="<?= base_url('assets/client-side/'); ?>js/jquery-3.4.1.min.js"></script>
    <script src="<?= base_url('assets/client-side/'); ?>js/jquery.fancybox.min.js"></script>
    <script src="<?= base_url('assets/client-side/'); ?>js/bootstrap.min.js"></script>
    <script src="<?= base_url('assets/client-side/'); ?>js/headroom.min.js"></script>
    <script src="<?= base_url('assets/client-side/'); ?>js/headroominit.min.js"></script>
    <script src="<?= base_url('assets/client-side/'); ?>js/scriptpages.min.js"></script>
    <!-- Getbutton.io widget -->
<script type="text/javascript">
    (function () {
        var options = {
            whatsapp: "https://api.whatsapp.com/send?phone=6285726908787", // WhatsApp number
            call: "+6285726908787", // Call phone number
            call_to_action: "Contact us", // Call to action
            button_color: "#FF6550", // Color of button
            position: "right", // Position may be 'right' or 'left'
            order: "whatsapp,call", // Order of buttons
        };
        var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    })();
</script>
<!-- /Getbutton.io widget -->
</body>

</html>