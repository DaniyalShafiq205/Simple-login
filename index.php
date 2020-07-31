<?php

if (isset($_REQUEST['submit'])) {


    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "task";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (($_REQUEST['fname'] == "") || ($_REQUEST['lname'] == "") || ($_REQUEST['email'] == "") || ($_REQUEST['Acode'] == "") || ($_REQUEST['Pno'] == "") || ($_REQUEST['address1'] == "") || ($_REQUEST['address2'] == "") || ($_REQUEST['city'] == "") || ($_REQUEST['state'] == "") || ($_REQUEST['postal'] == "") || ($_REQUEST['notes'] == "")) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
        echo '<strong>Oops</strong> You should fill all of those fields below.';
        echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
        echo ' <span aria-hidden="true">&times;</span>';
        echo '</button>';
        echo '</div>';
    } else {
        //   for insert 
        $stmt = $conn->prepare("INSERT INTO info (fname, lname,email, Acode,Pno,address1,address2,city,state,postal,sample,notes) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
        // prepare and bind

        $stmt->bind_param("sssssssssiss", $fname, $lname, $email, $Acode, $Pno, $address1, $address2, $city, $state, $postal, $sample, $notes);

        // set parameters and execute
        $fname = $_REQUEST['fname'];
        $lname = $_REQUEST['lname'];
        $email = $_REQUEST['email'];
        $Acode = $_REQUEST['Acode'];
        $Pno = $_REQUEST['Pno'];
        $address1 = $_REQUEST['address1'];
        $address2 = $_REQUEST['address2'];
        $city = $_REQUEST['city'];
        $state = $_REQUEST['state'];
        $postal = $_REQUEST['postal'];
        $sample = implode(",", $_REQUEST['sample']);
        $notes = $_REQUEST['notes'];
        $stmt->execute();


        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">';
        echo ' New records created successfully.';
        echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
        echo ' <span aria-hidden="true">&times;</span>';
        echo '</button>';
        echo '</div>';

        $stmt->close();
        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="fontawesome/css/all.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" media="screen" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="icon" href="assets/icon/icon.ico" >
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
  
    <title>Form</title>
</head>

<body>

    <nav class="navbar navbar-expand-sm navbar-dark bg-dark mb-5">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars" aria-hidden="true"></i></button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Components/table.php">Data Table</a>
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

            <div class="col-10 offset-1 col-md-6  offset-md-3 shadow-lg " style="border-radius: 20px;background: #ECE9E6;  /* fallback for old browsers */
background: -webkit-linear-gradient(to left, #FFFFFF, #ECE9E6);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to left, #FFFFFF, #ECE9E6); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */




">

               <div >
               <form action="" id="myform" method="POST">

<div class="form-row">
    <div class="form-group col-4 col-md-3  mt-3">
        Full Name
    </div>


    <div class="form-group  col-4  mt-3">


        <input type="text" class="form-control form-control-sm" id="inputEmail4" placeholder="First Name" name="fname">
    </div>
    <div class="form-group col-4  mt-3">

        <input type="text" class="form-control form-control-sm " id="inputPassword4" placeholder="last Name" name="lname">
    </div>
</div>
<div class="form-row">
    <div class="form-group col-3  mt-3">E-mail
    </div>


    <div class="form-group col-8  mt-3">


        <input type="email" class="form-control form-control-sm " id="inputEmail4" placeholder="ex:mynasme@example.com" name="email">
    </div>
</div>


<div class="form-row">
    <div class="form-group col-md-3  mt-3">
        Phone Number
    </div>


    <div class="form-group col-md-3  col-4 mt-3">


        <input type="text" class="form-control form-control-sm " id="inputEmail4" placeholder="Area Code" name="Acode">
    </div>
    <div class="form-group col-md-5 col-8 mt-3">


        <input type="text" class="form-control form-control-sm " id="inputEmail4" placeholder="Phone Number" name="Pno">

    </div>


</div>
<div class="form-row">
    <div class="form-group col-md-2  mt-3">Address
    </div>


    <div class="form-group offset-md-1 col-md-8  mt-3">


        <input type="text" class="form-control form-control-sm " id="inputEmail4" placeholder="Street Address " name="address1">
    </div>
    <div class="form-group offset-md-3 col-md-8  mt-3">


        <input type="text" class="form-control form-control-sm " id="inputEmail4" placeholder="Street Address2" name="address2">
    </div>

    <div class="form-group offset-md-3 col-md-4 col-4  mt-3">


        <input type="text" class="form-control form-control-sm " id="inputEmail4" placeholder="City" name="city">
    </div>
    <div class="form-group col-md-4 col-6  mt-3">


        <input type="text" class="form-control form-control-sm " id="inputEmail4" placeholder="State/Province" name="state">

    </div>
    <div class="form-group offset-md-3 col-md-4 col-4  mt-3">


        <input type="text" class="form-control form-control-sm " id="inputEmail4" placeholder="Postal/zip code" name="postal">

    </div>

</div>
<div class="row">
    <div class="col-3">
        Sample
    </div>
    <div class="col-8">
        <div class="form-check">
            <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="sample[]" id="" value="Wheatgrass Tray">
                Wheatgrass Tray
            </label>
        </div>
        <div class="form-check">
            <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="sample[]" id="" value="Wheatgrass Bag">
                Wheatgrass Bag
            </label>
        </div>
        <div class="form-check">
            <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="sample[]" id="" value="Sunflower Bag">
                Sunflower Bag
            </label>
        </div>
        <div class="form-check">
            <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="sample[]" id="" value="Peashoot Bag">
                Peashoot Bag
            </label>
        </div>
        <div class="form-check">
            <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="sample[]" id="" value="Buckwheat Bag">
                Buckwheat Bag
            </label>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-2 mt-4">
        Notes
    </div>
    <div- class="col-10">
        <div class="form-group">
            <label for=""></label>
            <textarea class="form-control" name="notes" id="" rows="3"></textarea>
        </div>
    </div->
</div>
<div class="ml-5 my-5">
    <button type="submit" class="btn btn-primary px-3" name="submit">Submit</button>
</div>


</form>
               </div>
            </div>



        </div>

    </div>


    <hr width="90%" align="center" style=" border: 2px solid rgb(34, 151, 197);">






    <?php $conn->close();?>

 


    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    

</body>

</html>