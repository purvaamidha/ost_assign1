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
    <script src="js/jquery-1.3.2.min.js"></script>
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
        <!--Here you find changes-->
        <tr>
            <td>Want to add more category?</td>
            <td><input type="radio" name="active" value="1"/>Yes&nbsp; &nbsp;&nbsp;<input type="radio" name="active" value="0"/>No</td>
        </tr>
        <tr>
            <td>Additional Category Name</td>
            <td><input type="text" name="ssub_name"/></td>
        </tr>
        <script>

        </script>
        <tr>
            <td></td>
            <td><input type="submit" value="Add" name="add">&nbsp; &nbsp;</td>
        </tr>
    </form>
<?php
if(isset($_POST['add'])){
    //var_dump($_POST);
    $name = $_POST['subcategory'];
    $cname = $_POST['cat'];
    /* Here you find changes*/
    $active = $_POST['active'];
    $ssub_name = $_POST['ssub_name'];
    $sql = "insert into subcat(id,cid,subcat,active,ssub_name) values(NULL,'$cname','$name','$active','$ssub_name')";
    $i = $con->query($sql);
    if($i>0){
        echo "<tr><td></td>";
        echo "<td>Sub Category added successfully"."</td></tr>";
    }else{
        echo "<tr><td></td>";
        echo "<td>No Update</td></tr>";
    }
}
?>
</table>
<table border="1" cellpadding="2" align="center">
    <tr>
        <td>S#</td>
        <td>Category</td>
        <td>Subcategory</td>
        <td>Add. Category</td>
        <td>Action</td>
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
        echo "<td>" . $result1['subcat'] . "</td>";
        echo "<td>".$result1['ssub_name']."</td>";
        echo "<td>"."<a href='http://localhost/categorymgmt/delete_category.php?id=$result1[id]'>"."DELETE"."</a>"."</td></tr>";
        $i++;
    }
    }
    ?>
</table>
</body>
</html>
