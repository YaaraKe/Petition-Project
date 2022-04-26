<?php include('p_sql.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Change Email Or Password</title>
  <link rel="stylesheet" type="text/css" href="stylereg.css">
</head>
<body>
  <div class="header">
  	<h2>Change Email</h2>
  </div>
	
  <form method="post" action="">
  	<?php include('p_errors_email.php'); ?>
  	<div class="input-group">
  	  <label>New Email</label>
  	  <input type="email" name="email" value="<?php echo $email; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Your Password</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Change Email</button>
  	</div>
  </form>
  
  
  
  <div class="header">
  	<h2>Change Password</h2>
  </div>	
  <form method="post" action="">
  	<?php include('p_errors.php'); ?>
	  <div class="input-group">
  	  <label>Previous password</label>
  	  <input type="password" name="pas3">
  	</div>
	  <div class="input-group">
  	  <label>New Password</label>
  	  <input type="password" name="pas1">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="pas2">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user2">Change Passsword</button>
  	</div>
  </form>
</body>
</html>