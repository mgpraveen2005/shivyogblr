<?php

$app->get("/admin/reports", $authenticate($app), function () use ($app) {
            $event_id = 1;
            $flash = $app->view()->getData('flash');
            $error = '';
            if (isset($flash['nodata_error'])) {
                $error = $flash['nodata_error'];
            }
            $app->render('../templates/reports.tpl', array('event_id' => $event_id, 'error' => $error));
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

            $report_type = $data['report_type'];
            switch ($report_type) {
                case 'summary':
                    $report_data = get_summary_report($data);
                    break;
                case 'upgrades':
                    $data['order_status'] = 1;
                    $report_data = get_order_history_report($data);
                    break;
                case 'cancellations':
                    $data['order_status'] = 2;
                    $report_data = get_order_history_report($data);
                    break;
                case 'namechange':
                    $data['order_status'] = 3;
                    $report_data = get_order_history_report($data);
                    break;
                case 'notattended':
                    $data['order_status'] = 4;
                    $report_data = get_order_history_report($data);
                    break;
                default:
                    $report_data = get_orders_report($data);
                    break;
            }
            if (!empty($report_data)) {
                download_send_headers($report_type);
                echo array2csv($report_data);
                die();
            } else {
                $app->flash('nodata_error', 'No Data available for the selected dates');
                $app->redirect('/admin/reports');
            }
        });
