<?php include('p_sql.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Change Email Or Password</title>
  <link rel="stylesheet" type="text/css" href="stylereg.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>
	 <!-- IMPORT BOOTSTRAP SCRIPTS-->
	 <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<!-- nav bar for the website -->
<br>

<nav class="navbar navbar-expand-md navbar-light" style="background-color :#F0B27A">

<a class="navbar-brand" href="#">
	<img src="../NavBar/UcanClaim.png" width="95" height="40" class="d-inline-block align-top" alt="">
</a>

<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
	aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	<span class="navbar-toggler-icon"></span>
</button>
<div class="container">
	<div class="collapse navbar-collapse justify-content-between " id="navbarNav">
		<ul class="nav navbar-nav ml-auto">
			<li class="nav-item active">
				<a class="nav-link" href="../home.php">Home<span class="sr-only"></span></a>
			</li>
			<li class="nav-item active">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
					data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Petition<span
						class="sr-only"></span></a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="all_petitions.php">Sign a Petition</a>
					<a class="dropdown-item" href="new_petition.html">Create a Petition</a>
					<a class="dropdown-item" href="achieved_tareget_petitions.php">Completed petitions</a>
				</div>
			</li>
			<li class="nav-item active">
				<a class="nav-link" href="../index_react/index.html">Shop<span class="sr-only"></span></a>
			</li>
			<li class="nav-item active">
				<a class="nav-link" href="../kneset.php">Contact a Knesset Member<span
						class="sr-only"></span></a>
			</li>

		</ul>
		<ul class="navbar-nav ml-auto">
			<li class="nav-item active">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
					data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">My Account<span
						class="sr-only"></span></a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="#">Profile</a>
					<a class="dropdown-item" href="../my_petition.php">My Petitions</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="logout.php">Log Out</a>
				</div>
			</li>
		</ul>
	</div>
</div>

</nav>


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
  	  <button type="submit" class="btn btn-secondary" name="reg_user">Change Email</button>
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
  	  <button type="submit" class="btn btn-secondary" name="reg_user2">Change Passsword</button>
  	</div>
  </form>
</body>
</html>