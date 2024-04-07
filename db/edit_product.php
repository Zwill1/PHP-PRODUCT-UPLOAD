<?php include "dbcon.php" ?>
<?php include "../assets/header.php" ?>


<?php 
    if(isset($_GET['id'])){
        $id = $_GET['id'];
            
        $query = "SELECT * FROM `products` where `prodid` = '$id'";

        $result = mysqli_query($connection, $query);

        if(!$result) {
            die("Query failed" . mysqli_error($connection));
        }
        else {
            $row = mysqli_fetch_assoc($result);
    }
}
?>

<?php
    if(isset($_POST['update_product'])){

        $pname = $_POST["pname"];
        $pprice = $_POST["pprice"];
        $pquantity = $_POST["pquantity"];
        $pimage = $_POST["pimage"];
        $pdescription = $_POST["pdescription"];

        $query = "update `products` set `prodname` = '$pname', `prodprice` = '$pprice', `prodquantity` = '$pquantity', `prodimage` = '$pimage', `proddescription` = '$pdescription' where `prodid` = '$id'";

        $result = mysqli_query($connection, $query);

        if(!$result) {
            die("Query failed" . mysqli_error($connection));
        } 
        else {
            header("location: ../index.php?update_msg=You have update this row data");
        }
    }


?>

<div class="container mt-3 mb-3">

<form action="edit_product.php?id=<?php echo $id; ?>" method="POST">
    <div class="form-group">
        <label for="exampleInputFistName">Product Name</label>
        <input type="text" class="form-control" id="exampleInputFistName" name="pname" value="<?php echo $row['prodname']?>">
    </div>
    <div class="form-group">
        <label for="exampleInputLastName">Product Price</label>
        <input type="text" class="form-control" id="exampleInputLastName" name="pprice" value="<?php echo $row['prodprice']?>">
    </div>
    <div class="form-group">
        <label for="exampleInputAge">Product Quantity</label>
        <input type="text" class="form-control" id="exampleInputAge" name="pquantity" value="<?php echo $row['prodquantity']?>">
    </div>
    <div class="form-group">
        <label for="exampleInputAge">Product Image Link</label>
        <input type="text" class="form-control" id="exampleInputAge" name="pimage" value="<?php echo $row['prodimage']?>">
    </div>
    <div class="form-group">
        <label for="exampleInputAge">Product Description</label>
        <input type="text" class="form-control" id="exampleInputAge" name="pdescription" value="<?php echo $row['proddescription']?>">
    </div>
    <div class="form-group mt-3">
        <input type="submit" class="btn btn-success" name="update_product" value="Update" />
    </div>
</form>

</div>

<?php include("../assets/footer.php"); ?>