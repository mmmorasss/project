<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="/assets/img/icon.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/assets/css/slicknav.css">
    <link rel="stylesheet" href="/assets/css/flaticon.css">
    <link rel="stylesheet" href="/assets/css/progressbar_barfiller.css">
    <link rel="stylesheet" href="/assets/css/lightslider.min.css">
    <link rel="stylesheet" href="/assets/css/price_rangs.css">
    <link rel="stylesheet" href="/assets/css/gijgo.css">
    <link rel="stylesheet" href="/assets/css/animate.min.css">
    <link rel="stylesheet" href="/assets/css/animated-headline.css">
    <link rel="stylesheet" href="/assets/css/magnific-popup.css">
    <link rel="stylesheet" href="/assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="/assets/css/themify-icons.css">
    <link rel="stylesheet" href="/assets/css/slick.css">
    <link rel="stylesheet" href="/assets/css/nice-select.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <script src="https://kit.fontawesome.com/fcdf3a14e4.js" crossorigin="anonymous"></script>
</head>
<body>
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="/assets/img/logo/loder.png" alt="">
                </div>
            </div>
        </div>
    </div>

    <div class="header-sticky">
        <div class="container-fluid" style="background-color: #f0dfd8">
            <div class="row menu-wrapper align-items-center justify-content-between">
                <nav class="navbar navbar-expand-lg">
                    <div class="logo2 showmobile">
                        <a href="/"><img src="/assets/img/logo/logo2.png" alt=""></a>
                    </div>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                        <div class="hidemobile">
                            <a href="/"><img class="hidemobile" src="/assets/img/logo/logo.png" alt=""></a>
                        </div>
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item mx-5"><a class="nav-link" href="/">Home</a></li>
                            <li class="nav-item mx-5"><a class="nav-link" href="/products">Catalog</a></li>
                        </ul>

                        @auth
                        <a class="nav-link mx-5" href="/profile">
                            <i class="fa-solid fa-user fa-xl"></i>
                        </a>
                        <form action="/logout" id="logoutForm" method="post">
                            @csrf
                        </form>
                        <a class="nav-link mx-5" href="#" onclick="logoutForm.submit()">
                            <i class="fa-solid fa-arrow-right-from-bracket fa-xl"></i>
                        </a>
                        @else
                        <a class="nav-link mx-5" href="/login">
                            <i class="fa-solid fa-user-plus fa-xl"></i>
                        </a>
                        @endauth
                        <a class="nav-link mx-5" href="/cart">
                                <i class="fa-solid fa-cart-shopping fa-xl"></i>
                        </a>

                    </div>
                </nav>
            </div>
        </div>
    </div>

    <main>
    @yield('content')
    </main>

    <footer>
        <div class="footer-wrapper">
            <div class="footer-area footer-padding">
            <div class="container ">
                <div class="row justify-content-between">
                        <div class="col-xl-4 col-lg-3 col-md-8 col-sm-8">
                            <div class="single-footer-caption mb-50">
                                <div class="single-footer-caption mb-30">
                                    <div class="footer-logo mb-35">
                                        <a href="/"><img src="/assets/img/logo/logo2_footer.png" alt=""></a>
                                    </div>
                                    <div class="footer-tittle">
                                        <div class="footer-pera">
                                            <p>FURN. Shop the way you like!</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-4">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>Quick links</h4>
                                    <ul>
                                        <li><a href="/contact">Contact Us</a></li>
                                        <li><a href="/about">About Us</a></li>
                                        <li><a href="/products">Catalog</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-4">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                <h4>Shop Category</h4>
                                    <ul style="column-count: 2">
                                        <li><a href="/products#Sofa">Sofa</a></li>
                                        <li><a href="/products#Table">Table</a></li>
                                        <li><a href="/products#Chair">Chair</a></li>
                                        <li><a href="/products#Bed">Bed</a></li>
                                        <li><a href="/products#Lighting">Lighting</a></li>
                                        <li><a href="/products#Decore">Decore</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-4"></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="/assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="/assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="/assets/js/popper.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>

    <script src="/assets/js/owl.carousel.min.js"></script>
    <script src="/assets/js/slick.min.js"></script>
    <script src="/assets/js/jquery.slicknav.min.js"></script>

    <script src="/assets/js/wow.min.js"></script>
    <script src="/assets/js/animated.headline.js"></script>
    <script src="/assets/js/jquery.magnific-popup.js"></script>
    <script src="/assets/js/gijgo.min.js"></script>
    <script src="/assets/js/lightslider.min.js"></script>
    <script src="/assets/js/price_rangs.js"></script>

    <script src="/assets/js/jquery.nice-select.min.js"></script>
    <script src="/assets/js/jquery.sticky.js"></script>
    <script src="/assets/js/jquery.barfiller.js"></script>

    <script src="/assets/js/jquery.counterup.min.js"></script>
    <script src="/assets/js/waypoints.min.js"></script>
    <script src="/assets/js/jquery.countdown.min.js"></script>
    <script src="/assets/js/hover-direction-snake.min.js"></script>

    <script src="/assets/js/contact.js"></script>
    <script src="/assets/js/jquery.form.js"></script>
    <script src="/assets/js/jquery.validate.min.js"></script>
    <script src="/assets/js/mail-script.js"></script>
    <script src="/assets/js/jquery.ajaxchimp.min.js"></script>
    <script src="/assets/js/plugins.js"></script>
    <script src="/assets/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>
