<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_REQUEST['dispatch'] == 'addons.update' && $_REQUEST['addon'] == 'ee_hide_order_status') {
	db_query('TRUNCATE ?:ee_hide_order_status_opt');
	foreach ($_REQUEST as $key => $value) {
		if (mb_stripos($key, 'field_') !== false) {
			unset($value[0]);
			db_query("INSERT INTO ?:ee_hide_order_status_opt SET chr_status = ?s, fields = ?s", mb_substr($key, -1), implode(',', $value));
		}
	}
}
