<?php
$id = $_GET['id'];
session_start();
unset($_SESSION['cart'][$id]);

header("Location: car_reservation.php");
?>