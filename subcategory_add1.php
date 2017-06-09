<?php
/**
 * Created by PhpStorm.
 * User: jaihanuman
 * Date: 6/8/2017
 * Time: 11:41 PM
 */
    include 'connection.php';
    $sql1 = 'select * from cat';
    $j = $con->query($sql1);
    $num = $j->num_rows;

?>
<html>
<head>
    <title>Add Category</title>
</head>
<body>
<h2 align="center">Add Subcategory</h2>
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
            <td>Sub Category Name</td>
            <td><input type="text" name="subcategory"/></td>
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
<table border="1" cellpadding="2" align="center">
    <tr>
        <td>S#</td>
        <td>Category</td>
        <td>Subcategory</td>
    </tr>
    <h2 align="center">Subcategory List</h2>
    <?php
    $sql2 = 'select * from cat';
    $rs = $con->query($sql2);
    $num = $rs->num_rows;
    $i = 1;
    while($result =$rs->fetch_assoc()){

    $sql3 = "select * from subcat where cid=$result[id]";
    $rs1 = $con->query($sql3);
    while ($result1 = $rs1->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$i."</td>";
        echo "<td>".$result['cname']."</td>";
        echo "<td>" . $result1['subcat'] . "</td></tr>";
        $i++;
    }
    }
    ?>
</table>
</body>
</html>
