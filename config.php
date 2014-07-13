<?php

if (file_exists(dirname(__FILE__) . '/dev-config.php')) {
    ini_set('display_errors', 1);
    include_once 'dev-config.php';
    define('READ_DB_NAME', LOCAL_DB_NAME);
    define('READ_DB_USER', LOCAL_DB_USER);
    define('READ_DB_PASSWORD', LOCAL_DB_PASSWORD);
    define('READ_DB_HOST', LOCAL_DB_HOST);
    define('READ_DB_PORT', LOCAL_DB_PORT);

    define('WRITE_DB_NAME', LOCAL_DB_NAME);
    define('WRITE_DB_USER', LOCAL_DB_USER);
    define('WRITE_DB_PASSWORD', LOCAL_DB_PASSWORD);
    define('WRITE_DB_HOST', LOCAL_DB_HOST);
    define('WRITE_DB_PORT', LOCAL_DB_PORT);
    define('SITE_URL', LOCAL_SITE_URL);

} else {
    define('READ_DB_NAME', 'sportskeeda');
    define('READ_DB_USER', 'sportskeeda');
    define('READ_DB_PASSWORD', '$p@rt$keed@');
    define('READ_DB_HOST', '10.0.0.15');
    define('READ_DB_PORT', '3306');

    define('WRITE_DB_NAME', 'sportskeeda');
    define('WRITE_DB_USER', 'sportskeeda');
    define('WRITE_DB_PASSWORD', '$p@rt$keed@');
    define('WRITE_DB_HOST', '10.0.0.20');
    define('WRITE_DB_PORT', '3306');
    
    define('SECRET_KEY', 'praveen.sportskeeda.com');

    define('SK_HOST', 'www.sportskeeda.com');
    define('WRITERS_HOST', 'writers.sportskeeda.com');
    define('WRITERS_URL', 'http://writers.sportskeeda.com');

    define('SITE_URL', 'http://www.sportskeeda.com');
    define('ENCRYPTION_KEY', 'CLG&kUYpBrChy0P9zNYWjgeDDqyXKCP*AHfhkZoMMkgxBZ0oa4');
    define('SALT', '!kQm*fF3pXe1Kbm%9');
    define('HASH', hash('SHA256', ENCRYPTION_KEY . SALT, true));
    define('LOGIN_URL', 'http://www.sportskeeda.com/wp-login.php');
    define('TESTSERVERUSERNAME', 'demokeeda');
    define('TESTSERVERPASSWORD', 'DemoKeeda');
    define('TESTSERVER', FALSE);
    define('NOIMAGE', 'http://www.sportskeeda.com/wp-content/themes/keeda/img/thumbnail-48.jpg');
    define('REGISTER_URL', 'http://www.sportskeeda.com/wp-login.php?action=register');
    define('APICLIENTLIST', serialize(array('sportskeeda-android', 'sportskeeda-windows8', 'sportskeeda-ios')));
    define('APICLIENTSTATUS', serialize(array('sportskeeda-windows8' => 1, 'sportskeeda-android' => 1, 'sportskeeda-ios' => 1)));

    define('SK_SERVER_NAME', 'api.sportskeeda.com');

    define('REDIS_HOST', '10.0.0.30');
    define('REDIS_PORT', 6379);
    define('REDIS_SCHEME', 'tcp');

    // Elastic Search Configurations
    define('ELASTICSEARCH_HOST', '10.0.0.25');
    define('ELASTICSEARCH_PORT', 9200);
    define('ELASTICSEARCH_TIMEOUT', 20);
}

// app access token for secure api
define('APPACCESSTOKEN', serialize(array('sk-android' => 'SpoRtsKeeDaAnDroId-2013')));
?>
