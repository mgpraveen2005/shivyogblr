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

function show_pagination($targetpage, $page, $total_records, $limit = 30, $adjacents = 3) {
    /* Setup page vars for display. */
    if ($page == 0)
        $page = 1;     //if no page var is given, default to 1.
    $prev = $page - 1;       //previous page is page - 1
    $next = $page + 1;       //next page is page + 1
    $lastpage = ceil($total_records / $limit);  //lastpage is = total pages / items per page, rounded up.
    $lpm1 = $lastpage - 1;      //last page minus 1

    $pagination = "";
    if ($lastpage > 1) {
        $pagination .= "<div class='row' ><ul class=\"pagination pagination-sm pull-right\">";
//previous button
        if ($page > 1)
            $pagination.= "<li class=\"previous\"><a href=\"$targetpage?pg=1\">&laquo;</a></li>
                    <li class=\"prev\"><a href=\"$targetpage?pg=$prev\">&lsaquo;</a></li>";
        else
            $pagination.= "<li class=\"previous disable\"><a href=\"#\">&laquo;</a></li>
                    <li class=\"prev disable\"><a href=\"#\">&lsaquo;</a></li>";

//pages
        if ($lastpage < 7 + ($adjacents * 2)) { //not enough pages to bother breaking it up
            for ($counter = 1; $counter <= $lastpage; $counter++) {
                if ($counter == $page)
                    $pagination.= "<li class=\"active\"><a href=\"#\">$counter</a></li>";
                else
                    $pagination.= "<li><a href=\"$targetpage?pg=$counter\">$counter</a></li>";
            }
        }
        elseif ($lastpage > 5 + ($adjacents * 2)) { //enough pages to hide some
//close to beginning; only hide later pages
            if ($page < 1 + ($adjacents * 2)) {
                for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++) {
                    if ($counter == $page)
                        $pagination.= "<li class=\"active\"><a href=\"#\">$counter</a></li>";
                    else
                        $pagination.= "<li><a href=\"$targetpage?pg=$counter\">$counter</a></li>";
                }
                $pagination.= "<li class=\"dots\"><a href='#'>...</a></li>";
                $pagination.= "<li><a href=\"$targetpage?pg=$lpm1\">$lpm1</a><li>";
                $pagination.= "<li><a href=\"$targetpage?pg=$lastpage\">$lastpage</a></li>";
            }
//in middle; hide some front and some back
            elseif ($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2)) {
                $pagination.= "<li><a href=\"$targetpage?pg=1\">1</a></li>";
                $pagination.= "<li><a href=\"$targetpage?pg=2\">2</a></li>";
                $pagination.= "<li class=\"dots\"><a href='#'>...</a></li>";
                for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++) {
                    if ($counter == $page)
                        $pagination.= "<li class=\"active\"><a href=\"#\">$counter</a></li>";
                    else
                        $pagination.= "<li><a href=\"$targetpage?pg=$counter\">$counter</a></li>";
                }
                $pagination.= "<li class=\"dots\"><a href='#'>...</a></li>";
                $pagination.= "<li><a href=\"$targetpage?pg=$lpm1\">$lpm1</a></li>";
                $pagination.= "<li><a href=\"$targetpage?pg=$lastpage\">$lastpage</a><li>";
            }
//close to end; only hide early pages
            else {
                $pagination.= "<li><a href=\"$targetpage?pg=1\">1</a></li>";
                $pagination.= "<li><a href=\"$targetpage?pg=2\">2</a></li>";
                $pagination.= "<li class=\"dots\"><a href='#'>...</a></li>";
                for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++) {
                    if ($counter == $page)
                        $pagination.= "<li class=\"active\"><a href=\"#\">$counter</a></li>";
                    else
                        $pagination.= "<li><a href=\"$targetpage?pg=$counter\">$counter</a><li>";
                }
            }
        }

//next button
        if ($page < $counter - 1)
            $pagination.= "<li class=\"previous\"><a href=\"$targetpage?pg=$next\" >&rsaquo;</a></li>
                    <li class=\"next\"><a href=\"$targetpage?pg=$lastpage\" >&raquo;</a><li>";
        else
            $pagination.= "<li><a href=\"#\">&rsaquo;</a></span>
                    <li class=\"next disable\"><a href=\"#\">&raquo;</a></li>";
        $pagination.= "<ul></div>\n";
    }
    return $pagination;
}
