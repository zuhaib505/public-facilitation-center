<?php
if (isset($_POST['formOne'])) {
    $vals = $_POST;
    unset($vals['formOne']);

    $new_vals['site_captcha'] = serialize($vals);
    updateRecord("tbl_siteadmin", $new_vals, " `site_id`= '1' ");
    $_SESSION['successMsg'] = 'Changing has been updated successfully !';
}

$rs = getField("tbl_siteadmin", " `site_id`= '1' ", "site_captcha");
$data = unserialize(stripslashes($rs));
?>
<div class="mdk-header-layout__content">
    <div class="mdk-drawer-layout js-mdk-drawer-layout" data-push data-responsive-width="992px">
        <div class="mdk-drawer-layout__content page">
            <div class="container-fluid  page__heading-container">
                <div class="page__heading">
                    <div class="row">
                        <div class="col"><?= showMsg(); ?></div>
                    </div>
                    <h4 class="m-0"><i class="fa fa-cog"></i> Settings <i class="fa fa-chevron-right
"></i> Captcha</h4>
                </div>
            </div>

            <div class="container-fluid page__container">
                <div class="row">
                    <div class="col-md-3">
                    <?php include_once("pages/shared/settings_sidebar.php"); ?>
                    </div>

                    <div class="col-md-9">
                        <form action="" id="form1" method="post" class="form-horizontal" enctype="multipart/form-data">
                            <input type="hidden" name="formOne" id="formOne" value="posted" />
                            <div class="card card-form">
                                <div class="row no-gutters">

                                    <div class="col-lg-10 offset-1 card-form__body card-body">

                                        <!-- <div class="card">
                                            <div class="row p-3">
                                                <div class="container col-md-10"><label for="title">Module Status</label></div>
                                                <div class="container col-md-2">
                                                    <div class="custom-control custom-checkbox-toggle custom-control-inline mr-1">
                                                        <input type="checkbox" id="captcha_status" name="captcha_status" value="1" <?= ($data['captcha_status'] == '1' ? 'checked=""' : ''); ?> class="custom-control-input">
                                                        <label class="custom-control-label" for="captcha_status">Active</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->
                                        <div class="form-group">
                                            <label for="field">Admin Key</label>
                                            <div class="form-group">
                                                <input type="text" name="admin_key" id="admin_key" value="<?= stripslashes($data['admin_key']); ?>" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="field">Public Key</label>
                                            <div class="form-group">
                                                <input type="text" name="public_key" id="public_key" value="<?= stripslashes($data['public_key']); ?>" class="form-control" />
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="text-center mb-3">
                                    <hr>
                                    <a href="<?= $apath; ?>" class=" btn btn-default btn-lg"> <i class="fa fa-arrow-left"></i> Cancel</a> &nbsp;
                                    <button type="submit" class=" btn btn-primary btn-lg"> <i class="fa fa-save"></i> Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php include_once("pages/shared/sidebar.php"); ?>
    </div>
</div>