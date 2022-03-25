<?php if ($_REQUEST['mode'] == 'update' || $_REQUEST['mode'] == 'add') {
?>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

    <div class="mdk-header-layout__content">
        <div class="mdk-drawer-layout js-mdk-drawer-layout" data-push data-responsive-width="992px">
            <div class="mdk-drawer-layout__content page">
                <div class="container-fluid  page__heading-container">
                    <div class="page__heading">
                        <h4 class="m-0"><i class="fa fa-image"></i> Manage Service <i class="fa fa-chevron-right"></i> Create / Update</h4>
                    </div>
                </div>
                <div class="container-fluid page__container">
                    <form action="" id="form1" method="post" class="form-horizontal" enctype="multipart/form-data">
                        <div class="card card-form">
                            <div class="row no-gutters">
                                <div class="col-lg-10 offset-1 card-form__body card-body">

                                    <?= formText('Title', 'us_title', $data['us_title']) ?>
                                    <?= formText('Pakage', 'us_pkg', $data['us_pkg']) ?>
                                    <?= formText('Extra Charges', 'us_ext_charges', $data['us_ext_charges']) ?>
                                    <?= formImageFile('Image', 'us_image', $data['us_image'], ' 720px', 'services') ?>

                                    <div class="form-group">
                                        <label for="editor1">service Detail</label>
                                        <textarea name="us_detail" id="editor1" cols="30" rows="10"><?= stripslashes($data['us_detail']); ?></textarea>
                                    </div>
                                    <div class="form-check bg-white text-dark m-0">
                                        <input type="checkbox" name="terms" required class="form-check-input" id="terms">
                                        <label class="form-check-label text-dark" for="terms">
                                            I agree with the <a class="pri-text" target="_blank" href="<?= $path ?>terms-conditions"><strong>terms and
                                                    conditions</strong></a>
                                            and <a class="pri-text" target="_blank" href="<?= $path ?>privacy-policy"><strong>privacy policy</strong></a>.
                                            .
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center mb-3">
                                <hr>
                                <a href="<?= $path ?>user/<?= $page_uri ?>" class=" btn btn-default btn-lg mr-3"> <i class="fa fa-arrow-left"></i> Cancel</a>
                                <button type="submit" name="submit1" class=" btn btn-primary btn-lg"> <i class="fa fa-save"></i> Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <?php include_once("pages/shared/sidebar.php"); ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#editor1").summernote();
        })
    </script>
<?php
} else {
?>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.2/css/dataTables.bootstrap4.min.css">
    <script src="https://cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script>

    <div class="mdk-header-layout__content">
        <div class="mdk-drawer-layout js-mdk-drawer-layout" data-push data-responsive-width="992px">

            <div class="mdk-drawer-layout__content page">
                <div class="container-fluid page__container">
                    <div class="page__heading d-flex align-items-center">
                        <div class="flex">
                            <h4 class="m-0"><i class="fa fa-image"></i> Manage Services</h4>
                        </div>
                        <a href="<?= $path ?>user/<?= $page_uri; ?>?mode=add" class="btn btn-success ml-3">Create New <i class="fa fa-plus"></i></a>
                    </div>
                    <div class="card">
                        <div class="card-body py-4">
                            <form name="updateForm" id="updateForm" action="" method="post">
                                <table class="table table-responsive dataTable">
                                    <thead>
                                        <tr>
                                            <th style="width: 3%;" class="text-center">#ID</th>
                                            <th style="width: 15%;">Image</th>
                                            <th>Title</th>
                                            <th>Pakage ( PKR )</th>
                                            <th>Extra Charges ( PKR )</th>
                                            <th style="width: 8%;" class="text-center">Edit</th>
                                            <th style="width: 8%;" class="text-center">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list" id="listingTable">
                                        <?php
                                        $sr = 1;
                                        $user_id = $_SESSION['user_id'];
                                        $user = getUserById($user_id);
                                        $service_id = $user['service_id'];
                                        //$service = getServiceByServiceId($service_id);
                                        $paging = getPaging('tbl_user_services', "WHERE user_id=$user_id ORDER BY us_order DESC", 20, $_REQUEST['page'], '?', $_GET['pager']);
                                        $pagination = $paging[1];
                                        if ($rlist_pages = getList($paging[0])) {
                                            while ($row = fetch($rlist_pages)) {
                                        ?>
                                                <tr>
                                                    <td>
                                                        <div class="badge badge-soft-dark">#<?= $sr++ ?></div>
                                                    </td>

                                                    <td><img src="<?= getImageSrc("../uploads/services/" . $row['us_image']); ?>" class="tbl_img" /></td>

                                                    <td><?= stripslashes($row['us_title']); ?></td>
                                                    <td><?= stripslashes($row['us_pkg']); ?></td>

                                                    <?php if ($row['us_ext_charges']) { ?>
                                                        <td><?= stripslashes($row['us_ext_charges']); ?></td>
                                                    <?php } else { ?>
                                                        <td>Depends On Situation...</td>
                                                    <?php } ?>
                                                    <td class="text-center">
                                                        <a href="<?= $path ?>user/<?= $page_uri; ?>?mode=update&code=<?= $row['us_id'] ?><?= $pager; ?>" class="btn btn-sm btn-primary"><i class="fa fa-pencil-alt"></i> Edit</a>
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="<?= $path; ?>user/<?= $page_uri; ?>?mode=delete&code=<?= $row['us_id'] ?>" class="btn btn-sm btn-danger " onclick="return confirm('Are you sure you want to delete this service?');"><i class="fa fa-trash"></i> Delete</a>
                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                            <tr>
                                                <td colspan="12">
                                                    <div class="text-center"><?= $pagination; ?></div>
                                                </td>
                                            </tr>
                                        <?php
                                        } else {
                                        ?>
                                            <tr>
                                                <td colspan="12" class="text-center">No Record Found</td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                        </div>
                        </form>
                    </div>

                </div>
            </div>
            <?php include_once("pages/shared/sidebar.php"); ?>
        </div>
    </div>
    <script src="https://cdn.datatables.net/1.11.2/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".dataTable").dataTable();
        })
    </script>
<?php }
?>