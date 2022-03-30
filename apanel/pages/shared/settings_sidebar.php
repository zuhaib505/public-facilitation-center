<ul class="list-group">
    <li <?= ($_REQUEST['page'] == 'site_settings') ? 'class="list_active"' : ''; ?> class="list-group-item"><a class="list_hover" href="<?= $apath; ?>site_settings"><strong>Site Settings</strong></a></li>
    <li <?= ($_REQUEST['page'] == 'site_social') ? 'class="list_active"' : ''; ?> class="list-group-item"><a class="list_hover" href="<?= $apath; ?>site_social"><strong>Social Media</strong></a></li>
    <li <?= ($_REQUEST['page'] == 'site_contact') ? 'class="list_active"' : ''; ?> class="list-group-item"><a class="list_hover" href="<?= $apath; ?>site_contact"><strong>Contact Info</strong></a></li>
    <!-- <li <?= ($_REQUEST['page'] == 'site_email') ? 'class="list_active"' : ''; ?> class="list-group-item"><a class="list_hover" href="<?= $apath; ?>site_email"><strong>Email Settings</strong></a></li> -->
    <li <?= ($_REQUEST['page'] == 'site_smtp') ? 'class="list_active"' : ''; ?> class="list-group-item"><a class="list_hover" href="<?= $apath; ?>site_smtp"><strong>SMTP Settings</strong></a></li>
    <li <?= ($_REQUEST['page'] == 'email') ? 'class="list_active"' : ''; ?> class="list-group-item"><a class="list_hover" href="<?= $apath; ?>email"><strong>Email Templates</strong></a></li>
    <li <?= ($_REQUEST['page'] == 'site_meta') ? 'class="list_active"' : ''; ?> class="list-group-item"><a class="list_hover" href="<?= $apath; ?>site_meta"><strong>Meta Tags</strong></a></li>
    <li <?= ($_REQUEST['page'] == 'site_scripts') ? 'class="list_active"' : ''; ?> class="list-group-item"><a class="list_hover" href="<?= $apath; ?>site_scripts"><strong>Scripts Settings</strong></a></li>
    <li <?= ($_REQUEST['page'] == 'site_captcha') ? 'class="list_active"' : ''; ?> class="list-group-item"><a class="list_hover" href="<?= $apath; ?>site_captcha"><strong>Captcha</strong></a></li>
    <!-- <li <?= ($_REQUEST['page'] == 'site_backup') ? 'class="list_active"' : ''; ?> class="list-group-item"><a class="list_hover" href="<?= $apath; ?>site_backup"><strong>Database Backup</strong></a></li> -->
</ul>