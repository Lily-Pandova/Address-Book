<?php
	
    require 'app'.DIRECTORY_SEPARATOR.'connection.php';
    require 'includes'.DIRECTORY_SEPARATOR.'header.php';
    
	
	$connect = dbConnection();

	
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		$address_id =      mysqli_real_escape_string($connect, $_POST['id']);
		$address_name =    mysqli_real_escape_string($connect, $_POST['name']);
		$address_number =  mysqli_real_escape_string($connect, $_POST['number']);
		$address_email =   mysqli_real_escape_string($connect, $_POST['email']);
		$address_address = mysqli_real_escape_string($connect, $_POST['address']);
		$address_groups =  mysqli_real_escape_string($connect, $_POST['groups']);
		$address_created = mysqli_real_escape_string($connect, $_POST['created_at']);
	
		
		$sql = "UPDATE address SET name = '$address_name', number = '$address_number', email = '$address_email', address = '$address_address', groups = '$address_groups', created_at='$address_created' WHERE id = '$address_id'";
	
	
		$result = mysqli_query($connect, $sql);
		
		if($result){
			header("Location: index.php");
		}
		else{
			echo mysqli_error($connect);
		}
	
	}
?>

<?php 
	
	$id = $_GET['id'];

	$sql="SELECT * FROM address WHERE id = $id";
	$results = mysqli_query($connect, $sql);
?>
<body>
<div class="row">
<form action="" id="myform" method = "POST">	
	<?php foreach($results as $key): ?>
	
	<input type="hidden" name="id" value="<?php echo $key['id']; ?>" />
	
	<div class="input-fields">
	<input type="text" name="name" title= "Name: "class="col-6" value ="<?php echo $key['name']; ?>" />
	</div>
	
	<div class="input-fields">
	<input type="text" name="number" title="Number: " class="col-6" value="<?php echo $key['number']; ?>" />
	</div>
	
	<div class="input-fields">
	<input type="text" name="email" title="Email: "class="col-6" value="<?php echo $key['email']; ?>" />
	</div>
	
	<div class="input-fields">
	<input type="text" name="address" title="Address: " class="col-6" value="<?php echo $key['address']; ?>" />
	</div>
	
	<div class="input-fields">
	<input type="text" name="groups" title="Groups: "class="col-6"  value="<?php echo $key['groups']; ?>" />
	</div>
	
	<div class="input-fields">
	<input type="text" name="created_at" title="Created: "class="col-6" value= "<?php echo $key['created_at']; ?>" />
	</div>
	
	<div class="input-fields">
	<input type="submit" value="Update" />
	</div>
	<?php endforeach ?>
</form>
</div>
</body>
<?php 
   //require  'includes'.DIRECTORY_SEPARATOR.'footer.php';
?>
