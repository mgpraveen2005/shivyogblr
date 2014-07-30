<?php

$app->get("/admin/users", $authenticate($app), function () use ($app) {
            if ($_SESSION['capability'] < 8) {
                $app->redirect('/admin');
            }
            $users = get_users();
            $app->render('../templates/user_list.tpl', array('users' => $users));
        });

$app->get("/admin/user(/:id)", $authenticate($app), function ($id = 0) use ($app) {
            $edit_disable = '';
            if ($_SESSION['capability'] < 8) {
                if ($_SESSION['user_id'] != $id) {
                    $app->redirect('/admin');
                }
                $edit_disable = 'disabled';
            }
            $data = array('id' => '', 'email' => '', 'display_name' => '', 'group_id' => '', 'is_enabled' => 1);
            $groups = get_record('user_group', ' ORDER BY capability');
            if ($id) {
                $users = get_record('user', ' WHERE id = ' . $id);
                $data = $users[0];
            }
            $app->render('../templates/user_form.tpl', array('data' => $data, 'groups' => $groups, 'edit_disable' => $edit_disable));
        });

$app->post("/admin/user", $authenticate($app), function () use ($app) {
            $data = array();
            $data['user_id'] = $app->request()->post('user_id');
            $data['email'] = $app->request()->post('email');
            $data['display_name'] = $app->request()->post('display_name');
            $data['group_id'] = $app->request()->post('group_id');
            $data['password'] = $app->request()->post('password');
            $confirm_password = $app->request()->post('confirm_password');

            $data['is_enabled'] = $app->request()->post('is_enabled');
            if (is_null($data['is_enabled']))
                $data['is_enabled'] = 0;

            if ($data['password'] == $confirm_password) {
                $user_id = save_user($data);
            }
            $app->redirect('/admin/users');
        });

$app->get("/admin/groups", $authenticate($app), function () use ($app) {
            if ($_SESSION['capability'] < 8) {
                $app->redirect('/admin');
            }
            $groups = get_record('user_group');
            $app->render('../templates/user_group.tpl', array('groups' => $groups));
        });

$app->get("/admin/group(/:id)", $authenticate($app), function ($id = 0) use ($app) {
            if ($_SESSION['capability'] < 8) {
                $app->redirect('/admin');
            }
            $data = array('id' => '', 'group_name' => '', 'capability' => '');
            if ($id) {
                $group = get_record('user_group', ' WHERE id = ' . $id);
                $data = $group[0];
            }
            $app->render('../templates/user_group_form.tpl', array('data' => $data));
        });

$app->post("/admin/group", $authenticate($app), function () use ($app) {
            $data = array();
            $data['group_id'] = $app->request()->post('group_id');
            $data['group_name'] = $app->request()->post('group_name');
            $data['capability'] = $app->request()->post('capability');
            $group_id = save_user_group($data);
            $app->redirect('/admin/groups');
        });

$app->get("/admin/events", $authenticate($app), function () use ($app) {
            if ($_SESSION['capability'] < 8) {
                $app->redirect('/admin');
            }
            $events = get_record('event');
            foreach ($events as &$event_type) {
                if ($event_type["event_type"])
                    $event_type["event_type"] = 'Paid';
                else
                    $event_type["event_type"] = 'Free';
            }
            $app->render('../templates/events.tpl', array('events' => $events));
        });

$app->get("/admin/event(/:id)", $authenticate($app), function ($id = 0) use ($app) {
            if ($_SESSION['capability'] < 8) {
                $app->redirect('/admin');
            }
            $data = array('id' => '', 'event_name' => '', 'start_date' => '', 'end_date' => '', 'event_type' => '', 'event_slug' => '', 'venue' => '', 'address' => '', 'city' => '', 'country' => '');
            $category = array();
            if ($id) {
                $events = get_record('event', ' WHERE id = ' . $id);
                $data = $events[0];
                $category = get_record('category', ' WHERE event_id = ' . $id);
            }
            $app->render('../templates/event_form.tpl', array('data' => $data, 'category' => $category));
        });

$app->post("/admin/event", $authenticate($app), function () use ($app) {
            $data = array();
            $data['event_id'] = $app->request()->post('event_id');
            $data['event_name'] = $app->request()->post('event_name');
            $data['start_date'] = $app->request()->post('start_date');
            $data['end_date'] = $app->request()->post('end_date');
            $data['event_type'] = $app->request()->post('event_type');
            $data['event_slug'] = $app->request()->post('event_slug');
            $data['venue'] = $app->request()->post('venue');
            $data['address'] = $app->request()->post('address');
            $data['city'] = $app->request()->post('city');
            $data['country'] = $app->request()->post('country');
            $data['user_id'] = $_SESSION['user_id'];
            $event_id = save_event($data);

            $app->redirect('/admin/events');
        });