<?php
/**
 * Created by PhpStorm.
 * User: jaihanuman
 * Date: 6/9/2017
 * Time: 12:19 AM
 */
include 'connection.php';
$sql1 = 'select * from cat';
$j = $con->query($sql1);
$num = $j->num_rows;
$sql2 = 'select * from subcat';
$k = $con->query($sql2);
$num_scat = $k->num_rows;
?>
<html>
<head>
    <title>Add Category</title>
</head>
<body>
<h2 align="center">Add Sub subcategory</h2>
<table border="0" cellpadding="1" align="center">
    <form action="#" method="post">
        <tr>
            <td>Select Category</td>
            <td>
                <select name="cat">
                    <option value="choose" selected>Choose</option>
                    <?php
                    if($num>0){
                        while($rs = $j->fetch_assoc()){
                            echo "<option value='$rs[id]'>".$rs['cname']."</option>";
                        }
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Select Sub category</td>
            <td>
                <select name="subcat">
                    <option value="choose" selected>Choose</option>
                    <?php
                    if($num_scat>0){
                        while($rss = $k->fetch_assoc()){
                            echo "<option value='$rss[id]'>".$rss['cname']."</option>";
                        }
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Name</td>
            <td><input type="text" name="ssubcategory"/></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="Add" name="add"> </td>
        </tr>
    </form>
    <?php
    if(isset($_POST['add'])){
        $name = $_POST['subcategory'];
        $cname = $_POST['cat'];
        $sql = "insert into subcat(id,cid,subcat) values(NULL,$cname,'$name')";
        $i = $con->query($sql);
        if($i>0){
            echo "<tr><td></td>";
            echo "<td>Sub Category added successfully"."</td></tr>";
        }
    }
    ?>
</table>
</body>
</html>
