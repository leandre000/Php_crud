
<?php

if( isset($_GET["id"])) {

    $id = $_GET["id"];
    $servername ='localhost';
    $username = 'root';
    $password = '';
    $dbname = 'project';

    $conn = new mysqli($servername,$username,$password,$dbname);

    $sql = "DELETE FROM myshop WHERE id=$id";
    $conn->query($sql);

     
}
header("location: /myshop/index.php");
exit;


?>