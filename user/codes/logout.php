<?php

unset($_SESSION['user_id'], $_SESSION['user_name'], $_SESSION['user_email'], $_SESSION['user_session'], $_SESSION['user_image']);
redirectTo('login');

exit;
