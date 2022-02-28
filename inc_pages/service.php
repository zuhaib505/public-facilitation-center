        <!--====== Start breadcrumbs-area Section ======-->
        <section class="breadcrumbs-area bg_cover" style="background-image: url(assets/images/bg/breadcrumb-bg-1.jpg);">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="breadcrumbs-content text-center">
                            <h1>Service</h1>
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li class="active">Service</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--====== End breadcrumbs-area Section ======-->
        <!--====== Start service-area Section ======-->
        <section class="service-area service-area-v2 pt-110">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="section-title text-center mb-60">
                            <span class="span">Service</span>
                            <h2>Our Best Service</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php $service_qry =  "SELECT * FROM tbl_services  WHERE service_status='1' ORDER BY service_order DESC";
                        $service_exe = $conn->query($service_qry) or die(mysqli_error($conn));
                        while ($service = $service_exe->fetch_array()) { ?>
                    <div class="col-lg-4">
                        <div class="service-item mb-50">
                            <div class="icon">
                                <i class="<?= $service['service_icon'] ?>"></i>
                            </div>
                            <div class="info">
                                <h4><?= $service['service_title'] ?></h4>
                                <p><?= $service['service_short_desc'] ?></p>
                                <a href="<?= $path ?>service/<?= $service['service_slug'] ?>" class="btn_link">Read More</a>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </section>
        <!--====== End service-area Section ======-->