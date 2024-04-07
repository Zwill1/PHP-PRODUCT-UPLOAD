<?php include "db/dbcon.php" ?>
<?php include "assets/header.php" ?>

    <!-- display success when inserting is done correctly -->
    <?php        
        if(isset($_GET['insert_msg'])){
            echo 
            "<section class='container-fluid p-0'>
                <div class='bg-success p-2'>
                    <div class='container text-white text-center fw-bold'>
                        <h6 class='text-center'>".$_GET['insert_msg']."</h6>
                    </div>
                </div>
            </section>";
        }       
    ?>

    <!-- display success when deleting a product is done correctly -->
    <?php        
        if(isset($_GET['delete_msg'])){
            echo 
            "<section class='container-fluid p-0'>
                <div class='bg-success p-2'>
                    <div class='container text-white text-center fw-bold'>
                        <h6 class='text-center'>".$_GET['delete_msg']."</h6>
                    </div>
                </div>
            </section>";
        }       
    ?>

<div class="container">
    <section class="mt-5 mb-2">
        <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Product</button>
    </section>
    <!-- <section class="mb-5">
        <form method="POST" action="">
            <div class="row mb-3">
                <div class="col">
                    <input type="text" placeholder="Product Name" class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <input type="text" class="form-control" placeholder="Product Price" aria-label="Product Price">
                </div>
                <div class="col">
                    <input type="text" class="form-control" placeholder="Product Quantity" aria-label="Product Quantity">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <input type="text" class="form-control" placeholder="Product Image Link" aria-label="Product Image">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <textarea class="form-control" placeholder="Product Description" rows="3"></textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </section> -->

    <!-- Displaying the data in a row on home page -->
    <section>
    <?php        
        if(isset($_GET['message'])){
            echo "<h6 class='text-center'>".$_GET['message']."</h6>";
        }        
        ?>

        <table class="table">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Product Name</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Product Image</th>
                <th scope="col">Product Description</th>
                <th scope="col">Info</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                
                $query = "SELECT * FROM products";

                $result = mysqli_query($connection, $query);

                if(!$result){
                    die("Query failed" . mysqli_error($connection));
                }
                else {
                    // print_r($result);
                    while($row = mysqli_fetch_assoc($result)){
                        ?>
                        <tr>
                            <th scope="row"><?php echo $row['prodid']; ?></th>
                            <td><?php echo $row['prodname']; ?></td>
                            <td>$<?php echo $row['prodprice']; ?></td>
                            <td><?php echo $row['prodquantity']; ?></td>
                            <td><img src="<?php echo $row['prodimage']; ?>" style="width: 50px;" /></td>
                            <td><?php echo $row['proddescription']; ?></td>
                            <td><a href="db/product.php?id=<?php echo $row['prodid']; ?>" class="btn btn-info">More Info</a></td>
                            <td><a href="db/edit_product.php?id=<?php echo $row['prodid']; ?>" class="btn btn-warning">Edit</a></td>
                            <td><a href="db/delete_product.php?id=<?php echo $row['prodid']; ?>" class="btn btn-danger">Delete</a></td>
                        </tr>
                        <?php
                    }
                }           
                ?>
            </tbody>
        </table>

    </section>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="db/create_product.php" method="POST">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add A New Product</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <!-- <form> -->
                    <div class="form-group">
                        <label for="exampleInputFistName">Product Name</label>
                        <input type="text" class="form-control" id="exampleInputFistName" name="pname" aria-describedby="First Name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputLastName">Product Price</label>
                        <input type="text" class="form-control" id="exampleInputLastName" name="pprice">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputAge">Product Quantity</label>
                        <input type="text" class="form-control" id="exampleInputAge" name="pquantity">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputAge">Product Image Link</label>
                        <input type="text" class="form-control" id="exampleInputAge" name="pimage">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputAge">Product Description</label>
                        <input type="text" class="form-control" id="exampleInputAge" name="pdescription">
                    </div>
                <!-- </form> -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-success" name="create_product" value="Add" />
                </div>
                </div>
            </form>
        </div>
        </div>
<?php include "assets/footer.php" ?>