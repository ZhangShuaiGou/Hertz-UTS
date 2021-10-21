<?php
session_start();

$to = $_POST['emailAddr'];
$subject = "Your Order Details";
$message = "<h4>Dear ".$_POST['firstName'].": <br>";
$message .= "Thanks for renting cars from Hertz-UTS, the total cost is $" . $_SESSION['sum'] .
            ".</h4><h4>Details are as follows:</h4>";

foreach ($_SESSION['cart'] as $id => $item) {
    $message .= "Model: ".$item['Brand']."-".$item['Model']."-".$item['Year'];
    $message .= "<br>mileage: " . $item['Mileage'] . " kms";
    $message .= "<br>fuel type: " . $item['FuelType'];
    $message .= "<br>seats: " . $item['Seats'];
    $message .= "<br>price per day: " . $item['PricePerDay'];
    $message .= "<br>rent days: " . $item['RentalDays'];
    $message .= "<br>description: " . $item['Description'];
    $message .= "<br><br>";
}
$message .= "<h4>We sincerely hope that your journey will be pleasant.</h4>";
    

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$from = "12976496@student.uts.edu.au";
$headers .= "From: $from";

mail($to, $subject, $message, $headers);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <meta http-equiv="refresh" content="3;url=car_rental_center.html">
    <title>Purchase</title>
</head>
<body>

    <div class="container text-center">
        <br><br><br><br>
        <h1>Sent email successfully.</h1><br>
        <h4>We will bring you back to home page in 3 seconds, or you can click 
        <a href="car_rental_center.html" target="mainFrame" class="btn btn-primary">Back to Home</a>
        </h4>
    </div>

</body>
<?php
session_destroy();
?>