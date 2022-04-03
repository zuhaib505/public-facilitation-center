        <?php
                $footerrs = getTable('tbl_texts', " `txt_type` = 'footer' ");
                $footer = unserialize(stripslashes($footerrs['txt_data']));
                $newsrs = getTable('tbl_texts', " `txt_type` = 'newsletter' ");
                $news = unserialize(stripslashes($newsrs['txt_data']));
                ?>
        <!--====== Start Footer ======-->
        <footer class="footer-area">
            <div class="footer-top pt-40 pb-40">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-4">
                            <div class="brand-logo">
                                <a href="#"><img src="<?= $path ?>assets/images/logo/logo-2.png" class="img-fluid" alt=""></a>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="social-box">
                                <ul>
                                    <?php if ($site_facebook) { ?>
                            <li><a target="_blank" href="<?= $site_facebook ?>"><i class="fab fa-facebook-f"></i></a>
                            </li>
                            <?php } ?>
                            <?php if ($site_twitter) { ?>
                            <li><a target="_blank" href="<?= $site_twitter ?>"><i class="fab fa-twitter"></i></a></li>
                            <?php } ?>
                            <?php if ($site_instagram) { ?>
                            <li><a target="_blank" href="<?= $site_instagram ?>"><i class="fab fa-instagram"></i></a>
                            </li>
                            <?php } ?>
                            <?php if ($site_skype) { ?>
                            <li><a target="_blank" href="skype:<?= $site_skype ?>?call"><i class="fab fa-skype"></i></a>
                            </li>
                            <?php } ?>
                            <?php if ($site_pinterest) { ?>
                            <li><a target="_blank" href="<?= $site_pinterest ?>"><i class="fab fa-pinterest-p"></i></a>
                            </li>
                            <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-widget-area pt-110 pb-110">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="widget contact-info-widget">
                                <h4 class="widget-title">Conatct Us</h4>
                                <div class="info-box mb-20">
                                    <p><i class="fas fa-phone-alt"></i><a href="tel:+923035051247"><?= $site_phone ?></a></p>
                                </div>
                                <div class="info-box">
                                    <h5 class="mb-20">Office Address</h5>
                                    <p><i class="fas fa-map-marker-alt"></i><?= $site_address ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="widget quick-link-widget">
                                <h4 class="widget-title">Quick Links</h4>
                                <ul class="widget-link">
                                    <li><a href="<?= $path ?>about">Company History</a></li>
                                    <li><a href="<?= $path ?>service">Latest Services</a></li>
                                    <li><a href="<?= $path ?>professionals">Professionals</a></li>
                                    <li><a href="<?= $path ?>about">About Us</a></li>
                                    <li><a href="<?= $path ?>contact">Conatct us</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="widget opening-hours-widget">
                                <h4 class="widget-title">Opening Hours</h4>
                                <div class="info-box">
                                    <p>Monday - Friday</p>
                                    <p>8:00 AM - 9:00 PM</p>
                                </div>
                                <div class="info-box">
                                    <p>Saturday - Sunday</p>
                                    <p>10:00 AM - 4:00 PM</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <div class="widget newsletters-widget">
                          <h4 class="widget-title"><?= $news['title'] ?></h4>
                          <?= $news['detail']  ?>
                          <form action="#" method="post" data-url="<?= $path . 'send-newsletter' ?>" data-type="newsletter" class="newsletters-form contact-form newsletter">
                              <div class="form_group">
                                  <input type="email" class="form_control" placeholder="Enter Your Email" name="email" required>
                                  <button type="submit" class="icon submit"><img id="btn-loader" style="height: 25px;display:none;" src="<?= $path ?>assets/images/illustrations/btn-loader.svg" alt="Please wait...">
                                      <span class="submit-text"><i class="fas fa-long-arrow-alt-right"></i></span></button>
                              </div>
                          </form>
                      </div>
                  </div>
                    </div>
                </div>
            </div>
            <div class="footer-bootom-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="copyright-text">
                                <p><?= $footer['text_copyright'] ?></p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="footer-nav">
                                <ul>
                                    <li><a href="<?= $path ?>">Home</a></li>
                                    <li><a href="<?= $path ?>about">Company</a></li>
                                    <li><a href="<?= $path ?>service">Services</a></li>
                                    <li><a href="<?= $path ?>professionals">Professionals</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!--====== End Footer ======-->