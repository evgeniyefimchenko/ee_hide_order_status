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
    $options_array = ['C' => ['D', 'P']];
    $res = [];
    if ($options_array[$order_status]) {
        $options_array[$order_status][] = $order_status;
        foreach ($options_array[$order_status] as $val) {
            $res[$val] = $statuses[$val];
        }
    }
    return $res;
}