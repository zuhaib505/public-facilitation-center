<?php

$page_title = 'Backup';
$page_short = 'Backup';
$page_uri = 'site_backup';
$this_table = 'tbl_backup';
$this_prefix = 'backup_';

if ($_REQUEST['mode'] == 'add') {
    $tables = '*';
    //get all of the tables
    if ($tables == '*') {
        $tables = array();
        $result = mysqli_query($conn, 'SHOW TABLES');
        while ($row = mysqli_fetch_row($result)) {
            $tables[] = $row[0];
        }
    } else {
        $tables = is_array($tables) ? $tables : explode(',', $tables);
    }

    $return = '';
    //cycle through
    foreach ($tables as $table) {
        $result = mysqli_query($conn, 'SELECT * FROM ' . $table);
        $num_fields = mysqli_num_fields($result);
        $num_rows = mysqli_num_rows($result);

        $return .= 'DROP TABLE IF EXISTS ' . $table . ';';
        $row2 = mysqli_fetch_row(mysqli_query($conn, 'SHOW CREATE TABLE ' . $table));
        $return .= "\n\n" . $row2[1] . ";\n\n";
        $counter = 1;

        //Over tables
        for ($i = 0; $i < $num_fields; $i++) {   //Over rows
            while ($row = mysqli_fetch_row($result)) {
                if ($counter == 1) {
                    $return .= 'INSERT INTO ' . $table . ' VALUES(';
                } else {
                    $return .= '(';
                }

                //Over fields
                for ($j = 0; $j < $num_fields; $j++) {
                    $row[$j] = addslashes($row[$j]);
                    $row[$j] = str_replace("\n", "\\n", $row[$j]);
                    if (isset($row[$j])) {
                        $return .= '"' . $row[$j] . '"';
                    } else {
                        $return .= '""';
                    }
                    if ($j < ($num_fields - 1)) {
                        $return .= ',';
                    }
                }

                if ($num_rows == $counter) {
                    $return .= ");\n";
                } else {
                    $return .= "),\n";
                }
                ++$counter;
            }
        }
        $return .= "\n\n\n";
    }

    $fileName = 'iskni_' . time() . '-' . (md5(implode(',', $tables))) . '.sql';
    $vals['backup_data'] = $return;
    $vals['backup_filename'] = $fileName;
    saveData('tbl_backup', $vals);
    $_SESSION['successMsg'] = "$page_short has been saved successfully !";
}
if ($_REQUEST['mode'] == 'download') {
    $id = $_REQUEST['code'];
    $query_backup = "SELECT * FROM $this_table WHERE backup_id=$id";
    $rs_backup = $conn->query($query_backup) or die('mysql error');
    $row_rs_backup = $rs_backup->fetch_assoc();

    $fileName = $row_rs_backup['backup_filename'];
    $data = $row_rs_backup['backup_data'];
    // echo $return;exit;
    //save file
    file_put_contents($fileName, $data);

    header('Content-Disposition: attachment; filename=' . $fileName);
    readfile($fileName);
    exit;
}
if (!empty($_REQUEST['code']))
    $data = getTable($this_table, $this_prefix . "id = '" . $_REQUEST["code"] . "'");

if (isset($_REQUEST['mode']))
    deleteRow("tbl_backup", $_REQUEST["mode"], "backup_id = '" . $_REQUEST["code"] . "'");

$pager = '&pager=' . $_REQUEST['pager'];
