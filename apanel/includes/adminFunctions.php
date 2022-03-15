<?php
function getBredcrum($ary)
{

    $bcrum = '';
    $bcrum .= '	

    <ol class="breadcrumb">

    <li><a href="' . APATH . '"><i class="fa fa-home"></i> Home</a></li>

    ';



    foreach ($ary as $key => $value) {

        if ($key == '#') {

            $bcrum .= '<li class="active"><a href="javascript:void(0);">' . $value . '</a></li>';
        } else {

            $bcrum .= '<li><a href="' . APATH . '' . $key . '">' . $value . '</a></li>';
        }
    }



    $bcrum .= '

    </ol>

    ';

    return $bcrum;
}

function getStatus($status)
{
    if ($status == '1') {
        return '<span class="badge badge-pill badge-success">Active</span>';
    } else {
        return '<span class="badge badge-pill badge-danger">InActive</span>';
    }
}
function getOrderStatus($status)
{
    if ($status == '1') {
        return '<span class="badge badge-pill badge-success">Complete</span>';
    } else {
        return '<span class="badge badge-pill badge-warning">Pending</span>';
    }
}

function getLocationType($type)
{
    if ($type == '1') {
        return '<span><b>Our Locations</b></span>';
    } else {
        return '<span><b>Comming Soon</b></span>';
    }
}

function getFeatureStatus($pos)
{
    if ($pos == '1') {
        return '<span class="badge badge-pill badge-success">Yes</span>';
    } else {
        return '<span class="badge badge-pill badge-warning">No</span>';
    }
}

function getYesNoStatus($status)
{

    if ($status == '1') {
        return '<span class="badge badge-pill badge-success">Yes</span>';
    } else {
        return '<span class="badge badge-pill badge-warning">InActive</span>';
    }
}

function getFeatured($status)
{

    if ($status == '1') {
        return '<span class="badge badge-pill badge-success">Yes</span>';
    } else {
        return '<span class="badge badge-pill badge-warning">InActive</span>';
    }
}

function deleteRows($table, $field, $ary)
{
    global $conn;

    if (isset($ary) && count($ary) > 0) {

        foreach ($ary as $delete_data) {

            $s = "delete FROM " . $table . " where " . $field . " = '" . $delete_data . "' ";

            $q = $conn->query($s) or die($s);

            $_SESSION['successMsg'] = 'Recoreds has been deleted successfully !';
        }
    }
}
function updateRows($table, $field1, $field2, $ary)
{
    global $conn;
    if (isset($ary) && $ary > 0) {

        foreach ($ary as $status_data) {

            $s1 = "SELECT " . $field1 . " FROM " . $table . " where " . $field2 . " = '" . $status_data . "' ";

            $q1 = $conn->query($s1) or die($s1);

            $r1 = $q1->fetch_array();



            if ($r1[$field1] == "1") {

                $status = 0;
            } else {

                $status = 1;
            }



            $s = "update " . $table . " set " . $field1 . "  = '" . $status . "' where " . $field2 . "  = '" . $status_data . "' ";

            $q = $conn->query($s) or die($s);

            $_SESSION['successMsg'] = 'Records has been updated successfully !';
        }
    }
}

function updateAmbStatusRows($table, $field1, $field2, $ary)
{
    global $conn;
    if (isset($ary) && $ary > 0) {
        $status = 1;
        foreach ($ary as $status_data) {

            $s1 = "SELECT " . $field1 . " FROM " . $table . " where " . $field2 . " = '" . $status_data . "' ";

            $q1 = $conn->query($s1) or die($s1);

            $r1 = $q1->fetch_array();



            if ($r1[$field1] == "1") {

                $status_amb_qry = "SELECT * FROM tbl_sellers WHERE amb_id='$status_data'";
                $amb_status_exe = $conn->query($status_amb_qry) or die('mysql error');
                while ($row_amb_status = $amb_status_exe->fetch_array()) {
                    $status_vals['seller_status'] = 0;
                    updateRecord("tbl_sellers", $status_vals, " `seller_id` = '" . $row_amb_status['seller_id'] . "' ");
                }
                $status = 0;
            } else {

                $status_amb_qry = "SELECT * FROM tbl_sellers WHERE amb_id='$status_data'";
                $amb_status_exe = $conn->query($status_amb_qry) or die('mysql error');
                while ($row_amb_status = $amb_status_exe->fetch_array()) {
                    $status_vals['seller_status'] = 1;
                    updateRecord("tbl_sellers", $status_vals, " `seller_id` = '" . $row_amb_status['seller_id'] . "' ");
                }
                $status = 1;
            }



            $s = "update " . $table . " set " . $field1 . "  = '" . $status . "' where " . $field2 . "  = '" . $status_data . "' ";

            $q = $conn->query($s) or die($s);

            $_SESSION['successMsg'] = 'Records has been updated successfully !';
        }
    }
}

function deleteRow($table, $mode, $where)
{
    global $conn;

    if (isset($mode) && $mode == 'delete') {

        $s = "DELETE FROM `$table` WHERE $where ";

        $q = $conn->query($s) or die($s);

        $_SESSION['successMsg'] = 'Record has been deleted successfully !';
    }
}
function deleteImageRow($table, $mode, $where, $rid)
{
    global $conn;

    if (isset($mode) && $mode == 'delete') {

        $s = "DELETE FROM `$table` WHERE $where ";

        $q = $conn->query($s) or die($s);

        $_SESSION['successMsg'] = 'Record has been deleted successfully !';
    }
    redirectTo('apanel/portfolio_gallery?p_id=' . $rid);
}
function statusImageRow($table, $mode, $where, $rid)
{
    global $conn;
    if (isset($mode) && $mode == 'update') {

        $s = "SELECT * FROM `$table` WHERE $where ";

        $q = $conn->query($s) or die($s);
        $r1 = $q->fetch_array();
        if ($r1['gallery_status'] == "1") {

            $status = 0;
        } else {

            $status = 1;
        }
        $s = "update " . $table . " set gallery_status  = " . $status . " where " . $where;

        $q = $conn->query($s) or die($s);

        $_SESSION['successMsg'] = 'Status has been updated successfully !';
    }
    redirectTo('apanel/portfolio_gallery?p_id=' . $rid);
}
function statusRow($table, $mode, $where)
{
    global $conn;
    if (isset($mode) && $mode == 'update') {

        $s = "SELECT * FROM `$table` WHERE $where ";

        $q = $conn->query($s) or die($s);
        $r1 = $q->fetch_array();
        if ($r1['p_status'] == "1") {

            $status = 0;
        } else {

            $status = 1;
        }
        $s = "update " . $table . " set p_status  = " . $status . " where " . $where;

        $q = $conn->query($s) or die($s);

        $_SESSION['successMsg'] = 'Status has been updated successfully !';
    }
    redirectTo('apanel/gallery_photos');
}
function saveRecord($table, $ary)
{
    global $conn;
    if (isset($ary) && count($ary) > 0) {

        /* $sql = " INSERT INTO `$table` SET ";

          foreach($ary as $key => $val){

          $sql .= " `".$key."` = '".mysqli_real_escape_string($conn, $val)."'  ";

          if(end($ary) != $val) $sql .= ", ";

      } */





        $sql = " INSERT INTO `$table` SET ";

        foreach ($ary as $key => $val) {

            $sql .= " `" . $key . "` = '" . mysqli_real_escape_string($conn, $val) . "',";
        }

        $sql = substr($sql, 0, strlen($sql) - 1);



        if (exQuery($sql))
            return true;
        else
            return false;
    }
}

function getVisitorCount($where)
{
    global $conn;
    $que = "SELECT COUNT(*) FROM tbl_countvisit $where";
    $exe = $conn->query($que) or die('mysqli_error');
    $row = $exe->fetch_assoc();
    $total = array_shift($row);
    return $total;
}
function updateRecord($table, $ary, $where)
{
    global $conn;

    if (isset($ary)) {
        $sql = " UPDATE `$table` SET ";

        foreach ($ary as $key => $val) {
            $sql .= " `" . $key . "` = '" . mysqli_real_escape_string($conn, $val) . "',";
        }

        $sql = substr($sql, 0, strlen($sql) - 1);



        $sql .= " WHERE $where ";



        if (exQuery($sql))
            return true;
        else
            return false;
    }
}

/*

  function updateRecord($table, $ary, $where)

  {

  if(isset($ary) && count($ary)>0)

  {

  $sql = " UPDATE `$table` SET ";

  foreach($ary as $key => $val){

  $sql .= " `".$key."` = '".mysqli_real_escape_string($conn, $val)."'  ";

  if(end($ary) != $val) $sql .= ", ";

  }

  $sql .= " WHERE $where ";



  if(exQuery($sql))

  return true;

  else

  return false;

  }

  }

 */

function resetFeaturedVideo()
{
    global $conn;

    $s = "UPDATE tbl_videos SET vid_featured  = '0' WHERE 1 ";

    $q = $conn->query($s) or die($s);
}

// Form
function formText($label, $name, $value)
{
?>
    <div class="form-group subitem text">
        <label for="field"><?= $label; ?></label>
        <input type="text" name="<?= $name; ?>" id="<?= $name; ?>" value="<?= stripslashes($value); ?>" class="form-control" />
    </div>
<?php
}

function formDatepicker($label, $name, $value)
{
?>
    <div class="form-group">
        <label><?= $label; ?></label>

        <div class="input-group date">
            <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
            </div>
            <input type="text" value="<?= stripslashes($value); ?>" name="<?= $name; ?>" class="form-control datepicker pull-right" id="datepicker">
        </div>
        <!-- /.input group -->
    </div>
<?php

}
function formTextDate($label, $name, $value)
{
?>
    <div class="form-group subitem text">
        <label for="field"><?= $label; ?></label>
        <input type="text" name="<?= $name; ?>" id="<?= $name; ?>" value="<?= stripslashes($value); ?>" autocomplete="off" class="datepicker form-control" />
    </div>
<?php
}

function formTextIcon($label, $name, $value, $icon, $type)
{
?>
    <div class="form-group">
        <label for="<?= $name; ?>"><?= $label; ?></label>
        <div class="input-group input-group-merge mb-2">
            <input name="<?= $name; ?>" id="<?= $name; ?>" value="<?= stripslashes($value); ?>" type="<?= $type ?>" class="form-control form-control-prepended" placeholder="">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <span class="fa fab fa-<?= $icon; ?>"></span>
                </div>
            </div>
        </div>
    </div>
<?php
}
function formTextIconSocial($label, $name, $value, $icon, $type)
{
?>
    <div class="form-group">
        <label for="<?= $name; ?>"><?= $label; ?></label>
        <div class="input-group input-group-merge mb-2">
            <input name="<?= $name; ?>" id="<?= $name; ?>" value="<?= stripslashes($value); ?>" type="<?= $type ?>" class="form-control form-control-prepended" placeholder="">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    <span class="fab fa-<?= $icon; ?>"></span>
                </div>
            </div>
        </div>
    </div>
<?php
}

function formSelectStatus($label, $name, $value)
{
?>
    <div class="form-group">
        <label for="field"><?= $label; ?></label>
        <select name="<?= $name; ?>" id="<?= $name; ?>" class="form-control">
            <option value="1" <?= ($value == '1' ? 'selected="selected"' : ''); ?>>Active</option>
            <option value="0" <?= ($value == '0' ? 'selected="selected"' : ''); ?>>Inactive</option>
        </select>
    </div>
<?php
}

function formTextArea($label, $name, $value, $rows = 3, $limit = "")
{
    if (!empty($limit)) {
        $limit = " maxlength='$limit' ";
    }
?>
    <div class="form-group">
        <label for="field"><?= $label; ?></label>
        <textarea class="form-control" minlength="0" <?= $limit; ?> rows="<?= $rows; ?>" name="<?= $name; ?>" id="<?= $name; ?>"><?= (stripslashes($value)); ?></textarea>
    </div>
<?php
}

function formTextEditor($label, $name, $value, $height = 500)
{

    // require_once("lib/fckeditor/fckeditor.php");
?>
    <div class="form-group">
        <label for="field"><?= $label; ?></label>
        <?php
        // $oFCKeditor = new FCKeditor($name);
        // $oFCKeditor->BasePath = "lib/fckeditor/";
        // $oFCKeditor->Height = $height;
        // $oFCKeditor->Value = stripslashes($value);
        // $oFCKeditor->Create();
        ?>
    </div>
<?php
}
function formFile($label, $name, $value, $directory = "media")
{
?>
    <div class="form-group">
        <label for="field"><?= $label; ?></label>
        <div class="row" style="border: 1px solid #e7e7e7;border-radius:3px;padding:5px;margin:0px;">
            <?php if ($value) { ?>
                <div class="col-md-3 d-flex align-items-center">
                    <a download href="<?= PATH . "uploads/" . $directory . "/" . $value ?>" class="btn btn-primary"><i class="fa fa-download"></i> Download File</a>
                </div>
            <?php } ?>
            <div class="col-md-5">
                <label for="field">Upload File</label>
                <input type="file" name="<?= $name; ?>" id="<?= $name; ?>" />
            </div>

            <div class="clearfix"></div>
        </div>
        <input type="hidden" name="<?= $name; ?>" value="<?= $value; ?>">
    </div>
<?php
}
function formImageFile($label, $name, $value, $resolution = '1024px x 728px', $directory = 'media')
{
?>
    <div class="form-group">
        <label for="field"><?= $label; ?></label>
        <div class="row" style="border: 1px solid #e7e7e7;border-radius:3px;padding:5px;margin:0px;">
            <div class="col-md-2">
                <div class="img_file" style="background-image:url('<?= getImageSrc("../uploads/" . $directory . "/" . $value); ?>');">&nbsp;</div>
            </div>
            <div class="col-md-5">
                <label for="field">Upload Image</label>
                <input type="file" name="<?= $name; ?>" id="<?= $name; ?>" />
            </div>
            <div class="col-md-5">
                <p style="padding:10px;">
                    <em>Best Resolution:</em> <small><?= $resolution; ?></small><br>
                    <em>Allowed Formats:</em> <small>JPG, JPEG, PNG, GIF</small>
                </p>
            </div>
            <div class="clearfix"></div>
        </div>
        <input type="hidden" name="<?= $name; ?>" value="<?= $value; ?>">
    </div>
<?php
}

function formImageMultiFile($label, $name, $value, $resolution = '1024px x 728px', $directory = 'media')
{
?>
    <div class="form-group">
        <label for="field"><?= $label; ?></label>
        <div class="row" style="border: 1px solid #e7e7e7;border-radius:3px;padding:5px;margin:0px;">

            <div class="col-md-2">
                <div class="img_file" style="background-image:url('<?= getImageSrc("../uploads/" . $directory . "/" . $value); ?>');">&nbsp;</div>
            </div>

            <div class="col-md-5">
                <label for="field">Upload Image</label>
                <input id="files" type="file" multiple name="p_image[]" id="<?= $name; ?>" />

            </div>
            <div class="col-md-5">
                <p style="padding:10px;">
                    <em>Best Resolution:</em> <small><?= $resolution; ?></small><br>
                    <em>Allowed Formats:</em> <small>JPG, JPEG, PNG, GIF</small>
                </p>
            </div>
            <div class="clearfix"></div>
        </div>
        <input type="hidden" name="<?= $name; ?>" value="<?= $value; ?>">
    </div>
<?php
}

function formDownloadFile($label, $name, $value)
{
    $data = '';
?>
    <div class="form-group">
        <label for="field"><?= $label; ?></label>
        <div class="" style="border: 1px solid #e7e7e7;border-radius:3px;padding:5px;">
            <div class="col-md-7">
                <label for="field">Upload File</label>
                <input type="file" name="<?= $name; ?>" id="<?= $name; ?>" />
            </div>
            <div class="col-md-5">
                <p style="padding:10px;">
                    <?php if (!empty($value)) { ?><br>
                        <a href="<?= ("../uploads/files/" . $value); ?>" class="btn btn-info btn-sm">Download</a> <?php echo $data['item_file']; ?>
                    <?php } ?>
                </p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
<?php
}

function formDownloadFileForms($label, $name, $value, $directory = 'media')
{
    $data = '';
?>
    <div class="form-group">
        <label for="field"><?= $label; ?></label>
        <div class="" style="border: 1px solid #e7e7e7;border-radius:3px;padding:5px;">
            <div class="col-md-7">
                <label for="field">Upload File</label>
                <input type="file" name="<?= $name; ?>" id="<?= $name; ?>" />
            </div>
            <div class="col-md-5">
                <p style="padding:10px;">
                    <?php if (!empty($value)) { ?><br>
                        <a target="_blank" href="<?= ("../uploads/$directory/" . $value); ?>" class="btn btn-info btn-sm">Download</a> <?php echo $data['item_file']; ?>
                    <?php } ?>
                </p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
<?php
}


function saveData($table, $ary)
{
    global $conn;
    if (isset($ary) && count($ary) > 0) {

        $sql = " INSERT INTO `$table` SET ";
        foreach ($ary as $key => $val) {
            $sql .= " `" . $key . "` = '" . mysqli_real_escape_string($conn, $val) . "',";
        }
        $sql = substr($sql, 0, strlen($sql) - 1);

        if (exQuery($sql))
            return true;
        else
            return false;
    }
}
function selectCategories()
{
?>


    <?php
    global $conn;

    $sql = "SELECT * FROM tbl_listings WHERE list_type='categories' AND list_status='1'";
    $ex = $conn->query($sql);
    while ($row = $ex->fetch_array()) {
        echo  $row['list_title'];
    }
}

function  formGender($label, $name, $value)
{
    ?>
    <div class="form-group">
        <label for="field"><?= $label; ?></label>
        <select name="<?= $name ?>" id="<?= $name ?>" class="form-control">
            <option value="1" <?= ($value == '1' ? 'selected="selected"' : ''); ?>>Male</option>
            <option value="2" <?= ($value == '2' ? 'selected="selected"' : ''); ?>>Female</option>
        </select>
    </div>
<?php
}
function  formRating($label, $name, $value)
{
?>
    <div class="form-group">
        <label for="field"><?= $label; ?></label>
        <select name="<?= $name ?>" id="<?= $name ?>" class="form-control">
            <option value="1" <?= ($value == '1' ? 'selected="selected"' : ''); ?>>1</option>
            <option value="2" <?= ($value == '2' ? 'selected="selected"' : ''); ?>>2</option>
            <option value="3" <?= ($value == '3' ? 'selected="selected"' : ''); ?>>3</option>
            <option value="4" <?= ($value == '4' ? 'selected="selected"' : ''); ?>>4</option>
            <option value="5" <?= ($value == '5' ? 'selected="selected"' : ''); ?>>5</option>

        </select>
    </div>
<?php
}






function  formCategories($label, $name, $value)
{
?>
    <div class="form-group">
        <label>Select <?= $label; ?></label>
        <select name="<?= $name; ?>" id="<?= $name; ?>" class="form-control">
            <?php
            global $conn;
            $sql = "SELECT * FROM tbl_listings WHERE list_type='categories' AND list_status='1'";
            $ex = $conn->query($sql);
            while ($row = $ex->fetch_array()) {
            ?>
                <option value="<?= $row['list_id']; ?>" <?= ($row['list_id'] == $value ? 'selected' : ''); ?>><?= $row['list_title']; ?></option>

            <?php
            }
            ?>
        </select>
    </div>
<?php
}

function getTimeWidth()
{
    $time = date("H:i:s a");
    if ($time >= '01:00:00 am' & $time < '02:00:00 am') {
        $width = 'p5';
    } elseif ($time >= '02:00:00 am' & $time < '03:00:00 am') {
        $width = 'p10';
    } elseif ($time >= '03:00:00 am' & $time < '04:00:00 am') {
        $width = 'p15';
    } elseif ($time >= '04:00:00 am' & $time < '05:00:00 am') {
        $width = 'p20';
    } elseif ($time >= '05:00:00 am' & $time < '06:00:00 am') {
        $width = 'p25';
    } elseif ($time >= '06:00:00 am' & $time < '07:00:00 am') {
        $width = 'p30';
    } elseif ($time >= '07:00:00 am' & $time < '08:00:00 am') {
        $width = 'p35';
    } elseif ($time >= '08:00:00 am' & $time < '09:00:00 am') {
        $width = 'p40';
    } elseif ($time >= '09:00:00 am' & $time < '10:00:00 am') {
        $width = 'p45';
    } elseif ($time >= '10:00:00 am' & $time < '11:00:00 am') {
        $width = 'p50';
    } elseif ($time >= '11:00:00 am' & $time < '12:00:00 pm') {
        $width = 'p55';
    } elseif ($time >= '12:00:00 pm') {
        $width = 'p60';
    } elseif ($time >= '01:00:00 pm' & $time < '02:00:00 pm') {
        $width = 'p65';
    } elseif ($time >= '02:00:00 pm' & $time < '03:00:00 pm') {
        $width = 'p70';
    } elseif ($time >= '03:00:00 pm' & $time < '04:00:00 pm') {
        $width = 'p75';
    } elseif ($time >= '04:00:00 pm' & $time < '05:00:00 pm') {
        $width = 'p80';
    } elseif ($time >= '05:00:00 pm' & $time < '06:00:00 pm') {
        $width = 'p83';
    } elseif ($time >= '06:00:00 pm' & $time < '07:00:00 pm') {
        $width = 'p86';
    } elseif ($time >= '07:00:00 pm' & $time < '08:00:00 pm') {
        $width = 'p89';
    } elseif ($time >= '08:00:00 pm' & $time < '09:00:00 pm') {
        $width = 'p92';
    } elseif ($time >= '09:00:00 pm' & $time < '10:00:00 pm') {
        $width = 'p94';
    } elseif ($time >= '10:00:00 pm' & $time < '11:00:00 pm') {
        $width = 'p96';
    } elseif ($time >= '11:00:00 pm' & $time < '12:00:00 am') {
        $width = 'p99';
    } elseif ($time >= '12:00:00 am') {
        $width = 'p0';
    }
    return $width;
}
function getTimeWidth1()
{
    $time1 = date("H:i:s a");
    if ($time1 >= '01:00:00 am' & $time1 < '02:00:00 am') {
        $width1 = '5%';
    } elseif ($time1 >= '02:00:00 am' & $time1 < '03:00:00 am') {
        $width1 = '10%';
    } elseif ($time1 >= '03:00:00 am' & $time1 < '04:00:00 am') {
        $width1 = '15%';
    } elseif ($time1 >= '04:00:00 am' & $time1 < '05:00:00 am') {
        $width1 = '20%';
    } elseif ($time1 >= '05:00:00 am' & $time1 < '06:00:00 am') {
        $width1 = '25%';
    } elseif ($time1 >= '06:00:00 am' & $time1 < '07:00:00 am') {
        $width1 = '30%';
    } elseif ($time1 >= '07:00:00 am' & $time1 < '08:00:00 am') {
        $width1 = '35%';
    } elseif ($time1 >= '08:00:00 am' & $time1 < '09:00:00 am') {
        $width1 = '40%';
    } elseif ($time1 >= '09:00:00 am' & $time1 < '10:00:00 am') {
        $width1 = '45%';
    } elseif ($time1 >= '10:00:00 am' & $time1 < '11:00:00 am') {
        $width1 = '50%';
    } elseif ($time1 >= '11:00:00 am' & $time1 < '12:00:00 pm') {
        $width1 = '55%';
    } elseif ($time1 >= '12:00:00 pm') {
        $width1 = '60%';
    } elseif ($time1 >= '01:00:00 pm' & $time1 < '02:00:00 pm') {
        $width1 = '65%';
    } elseif ($time1 >= '02:00:00 pm' & $time1 < '03:00:00 pm') {
        $width1 = '70%';
    } elseif ($time1 >= '03:00:00 pm' & $time1 < '04:00:00 pm') {
        $width1 = '75%';
    } elseif ($time1 >= '04:00:00 pm' & $time1 < '05:00:00 pm') {
        $width1 = '80%';
    } elseif ($time1 >= '05:00:00 pm' & $time1 < '06:00:00 pm') {
        $width1 = '83%';
    } elseif ($time1 >= '06:00:00 pm' & $time1 < '07:00:00 pm') {
        $width1 = '86%';
    } elseif ($time1 >= '07:00:00 pm' & $time1 < '08:00:00 pm') {
        $width1 = '89%';
    } elseif ($time1 >= '08:00:00 pm' & $time1 < '09:00:00 pm') {
        $width1 = '92%';
    } elseif ($time1 >= '09:00:00 pm' & $time1 < '10:00:00 pm') {
        $width1 = '94%';
    } elseif ($time1 >= '10:00:00 pm' & $time1 < '11:00:00 pm') {
        $width1 = '96%';
    } elseif ($time1 >= '11:00:00 pm' & $time1 < '12:00:00 am') {
        $width1 = '99%';
    } elseif ($time1 >= '12:00:00 am') {
        $width1 = '0%';
    }
    return $width1;
}
function getTimeWidth2()
{
    $day = date("D");
    if ($day == 'Mon') {
        $width2 = '10%';
    } elseif ($day == 'Tue') {
        $width2 = '20%';
    } elseif ($day == 'Wed') {
        $width2 = '35%';
    } elseif ($day == 'Thu') {
        $width2 = '50%';
    } elseif ($day == 'Fri') {
        $width2 = '65%';
    } elseif ($day == 'Sat') {
        $width2 = '80%';
    } elseif ($day == 'Sun') {
        $width2 = '95%';
    }
    return $width2;
}
function getTimeWidth3()
{
    $day1 = date("d");
    if ($day1 >= '01' & $day1 < '05') {
        $width3 = '10%';
    } elseif ($day1 >= '05' & $day1 < '10') {
        $width3 = '20%';
    } elseif ($day1 >= '10' & $day1 < '15') {
        $width3 = '40%';
    } elseif ($day1 >= '15' & $day1 < '20') {
        $width3 = '60%';
    } elseif ($day1 >= '20' & $day1 < '25') {
        $width3 = '80%';
    } elseif ($day1 >= '25' & $day1 < '30') {
        $width3 = '98%';
    }
    return $width3;
}
function getTimeWidth4()
{
    $month = date("M");
    if ($month == 'Jan') {
        $width4 = '5%';
    } elseif ($month == 'Feb') {
        $width4 = '12%';
    } elseif ($month == 'Mar') {
        $width4 = '20%';
    } elseif ($month == 'Apr') {
        $width4 = '28%';
    } elseif ($month == 'May') {
        $width4 = '35%';
    } elseif ($month == 'Jun') {
        $width4 = '42%';
    } elseif ($month == 'Jul') {
        $width4 = '50%';
    } elseif ($month == 'Aug') {
        $width4 = '60%';
    } elseif ($month == 'Sep') {
        $width4 = '70%';
    } elseif ($month == 'Oct') {
        $width4 = '80%';
    } elseif ($month == 'Nov') {
        $width4 = '90%';
    } elseif ($month == 'Dec') {
        $width4 = '98%';
    }
    return $width4;
}


?>