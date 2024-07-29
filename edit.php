<?php 

$servername ='localhost';
$username = 'root';
$password = '';
$dbname = 'project';

$conn = new mysqli($servername,$username,$password,$dbname);

$id = "";
$name = "";
$email = "";
$phone = "";
$address = "";

$errorMessage = "";
$successMessage = "";

$id = $_GET["id"];


if($_SERVER['REQUEST_METHOD'] == 'GET') {
    if(!isset($_GET['id'])) {
        header("location: /myshop/index.php");
        exit;
    } 

 
    //read the row of the selected client from database table
    $sql = "SELECT * FROM myshop WHERE id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if(!$row) {
        header("location: /myshop/index.php");
        exit;
        $name = $row["name"];
         $email = $row["email"];
         $phone = $row["phone"];
         $address = $row["address"];
    } 
       

}   else if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $address = $_POST["address"];

    do {
        if( empty($id) ||empty($name) || empty($email) || empty($phone) || empty($address)){
            $errorMessage = "All fields are required";
            break;
        }

        $sql = "UPDATE myshop ".
        " SET name = '$name', phone ='$phone', email ='$email', address = '$address' " .
        " WHERE id = $id";

        $result = $conn->query($sql);
        if(!$result){
            $errorMessage = "Invalid query: " .$connect->error;
            break;
        }

        $successMessage ="Client updated correctly";

        header("location: /myshop/index.php");
        exit;


    } while(true);


    
}

    

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My shop</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>
    <div class="container my-5">
        <h2>Edit Client</h2>        
        <?php
            if( !empty($errorMessage)) {


                echo"
                <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' arial-label='Close'></button> 
                </div>
                ";
            }

        ?>
    </div>
    <form action="" method="post">
        <input type ="hidden" name="id" value="<?php echo $id;?>">

        <div class="row mb-3"> 
            <label class="col-sm-3 col-form-label">Name</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="name" value="<?php echo $name;?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Email</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="email" value="<?php echo $email;?>">

            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Phone</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="phone" value="<?php echo $phone;?>">
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-3 col-form-label">Address</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="address" value="<?php echo $address;?>">
            </div>
        </div>
                    

        <?php

        if (!empty($successMessage)){
            echo"
            <div class='row mb-3'>
            <div class='offset-sm-3 col-sm-6'>
            <div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong>$successMessage</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' arial-label='Close'></button>
            </div>
            </div> 
            </div>
        
        ";

        }

        ?>

    <div class="row mb-3">
        <div class="offset-sm-3 col-sm-3 d-grid">
            <button type="submit" class="btn btn-primary">submit</button>
        </div>
        <div class="col sm-3">
            <div class="col-sm-3 d-grid">
                <a class="btn btn-outline-primary" href="/myshop/index.php" role="button">Cancel</a>
                </div>

        </div>
    </div>
</form>
  

</body>

</html>