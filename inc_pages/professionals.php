<style>
.filter-option {
    display: flex;
    align-items: center;
}

.dropdown.bootstrap-select {

    border: 1px solid #e1e1e1;
}

.dropdown.bootstrap-select .btn.dropdown-toggle {
    height: 50px;
    background-color: #fff
}

.dropdown.bootstrap-select .filter-option-inner {
    color: #6d6d6d;
}

.search-box1 {
    border: 1px solid #e1e1e1;
    padding: 16px;
}

.search-box1 .inp-box {
    display: flex;
    width: 100%;
    align-items: center;
}

.search-box1 .inp-box .form-group {

    margin: 0px !important;
}

.search-btn {
    background: linear-gradient(45deg, #43baff, #43baff, #43baff);
    ;
    color: #fff;
    overflow: hidden;
    padding: 5px 10px;
    outline: 0 !important;
    box-shadow: none !important;
    height: 50px;
    border-radius: 5px;
    width: 100%;
    font-size: 16px;
    font-weight: bold;
}

.search-btn i {
    font-size: 14px;
    margin-right: 6px;
}

.search-btn:hover {
    color: #fff;

}
</style>
<!--====== Start breadcrumbs-area Section ======-->
<section class="breadcrumbs-area bg_cover" style="background-image: url(assets/images/bg/breadcrumb-bg-1.jpg);">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="breadcrumbs-content text-center">
                    <h1>Professionals</h1>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li class="active">Professionals</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!--====== End breadcrumbs-area Section ======-->
<!--====== Start service-area Section ======-->
<section class="service-area service-area-v2 pt-50">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="section-title text-center mb-60">
                    <span class="span">Professionals</span>
                    <h2>Our Best Professionals</h2>
                </div>
            </div>
        </div>
        <div class="row mb-30">
            <div class="col-md-12">
                <div class="search-box1">
                    <form method="get">
                        <div class="row">
                            <div class="col-md-5 inp-box">
                                <div class="form_group w-100">
                                    <input type="text" class="form_control" value="<?= $_REQUEST['search'] ?>"
                                        placeholder="Search your keyword" name="search">
                                </div>
                            </div>
                            <div class="col-lg-5 inp-box">
                                <div class="form-group w-100 select-group">
                                    <?php

                                        ?>
                                    <select id="category" class="form-control category" name="category"
                                        data-live-search="true">
                                        <option value="" <?= $_REQUEST['category'] ?: 'selected' ?>>All Services
                                        </option>
                                        <?php
                                            $paging =  "SELECT * FROM tbl_services  WHERE service_status='1' ORDER BY service_order DESC";
                                            $cat_exe = $conn->query($paging) or die(mysqli_error($conn));

                                            while ($category = $cat_exe->fetch_array()) {
                                            ?>
                                        <option value="<?= $category['service_slug'] ?>"
                                            <?= ($_REQUEST['category'] == $category['service_slug'] ? 'selected="selected"' : ''); ?>>
                                            <?= ucwords(strtolower($category['service_title'])) ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-2 inp-box">
                                <button type="submit" class="btn search-btn">
                                    <i class="flaticon-search-interface-symbol"></i>Search</button>
                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>
        <div class="row">
            <?php
                $where = "";
                if (!empty($_REQUEST['category'])) {
                    $cat = getServiceByServiceSlug($_REQUEST['category']);
                    $where .= " AND service_id = '" . $cat['service_id'] . "' ";
                }
                if (!empty($_REQUEST['search'])) {
                    $like = " AND (
                        user_slug LIKE  '%" . $_REQUEST['search'] . "%' 
                     OR user_city LIKE '%" . $_REQUEST['search'] . "%' 
                     OR user_location LIKE '%" . $_REQUEST['search'] . "%' 
                     OR user_name LIKE '%" . $_REQUEST['search'] . "%' 
                     OR user_username LIKE '%" . $_REQUEST['search'] . "%' 
                     OR user_email LIKE '%" . $_REQUEST['search'] . "%'
                     OR user_contact LIKE '%" . $_REQUEST['search'] . "%' )
                    ";
                }

                $paging1 =  "SELECT * FROM tbl_users  WHERE
                
                 user_status='1'
                 " . $where . " " .   $like . "
                  ORDER BY user_order DESC";
                $exe1 = $conn->query($paging1) or die(mysqli_error($conn));
                $total_products =  $exe1->num_rows;
                if ($total_products) {
                    while ($user = $exe1->fetch_array()) {
                        $service = getServiceByServiceId($user['service_id']);
                        
                ?>
            <div class="col-lg-4">
                <div class="service-item mb-50">
                    <div class="icon">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="info">
                        <h4><?= $user['user_name'] ?></h4>
                        <p><?= $service['service_title'] ?></p>
                        <p><?= $user['user_location'] ?></p>
                        <a href="<?= $path ?>profile/<?= doEncode($user['user_id']) ?>" class="btn_link"><i
                                class="fas fa-eye"></i> Visit Profile</a>
                    </div>
                </div>
            </div>
            <?php }
                } else {
                    ?>
            <div class="d-flex w-100 pt-5 justify-content-center align-items-center">
                <h4>No Professional found</h4>

            </div>
            <?php
                }
                ?>


        </div>
    </div>
</section>
<!--====== End service-area Section ======-->