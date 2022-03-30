<?php
if (isset($_POST['formThree'])) {
    $vals = $_POST;
    unset($vals['formThree']);

    $new_vals['site_meta_data'] = serialize($vals);
    updateRecord("tbl_siteadmin", $new_vals, " `site_id`= '1' ");
    $_SESSION['successMsg'] = 'Changing has been updated successfully !';
}

$rs = getField("tbl_siteadmin", " `site_id`= '1' ", "site_meta_data");
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
"></i> Meta Tags</h4>
                </div>
            </div>

            <div class="container-fluid page__container">
                <div class="row">
                    <div class="col-md-3">
                    
                    <?php include_once("pages/shared/settings_sidebar.php"); ?>
                    </div>

                    <div class="col-md-9">
                        <form action="" id="form1" method="post" class="form-horizontal" enctype="multipart/form-data">
                            <input type="hidden" name="formThree" id="formThree" value="posted" />
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

                                        <?= formText('Meta Title', 'site_meta_title', $data['site_meta_title']); ?>
                                        <?= formTextArea('Meta Description', 'site_meta_description', $data['site_meta_description']); ?>
                                        <?= formTextArea('Meta Keywords', 'site_meta_keywords', $data['site_meta_keywords']); ?>
                                        <?= formText('Meta Copyright', 'site_meta_copyright', $data['site_meta_copyright']); ?>
                                        <?= formText('Meta Author', 'site_meta_author', $data['site_meta_author']); ?>
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