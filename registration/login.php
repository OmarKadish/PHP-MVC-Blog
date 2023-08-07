<?php
	require('server.php');

?>

<!DOCTYPE html>
<html lang="en">

<?php include(ROOT_PATH.'/registration/header_layout.php'); ?>

	<main class="d-flex w-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">
						<div class="text-center mt-4">
							<h1 class="h2">Log In</h1>
						</div>
						<div class="card">
							<div class="card-body">
								<div class="m-sm-4">
									<form method="post" action="login.php">
										<div class="form-group mb-3">
											<label class="form-label">Email</label>
											<input class="form-control form-control-lg" type="email" id="email" name="email" 
											placeholder="Enter your email" value="<?php echo htmlspecialchars($email); ?>"/>
											<div class="mb-2 bg-danger text-white"><?php echo $validateLog['email']; ?></div>
										</div>
										<div class="form-group mb-3">
											<label class="form-label">Password</label>
											<input class="form-control form-control-lg" type="password" id="password" name="password" 
											placeholder="Enter your password" value="<?php echo htmlspecialchars($password); ?>"/>
											<div class="mb-2 bg-danger text-white"><?php echo $validateLog['password']; ?></div>
											<small>
												<a href="pages-reset-password.html">Forgot password?</a>
											</small>
										</div>
										<div class="mb-2 bg-danger text-white"><?php echo $validateLog['failure']; ?></div>
										<div class="mb-2 bg-success text-white"><?php echo $validateLog['success']; ?></div>
										<!-- <div>
											<label class="form-check">
												<input class="form-check-input" type="checkbox" value="remember-me" name="remember-me" checked>
												<span class="form-check-label">
													Remember me next time
												</span>
											</label>
										</div> -->
										
										<div class="text-center mt-3">
											<!-- <a href="index.php" type="submit" class="btn btn-lg btn-primary">Sign in</a> -->
											<button name="log_user" type="submit" class="btn btn-lg btn-primary">Log in</button>
										</div>
										<div class="text-center mt-4 font-weight-light"> Don't have an account? 
                                            <a href="signup.php" class="text-primary">Sign Up</a>
                                        </div>
									</form>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</main>

	<script src="../style/auth/app.js"></script>

</body>

</html>