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
                <p><span class="fw-bold">Brand:</span> <?php echo $row['prodbrand'] ?></p>
                <div class="d-flex justify-content-start">
                        <p>5 <span style="color:#ffa41c">&#9733;&#9733;&#9733;&#9733;&#9733;</span></p>
                        <p class="ms-3"><?php echo $row['prodreviewcount'] ?> ratings</p>
                </div>
                <p class="fw-semibold fs-2">$<?php echo $row['prodprice'] ?></p>
                <p>Stock left: <?php echo $row['prodquantity'] ?></p>
                <p class="fw-bold">About this item:</p>
                <p><?php echo $row['prodshortdescription'] ?></p>
            </div>
        </div>
    </div>

    <div class="mt-3 mb-3">
        <div class="row">
            <div class="col-12">
                <h2>Product Description</h2>
                <p><?php echo $row['prodlongdescription'] ?></p>
            </div>
        </div>
    </div>

    <div class="mt-3 mb-3">
        <div class="row mt-3">
            <div class="col-12">
                <h4>What do customers buy after viewing this item?</h4>
            </div>
        </div>
        <div class="row mt-3">
            <?php 
            
            $query = "SELECT * FROM products";

            $result = mysqli_query($connection, $query);

            if(!$result){
                die("Query failed" . mysqli_error($connection));
            }
            else {
                for($i = 1; $i <= 6; $i++){
                    $row = mysqli_fetch_assoc($result);
                    ?>

                    <div class='col-2'>
                        <img src="<?php echo $row['prodimage']; ?>" class="card-img-top" alt="<?php echo $row['prodname']; ?>" style="width: 150px;">
                        <h4 class="mb-1"><?php echo $row['prodname']?></h4>
                        <p class="">$<?php echo $row['prodprice']; ?></p>
                    </div>

                    <?php
                }
            }
            ?>
            
            <!-- <div class="col-2">
                --Card--
            </div> -->
            <!-- <div class="col-2">
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
            </div> -->
        </div>
    </div>


</section>

<?php include("../assets/footer.php"); ?>