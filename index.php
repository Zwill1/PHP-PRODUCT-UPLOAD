<?php include "db/dbcon.php" ?>
<?php include "assets/header.php" ?>
    <section class="mt-5 mb-2">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Product</button>
    </section>
    <section class="mb-5">
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
    </section>

    <!-- Displaying the data in a row on home page -->
    <section>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Product Name</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Product Image</th>
                <th scope="col">Product Description</th>
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
            <form action="" method="">
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
                    <input type="submit" class="btn btn-success" name="" value="Add" />
                </div>
                </div>
            </form>
        </div>
        </div>
<?php include "assets/footer.php" ?>