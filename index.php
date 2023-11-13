<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'config.php';
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM accounts WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashed_password = $row['password'];
        $role = $row['role'];
		 $_SESSION['role']=$role;
        if (($role == 'superadmin')&& ($password=='admin123')) {
            $_SESSION['adminlogged']= true;
			$_SESSION['email']=$email;
            header('Location: dashboard_admin.php');
        }
        if (password_verify($password, $hashed_password)) {
             if ($role == 'teacher') {
                $_SESSION['teacherlogged']= true;
				$_SESSION['email']=$email;
                header('Location: dashboard_teacher.php');
            } else {
                $_SESSION['studentlogged']= true;
				$_SESSION['email']=$email;
                header('Location: dashboard_student.php');
            }
        } else {
            $_SESSION['error'] = "Invalid  email or password";
        }
    } else {
        $_SESSION['error'] = "Invalid email or password ";
    }
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'head.php'; ?>
<body>	
	<?php
	if (isset($_GET['logout'])) {
    echo '<div class="alert alert-warning" role="alert">
            You have been disconnected.
          </div>';
}

	?>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="assets/images/img-01.png" alt="IMG">
				</div>

				<form class="login100-form " method="post" action="index.php">
					<span class="login100-form-title">
						Login
					</span>

					<div class="wrap-input100 " >
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 " >
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>
					<div class="text-center" >
						<?php
						if (isset($_SESSION['error'])) { 
							echo '<div class="alert danger">' . $_SESSION['error'] . '</div>';
							unset($_SESSION['error']); 
						}
						?>
					</div>
					<div class="text-center p-t-12">
						<span class="txt1">Forgot </span><a class="txt2" href="#">Username / Password?</a>
					</div>
					<div class="text-center p-t-136">
					</div>
				</form>
			</div>
		</div>
	</div>
	
	


	
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
	

</body>
</html>