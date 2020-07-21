<?php




$servername = "localhost";
$username = "root";
$password = "";
$dbname = "task";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_REQUEST['delete'])) {
    $sql = "DELETE FROM info WHERE id={$_REQUEST['id']}";

    if ($conn->query($sql) === TRUE) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
        echo 'Record Deleted Succesfully';
        echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
        echo ' <span aria-hidden="true">&times;</span>';
        echo '</button>';
        echo '</div>';
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../fontawesome/css/all.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
  

    <title>Form</title>
</head>

<body>


    <nav class="navbar navbar-expand-sm navbar-dark bg-dark mb-5">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars" aria-hidden="true"></i></button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="../index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                    <div class="dropdown-menu" aria-labelledby="dropdownId">
                        <a class="dropdown-item" href="#">Action 1</a>
                        <a class="dropdown-item" href="#">Action 2</a>
                    </div>
                </li>
            </ul>
            
        </div>
    </nav>


    <div class="container-fluid">


        <div class="row ">
            <div class="col-10 offset-1">


                <table class="table table-hover table-inverse table-responsive">
                    <thead class="thead-inverse thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>City</th>
                            <th>Update</th>
                            <th>Delete</th>

                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $sql = "SELECT * FROM info";
                        $result = $conn->query($sql);


                        while ($row = mysqli_fetch_assoc($result)) {


                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['fname'] . " " . $row['lname'] . "</td>";
                            echo "<td>" . $row['email'] . "</td>";
                            echo "<td>" . $row['Acode'] . " " . $row['Pno'] . "</td>";
                            echo "<td>" . $row['city'] . "</td>";
                            echo '<td><form action="update.php" method="POST"><input type="hidden" name="id" value=' . $row["id"] . '> <input type="submit" class="btn btn-warning btn-sm" name="Edit" value="Edit"></form></td>';
                            echo '<td><form action="" method="POST"><input type="hidden" name="id" value=' . $row["id"] . '> <input type="submit" class="btn btn-danger btn-sm" name="delete" value="Delete"></form></td>';
                            echo "</tr>";
                        }

                        ?>




                    </tbody>
                </table>
            </div>

        </div>

    </div>







    <?php


    $conn->close();
    ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/jquery.js"></script>


</body>

</html>