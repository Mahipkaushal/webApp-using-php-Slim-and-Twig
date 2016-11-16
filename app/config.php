<?php

<<<<<<< HEAD
define('APP', 'Expense_Manager');
define('APP_ID', '1');
define('APP_VERSION', '1.0');


=======
>>>>>>> 93a1ca385c20b137c9fbc0bf0057bf0148d07729
// DB
define('DB_DRIVER', 'mysqli');
define('DB_HOSTNAME', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'tailmill');
define('DB_PREFIX', 'ver100_');

$dbConfig = array(
    'driver'        => DB_DRIVER,
    'hostname'      => DB_HOSTNAME,
    'username'      => DB_USERNAME,
    'password'      => DB_PASSWORD,
    'database'      => DB_DATABASE,
    'prefix'        => DB_PREFIX
);

$date = new DateTime();
$date->setTimezone(new DateTimeZone('Asia/Kolkata'));

$mdate = $date->format('Y-m-d H:i:s');
define('REAL_TIME', $mdate);
