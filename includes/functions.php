<?php
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
function showValidMsg()
{
    if (isset($_SESSION['successMsg']) && !empty($_SESSION['successMsg'])) {
        echo '<div class="alert alert-success text-center" role="alert" style="font-weight:bold;">
        <strong>SUCCESS:</strong> ' . $_SESSION['successMsg'] . '
        </div>';
        unset($_SESSION['successMsg']);
    } else if (isset($_SESSION['infoMsg']) && !empty($_SESSION['infoMsg'])) {
        echo '<div class="alert alert-info text-center" role="alert" style="font-weight:bold;">
        <strong>INFORMATION:</strong> ' . $_SESSION['infoMsg'] . '
        </div></div>';
        unset($_SESSION['infoMsg']);
    } else if (isset($_SESSION['errorMsg']) && !empty($_SESSION['errorMsg'])) {
        echo '	<div class="alert alert-danger text-center" role="alert" style="font-weight:bold;">
        <strong>ERROR:</strong> ' . $_SESSION['errorMsg'] . '
        </div>';
        unset($_SESSION['errorMsg']);
    }
}
