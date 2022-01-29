<?php
function Redirect_to($New_Location) {
    header("Location:" . $New_Location);
    exit();
}
function base_url(){
    echo 'http://localhost/iBuildSoft/admin/';
}

function attemptLogin($username, $password) {
 global $conn;
 $query = "SELECT * FROM tbl_siteadmin
 WHERE site_admin='$username' AND site_admin_pass='$password'";
 $execute = $conn->query($query);
 if ($admin = $execute->fetch_assoc()) {
    return $admin;
} else {
    return null;
}
}

function Login() {
    if (isset($_SESSION["User_Id"])) {
        return true;
    }
}

function Confirm_Login() {
    if (!Login()) {
        Redirect_to("login.php");
    }
}
function getBredcrum($ary) {

    $bcrum .= '

    <ol class="breadcrumb">

    <li><a href="' . 'index.php' . '"><i class="fa fa-dashboard"></i> Home</a></li>

    ';



    foreach ($ary as $key => $value) {

        if ($key == '#') {

            $bcrum .= '<li class="active"><a href="javascript:void(0);">' . $value . '</a></li>';
        } else {

            $bcrum .= '<li><a href="' . '' . '' . $key . '">' . $value . '</a></li>';
        }
    }



    $bcrum .= '

    </ol>

    ';

    return $bcrum;
}

function getList($query) {
    global $conn;
    $ex = $conn->query($query) or die(mysqli_error($conn));
    if (mysqli_num_rows($ex) > 0) {
        return $ex;
    }
    return false;
}

function fetch($ex) {
    return $ex->fetch_array();
}

function getPaging($table, $where, $limit, $tpage, $seprater, $pager) {
    global $conn;
    $nxt = '';
    $prv = '';
    $tbl_name = $table;  //your table name
    $adjacents = 5;
//  echo $_REQUEST['page'];
    $query = "SELECT COUNT(*) as num FROM $tbl_name $where";

    $total_pages = $conn->query($query)->fetch_array();
    $total_pages = $total_pages['num'];

    $targetpage = $tpage; //your file name  (the name of this file)
//  $limit = 12;
//  $_GET['pager']          //how many items to show per page
    $page = $pager;
    if ($page)
        $start = ($page - 1) * $limit;    //first item to display on this page
    else
        $start = 0;        //if no page var is given, set start to 0

    $seprator = $seprater;

    $sql = "SELECT * from $tbl_name $where  LIMIT $start, $limit";
    if ($page == 0)
        $page = 1;     //if no page var is given, default to 1.
    $prev = $page - 1;       //previous page is page - 1
    $next = $page + 1;       //next page is page + 1
    $lastpage = ceil($total_pages / $limit);  //lastpage is = total pages / items per page, rounded up.
    $lpm1 = $lastpage - 1;      //last page minus 1
    $pagination = "";
    if ($lastpage > 1) {
        $pagination .= "<div class=\"pagination pagination-lg\">";
//previous button
        if ($page > 1)
            $pagination .= "<a class=\"btn-pagi  brd-left\" href=\"$targetpage" . $seprator . "pager=$prev\">&laquo; " . $prv . "</a>";
        else
            $pagination .= "<span class=\"btn-pagi brd-left disabled\">&laquo; " . $prv . "</span>";

//pages
        if ($lastpage < 7 + ($adjacents * 2)) { //not enough pages to bother breaking it up
            for ($counter = 1; $counter <= $lastpage; $counter++) {
                if ($counter == $page)
                    $pagination .= "<span class=\"btn-pagi-c current\">$counter</span>";
                else
                    $pagination .= "<a class=\"btn-pagi\" href=\"$targetpage" . $seprator . "pager=$counter\">$counter</a>";
            }
        }
        elseif ($lastpage > 5 + ($adjacents * 2)) { //enough pages to hide some
//close to beginning; only hide later pages
            if ($page < 1 + ($adjacents * 2)) {
                for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++) {
                    if ($counter == $page)
                        $pagination .= "<span  class=\" btn-pagi current\">$counter</span>";
                    else
                        $pagination .= "<a class=\"btn-pagi\" href=\"$targetpage" . $seprator . "pager=$counter\">$counter</a>";
                }
                $pagination .= "...";
                $pagination .= "<a class=\"btn-pagi\" href=\"$targetpage" . $seprator . "pager=$lpm1\">$lpm1</a>";
                $pagination .= "<a class=\"btn-pagi\" href=\"$targetpage" . $seprator . "pager=$lastpage\">$lastpage</a>";
            }
//in middle; hide some front and some back
            elseif ($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2)) {
                $pagination .= "<a class=\"btn-pagi\" href=\"$targetpage" . $seprator . "pager=1\">1</a>";
                $pagination .= "<a class=\"btn-pagi\" href=\"$targetpage" . $seprator . "pager=2\">2</a>";
                $pagination .= "...";
                for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++) {
                    if ($counter == $page)
                        $pagination .= "<spanclass=\"current btn-pagi\">$counter</span>";
                    else
                        $pagination .= "<a class=\"btn-pagi\" href=\"$targetpage" . $seprator . "pager=$counter\">$counter</a>";
                }
                $pagination .= "...";
                $pagination .= "<a href=\"$targetpage" . $seprator . "pager=$lpm1\">$lpm1</a>";
                $pagination .= "<a href=\"$targetpage" . $seprator . "pager=$lastpage\">$lastpage</a>";
            }
//close to end; only hide early pages
            else {
                $pagination .= "<a class=\"btn-pagi\" href=\"$targetpage" . $seprator . "pager=1\">1</a>";
                $pagination .= "<a class=\"btn-pagi\" href=\"$targetpage" . $seprator . "pager=2\">2</a>";
                $pagination .= "...";
                for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++) {
                    if ($counter == $page)
                        $pagination .= "<span class=\"btn-pagi current\">$counter</span>";
                    else
                        $pagination .= "<a class=\"btn-pagi\" href=\"$targetpage" . $seprator . "pager=$counter\">$counter</a>";
                }
            }
        }
//next button
        if ($page < $counter - 1)
            $pagination .= "<a class=\"btn-pagi brd-right\" href=\"$targetpage" . $seprator . "pager=$next\">" . $nxt . " &raquo;</a>";
        else
            $pagination .= "<span class=\"disabled  brd-right btn-pagi\">" . $nxt . " &raquo;</span>";
        $pagination .= "</div>\n";
    }

    return array($sql, $pagination);
}


function getStatus($status) {

    if ($status == '1') {

        return '<strong style="color:#35aa47;">Active</strong>';
    } else {

        return '<strong style="color:#d84a38;">InActive</strong>';
    }
}


function commments_count($conn) {
    global $conn;
    $que = "SELECT COUNT(*) FROM tbl_comments WHERE 1";
    $exe = $conn->query($que);
    $row = $exe->fetch_assoc();
    $total = array_shift($row);
    if ($total > 0) {
        echo'
        <span class="notify pull-right">' . $total . '</span>';
    }
}

function subscriptions_count($conn) {
   global $conn;
   $que = "SELECT COUNT(*) FROM tbl_subscriptions WHERE 1";
   $exe = $conn->query($que);
   $row = $exe->fetch_assoc();
   $total = array_shift($row);
   if ($total > 0) {
    echo'
    <span class="notify pull-right">' . $total . '</span>';
}
}

function row_count() {
    $count = (is_numeric($_GET['count']) ? $_GET['count'] : 0);
    while ($author = $authors->fetch_assoc()) {
        $id = $author['id'];
        $name = $author['name'];
        $count++;
        echo $count;
    }
}

function edi_btn() {
    ?>

    <?php

}

function updateRows($table, $field1, $field2, $ary, $returnpage) {
 global $conn;
 if (isset($ary) && count($ary) > 0) {
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

        $_SESSION['SuccessMessage'] = 'Records has been updated successfully !';
        echo '<script>window.open("' . $returnpage . '","_self")</script>';
    }
}
}

function update_order($table, $row_id, $field0, $field1, $returnpage) {
    global $conn;

    $query_rs_pages = "SELECT * FROM  " . $table . " WHERE 1 ORDER BY " . $field0 . " ASC";
    $rs_pages = $conn->query($query_rs_pages);
    while ($row_rs_pages = $rs_pages->fetch_array()) {
        if (isset($_REQUEST["" . $field1 . "" . $row_rs_pages["id"] . ""])) {
            $s35 = "UPDATE " . $table . " SET " . $field0 . " = '" . $_REQUEST["" . $field1 . "" . $row_rs_pages["" . $row_id . ""] . ""] . "' where " . $row_id . " = '" . $row_rs_pages["" . $row_id . ""] . "' ";
            $q35 = $conn->query($s35) or die($s35);
            $_SESSION['$ErrorMessage'] = 'Changings has been saved successfully !';
            echo '<script>window.open("' . $returnpage . '","_self")</script>';
        }
    }
}

function deleteRows($table, $field2, $ary, $returnpage) {
    global $conn;
    if (isset($ary) && count($ary) > 0) {

        foreach ($ary as $status_data) {

            $s1 = "DELETE  FROM " . $table . " where " . $field2 . "='" . $status_data . "' ";

            $q1 = $conn->query($s1) or die($s1);

            $_SESSION['SuccessMessage'] = 'Records has been updated successfully !';
            echo '<script>window.open("' . $returnpage . '","_self")</script>';
        }
    }
}

function deleteRow($table, $field2, $ary, $returnpage) {
   global $conn;
   if (isset($ary) && count($ary) > 0) {
    $s1 = "DELETE  FROM " . $table . " where " . $field2 . "='" . $ary . "' ";

    $q1 = $conn->query($s1) or die($s1);

    $_SESSION['SuccessMessage'] = 'Records has been updated successfully !';
    echo '<script>window.open("' . $returnpage . '","_self")</script>';
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


?>
