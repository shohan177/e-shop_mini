<?php 

function old($name){
	if(isset($_POST[$name])){
		echo $_POST[$name];
	}else{
		echo "";
	}
	
};
/**
 * file uplode system
 */
function fileUp($file, $location, $format=['png','jpg','gif']){


	
	$file_name = $file['name'];
	$file_tmp_name = $file['tmp_name'];
	//file extenation

	$file_arr = explode('.', $file_name);
	$ext = strtolower(end($file_arr));
	

	//unice name
	$unicname = md5(time().rand()).".".$ext;
		


	//send file to folder
	if (in_array($ext,$format)) {

		move_uploaded_file($file_tmp_name,$location.$unicname);
		$status = 'yes';
	}else{
		$status = 'no';
	};
	return[
		'file_name' => $unicname,
		'status' => $status


	];




};