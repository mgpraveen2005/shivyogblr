<?php
$app->post("/admin/ajax/registrations", $authenticate($app), function () use ($app) {
            $req = $app->request();
            $name = trim($req->params('name'));
            $email = trim($req->params('email'));
            $mobile = trim($req->params('mobile'));
            $reg_no = trim($req->params('reg_no'));
            
            $condition = '';
            if($name)
                $condition .= ' AND (LCASE(c.`firstname`) LIKE "%'.$name.'%" OR LCASE(c.`lastname`) LIKE "%'.$name.'%") ';
            else if($email)
                $condition .= ' AND LCASE(c.`email`) LIKE "%'.$email.'%"';
            else if($mobile)
                $condition .= ' AND LCASE(c.`contact_no`) LIKE "%'.$mobile.'%"';
            else if($reg_no)
                $condition .= ' AND LCASE(o.`reg_no`) LIKE "%'.$reg_no.'%"';
            
            $event_id = 1;
            $user_id = 0;
            if ($_SESSION['capability'] < 6) {
                $user_id = $_SESSION['user_id'];
            }
            $orders = get_orders($event_id, $user_id, 1, $condition);
            $app->render('../templates/order_table.tpl', array('orders' => $orders));
        });