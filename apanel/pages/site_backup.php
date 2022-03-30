<div class="mdk-header-layout__content">
    <div class="mdk-drawer-layout js-mdk-drawer-layout" data-push data-responsive-width="992px">
        <div class="mdk-drawer-layout__content page">
            <div class="container-fluid page__container">
                <div class="page__heading d-flex align-items-center">
                    <div class="flex">
                        <h4 class="m-0"><i class="fa fa-image"></i> Database Backup</h4>
                    </div>
                    <a href="<?= $apath; ?><?= $page_uri; ?>?mode=add" class="btn btn-success ml-3">Create Backup <i class="fa fa-plus"></i></a>
                </div>
                <div class="row">
                    <div class="col-md-3">

                        <?php include_once("pages/shared/settings_sidebar.php"); ?>
                    </div>
                    <div class="col-md-9">
                        <div class="card">
                            <form name="updateForm" id="updateForm" action="" method="post">
                                <div class="table-responsive" data-toggle="lists" data-lists-values='["js-lists-values-employee-name"]'>
                                    <table class="table mb-0 thead-border-top-0 table-striped">
                                        <thead>
                                            <tr>
                                                <th style="width: 25%;">Date & Time</th>
                                                <th>File Name</th>
                                                <th width="15%" class="text-center">Delete</th>
                                                <th style="width: 15%;" class="text-center">Action</th>
                                                <!-- <th width="10%" class="text-center"><input type="checkbox" onclick="$('input[name*=\'slider_status\']').attr('checked', this.checked);" title="Select All"> Status</th>
                        <th width="10%" class="text-center"><input type="checkbox" onclick="$('input[name*=\'slider_delete\']').attr('checked', this.checked);" title="Select All"> Delete</th> -->
                                            </tr>
                                        </thead>
                                        <tbody class="list" id="listingTable">
                                            <?php
                                            $paging = getPaging('tbl_backup', "WHERE 1 ORDER BY backup_date DESC", 10, $_REQUEST['page'], '?', $_GET['pager']);
                                            $pagination = $paging[1];
                                            if ($rslider_pages = getList($paging[0])) {
                                                while ($row = fetch($rslider_pages)) {
                                                    $backup_id = $row['backup_id'];
                                            ?>
                                                    <tr>
                                                        <td>
                                                            <div class="badge badge-soft-dark"><?= $row['backup_date'] ?></div>
                                                        </td>
                                                        <td><?= stripslashes($row['backup_filename']); ?></td>

                                                        <td class="text-center">
                                                            <a href="<?= $apath; ?>site_backup?mode=delete&code=<?= $row['backup_id'] ?>" class="btn btn-sm btn-danger " onclick="return confirm('Are you sure you want to delete this page?');"><i class="fa fa-trash"></i> Delete</a>
                                                        </td>
                                                        <td class="text-center">
                                                            <a href="<?= $apath; ?><?= $page_uri; ?>?mode=download&code=<?= $row['backup_id'] ?>" class="btn btn-sm btn-primary"><i class="fa fa-download"></i>
                                                                Download</a>
                                                        </td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                                <tr>
                                                    <td colspan="7">
                                                        <div class="text-center"><?= $pagination; ?></div>
                                                    </td>
                                                </tr>
                                            <?
                                            } else {
                                            ?>
                                                <tr>
                                                    <td colspan="7" class="text-center">No Record Found</td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <?php include_once("pages/shared/sidebar.php"); ?>
    </div>
</div>