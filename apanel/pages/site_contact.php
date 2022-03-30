<?php
if (isset($_POST['formOne'])) {
    $vals = $_POST;
    unset($vals['formOne']);

    $new_vals['site_contact_data'] = serialize($vals);
    updateRecord("tbl_siteadmin", $new_vals, " `site_id`= '1' ");
    $_SESSION['successMsg'] = 'Changing has been updated successfully !';
}

$rs = getField("tbl_siteadmin", " `site_id`= '1' ", "site_contact_data");
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
                    <h4 class="m-0"><i class="fa fa-cog"></i> Site Settings <i class="fa fa-chevron-right
"></i> Contact Info</h4>
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

                                        <?= formTextIcon('Email', 'site_email', $data['site_email'], 'envelope', 'email') ?>
                                        <?= formTextIcon('Fax', 'site_fax', $data['site_fax'], 'envelope', 'email') ?>
                                        <?= formTextIcon('Phone', 'site_phone', $data['site_phone'], 'phone', 'text') ?>
                                        <?= formTextIcon('Phone 2', 'site_phone2', $data['site_phone2'], 'phone', 'text') ?>
                                        <?= formTextIcon('Address', 'site_address', $data['site_address'], 'map-marker', 'text') ?>
                                        <?= formTextIcon('Website', 'site_website', $data['site_website'], 'globe', 'text') ?>
                                        <?= formTextArea('Contact Map Link', 'site_map', $data['site_map'], 2); ?>
                                        <? #= formTextIcon('Timings 1', 'site_timings', $data['site_timings'], 'calendar') 
                                        ?>
                                        <? #= formTextIcon('Timings 2', 'site_timings2', $data['site_timings2'], 'calendar') 
                                        ?>
                                        <? #= formTextArea('Timings', 'site_timings', $data['site_timings'], 3) 
                                        ?>
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