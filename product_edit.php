<?php require_once "app/db.php" ?>
<?php require_once "app/function.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Edit Product></title>

	
	<link rel="stylesheet" href="asset/css/bootstrap.min.css">
	<link rel="stylesheet" href="asset/css/style.css">
	<link rel="stylesheet" href="asset/css/responsive.css">
</head>
<style>

	.con{
		margin-top: 100px;
	

	}
</style>
<body>


	<?php
		
		$id = $_GET['id'];
		if(isset($_POST['update'])){
		
			$name = $_POST['Pname'];
			$bran = $_POST['brand'];
			$model = $_POST['model'];
			$rprice = $_POST['rprice'];
			$sprice = $_POST['sprice'];
			$discription = $_POST['dis'];
			$catagory = $_POST['ct'];
			
		$new = $_FILES['new_photo']['name'];
		$old = $_POST['old_photo'];
		if (empty($new)) {
			$Photo_name = $old;
		}else{
			$pArra = fileUp($_FILES['new_photo'],"photos/");
			$Photo_name = $pArra['file_name'];
		}

		if(empty($name)||empty($bran)||empty($model)||empty($rprice)||empty($sprice)||empty($discription)||empty($catagory)){
			$mess= '<p class="alert alert-danger alert-dismissible fade show">Data fild is empty <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button></p>';
		}elseif (($rprice>$sprice)==false) {
			$mess= '<p class="alert alert-warning alert-dismissible fade show">Spacail price is larger then Regular price <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button></p>';
		}else{

			$sql = "UPDATE product
			SET name = '$name', brand = '$bran', model ='$model', regular_price = '$rprice', special_price = '$sprice', img ='$Photo_name', discripation ='$discription', chatagory = '$catagory'
			WHERE ID = $id";
			$connection -> query($sql); 

			$mess= '<p class="alert alert-success alert-dismissible fade show">Data update sucess<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				    </button></p>';
			header('location:all.php');
		}
	};

	//recive old data
		$sql = "SELECT * FROM product WHERE ID ='$id'";
		$userdata = $connection -> query($sql);	
		$edit_data = $userdata -> fetch_assoc();

	 ?>
	 <?php
	 if (isset($name)) {
		
			
				echo $mess; 
			
		
	};
	?>

	
	<div class="con shadow" >
		<a class="btn btn-sm bg-primary" href="all.php">show all product</a>
		<a class="btn btn-sm bg-warning" href="shop-4col.php">show in shop</a>
	<div class="card-body">
		<div class="card-head">
			<h2>Product Upload</h2>
		</div>
		<form  action="" method="POST" enctype="multipart/form-data">
		
		<div class="input-group mb-3">
  			<div class="input-group-prepend">
    			<span class="input-group-text" id="basic-addon1">Name</span>
  			</div>
  				<input type="text" name="Pname" class="form-control"  
  				value="<?php echo ($edit_data['name'])?>" aria-describedby="basic-addon1">
		</div>


		<div class="">
			<div class="row">
			<div class="col">
			    	
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">Brand</span>
					</div>
				<input type="text" name="brand" class="form-control" placeholder="" value="<?php echo $edit_data['brand']; ?>" aria-describedby="basic-addon1">
				</div>
			    </div>
			<div class="col">
			   
				<div class="input-group mb-3">
	  				<div class="input-group-prepend">
	    				<span class="input-group-text" id="basic-addon1">Model</span>
	  				</div>
  				<input type="text" name="model" class="form-control" placeholder="" 
  				value="<?php echo $edit_data['model']; ?>" aria-describedby="basic-addon1">
				</div>

			</div>
			<div class="w-100"></div>
			<div class="col">
			    <div class="input-group mb-3">
	  				<div class="input-group-prepend">
	    			 <span class="input-group-text" id="basic-addon1">Regular Price</span>
	  				</div>
  				<input type="text" class="form-control" name="rprice" placeholder="" 
  				value="<?php echo $edit_data['regular_price']; ?>" aria-describedby="basic-addon1">
	  				<div class="input-group-append">
	    				<span class="input-group-text">TK</span>
	 				</div>
				</div>
            </div>
			<div class="col">
			    <div class="input-group mb-3">
	  			    <div class="input-group-prepend">
	    				<span class="input-group-text" id="basic-addon1">Spacial Price</span>
	  			    </div>
  				<input type="text" name="sprice" class="form-control" placeholder="" 
  				value="<?php echo $edit_data['special_price']; ?>" aria-describedby="basic-addon1">
  				  <div class="input-group-append">
	    				<span class="input-group-text">TK</span>
	 				</div>
		        </div>
		   </div>
			  </div>
		</div>

	


		<div class="input-group mb-3">
			  <div class="input-group-prepend">
			    <label class="input-group-text" for="inputGroupSelect01">Options</label>
			  </div>
			  <select class="custom-select" name="ct" id="inputGroupSelect01">
			    <option selected><?php echo $edit_data['chatagory']; ?></option>
			    <option value="phone">Phone</option>
			    <option value="charger">charger</option>
			    <option value="cleaning">cleaning</option>
			    <option value="tools">Tools</option>
			    <option value="home">Home</option>
			    <option value="office">office</option>
			  </select>
		</div>

	

		<div class="input-group">
		   <div class="input-group-prepend">
		   <span class="input-group-text">Discripation</span>
		   </div>
		   <textarea class="form-control"  name="dis" 
		   value="something" aria-label="With textarea"><?php echo $edit_data['discripation']; ?></textarea>
		</div>

		<div class="form-group">
			<img style="width: 200px; height: 200px; margin-top: 10px;" src="photos/<?php echo $edit_data['img']; ?>" alt="" >
			<input type="hidden" name="old_photo" value="<?php echo $edit_data['img']; ?>" id="">
		</div>

		<div class = "form-group">
			<input name="new_photo" type="file" >
		</div>

		<div class = "form-group">
			<input type="submit" class="btn bg-success" name="update" value="Save" >
		</div>


		</form>
		
	</div>
</div>
	<script src="asset/js/jquery-3.4.1.min.js"></script>
	<script src="asset/js/popper.min.js"></script>
	<script src="asset/js/bootstrap.min.js"></script>
	<script src="asset/js/script.js"></script>
</body>
</html>