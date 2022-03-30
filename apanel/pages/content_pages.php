<?php
if ($_REQUEST['mode'] == 'update' || $_REQUEST['mode'] == 'add') {
?>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <div class="mdk-header-layout__content">
        <div class="mdk-drawer-layout js-mdk-drawer-layout" data-push data-responsive-width="992px">
            <div class="mdk-drawer-layout__content page">
                <div class="container-fluid  page__heading-container">
                    <div class="page__heading">
                        <h4 class="m-0"><i class="fa fa-file-alt"></i> Content Pages <i class="fa fa-chevron-right
"></i> Create / Update</h4>
                    </div>
                </div>

                <div class="container-fluid page__container">
                    <form action="" id="form1" method="post" class="form-horizontal" enctype="multipart/form-data">
                        <div class="card card-form">
                            <div class="row no-gutters">
                                <div class="col-lg-10 offset-1 card-form__body card-body">
                                    <? if (!empty($_REQUEST['code'])) { ?>
                                        <div class="form-group">
                                            <label>Page Name/Slug</label>
                                            <input type="text" name="page_name" id="page_name" value="<?php echo $data['page_name']; ?>" required="required" class="form-control" />
                                        </div>
                                    <? } ?>
                                    <div class="form-group">
                                        <label for="field">Page Title</label>
                                        <input type="text" name="page_title" id="page_title" value="<?= stripslashes($data['page_title']); ?>" required="required" class="form-control" />
                                    </div>
                                    <!-- <div class="form-group">
                                        <label for="field">Show in Menu</label>
                                        <select name="page_menu" id="page_menu" class="form-control">
                                            <option value="0" <?= ($data['page_menu'] == '0' ? 'selected="selected"' : ''); ?>>No</option>
                                            <option value="1" <?= ($data['page_menu'] == '1' ? 'selected="selected"' : ''); ?>>Yes</option>
                                        </select>
                                    </div>    -->
                                    <div class="form-group" id="page_parent_box" style="display:<?= ($data['page_menu'] == '1' ? '' : 'none'); ?>">
                                        <label for="field">Parent Page</label>
                                        <select name="page_parent" id="page_parent" class="form-control">
                                            <option value="0">No Parent</option>
                                            <?php
                                            $res = getMenuPages();
                                            if (count($res) > 0) {
                                                foreach ($res as $rs) {
                                                    if ($rs['page_id'] != $_REQUEST['code']) {
                                            ?>
                                                        <option value="<?= $rs['page_id']; ?>" <?= ($data['page_parent'] == $rs['page_id'] ? 'selected="selected"' : ''); ?>><?= str($rs['page_title']); ?>
                                                        </option>
                                            <?php
                                                    }
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group no_externel_pages">
                                        <label for="field">Page Details</label>
                                        <textarea name="page_detail" id="editor1" cols="30" rows="10"><?= stripslashes($data['page_detail']); ?></textarea>

                                    </div>
                                    <?= formImageFile('Banner Image', 'page_image', $data['page_image'], '1600px x 300px', 'banners') ?>
                                    <!-- <div class="form-group">
                                        <label for="field">External Link</label>
                                        <select name="page_label" id="page_label" class="form-control">
                                            <option value="0" <?= ($data['page_label'] == '0' ? 'selected="selected"' : ''); ?>>No</option>
                                            <option value="1" <?= ($data['page_label'] == '1' ? 'selected="selected"' : ''); ?>>Yes</option>
                                        </select>
                                        <code><small>(Links of other websites, will be redirect in new tab.)</small></code>
                                    </div>  -->
                                    <div class="form-group">
                                        <label for="field">Show in Footer</label>
                                        <select name="page_footer" id="page_footer" class="form-control">
                                            <option value="0" <?= ($data['page_footer'] == '0' ? 'selected="selected"' : ''); ?>>No</option>
                                            <option value="1" <?= ($data['page_footer'] == '1' ? 'selected="selected"' : ''); ?>>Yes</option>
                                        </select>
                                        <code><small>(Select Yes to show page link in footer Useful Links)</small></code>
                                    </div>
                                    <div class="form-group">
                                        <h4>Meta Tags</h4>
                                        <hr />
                                    </div>
                                    <div class="form-group">
                                        <label for="field">Page Meta Title</label>
                                        <input type="text" name="page_meta_title" id="page_meta_title" value="<?= stripslashes($data['page_meta_title']); ?>" required="required" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label for="field">Meta Description</label>
                                        <textarea class="form-control" name="page_meta_desc" id="page_meta_desc" rows="2"><?= str($data['page_meta_desc']); ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="field">Meta Keywords</label>
                                        <textarea class="form-control" name="page_meta_keywords" id="page_meta_keywords" rows="2"><?= str($data['page_meta_keywords']); ?></textarea>
                                    </div>
                                    <div class="form-group">

                                    </div>
                                </div>
                            </div>
                            <div class="text-center mb-3">
                                <hr>
                                <a href="<?= $apath; ?>content_pages" class=" btn btn-default btn-lg mr-3"> <i class="fa fa-arrow-left"></i> Cancel</a>
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
    <div class="mdk-header-layout__content">
        <div class="mdk-drawer-layout js-mdk-drawer-layout" data-push data-responsive-width="992px">
            <div class="mdk-drawer-layout__content page">
                <div class="container-fluid page__container">
                    <div class="page__heading d-flex align-items-center">
                        <div class="flex">
                            <h4 class="m-0"><i class="fa fa-file-alt"></i> Content Pages</h4>
                        </div>
                        <a href="javascript:document.getElementById('updateForm').submit();" class="btn btn-primary ml-3" onclick="return confirm('Are you sure you want to update records?');">Update <i class="fa fa-arrow-up"></i></a>
                        <a href="<?= $apath; ?>content_pages?mode=add" class="btn btn-success ml-3">Create New <i class="fa fa-plus"></i></a>
                    </div>
                    <div class="card">
                        <form name="updateForm" id="updateForm" action="" method="post">
                            <div class="table-responsive" data-toggle="lists" data-lists-values='["js-lists-values-employee-name"]'>
                                <table class="table mb-0 thead-border-top-0 table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width: 3%;" class="text-center">#ID</th>
                                            <th>Page Name/Slug</th>
                                            <th style="width: 20%;">Page Title</th>
                                            <th style="width: 20%;">Parent Page</th>
                                            <th style="width: 10%;" class="text-center">Sort Order</th>
                                            <th style="width: 10%;">Status</th>
                                            <th style="width: 15%;" class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list" id="listingTable">
                                        <?php
                                        $srNo = 1;
                                        $paging = getPaging('tbl_pages', "WHERE 1 ORDER BY page_order ASC", 10, $_REQUEST['page'], '?', $_GET['pager']);
                                        $pagination = $paging[1];
                                        if ($rf_pages = getList($paging[0])) {
                                            while ($row = fetch($rf_pages)) {
                                                $page_id = $row['page_id'];
                                                $SrNo++;
                                        ?>
                                                <td>
                                                    <div class="badge badge-soft-dark">#<?= $srNo++ ?></div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="d-flex align-items-center">
                                                            <i class="material-icons icon-16pt mr-1 text-blue">link</i>
                                                            <?php if (stripslashes($row['page_name']) == 'page-not-found') { ?>
                                                                <a href="<?= $path; ?>page-not-found.php" target="_blank"><?= stripslashes($row['page_name']); ?></a>

                                                            <?php } else { ?>
                                                                <a href="<?= $path; ?><?= stripslashes($row['page_name']); ?>" target="_blank"><?= stripslashes($row['page_name']); ?></a>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><?= stripslashes($row['page_title']); ?></td>
                                                <td><?= getMenuParentName($row['page_parent']); ?></td>
                                                <td style="width:80px" class="text-center"><input id="orderid<?= $page_id ?>" type="text" name="orderid<?= $page_id ?>" value="<?= $row['page_order'] ?>" class="form-control" size="3" /></td>
                                                <td>
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" name="page_status[]" class="custom-control-input js-check-selected-row" id="customCheck2_<?= $page_id ?>" value="<?= $page_id ?>">
                                                        <label class="custom-control-label" for="customCheck2_<?= $page_id ?>"><?= getStatus($row['page_status']); ?></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <a href="<?= $apath; ?>content_pages?mode=update&code=<?= $row['page_id'] ?>" class="btn btn-sm btn-primary mr-1"><i class="fa fa-pencil-alt"></i> Edit</a>
                                                    <a href="<?= $apath; ?>content_pages?mode=delete&code=<?= $row['page_id'] ?>" class="btn btn-sm btn-danger " onclick="return confirm('Are you sure you want to delete this page?');"><i class="fa fa-trash"></i> Delete</a>
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
            <?php include_once("pages/shared/sidebar.php"); ?>
        </div>
    </div>
<?php } ?>
<script>
    $(document).ready(function() {
        $(document).on('change', '#page_menu', function() {
            var $this = $(this).val();
            if ($this == '1') {
                $('#page_parent_box').show();
            } else {
                $('#page_parent_box').hide();
            }
        });
        $(document).on('change', '#page_label', function() {
            var $this = $(this).val();
            if ($this == '1') {
                $('.no_externel_pages').hide();
            } else {
                $('.no_externel_pages').show();
            }
        });
        $('#page_label').trigger('change');
    });
</script>