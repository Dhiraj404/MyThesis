
<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "db_oamsdb";


if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("failed to connect!". mysqli_connect_error());
}
?>
