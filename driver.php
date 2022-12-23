<?php
require 'connection.php';
$conn = Connect();

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <?php
    include 'header_resources.php';

    ?>
    <script src="jquery.min.js"></script>
    <script src="bootstrap.bundle.min.js"></script>
    <script src="prism.js"></script>
    <script src="custom.js"></script>


</head>
<?php
include 'navbar.php';

?>
<body>
<div class="container">

    <div class="my-5 p-5"></div>
    <div class="my-5 p-5"></div>

    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col"></th>
            <th scope="col">Type</th>
            <th scope="col">Column heading</th>
            <th scope="col">Column heading</th>
            <th scope="col">Column heading</th>
            <th scope="col">Column heading</th>
            <th scope="col">Column heading</th>
        </tr>
        </thead>
        <tbody>

        <?php

        $results_per_page = 6;
        $sql = "SELECT * FROM driver ORDER BY username";
        $result = $conn->query($sql);
        $number_of_results = $result->num_rows;
        $number_of_pages = ceil($number_of_results/$results_per_page);

        if (!isset($_GET['page'])) {
            $page = 1;
        } else {
            if ($_GET['page']<=0) {
                $page = 1;
            }
            $page = $_GET['page'];
        }



        $this_page_first_result = ($page-1)*$results_per_page;



        $sql = "SELECT * FROM driver ORDER BY username LIMIT ". $this_page_first_result . "," .  $results_per_page;
        $result = $conn->query($sql);

        $conn->close();
        if ($result->num_rows > 0)
        {
            $count=$this_page_first_result+1;
            ?>
            <?php
        //OUTPUT DATA OF EACH ROW
            while($row = $result->fetch_assoc()){
                         ?>
                <tr>
                    <td><?php echo $count; ?></td>

                    <th scope="row"><?php echo $row['nic']; ?></th>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['dob']; ?></td>
                    <td><?php echo $row['password']; ?></td>
                    <td><?php echo $row['full_name']; ?></td>
                </tr>

            <?php
            $count++;
            } ?>


        <?php
        } ?>

        <?php
        if ($result->num_rows > 0)
        {}

         ?>


        </tbody>
    </table>
    <div class="mt-4">
        <ul class="pagination">
            <li class="page-item <?php if($page==1){echo "disabled";} ?>">
                <a class="page-link" href="driver.php?page=<?php echo $page-1; ?>">&laquo;</a>
            </li>

    <?php
    for ($page2=1;$page2<=$number_of_pages;$page2++) {
        ?>
        <li class="page-item <?php if($page==$page2){echo "active";} ?>">
            <a class="page-link" href="driver.php?page=<?php echo $page2; ?>"><?php echo $page2; ?> </a>

         </li>
    <?php
    } ?>
            <li class="page-item <?php if($page>=$page2-1){echo "disabled";} ?>">
                <a class="page-link" href="driver.php?page=<?php echo $page+1; ?>">&raquo;</a>
            </li>
        </ul>
    </div>



</div>
</body>
</html>









