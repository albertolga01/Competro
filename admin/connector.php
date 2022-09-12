<?php

define('hostname', 'localhost');
define('user','wwcomp_sistemas');
define('password', 's7O4BJi0H5J4');
define('databaseName','wwcomp_comercializadora');
define('dName','wwcomp_sistemaprecios');

$connect = mysqli_connect(hostname, user, password, databaseName);
$connect2 = mysqli_connect(hostname, user, password, dName);

?>