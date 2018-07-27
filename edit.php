<?php
include_once("crud.php");
if (isset($_REQUEST['submit'])) {
  // echo "<pre>";
  // print_r($_REQUEST);
  extract($_REQUEST);
  //echo $name;
  if ($db->update("students","name='$name', mobile='$mobile', address='$address'", "id=$edit_id")) {
    $msg = "Update Success";
    header("location:read.php");
  }
  else {
    $msg = "Update Fail";
  }
}

if (isset($_REQUEST['id'])) {
  $id= $_REQUEST['id'];
  extract($db->getById("students","*", "id=$id"));
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
   <form class="" action="edit.php" method="post">
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
         <td><input class="form-control" type="text" value="<?=isset($name)?$name:''?>" name="name"></td>
       </tr>

       <tr>
         <td>Mobile</td>
         <td><input class="form-control" type="text" value="<?=isset($mobile)?$mobile:''?>" name="mobile"></td>
       </tr>

       <tr>
         <td>Address</td>
         <td><textarea class="form-control" name="address" rows="3" cols="20"><?=isset($address)?$address:''?></textarea></td>
       </tr>

       <tr>
          <td colspan="2" class="text-center">
            <input type="hidden" name="edit_id"  value="<?=$id;?>">
            <button class="btn btn-outline-primary" type="submit" name="submit" value="" >Update</button></td>
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
