<?php

$app->get("/admin/reports", $authenticate($app), function () use ($app) {
            $event_id = 1;
            $app->render('../templates/reports.tpl', array('event_id' => $event_id));
        });

$app->post("/admin/reports", $authenticate($app), function () use ($app) {
            $req = $app->request();
            $data = $req->params();

            if (!isset($data['from_date']))
                $app->redirect('/admin/reports');

            $data['from_date'] = date('Y-m-d', strtotime($data['from_date']));
            if (!empty($data['to_date'])) {
                $data['to_date'] = date('Y-m-d', strtotime($data['to_date']));
            } else {
                $data['to_date'] = $data['from_date'];
            }

            get_orders_report($data);
        });