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
                <p>Brand: -- Brand --</p>
                <div class="d-flex justify-content-start" style="background-color: red;">
                        <p>--rating-- --star rating--</p>
                        <p>--total rating bumber-- ratings</p>
                </div>
                <p>$<?php echo $row['prodprice'] ?></p>
                <p>Quantity remaining: <?php echo $row['prodquantity'] ?></p>
                <p><?php echo $row['proddescription'] ?></p>
            </div>
        </div>
    </div>

    <div class="mt-3 mb-3">
        <div class="row">
            <div class="col-12">
                <h2>Product Description</h2>
            </div>
        </div>
    </div>

    <div class="mt-3 mb-3">
        <div class="row">
            <div class="col-12">
                <h4>What do customers buy after viewing this item?</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-2">
                --Card--
            </div>
            <div class="col-2">
                --Card--
            </div>
            <div class="col-2">
                --Card--
            </div>
            <div class="col-2">
                --Card--
            </div>
            <div class="col-2">
                --Card--
            </div>
            <div class="col-2">
                --Card--
            </div>
        </div>
    </div>


</section>

<?php include("../assets/footer.php"); ?>