<?php include "dbcon.php" ?>

<?php 

// Checks the POST method from INPUT button to pass info to SQL query.
if(isset($_POST["create_product"])){
    $pname = $_POST["pname"];
    $pprice = $_POST["pprice"];
    $pquantity = $_POST["pquantity"];
    $pimage = $_POST["pimage"];
    $pdescription = $_POST["pdescription"];

    // Checks to see if name is empty as a STRING or NULL - NOT WORKING AS INTENDED JUST YET
    if($pname == "" || empty($pname)){
        header("location:../index.php?message=You need fill in the product name");
    }
    if($pprice == "" || empty($pprice)){
        header("location:../index.php?message=You need fill in the product price");
    }
    if($pquantity == "" || empty($pquantity)){
        header("location:../index.php?message=You need fill in the product quantity");
    } 
    if($pimage == "" || empty($pimage)){
        header("location:../index.php?message=You need fill in the product image link");
    } 
    if($pdescription == "" || empty($pdescription)){
        header("location:../index.php?message=You need fill in the product description");
    } 
    else {
        $query = "insert into `products` (`prodname`,`prodprice`,`prodquantity`, `prodimage`, `proddescription`) values ('$pname', '$pprice', '$pquantity', '$pimage', '$pdescription')";

        $result = mysqli_query($connection, $query);

        if(!$result){
            die("Query Failed".mysqli_error($connection));
        }else{
            // Redirects to index page with row data
            header("location:../index.php?insert_msg=Your data has been added to the database.");
        }
    }

}

?>