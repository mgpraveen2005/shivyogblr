<?php

function admin_login($email, $password) {
    $db = getConnection();
    $pass_code = sha1($password);
    $query = 'SELECT id, email, display_name, group_id, is_enabled FROM `user` WHERE `email`= ? AND `password`= ?';
    $stmt = $db->prepare($query);
    $stmt->bind_param('ss', $email, $pass_code);
    $stmt->execute();
    $meta = $stmt->result_metadata();

    $col_names = array();
    $row = array();
    $result = array();

    while ($field = $meta->fetch_field())
        $col_names[] = &$row[$field->name];

    call_user_func_array(array($stmt, 'bind_result'), $col_names);

    while ($stmt->fetch()) {
        $data = array();
        foreach ($row as $key => $val)
            $data[$key] = $val;

        $result[] = $data;
    }
    if (!empty($result))
        return $result[0];

    return FALSE;
}

function save_user($user_data) {
    $db = getConnection();
    if (isset($user_data['user_id']) && $user_data['user_id'] > 0) {
        $query = 'UPDATE `user`';
        $where = ' WHERE id = ' . $user_data['user_id'];
        $get_id = 0;
    } else {
        $query = 'INSERT INTO `user`';
        $where = ', created_date = NOW()';
        $get_id = 1;
    }
    $set_query = ' SET email = ?, display_name = ?, group_id = ?, is_enabled = ?';
    if (isset($user_data['password']) && !empty($user_data['password'])) {
        $set_query .= ', `password` = "' . sha1($user_data['password']) . '"';
    }
    $query .= $set_query . $where;
    $stmt = $db->prepare($query);
    $stmt->bind_param('ssii', $user_data['email'], $user_data['display_name'], $user_data['group_id'], $user_data['is_enabled']);
    $stmt->execute();
    if ($get_id)
        return getLastInsertedId($db);
    else
        return $user_data['user_id'];
}

function save_user_group($user_group_data) {
    $db = getConnection();
    if (isset($user_group_data['group_id']) && $user_group_data['group_id'] > 0) {
        $query = 'UPDATE `user_group`';
        $where = ' WHERE id = ' . $user_group_data['group_id'];
        $get_id = 0;
    } else {
        $query = 'INSERT INTO `user_group`';
        $where = '';
        $get_id = 1;
    }
    $set_query = ' SET group_name = ?, capability = ?';

    $query .= $set_query . $where;
    $stmt = $db->prepare($query);
    $stmt->bind_param('ss', $user_group_data['group_name'], $user_group_data['capability']);
    $stmt->execute();
    if ($get_id)
        return getLastInsertedId($db);
    else
        return $user_group_data['group_id'];
}

function save_event($event_data) {
    $db = getConnection();
    if (isset($event_data['event_id']) && $event_data['event_id'] > 0) {
        $query = 'UPDATE `event`';
        $where = ' WHERE id = ' . $event_data['event_id'];
        $get_id = 0;
    } else {
        $query = 'INSERT INTO `event`';
        $where = ', created_date = NOW()';
        $get_id = 1;
    }
    $set_query = ' SET event_name = ?, start_date = ?, end_date = ?, event_type = ?, event_slug = ?, venue = ?, address = ?, city = ?, country = ?, user_id = ?';

    $query .= $set_query . $where;
    $stmt = $db->prepare($query);
    $stmt->bind_param('sssisssssi', $event_data['event_name'], $event_data['start_date'], $event_data['end_date'], $event_data['event_type'], $event_data['event_slug'], $event_data['venue'], $event_data['address'], $event_data['city'], $event_data['country'], $event_data['user_id']);
    $stmt->execute();
    if ($get_id)
        return getLastInsertedId($db);
    else
        return $event_data['event_id'];
}

function save_category($category_data) {
    $db = getConnection();
    if (isset($category_data['category_id']) && $category_data['category_id'] > 0) {
        $query = 'UPDATE `category`';
        $where = ' WHERE id = ' . $category_data['category_id'];
        $get_id = 0;
    } else {
        $query = 'INSERT INTO `category`';
        $where = ', created_date = NOW()';
        $get_id = 1;
    }
    $set_query = ' SET category_name = ?, category_slug = ?, amount = ?, is_enabled = ?';

    $query .= $set_query . $where;
    $stmt = $db->prepare($query);
    $stmt->bind_param('ssdi', $category_data['category_name'], $category_data['category_slug'], $category_data['amount'], $category_data['is_enabled']);
    $stmt->execute();
    if ($get_id)
        return getLastInsertedId($db);
    else
        return $category_data['category_id'];
}

function save_order($order_data) {
    $db = getConnection();
    if (isset($order_data['order_id']) && $order_data['order_id'] > 0) {
        $query = 'UPDATE `order`';
        $where = ' WHERE id = ' . $order_data['order_id'];
        $get_id = 0;
    } else {
        $query = 'INSERT INTO `order`';
        $where = ', created_date = NOW(), user_id = ' . $order_data['user_id'];
        $get_id = 1;
    }
    $set_query = ' SET event_id = ?, customer_id = ?, category_id = ?';

    $query .= $set_query . $where;
    $stmt = $db->prepare($query);
    $stmt->bind_param('iii', $order_data['event_id'], $order_data['customer_id'], $order_data['category_id']);
    $stmt->execute();
    if ($get_id)
        return getLastInsertedId($db);
    else
        return $order_data['order_id'];
}

function save_payment($payment_data) {
    $db = getConnection();
    if (isset($payment_data['payment_id']) && $payment_data['payment_id'] > 0) {
        $query = 'UPDATE `payment`';
        $where = ' WHERE id = ' . $payment_data['payment_id'];
        $get_id = 0;
    } else {
        $query = 'INSERT INTO `payment`';
        $where = ', created_date = NOW()';
        $get_id = 1;
    }
    $set_query = ' SET order_id = ?, amount = ?, payment_type = ?, dd_id = ?';

    $query .= $set_query . $where;
    $stmt = $db->prepare($query);
    $stmt->bind_param('idsi', $payment_data['order_id'], $payment_data['amount'], $payment_data['payment_type'], $payment_data['dd_id']);
    $stmt->execute();
    if ($get_id)
        return getLastInsertedId($db);
    else
        return $payment_data['payment_id'];
}

function save_dd_history($dd_history_data) {
    $db = getConnection();
    if (isset($dd_history_data['dd_history_id']) && $dd_history_data['dd_history_id'] > 0) {
        $query = 'UPDATE `dd_history`';
        $where = ' WHERE id = ' . $dd_history_data['dd_history_id'];
        $get_id = 0;
    } else {
        $query = 'INSERT INTO `dd_history`';
        $where = ', created_date = NOW()';
        $get_id = 1;
    }
    $set_query = ' SET dd_id = ?, status = ?, handed_by = ?, handed_to = ?';

    $query .= $set_query . $where;
    $stmt = $db->prepare($query);
    $stmt->bind_param('iiii', $dd_history_data['dd_id'], $dd_history_data['status'], $dd_history_data['handed_by'], $dd_history_data['handed_to']);
    $stmt->execute();
    if ($get_id)
        return getLastInsertedId($db);
    else
        return $dd_history_data['dd_history_id'];
}

function save_dd_details($dd_details_data) {
    $db = getConnection();
    if (isset($dd_details_data['dd_id']) && $dd_details_data['dd_id'] > 0) {
        $query = 'UPDATE `dd_details`';
        $where = ' WHERE id = ' . $dd_details_data['dd_id'];
        $get_id = 0;
    } else {
        $query = 'INSERT INTO `dd_details`';
        $where = '';
        $get_id = 1;
    }
    $set_query = ' SET dd_amount = ?, dd_bank = ?, dd_number = ?, dd_date = ?';

    $query .= $set_query . $where;
    $stmt = $db->prepare($query);
    $stmt->bind_param('dsss', $dd_details_data['dd_amount'], $dd_details_data['dd_bank'], $dd_details_data['dd_number'], $dd_details_data['dd_date']);
    $stmt->execute();
    if ($get_id)
        return getLastInsertedId($db);
    else
        return $dd_details_data['dd_id'];
}

function save_customer($customer_data) {
    $db = getConnection();
    if (isset($customer_data['customer_id']) && $customer_data['customer_id'] > 0) {
        $query = 'UPDATE `customer`';
        $where = ' WHERE id = ' . $customer_data['customer_id'];
        $get_id = 0;
    } else {
        $query = 'INSERT INTO `customer`';
        $where = ', created_date = NOW()';
        $get_id = 1;
    }
    $set_query = ' SET title = ?, firstname = ?, lastname = ?, email = ?, contact_no = ?, dob = ?, address = ?, city = ?, state = ?, country = ?, pincode = ?, pan_no = ?, gender = ?';

    $query .= $set_query . $where;
    $stmt = $db->prepare($query);
    $stmt->bind_param('sssssssssssss', $customer_data['title'], $customer_data['firstname'], $customer_data['lastname'], $customer_data['email'], $customer_data['contact_no'], $customer_data['dob'], $customer_data['address'], $customer_data['city'], $customer_data['state'], $customer_data['country'], $customer_data['pincode'], $customer_data['pan_no'], $customer_data['gender']);
    $stmt->execute();
    if ($get_id)
        return getLastInsertedId($db);
    else
        return $customer_data['customer_id'];
}

function delete_record($table, $condition) {
    $db = getConnection();
    $query = 'DELETE FROM ' . $table . ' WHERE ' . $condition;
    $rs = $db->query($query);
    return $rs;
}

function get_record($table, $condition = '') {
    $db = getConnection();
    $query = 'SELECT * FROM ' . $table . $condition;
    $result = $db->query($query);
    $rs = array();
    while ($row = $result->fetch_assoc()) {
        $rs[] = $row;
    }
    return $rs;
}

function get_total_records($table_name, $field_name = 'id', $condition = '') {
    $db = getConnection();
    $query = 'SELECT COUNT(' . $field_name . ') AS total FROM ' . $table_name . $condition;
    $result = $db->query($query);
    if ($result) {
        $row = $result->fetch_assoc();
        return $row['total'];
    }
    return FALSE;
}

function get_users($condition = '') {
    $db = getConnection();
    $query = 'SELECT u.`id`, u.`email`, u.`display_name`, u.`group_id`, g.`group_name`, u.`is_enabled` FROM `user` u INNER JOIN `user_group` g ON u.`group_id` = g.`id`' . $condition;
    $result = $db->query($query);
    $rs = array();
    while ($row = $result->fetch_assoc()) {
        $rs[] = $row;
    }
    return $rs;
}

function get_orders($event_id, $user_id = 0, $page = 1, $condition = '') {
    $db = getConnection();
    $limit = 30;
    if ($page > 1) {
        $offset = 30 * ($page - 1);
        $limit = $offset . ', 30';
    }
    $where = ' WHERE o.event_id = ' . $event_id;
    if ($user_id)
        $where .= ' AND o.user_id = ' . $user_id;

    $query = 'SELECT c.`id`, c.`firstname`, c.`lastname`, c.`email`, c.`contact_no`, o.`status`, ct.`category_name`, o.`created_date`, o.`reg_no`, p.payment_type, u.`display_name` FROM `order` o INNER JOIN customer c ON o.`customer_id` = c.`id` INNER JOIN category ct ON ct.`id` = o.`category_id` INNER JOIN payment p ON p.order_id = o.id LEFT JOIN user u ON o.`user_id` = u.`id`' . $where . $condition . ' ORDER BY o.`id` DESC LIMIT ' . $limit;
    $result = $db->query($query);
    $rs = array();
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $rs[] = $row;
        }
    }
    return $rs;
}

function get_order($id) {
    $db = getConnection();
    $query = 'SELECT c.*, o.id as order_id, o.category_id, o.`status`, o.reg_no, p.id as payment_id, p.payment_type, p.amount, d.id as dd_id, d.dd_amount, d.dd_bank, d.dd_number, d.dd_date
        FROM `order` o 
        INNER JOIN customer c ON o.`customer_id` = c.`id` 
        INNER JOIN payment p ON p.order_id = o.id
        LEFT JOIN dd_details d ON p.dd_id = d.id 
        WHERE o.id  = ' . $id;
    $result = $db->query($query);
    $rs = array();
    while ($row = $result->fetch_assoc()) {
        $rs[] = $row;
    }
    return $rs;
}

function get_order_info($event_id, $condition = '') {
    $db = getConnection();
    $where = ' WHERE o.event_id = ' . $event_id;
    $query = 'SELECT c.`id`, c.`firstname`, c.`lastname`, c.`email`, c.`contact_no`, o.`id` AS order_id, o.category_id FROM `order` o INNER JOIN customer c ON o.`customer_id` = c.`id`' . $where . $condition;
    $result = $db->query($query);
    $rs = array();
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $rs[] = $row;
        }
    }
    return $rs;
}

function get_orders_history($event_id, $page = 1, $condition = '') {
    $db = getConnection();
    $limit = 30;
    if ($page > 1) {
        $offset = 30 * ($page - 1);
        $limit = $offset . ', 30';
    }
    $where = ' WHERE o.event_id = ' . $event_id;

    $query = 'SELECT oh.*, c.`firstname`, c.`lastname`, c.`email`, c.`contact_no`, o.`id` AS order_id FROM order_history oh INNER JOIN `order` o ON oh.order_id = o.id INNER JOIN customer c ON o.customer_id = c.id' . $where . $condition . ' ORDER BY oh.`id` DESC LIMIT ' . $limit;
    $result = $db->query($query);
    $rs = array();
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $rs[] = $row;
        }
    }
    return $rs;
}

function save_order_history($order_data) {
    $db = getConnection();
    $query = 'INSERT INTO `order_history` SET order_id = ?, order_status = ?, old_reg_no = ?, new_reg_no = ?, amount = ?, remarks = ?, user_id = ?';
    $stmt = $db->prepare($query);
    $stmt->bind_param('iissdsi', $order_data['order_id'], $order_data['order_status'], $order_data['old_reg_no'], $order_data['new_reg_no'], $order_data['amount'], $order_data['remarks'], $order_data['user_id']);
    $stmt->execute();
    return getLastInsertedId($db);
}

function get_events($page = 0) {
    $limit = 20;
    if ($page > 0) {
        $offset = 20 * $page;
        $limit = $offset . ', 20';
    }
    $rs = get_record('event', $condition = ' LIMIT ' . $limit);
    return $rs;
}

function get_event($id) {
    $rs = get_record('event', $condition = ' WHERE id = ' . $id);
    return $rs;
}

function get_category($event_id) {
    $rs = get_record('category', $condition = ' WHERE event_id = ' . $event_id);
    return $rs;
}

function update_order_status($order_id, $status_text) {
    $db = getConnection();
    $status_query = 'UPDATE `order` SET `status` = "' . $status_text . '" WHERE id = ' . $order_id;
    $db->query($status_query);
}

function set_reg_no($order_id, $category_id) {
    $db = getConnection();

    $counter_query = 'UPDATE `category` SET counter = counter+1 WHERE id = ' . $category_id;
    $db->query($counter_query);

    $category_data = get_record('category', $condition = ' WHERE id = ' . $category_id);

    $reg_no = $category_data[0]['category_slug'] . '-' . $category_data[0]['counter'];

    $query = 'UPDATE `order` SET reg_no = ?, category_id = ? WHERE id = ?';
    $stmt = $db->prepare($query);
    $stmt->bind_param('sii', $reg_no, $category_id, $order_id);
    $stmt->execute();

    return $reg_no;
}

function save_seat_pool($category_id, $reg_no) {
    $db = getConnection();
    $query = 'INSERT IGNORE INTO `seat_pool` SET category_id = ?, reg_no = ?';
    $stmt = $db->prepare($query);
    $stmt->bind_param('is', $category_id, $reg_no);
    $stmt->execute();
}

function check_dd_exists($data) {
    $db = getConnection();
    $dd_check = get_record('dd_details', $condition = ' WHERE dd_number = ' . $data['dd_number'] . ' AND dd_bank = "' . $data['dd_bank'] . '"');
    if (!empty($dd_check)) {
        return $dd_check[0]['id'];
    }
    return FALSE;
}

function get_orders_report($data) {
    $db = getConnection();
    $where = ' WHERE o.event_id = ' . $data['event_id'];

    if ($data['to_date'] == $data['from_date'])
        $where .= ' AND DATE(o.`created_date`) = "' . $data['from_date'] . '"';
    else
        $where .= ' AND (DATE(o.`created_date`) BETWEEN "' . $data['from_date'] . '" AND "' . $data['to_date'] . '")';

    $query = 'SELECT o.`id` AS ID, o.`reg_no` AS `Reg No`, CONCAT(c.`firstname`, " ", c.`lastname`) AS `Name`, c.`contact_no` AS `Mobile No`, c.`email` AS Email, ct.`category_name` AS `Category`, DATE(o.`created_date`) AS `Date`, TIME(o.`created_date`) AS `Time`, p.amount AS `Category Amount`, p.payment_type AS `Payment Type`,
        dd.`dd_amount` AS `DD Amount`, dd.`dd_number` AS `DD No`, dd.`dd_bank` AS `Bank`, dd.`dd_date` AS `DD Date`, 
        c.`title` AS Title, c.`gender` AS Gender, c.`dob` AS `DOB`, c.`address` AS Address, c.`city` AS City, c.`state` AS State, c.`country` AS Country, c.`pincode` AS `PIN Code`, c.pan_no AS `PAN No`,
        o.status AS `Status`, oh.amount AS `Upgrade Amount`, oh.remarks AS `Remarks`, 
        u.`display_name` AS `Reg Center` 
        FROM `order` o INNER JOIN customer c ON o.`customer_id` = c.`id` INNER JOIN category ct ON ct.`id` = o.`category_id` INNER JOIN payment p ON o.`id` = p.`order_id` LEFT JOIN dd_details dd ON p.`dd_id` = dd.`id` LEFT JOIN `user` u ON o.`user_id` = u.`id` LEFT JOIN order_history oh ON o.id = oh.order_id ' . $where . ' ORDER BY o.`id`';
    $result = $db->query($query);
    $rs = array();
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $rs[] = $row;
        }
    }
    return $rs;
}

function get_summary_report($data) {
    $db = getConnection();
    $where = ' WHERE o.event_id = ' . $data['event_id'];

    if ($data['from_date']) {
        if ($data['to_date'] == $data['from_date'])
            $where .= ' AND DATE(o.`created_date`) = "' . $data['from_date'] . '"';
        else
            $where .= ' AND (DATE(o.`created_date`) BETWEEN "' . $data['from_date'] . '" AND "' . $data['to_date'] . '")';
    }

    $cat_list = array();
    $cat_query = 'SELECT `id`, `category_name` FROM category WHERE event_id = ' . $data['event_id'];
    $cat_result = $db->query($cat_query);
    if ($cat_result) {
        while ($cat_row = $cat_result->fetch_assoc()) {
            $cat_list[$cat_row['category_name']] = $cat_row['id'];
        }
    }

    $rs = array();
    $user_query = 'SELECT id, display_name FROM `user`';
    $user_result = $db->query($user_query);
    while ($user_row = $user_result->fetch_assoc()) {
        $rs[$user_row['id']]['Reg Center'] = $user_row['display_name'];
        foreach ($cat_list as $cat_name => $cat_id) {
            $rs[$user_row['id']][$cat_name] = 0;
            $query = 'SELECT COUNT(o.id) AS counts FROM `order` o ' . $where . '  AND o.`category_id` = ' . $cat_id . ' AND o.`user_id` = ' . $user_row['id'];
            $result = $db->query($query);
            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    $rs[$user_row['id']][$cat_name] = $row['counts'];
                }
            }
        }
    }
    return $rs;
}

function get_order_history_report($data) {
    $db = getConnection();
    $where = ' WHERE o.event_id = ' . $data['event_id'] . ' AND oh.order_status = ' . $data['order_status'];

    if ($data['to_date'] == $data['from_date'])
        $where .= ' AND DATE(oh.`modified_date`) = "' . $data['from_date'] . '"';
    else
        $where .= ' AND (DATE(oh.`modified_date`) BETWEEN "' . $data['from_date'] . '" AND "' . $data['to_date'] . '")';

    $query = 'SELECT oh.order_id AS `Registration ID`, o.status AS `Status`, oh.old_reg_no AS `Old Reg No`, oh.new_reg_no AS `New Reg No`, oh.amount AS `Amount`, oh.remarks AS `Remarks`, c.`firstname` AS `First Name`, c.`lastname` AS `Last Name`, c.`email` AS `Email`, c.`contact_no` AS `Mobile No` FROM order_history oh INNER JOIN `order` o ON oh.order_id = o.id INNER JOIN customer c ON o.customer_id = c.id' . $where . ' ORDER BY oh.`id`';
    $result = $db->query($query);
    $rs = array();
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $rs[] = $row;
        }
    }
    return $rs;
}