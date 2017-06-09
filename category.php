<?php 
   require_once "connection.php";
   $sql = $con->query("SELECT * FROM `category` WHERE 1 ");
   $cnt = mysqli_num_rows($sql);
   ?>
<h2>List <a href="add_category.php" style="float:right;font-size:12px;">Add Category</a></h2>
<?php
   if($cnt > 0){
   ?>
<table border="1" width="100%">
   <tr>
      <th align="left">Sno.</th>
      <th align="left">Name</th>
      <th align="left">Parent</th>
   </tr>
   <?php
      while($row = mysqli_fetch_assoc($sql))
      {
      ?>
   <tr>
      <td>#<?php echo $row['category_id']; ?></td>
      <td><?php echo $row['category_name']; ?></td>
      <td>
         <?php
            if($row['parent'] == 0)
            {
            	$parent = 'None';
            }
            else
            {
            $sql1 = $con->query("SELECT * FROM `category` WHERE 1 AND category_id = ".$row['parent']);
            $cnt1 = mysqli_num_rows($sql1);
            	if($cnt1)
            	{
            		$row1 = mysqli_fetch_assoc($sql1);
            		$parent = $row1['category_name'];
            	}
            }
            echo $parent;
            ?>
      </td>
   </tr>
   <?php } ?>
</table>
<?php }else{ ?>
No data found !!!
<?php } ?>
