<?php
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
                    <a href="<?= $path ?>"><img src="<?= $path ?>assets/images/logo/logo-1.png" height="50px" alt="Public Facilitaion Center"></a>

                    <ul class="nav navbar-nav ml-auto d-none d-md-flex">

                        <li class="nav-item dropdown">
                            <a href="<?= $path; ?>" target="_blank" class="nav-link">
                                <i class="fa fa-globe"></i> Visit Website
                            </a>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav d-none d-sm-flex border-left navbar-height align-items-center">
                        <li class="nav-item dropdown">
                            <a href="#account_menu" class="nav-link dropdown-toggle" data-toggle="dropdown" data-caret="false">
                                <span class="mr-1 d-flex-inline">
                                    <span class="text-light"><?= $_SESSION['user_name'] ?></span>
                                </span>
                                <img src="<?= $path; ?>uploads/users/<?= $_SESSION['user_image'] ?>" class="rounded-circle" width="32" alt="Profile Image">
                            </a>
                            <div id="account_menu" class="dropdown-menu dropdown-menu-right">
                                <!-- <div class="dropdown-item-text dropdown-item-text--lh">
                                    <div><strong>Administrator</strong></div>
                                    <div class="text-muted">@adriandemian</div>
                                </div> -->
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item pop_menu_link <?= ($_REQUEST['page'] == 'product_cats' || $_REQUEST['page'] == 'home' || $_REQUEST['page'] == 'index') ? 'active' : ''; ?>" href="<?= $path; ?>user/"><i class="material-icons">dvr</i> Dashboard</a>
                                <a class="dropdown-item pop_menu_link <?= ($_REQUEST['page'] == 'change_profile') ? 'active' : ''; ?>" href="<?= $path; ?>user/change_profile"><i class="material-icons">info</i> Profile</a>
                                <a class="dropdown-item pop_menu_link <?= ($_REQUEST['page'] == 'change_password') ? 'active' : ''; ?>" href="<?= $path; ?>user/change_password"><i class="material-icons">lock</i> Change Password</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item pop_menu_link <?= ($_REQUEST['page'] == 'logout') ? 'active' : ''; ?>" href="<?= $path; ?>user/logout"><i class="material-icons">power_settings_new</i> Logout</a>
                            </div>
                        </li>
                    </ul>

                </div>
            </div>

        </div>
    </div>

<?php } ?>