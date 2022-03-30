<div class="mdk-drawer  js-mdk-drawer" id="default-drawer" data-align="start">
    <div class="mdk-drawer__content">
        <div class="sidebar sidebar-dark bg-dark sidebar-left sidebar-p-t" style="overflow:scroll" data-perfect-scrollbar>
            <ul class="sidebar-menu">
                <li class="sidebar-menu-item <?= ($_REQUEST['page'] == 'index' || $_REQUEST['page'] == '') ? 'active' : ''; ?>">
                    <a class="sidebar-menu-button" href="<?= $apath; ?>">
                        <i class="sidebar-menu-icons sidebar-menu-icon--left material-icons">dvr</i>
                        <span class="sidebar-menu-text">Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-menu-item <?= ($_REQUEST['page'] == 'content_pages') ? 'active' : ''; ?>">
                    <a class="sidebar-menu-button" href="<?= $apath; ?>content_pages">
                        <i class="sidebar-menu-icons sidebar-menu-icon--left material-icons">insert_drive_file</i>
                        <span class="sidebar-menu-text">Manage Pages</span>
                    </a>
                </li>

                <li class="sidebar-menu-item <?= ($_REQUEST['page'] == 'text_header' || $_REQUEST['page'] == 'text_home_video' || $_REQUEST['page'] == 'text_newsletter' || $_REQUEST['page'] == 'text_footer') ? 'active' : ''; ?> ">
                    <a class="sidebar-menu-button" href="<?= $apath; ?>text_header">
                        <i class="sidebar-menu-icons sidebar-menu-icon--left material-icons">pages</i>
                        <span class="sidebar-menu-text">Home Page</span>
                    </a>
                </li>
                <li class="sidebar-menu-item <?= ($_REQUEST['page'] == 'services' || $_REQUEST['page'] == 'user_services' || $_REQUEST['page'] == 'professionals') ? 'active open' : ''; ?> ">
                    <a class="sidebar-menu-button" data-toggle="collapse" href="#menue_services">
                        <i class="sidebar-menu-icons sidebar-menu-icon--left material-icons">dashboard</i>
                        <span class="sidebar-menu-text">Professionals / Services</span>
                        <span class="ml-auto sidebar-menu-toggle-icon"></span>
                    </a>
                    <ul class="sidebar-submenu collapse" id="menue_services">
                        <li class="sidebar-menu-item <?= ($_REQUEST['page'] == 'services') ? 'active' : ''; ?>">
                            <a class="sidebar-menu-button" href="<?= $apath; ?>services">
                                <span class="sidebar-menu-text">Services</span>
                            </a>
                        </li>
                        <li class="sidebar-menu-item <?= ($_REQUEST['page'] == 'professionals') ? 'active' : ''; ?>">
                            <a class="sidebar-menu-button" href="<?= $apath; ?>professionals">
                                <span class="sidebar-menu-text">Professionals</span>
                            </a>
                        </li>
                        <li class="sidebar-menu-item <?= ($_REQUEST['page'] == 'user_services') ? 'active' : ''; ?>">
                            <a class="sidebar-menu-button" href="<?= $apath; ?>user_services">
                                <span class="sidebar-menu-text">User Services</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-menu-item <?= ($_REQUEST['page'] == 'subscribers') ? 'active' : ''; ?>">
                    <a class="sidebar-menu-button" href="<?= $apath; ?>subscribers">
                        <i class="sidebar-menu-icons sidebar-menu-icon--left material-icons">insert_drive_file</i>
                        <span class="sidebar-menu-text">Subscribers</span>
                    </a>
                </li>

                <li class="sidebar-menu-item <?= ($_REQUEST['page'] == 'email' || $_REQUEST['page'] == 'site_backup' || $_REQUEST['page'] == 'site_settings' || $_REQUEST['page'] == 'site_contact' || $_REQUEST['page'] == 'site_email' || $_REQUEST['page'] == 'site_smtp' || $_REQUEST['page'] == 'site_meta' || $_REQUEST['page'] == 'site_scripts' || $_REQUEST['page'] == 'site_social' || $_REQUEST['page'] == 'site_captcha') ? 'active' : ''; ?>">
                    <a class="sidebar-menu-button" href="<?= $apath; ?>site_settings">
                        <i class="sidebar-menu-icons sidebar-menu-icon--left material-icons">settings</i>
                        <span class="sidebar-menu-text">Settings</span>
                    </a>
                </li>
                <li class="sidebar-menu-item">
                    <a class="sidebar-menu-button" href="<?= $apath; ?>logout">
                        <i class="sidebar-menu-icons sidebar-menu-icon--left material-icons">power_settings_new</i>
                        <span class="sidebar-menu-text">Logout</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>