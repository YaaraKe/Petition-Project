<?php
session_start();
$email = $_SESSION['user_name'];
$conn = mysqli_connect('localhost', 'nofarrei_user', '12345', 'nofarrei_Petition') or die('connection failed');

if (isset($_POST['order_btn'])) {

    $today = date("Ymd");
    $rand = strtoupper(substr(uniqid(sha1(time())), 0, 4));
    $unique = $today . $rand;

    $cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE `email`= '" . $email . "'");
    $price_total = 0;
    if (mysqli_num_rows($cart_query) > 0) {
        while ($product_item = mysqli_fetch_assoc($cart_query)) {
            $product_name[] = $product_item['name'] . ' (' . $product_item['quantity'] . ') ';
            $product_price = number_format($product_item['price'] * $product_item['quantity']);
            $price_total += $product_price;
        };
    };



    $total_product = implode(', ', $product_name);
    $detail_query = mysqli_query($conn, "INSERT INTO `order`(number_order, total_products, total_price, date, email) 
VALUES('$unique','$total_product','$price_total', now() ,'$email')") or die('query failed');



    if ($cart_query && $detail_query) {
        echo "
      <div class='order-message-container'>
      <div class='message-container'>
         <h3>thank you for shopping!</h3>
         <div class='order-detail'>
          <span>oder number: " . $unique . "</span>
            <span>" . $total_product . "</span>
            <span class='total'> total : ₪" . $price_total . "</span>
         </div>
            <a href='../index_react/index.html' class='btn'>continue shopping</a>
         </div>
      </div>
      ";
        mysqli_query($conn, "DELETE FROM `cart` WHERE `email`= '" . $email . "'");
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="../pageShop/pageshop.js"></script>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="../style.css">

</head>

<body>


    <!-- navbar -->
    <div id="navbar"></div>

    <div class="container">

        <section class="checkout-form">

            <h1 class="heading-1">complete your order</h1>
            <details class="col-3" id="change">
                <summary>Payment Process</summary>
                <p style="font-size:11px;">Please make sure you paid with Googlepay before pressing the "order now" button</p>
            </details>

            <form action="" method="post">

                <!--<div class="display-order">-->
                <div>
                    <hr>
                    <p id="order_de">Order details</p>
                    <p class="des">Products (quantity)</p>
                    <?php
                    $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE `email`= '" . $email . "'");
                    $total = 0;
                    $grand_total = 0;
                    if (mysqli_num_rows($select_cart) > 0) {
                        while ($fetch_cart = mysqli_fetch_assoc($select_cart)) {
                            $total_price = number_format($fetch_cart['price'] * $fetch_cart['quantity']);
                            $grand_total = $total += $total_price;
                    ?>

                            <span style="display:block;margin-bottom: 0.6rem;"><?= $fetch_cart['name']; ?>(<?= $fetch_cart['quantity']; ?>)</span>

                    <?php
                        }
                    } else {
                        echo "<div class='display-order'><span>your cart is empty!</span></div>";
                    }
                    ?>
                    <!--class="grand-total"-->
                    <p class="des">Total amount</p>
                    <span style="display:block;margin-bottom: 0.6rem;" id="price1"><?= $grand_total; ?>₪</span>
                    <!--<p  style="display:none;">100</p>-->
                </div>


                <div id="container"></div>
                <div id="update" style="display:none;"></div>
                <script async src="https://pay.google.com/gp/p/js/pay.js" onload="onGooglePayLoaded()"></script>
                <div id="sub">

                    <button id="order_now" type="submit" value="order now" name="order_btn" class="btn" disabled>Order now <svg xmlns="http://www.w3.org/2000/svg" style="margin-left:0.5rem;" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-circle" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z" />
                        </svg></button>
                </div>
            </form>
            <br>



        </section>





    </div>
    <!-- footer -->
    <div id="footer"></div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script>
        $("document").ready(function() {
            //  navbar
            $("#navbar").load("../common/NavBar.php");
            //  footer
            $("#footer").load("../common/footer.html");
        });
    </script>
    <script type="text/javascript">
        var element = document.getElementById('update');
        element.addEventListener('DOMSubtreeModified', updateModified);

        function updateModified(e) {
            if (element.innerHTML == "success") {
                console.log(element.innerHTML);
                document.getElementById("order_now").disabled = false;
            };
        };
    </script>
    <script>
        updatePrice();
        updateAmount();

        function updateAmount() {
            localStorage.setItem('amount', '1');
        }

        function updatePrice() {
            let price = document.getElementById("price1").innerHTML;
            price = price.replace("₪", "");
            localStorage.setItem('price', `${price}`);
        }
    </script>



</body>

</html>

</html>