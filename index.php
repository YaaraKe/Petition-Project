<!DOCTYPE html>
<html lang="en">
  <head>

    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
 <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
		integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
		crossorigin="anonymous"></script>

    <link rel="stylesheet" href="login_new_style.css">

</head>
     <body class="align">
      <img src="../NavBar/UcanClaim.png" width="200" height="100" class="d-inline-block align-top" alt="">

        <div class="grid">

          <h1 style="text-align: center;"><b>Welcome!</b></h1>
      
          <form action="login.php" method="POST" class="form login">
            <?php if (isset($_GET['error'])) { ?>

                <p class="error"><?php echo $_GET['error']; ?></p>
    
            <?php } ?>
      
            <div class="form__field">
              <label for="login__username"><svg class="icon">
                  <use xlink:href="#icon-user"></use>
                </svg><span class="hidden">Email Address</span></label>
              <input autocomplete="Email Address" id="login__username" type="text" name="uname" class="form__input" placeholder="Email Address" required>
            </div>
      
            <div class="form__field">
              <label for="login__password"><svg class="icon">
                  <use xlink:href="#icon-lock"></use>
                </svg><span class="hidden">Password</span></label>
              <input id="login__password" type="password" name="password" class="form__input" placeholder="Password" required>
              <svg class="eyes" id="visible1" onclick="visability1()" xmlns="http://www.w3.org/2000/svg" width="17" height="17"
					fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
					<path
						d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
					<path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
				</svg>
				<svg class="eyes" id="unvisible1" onclick="visability1()" xmlns="http://www.w3.org/2000/svg" width="17" height="17"
					fill="currentColor" class="bi bi-eye-slash" viewBox="0 0 16 16">
					<path
						d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7.028 7.028 0 0 0-2.79.588l.77.771A5.944 5.944 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.134 13.134 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755-.165.165-.337.328-.517.486l.708.709z" />
					<path
						d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829l.822.822zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829z" />
					<path
						d="M3.35 5.47c-.18.16-.353.322-.518.487A13.134 13.134 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7.029 7.029 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12-.708.708z" />
				</svg>
            </div>
      
            <div class="form__field">
              <input type="submit" value="Sign In">
            </div>
      
          </form>
      
          <p class="text--center">Not a member? <a href="register.php">Sign up now</a> <svg class="icon">
              <use xlink:href="#icon-arrow-right"></use>
            </svg></p>
      
        </div>
      
        <svg xmlns="http://www.w3.org/2000/svg" class="icons">
          <symbol id="icon-arrow-right" viewBox="0 0 1792 1792">
            <path d="M1600 960q0 54-37 91l-651 651q-39 37-91 37-51 0-90-37l-75-75q-38-38-38-91t38-91l293-293H245q-52 0-84.5-37.5T128 1024V896q0-53 32.5-90.5T245 768h704L656 474q-38-36-38-90t38-90l75-75q38-38 90-38 53 0 91 38l651 651q37 35 37 90z" />
          </symbol>
          <symbol id="icon-lock" viewBox="0 0 1792 1792">
            <path d="M640 768h512V576q0-106-75-181t-181-75-181 75-75 181v192zm832 96v576q0 40-28 68t-68 28H416q-40 0-68-28t-28-68V864q0-40 28-68t68-28h32V576q0-184 132-316t316-132 316 132 132 316v192h32q40 0 68 28t28 68z" />
          </symbol>
          <symbol id="icon-user" viewBox="0 0 1792 1792">
            <path d="M1600 1405q0 120-73 189.5t-194 69.5H459q-121 0-194-69.5T192 1405q0-53 3.5-103.5t14-109T236 1084t43-97.5 62-81 85.5-53.5T538 832q9 0 42 21.5t74.5 48 108 48T896 971t133.5-21.5 108-48 74.5-48 42-21.5q61 0 111.5 20t85.5 53.5 62 81 43 97.5 26.5 108.5 14 109 3.5 103.5zm-320-893q0 159-112.5 271.5T896 896 624.5 783.5 512 512t112.5-271.5T896 128t271.5 112.5T1280 512z" />
          </symbol>
        </svg>
      
      </body>
</html>


<!-- passwords visability -->

<script>

 
	function visability1() {
		var x = document.getElementById("login__password");
		if (x.type === "password") {
			x.type = "text";
		} else {
			x.type = "password";
		}
	}

	$("#unvisible1").hide();

	$("#visible1").click(function () {
		$("#unvisible1").show();
		$("#visible1").hide();
	});

	$("#unvisible1").click(function () {
		$("#unvisible1").hide();
		$("#visible1").show();
	});

</script>
