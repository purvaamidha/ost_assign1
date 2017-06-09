<html>
<head>
    <title>Add Category</title>
</head>
<body>
    <h2 align="center">Add Category</h2>
    <table border="0" cellpadding="1" align="center">
        <form action="#" method="post">
        <tr>
            <td>Category Name</td>
            <td><input type="text" name="category"/></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="Add" name="add"> </td>
        </tr>
        </form>
        <?php
/**
 * Created by PhpStorm.
 * User: jaihanuman
 * Date: 6/8/2017
 * Time: 11:26 PM
 */
include 'connection.php';
if(isset($_POST['add'])){
    $name = $_POST['category'];
    $sql = "insert into cat(id,cname) values(NULL,'$name')";
    $i = $con->query($sql);
    if($i>0){
        echo "<tr><td></td>";
        echo "<td>Category added successfully"."</td></tr>";
    }
}
?>
    </table>

    <table border="1" cellpadding="2" align="center" width="40%">
        <tr>
            <td>S#</td>
            <td>Category</td>
            <td>Edit</td>
            <td>Delete</td>
        </tr>
        <h2 align="center">Category List</h2>
        <?php
        $sql2 = 'select * from cat';
        $rs = $con->query($sql2);
        $num = $rs->num_rows;
        $i = 1;
        while($result =$rs->fetch_assoc()){
            echo "<tr>";
                echo "<td>".$i."</td>";
                echo "<td>".$result['cname']."</td>";
                echo "<td>"."<a href='http://localhost/categorymgmt/delete_category.php?id=$result[id]'>"."EDIT"."</a>"."</td>";
                 echo "<td>"."<a href='http://localhost/categorymgmt/delete_category.php?id=$result[id]'>"."DELETE"."</a>"."</td></tr>";
                $i++;

        }
        ?>
    </table>
</body>
</html>
