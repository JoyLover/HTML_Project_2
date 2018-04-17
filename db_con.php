<?php
require_once "utilities.php";

// Parse with sections
$db_con = parse_ini_file("config.ini", true);

// connection pool
$db = new con_mysqli(
    'p:'.$db_con['db_info']['host'],
    ''.$db_con['db_info']['user'],
    ''.$db_con['db_info']['password'],
    ''.$db_con['db_info']['database']
);

?>