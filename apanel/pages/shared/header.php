<?php
if ((!isset($_SESSION['admin_id']) || empty($_SESSION['admin_id'])) && $_REQUEST['page'] != 'login') {
    redirectTo('apanel/login');
    exit;
}
if ($_REQUEST['page'] != 'login') {
?>
    <div id="header" class="mdk-header js-mdk-header m-0" data-fixed>
        <div class="mdk-header__content">
            <div class="navbar navbar-expand-sm navbar-main navbar-light bg-white pr-0" id="navbar" data-primary>
                <div class="container-fluid p-0">
                    <!-- Navbar toggler -->
                    <button class="navbar-toggler navbar-toggler-right d-block d-lg-none" type="button" data-toggle="sidebar">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <!-- Navbar Brand -->
                    <a href="<?= $path; ?>" class="navbar-brand">
                        <img src="<?= $path ?>uploads/logo/<?= $site_logo ?>" style="height:60px;" class="mr-3">
                    </a>

                    <ul class="nav navbar-nav ml-auto d-none d-md-flex">

                        <li class="nav-item dropdown">
                            <a href="<?= $path; ?>" target="_blank" class="nav-link">
                                <i class="fa fa-globe"></i> Website Preview
                            </a>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav d-none d-sm-flex border-left navbar-height align-items-center">
                        <li class="nav-item dropdown">
                            <a href="#account_menu" class="nav-link dropdown-toggle" data-toggle="dropdown" data-caret="false">
                                <span class="mr-1 d-flex-inline">
                                    <span class="text-light">Admin</span>
                                </span>
                                <img src="<?= $apath; ?>assets/images/avatar.png" class="rounded-circle" width="32" alt="Frontted">
                            </a>
                            <div id="account_menu" class="dropdown-menu dropdown-menu-right">
                                <div class="dropdown-item-text dropdown-item-text--lh">
                                    <div><strong>Administrator</strong></div>
                                    <!-- <div class="text-muted">@adriandemian</div> -->
                                </div>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?= $apath; ?>"><i class="material-icons">dvr</i> Dashboard</a>
                                <a class="dropdown-item" href="<?= $apath; ?>change_password"><i class="material-icons">lock</i> Change Password</a>
                                <a class="dropdown-item" href="<?= $apath; ?>site_settings"><i class="fa fa-cog material-icons"></i> Settings</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?= $apath; ?>logout"><i class="material-icons">power_settings_new</i> Logout</a>
                            </div>
                        </li>
                    </ul>

                </div>
            </div>

        </div>
    </div>

<?php } ?>