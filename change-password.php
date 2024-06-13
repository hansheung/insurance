<!DOCTYPE html>
<html lang="en">
<?php
session_start();
  if (isset($_SESSION['message'])) {
    echo '<script language="javascript">';
    echo 'alert("' . $_SESSION['message'] . '");';
    echo '</script>';
    unset($_SESSION['message']); // Clear the message after displaying it
  }

$user_email = $_SESSION['user_info']['email'];

?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>InsurHans | Change Password </title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="index.php" class="h1"><b>Insur</b>Hans</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Please change your password</p>
      <form name="frmChange" action="/controllers/forgot-password/change-password.php" method="POST" onSubmit="return validatePassword()">
        <input type="hidden" name="email" value="<?php echo $user_email; ?>">
          
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="currentPassword" id="password" placeholder="Current Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="password-toggle-icon fas fa-eye"></span>
              </div>
            </div>
            <span id="currentPassword" class="validation-message text-danger pl-2 pt-2"></span>
          </div>
          
          <div class="input-group mb-3">
          <input type="password" class="form-control" name="newPassword" id="password2" placeholder="New Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="password-toggle-icon2 fas fa-eye"></span>
                
              </div>
            </div>
            <span id="newPassword" class="validation-message text-danger pl-2 pt-2"></span>
            </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" name="confirmPassword" id="password3" placeholder="Confirm New Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="password-toggle-icon3 fas fa-eye"></span>
               
              </div>
            </div>
            <span id="confirmPassword" class="validation-message text-danger pl-2 pt-2"></span>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <p class="mt-3 mb-1">
        <a href="index.php">Login</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<script>
  function validatePassword() {
	var currentPassword, newPassword, confirmPassword, output = true;

	currentPassword = document.frmChange.currentPassword;
	newPassword = document.frmChange.newPassword;
	confirmPassword = document.frmChange.confirmPassword;

	if (!currentPassword.value) {
		currentPassword.focus();
		document.getElementById("currentPassword").innerHTML = "required";
		output = false;
	}
	else if (!newPassword.value) {
		newPassword.focus();
		document.getElementById("newPassword").innerHTML = "required";
		output = false;
	}
	else if (!confirmPassword.value) {
		confirmPassword.focus();
		document.getElementById("confirmPassword").innerHTML = "required";
		output = false;
	}
	if (newPassword.value != confirmPassword.value) {
		newPassword.value = "";
		confirmPassword.value = "";
		newPassword.focus();
		document.getElementById("confirmPassword").innerHTML = "not same";
		output = false;
	}
	return output;
}

  const passwordField = document.getElementById("password");
  const passwordField2 = document.getElementById("password2");
  const passwordField3 = document.getElementById("password3");
  const togglePassword = document.querySelector(".password-toggle-icon");
  const togglePassword2 = document.querySelector(".password-toggle-icon2");
  const togglePassword3 = document.querySelector(".password-toggle-icon3");
  

  togglePassword.addEventListener("click", function () {
    if (passwordField.type === "password") {
      passwordField.type = "text";
      togglePassword.classList.remove("fa-eye");
      togglePassword.classList.add("fa-eye-slash");
    } else {
      passwordField.type = "password";
      togglePassword.classList.remove("fa-eye-slash");
      togglePassword.classList.add("fa-eye");
    }
  });
    togglePassword2.addEventListener("click", function () {
    if (passwordField2.type === "password") {
      passwordField2.type = "text";
      togglePassword2.classList.remove("fa-eye");
      togglePassword2.classList.add("fa-eye-slash");
    } else {
      passwordField2.type = "password";
      togglePassword2.classList.remove("fa-eye-slash");
      togglePassword2.classList.add("fa-eye");
    }
  });
  
  togglePassword3.addEventListener("click", function () {
    if (passwordField3.type === "password") {
      passwordField3.type = "text";
      togglePassword3.classList.remove("fa-eye");
      togglePassword3.classList.add("fa-eye-slash");
    } else {
      passwordField3.type = "password";
      togglePassword3.classList.remove("fa-eye-slash");
      togglePassword3.classList.add("fa-eye");
    }
  });
</script>
</body>
</html>
