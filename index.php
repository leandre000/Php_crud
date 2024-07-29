<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Myshop</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container my-5">
        <h2>List of clients</h2>
        <a class="btn btn-primary" href="/myshop/create.php" role="button">New Client</a><br>
    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>

        </thead>
        <tbody>
            <?php
            $servername ='localhost';
            $username = 'root';
            $password = '';
            $dbname = 'project';

            $conn = new mysqli($servername,$username,$password,$dbname);

            if($conn->connect_error){
                die('connection failed:'.$conn->connect_error);
            }
            //read all row from database table
            $sql = 'SELECT * FROM myshop';
            $result =$conn->query($sql);

            if(!$result){
                die("Invalid query: ". $connect_error);
            }

            //read data of each row 
            while($row = $result->fetch_assoc()){

                echo "  <tr>
                <td>$row[id]</td>
                <td>$row[name]</td>
                <td>$row[email]</td>
                <td>$row[phone]</td>
                <td>$row[address]</td>
                <td>$row[created_at]</td>
                <td><a class='btn btn-primary btn-sm' href='/myshop/edit.php?id=$row[id]'>Edit</a>
                    <a class='btn btn-danger btn-sm' href='/myshop/delete.php?id=$row[id]'>Delete</a>
                    </td>
               
            </tr>
           
             
            ";
            }

            ?>
             
        </tbody>
      
    </table>

    </div>
    
</body>
</html>




