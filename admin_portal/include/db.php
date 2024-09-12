<?php

$db = new MYSQLi("localhost", "root", "", "pelaporankerusakanjalan_rohul");
if ($db->connect_error > 0) {
	die('Connection error');
} else {
	echo '';
};
