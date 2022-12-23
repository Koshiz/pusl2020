<?php
session_start();


if(!isset($_SESSION['seller'])){
    header('Location: seller_login.php');
    die();
}


$page="order completed list";
include 'file_seller.php';

require 'connection.php';
$conn = Connect();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>KALAYA</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="css/custom2.css" rel="stylesheet" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style type="text/css">


    </style>
    <!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.-->
    <script>
        var __adobewebfontsappname__ = "dreamweaver";
    </script>
    <script src="http://use.edgefonts.net/source-sans-pro:n2:default.js" type="text/javascript"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>



<body>




<?php include 'navigation_bar.php';?>







<div class="container">

    <div class="row mt-5 p-0 d-flex justify-content-center">
        <div class="m-0 p-0 text-center col-10">

            <h1 class="">Completed Orders</h1>

            <hr class="cart_item_divider">

        </div>

    </div>

</div>





<div class="container p-0 m-0 mx-auto col-11 col-md-10 justify-content-center">



    <div class="row d-flex justify-content-center m-0 mx-auto p-0">
        <div class="m-0 mt-4 mb-5 px-0 col-12 col-sm-12 col-md-10 col-xl-6 col-lg-10 mx-auto">
            <table class="table mx-auto col-12  ">
                    <thead class="thead-dark">
                    <tr >

                        <th colspan="2">details</th>


                    </tr>
                    </thead>
                    <tbody>



                    <?php






                    // Storing Session
                    $user_check=$_SESSION['seller'];
                    $sql = "
SELECT order_ID,username,item_name,quantity,order_date,customer.address,customer.contact FROM orders o join customer on  username=customer.user_name WHERE o.item_ID IN (SELECT i.item_ID FROM items i WHERE i.seller='$user_check') AND o.status='done' ORDER BY order_date";
                    $result = mysqli_query($conn, $sql);


                    if (mysqli_num_rows($result) > 0)
                    {

                        ?>



                        <?PHP
                        //OUTPUT DATA OF EACH ROW
                        while($row = mysqli_fetch_assoc($result)){
                            ?>

                            <tr class="tab2 ">

                                <td class="tab2 p-1 pt-4"></td>
                                <td class="tab2 p-1  pt-4 pl-4 text-left" colspan="3"><p><?php echo $row["item_name"]; ?> - <?php echo $row["quantity"]; ?></p></td>

                            </tr>


                            <tr class="tab23">

                            <td class="tab23  p-1 pb-3"><?php echo $row["order_date"]; ?></td>
                            <td class="tab23   p-1  pb-3 pl-4 text-left" colspan="3">
                                <p>Name - <?php echo $row["username"]; ?></p><p><?php echo $row["contact"]; ?></p><p>Address - <?php echo $row["address"]; ?></p></td>



                            </tr>



                        <?php } ?>



                    <?php } else { ?>

                        <h4><center>0 RESULTS</center> </h4>

                    <?php } ?>

                    </tbody>
                </table>

                <div class="col-12 d-flex p-0 m-0 sticky2">



                </div>


        </div>







    </div>



</div>



</body>
</html>