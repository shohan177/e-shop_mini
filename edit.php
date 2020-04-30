<?php require_once "app/db.php" ?>
<?php require_once "app/function.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>

	<link rel="stylesheet" href="asset/css/responsive.css">
	<link rel="stylesheet" href="asset/css/bootstrap.min.css">
	<link rel="stylesheet" href="asset/css/style.css">
</head>
<body>
	<?php 

	    $id = $_GET['id'];
		//update new data
		if(isset($_POST['update'])){
	 	$name = $_POST['name'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$Address = $_POST['add'];

		//file manage
		$new = $_FILES['new_photo']['name'];
		$old = $_POST['old_photo'];
		if (empty($new)) {
			$Photo_name = $old;
		}else{
			$pArra = fileUp($_FILES['new_photo'],"photos/");
			$Photo_name = $pArra['file_name'];
		}

		if(empty($name)||empty($email)||empty($phone)||empty($Address)){
			$mess= '<p class="alert alert-danger alert-dismissible fade show">Data fild is empty <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button></p>';
		}elseif(filter_var($email, FILTER_VALIDATE_EMAIL)== false) {
			$mess= '<p class="alert alert-warning alert-dismissible fade show">Evalid email<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button></p>';
		}else{

			$sql = "UPDATE user_info
			SET Name = '$name', Email= '$email', Phone = '$phone', Adress = '$Address', photo_str = '$Photo_name'
			WHERE ID =  $id";
			$connection -> query($sql); 

			$mess= '<p class="alert alert-success alert-dismissible fade show">Data update sucess<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				    </button></p>';
		}

		
		}



		//recive old data
		$sql = "SELECT * FROM user_info WHERE ID ='$id'";
		$userdata = $connection -> query($sql);	
		$edit_data = $userdata -> fetch_assoc();
		


	 ?>

	 <?php
	 if (isset($name)) {
		
			
				echo $mess; 
			
		
	};
	?>

	<div class="card shadow">
		<a href="all.php"><< Back</a>
	<div class="card-body">
		<div class="card-head">
			<h2>Update <?php echo $edit_data['Name']; ?>'s information</h2>
		</div>
		<form  action="<?php echo $_SERVER['PHP_SELF'];?>?id=<?php echo $id = $_GET['id'];?>" method="POST" enctype="multipart/form-data">
		<div class = "form-group">
			<label>Name:</label>
			<input type="text" class="form-control" name="name" value="<?php echo $edit_data['Name']; ?>" placeholder="User Name">
		</div>

		<div class = "form-group">
			<label>Email:</label>
			<input type="text" class="form-control" name="email" value="<?php echo $edit_data['Email']; ?>" placeholder="User Email">
		</div>

	
		<div class = "form-group">
			<label>Phone:</label>
			<input type="text" class="form-control" name="phone" value="<?php echo $edit_data['Phone']; ?>"  placeholder="User Phone Number">
		</div>

		<div class = "form-group">
			<label>Adress:</label>
			<input type="text" class="form-control" name="add" value="<?php echo $edit_data['Adress']; ?>" placeholder="User adress">
		</div>
		<div class="form-group">
			<img style="width: 200px; height: 200px;" src="photos/<?php echo $edit_data['photo_str']; ?>" alt="" >
			<input type="hidden" name="old_photo" value="<?php echo $edit_data['photo_str']; ?>" id="">
		</div>

		<div class = "form-group">
			<input name="new_photo" type="file" >
		</div>
		<div class = "form-group">
			
			<input type="submit" class="form-control bg-success" name="update" value="update Data" >
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