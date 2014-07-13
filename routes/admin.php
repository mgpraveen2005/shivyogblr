<?php

$app->add(new \Slim\Middleware\SessionCookie(array('secret' => SECRET_KEY, 'expires' => '59 minutes')));

$authenticate = function ($app) {
            return function () use ($app) {
                        if (!isset($_SESSION['user_id'])) {
                            $_SESSION['urlRedirect'] = $app->request()->getPathInfo();
                            $app->flash('error', 'Login required');
                            $app->redirect('/admin/login');
                        }
                    };
        };

$app->hook('slim.before.dispatch', function() use ($app) {
            $user = null;
            $username = null;
            $capability = null;
            if (isset($_SESSION['user_id'])) {
                $user = $_SESSION['user_id'];
                $username = $_SESSION['display_name'];
                $capability = $_SESSION['capability'];
            }
            $app->view()->setData('user', $user);
            $app->view()->setData('username', $username);
            $app->view()->setData('capability', $capability);
        });

$app->get("/admin/logout", function () use ($app) {
            unset($_SESSION['user_id']);
            unset($_SESSION['user_email']);
            unset($_SESSION['display_name']);
            unset($_SESSION['capability']);
            $app->view()->setData('user', null);
            $app->view()->setData('username', null);
            $app->view()->setData('capability', null);
            $app->redirect('/admin');
        });

$app->get("/admin/login", function () use ($app) {
            $flash = $app->view()->getData('flash');

            $error = '';
            if (isset($flash['error'])) {
                $error = $flash['error'];
            }

            $urlRedirect = '/admin';

            if ($app->request()->get('r') && $app->request()->get('r') != '/admin/logout' && $app->request()->get('r') != '/admin/login') {
                $_SESSION['urlRedirect'] = $app->request()->get('r');
            }

            if (isset($_SESSION['urlRedirect'])) {
                $urlRedirect = $_SESSION['urlRedirect'];
            }

            $email_value = $email_error = $password_error = '';

            if (isset($flash['email'])) {
                $email_value = $flash['email'];
            }

            if (isset($flash['errors']['email'])) {
                $email_error = $flash['errors']['email'];
            }

            if (isset($flash['errors']['password'])) {
                $password_error = $flash['errors']['password'];
            }

            $app->render('../templates/login.tpl', array('error' => $error, 'email_value' => $email_value, 'email_error' => $email_error, 'password_error' => $password_error, 'urlRedirect' => $urlRedirect));
        });

$app->post("/admin/login", function () use ($app) {
            $email = $app->request()->post('email');
            $password = $app->request()->post('password');

            $errors = array();

            $user_data = admin_login($email, $password);
            if (!$user_data) {
                $app->flash('email', $email);
                $errors['email'] = "Email is not found.";
                $errors['password'] = "Password does not match.";
            }

            if (count($errors) > 0) {
                $app->flash('errors', $errors);
                $app->redirect('/admin/login');
            }

            $_SESSION['user_email'] = $user_data['email'];
            $_SESSION['display_name'] = $user_data['display_name'];
            $_SESSION['user_id'] = $user_data['id'];
            $user_group_ds = get_record('user_group', ' WHERE id = '.$user_data['group_id']);
            $_SESSION['capability'] = $user_group_ds[0]['capability'];

            if (isset($_SESSION['urlRedirect'])) {
                $tmp = $_SESSION['urlRedirect'];
                unset($_SESSION['urlRedirect']);
                $app->redirect($tmp);
            }

            $app->redirect('/admin');
        });

$app->get("/admin/users", $authenticate($app), function () use ($app) {
            $users = get_users();
            $app->render('../templates/user_list.tpl', array('users' => $users));
        });

$app->get("/admin/user(/:id)", $authenticate($app), function ($id = 0) use ($app) {
            $data = array('id' => '', 'email' => '', 'display_name' => '', 'group_id' => '');
            $groups = get_record('user_group', ' ORDER BY capability');
            if ($id) {
                $users = get_record('user', ' WHERE id = ' . $id);
                $data = $users[0];
            }
            $app->render('../templates/user_form.tpl', array('data' => $data, 'groups' => $groups));
        });

$app->post("/admin/user", $authenticate($app), function () use ($app) {
            $data = array();
            $data['user_id'] = $app->request()->post('user_id');
            $data['email'] = $app->request()->post('email');
            $data['display_name'] = $app->request()->post('display_name');
            $data['group_id'] = $app->request()->post('group_id');
            $data['password'] = $app->request()->post('password');
            $confirm_password = $app->request()->post('confirm_password');
            if ($data['password'] == $confirm_password) {
                $user_id = save_user($data);
            }
            $app->redirect('/admin/users');
        });

$app->get("/admin/groups", $authenticate($app), function () use ($app) {
            $groups = get_record('user_group');
            $app->render('../templates/user_group.tpl', array('groups' => $groups));
        });

$app->get("/admin/group(/:id)", $authenticate($app), function ($id = 0) use ($app) {
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

$app->get("/admin(/:page)", $authenticate($app), function ($page = 0) use ($app) {
            $orders = get_orders($page);
            $app->render('../templates/admin.tpl', array('orders' => $orders, 'page' => $page));
        });

$app->get("/admin/order(/:id)", $authenticate($app), function ($id = 0) use ($app) {
            $app->render('../templates/order_form.tpl');
        });

$app->get("/admin/events(/:page)", $authenticate($app), function ($page = 0) use ($app) {
            $app->render('../templates/events.tpl');
        });

$app->get("/admin/event(/:id)", $authenticate($app), function ($id = 0) use ($app) {
            $app->render('../templates/event_form.tpl');
        });