<?php

// Use Funtions and Classes, Make your life easy :-)
function pr($array)
{
    if (is_array($array)) {
        echo "<style>.preloader { display:none;}</style><pre style='position:absolute;z-index:99999;'>";
        print_r($array);
        echo "</pre>";
    } else {
        echo $array;
    }
}
function mres($string)
{
    global $conn;
    return mysqli_real_escape_string($conn, $string);
}
function str($text)
{
    return stripslashes($text);
}
function showErrorMsg()
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
function showMsg()
{
    // if (isset($_SESSION['successMsg']) && !empty($_SESSION['successMsg'])) {
    //     echo '<div class="alert alert-success text-center" role="alert" style="font-weight:bold;">
    //     <strong>SUCCESS:</strong> ' . $_SESSION['successMsg'] . '
    //     </div>';
    //     unset($_SESSION['successMsg']);
    // } else if (isset($_SESSION['infoMsg']) && !empty($_SESSION['infoMsg'])) {
    //     echo '<div class="alert alert-info text-center" role="alert" style="font-weight:bold;">
    //     <strong>INFORMATION:</strong> ' . $_SESSION['infoMsg'] . '
    //     </div></div>';
    //     unset($_SESSION['infoMsg']);
    // } else if (isset($_SESSION['errorMsg']) && !empty($_SESSION['errorMsg'])) {
    //     echo '	<div class="alert alert-danger text-center" role="alert" style="font-weight:bold;">
    //     <strong>ERROR:</strong> ' . $_SESSION['errorMsg'] . '
    //     </div>';
    //     unset($_SESSION['errorMsg']);
    // }
}

function showToastMsg()
{
    $output = '
    <script>
        $(document).ready(function() {';
    if (isset($_SESSION['successMsg']) && !empty($_SESSION['successMsg'])) {
        $output .= 'showToastr("success", "", "' . $_SESSION['successMsg'] . '");';
    } else if (isset($_SESSION["infoMsg"]) && !empty($_SESSION["infoMsg"])) {
        $output .= 'showToastr("warning", "", "' . $_SESSION["infoMsg"] . '");';
    } else if (isset($_SESSION["errorMsg"]) && !empty($_SESSION["errorMsg"])) {
        $output .= 'showToastr("error", "", "' . $_SESSION["errorMsg"] . '");';
    }
    unset($_SESSION["successMsg"], $_SESSION["infoMsg"], $_SESSION["errorMsg"]);
    $output .= '});
        </script>';
    echo $output;
}

function num($val, $size = 2)
{
    return number_format(floatval($val), $size, '.', '');
}

function randCode($length = 8, $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890')
{
    // ABCDEFGHIJKLMNOPQRSTUVWXYZ
    $chars_length = (strlen($chars) - 1);
    $string = $chars[rand(0, $chars_length)];

    for ($i = 1; $i < $length; $i = strlen($string)) {
        $r = $chars[rand(0, $chars_length)];
        if ($r != $string[$i - 1])
            $string .= $r;
    }

    return strtoupper($string);
}

function doEncode($string, $key = 'fusionmaxcarwash.com')
{
    $string = base64_encode($string);
    $key = sha1($key);
    $strLen = strlen($string);
    $keyLen = strlen($key);
    for ($i = 0; $i < $strLen; $i++) {
        $ordStr = ord(substr($string, $i, 1));
        if ($j == $keyLen) {
            $j = 0;
        }
        $ordKey = ord(substr($key, $j, 1));
        $j++;
        $hash .= strrev(base_convert(dechex($ordStr + $ordKey), 16, 36));
    }
    return ($hash);
}

function doDecode($string, $key = 'fusionmaxcarwash.com')
{
    $key = sha1($key);
    $strLen = strlen($string);
    $keyLen = strlen($key);
    for ($i = 0; $i < $strLen; $i += 2) {
        $ordStr = hexdec(base_convert(strrev(substr($string, $i, 2)), 36, 16));
        if ($j == $keyLen) {
            $j = 0;
        }
        $ordKey = ord(substr($key, $j, 1));
        $j++;
        $hash .= chr($ordStr - $ordKey);
    }
    $hash = base64_decode($hash);
    return ($hash);
}
function starsCount($stars)
{
    $star1 = 1;
    $star2 = 1;
    if ($stars == 5) {
        while ($star1 <= 5) {
            echo '<li><i class="fas fa-star"></i></li>';
            $star1++;
        }
        while ($star2 <= 0) {
            echo '<li><i class="far fa-star"></i></li>';
            $star2++;
        }
    }
    if ($stars == 4) {
        while ($star1 <= 4) {
            echo '<li><i class="fas fa-star"></i></li>';
            $star1++;
        }
        while ($star2 <= 1) {
            echo '<li><i class="far fa-star"></i></li>';
            $star2++;
        }
    }
    if ($stars == 3) {
        while ($star1 <= 3) {
            echo '<li><i class="fas fa-star"></i></li>';
            $star1++;
        }
        while ($star2 <= 2) {
            echo '<li><i class="far fa-star"></i></li>';
            $star2++;
        }
    }
    if ($stars == 2) {
        while ($star1 <= 2) {
            echo '<li><i class="fas fa-star"></i></li>';
            $star1++;
        }
        while ($star2 <= 3) {
            echo '<li><i class="far fa-star"></i></li>';
            $star2++;
        }
    }
    if ($stars == 1) {
        while ($star1 <= 1) {
            echo '<li><i class="fas fa-star"></i></li>';
            $star1++;
        }
        while ($star2 <= 4) {
            echo '<li><i class="far fa-star"></i></li>';
            $star2++;
        }
    }
}

function getApproval($status)
{

    if ($status == '1') {

        return '<strong style="color:#35aa47;">Approved</strong>';
    } else {

        return '<strong style="color:#d84a38;">UnApproved</strong>';
    }
}

function getImgExtension($str)
{
    $i = strrpos($str, ".");
    if (!$i) {
        return "";
    }
    $l = strlen($str) - $i;
    $ext = substr($str, $i + 1, $l);
    return $ext;
}

function getExtension($str)
{
    $i = strrpos($str, ".");
    if (!$i) {
        return "";
    }
    $l = strlen($str) - $i;
    $ext = substr($str, $i + 1, $l);
    return $ext;
}

function fetch($ex)
{
    return $ex->fetch_array();
}

function fetch_assoc($ex)
{
    return $ex->fetch_assoc();
}

function getList($query)
{
    global $conn;
    $ex = $conn->query($query) or die($query);
    if (mysqli_num_rows($ex) > 0) {
        return $ex;
    }
    return false;
}

function redirectTo($page = '')
{
    echo '<script type="text/javascript" language="javascript">document.location="' . PATH . $page . '";</script>';
}

function uploadImageThumb($image, $path, $img_width, $thumb_width)
{
    if (isset($image) && $image['name'] != "") {
        $imagename = time() . rand(1111, 9999);
        $filename = $image['name'];
        $ext = getExtension($filename);
        $ext = strtolower($ext);

        //$imagename = str_replace(" ","_",strtolower($imagename));
        if ($ext == 'jpg' || $ext == 'png' || $ext == 'jpeg' || $ext == 'gif' || $ext == 'svg' || $ext == 'webp') {
            $image_thumb = "thumb_" . $imagename . "." . $ext;
            $imagename = "image_" . $imagename . "." . $ext;

            if (move_uploaded_file($image["tmp_name"], $path . $imagename)) {
                $obj_img = new SimpleImage();

                //                $obj_img->load($path . $imagename);
                //                $obj_img->resizeToWidth(intval($img_width));
                //                $obj_img->save($path . $imagename);

                // $obj_img->load($path . $imagename);
                // $obj_img->resizeToWidth(intval($thumb_width));
                // $obj_img->save($path . $image_thumb);

                $res[0] = $imagename;
                $res[1] = $image_thumb;

                return $res;
            }
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function uploadImage($image, $path, $img_width = 1024)
{

    if (isset($image) && $image['name'] != "") {
        $imagename = time() . rand(1111, 9999);
        $filename = $image['name'];
        $ext = getExtension($filename);
        $ext = strtolower($ext);
        if ($ext == 'jpg' || 'jpeg' ||  $ext == 'JPG' || $ext == 'png' || $ext == 'ico' || $ext == 'gif' || $ext == 'PNG' || $ext == 'JPEG' || $ext == 'webp' || $ext == 'svg') {
            //$imagename = str_replace(" ","_",strtolower($imagename));
            $imagename = "image_" . $imagename . "." . $ext;
            if (move_uploaded_file($image["tmp_name"], $path . $imagename)) {

                // include_once('SimpleImage.php');
                // $obj_img = new SimpleImage();

                // $obj_img->load($path . $imagename);
                // $obj_img->resizeToWidth(intval($img_width));
                // $obj_img->save($path . $imagename);
                return $imagename;
            }
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function uploadMultiImage($image, $path, $img_width = 1024)
{
    if (isset($image) && $image['name'] != "") {

        $imagename = time() . rand(1111, 9999);
        $filename = $image['name'];
        $ext = getExtension($filename);
        $ext = strtolower($ext);

        if ($ext == 'jpg' || $ext == 'JPG' || $ext == 'png' || $ext == 'ico' || $ext == 'gif' || $ext == 'PNG' || $ext == 'JPEG' || $ext == 'JPEG' || $ext == 'webp') {
            //$imagename = str_replace(" ","_",strtolower($imagename));
            $imagename = "image_" . $imagename . "." . $ext;

            if (move_uploaded_file($image["tmp_name"], $path . $imagename)) {
                // include_once('SimpleImage.php');
                // $obj_img = new SimpleImage();

                // $obj_img->load($path . $imagename);
                // $obj_img->resizeToWidth(intval($img_width));
                // $obj_img->save($path . $imagename);
                return $imagename;
            }
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function uploadBanner($image, $path)
{
    if (isset($image) && $image['name'] != "") {
        $imagename = time() . rand(1111, 9999);
        $filename = $image['name'];
        $ext = getExtension($filename);
        $ext = strtolower($ext);

        if ($ext == 'jpg' || $ext == 'JPG' || $ext == 'png' || $ext == 'gif' || $ext == 'PNG' || $ext == 'JPEG' || $ext == 'JPEG' || $ext == 'webp') {
            //$imagename = str_replace(" ","_",strtolower($imagename));
            $imagename = "Image_" . $imagename . "." . $ext;

            if (move_uploaded_file($image["tmp_name"], $path . $imagename)) {
                return $imagename;
            }
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function uploadFile($image, $path)
{
    if (isset($image) && $image['name'] != "") {
        $imagename = time() . rand(1111, 9999);
        $filename = $image['name'];
        $ext = getExtension($filename);
        $ext = strtolower($ext);

        if ($ext == 'jpg' || $ext == 'png' || $ext == 'jpeg' || $ext == 'pdf' || $ext == 'doc' || $ext == 'docx' || $ext == 'txt' || $ext == 'webp') {
            $imagename = "file_" . $imagename . "." . $ext;
            if (move_uploaded_file($image["tmp_name"], $path . $imagename)) {
                return $imagename;
            }
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function exQuery($query)
{
    global $conn;
    $ex = $conn->query($query) or die(mysqli_error($conn));
    return $ex;
}

function getImage($image, $width)
{
    $img = '';

    if ($width != '') {
        $width = 'width="' . intval($width) . '"';
    }

    $data = explode("/", $image);

    if (!empty($data[count($data) - 1])) {
        if (file_exists($image)) {
            $img = '<img src="' . $image . '" border="0" ' . $width . ' />';
        } else {
            $img = '<img src="' . PATH . 'images/no_image.jpg" border="0" ' . $width . '  />';
        }
    } else {
        $img = '<img src="' . PATH . 'images/no_image.jpg" border="0" ' . $width . '  />';
    }

    return $img;
}

function getImageSrc($image)
{
    $img = '';

    if (!empty($image)) {
        $ary = explode("/", $image);

        if (file_exists($image) && !empty($ary[count($ary) - 1])) {
            $image = str_replace('../', '', $image);
            $image = str_replace('./', '', $image);
            $img = '' . PATH . $image;
        } else {
            $img = '' . APATH . 'assets/images/no_image.jpg';
        }
    } else {
        $img = '' . APATH . 'assets/images/no_image.jpg';
    }

    return $img;
}

function getOnlyImageSrc($image)
{
    $img = '';

    if (!empty($image)) {
        $ary = explode("/", $image);

        if (file_exists($image) && !empty($ary[count($ary) - 1])) {
            $image = str_replace('../', '', $image);
            $image = str_replace('./', '', $image);
            $img = '' . PATH . $image;
        }
    }

    return $img;
}

function getBannerSrc($image)
{
    $img = '';

    if (!empty($image)) {
        $ary = explode("/", $image);

        if (file_exists($image) && !empty($ary[count($ary) - 1])) {
            $image = str_replace('../', '', $image);
            $image = str_replace('./', '', $image);
            $img = "background-image: url('" . PATH . $image . "');";
        }
    }

    return $img;
}

function isImage($image)
{
    if (!empty($image)) {
        $ary = explode("/", $image);
        if (file_exists($image) && !empty($ary[count($ary) - 1])) {
            return true;
        }
    }

    return false;
}

function getProfileImg($image)
{
    $img = '';

    if (!empty($image)) {
        $ary = explode("/", $image);

        if (file_exists($image) && !empty($ary[count($ary) - 1])) {
            $image = str_replace('../', '', $image);
            $img = PATH . $image;
        } else {
            $img = '' . PATH . 'assets/images/no_pic.png';
        }
    } else {
        $img = '' . PATH . 'assets/images/no_pic.png';
    }

    return $img;
}

function getPage($page, $field)
{
    global $conn;
    $sql = "SELECT `" . $field . "` FROM tbl_pages WHERE page_name='" . $page . "' ";
    $ex = $conn->query($sql) or die($sql);
    $rs = $ex->fetch_array();
    return stripslashes($rs[$field]);
}

function getPageById($id, $field)
{
    global $conn;
    $sql = "SELECT `" . $field . "` FROM tbl_pages WHERE page_id='" . $id . "' ";
    $ex = $conn->query($sql) or die($sql);
    $rs = $ex->fetch_array();
    return $rs[$field];
}

function getPaging($table, $where, $limit, $tpage, $seprater, $pager)
{
    global $conn;
    $nxt = 'next';
    $prv = 'previous';
    $tbl_name = $table;  //your table name
    $adjacents = 3;
    //	echo $_REQUEST['page']; 
    $query = "SELECT COUNT(*) as num FROM $tbl_name $where";
    // echo  $query;exit;
    $total_pages_ex = $conn->query($query) or die(mysqli_error($conn));
    $total_pages_rs = $total_pages_ex->fetch_array();
    $total_pages = $total_pages_rs['num'];

    $targetpage = $tpage; //your file name  (the name of this file)
    //	$limit = 12; 	
    //	$_GET['pager']		    //how many items to show per page
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
        $pagination .= "<div class=\"pagination\">";
        //previous button
        if ($page > 1)
            $pagination .= "<a href=\"$targetpage" . $seprator . "pager=$prev\">&laquo; " . $prv . "</a>";
        else
            $pagination .= "<span class=\"disabled\">&laquo; " . $prv . "</span>";

        //pages	
        if ($lastpage < 7 + ($adjacents * 2)) { //not enough pages to bother breaking it up
            for ($counter = 1; $counter <= $lastpage; $counter++) {
                if ($counter == $page)
                    $pagination .= "<span class=\"current\">$counter</span>";
                else
                    $pagination .= "<a href=\"$targetpage" . $seprator . "pager=$counter\">$counter</a>";
            }
        } elseif ($lastpage > 5 + ($adjacents * 2)) { //enough pages to hide some
            //close to beginning; only hide later pages
            if ($page < 1 + ($adjacents * 2)) {
                for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++) {
                    if ($counter == $page)
                        $pagination .= "<span class=\"current\">$counter</span>";
                    else
                        $pagination .= "<a href=\"$targetpage" . $seprator . "pager=$counter\">$counter</a>";
                }
                $pagination .= "...";
                $pagination .= "<a href=\"$targetpage" . $seprator . "pager=$lpm1\">$lpm1</a>";
                $pagination .= "<a href=\"$targetpage" . $seprator . "pager=$lastpage\">$lastpage</a>";
            }
            //in middle; hide some front and some back
            elseif ($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2)) {
                $pagination .= "<a href=\"$targetpage" . $seprator . "pager=1\">1</a>";
                $pagination .= "<a href=\"$targetpage" . $seprator . "pager=2\">2</a>";
                $pagination .= "...";
                for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++) {
                    if ($counter == $page)
                        $pagination .= "<span class=\"current\">$counter</span>";
                    else
                        $pagination .= "<a href=\"$targetpage" . $seprator . "pager=$counter\">$counter</a>";
                }
                $pagination .= "...";
                $pagination .= "<a href=\"$targetpage" . $seprator . "pager=$lpm1\">$lpm1</a>";
                $pagination .= "<a href=\"$targetpage" . $seprator . "pager=$lastpage\">$lastpage</a>";
            }
            //close to end; only hide early pages
            else {
                $pagination .= "<a href=\"$targetpage" . $seprator . "pager=1\">1</a>";
                $pagination .= "<a href=\"$targetpage" . $seprator . "pager=2\">2</a>";
                $pagination .= "...";
                for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++) {
                    if ($counter == $page)
                        $pagination .= "<span class=\"current\">$counter</span>";
                    else
                        $pagination .= "<a href=\"$targetpage" . $seprator . "pager=$counter\">$counter</a>";
                }
            }
        }
        //next button
        if ($page < $counter - 1)
            $pagination .= "<a href=\"$targetpage" . $seprator . "pager=$next\">" . $nxt . " &raquo;</a>";
        else
            $pagination .= "<span class=\"disabled\">" . $nxt . " &raquo;</span>";
        $pagination .= "</div>\n";
    }

    return array($sql, $pagination);
}

function getPaging2($table, $where, $limit, $tpage, $seprater, $pager2)
{
    global $conn;
    $nxt = 'Next';
    $prv = 'Previous';
    $tbl_name = $table;  //your table name
    $adjacents = 3;
    //	echo $_REQUEST['page']; 
    $query = "SELECT COUNT(*) as num FROM $tbl_name $where";
    $total_pages_ex = $conn->query($query);
    $total_pages_rs = $total_pages_ex->fetch_array();
    $total_pages = $total_pages_rs['num'];

    $targetpage = $tpage; //your file name  (the name of this file)
    //	$limit = 12; 	
    //	$_GET['pager2']		    //how many items to show per page
    $page = $pager2;
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
        $pagination .= "<div class=\"pagination\">";
        //previous button
        if ($page > 1)
            $pagination .= "<a href=\"$targetpage" . $seprator . "pager2=$prev\">&laquo; " . $prv . "</a>";
        else
            $pagination .= "<span class=\"disabled\">&laquo; " . $prv . "</span>";

        //pages	
        if ($lastpage < 7 + ($adjacents * 2)) { //not enough pages to bother breaking it up
            for ($counter = 1; $counter <= $lastpage; $counter++) {
                if ($counter == $page)
                    $pagination .= "<span class=\"current\">$counter</span>";
                else
                    $pagination .= "<a href=\"$targetpage" . $seprator . "pager2=$counter\">$counter</a>";
            }
        } elseif ($lastpage > 5 + ($adjacents * 2)) { //enough pages to hide some
            //close to beginning; only hide later pages
            if ($page < 1 + ($adjacents * 2)) {
                for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++) {
                    if ($counter == $page)
                        $pagination .= "<span class=\"current\">$counter</span>";
                    else
                        $pagination .= "<a href=\"$targetpage" . $seprator . "pager2=$counter\">$counter</a>";
                }
                $pagination .= "...";
                $pagination .= "<a href=\"$targetpage" . $seprator . "pager2=$lpm1\">$lpm1</a>";
                $pagination .= "<a href=\"$targetpage" . $seprator . "pager2=$lastpage\">$lastpage</a>";
            }
            //in middle; hide some front and some back
            elseif ($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2)) {
                $pagination .= "<a href=\"$targetpage" . $seprator . "pager2=1\">1</a>";
                $pagination .= "<a href=\"$targetpage" . $seprator . "pager2=2\">2</a>";
                $pagination .= "...";
                for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++) {
                    if ($counter == $page)
                        $pagination .= "<span class=\"current\">$counter</span>";
                    else
                        $pagination .= "<a href=\"$targetpage" . $seprator . "pager2=$counter\">$counter</a>";
                }
                $pagination .= "...";
                $pagination .= "<a href=\"$targetpage" . $seprator . "pager2=$lpm1\">$lpm1</a>";
                $pagination .= "<a href=\"$targetpage" . $seprator . "pager2=$lastpage\">$lastpage</a>";
            }
            //close to end; only hide early pages
            else {
                $pagination .= "<a href=\"$targetpage" . $seprator . "pager2=1\">1</a>";
                $pagination .= "<a href=\"$targetpage" . $seprator . "pager2=2\">2</a>";
                $pagination .= "...";
                for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++) {
                    if ($counter == $page)
                        $pagination .= "<span class=\"current\">$counter</span>";
                    else
                        $pagination .= "<a href=\"$targetpage" . $seprator . "pager2=$counter\">$counter</a>";
                }
            }
        }
        //next button
        if ($page < $counter - 1)
            $pagination .= "<a href=\"$targetpage" . $seprator . "pager2=$next\">" . $nxt . " &raquo;</a>";
        else
            $pagination .= "<span class=\"disabled\">" . $nxt . " &raquo;</span>";
        $pagination .= "</div>\n";
    }

    return array($sql, $pagination);
}

function getMultiPaging($select, $table, $where, $limit, $tpage, $seprater, $pager)
{
    global $conn;
    $nxt = 'Next';
    $prv = 'Previous';
    $tbl_name = $table;  //your table name
    $adjacents = 3;
    //	echo $_REQUEST['page']; 
    $query = "SELECT COUNT(*) as num FROM $tbl_name $where";
    $total_pages_ex = $conn->query($query);
    $total_pages_rs = $total_pages_ex->fetch_array();
    $total_pages = $total_pages_rs['num'];

    $targetpage = $tpage; //your file name  (the name of this file)
    //	$limit = 12; 	
    //	$_GET['pager']		    //how many items to show per page
    $page = $pager;
    if ($page)
        $start = ($page - 1) * $limit;    //first item to display on this page
    else
        $start = 0;        //if no page var is given, set start to 0

    $seprator = $seprater;

    $sql = "SELECT $select from $tbl_name $where  LIMIT $start, $limit";

    if ($page == 0)
        $page = 1;     //if no page var is given, default to 1.
    $prev = $page - 1;       //previous page is page - 1
    $next = $page + 1;       //next page is page + 1
    $lastpage = ceil($total_pages / $limit);  //lastpage is = total pages / items per page, rounded up.
    $lpm1 = $lastpage - 1;      //last page minus 1
    $pagination = "";
    if ($lastpage > 1) {
        $pagination .= "<div class=\"pagination\">";
        //previous button
        if ($page > 1)
            $pagination .= "<a href=\"$targetpage" . $seprator . "pager=$prev\">&laquo; " . $prv . "</a>";
        else
            $pagination .= "<span class=\"disabled\">&laquo; " . $prv . "</span>";

        //pages	
        if ($lastpage < 7 + ($adjacents * 2)) { //not enough pages to bother breaking it up
            for ($counter = 1; $counter <= $lastpage; $counter++) {
                if ($counter == $page)
                    $pagination .= "<span class=\"current\">$counter</span>";
                else
                    $pagination .= "<a href=\"$targetpage" . $seprator . "pager=$counter\">$counter</a>";
            }
        } elseif ($lastpage > 5 + ($adjacents * 2)) { //enough pages to hide some
            //close to beginning; only hide later pages
            if ($page < 1 + ($adjacents * 2)) {
                for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++) {
                    if ($counter == $page)
                        $pagination .= "<span class=\"current\">$counter</span>";
                    else
                        $pagination .= "<a href=\"$targetpage" . $seprator . "pager=$counter\">$counter</a>";
                }
                $pagination .= "...";
                $pagination .= "<a href=\"$targetpage" . $seprator . "pager=$lpm1\">$lpm1</a>";
                $pagination .= "<a href=\"$targetpage" . $seprator . "pager=$lastpage\">$lastpage</a>";
            }
            //in middle; hide some front and some back
            elseif ($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2)) {
                $pagination .= "<a href=\"$targetpage" . $seprator . "pager=1\">1</a>";
                $pagination .= "<a href=\"$targetpage" . $seprator . "pager=2\">2</a>";
                $pagination .= "...";
                for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++) {
                    if ($counter == $page)
                        $pagination .= "<span class=\"current\">$counter</span>";
                    else
                        $pagination .= "<a href=\"$targetpage" . $seprator . "pager=$counter\">$counter</a>";
                }
                $pagination .= "...";
                $pagination .= "<a href=\"$targetpage" . $seprator . "pager=$lpm1\">$lpm1</a>";
                $pagination .= "<a href=\"$targetpage" . $seprator . "pager=$lastpage\">$lastpage</a>";
            }
            //close to end; only hide early pages
            else {
                $pagination .= "<a href=\"$targetpage" . $seprator . "pager=1\">1</a>";
                $pagination .= "<a href=\"$targetpage" . $seprator . "pager=2\">2</a>";
                $pagination .= "...";
                for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++) {
                    if ($counter == $page)
                        $pagination .= "<span class=\"current\">$counter</span>";
                    else
                        $pagination .= "<a href=\"$targetpage" . $seprator . "pager=$counter\">$counter</a>";
                }
            }
        }
        //next button
        if ($page < $counter - 1)
            $pagination .= "<a href=\"$targetpage" . $seprator . "pager=$next\">" . $nxt . " &raquo;</a>";
        else
            $pagination .= "<span class=\"disabled\">" . $nxt . " &raquo;</span>";
        $pagination .= "</div>\n";
    }

    return array($sql, $pagination);
}

function getField($table, $where, $field)
{
    global $conn;
    $sql = "SELECT " . $field . " FROM " . $table . " WHERE " . $where;
    $ex = $conn->query($sql) or die($sql);
    $rs = $ex->fetch_array();
    return $rs[$field];
}

function getFieldSum($table, $where, $field)
{
    global $conn;
    $sql = "SELECT " . $field . " as total FROM " . $table . " WHERE " . $where;
    $ex = $conn->query($sql) or die($sql);
    $rs = $ex->fetch_array();
    return $rs['total'];
}

function getTable($table, $where)
{
    global $conn;
    $sql = "SELECT * FROM " . $table . " WHERE " . $where;
    $ex = $conn->query($sql) or die($sql);
    $rs = $ex->fetch_array();
    return $rs;
}
// function getConnectedTable($table, $where)
// {
//     global $conn;
//     $sql = "SELECT * FROM " . $table . " WHERE " . $where;
//     $ex = $conn->query($sql) or die($sql);
//     $rs = $ex->fetch_array();
//     return $rs;
// }

function toSlugUrl($text)
{
    $text = trim($text);
    $text = preg_replace('/[^A-Za-z0-9-]+/', '-', $text);
    $text = str_replace("--", '-', $text);
    $text = str_replace("--", '-', $text);
    return strtolower($text);
}

function toAltUrl($text)
{
    $text = explode(".", $text);
    $text = $text[0];
    $text = preg_replace('/[^A-Za-z0-9-]+/', ' ', $text);
    $text = str_replace("thumb_", "", $text);
    $text = str_replace("Image_", "", $text);
    return strtolower(trim($text));
}

function slugToText($text)
{
    $text = strtolower(str_replace('--', ' ', $text));
    $text = strtolower(str_replace('-', ' ', $text));
    $text = strtolower(str_replace('_', ' ', $text));
    $text = ucwords($text);
    return $text;
}

function strDefault($text, $default)
{
    if (empty($text))
        return $default;
    else
        return $text;
}
function get_sub_menu($sub_pg_id)
{
?>

    <?php
    global $conn;
    $quer1 = "SELECT COUNT(*) FROM tbl_pages WHERE page_status='1' AND page_parent='" . $sub_pg_id . "' AND page_menu='1'";
    $exec1 = $conn->query($quer1);
    $sm_row = $exec1->fetch_assoc();
    $total = array_shift($sm_row);
    $quer = "SELECT * FROM tbl_pages WHERE page_status='1' AND page_parent='" . $sub_pg_id . "' AND page_menu='1'";
    $exec = $conn->query($quer);
    if ($total > 0) {
        echo '<ul class="level-2 thired-level">';
        while ($sub_row2 = $exec->fetch_array()) {
    ?>

            <li><a href="<?= $sub_row2['page_link'] ?>" class="navcap"><?= $sub_row2['page_title'] ?></a>
            </li>

    <?php
        }
        echo '</ul>';
    } else {
        echo '';
    }
    ?>

<?php
}
function count_sub_menu($got_link, $result)
{
    global $conn;
    $quer4 = "SELECT COUNT(*) FROM tbl_pages WHERE page_status='1' AND page_parent='" . $got_link . "' AND page_menu='1'";
    $exec4 = $conn->query($quer4);
    $sm_row2 = $exec4->fetch_assoc();
    $total2 = array_shift($sm_row2);
    if ($total2 > 0) {
        echo $result;
    }
}
function get_parent_menu($got_link)
{
    global $conn;
    $quee = "SELECT * FROM tbl_pages WHERE page_link='" . $got_link . "' AND  page_status='1' AND page_menu='1'";
    $exee = $conn->query($quee);
    $subrow1 = $exee->fetch_array();
    $quee2 = "SELECT * FROM tbl_pages WHERE page_id='" . $subrow1['page_parent'] . "' AND  page_status='1' AND page_menu='1'";
    $exee2 = $conn->query($quee2);
    $subrow2 = $exee2->fetch_array();
    $rslt = $subrow2['page_title'];
    return $rslt;
}
function get_parent_slug($got_link)
{
    global $conn;
    $quee = "SELECT * FROM tbl_pages WHERE page_name='" . $got_link . "' AND  page_status='1' AND page_menu='1'";
    $exee = $conn->query($quee);
    $subrow1 = $exee->fetch_array();
    $quee2 = "SELECT * FROM tbl_pages WHERE page_id='" . $subrow1['page_parent'] . "' AND  page_status='1' AND page_menu='1'";
    $exee2 = $conn->query($quee2);
    $subrow2 = $exee2->fetch_array();
    $rslt = $subrow2['page_name'];
    return $rslt;
}

function getMenuPagesList()
{
    global $conn;
    $output = array();
    $sql = "SELECT * FROM tbl_menu_pages WHERE 1 ";

    $ex = $conn->query($sql) or die($sql);
    while ($rs = $ex->fetch_array()) {
        $output[$rs['page_id']]['slug'] = $rs['page_name'];
        $output[$rs['page_id']]['title'] = str($rs['page_title']);
    }
    return $output;
}

function filesize_formatted($path)
{
    $size = filesize($path);
    $units = array('B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
    $power = $size > 0 ? floor(log($size, 1024)) : 0;
    return number_format($size / pow(1024, $power), 2, '.', ',') . ' ' . $units[$power];
}

function getCategorySlug($id)
{
    global $conn;
    $sql = "SELECT * FROM tbl_listings WHERE list_type='categories' AND list_id='" . $id . "' AND list_status='1'";
    $ex = $conn->query($sql);
    $row = $ex->fetch_array();
    return $row['list_slug'];
}
function getCategoryId($slug)
{
    global $conn;
    $sql = "SELECT * FROM tbl_listings WHERE list_type='categories' AND list_slug='" . $slug . "'  AND list_status='1'";
    $ex = $conn->query($sql);
    $row = $ex->fetch_array();
    return $row['list_id'];
}

function getCategoryName($id)
{
    global $conn;
    $sql = "SELECT * FROM tbl_listings WHERE list_id='" . $id . "' AND list_type='categories'  AND list_status='1'";
    $ex = $conn->query($sql);
    while ($row = $ex->fetch_array()) {
        return  stripslashes($row['list_title']);
    }
}

function substrLenght($value, $min, $max, $inc)
{
    if (strlen($value) > $max) {
        $value = substr($value, $min,  $max) . $inc;
    }
    echo $value;
}
function shortText($title, $start, $limit, $more)
{

    if (strlen($title) > $limit) {
        $title = substr($title, $start, $limit) . $more;
    }
    echo $title;
}

function getProjectId($slug)
{
    global $conn;
    $sql = "SELECT * FROM tbl_projects WHERE project_slug='" . $slug . "' AND project_status='1'";
    $ex = $conn->query($sql);
    while ($row = $ex->fetch_array())
        echo stripslashes($row['project_id']);
}


?>