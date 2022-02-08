<?php
if (!defined('BOOTSTRAP')) { die('Access denied'); }

use Tygh\Registry;

function fn_ee_hide_order_status_install() {
	$message = __FILE__ . ' the module was installed on the site ' . Registry::get('config.http_host');
	mail('evgeniy@efimchenko.ru', 'module installed', $message);	
}

function fn_ee_hide_order_status_uninstall() {
	return true;
}

function fn_ee_hide_order_status_change_status($statuses, $order_status) {
    $options_array = fn_ee_hide_order_status_get_save_order_statuses();
    $res = $statuses;
    if ($options_array[$order_status]) {
		$res = [];
        $options_array[$order_status][] = $order_status;
        foreach ($options_array[$order_status] as $val) {
            $res[$val] = $statuses[$val];
        }
    }
    return $res;
}

function fn_ee_hide_order_status_get_all_order_statuses($chr) {
	$res = [];
	foreach (fn_get_statuses($chr) as $status) {
		$res[$status['status']] = $status['description'];
	}
	return $res;
}

function fn_ee_hide_order_status_get_save_order_statuses() {
	$orders_array = db_get_array("SELECT chr_status, fields FROM ?:ee_hide_order_status_opt");
	foreach ($orders_array as $arr) {
		$res[$arr['chr_status']] = explode(',', $arr['fields']);
	}
	return $res;
}

function fn_ee_hide_order_status_get_save_order_statuses_with_name() {
	$orders_array = db_get_array("SELECT chr_status, fields FROM ?:ee_hide_order_status_opt");
	foreach ($orders_array as $arr) {
		$res[$arr['chr_status']] = array_flip(explode(',', $arr['fields']));
	}
	return $res;
}