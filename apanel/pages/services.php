<?php if ($_REQUEST['mode'] == 'update' || $_REQUEST['mode'] == 'add') {
?>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

<div class="mdk-header-layout__content">
    <div class="mdk-drawer-layout js-mdk-drawer-layout" data-push data-responsive-width="992px">
        <div class="mdk-drawer-layout__content page">
            <div class="container-fluid  page__heading-container">
                <div class="page__heading">
                    <h4 class="m-0"><i class="fa fa-image"></i> Manage Service <i class="fa fa-chevron-right"></i>
                        Create / Update</h4>
                </div>
            </div>
            <div class="container-fluid page__container">
                <form action="" id="form1" method="post" class="form-horizontal" enctype="multipart/form-data">
                    <div class="card card-form">
                        <div class="row no-gutters">
                            <div class="col-lg-10 offset-1 card-form__body card-body">
                                
                                <?= formText('Title', 'service_title', $data['service_title']) ?>
                                <?= formText('Icon', 'service_icon', $data['service_icon']) ?>
                                <?= formTextArea('Sort Desc', 'service_short_desc', $data['service_short_desc']) ?>

                                <div class="form-group">
                                    <label for="editor1">Service Detail Description</label>
                                    <textarea name="service_detail" id="editor1" cols="30"
                                        rows="10"><?= stripslashes($data['service_detail']); ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="field">Status</label>
                                    <select name="service_status" id="list_status" class="form-control">
                                        <option value="1"
                                            <?= ($data['service_status'] == '1' ? 'selected="selected"' : ''); ?>>Active
                                        </option>
                                        <option value="0"
                                            <?= ($data['service_status'] == '0' ? 'selected="selected"' : ''); ?>>Inactive
                                        </option>
                                    </select>
                                </div>
                                <div class="form-check bg-white text-dark m-0">
                                    <input type="checkbox" name="terms" required class="form-check-input" id="terms">
                                    <label class="form-check-label text-dark" for="terms">
                                        I agree with the <a class="pri-text" target="_blank"
                                            href="<?= $path ?>terms-conditions"><strong>terms and
                                                conditions</strong></a>
                                        and <a class="pri-text" target="_blank"
                                            href="<?= $path ?>privacy-policy"><strong>privacy policy</strong></a>.
                                        .
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="text-center mb-3">
                            <hr>
                            <a href="<?= $apath ?><?= $page_uri ?>" class=" btn btn-default btn-lg mr-3"> <i
                                    class="fa fa-arrow-left"></i> Cancel</a>
                            <button type="submit" name="submit1" class=" btn btn-primary btn-lg"> <i
                                    class="fa fa-save"></i> Save</button>
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
                    <a href="javascript:document.getElementById('updateForm').submit();" class="btn btn-primary ml-3"
                        onclick="return confirm('Are you sure you want to update records?');">Update <i
                            class="fa fa-arrow-up"></i></a>
                    <a href="<?= $apath ?><?= $page_uri; ?>?mode=add" class="btn btn-success ml-3">Create New <i
                            class="fa fa-plus"></i></a>
                </div>
                <div class="card">
                    <div class="card-body py-4">
                        <form name="updateForm" id="updateForm" action="" method="post">
                            <table class="table table-responsive dataTable">
                                <thead>
                                    <tr>
                                        <th style="width: 3%;" class="text-center">#ID</th>
                                        <th>Title</th>
                                        <th style="width: 10%;" class="text-center">Sort</th>
                                        <th style="width: 10%;">Status</th>
                                        <th width="10%" class="text-center">Delete</th>
                                        <th style="width: 8%;" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="list" id="listingTable">
                                    <?php
                                        $sr = 1;
                                        $paging = getPaging('tbl_services', "WHERE 1 ORDER BY service_order DESC", 20, $_REQUEST['page'], '?', $_GET['pager']);
                                        $pagination = $paging[1];
                                        if ($rlist_pages = getList($paging[0])) {
                                            while ($row = fetch($rlist_pages)) {
                                                $service_id = $row['service_id'];
                                        ?>
                                    <tr>
                                        <td>
                                            <div class="badge badge-soft-dark">#<?= $sr++ ?></div>
                                        </td>

                                        <td><?= stripslashes($row['service_title']); ?></td>
                                        <td style="width:80px" class="text-center"><input id="orderid<?= $service_id ?>"
                                                type="text" name="orderid<?= $service_id ?>"
                                                value="<?= $row['service_order'] ?>" class="form-control" size="3" />
                                        </td>
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" name="service_status[]"
                                                    class="custom-control-input js-check-selected-row"
                                                    id="customCheck2_<?= $service_id ?>" value="<?= $service_id ?>">
                                                <label class="custom-control-label"
                                                    for="customCheck2_<?= $service_id ?>"><?= getStatus($row['service_status']); ?></label>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" name="service_delete[]"
                                                    class="custom-control-input js-check-selected-row"
                                                    id="customCheckDelete_<?= $service_id ?>" value="<?= $service_id ?>">
                                                <label class="custom-control-label"
                                                    for="customCheckDelete_<?= $service_id ?>"></label>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <a href="<?= $apath; ?><?= $page_uri; ?>?mode=update&code=<?= $row['service_id'] ?><?= $pager; ?>"
                                                class="btn btn-sm btn-primary"><i class="fa fa-pencil-alt"></i> Edit</a>
                                            <!-- <a href="<?= $apath; ?><?= $page_uri; ?>?mode=delete&code=<?= $row['service_id'] ?><?= $pager; ?>" class="btn btn-sm btn-danger " onclick="return confirm('Are you sure you want to delete this page?');"><i class="fa fa-trash"></i> Delete</a> -->
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