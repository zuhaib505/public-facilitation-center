<?
if (isset($_REQUEST['formOne']) && $_REQUEST['formOne'] == 'posted') {

    if ($_SESSION['admin_type'] == 'SuperAdmin') {

        if ($ex = getList("SELECT * FROM tbl_siteadmin WHERE site_pswd='" . doEncode($_REQUEST['admin_opswd']) . "' ")) {

            if ($_REQUEST['admin_pswd'] == $_REQUEST['admin_cpswd']) {

                $sql = "UPDATE 	 tbl_siteadmin 

						SET 		site_pswd     	=  '" . doEncode($_REQUEST['admin_pswd']) . "'

						WHERE		site_id			=  '1' ";



                $ex = exQuery($sql);

                $_SESSION['successMsg'] = 'Password has been updated successfully !';
            } else {

                $_SESSION['errorMsg'] = 'Password and its confirmation not matched !';
            }
        } else {

            $_SESSION['errorMsg'] = 'Invalid old password, try again !';
        }
    }
}
?>

<div class="mdk-header-layout__content">
    <div class="mdk-drawer-layout js-mdk-drawer-layout" data-push data-responsive-width="992px">
        <div class="mdk-drawer-layout__content page">
            <div class="container-fluid  page__heading-container">
                <div class="page__heading">
                    <div class="row">
                        <div class="col"><?= showMsg(); ?></div>
                    </div>
                    <h4 class="m-0"><i class="fa fa-lock"></i> Change Password</h4>
                </div>
            </div>

            <div class="container-fluid page__container">
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
                            <div class="col-lg-6 offset-3 card-form__body card-body">
                                <div class="form-group">
                                    <label for="field">Old Password</label>
                                    <input type="text" name="admin_opswd" id="admin_opswd" required="required" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label for="field">New Password</label>
                                    <input type="text" name="admin_pswd" id="admin_pswd" required="required" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label for="field">Confirm New Password</label>
                                    <input type="text" name="admin_cpswd" id="admin_cpswd" required="required" class="form-control" />
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
        <?php include_once("pages/shared/sidebar.php"); ?>
    </div>
</div>