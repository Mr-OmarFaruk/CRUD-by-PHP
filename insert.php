<?php
include_once("crud.php");
if (isset($_REQUEST['submit'])) {
  // echo "<pre>";
  // print_r($_REQUEST);
  extract($_REQUEST);
  //echo $name;
  if ($db->insert("students","name='$name', mobile='$mobile', address='$address'")) {
    $msg = "Insert Success";
    header("location:read.php");
  }
  else {
    $msg = "Insert Fail";
  }
}

 ?>

<!doctype html>
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
   <form class="" action="insert.php" method="post">
  <div class="col-md-6" style="margin:0 auto;">
    <?php
       // if (isset($_REQUEST['submit'])) {
       //   echo $msg;
       // }

     ?>
      <?=@$msg;?>
     <table class="table table-bordered">
       <tr>
         <td>Name</td>
         <td><input class="form-control" type="text" value="" name="name"></td>
       </tr>

       <tr>
         <td>Mobile</td>
         <td><input class="form-control" type="text" value="" name="mobile"></td>
       </tr>

       <tr>
         <td>Address</td>
         <td><textarea class="form-control" name="address" rows="3" cols="20"></textarea></td>
       </tr>

       <tr>
          <td colspan="2" class="text-center"><button class="btn btn-outline-primary" type="submit" name="submit" value="" >Save</button></td>
       </tr>
     </table>

      </div>
   </form>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
  </body>
</html>
