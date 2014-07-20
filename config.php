<?php

if (file_exists(dirname(__FILE__) . '/dev-config.php')) {
    ini_set('display_errors', 1);
    include_once 'dev-config.php';
    define('DB_NAME', LOCAL_DB_NAME);
    define('DB_USER', LOCAL_DB_USER);
    define('DB_PASSWORD', LOCAL_DB_PASSWORD);
    define('DB_HOST', LOCAL_DB_HOST);
    define('DB_PORT', LOCAL_DB_PORT);

} else {
    define('DB_NAME', 'shivy33_registration');
    define('DB_USER', 'shivy33_root');
    define('DB_PASSWORD', 'shivShiva-0');
    define('DB_HOST', 'localhost');
    define('DB_PORT', '3306');
    define('SECRET_KEY', 'BaBaJiIsTheOnLySiDdHaInPhYsIcAlFoRm');
}
?>
