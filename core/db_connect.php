<?php
echo "hello";
session_start();

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "root";
$dbname = "boekenarchief";

$con = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($con -> connect_errno) {
    echo "Failed to connect to MySQL: " . $con -> connect_error;
    exit();
}

define("BASEURL","http://localhost/P3-webshop/webdev-base-webshop-live-les/");
define("BASEURL_CMS","http://localhost/P3-webshop/webdev-base-webshop-live-les/admin/");

function prettyDump ( $var ) {
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
}