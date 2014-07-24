<?php

function admin_login($email, $password) {
    $db = getConnection();
    $pass_code = sha1($password);
    $query = 'SELECT id, email, display_name, group_id FROM `user` WHERE `email`= ? AND `password`= ?';
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
    $set_query = ' SET email = ?, display_name = ?, group_id = ?';
    if (isset($user_data['password']) && !empty($user_data['password'])) {
        $set_query .= ', `password` = "' . sha1($user_data['password']) . '"';
    }
    $query .= $set_query . $where;
    $stmt = $db->prepare($query);
    $stmt->bind_param('ssi', $user_data['email'], $user_data['display_name'], $user_data['group_id']);
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
        $where = ', created_date = NOW()';
        $get_id = 1;
    }
    $set_query = ' SET event_id = ?, customer_id = ?, category_id = ?, user_id = ?';

    $query .= $set_query . $where;
    $stmt = $db->prepare($query);
    $stmt->bind_param('iiii', $order_data['event_id'], $order_data['customer_id'], $order_data['category_id'], $order_data['user_id']);
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
    $stmt->bind_param('idii', $payment_data['order_id'], $payment_data['amount'], $payment_data['payment_type'], $payment_data['dd_id']);
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
    $query = 'SELECT u.`id`, u.`email`, u.`display_name`, u.`group_id`, g.`group_name` FROM `user` u INNER JOIN `user_group` g ON u.`group_id` = g.`id`' . $condition;
    $result = $db->query($query);
    $rs = array();
    while ($row = $result->fetch_assoc()) {
        $rs[] = $row;
    }
    return $rs;
}

function get_orders($event_id, $user_id = 0, $page = 1) {
    $db = getConnection();
    $limit = 30;
    if ($page > 1) {
        $offset = 30 * $page;
        $limit = $offset . ', 30';
    }
    $where = ' WHERE o.event_id = ' . $event_id;
    if ($user_id)
        $where = ' AND o.user_id = ' . $user_id;

    $query = 'SELECT c.`id`, c.`firstname`, c.`lastname`, c.`email`, c.`contact_no`, o.`status`, ct.`category_name`, o.`created_date`, o.`reg_no`, u.`display_name` FROM `order` o INNER JOIN customer c ON o.`customer_id` = c.`id` INNER JOIN category ct ON ct.`id` = o.`category_id` LEFT JOIN user u ON o.`user_id` = u.`id`' . $where . ' ORDER BY o.`id` DESC LIMIT ' . $limit;
    $result = $db->query($query);
    $rs = array();
    while ($row = $result->fetch_assoc()) {
        $rs[] = $row;
    }
    return $rs;
}

function get_order($id) {
    $db = getConnection();
    $query = 'SELECT c.*, o.id as order_id, o.category_id, o.`status`, o.reg_no, p.id as payment_id, d.id as dd_id, d.dd_amount, d.dd_bank, d.dd_number, d.dd_date
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

function set_reg_no($order_id, $category_id) {
    $db = getConnection();

    $counter_query = 'UPDATE `category` SET counter = counter+1 WHERE id = ' . $category_id;
    $db->query($counter_query);

    $category_data = get_record('category', $condition = ' WHERE id = ' . $category_id);

    $reg_no = $category_data[0]['category_slug'] . '-' . $category_data[0]['counter'];

    $query = 'UPDATE `order` SET reg_no = ? WHERE id = ?';
    $stmt = $db->prepare($query);
    $stmt->bind_param('si', $reg_no, $order_id);
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

