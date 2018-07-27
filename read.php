<?php
include_once("crud.php");
 ?>
<!Doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <?php
    if (isset($_REQUEST['cdelid'])) {
      $cdelid= $_REQUEST['cdelid'];
      if ($db->delete("students","id=$cdelid")) {
        ?>
        <span class='text-danger'>Delete Success.</span>
        <?php
      }
      else {
        ?>
        <span class='text-warning'>Delete Fail.</span>
        <?php
      }
    }
     if (isset($_REQUEST['delid'])){
      $id= $_REQUEST['delid'];

    ?>
    <span class='text-danger'>Do you want to Delete.</span>
    <a class='btn btn-outline-danger' href="read.php?cdelid=<?=$id;?>">Yes</a> <a class='btn btn-outline-success' href="read.php">No</a>

    <?php
    }
    $students_info= $db->getAll("students","*");
    $students_info_single= $db->getById("students","*","id=2");
    $css="table table-bordered table-light table-hover table-stripped";
    echo $db->getTable($students_info, $css);
    echo $db->getTable($students_info_single, $css);

     ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
  </body>
</html>
