<?php require_once "app/db.php" ?>
<?php require_once "app/function.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>View all product</title>
<!-- create by sarwar jahan shohan -->
	<link rel="stylesheet" href="asset/css/responsive.css">
	<link rel="stylesheet" href="asset/css/bootstrap.min.css">
	<link rel="stylesheet" href="asset/css/style.css">
</head>
<style>
  .con{
    margin-top: 50px;

  }
  .img{
    width: 40px;
    height: 40px;
  }

</style>

<body>

<div class="con shadow">
<a class="btn btn-sm bg-success" href="index.php">Add new user</a>
<a class="btn btn-sm bg-warning" href="shop-4col.php">show in shop</a>

	
<h2 class="t1">All User</h2>
 
 <table class="table table-striped">
          <thead class="thead-dark">
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Brand</th>
              <th>Model</th>
              <th>Regular price</th>
              <th>Special priice</th>
              <th>Chatagory</th>
              <th>Image</th>
              <th>Action</th>
            </tr>
          </thead>
          <?php 

          $sql = 'SELECT * FROM product ORDER BY id DESC';
          $data = $connection -> query($sql);
          $id = 1;
          while($fdata = $data -> fetch_assoc()):   
          
          ?>
          <tbody>
            
            <tr>
              <td><?php echo $id++; ?></td>
              <td><?php echo $fdata['name'] ?></td>
              <td><?php echo $fdata['brand'] ?></td>
              <td><?php echo $fdata['model'] ?></td>
              <td><?php echo $fdata['regular_price'] ?> TK</td>
              <td><?php echo $fdata['special_price'] ?> TK</td>
              <td><?php echo $fdata['chatagory'] ?></td>
              <td><img class="img" src="photos/<?php echo $fdata['img'] ?>" alt=""></td>
              
              <td class="button">
                <a class="btn btn-sm btn-info" href="shop-single.php?id=<?php echo $fdata['id'];echo ":";echo $fdata['chatagory'];?>">View</a>
                <a class="btn btn-sm btn-warning" href="product_edit.php?id=<?php echo $fdata['id']; ?>">Edit</a>
                <a class="btn btn-sm btn-danger" id="del_user" href="delete.php?id=<?php echo $fdata['id']; ?>">Delete</a>
              </td>
            </tr>
            
          </tbody>

        <?php endwhile ?>
        </table>


</div>
	<script src="asset/js/jquery-3.4.1.min.js"></script>
	<script src="asset/js/popper.min.js"></script>
	<script src="asset/js/bootstrap.min.js"></script>
	<script src="asset/js/script.js"></script>
  <script>
    $('a#del_user').click(function(){

     let val = confirm('are you sure you want to delete');
     if (val==true) {
      return true;
     }else{
      return false;
     }

    });

  </script>

</body>
</html>