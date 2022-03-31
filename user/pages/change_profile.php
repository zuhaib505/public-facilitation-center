<?php


if (isset($_REQUEST['formOne']) && $_REQUEST['formOne'] == 'posted') {
    unset($_POST['formOne']);
    $vals = $_POST;
    unset($vals['submit']);
    $status=true;
    if ($_SESSION['user_id']) {
        $id = $_SESSION['user_id'];
        if ($ex = getList("SELECT * FROM tbl_users WHERE user_id='" . $id . "' ")) {

            if (!empty($vals['user_name'] || $vals['user_email'] || $vals['user_username'] || $vals['user_location'] || $vals['user_city'])) {
                if ($img_rs = uploadImage($_FILES["user_profile_image"], "../uploads/users/", 720)) {
                    $vals['user_profile_image'] = $img_rs;
                }
                if($status){
                updateRecord("tbl_users", $vals, " `user_id` = '" . $id . "' ");
                $_SESSION['successMsg'] = 'Profile has been updated successfully !';

                }
            } else {
                $status=false;
                $_SESSION['errorMsg'] = 'Please Fill All The Field In The Form !';
            }
        } else {
            $status=false;
            $_SESSION['errorMsg'] = 'No User Found, try again !';
        }
    }
}

if (!empty($_SESSION['user_id']))
    $data = getTable('tbl_users', "user_id = '" . $_SESSION['user_id'] . "'");
echo $_SESSION['user_id'];
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
<style>
    .bootstrap-select .dropdown-menu li {
        padding: 0px 15px;
    }
</style>
<div class="mdk-header-layout__content">
    <div class="mdk-drawer-layout js-mdk-drawer-layout" data-push data-responsive-width="992px">
        <div class="mdk-drawer-layout__content page">
            <div class="container-fluid  page__heading-container">
                <div class="page__heading">
                    <div class="row">
                        <div class="col"><?= showMsg(); ?></div>
                    </div>
                    <h4 class="m-0"><i class="fa fa-user"></i> Edit Profile</h4>
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
                            <div class="col-lg-10 offset-1 card-form__body card-body">
                                <?= formText('Name', 'user_name', $data['user_name']) ?>
                                <?= formText('Email', 'user_email', $data['user_email']) ?>
                                <?= formText('UserName', 'user_username', $data['user_username']) ?>
                                <?= formText('City', 'user_city', $data['user_city']) ?>
                                <?= formText('Location', 'user_location', $data['user_location']) ?>
                                <?= formImageFile('Image', 'user_profile_image', $data['user_profile_image'], ' 720px', 'users') ?>
                            </div>

                        </div>
                        <div class="text-center mb-3">
                            <hr>
                            <a href="<?= $apath; ?>" class=" btn btn-default btn-lg"> <i class="fa fa-arrow-left"></i> Cancel</a> &nbsp;
                            <button type="submit" class=" btn btn-primary submit-btn btn-lg"> <i class="fa fa-save"></i> Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <?php include_once("pages/shared/sidebar.php"); ?>
    </div>
</div>
<script>
    $(document).ready(function() {
        $("#made_mem_type").selectpicker()
        $("#mega_mem_type").selectpicker()
        $("#city_select").selectpicker()

        $("#country").selectpicker().on("change", function() {
            if ($(this).val() === "Pakistan") {
                $(".cities-select").show()
                $(".cities-select select").attr("required", true)
                $(".cities-input").hide()
                $(".cities-input input").attr("required", false)

            } else {
                $(".cities-select").hide()
                $(".cities-select select").attr("required", false)
                $(".cities-input").show()
                $(".cities-input input").attr("required", true)

            }
        })

        $('.submit-btn').click(function() {

            if ($('input[name="service2"]').is(':checked')) {
                $(".next-form2").show()
            } else {
                $(".next-form2").remove();
            }
        })


        $('input[name="service2"]').on("change", function() {
            if ($('input[name="service2"]').is(':checked')) {
                $(".next-form2").show()

            } else {
                $(".next-form2").hide();
            }
        })

    })
</script>