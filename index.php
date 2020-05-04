<?php require_once "app/db.php" ?>
<?php require_once "app/function.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Add product</title>
<!-- creater sarwar jahan shohan -->

	
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
		
		
		if(isset($_POST['save'])){
		
			$name = $_POST['Pname'];
			$bran = $_POST['brand'];
			$model = $_POST['model'];
			$rprice = $_POST['rprice'];
			$sprice = $_POST['sprice'];
			$discription = $_POST['dis'];
			$catagory = $_POST['ct'];
	

		if(empty($name)||empty($bran)||empty($model)||empty($rprice)||empty($discription)||empty($catagory)){
			$name = "swt";
			$mess= '<p class="alert alert-danger alert-dismissible fade show">Data fild is empty <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button></p>';
		}elseif (($rprice>$sprice)==false) {
			$mess= '<p class="alert alert-warning alert-dismissible fade show">Spacail price is larger then Regular price <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button></p>';
		}else{


			$data = fileUp($_FILES['photo'], "photos/");
			$img = $data['file_name'];

			if ($data['status'] == 'yes') {

				$sql = "INSERT INTO product (name,brand,model,regular_price,special_price,img,discripation,chatagory) VALUES ('$name','$bran','$model','$rprice','$sprice','$img','$discription','$catagory')" ;
				$connection -> query($sql); 
			 	
				header("location:index.php");
				$mess= '<p class="alert alert-success alert-dismissible fade show">Data is stable<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				    </button></p>';

			
				
			}else{
				$mess= '<p class="alert alert-warning alert-dismissible fade show">Image formet error<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				    </button></p>';
			};
		};
	};

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
  				<input type="text" name="Pname" class="form-control" placeholder="" value="<?php old('Pname')?>" aria-describedby="basic-addon1">
		</div>


		<div class="">
			<div class="row">
			<div class="col">
			    	
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">Brand</span>
					</div>
				<input type="text" name="brand" class="form-control" placeholder="" value="<?php old('brand')?>" aria-describedby="basic-addon1">
				</div>
			    </div>
			<div class="col">
			   
				<div class="input-group mb-3">
	  				<div class="input-group-prepend">
	    				<span class="input-group-text" id="basic-addon1">Model</span>
	  				</div>
  				<input type="text" name="model" class="form-control" placeholder="" value="<?php old('model')?>" aria-describedby="basic-addon1">
				</div>

			</div>
			<div class="w-100"></div>
			<div class="col">
			    <div class="input-group mb-3">
	  				<div class="input-group-prepend">
	    			 <span class="input-group-text" id="basic-addon1">Regular Price</span>
	  				</div>
  				<input type="text" class="form-control" name="rprice" placeholder="" value="<?php old('rprice')?>" aria-describedby="basic-addon1">
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
  				<input type="text" name="sprice" class="form-control" placeholder="Can be empty" value="<?php old('sprice')?>" aria-describedby="basic-addon1">
  				  <div class="input-group-append">
	    				<span class="input-group-text">TK</span>
	 				</div>
		        </div>
		   </div>
			  </div>
		</div>

		<!-- <div class="input-group mb-3">
  			<div class="input-group-prepend">
    		<span class="input-group-text" id="basic-addon1">Chatagory</span>
  			</div>
  			<input type="text" name="ct" class="form-control" placeholder="" value="" aria-describedby="basic-addon1">
		</div> -->
		
		<div class="input-group mb-3">
			  <div class="input-group-prepend">
			    <label class="input-group-text" for="inputGroupSelect01">Options</label>
			  </div>
			  <select class="custom-select" name="ct" id="inputGroupSelect01">
			    <option selected><?php old('ct')?></option>
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
		   <textarea class="form-control"  name="dis"  ><?php old('dis');?></textarea>
		</div>

		<div class="form-group">
    		<label for="exampleFormControlFile1">Select product Photo</label>
    		<input type="file" name="photo" class="form-control-file" id="exampleFormControlFile1">
  		</div>

		<div class = "form-group">
			<input type="submit" class="btn bg-success" name="save" value="Save" >
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