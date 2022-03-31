<?php
if (isset($_POST['formOne'])) {
    $vals = $_POST;
    $status=true;
    unset($vals['formOne']);

    if ($img_rs = uploadImage($_FILES["site_logo"], "../uploads/logo/", 197)) {
        $vals['site_logo'] = $img_rs;
    }

    if ($img_rs = uploadImage($_FILES["login_image"], "../uploads/banners/", 1310)) {
        $vals['login_image'] = $img_rs;
    }
    if($status){
    $new_vals['site_info_data'] = serialize($vals);
    updateRecord("tbl_siteadmin", $new_vals, " `site_id`= '1' ");

    $_SESSION['successMsg'] = 'Changes has been updated successfully !';
    }
}

$rs = getField("tbl_siteadmin", " `site_id`= '1' ", "site_info_data");
$data = unserialize(stripslashes($rs));
?>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>
<script>
    $(document).ready(function() {
        $('#timezone').selectpicker();
    })
</script>
<div class="mdk-header-layout__content">
    <div class="mdk-drawer-layout js-mdk-drawer-layout" data-push data-responsive-width="992px">
        <div class="mdk-drawer-layout__content page">
            <div class="container-fluid  page__heading-container">
                <div class="page__heading">
                    <div class="row">
                        <div class="col"><?= showMsg(); ?></div>
                    </div>
                    <!-- <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="#"><i class="material-icons icon-20pt">home</i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Account</li>
                        </ol>
                    </nav> -->
                    <h4 class="m-0"><i class="fa fa-cog"></i> Settings <i class="fa fa-chevron-right
"></i> General Settings</h4>
                    </h4>
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
                                    <!-- <div class="col-md-3">
                                <ul class="list-group">
                                    <li class="list-group-item active"><a href="#" class="text-white"><strong>All Threads</strong></a></li>
                                    <li class="list-group-item"><a href="#"><strong> Posts</strong></a></li>
                                    <li class="list-group-item"><a href="#"><strong>Following</strong></a></li>
                                    <li class="list-group-item"><a href="#"><strong>Resolved</strong></a></li>
                                    <li class="list-group-item"><a href="#"><strong>Unresolved</strong></a></li>
                                </ul>
                            </div> -->
                                    <div class="col-lg-10 offset-1 card-form__body card-body">
                                        <?= formText('Site Name', 'site_name', $data['site_name']); ?>
                                        <?= formText('Domain Name', 'site_domain', $data['site_domain']); ?>
                                        <?= formText('Site Version', 'site_version', $data['site_version']); ?>
                                        <?= formImageFile('Site Primary Logo', 'site_logo', $data['site_logo'], '197px X 57px', 'logo') ?>
                                        <?= formImageFile('Site Login Banner', 'login_image', $data['login_image'], '1310px X 627px', 'banners') ?>
                                        <? #= formImageFile('Site Secondary Logo', 'sec_logo', $data['sec_logo'], '', 'logo') 
                                        ?>
                                        <div class="form-group">
                                            <label for="timezone">Timezone</label>
                                            <select name="timezone" id="timezone" class="form-control" data-live-search="true">
                                                <?php
                                                $res = getTimezone();
                                                foreach ($res as $key => $val) {

                                                ?>
                                                    <option value="<?= $key ?>" <?= ($data['timezone'] == $key ? 'selected="selected"' : ''); ?>><?= ($val); ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <!-- <div class="row p-3">
                                            <div class="col-md-6 card">
                                                <div class="form-group">
                                                    <label for="subscribe">Website Offline Status</label><br>
                                                    <div class="custom-control custom-checkbox-toggle custom-control-inline mr-1">
                                                        <input type="checkbox" id="site_status" name="site_status" value="1" <?= ($data['site_status'] == '1' ? 'checked=""' : ''); ?> class="custom-control-input">
                                                        <label class="custom-control-label" for="site_status">Active</label>
                                                    </div>
                                                </div>
                                            </div> -->
                                        <!-- <div class="col-md-6 card">
                                                <div class="form-group">
                                                    <label for="subscribe">Translation Status</label><br>
                                                    <div class="custom-control custom-checkbox-toggle custom-control-inline mr-1">
                                                        <input type="checkbox" id="site_translate" name="site_translate" value="1" <?= ($data['site_translate'] == '1' ? 'checked=""' : ''); ?> class="custom-control-input">
                                                        <label class="custom-control-label" for="site_translate">Active</label>
                                                    </div>
                                                </div>
                                            </div> 
                                        </div>

                                         formTextArea('Site Offline Message', 'site_msg', $data['site_msg']); -->
                                    </div>
                                </div>



                                <div class="text-center mb-3">
                                    <hr>
                                    <!-- <button type="submit" class="btn btn-lg btn-success"><i class="fa fa-save"></i> Save</button> -->

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