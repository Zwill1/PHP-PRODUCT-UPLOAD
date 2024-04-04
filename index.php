<?php include "db/dbcon.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
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
    </div>

</body>
</html>