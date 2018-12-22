<?php

    $data  = $_POST["data"];
    if(isset($data)) {
        $arr = explode("-",$data);
        $action = $arr[0];
        $id = $arr[1];
        $hostname = "localhost";
        $username = "root";
        $password = "";
        $database = "BTL_project";
        $conn = mysqli_connect($hostname,$username,$password,$database);
        mysqli_set_charset($conn,"UTF8");
        echo mysqli_query($conn,"update tbl_product set $action = $action + 1 where pk_product_id=$id");
        // $result = mysqli_query($conn,"select $action from tbl_product where pk_product_id=$id");
        // $_rows= mysqli_fetch_array($result,MYSQLI_ASSOC);
        // echo $_rows[$action];
        // echo "update tbl_product set $action = $action + 1 where pk_product_id=$id";
    } else {
      echo "error" ;   
    }
    

//class controller_like_dislike extends controler{
//public function __construct(){
     // parent::__construct();
// if($rows['pk_product_id'])
// {
//   $id=$rows['pk_product_id'];
//   $name=$rows['c_name'];
//   // Vote update  
//   // Getting latest vote results
//   $hostname = "localhost";
//   $username = "root";
//   $password = "";
//   $database = "BTL_project";
//   $conn = mysqli_connect($hostname,$username,$password,$database);
//   mysqli_set_charset($conn,"UTF8");
//   $result=mysqli_query($conn,"select c_up,c_down from tbl_product where pk_product_id=$id");
//   $_rows= mysqli_fetch_array($result,MYSQLI_ASSOC);
//   $up_value=$_rows['c_up'];
//   $down_value=$_rows['c_down'];
//   $total=$up_value+$down_value; // Total votes 
//   $up_per=($up_value*100)/$total; // Up percentage 
//   $down_per=($down_value*100)/$total; // Down percentage
//   // var_dump($up_per);
//   // die();
//   //HTML output
//   echo '<b>Ratings for this blog</b> ( '.$total.' total)
//   Like :'.$up_value.'
//   <div id="greebar" style="width:'.$up_per.'%"></div>
//   Dislike:'.$down_value.'
//   <div id="redbar" style="width:'.$down_per.'%"></div>';
// }
//include("view/frontend/view_product.php");
//}
//}

?> 