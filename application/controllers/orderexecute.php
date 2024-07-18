<?php
include '../main_connection.php';
if (isset($_POST['order_id'])) {
	$order_id = $_POST['order_id'];
	$sql = "DELETE from orders WHERE order_id='$order_id'";
	$sql_result = mysqli_query($connection, $sql);
	header("Location:/TAES/index.php");
	exit;
} else {
	echo "Order ID is not set.";
}
