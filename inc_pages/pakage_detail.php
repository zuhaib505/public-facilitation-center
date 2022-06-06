<?php
$slug = $_REQUEST['slug'];
$pakage_qry =  "SELECT * FROM tbl_user_services  WHERE us_status='1' AND us_slug='$slug' ORDER BY us_order DESC";
$exe1 = $conn->query($pakage_qry) or die(mysqli_error($conn));
$us = $exe1->fetch_assoc();

// Get User
$id = $us['user_id'];
$user_qry =  "SELECT * FROM tbl_users  WHERE `user_id` = $id AND user_status='1'";
$user_exe = $conn->query($user_qry) or die(mysqli_error($conn));
$user = $user_exe->fetch_assoc();

// Service
$service = getServiceByServiceId($user['service_id']);
?>
<style>
    #req_duration{
    margin-bottom: 30px;
    height: 55px;
    border-radius: 0px;
    }
    #req_type{
    margin-bottom: 30px;
    height: 55px;
    border-radius: 0px;
    }
</style>
<!--====== Start breadcrumbs-area Section ======-->
<section class="breadcrumbs-area bg_cover"
    style="background-image: url(<?= $path ?>assets/images/bg/breadcrumb-bg-1.jpg);">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="breadcrumbs-content text-center">
                    <h1><?= $us['us_title'] ?></h1>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="<?= $path ?>service">Service</a></li>
                        <li class="active"><?= $us['us_title'] ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!--====== End breadcrumbs-area Section ======-->
<!--====== Start service-details-section Section ======-->
<section class="contact-area service-details-section pt-60 pb-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="service-details-wrapper">
                    <div class="title">
                        <h3><?= $service['service_title'] ?></h3>
                    </div>
                    <p style="color: 43baff;">Pakage : $ <?= $us['us_pkg'] ?> ( Extra Charges Will Be : $
                        <?= $us['us_ext_charges'] ?> )</p>
                    <div class="content-box">
                        <i class="flaticon-mechanic"></i>
                        <h4><?= $us['us_title'] ?></h4>
                        <P><?= $us['us_detail'] ?></P>
                    </div>
                    <!-- <img src="assets/images/service/single-service-1.jpg" class="img-fluid" alt=""> -->

                </div>
                <div class="contact-wrapper">
                    <div class="section-title mb-40">
                        <h3>Send Service Request</h3>
                    </div>
                    <?= showValidMsg(); ?>
                    <form action="<?= $path ?>service_request" method="post" class="book-form contact">
                        <input type="hidden" name="user_id" value="<?= $us['user_id'] ?>">
                        <input type="hidden" name="us_id" value="<?= $us['us_id'] ?>">
                        <input type="hidden" name="us_slug" value="<?= $us['us_slug'] ?>">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group select-group">
                                    <span class="label">Request Type</span>
                                    <select id="req_type" class="form-control" required name="req_type">
                                        <option value="once"
                                            <?= ($_POST['req_type'] == 'once' ? 'selected="selected"' : ''); ?>>
                                            At The Spot Booking</option>
                                        <option value="contract"
                                            <?= ($_POST['req_type'] == 'contract' ? 'selected="selected"' : ''); ?>>Contract Booking
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group select-group">
                                    <span class="label">Booking Duration</span>
                                    <select id="req_duration" class="form-control" required name="req_duration">
                                        <option value="once"
                                            <?= ($_POST['req_duration'] == 'once' ? 'selected="selected"' : ''); ?>>
                                            At The Spot</option>
                                        <option value="month"
                                            <?= ($_POST['req_duration'] == 'month' ? 'selected="selected"' : ''); ?>>Month
                                        </option>
                                        <option value="half"
                                            <?= ($_POST['req_duration'] == 'half' ? 'selected="selected"' : ''); ?>>half Year
                                        </option>
                                        <option value="year"
                                            <?= ($_POST['req_duration'] == 'year' ? 'selected="selected"' : ''); ?>>Year
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form_group">
                                    <input type="text" class="form_control alpha" placeholder="Enter Name"
                                        value="<?= $_POST['req_sender_name'] ?>" name="req_sender_name" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form_group">
                                    <input type="email" class="form_control" placeholder="Enter Email"
                                        value="<?= $_POST['req_sender_email'] ?>" name="req_sender_email" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form_group">
                                    <input type="text" class="form_control alpha" placeholder="Subject"
                                        value="<?= $_POST['req_subject'] ?>" name="req_subject" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form_group">
                                    <input type="text" class="form_control numeric" placeholder="Phone"
                                        value="<?= $_POST['req_sender_phone'] ?>" name="req_sender_phone" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form_group">
                                    <textarea class="form_control" placeholder="Message"
                                        value="<?= $_POST['req_message'] ?>" name="req_message"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form_button">
                                    <button class="main-btn">Send Service Request</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="sidebar-widget-area">
                    <div class="widget service-widget mb-40">
                        <h4 class="title">All Service <span class="float-right"><i class="fas fa-angle-down"></i></span>
                        </h4>
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