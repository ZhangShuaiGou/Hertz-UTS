<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <?php
    session_start();
    if (empty($_SESSION["cart"])){
        echo '<meta http-equiv="refresh" content="3;url=car_rental_center.html">';
        ?>
    <title>Car Reservation</title>
</head>
<body>
    <h2 class="text-center">Car Reservation</h2>
        <?php       
            echo '<div class="container text-center">';
            echo '<h2>You have not rent any car.</h2>';
            echo '<h4>We will bring you to home page in 3 seconds, <br>or you can click<a href="car_rental_center.html" target="mainFrame" class="btn btn-primary">Back to Home</a></h4></div>';
        }else{
            echo '<form id="checkoutForm" method="post" action="checkout.php">';
            echo '<h2 style="text-align:center;">Car Reservation</h2>';
            
            echo '<div class="container">
                        <table class="table">
                            <thead class="thead-light" align="center">
                            <tr>
                                <th align="center" scope="col">Thumbnail</th>
                                <th align="center" scope="col">Vehicle</th>
                                <th align="center" scope="col">Price Per Day</th>
                                <th align="center" scope="col">Rental Days</th>
                                <th align="center" scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>';

            foreach ($_SESSION["cart"] as $id => $item) {
                echo '<tr>';
                echo '<td align="center" class="align-middle" scope="row"><img style="width: 110px; height: 80px;" class="img-thumbnail" src="images/'.$item["Model"].'.jpg"></td>';
                echo '<td align="center" class="align-middle" >'.$item["Year"].'-'.$item["Brand"].'-'.$item["Model"].'</td>';
                echo '<td align="center" class="align-middle">'.$item["PricePerDay"].'</td>';
                echo '<td align="center" class="align-middle"><input name="rentalDays[]" type="number" required max="99999" min="1" value="'.$item["RentalDays"].'" </td>';
                echo '<td align="center" class="align-middle"><a href="deleteCar.php?id=' .$id .'" class="btn btn-primary">Delete</a></td></tr>';
            }

            echo '</tbody></table>
            <div class="text-right">
                <button type="submit" form="checkoutForm" class="btn btn-primary">Processing to Checkout</button>
            </div></div></form>';

        }
        ?>

</body>
</html>