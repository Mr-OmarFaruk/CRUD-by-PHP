<?php
include("db.php");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Show all data</title>
  </head>
  <body>
    <?php
      if (isset($_REQUEST['cdelid'])) {
        $cdelid=$_REQUEST['cdelid'];
        if ($obj->Delete("students","id=$cdelid")) {
     ?>

     <span>Delete Success</span>
      <?php
        }
        else {
        ?>
        <span>Delete fail</span>
          <?php
        }
      }
      if (isset($_REQUEST['delid'])) {
        $id=$_REQUEST['delid'];

           ?>
      <span>Do you want to delete ?</span>
      <a href="read.php?cdelid=<?=$id;?>">Yes</a>&nbsp;<a href="read.php">No</a>
      <?php
    }
    $all_students=$obj->getAll("students","*");
    echo $obj->getTable($all_students);
    $student=$obj->getById("students","*","id=1");
    echo $obj->getTable($student);
       ?>
  </body>
</html>
