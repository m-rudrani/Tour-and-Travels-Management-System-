<?php

// 	$cn=mysqli_connect("localhost","root","","t&t");
// 	if(mysqli_connect_errno())
// 	{
// 		echo "failed to connect to mysqli:".mysqli_connect_error();
// 	}
// 	return $cn;

// /**
//  * Summary of makeconnection
//  * @return bool|mysqli
//  */
function connect()
{
	$con=mysqli_connect("localhost","root","","t&t");
	if(mysqli_connect_errno())
	{
		echo "failed to connect to mysqli:".mysqli_connect_error();
	}
	return $con;
}

$cn=mysqli_connect("localhost","root","","t&t");
?>