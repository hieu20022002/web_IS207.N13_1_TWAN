<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">

<?php 
include"dbconn.php";
$error = '';
$success = '';

if( isset($_POST) && !empty($_POST) ):

	if( !empty($_POST['email']) ):

		$sql = "SELECT * FROM registration WHERE email=:email";
		$stmt = $db->prepare($sql);
		$stmt->execute(
						array(
							':email'=>$_POST['email']
						)
					);
		$user = $stmt->fetch(PDO::FETCH_ASSOC);
	endif;
		
	if( empty($_POST['name']) ):
		$error = 'Name is mandatory';
	elseif( empty($_POST['email']) ):
		$error = 'Email is mandatory';
	elseif( isset($user['id']) && !empty($user['id']) ):
		$error = 'Email already exists';		
	elseif( empty($_POST['code']) ):
		$error = 'Code is mandatory';
	elseif( empty($_POST['mobile']) ):
		$error = 'Phone is mandatory';
	elseif( empty($_POST['job_type']) ):
		$error = 'Job type is mandatory';
	elseif( empty($_POST['password']) ):
		$error = 'Password is mandatory';
	elseif( empty($_POST['re_password']) ):
		$error = 'Re type your password';
	elseif( $_POST['re_password'] != $_POST['password'] ):
		$error = 'Password mismatch';	
	else:

		$sql = "INSERT INTO registration SET name=:name, email=:email, code=:code, mobile=:mobile, job_type=:job_type, password=:password";
		$stmt = $db->prepare($sql);
		$stmt->execute(
						array(
							':name'=>$_POST['name'],
							':email'=>$_POST['email'],
							':code'=>$_POST['code'],
							':mobile'=>$_POST['mobile'],
							':job_type'=>$_POST['job_type'],
							':password'=>$_POST['password']
						)
					);
		$last_id = $db->lastInsertId();
		if( isset($last_id) && !empty($last_id) ):
			//$_SESSION['id'] = $last_id;
			$_POST['name'] = $_POST['email'] = $_POST['mobile'] = $_POST['password'] = $_POST['re_password'] = '';
			$success = "Data has been saved.";
		else:
			$error = 'Data does not saved';
		endif;	
	
	endif;								

endif;

?>

<div class="container">

<div class="card bg-light">
<article class="card-body mx-auto" style="max-width: 400px;">
	<h4 class="card-title mt-3 text-center">Create Account</h4>
	<p class="text-center">Get started with your free account</p>

	<?php if( isset($error) && !empty($error) ):?>
	<div class="alert alert-danger" role="alert">
	  <?php echo $error;?>
	</div>
	<?php endif;?>

	<?php if( isset($success) && !empty($success) ):?>
	<div class="alert alert-success" role="alert">
	  <?php echo $success;?>
	</div>
	<?php endif;?>

	<form method="post" action="register.php">
	<div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		 </div>
        <input name="name" value="<?php echo isset($_POST['name']) ? $_POST['name'] : ''?>" class="form-control" placeholder="Full name" type="text">
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
		 </div>
        <input name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''?>" class="form-control" placeholder="Email address" type="email">
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
		</div>
		<select name="code" class="custom-select" style="max-width: 120px;">
			<option <?php if( isset($_POST['code']) && $_POST['code'] == '91' ): echo "selected"; endif; ?> value="91">+91</option>
		    <option <?php if( isset($_POST['code']) && $_POST['code'] == '971' ): echo "selected"; endif; ?> value="971">+971</option>
		    <option <?php if( isset($_POST['code']) && $_POST['code'] == '972' ): echo "selected"; endif; ?> value="972">+972</option>
		    <option <?php if( isset($_POST['code']) && $_POST['code'] == '198' ): echo "selected"; endif; ?> value="198">+198</option>
		    <option <?php if( isset($_POST['code']) && $_POST['code'] == '701' ): echo "selected"; endif; ?> value="701">+701</option>
		</select>
    	<input name="mobile" value="<?php echo isset($_POST['mobile']) ? $_POST['mobile'] : ''?>" class="form-control" placeholder="Phone number" type="text">
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-building"></i> </span>
		</div>
		<select name="job_type" class="form-control">
			<option value=""> Select job type</option>
			<option <?php if( isset($_POST['job_type']) && $_POST['job_type'] == 'Designer' ): echo "selected"; endif; ?>>Designer</option>
			<option <?php if( isset($_POST['job_type']) && $_POST['job_type'] == 'Manager' ): echo "selected"; endif; ?>>Manager</option>
			<option <?php if( isset($_POST['job_type']) && $_POST['job_type'] == 'Accaunting' ): echo "selected"; endif; ?>>Accaunting</option>
		</select>
	</div> <!-- form-group end.// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input name="password" value="<?php echo isset($_POST['password']) ? $_POST['password'] : ''?>" class="form-control" placeholder="Create password" type="password">
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input class="form-control" name="re_password" value="<?php echo isset($_POST['re_password']) ? $_POST['re_password'] : ''?>" placeholder="Repeat password" type="password">
    </div> <!-- form-group// -->                                      
    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block"> Create Account  </button>
    </div> <!-- form-group// -->      
    <p class="text-center">Have an account? <a href="login.php">Log In</a> </p>                                                                 
</form>
</article>
</div> <!-- card.// -->

</div> 
