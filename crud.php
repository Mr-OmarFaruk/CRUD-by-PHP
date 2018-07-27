<?php
class crud{
  public $conn;
  public function __construct($host, $user, $pass, $db){
    $this->conn= new mysqli($host, $user, $pass, $db);
    if ($this->conn->connect_errno) {
      die("Connection Fail for : ".$this->connect_error);
    }
  }
  public function insert($table, $cols){
    $sql = "INSERT INTO $table SET $cols";
    //echo $sql;
    $result = $this->conn->query($sql);
    if ($this->conn->affected_rows > 0) {
      return true;
    }
    return false;
  }
  public function update($table, $cols, $condition){
    $sql = "UPDATE $table SET $cols WHERE $condition";
    //echo $sql;
    $result = $this->conn->query($sql);
    if ($this->conn->affected_rows > 0) {
      return true;
    }
    return false;
  }
  public function delete($table, $condition){
    $sql = "DELETE FROM $table WHERE $condition";
    //echo $sql;
    $result = $this->conn->query($sql);
    if ($this->conn->affected_rows > 0) {
      return true;
    }
    return false;
  }
  public function getAll($table, $cols){
    $sql="SELECT $cols FROM $table";
    $result= $this->conn->query($sql);
    if($result->num_rows > 0){
      return $result->fetch_all(MYSQLI_ASSOC);
    }
    return false;
  }
  public function getById($table, $cols, $condition){
    $sql="SELECT $cols FROM $table WHERE $condition";
    $result = $this->conn->query($sql);
    if ($result->num_rows > 0) {
      return $result->fetch_assoc();
    }
    return false;
  }
  public function getTable($data, $css_classes=""){
    if (count($data)==count($data,1)) {
      $table="<table class=\"$css_classes\">";
        foreach ($data as $key => $val) {
          $table.="<tr>";
            $table.="<th>".ucfirst($key)."</th><td>$val</td>";
          $table.="</tr>";
        }
      $table.="</table>";
      return $table;
    }
    else {
      $table="<table class=\"$css_classes\">";
        $table.="<tr>";
          foreach ($data[0] as $key => $value) {
            $table.="<th>".ucfirst($key)."</th>";
          }
          $table.="<th>Action</th>";
        $table.="</tr>";
        $count=1;
         foreach ($data as $rows) {
           $count++;
           $table.="<tr>";
           foreach ($rows as $val) {
             $table.="<td>$val</td>";
           }
           $table.="<td><a href=\"edit.php?id=$rows[id]\" title=\"Edit Information\" class=\"btn btn-outline-primary\">Edit</a> <a href=\"read.php?delid=$rows[id]\" title=\"Delete Information\" class=\"btn btn-outline-danger\">Delete</a></td>";
           $table.="</tr>";
         }
         $table.="<tr>";
          $table.="<td class=\"text-center\" colspan=\"$count;\"><a href=\"insert.php?id=$rows[id] title=\"Insert Information\" class=\"btn btn-outline-success\">Add New Students</a></td>";
         $table.="</tr>";
      $table.="</table>";
      return $table;
    }
  }
}
$db= new crud("localhost", "root", "", "crud");
//$obj->insert("student","name='Sakil',mobile='3252353', address='Sherpur'");
// echo "<pre>";
// print_r($obj->getById("students","*","id in(1,2)"));
//echo "<pre>";












 ?>
