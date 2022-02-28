<?php
$slug = $_REQUEST['slug'];
$service_qry =  "SELECT * FROM tbl_services  WHERE service_status='1' AND service_slug='$slug' ORDER BY service_order DESC";
$exe1 = $conn->query($service_qry) or die(mysqli_error($conn));
$service = $exe1->fetch_assoc();
?>

<!--====== Start breadcrumbs-area Section ======-->
        <section class="breadcrumbs-area bg_cover" style="background-image: url(<?= $path ?>assets/images/bg/breadcrumb-bg-1.jpg);">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="breadcrumbs-content text-center">
                            <h1><?= $service['service_title'] ?></h1>
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li><a href="<?= $path ?>service">Service</a></li>
                                <li class="active"><?= $service['service_title'] ?></li>
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
                        <div class="service-details-wrapper">
                            <div class="title">
                                <h3><?= $service['service_title'] ?></h3>
                            </div>
                            <p><?= $service['service_short_desc'] ?></p>
                            <div class="content-box">
                                <i class="flaticon-mechanic"></i>
                                <h4>Get Facilitated</h4>
                                <P><?= $service['service_short_desc'] ?></P>
                            </div>
                            <img src="assets/images/service/single-service-1.jpg" class="img-fluid" alt="">
                            <h6><?= $service['service_short_desc'] ?></h6>

                        </div>
                        <section class="service-area service-area-v2 pt-110">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="section-title text-center mb-60">
                            <span class="span">Professionals</span>
                            <h2>Our Best Professionals</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php $service_id = $service['service_id'];
                        $prof_qry =  "SELECT * FROM tbl_professionals  WHERE prof_status='1' AND service_id=$service_id ORDER BY prof_order DESC";
                        $prof_exe = $conn->query($prof_qry) or die(mysqli_error($conn));
                        while ($prof = $prof_exe->fetch_array()) { ?>
                    <div class="col-lg-6">
                        <div class="service-item mb-50">
                            <div class="icon">
                                <i class="<?= $service['service_icon'] ?>"></i>
                            </div>
                            <div class="info">
                                <h4><?= $prof['prof_name'] ?></h4>
                                <p><?= $service['service_short_desc'] ?></p>
                                <a href="<?= $path ?>professional/<?= $prof['prof_slug'] ?>" class="btn_link">Read More</a>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </section>
                    </div>
                    <div class="col-lg-4">
                        <div class="sidebar-widget-area">
                            <div class="widget service-widget mb-40">
                                <h4 class="title">All Service <span class="float-right"><i class="fas fa-angle-down"></i></span></h4>
                                <ul class="list">
                                <?php $serviceqry =  "SELECT * FROM tbl_services  WHERE service_status='1' ORDER BY service_order DESC";
                                $serviceexe = $conn->query($serviceqry) or die(mysqli_error($conn));
                                while ($service1 = $serviceexe->fetch_array()) { ?>
                                    <li><a href="<?= $path ?><?= $service1['service_slug'] ?>"><?= $service1['service_title'] ?></a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <div class="widget cta-widget">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--====== End service-details-section Section ======-->