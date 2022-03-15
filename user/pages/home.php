<div class="mdk-header-layout__content">
    <div class="mdk-drawer-layout js-mdk-drawer-layout" data-push data-responsive-width="992px">
        <div class="mdk-drawer-layout__content page">
            <div class="container-fluid page__container mt-5">
                <div class="row card-group-row">
                    <?php
                    $home_links = array(
                        "user_services" => array("file-alt", "Services"),
                        "change_profile" => array("user", "Change Profile"),
                        "change_password" => array("lock", "Change Password"),
                        "logout" => array("power-off", "Logout"),
                    );
                    foreach ($home_links as $link => $rs) {
                        $fa = $rs[0];
                        $text = $rs[1];
                    ?>
                        <div class="col-lg-3 col-md-4 card-group-row__col">
                            <a href="<?= $path . 'user/' . $link; ?>" class="card card-group-row__card text-dark">
                                <div>
                                    <div class="p-2 d-flex flex-row align-items-center">
                                        <div class="avatar avatar-xs mr-2">
                                            <span class="avatar-title rounded-circle text-center bg-primary-1">
                                                <i class="text-white icon-18pt fa  fa-<?= $fa; ?>"></i>
                                            </span>
                                        </div>
                                        <div>
                                            <strong><?= $text; ?></strong>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <?php include_once("pages/shared/sidebar.php"); ?>
    </div>
</div>