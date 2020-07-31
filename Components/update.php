<?php

if (isset($_REQUEST['update'])) {
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



    $stmt = $conn->prepare("UPDATE info SET fname=?, lname=?,email=?, Acode=?,Pno=?,address1=?,address2=?,city=?,state=?,postal=?,sample=?,notes=? WHERE id=?");
    // prepare and bind
    if ($stmt) {
      $stmt->bind_param("sssssssssissi", $fname, $lname, $email, $Acode, $Pno, $address1, $address2, $city, $state, $postal, $sample, $notes, $id);

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
      $id = $_REQUEST['id'];
      $stmt->execute();

      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">';
      echo 'records Updated successfully.';
      echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
      echo ' <span aria-hidden="true">&times;</span>';
      echo '</button>';
      echo '</div>';
    }
    $stmt->close();
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" media="screen" />
  <link rel="stylesheet" href="../fontawesome/css/all.css">
  <link rel="stylesheet" href="../css/bootstrap.min.css">


  <title>Update</title>
</head>

<body>
  <nav class="navbar navbar-expand-sm navbar-dark bg-dark mb-5">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars" aria-hidden="true"></i></button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item active">
          <a class="nav-link " href="../index.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="table.php">Data Table</a>
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

      <div class="col-10 offset-1 col-md-6  offset-md-3 shadow-lg " style="border-radius: 20px; background: #ECE9E6;  /* fallback for old browsers */
background: -webkit-linear-gradient(to left, #FFFFFF, #ECE9E6);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to left, #FFFFFF, #ECE9E6); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */">
        <?php

        if (isset($_REQUEST['Edit'])) {
          $servername = "localhost";
          $username = "root";
          $password = "";
          $dbname = "task";

          $conn = new mysqli($servername, $username, $password, $dbname);
          if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          }
          $sql = "SELECT * FROM info WHERE id ={$_REQUEST['id']}";
          $result = $conn->query($sql);
          $row = $result->fetch_assoc();
          $a = $row['sample'];
          $b = explode(',', $a);
        }
        ?>
        <form action="" id="myform" method="POST">

          <div class="form-row">
            <div class="form-group col-4 col-md-3  mt-3">
              Full Name
            </div>


            <div class="form-group  col-4  mt-3">


              <input type="text" class="form-control form-control-sm" id="inputEmail4" placeholder="First Name" name="fname" value="<?php if (isset($row['fname'])) {
                                                                                                                                      echo $row['fname'];
                                                                                                                                    } ?>">
            </div>
            <div class="form-group col-4  mt-3">

              <input type="text" class="form-control form-control-sm " id="inputPassword4" placeholder="last Name" name="lname" value="<?php if (isset($row['lname'])) {
                                                                                                                                          echo $row['lname'];
                                                                                                                                        } ?>">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-3  mt-3">E-mail
            </div>


            <div class="form-group col-8  mt-3">


              <input type="email" class="form-control form-control-sm " id="inputEmail4" placeholder="ex:mynasme@example.com" name="email" value="<?php if (isset($row['email'])) {
                                                                                                                                                    echo $row['email'];
                                                                                                                                                  } ?>">
            </div>
          </div>


          <div class="form-row">
            <div class="form-group col-md-3  mt-3">
              Phone Number
            </div>


            <div class="form-group col-md-3  col-4 mt-3">


              <input type="text" class="form-control form-control-sm " id="inputEmail4" placeholder="Area Code" name="Acode" value="<?php if (isset($row['Acode'])) {
                                                                                                                                      echo $row['Acode'];
                                                                                                                                    } ?>">
            </div>
            <div class="form-group col-md-5 col-8 mt-3">


              <input type="text" class="form-control form-control-sm " id="inputEmail4" placeholder="Phone Number" name="Pno" value="<?php if (isset($row['Pno'])) {
                                                                                                                                        echo $row['Pno'];
                                                                                                                                      } ?>">

            </div>


          </div>
          <div class="form-row">
            <div class="form-group col-md-2  mt-3">Address
            </div>


            <div class="form-group offset-md-1 col-md-8  mt-3">


              <input type="text" class="form-control form-control-sm " id="inputEmail4" placeholder="Street Address " name="address1" value="<?php if (isset($row['address1'])) {
                                                                                                                                                echo $row['address1'];
                                                                                                                                              } ?>">
            </div>
            <div class="form-group offset-md-3 col-md-8  mt-3">


              <input type="text" class="form-control form-control-sm " id="inputEmail4" placeholder="Street Address2" name="address2" value="<?php if (isset($row['address2'])) {
                                                                                                                                                echo $row['address2'];
                                                                                                                                              } ?>">
            </div>

            <div class="form-group offset-md-3 col-md-4 col-4  mt-3">


              <input type="text" class="form-control form-control-sm " id="inputEmail4" placeholder="City" name="city" value="<?php if (isset($row['city'])) {
                                                                                                                                echo $row['city'];
                                                                                                                              } ?>">
            </div>
            <div class="form-group col-md-4 col-6  mt-3">


              <input type="text" class="form-control form-control-sm " id="inputEmail4" placeholder="State/Province" name="state" value="<?php if (isset($row['state'])) {
                                                                                                                                            echo $row['state'];
                                                                                                                                          } ?>">

            </div>
            <div class="form-group offset-md-3 col-md-4 col-4  mt-3">


              <input type="text" class="form-control form-control-sm " id="inputEmail4" placeholder="Postal/zip code" name="postal" value="<?php if (isset($row['postal'])) {
                                                                                                                                              echo $row['postal'];
                                                                                                                                            } ?>">

            </div>

          </div>
          <div class="row">
            <div class="col-3">
              Sample
            </div>
            <div class="col-8">
              <div class="form-check">
                <label class="form-check-label">
                  <input type="checkbox" class="form-check-input" name="sample[]" id="" value="Wheatgrass Tray" <?php if (isset($row['sample'])) {
                                                                                                                  if (in_array("Wheatgrass Tray", $b)) {
                                                                                                                    echo "checked";
                                                                                                                  }
                                                                                                                } ?>>
                  Wheatgrass Tray
                </label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input type="checkbox" class="form-check-input" name="sample[]" id="" value="Wheatgrass Bag" <?php if (isset($row['sample'])) {
                                                                                                                  if (in_array("Wheatgrass Bag", $b)) {
                                                                                                                    echo "checked";
                                                                                                                  }
                                                                                                                } ?>>
                  Wheatgrass Bag
                </label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input type="checkbox" class="form-check-input" name="sample[]" id="" value="Sunflower Bag" <?php if (isset($row['sample'])) {
                                                                                                                if (in_array("Sunflower Bag", $b)) {
                                                                                                                  echo "checked";
                                                                                                                }
                                                                                                              } ?>>

                  Sunflower Bag
                </label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input type="checkbox" class="form-check-input" name="sample[]" id="" value="Peashoot Bag" <?php if (isset($row['sample'])) {
                                                                                                                if (in_array("Peashoot Bag", $b)) {
                                                                                                                  echo "checked";
                                                                                                                }
                                                                                                              } ?>>
                  Peashoot Bag
                </label>
              </div>
              <div class="form-check">
                <label class="form-check-label">
                  <input type="checkbox" class="form-check-input" name="sample[]" id="" value="Buckwheat Bag" <?php if (isset($row['sample'])) {
                                                                                                                if (in_array("Buckwheat Bag", $b)) {
                                                                                                                  echo "checked";
                                                                                                                }
                                                                                                              } ?>>
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
                <textarea class="form-control" name="notes" id="" rows="3" value="<?php if (isset($row['notes'])) {
                                                                                    echo $row['notes'];
                                                                                  } ?>"></textarea>
              </div>
            </div->
          </div>
          <div class="ml-5 my-5">

            <input type="hidden" name="id" value=<?php echo $row["id"] ?>>
            <button type="submit" class="btn btn-success px-3" name="update">Update</button>
          </div>


        </form>
      </div>



    </div>

  </div>







  <?php $conn->close(); ?>
  <script src="../js/bootstrap.js"></script>
  <script src="../js/jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>



</body>

</html>