<?php

function connect_to_database()
{
	
	$servername = "testmysqlpedidosray.mysql.database.azure.com";
    $username = "pedidosray";
    $password = ".,05zaxscdvf112233";
    $dbname = "id16779907_db2";

	$conn = new mysqli($servername, $username, $password, $dbname);
    return $conn;

}
?>
