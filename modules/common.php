<?php
function getConnection() {
    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $mysqli->set_charset("utf8");
    return $mysqli;
}

function getLastInsertedId($db = '') {
    if (isset($db))
        return mysqli_insert_id($db);
}

function closeConnection($db = '') {
    if (isset($db))
        return mysqli_close($db);
}

function do_curl($url, &$status_code) {
    $time_out = 10;
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, $time_out);
    $data = curl_exec($ch);
    $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    return $data;
}
