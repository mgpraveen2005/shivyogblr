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
            $app->view()->setData('pagetitle', 'Shivyog Bangalore');
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

            $app->render('../templates/login.tpl', array('error' => $error, 'urlRedirect' => $urlRedirect));
        });

$app->post("/admin/login", function () use ($app) {
            $email = $app->request()->post('email');
            $password = $app->request()->post('password');
            $user_data = admin_login($email, $password);

            $error = '';
            if (!$user_data) {
                $error = 'Email and Password mismatch!';
            } else if (!$user_data['is_enabled']) {
                $error = 'Account has been disabled!';
            }

            if ($error) {
                $app->flash('error', $error);
                $app->redirect('/admin/login');
            }

            $_SESSION['user_email'] = $user_data['email'];
            $_SESSION['display_name'] = $user_data['display_name'];
            $_SESSION['user_id'] = $user_data['id'];
            $user_group_ds = get_record('user_group', ' WHERE id = ' . $user_data['group_id']);
            $_SESSION['capability'] = $user_group_ds[0]['capability'];

            if (isset($_SESSION['urlRedirect'])) {
                $tmp = $_SESSION['urlRedirect'];
                unset($_SESSION['urlRedirect']);
                $app->redirect($tmp);
            }

            $app->redirect('/admin');
        });

$app->get("/admin", $authenticate($app), function () use ($app) {
            if ($_SESSION['capability'] < 7) {
                $app->redirect('/admin/registrations');
            } else {
                
                
                
                $app->render('../templates/admin.tpl');
            }
        });
