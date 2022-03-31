        <!--====== Start breadcrumbs-area Section ======-->
        <section class="breadcrumbs-area bg_cover" style="background-image: url(assets/images/bg/breadcrumb-bg-1.jpg);">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="breadcrumbs-content text-center">
                            <h1>Contact Us</h1>
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li class="active">Contact Us</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--====== End breadcrumbs-area Section ======-->
        <!--====== Start Contact-area Section ======-->
        <section class="contact-area bg_cover pt-120 pb-120" style="background-image: url(assets/images/bg/contact-bg-1.jpg);">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="contact-wrapper">
                            <div class="section-title mb-40">
                                <h3>Discussig With Us</h3>
                            </div>
                            <form action="#" method="post" data-url="<?= $path . 'send-contact-message' ?>" data-type="contact" class="contact-form contact">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form_group">
                                            <input type="text" class="form_control alpha" placeholder="Enter Name" name="name" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form_group">
                                            <input type="email" class="form_control" placeholder="Enter Email" name="email" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form_group">
                                            <input type="text" class="form_control alpha" placeholder="Subject" name="subject" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form_group">
                                            <input type="text" class="form_control numeric" placeholder="Phone" name="phone" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form_group">
                                            <textarea class="form_control" placeholder="Message" name="message"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form_button">
                                            <button class="main-btn">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="contact-information">
                            <div class="box">
                                <div class="icon">
                                    <i class="flaticon-maps-and-flags"></i>
                                </div>
                                <div class="info">
                                    <h5>Our Office Location</h5>
                                    <p><?= $site_address ?></p>
                                </div>
                            </div>
                            <div class="box">
                                <div class="icon">
                                    <i class="flaticon-phone-call"></i>
                                </div>
                                <div class="info">
                                    <h5>Our Contact Number</h5>
                                    <p><a href="tel:03001234567"><?= $site_phone ?></a></p>
                                </div>
                            </div>
                            <div class="box">
                                <div class="icon">
                                    <i class="flaticon-envelope"></i>
                                </div>
                                <div class="info">
                                    <h5>Our Contact E-mail</h5>
                                    <p><a href="mailto:zuhaibhassan381@gmail.com"> <?= $site_email ?></a></p>
                                </div>
                            </div>
                            <div class="box">
                                <div class="social-box">
                                <ul>
                                <li><span>Follow Us:</span></li>
                                <?php if ($site_facebook) { ?>
                                    <li><a target="_blank" href="<?php echo $site_facebook ?>"><i class="fab fa-facebook-f"></i></a></li>
                                <?php } ?>
                                <?php if ($site_twitter) { ?>
                                    <li><a target="_blank" href="<?php echo $site_twitter ?>"><i class="fab fa-twitter"></i></a></li>
                                <?php } ?>
                                <?php if ($site_instagram) { ?>
                                    <li><a target="_blank" href="<?php echo $site_instagram ?>"><i class="fab fa-instagram"></i></a></li>
                                <?php } ?>
                                <?php if ($site_skype) { ?>
                                    <li><a target="_blank" href="skype:<?php echo $site_skype ?>?call"><i class="fab fa-skype"></i></a></li>
                                <?php } ?>
                                <?php if ($site_youtube) { ?>
                                    <li><a target="_blank" href="<?php echo $site_youtube ?>"><i class="fab fa-youtube"></i></a></li>
                                <?php } ?>
                            </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--====== End Contact-area Section ======-->
        <!--====== Start contact-map-section Section ======-->
        <section class="contact-map-section">
            <div class="map-box">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d108208.92464783472!2d72.6269928!3d32.0549408!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39217439502694e3%3A0x55e1bad6edcbbc70!2sSargodha%2C%20Punjab!5e0!3m2!1sen!2s!4v1648722097940!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </section>
        <!--====== End contact-map-section Section ======-->