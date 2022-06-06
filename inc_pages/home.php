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
                        <h3 class="wow fadeInUp" data-wow-delay=".3s">Her are the professionals, you were looking for.<br>In case of any issue please consult with us.</h3>
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
                            <p>Here are the professionals you were looking for, Choice is your.</p>
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
                            <p>Here are the services you were looking for, Choice is your.</p>
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
                            <p>Here are the best Professional web app you were looking for.</p>
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
                            <p>In case of any issue, Please contact us, So we can help you.</p>
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
                        <a href="<?= $path ?>service" class="main-btn">See All</a>
                    </div>
                </div>
            </div>
            <div class="row service-slide">
            <?php $service_qry =  "SELECT * FROM tbl_services  WHERE service_status='1' ORDER BY service_order DESC";
                        $service_exe = $conn->query($service_qry) or die(mysqli_error($conn));
                        while ($service = $service_exe->fetch_array()) { ?>
                <div class="col-lg-4 service-item mb-50">
                    <div class="icon">
                        <i class="<?= $service['service_icon'] ?>"></i>
                    </div>
                    <div class="info">
                        <h4><?= $service['service_title'] ?></h4>
                        <p><?= $service['service_short_desc'] ?></p>
                        <a href="<?= $path ?>service/<?= $service['service_slug'] ?>" class="btn_link">Read More</a>
                    </div>
                </div>
                    <?php } ?>
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
                                    <p>“Our Mission is to serve public of PAKISTAN , We are willing to provide you services, you like’’</p>
                                    <h5>Zuhaib Hassan</h5>
                                    <span>Company CEO</span>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="testimonial-box">
                                    <i class="flaticon-left-quote"></i>
                                    <p>“Our Mission is to serve public of PAKISTAN , We are willing to provide you services, you like’’</p>
                                    <h5>Ghayoor Abbas</h5>
                                    <span>Company Manager</span>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="testimonial-box">
                                    <i class="flaticon-left-quote"></i>
                                    <p>“Our Mission is to serve public of PAKISTAN , We are willing to provide you services, you like’’</p>
                                    <h5>Shehzeel Ahmed</h5>
                                    <span>Asistant Manager</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                <div class="call-back-form">
                    <form action="#" method="post" data-url="<?= $path . 'send-quote' ?>" data-type="contact" class="contact-form contact">
                        <h3>Request A Call Back</h3>
                        <p>If You Need Any Help You Can Contact US...</p>
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