<?php
if (isset($_POST['formOne'])) {
    $vals = $_POST;
    unset($vals['formOne']);

    $new_vals['site_smtp_data'] = serialize($vals);
    updateRecord("tbl_siteadmin", $new_vals, " `site_id`= '1' ");
    $_SESSION['successMsg'] = 'Changing has been updated successfully !';
}

$rs = getField("tbl_siteadmin", " `site_id`= '1' ", "site_smtp_data");
$data = unserialize(stripslashes($rs));
?>
<style>
    .list_bg_none{
        line-height: 25px;
    }
    .list_bg_none:hover {
        background-color: #ffffff;
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
                    <h4 class="m-0"><i class="fa fa-cog"></i> Settings <i class="fa fa-chevron-right
"></i> SMTP</h4>
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
                                        <div class="form-group">
                                            <label for="field">Mail Driver</label>
                                            <select name="site_driver" id="site_driver" class="form-control">
                                                <option value="smtp"
                                                    <?= ($data['site_driver'] == 'smtp' ? 'selected="selected"' : ''); ?>>
                                                    SMTP
                                                </option>
                                                <option value="mail"
                                                    <?= ($data['site_driver'] == 'mail' ? 'selected="selected"' : ''); ?>>
                                                    Send Mail</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="field">Mail Host</label>
                                            <div class="form-group">
                                                <input type="text" name="site_mail_host" id="site_mail_host"
                                                    value="<?= stripslashes($data['site_mail_host']); ?>"
                                                    class="form-control" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="field">Mail Port</label>
                                            <div class="form-group">
                                                <input type="text" name="site_mail_port" id="site_mail_port"
                                                    value="<?= stripslashes($data['site_mail_port']); ?>"
                                                    class="form-control" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="field">Mail Username</label>
                                            <div class="form-group">
                                                <input type="text" name="site_mail_username" id="site_mail_username"
                                                    value="<?= stripslashes($data['site_mail_username']); ?>"
                                                    class="form-control" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="field">Mail Password</label>
                                            <div class="form-group">
                                                <input type="text" name="site_mail_password" id="site_mail_password"
                                                    value="<?= stripslashes($data['site_mail_password']); ?>"
                                                    class="form-control" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="field">Mail Incription</label>
                                            <div class="form-group">
                                                <input type="text" name="site_mail_incription" id="site_mail_incription"
                                                    value="<?= stripslashes($data['site_mail_incription']); ?>"
                                                    class="form-control" />
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="text-center mb-3">
                                    <hr>
                                    <a href="<?= $apath; ?>" class=" btn btn-default btn-lg"> <i
                                            class="fa fa-arrow-left"></i> Cancel</a> &nbsp;
                                    <button type="submit" class=" btn btn-primary btn-lg"> <i class="fa fa-save"></i>
                                        Update</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
                <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-9">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <h4>Instruction</h4>
                                    <p class="text-danger">Please be carefull when you are configuring SMTP. For
                                        incorrect configuration you will get error at the time of order place, new
                                        registration, sending newsletter.</p>
                                    <hr>
                                    <p style="margin-top: 20px;padding: 3px;color: #b5bdc7;">For Non-SSL</p>
                                    <ul class="list-group">
                                        <li class="list-group-item list_bg_none p-2">Select 'sendmail' for Mail Driver if you
                                            face any issue after configuring 'smtp' as Mail Driver </li>
                                        <li class="list-group-item list_bg_none p-2">Set Mail Host according to your server
                                            Mail Client Manual Settings</li>
                                        <li class="list-group-item list_bg_none p-2">Set Mail port as '587'</li>
                                        <li class="list-group-item list_bg_none p-2">Set Mail Encryption as 'ssl' if you face
                                            issue with 'tls'</li>
                                    </ul>
                                    <p style="margin-top: 30px;padding: 3px;color: #b5bdc7;">For SSL</p>
                                    <ul class="list-group mar-no">
                                        <li class="list-group-item list_bg_none p-2">Select 'sendmail' for Mail Driver if you
                                            face any issue after configuring 'smtp' as Mail Driver</li>
                                        <li class="list-group-item list_bg_none p-2">Set Mail Host according to your server
                                            Mail Client Manual Settings</li>
                                        <li class="list-group-item list_bg_none p-2">Set Mail port as '465'</li>
                                        <li class="list-group-item list_bg_none p-2">Set Mail Encryption as 'ssl'</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        <?php include_once("pages/shared/sidebar.php"); ?>
    </div>
</div>