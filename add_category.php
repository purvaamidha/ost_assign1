<!DOCTYPE html>
<html>
  <head>
    <link href="css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
<?php 
   require_once "connection.php";
   $Adde = false;
   
   if(isset($_POST['val']))
   {
	   	$aVals = $_POST['val'];
	   	$category_id = 0;
	   	$category_name = $aVals['category_name'];
	   	$parent = $aVals['parent'];
	   	if(isset($aVals['category_id']))
		   	{
		   		$category_id = $aVals['category_id'];
		   	}
	   	
	   	$sql = "INSERT INTO category SET category_name = '$category_name',parent = $parent,status = 1";
	   	$sql = $con->query($sql);

         if(isset($_POST['delete']))
         {
            
             $sql2= "DELETE from `category` where category_name = '$category_name' and parent = $parent";

             $j = $con->query($sql2);
             if($j>0)
             {
               echo "Category deleted successfully";
             }
             else
             {
               echo "try deleting again";
             }
         }
         //update or edit not working

         if(isset($_POST['edit']))
      {
         
         $sql3= "UPDATE `category` SET parent='".$_POST['parent']."' where parent = $parent";
         $k = $con->query($sql3);
         if($k>0)
         {
            echo "Updation of Category name successful";
         }
         else
         {
            echo "try updating again";
         }
      }

	   	header('location:category.php');
   }	
   

   ?>
<body>
<div class="container">
<div class="row">
<form role="form" method="post">
   <table cellpAddeing="5" cellspacing="5" class="table">
      <tr>
         <td>
            <h2>Category</h2>
            
         </td>
      </tr>
      <tr>
         <td>
            Select Parent : <br />
            <?php 
               $sql = $con->query("SELECT * FROM `category` WHERE 1 ");
               $cnt = mysqli_num_rows($sql);
               ?>
            <select name="val[parent]">
               <option value="0"> Select </option>
               <?php
                  if($cnt > 0){
                  while($parent = mysqli_fetch_assoc($sql))
                  {
                  ?>
               <option value="<?php echo $parent['category_id']; ?>"><?php echo $parent['category_name']; ?></option>
               <?php }} ?>
            </select>
         </td>
      </tr>
      <br/>
      <tr>
         <td>
            Name : <br />
            <input class="form-control" placeholder="Name" name="val[category_name]" type="text" autofocus required value="<?php echo $Adde ? $aRow['name'] : ''; ?>">
         </td>
      </tr>
      <tr>
         <td><br />
            <button type="submit" class="btn btn-success">Save</button>
         </td>
      
         <td><br />
            <button type="submit" class="btn btn-success" name="edit">Edit</button>
         </td>
         <td><br />
            <button type="submit" class="btn btn-success" name="delete">Delete</button>
         </td>
      </tr>
   </table>
</form>
</div>
</div>
</body>
</html>
