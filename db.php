<?php
class crud{
  //Database connection---
  private $conn;
  public function __construct($host,$user,$pass,$db){
    $this->conn=new mysqli($host,$user,$pass,$db);
    if (!$this->conn) {
      die("connection error!".$this->conn->connect_error);
    }
  }

  //INSERT strat---
  public function Insert($table,$cols){
    $sql="INSERT INTO $table SET $cols";
    $result=$this->conn->query($sql);
    if ($this->conn->affected_rows>0) {
      return true;
    }
      return flase;
  }

  //getall function start---
  public function getAll($table,$cols){
    $sql="SELECT $cols FROM $table";
    $result=$this->conn->query($sql);
    if ($result->num_rows>0) {
      return $result->fetch_all(MYSQLI_ASSOC);
    }
    return false;
  }

//getbyid funciton start---
  public function getById($table,$cols,$condition){
    $sql="SELECT $cols FROM $table WHERE $condition";
    $result=$this->conn->query($sql);
    if ($result->num_rows>0) {
      return $result->fetch_assoc();
    }
      return false;
  }

  //gettabel function start---
  public function getTable($data,$css_class=""){
    if (count($data)==count($data,1)) {
      $table="<table>";
      foreach ($data as $key => $value) {
        $table.="<tr>";
        $table.="<th>".ucfirst($key)."</th><td>$value</td>";
        $table.="</tr>";
      }
      $table.="</table>";
      return $table;
    }
    else {
      $table="<table>";
      $table.="<tr>";
      foreach ($data[0] as $key => $value) {
        $table.="<th>".ucfirst($key)."</th>";
      }
      $table.="<th>Action</th>";
      $table.="</tr>";
      foreach ($data as $rows) {
        $table.="<tr>";
        foreach ($rows as $val) {
          $table.="<td>$val</td>";
        }
        $table.="<td><a href=\"update.php?id=$rows[id]\">Edit</a>&nbsp;
                <a href=\"read.php?delid=$rows[id]\">Delete</a></td>";
        $table.="</tr>";
      }
      $table.="<tr>";
      $total=count($data[0])+1;
      $table.="<td colspan=\"$total\"> <a href=\"insert.php\">Add new item</a></td>";
      $table.="</tr>";
      $table.="</table>";
      return $table;
    }
  }

  //get update function---
  public function Update($table,$cols,$condition){
    $sql="UPDATE $table SET $cols WHERE $condition";
    $result=$this->conn->query($sql);
    if ($this->conn->affected_rows>0) {
      return true;
    }
      return false;
  }

  // get delete function---
  public function Delete($table,$condition){
    $sql="DELETE FROM $table WHERE $condition";
    $result=$this->conn->query($sql);
    if ($this->conn->affected_rows>0) {
      return true;
    }
      return flase;
  }
}
$obj=new crud("localhost","root","","crud");
 ?>
