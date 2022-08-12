<?php include "inc/header.php";

$session = new \Admin\Libs\Session();
if ($session->isSignedIn()) {
	header("Location: index.php");
}

?>

<main class="container">
	<div class="row justify-content-center mb-5">
		<?php
		if (isset($_POST['login'])) {
			$email = $_POST['email'];
			$password = $_POST['password'];
			$user = new \Admin\Libs\User();
			$user = $user->verifyUser($email, $password);
			if ($user) {
				$session->login($user);
				header("Location: index.php");
			} else {
				$session->message("Your email or password is incorrent");
			}
		} else {
			$email = "";
			$password = "";
			$session->message();
		}

		?>
		<div class="col-lg-9">
			<div class="card shadow-lg border-0 rounded-lg mt-5">
				<div class="card-header">
					<h3 class="text-center font-weight-light my-2">Login User</h3>
				</div>
				<h5 class="bg-danger text-white pl-3">
					<?php
					if (!empty($session->message)) {
						echo $session->message;
					}
					?>
				</h5>
				<div class="card-body">
					<form method="post" id="login" action="">
						<div class="form-group">
							<label class="small mb-1" for="email">Email :</label>
							<input class="form-control py-4" name="email" id="email" value="<?php if (!empty($email)) echo $email; ?>" type="text" placeholder="Enter email" />
						</div>

						<div class="form-group">
							<label class="small mb-1" for="email">Password :</label>
							<input class="form-control py-4" name="password" id="password" value="<?php if (!empty($password)) echo $password; ?>" type="password" placeholder="Enter email password" />
						</div>


						<input class="btn btn-primary" id="login" value="Login" type="submit" name="login" />
					</form>
				</div>
				<div class="card-footer text-center">
					<div class="small">
						<a href="register.html">
							Have an account? Go to login</a>
					</div>
				</div>
			</div>
		</div>
	</div>

</main>
<?php include "inc/footer.php" ?>