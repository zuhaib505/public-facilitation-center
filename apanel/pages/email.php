<?php
if ($_REQUEST['mode'] == 'update' || $_REQUEST['mode'] == 'add') {
?>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <div class="mdk-header-layout__content">
        <div class="mdk-drawer-layout js-mdk-drawer-layout" data-push data-responsive-width="992px">
            <div class="mdk-drawer-layout__content page">
                <div class="container-fluid  page__heading-container">
                    <div class="page__heading">
                        <h4 class="m-0"><i class="fa fa-file-alt"></i> Email Template<i class="fa fa-chevron-right
"></i> Create / Update</h4>
                    </div>
                </div>
                <div class="container-fluid page__container">
                    <div class="row">
                        <div class="col-md-3">
                            <?php include_once("pages/shared/settings_sidebar.php"); ?>
                        </div>

                        <div class="col-md-9">
                            <form action="" id="form1" method="post" class="form-horizontal" enctype="multipart/form-data">
                                <div class="card card-form">
                                    <div class="row no-gutters">
                                        <div class="col-lg-10 offset-1 card-form__body card-body">

                                            <div class="form-group">
                                                <label for="field">Email To</label>
                                                <input type="email" name="email_to" id="email_to" value="<?= stripslashes($data['email_to']); ?>" required="required" class="form-control" />
                                            </div>
                                            <div class="form-group">
                                                <label for="field">Email From</label>
                                                <input type="email" name="email_from" id="email_from" value="<?= stripslashes($data['email_from']); ?>" required="required" class="form-control" />
                                            </div>
                                            <div class="form-group">
                                                <label for="field">Type</label>
                                                <input type="text" name="email_type" id="email_type" value="<?= stripslashes($data['email_type']); ?>" required="required" class="form-control" />
                                            </div>
                                            <div class="form-group">
                                                <label for="field">Subject</label>
                                                <input type="text" name="email_subject" id="email_subject" value="<?= stripslashes($data['email_subject']); ?>" required="required" class="form-control" />
                                            </div>

                                            <div class="form-group no_externel_pages">
                                                <label for="field">Email Details</label>
                                                <textarea name="email_body" id="editor1" cols="30" rows="10"><?= stripslashes($data['email_body']); ?></textarea>

                                            </div>

                                            <div class="form-group">
                                                <label for="field">Status</label>
                                                <select name="email_status" id="email_status" class="form-control">
                                                    <option value="1" <?= ($data['email_status'] == '1' ? 'selected="selected"' : ''); ?>>Active
                                                    </option>
                                                    <option value="0" <?= ($data['email_status'] == '0' ? 'selected="selected"' : ''); ?>>
                                                        Inactive</option>
                                                </select>
                                            </div>


                                        </div>
                                    </div>
                                    <div class="text-center mb-3">
                                        <hr>
                                        <a href="<?= $apath; ?>email" class=" btn btn-default btn-lg mr-3"> <i class="fa fa-arrow-left"></i> Cancel</a>
                                        <button type="submit" name="submit1" class=" btn btn-primary btn-lg"> <i class="fa fa-save"></i> Save</button>
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
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#editor1").summernote();
        })
    </script>
<?php
} else {
?>
    <div class="mdk-header-layout__content">
        <div class="mdk-drawer-layout js-mdk-drawer-layout" data-push data-responsive-width="992px">
            <div class="mdk-drawer-layout__content page">
                <div class="container-fluid page__container">
                    <div class="page__heading d-flex align-items-center">
                        <div class="flex">
                            <h4 class="m-0"><i class="fa fa-cog"></i> Settings <i class="fa fa-chevron-right
"></i> Email Templates</h4>
                            </h4>
                        </div>
                        <a href="javascript:document.getElementById('updateForm').submit();" class="btn btn-primary ml-3" onclick="return confirm('Are you sure you want to update records?');">Update <i class="fa fa-arrow-up"></i></a>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <?php include_once("pages/shared/settings_sidebar.php"); ?>
                        </div>

                        <div class="col-md-9">
                            <div class="card">
                                <form name="updateForm" id="updateForm" action="" method="post">
                                    <div class="table-responsive" data-toggle="lists" data-lists-values='["js-lists-values-employee-name"]'>
                                        <table class="table mb-0 thead-border-top-0 table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Email to</th>
                                                    <th>Type</th>
                                                    <th style="width: 15%;">Subject</th>
                                                    <th style="width: 15%;">Status</th>
                                                    <th style="width: 15%;" class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="list" id="listingTable">
                                                <?php
                                                $srNo = "";
                                                $paging = getPaging('tbl_emails', "WHERE 1 ORDER BY email_id ASC", 10, $_REQUEST['page'], '?', $_GET['pager']);
                                                $pagination = $paging[1];
                                                if ($rf_pages = getList($paging[0])) {
                                                    while ($row = fetch($rf_pages)) {
                                                        $email_id = $row['email_id'];
                                                        $email_body = $row['email_body'];
                                                        $SrNo++;
                                                        if (strlen($row['email_body']) > 15) {
                                                            $detail = substr($row['email_body'], 0, 15);
                                                        } else {
                                                            $detail = $row['email_body'];
                                                        }
                                                ?>

                                                        <td><?= stripslashes($row['email_to']); ?></td>
                                                        <td><?= stripslashes($row['email_type']); ?></td>
                                                        <td><?= stripslashes($row['email_subject']); ?></td>

                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" name="email_status[]" class="custom-control-input js-check-selected-row" id="customCheck2_<?= $email_id ?>" value="<?= $email_id ?>">
                                                                <label class="custom-control-label" for="customCheck2_<?= $email_id ?>"><?= getStatus($row['email_status']); ?></label>
                                                            </div>
                                                        </td>
                                                        <td style="text-align: center;">
                                                            <a href="<?= $apath; ?>email?mode=update&code=<?= $row['email_id'] ?><?= $pager; ?>" class="btn btn-sm btn-primary mr-1"><i class="fa fa-pencil-alt"></i> Edit</a>
                                                        </td>
                                                        </tr>
                                                    <?php
                                                    }
                                                    ?><tr>
                                                        <td colspan="10">
                                                            <div class="text-center"><?= $pagination; ?></div>
                                                        </td>
                                                    </tr><?php
                                                        } else {
                                                            ?>
                                                    <tr>
                                                        <td colspan="7" class="text-center">No Record Found</td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php include_once("pages/shared/sidebar.php"); ?>
        </div>
    </div>
    <script>
        $(document).ready(function() {

            $(function() {
                $('[data-toggle="popover"]').popover()
            })
        });
    </script>
<?php } ?>