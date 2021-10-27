<?php
// hiermee kun je $_SESSION globals gaan gebruiken
session_start();

/**
 * Voor de MAC gebruikers;
 */
// $dbhost = "localhost";
// $dbuser = "root";
// $dbpass = "root";
// $dbname = "webshop";

/**
 * Voor de Windows gebruikers;
 */
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "root";
$dbname = "boekenarchief";

$con = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($con -> connect_errno) {
    echo "Failed to connect to MySQL: " . $con -> connect_error;
    exit();
}

define("BASEURL","http://localhost/Periode%203/php/webshop-live-les-1wdv2-master/");
define("BASEURL_CMS","http://localhost/Periode%203/php/webshop-live-les-1wdv2-master/admin/");

function prettyDump ( $var ) {
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
}
