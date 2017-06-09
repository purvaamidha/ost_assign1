<?php
/**
 * Created by PhpStorm.
 * User: siec
 * Date: 6/9/2017
 * Time: 11:42 AM
 */
$servername="localhost";
$username="root";
$password="root";
$database="ost1";


$con=new mysqli($servername,$username,$password,$database);

if($con->connect_error)
{
    die("Connection failed: " . $con->connect_error);
}

    if(isset($_REQUEST['id'])){
        $id = $_REQUEST['id'];
        $sql = "delete from cat where id=$id";
        $rs = $con->query($sql);
        header('Location: http://localhost/categorymgmt/category_add1.php');
        print $rs;
        if($rs>0){
            header('Location: http://localhost/categorymgmt/category_add1.php');
        }
    }