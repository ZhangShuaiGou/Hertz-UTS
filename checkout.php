<?php
session_start();
$sum = 0;
$rentalDays = $_REQUEST['rentalDays'];
$index = 0;
foreach ($_SESSION['cart'] as $id => $item) {
    $_SESSION['cart'][$id]['RentalDays'] = $rentalDays[$index];
    $sum += $rentalDays[$index++] * $item['PricePerDay'];
}
$_SESSION['sum']=$sum;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Checkout</title>
</head>
<body>
    <form name="purchaseForm" method="post" action="sendemail.php">
    <h1 class="text-center">Check Out</h1>
    <div class="container">
        <h3>Customer Details and Payment</h3>
        <p class="font-weight-light">Please fill in your details. <span style="color: red;">*</span> indicates  field</p>
        <div class="form-group row">
            <div class="col-md-2" style=“text-align:center;”>
                <label for="firstName">First Name</label><span style="color: red;">*</span>
            </div>
            <div class="col-md-10"> 
            <input type="text" class="form-control" required name="firstName" id="firstName" placeholder="First Name">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-2">            
                <label for="lastName">Last Name</label><span style="color: red;">*</span>
            </div>
            <div class="col-md-10">
                <input type="text" class="form-control" required name="lastName" id="lastName"  placeholder="Last Name">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-2">
            <label for="emailAddr" >Email Address</label><span style="color: red;">*</span>    
            </div>
            <div class="col-md-10">
                <input type="email" class="form-control" required name="emailAddr" id="emailAddr"  placeholder="Email Address">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-2">
            <label for="addrLine1"  >Address Line 1</label><span style="color: red;">*</span>
            </div>
            <div class="col-md-10">
                <input type="text" class="form-control" required name="addrLine1" id="addrLine1"  placeholder="Address Line 1">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-2">
            <label for="addrLine2"  >Address Line 2</label>
            </div>
            <div class="col-md-10">
                <input type="text" class="form-control" name="addrLine2" id="addrLine2" placeholder="Address Line 2">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-2">
            <label for="city"  >City</label><span style="color: red;"  >*</span>
            </div>
            <div class="col-md-10">
                <input type="text" class="form-control" required name="city" id="city"  placeholder="City">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-2">
            <label for="state"  >State</label><span style="color: red;">*</span>
            </div>
            <div class="col-md-10">
                <select class="form-control" required id="state" name="state">
                    <option selected>New South Wales</option>
                    <option>Western Australia</option>
                    <option>Queensland</option>
                    <option>South Australia</option>
                    <option>Victoria</option>
                    <option>Tasmania</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-2">
            <label for="postCode"  >Post Code</label><span style="color: red;">*</span>
            </div>
            <div class="col-md-10">
                <input type="text" class="form-control" required name="postCode" id="postCode"  placeholder="Post Code">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-2">
            <label for="paymentType"  >Payment Type</label><span style="color: red;">*</span>
            </div>
            <div class="col-md-10">
                <select class="form-control" required id="paymentType" name="paymentType">
                    <option selected>VISA</option>
                    <option>MasterCard</option>
                    <option>PayPal</option>
                    <option>Bpay</option>
                    <option>Direct deposit</option>
                </select>
            </div>
        </div>
        <h3>You are required to pay $<?php echo $sum;?></h3>
        <div class="form-group row">
            <div class="col-md-12 text-right">
                <a href="car_rental_center.html" target="mainFrame" class="btn btn-primary">Continue Selection</a>
                <button type="submit" class="btn btn-primary">Booking</button>
            </div>
        </div>
    </form>
    </div>
</body>
</html>