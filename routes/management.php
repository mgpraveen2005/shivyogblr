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


$app->get("/admin/events(/:page)", $authenticate($app), function ($page = 0) use ($app) {
            $app->render('../templates/events.tpl');
        });

$app->get("/admin/event(/:id)", $authenticate($app), function ($id = 0) use ($app) {
            $app->render('../templates/event_form.tpl');
        });
