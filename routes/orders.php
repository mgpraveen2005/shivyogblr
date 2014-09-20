<?php

$app->get("/admin/registrations", $authenticate($app), function () use ($app) {
            $req = $app->request();
            $page = $req->params('pg');
            if (!$page)
                $page = 1;
            $event_id = 1;
            $user_id = 0;
            $condition = '';
            if ($_SESSION['capability'] < 6) {
                $user_id = $_SESSION['user_id'];
                $condition = ' WHERE user_id = ' . $user_id;
            }
            $total_records = get_total_records('`order`', 'id', $condition);
            $pagination = show_pagination('/admin/registrations', $page, $total_records);
            $orders = get_orders($event_id, $user_id, $page);
            $app->render('../templates/order_list.tpl', array('orders' => $orders, 'pagination' => $pagination));
        });

$app->get("/admin/register(/:id)", $authenticate($app), function ($id = 0) use ($app) {
            $flash = $app->view()->getData('flash');
            $error = '';
            if (isset($flash['dup_error'])) {
                $error = $flash['dup_error'];
                $data = $_SESSION['reg_form_data'];
                $data['id'] = 0;
                unset($_SESSION['reg_form_data']);
            } else {
                $data = array('id' => 0, 'title' => 'Mr.', 'firstname' => '', 'lastname' => '', 'email' => '', 'contact_no' => '', 'gender' => 'M', 'dob' => '', 'address' => '', 'city' => '', 'state' => '', 'country' => 'India', 'pincode' => '', 'pan_no' => '', 'order_id' => 0, 'category_id' => 0, 'payment_id' => 0, 'payment_type' => '', 'dd_id' => 0, 'dd_amount' => '', 'dd_bank' => '', 'dd_number' => '', 'dd_date' => '', 'reg_no' => '', 'order_note' => '');
            }
            $event_id = 1;
            $order_history = array();
            $category = get_record('category', ' WHERE event_id = ' . $event_id);
            if ($id) {
                $order = get_order($id);
                $data = $order[0];
                if ($data['payment_type'] == 'cash') {
                    $data['dd_amount'] = $data['amount'];
                }
                if (isset($data['dob'])) {
                    $data['dob'] = date('d-m-Y', strtotime($data['dob']));
                }
                if (isset($data['dd_date'])) {
                    $data['dd_date'] = date('d-m-Y', strtotime($data['dd_date']));
                }
                $order_history = get_record('order_history', ' WHERE order_id = ' . $id);
            }
            $app->render('../templates/order_form.tpl', array('category' => $category, 'order' => $data, 'event_id' => $event_id, 'error' => $error, 'order_history' => $order_history));
        });

$app->post("/admin/register", $authenticate($app), function () use ($app) {
            $req = $app->request();
            $data = $req->params();
            $set_seat = 1;
            $is_new = 1;
            if (isset($data['order_id']) && $data['order_id'] > 0) {
                $is_new = 0;
                $set_seat = 0;
            }

            if ($is_new) {
                // Check for Customer duplication
                $c_condition = ' WHERE firstname="' . $data['firstname'] . '" AND lastname="' . $data['lastname'] . '" AND contact_no="' . $data['contact_no'] . '"';
                $c_exists = get_total_records('customer', 'id', $c_condition);
                if ($c_exists) {
                    $app->flash('dup_error', 'Duplicate Entry!! Sadhak already exists!');
                    $_SESSION['reg_form_data'] = $data;
                    $app->redirect('/admin/register');
                }
            } else {
                $order_old = get_record('`order`', ' WHERE id = ' . $data['order_id']);
                if ($order_old[0]['category_id'] != $data['category_id']) {
                    save_seat_pool($order_old[0]['category_id'], $order_old[0]['reg_no']);
                    $set_seat = 1;
                }
            }

            if (isset($data['dob'])) {
                $data['dob'] = date('Y-m-d', strtotime($data['dob']));
            }

            if (isset($data['dd_date'])) {
                $data['dd_date'] = date('Y-m-d', strtotime($data['dd_date']));
            }

            $user_id = $_SESSION['user_id'];

            if ($data['payment_type'] == 'dd') {
                $dd_exists = '';
                if (!isset($data['dd_id']) || $data['dd_id'] < 1) {
                    $dd_exists = check_dd_exists($data);
                }
                if ($dd_exists)
                    $data['dd_id'] = $dd_exists;
                else {
                    $data['dd_id'] = save_dd_details($data);
                }

                if ($is_new) {
                    $dd_history_data = $data;
                    $dd_history_data['status'] = 'possession';
                    $dd_history_data['handed_by'] = $dd_history_data['handed_to'] = $user_id;
                    $dd_history_id = save_dd_history($dd_history_data);
                }
            } else {
                $data['dd_id'] = 0;
            }

            $customer_data = $data;
            $data['customer_id'] = save_customer($customer_data);

            $order_data = $data;
            $order_data['user_id'] = $user_id;
            $data['order_id'] = save_order($order_data);

            if ($set_seat) {
                $data['reg_no'] = set_reg_no($data['order_id'], $data['category_id']);
            }

            $payment_data = $data;
            $category_data = get_record('category', ' WHERE id = ' . $payment_data['category_id']);
            $payment_data['amount'] = $category_data[0]['amount'];
            $data['payment_id'] = save_payment($payment_data);

            if ($set_seat) {
                $app->render('../templates/order_msg.tpl', array('data' => $data));
            } else {
                $app->redirect('/admin/registrations');
            }
        });


$app->get("/admin/upgrades", $authenticate($app), function () use ($app) {
            $req = $app->request();
            $page = $req->params('pg');
            if (!$page)
                $page = 1;
            $event_id = 1;
            $user_id = 0;
            $condition = '';
            if ($_SESSION['capability'] < 6) {
                $user_id = $_SESSION['user_id'];
                $condition = ' WHERE user_id = ' . $user_id;
            }
            $total_records = get_total_records('`order_history`', 'id', $condition);
            $pagination = show_pagination('/admin/upgrades', $page, $total_records);
            $orders = get_orders_history($event_id, $page);
            $app->render('../templates/order_change_list.tpl', array('orders' => $orders, 'pagination' => $pagination));
        });

$app->get("/admin/upgrade", $authenticate($app), function () use ($app) {
            $event_id = 1;
            $category = get_record('category', ' WHERE event_id = ' . $event_id);
            $app->render('../templates/order_change_form.tpl', array('category' => $category, 'event_id' => $event_id));
        });

$app->post("/admin/upgrade", $authenticate($app), function () use ($app) {
            $req = $app->request();
            $data = $req->params();
            switch ($data['order_status']) {
                case 1:
                    save_seat_pool($data['old_category_id'], $data['old_reg_no']);
                    $data['new_reg_no'] = set_reg_no($data['order_id'], $data['category_id']);
                    $status_text = 'Upgraded';
                    break;
                case 2:
                    $data['amount'] = 0;
                    $data['new_reg_no'] = $data['old_reg_no'];
                    $status_text = 'Cancelled';
                    break;
                case 3:
                    $data['amount'] = 0;
                    $data['new_reg_no'] = $data['old_reg_no'];
                    $status_text = 'Name Changed';
                    update_order_names($data);
                    break;
            }
            update_order_status($data['order_id'], $status_text);
            $data['user_id'] = $_SESSION['user_id'];
            $order_history_id = save_order_history($data);
            $app->redirect('/admin/upgrades');
        });