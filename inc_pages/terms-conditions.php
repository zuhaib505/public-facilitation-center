<?php
$pagename = $_REQUEST['page'];
$paging =  "SELECT * FROM tbl_pages WHERE page_name='" . $pagename . "'";
$exe = $conn->query($paging) or die(mysqli_error($conn));
$page = $exe->fetch_assoc();
?>
    <!--====== Start breadcrumbs-area Section ======-->
    <section class="breadcrumbs-area bg_cover" style="background-image: url(assets/images/bg/breadcrumb-bg-1.jpg);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="breadcrumbs-content text-center">
                        <h1>Terms & Conditions</h1>
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li class="active">Terms-Conditions</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--====== End breadcrumbs-area Section ======-->
    <!--====== Start service-details-section Section ======-->
    <section class="service-details-section pt-120 pb-120">
        <?= $page['page_detail'] ?>
    </section>
    <!--====== End service-details-section Section ======-->