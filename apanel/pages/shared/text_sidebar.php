<ul class="list-group">
    <li <?= ($_REQUEST['page'] == 'text_header') ? 'class="list_active"' : ''; ?> class="list-group-item"><a class="list_hover" href="<?= $apath; ?>text_header"><strong>Header</strong></a></li>
    <li <?= ($_REQUEST['page'] == 'text_newsletter') ? 'class="list_active"' : ''; ?> class="list-group-item"><a class="list_hover" href="<?= $apath; ?>text_newsletter"><strong>Newsletter</strong></a></li>
    <li <?= ($_REQUEST['page'] == 'text_footer') ? 'class="list_active"' : ''; ?> class="list-group-item"><a class="list_hover" href="<?= $apath; ?>text_footer"><strong>Footer</strong></a></li>
</ul>