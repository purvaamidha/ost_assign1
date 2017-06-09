<?php
/**
 * Created by PhpStorm.
 * User: jaihanuman
 * Date: 6/8/2017
 * Time: 11:16 PM
 */
    include 'connection.php';
    $sql = 'select * from cat';
    $rs = $con->query($sql);
    $num = $rs->num_rows;


?>
<ul>
   <?php
   while($result =$rs->fetch_assoc()){
   echo "<li>" . $result['cname'];


   ?>
    <ul>
        <?php
        $sql1 = "select * from subcat where cid=$result[id]";
        $rs1 = $con->query($sql1);
        while ($result1 = $rs1->fetch_assoc()) {
            echo "<li>" . $result1['subcat'] . "</li>";
        }
        }
        ?>

    </ul></li>
    <li>Gallery</li>
    <li>Contact Us</li>
</ul>
