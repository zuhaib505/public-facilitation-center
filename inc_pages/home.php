<?php
$bannerrs = getTable('tbl_texts', " `txt_type` = 'header' ");
$banner = unserialize(stripslashes($bannerrs['txt_data'])); ?>
    <!--====== Start banner-area Section ======-->
    <section class="banner-area bg_cover" style="background-image: url(assets/images/bg/hero-bg-1.jpg);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-11">
                    <div class="hero-content text-center">
                        <span class="wow fadeInUp" data-wow-delay=".1s">Get Yourself Facilitated With Our Services</span>
                        <h1 class="wow fadeInUp" data-wow-delay=".2s">Keep Yourself Tension Free</h1>
                        <h3 class="wow fadeInUp" data-wow-delay=".3s">Lorem ipsum dolor amet, consecte Lorem ipsum dolor sit<br>amet consectetur adipisicing eiusmod tempor</h3>
                        <ul class="wow fadeInUp" data-wow-delay=".4s">
                            <li><a href="<?= $path ?><?= $banner['link1'] ?>" class="main-btn"><?= $banner['text1'] ?></a></li>
                            <li><a href="<?= $path ?><?= $banner['link2'] ?>" class="main-btn"><?= $banner['text2'] ?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--====== End banner-area Section ======-->
    <!--====== Start features-area Section ======-->
    <section class="features-area pt-120 pb-85">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="features-item border-right mb-30">
                        <div class="icon">
                            <i class="fas fa-users animated"></i>
                        </div>
                        <div class="info">
                            <h4>Professionals</h4>
                            <p>consectetur adipisicing eiusmod tempor incididunt ut labore.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="features-item border-right mb-30">
                        <div class="icon">
                            <i class="fas fa-list animated"></i>
                        </div>
                        <div class="info">
                            <h4>Services</h4>
                            <p>consectetur adipisicing eiusmod tempor incididunt ut labore.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="features-item border-right mb-30">
                        <div class="icon">
                            <i class="fas fa-link animated"></i>
                        </div>
                        <div class="info">
                            <h4>About Us</h4>
                            <p>consectetur adipisicing eiusmod tempor incididunt ut labore.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="features-item mb-30">
                        <div class="icon">
                            <i class="fas fa-phone-alt animated"></i>
                        </div>
                        <div class="info">
                            <h4>Contact Us</h4>
                            <p>consectetur adipisicing eiusmod tempor incididunt ut labore.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--====== End features-area Section ======-->
    <!--====== Start service-area Section ======-->
    <section class="service-area service-area-v1 bg_cover pt-110 pb-110" style="background-image: url(assets/images/bg/service-bg-1.jpg);">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-lg-6">
                    <div class="section-title section-white-title mb-50">
                        <span class="span">Service</span>
                        <h2>Our Best Service</h2>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="button-box mb-60">
                        <a href="service.html" class="main-btn">See All</a>
                    </div>
                </div>
            </div>
            <div class="row service-slide">
                <div class="col-lg-4 service-item mb-50">
                    <div class="icon">
                        <i class="fas fa-book"></i>
                    </div>
                    <div class="info">
                        <h4>Education</h4>
                        <p>consectetur adipisicing elit eiusmod tempor tempor elit incididunt ut labore.</p>
                        <a href="service-details.html" class="btn_link">Read More</a>
                    </div>
                </div>
                <div class="col-lg-4 service-item mb-50">
                    <div class="icon">
                        <i class="flaticon-car-service"></i>
                    </div>
                    <div class="info">
                        <h4>Car Repairing</h4>
                        <p>consectetur adipisicing elit eiusmod tempor tempor elit incididunt ut labore.</p>
                        <a href="service-details.html" class="btn_link">Read More</a>
                    </div>
                </div>
                <div class="col-lg-4 service-item">
                    <div class="icon">
                        <i class="flaticon-mechanic"></i>
                    </div>
                    <div class="info">
                        <h4>Bike Repairing</h4>
                        <p>consectetur adipisicing elit eiusmod tempor tempor elit incididunt ut labore.</p>
                        <a href="service-details.html" class="btn_link">Read More</a>
                    </div>
                </div>
                <div class="col-lg-4 service-item mb-50">
                    <div class="icon">
                        <i class="fas fa-tools"></i>
                    </div>
                    <div class="info">
                        <h4>Electric Appliances Repairing</h4>
                        <p>consectetur adipisicing elit eiusmod tempor tempor elit incididunt ut labore.</p>
                        <a href="service-details.html" class="btn_link">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--====== End service-area Section ======-->
    <!--====== Start Gallery Section ======
        <section class="gallery-section-area pt-120 pb-90" id="gallery-filter">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="section-title text-center mb-55">
                            <span class="span">Lattest Work</span>
                            <h2>Our Latest Project</h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="filter-button text-center mb-70">
                            <button class="filter-btn active" data-filter="*">All</button>
                            <button class="filter-btn" data-filter=".cat-1">Hand Wash</button>
                            <button class="filter-btn" data-filter=".cat-2">Hand Wax</button>
                            <button class="filter-btn" data-filter=".cat-3">Auto Wash</button>
                            <button class="filter-btn" data-filter=".cat-4">Tripple</button>
                            <button class="filter-btn" data-filter=".cat-5">Auto Detils</button>
                        </div>
                    </div>
                </div>
                <div class="filter-grid row">
                    <div class="col-lg-3 col-md-6 col-sm-12 grid-column cat-1">
                        <div class="gallery-item mb-30">
                            <div class="gallery-img">
                                <a href="assets/images/gallery/gallery-1.jpg" class="image-popup">
                                    <img src="assets/images/gallery/gallery-1.jpg" class="img-fluid" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 grid-column cat-2">
                        <div class="gallery-item mb-30">
                            <div class="gallery-img">
                                <a href="assets/images/gallery/gallery-2.jpg" class="image-popup">
                                    <img src="assets/images/gallery/gallery-2.jpg" class="img-fluid" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-6 col-sm-12 grid-column cat-3">
                        <div class="gallery-item mb-30">
                            <div class="gallery-img">
                                <a href="assets/images/gallery/gallery-3.jpg" class="image-popup">
                                    <img src="assets/images/gallery/gallery-3.jpg" class="img-fluid" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 grid-column cat-4">
                        <div class="gallery-item mb-30">
                            <div class="gallery-img">
                                <a href="assets/images/gallery/gallery-4.jpg" class="image-popup">
                                    <img src="assets/images/gallery/gallery-4.jpg" class="img-fluid" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 grid-column cat-5">
                        <div class="gallery-item mb-30">
                            <div class="gallery-img">
                                <a href="assets/images/gallery/gallery-5.jpg" class="image-popup">
                                    <img src="assets/images/gallery/gallery-5.jpg" class="img-fluid" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-6 col-sm-12 grid-column cat-3">
                        <div class="gallery-item mb-30">
                            <div class="gallery-img">
                                <a href="assets/images/gallery/gallery-6.jpg" class="image-popup">
                                    <img src="assets/images/gallery/gallery-6.jpg" class="img-fluid" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="button-box text-center mt-20">
                            <a href="#" class="main-btn">Load More</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>====== End Gallery Section ======-->


    <!--====== Start testimonial-area-one Section ======-->
    <section class="testimonial-area-one pt-120 pb-30 bg_cover" style="background-image: url(assets/images/bg/testimonial-bg-1.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="testimonial-wrapper">
                        <div class="section-title section-white-title text-center">
                            <span class="span">Our Testomonial</span>
                            <h2>Testomonial</h2>
                        </div>
                        <div class="testimonial-slide-one row">
                            <div class="col-lg-12">
                                <div class="testimonial-box">
                                    <i class="flaticon-left-quote"></i>
                                    <p>“Lorem ipsum dolor consectetur elit Lorem ipsum dolor sit amet sed do eiusmod tempor incididunt’’</p>
                                    <h5>Sarif Jaya Miprut</h5>
                                    <span>Profile Manager</span>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="testimonial-box">
                                    <i class="flaticon-left-quote"></i>
                                    <p>“Lorem ipsum dolor consectetur elit Lorem ipsum dolor sit amet sed do eiusmod tempor incididunt’’</p>
                                    <h5>Sarif Jaya Miprut</h5>
                                    <span>Profile Manager</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                <div class="call-back-form">
                    <form action="#" method="post" data-url="<?= $path . 'send-quote' ?>" data-type="contact" class="contact-form contact">
                        <h3>Request A Call Back</h3>
                        <p>If You Need Any Help YoU Can Contact US...</p>
                        <div class="form_group">
                            <label>Your Name</label>
                            <input type="text" placeholder="Enter Name" class="form_control alpha" name="name">
                        </div>
                        <div class="form_group">
                            <label>Phone Number</label>
                            <input type="text" placeholder="Phone Number" class="form_control numeric" name="phone">
                        </div>
                        <div class="form_group">
                            <label>Email Address</label>
                            <input type="email" placeholder="Enter Email Address" class="form_control alphanumeric" name="email">
                        </div>
                        <div class="form_group form_button">
                            <button type="submit" id="contact-submit" class="main-btn submit">
                                <img id="btn-loader" style="height: 25px;display:none;" src="<?= $path ?>assets/images/illustrations/btn-loader.svg" alt="Please wait...">
                                <span class="submit-text">Submit <i class="fa fa-chevron-right fa-icon"></i></span>
                            </button>
                            <!-- <button class="main-btn reset-btn">Reset</button> -->
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </section>
    <!--====== End testimonial-area-one Section ======-->