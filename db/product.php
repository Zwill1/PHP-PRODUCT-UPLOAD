<?php include "dbcon.php" ?>
<?php include "../assets/header.php" ?>

<section class="container">
    <?php 

    if(isset($_GET['id'])){

        $id = $_GET['id'];

        $query = "SELECT * FROM products WHERE prodid = $id";

        $result = mysqli_query($connection, $query);
    
        if(!$result){
            die("Query failed" . mysqli_error($connection));
        } else {
            $row = mysqli_fetch_assoc($result);
        }

    }
    
    ?>

    <div class="mt-3 mb-3">
        <div class="row">
            <div class="col-4">
                <img src="<?php echo $row['prodimage'];  ?>" alt="<?php echo $row["prodname"]; ?>" style="width: 250px;" />
            </div>
            <div class="col-8">
                <h1 class="fw-bold"><?php echo $row['prodname']; ?></h1>
                <p>$<?php echo $row['prodprice'] ?></p>
                <p><?php echo $row['prodquantity'] ?></p>
                <p><?php echo $row['proddescription'] ?></p>
            </div>
        </div>
    </div>


</section>

<?php include("../assets/footer.php"); ?>