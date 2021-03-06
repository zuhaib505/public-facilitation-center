        <!--====== Start breadcrumbs-area Section ======-->
        <section class="breadcrumbs-area bg_cover" style="background-image: url(assets/images/bg/breadcrumb-bg-1.jpg);">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="breadcrumbs-content text-center">
                            <h1>Register Yourself</h1>
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li class="active">Register</li>
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
                    <div class="offset-3 col-lg-6">
                        <div class="contact-wrapper">
                            <div class="section-title mb-40">
                                <h3>Register Yourself</h3>
                            </div>
                            <?= showValidMsg(); ?>
                            <form method="post" class="contact-form1 card p-5" enctype="multipart/form-data">
                                <div class="row">
                                <div class="col-lg-12">
                                        <div class="form_group">
                                            <label for="user">Please Select A Service</label>
                                            <select style="height: 50px; border-radius: 0px; margin-bottom: 28px;" name="service_id" id="service_id" class="form-control">
                                        <?php
                                            $service_qry =  "SELECT * FROM tbl_services  WHERE service_status='1' ORDER BY service_order ASC";
                                            $service_exe = $conn->query($service_qry) or die(mysqli_error($conn));
                                            while ($service = $service_exe->fetch_array()) {
                                                $service_id = $service['service_id'];
                                            ?>
                                        <option value="<?= $service_id ?>"
                                            <?= ($data['service_id'] == $service['service_id'] ? 'selected="selected"' : ''); ?>>
                                            <?= $service['service_title'] ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form_group">
                                            <input type="text" class="form_control alpha" placeholder="Enter Name" value="<?= $_POST['user_name'] ?>" name="user_name" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form_group">
                                            <input type="email" class="form_control alphanumeric" placeholder="Enter Email" value="<?= $_POST['user_email'] ?>" name="user_email" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form_group">
                                            <input type="text" class="form_control numeric" placeholder="Enter Contact Number" value="<?= $_POST['user_contact'] ?>" name="user_contact" required>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-12">  
                                        <div class="form-group">
                                            <input style="height:46px;border-radius: 0px;" type="file" class="form-control" name="user_profile_image" id="user_profile_image" />
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form_group">
                                            <input type="password" class="form_control" placeholder="password" name="user_password" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form_group">
                                            <input type="password" class="form_control" placeholder="c_password" name="c_password" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form_button">
                                            <button name="submit" type="submit" class="main-btn">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--====== End Contact-area Section ======-->