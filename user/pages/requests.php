<?php if ($_REQUEST['mode'] == 'update' || $_REQUEST['mode'] == 'add') {
$user_id = $_SESSION['user_id'];
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

                                    <?= formText('Name', 'req_sender_name', $data['req_sender_name']) ?>
                                    <?= formText('Email', 'req_sender_email', $data['req_sender_email']) ?>
                                    <?= formText('Phone', 'req_sender_phone', $data['req_sender_phone']) ?>
                                    <?= formText('Subject', 'req_subject', $data['req_subject']) ?>
                                    <?= formTextArea('Message', 'req_message', $data['req_message'],3) ?>
                                    <?= formText('Type', 'req_type', $data['req_type']) ?>
                                    <?= formText('Duration', 'req_duration', $data['req_duration']) ?>
                                    <div class="form-group">
                                    <label for="field">Status</label>
                                    <select name="req_status" id="list_status" class="form-control">
                                        <option value="1"
                                            <?= ($data['req_status'] == '1' ? 'selected="selected"' : ''); ?>>Completed
                                        </option>
                                        <option value="0"
                                            <?= ($data['req_status'] == '0' ? 'selected="selected"' : ''); ?>>Pending
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="field">Approval</label>
                                    <select name="req_accept" id="list_status" class="form-control">
                                        <option value="1"
                                            <?= ($data['req_accept'] == '1' ? 'selected="selected"' : ''); ?>>Accepted
                                        </option>
                                        <option value="0"
                                            <?= ($data['req_accept'] == '0' ? 'selected="selected"' : ''); ?>>Pending
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="user">Pakage</label>
                                    <select name="us_id" id="us_id" class="form-control">
                                        <?php
                                            $service_qry =  "SELECT * FROM tbl_user_services  WHERE us_status='1' AND `user_id` = $user_id ORDER BY us_order ASC";
                                            $service_exe = $conn->query($service_qry) or die(mysqli_error($conn));
                                            while ($service = $service_exe->fetch_array()) {
                                                $us_id = $service['us_id'];
                                            ?>
                                        <option value="<?= $us_id ?>"
                                            <?= ($data['us_id'] == $service['us_id'] ? 'selected="selected"' : ''); ?>>
                                            <?= $service['us_title'] ?>
                                        </option>
                                        <?php } ?>
                                    </select>
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
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Pakage</th>
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
                                        $paging = getPaging('tbl_requests', "WHERE user_id=$user_id ORDER BY req_order DESC", 20, $_REQUEST['page'], '?', $_GET['pager']);
                                        $pagination = $paging[1];
                                        if ($rlist_pages = getList($paging[0])) {
                                            while ($row = fetch($rlist_pages)) {
                                        ?>
                                                <tr>
                                                    <td>
                                                        <div class="badge badge-soft-dark">#<?= $sr++ ?></div>
                                                    </td>

                                                    
                                                    <td><?= stripslashes($row['req_sender_name']); ?></td>
                                                    <td><?= stripslashes($row['req_sender_email']); ?></td>

                                                    
                                                        <td><?= stripslashes(getUserPakage($row['us_id'])); ?></td>
                                                    
                                                    <td class="text-center">
                                                        <a href="<?= $path ?>user/<?= $page_uri; ?>?mode=update&code=<?= $row['req_id'] ?><?= $pager; ?>" class="btn btn-sm btn-primary"><i class="fa fa-pencil-alt"></i> Edit</a>
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="<?= $path; ?>user/<?= $page_uri; ?>?mode=delete&code=<?= $row['req_id'] ?>" class="btn btn-sm btn-danger " onclick="return confirm('Are you sure you want to delete this service?');"><i class="fa fa-trash"></i> Delete</a>
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