<?php 

unset($_SESSION['admin_id'], $_SESSION['admin_username'], $_SESSION['admin_type']);

redirectTo('apanel/index');

exit;

?>