        <!--====== Start breadcrumbs-area Section ======-->
        <section class="breadcrumbs-area bg_cover"
            style="background-image: url(<?= $path ?>assets/images/bg/breadcrumb-bg-1.jpg);">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="breadcrumbs-content text-center">
                            <h1>Professional</h1>
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li class="active">Professional</li>
                                <li class="active">Pakages</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--====== End breadcrumbs-area Section ======-->
        <!--====== Start service-details-section Section ======-->
        <section class="service-details-section pt-120 pb-120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <section class="service-area service-area-v2">
                                <div class="row">
                                    <?php
                        $id = doDecode($_REQUEST['slug']);
                        $us_qry =  "SELECT * FROM tbl_user_services  WHERE `user_id` = $id AND us_status='1' ORDER BY us_order DESC";
                        $us_exe = $conn->query($us_qry) or die(mysqli_error($conn));
                        while ($us = $us_exe->fetch_array()) {
                            ?>
                                    <div class="col-lg-6">
                                        <div class="service-item mb-50">
                                            <div class="icon">
                                                <i class="fas fa-user"></i>
                                            </div>
                                            <div class="info">
                                                <h4><?= $us['us_title'] ?></h4>
                                                <h4>$ <?= $us['us_pkg'] ?></h4>
                                                <p><?= $us['us_detail'] ?></p>
                                                <a href="<?= $path ?>pakage/<?= $us['us_slug'] ?>" class="btn_link"><i
                                                        class="fas fa-eye"></i> View Pakage</a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                        </section>
                    </div>
                    <div class="col-lg-4">
                        <div class="sidebar-widget-area">
                            <div class="widget service-widget mb-40">
                                <h4 class="title">All Service <span class="float-right"><i
                                            class="fas fa-angle-down"></i></span></h4>
                                <ul class="list">
                                    <?php $serviceqry =  "SELECT * FROM tbl_services  WHERE service_status='1' ORDER BY service_order DESC";
                                $serviceexe = $conn->query($serviceqry) or die(mysqli_error($conn));
                                while ($service1 = $serviceexe->fetch_array()) { ?>
                                    <li><a
                                            href="<?= $path ?>service/<?= $service1['service_slug'] ?>"><?= $service1['service_title'] ?></a>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <!-- <div class="widget cta-widget">
                                <h3>Request For Call</h3>
                                <form>
                                    <div class="form_group">
                                        <label>Your Name</label>
                                        <input type="text" class="form_control" name="name" required>
                                    </div>
                                    <div class="form_group">
                                        <label>Phone Number</label>
                                        <input type="text" class="form_control" name="phone" required>
                                    </div>
                                    <div class="form_group">
                                        <button class="main-btn">Send Request</button>
                                    </div>
                                </form>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--====== End service-details-section Section ======-->