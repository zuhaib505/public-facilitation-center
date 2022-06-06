<div class="mdk-drawer  js-mdk-drawer" id="default-drawer" data-align="start">
    <div class="mdk-drawer__content">
        <div class="sidebar sidebar-dark bg-dark sidebar-left sidebar-p-t" style="overflow:scroll" data-perfect-scrollbar>
            <ul class="sidebar-menu">
                <li class="sidebar-menu-item <?= ($_REQUEST['page'] == 'index' || $_REQUEST['page'] == '') ? 'active' : ''; ?>">
                    <a class="sidebar-menu-button" href="<?= $path ?>user/">
                        <i class="sidebar-menu-icons sidebar-menu-icon--left material-icons">dvr</i>
                        <span class="sidebar-menu-text">Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-menu-item <?= ($_REQUEST['page'] == 'user_services') ? 'active' : ''; ?>">
                    <a class="sidebar-menu-button" href="<?= $path ?>user/user_services">
                        <i class="sidebar-menu-icons sidebar-menu-icon--left material-icons">insert_drive_file</i>
                        <span class="sidebar-menu-text">Services</span>
                    </a>
                </li>
                <li class="sidebar-menu-item <?= ($_REQUEST['page'] == 'requests') ? 'active' : ''; ?>">
                    <a class="sidebar-menu-button" href="<?= $path ?>user/requests">
                        <i class="sidebar-menu-icons sidebar-menu-icon--left material-icons">insert_drive_file</i>
                        <span class="sidebar-menu-text">Requests</span>
                    </a>
                </li>

                <li class="sidebar-menu-item <?= ($_REQUEST['page'] == 'change_profile') ? 'active' : ''; ?>">
                    <a class="sidebar-menu-button" href="<?= $path ?>user/change_profile">
                        <i class="sidebar-menu-icons sidebar-menu-icon--left material-icons">info</i>
                        <span class="sidebar-menu-text">Profile Info</span>
                    </a>
                </li>
                <li class="sidebar-menu-item <?= ($_REQUEST['page'] == 'change_password') ? 'active' : ''; ?>">
                    <a class="sidebar-menu-button" href="<?= $path ?>user/change_password">
                        <i class="sidebar-menu-icons sidebar-menu-icon--left material-icons">settings</i>
                        <span class="sidebar-menu-text">Change Password</span>
                    </a>
                </li>
                <li class="sidebar-menu-item">
                    <a class="sidebar-menu-button" href="<?= $path ?>user/logout">
                        <i class="sidebar-menu-icons sidebar-menu-icon--left material-icons">power_settings_new</i>
                        <span class="sidebar-menu-text">Logout</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>