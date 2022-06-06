<!--====== Start Header ======-->
<div class="preloader">
    <div class="lds-ellipsis">
        <span></span>
        <span></span>
        <span></span>
    </div>
</div>
<!--====== End Header ======-->
<!--====== Search From ======-->
<div class="modal fade" id="search-modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form>
                <div class="form_group">
                    <input type="text" class="form_control" placeholder="Search here...">
                </div>
            </form>
        </div>
    </div>
</div>
<!--====== Search From ======-->
<!--====== Start Header ======-->
<header class="header-area header-area-v1">
    <div class="header-top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-10 col-md-12">
                    <div class="header-left">
                        <ul>
                            <li class="text"><span>Monday-Saturday 9 AM - 6 PM </span></li>
                            <li class="info"><span><a href="tel:+923035051247"><i class="fas fa-phone-alt"></i><?= $site_phone ?></a></span></li>
                            <li class="info"><span><a href="mailto:zuhaibhassan381@gmail.com"><i class="far fa-envelope"></i><?= $site_email ?></a></span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2">
                    <!-- <div class="search-box">
                        <a href="#" class="search-icon" data-toggle="modal" data-target="#search-modal"><i class="fas fa-search"></i></a>
                    </div> -->
                    <div class="sidebar-widget-area">
                                <div class="widget widget-search" style="text-align: end;">
                                    <div id="google_translate_element"></div>
                                    <script src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
                                    </script>
                                    <script>
                                        function googleTranslateElementInit() {
                                            new google.translate.TranslateElement({},
                                                'google_translate_element'
                                            );
                                        }
                                        $(window).load(function() {
                                            $(".arrivals-mob").remove();
                                            $("#track-booking-mob").remove();
                                            $("#featured-videos-mob").remove();
                                            $("#product-videos-mob").remove();
                                            $(".ads-mob").remove();
                                            $(".goog-logo-link").parent().remove();
                                            $('.goog-te-gadget').html($('.goog-te-gadget').children());
                                        })
                                    </script>
                                    <!-- <form>
                                    <div class="form_group">
                                        <input type="text" class="form_control" placeholder="Search your keyword" name="search">
                                        <button class="icon"><i class="flaticon-search-interface-symbol"></i></button>
                                    </div>
                                </form> -->
                                </div>
                            </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-middle">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="brand-logo">
                        <a href="<?= $path ?>"><img src="<?= $path ?>uploads/logo/<?= $site_logo ?>" class="img-fluid" alt="">
                        <span class="logo_text">Public Facilitation Center</span>
                    </a>
                    </div>
                </div>
                <div class="col-lg-6 header-box">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="box">
                                <i class="flaticon-trophy"></i>
                                <h5>The Best Industrial</h5>
                                <p>Solution Provider</p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="box">
                                <i class="flaticon-approved"></i>
                                <h5>Certified Company</h5>
                                <p>ISO 9001-2020</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-navigation">
        <div class="container">
            <div class="nav-container d-flex align-items-center justify-content-between">
                <!-- site logo -->
                <div class="brand-logo">
                    <a href="<?= $path ?>"><img src="<?= $path ?>uploads/logo/<?= $site_logo ?>" class="img-fluid" alt="Logo">
                    <span class="logo_text">Public Facilitation Center</span>
                </a>
                </div>
                <div class="nav-menu">
                    <!-- Navbar Close Icon -->
                    <div class="navbar-close">
                        <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                    </div>
                    <!-- nav-menu -->
                    <nav class="main-menu">
                        <ul>
                            <li class="menu-item"><a href="<?= $path ?>home">Home</a></li>
                            <li class="menu-item"><a href="<?= $path ?>about">About</a></li>
                            <li class="menu-item"><a href="<?= $path ?>service">Services</a></li>
                            <li class="menu-item"><a href="<?= $path ?>professionals">Professionals</a></li>
                            <li class="menu-item"><a href="<?= $path ?>privacy-policy">Privacy Policy</a></li>
                            <li class="menu-item"><a href="<?= $path ?>terms-conditions">Terms & Conditions</a></li>
                            <li class="menu-item"><a href="<?= $path ?>register">Register</a></li>
                            <li class="menu-item"><a href="<?= $path ?>login">Login</a></li>
                        </ul>
                    </nav>
                    <!-- nav pushed item -->
                    <div class="nav-pushed-item">
                        <div class="navbar-btn">
                            <a href="<?= $path ?>contact" class="main-btn">Get A Quote</a>
                        </div>
                    </div>
                </div>
                <!-- nav push item -->
                <div class="nav-push-item">
                    <div class="navbar-btn">
                        <a href="<?= $path ?>contact" class="main-btn">Contact Us</a>
                    </div>
                </div>
                <!-- Navbar Toggler -->
                <div class="navbar-toggler">
                    <span></span><span></span><span></span>
                </div>
            </div>
        </div>
    </div>
</header>
<!--====== End Header ======-->