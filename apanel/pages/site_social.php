<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

<?php
if (isset($_POST['formOne'])) {
    $vals = $_POST;
    unset($vals['formOne']);

    $new_vals['site_social_data'] = serialize($vals);
    updateRecord("tbl_siteadmin", $new_vals, " `site_id`= '1' ");
    $_SESSION['successMsg'] = 'Changing has been updated successfully !';
}

$rs = getField("tbl_siteadmin", " `site_id`= '1' ", "site_social_data");
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
"></i> Social Media</h4>
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
                                        <!-- <div class="form-group">
                                    <label for="field">Facebook Link</label>
                                    <div class="input-group input-group-merge mb-2">
                                        <input id="site_facebook"  name="site_facebook" value="<?= stripslashes($data['site_facebook']); ?>" type="text" class="form-control form-control-prepended" placeholder="Facebook">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <span class="fab fa-facebook"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                <?= formTextIconSocial('Facebook Link', 'site_facebook', $data['site_facebook'], 'facebook', 'text') ?>
                                <?= formTextIconSocial('Twitter Link', 'site_twitter', $data['site_twitter'], 'twitter', 'text') ?>
                                <?= formTextIconSocial('Skype Link', 'site_skype', $data['site_skype'], 'skype', 'text') ?>
                                <?= formTextIconSocial('Instagram Link', 'site_instagram', $data['site_instagram'], 'instagram', 'text') ?>
                                <?= formTextIconSocial('Pinterest Link', 'site_pinterest', $data['site_pinterest'], 'pinterest-p', 'text') ?>
                                        <!-- <div class="form-group">
                                            <label for="field">Facebook Link</label>
                                            <div class="form-group">
                                                <input type="text" name="site_facebook" id="site_facebook" value="<?= stripslashes($data['site_facebook']); ?>" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="field">Twitter Link</label>
                                            <div class="form-group">
                                                <input type="text" name="site_twitter" id="site_twitter" value="<?= stripslashes($data['site_twitter']); ?>" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="field">WhatsApp</label>
                                            <div class="form-group">
                                                <input type="text" name="site_whatsapp" id="site_whatsapp" value="<?= stripslashes($data['site_whatsapp']); ?>" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="field">Youtube Link</label>
                                            <div class="form-group">
                                                <input type="text" name="site_youtube" id="site_youtube" value="<?= stripslashes($data['site_youtube']); ?>" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="field">Linkedin Link</label>
                                            <div class="form-group">
                                                <input type="text" name="site_linkedin" id="site_linkedin" value="<?= stripslashes($data['site_linkedin']); ?>" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="field">Skype Link</label>
                                            <div class="form-group">
                                                <input type="text" name="site_skype" id="site_skype" value="<?= stripslashes($data['site_skype']); ?>" class="form-control" />
                                            </div>
                                        </div> -->
                                        <!-- <div class="form-group">
                                    <label for="field">Facebook Link</label>
                                    <div class="form-group">
                                        <input type="text" name="site_facebook" id="site_instagram" value="<?= stripslashes($data['site_facebook']); ?>" class="form-control" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="field">Twitter Link</label>
                                    <div class="form-group">
                                        <input type="text" name="site_twitter" id="site_twitter" value="<?= stripslashes($data['site_twitter']); ?>" class="form-control" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="field">Linkedin Link</label>
                                    <div class="form-group">
                                        <input type="text" name="site_linkedin" id="site_linkedin" value="<?= stripslashes($data['site_linkedin']); ?>" class="form-control" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="field">WhatsApp Link</label>
                                    <div class="form-group">
                                        <input type="text" name="site_whatsapp" id="site_whatsapp" value="<?= stripslashes($data['site_whatsapp']); ?>" class="form-control" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="field">Instagram Link</label>
                                    <div class="form-group">
                                        <input type="text" name="site_instagram" id="site_instagram" value="<?= stripslashes($data['site_instagram']); ?>" class="form-control" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="field">Youtube Link</label>
                                    <div class="form-group">
                                        <input type="text" name="site_youtube" id="site_youtube" value="<?= stripslashes($data['site_youtube']); ?>" class="form-control" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="field">Pinterest Link</label>
                                    <div class="form-group">
                                        <input type="text" name="site_pinterest" id="site_pinterest" value="<?= stripslashes($data['site_pinterest']); ?>" class="form-control" />
                                    </div>
                                </div> -->
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