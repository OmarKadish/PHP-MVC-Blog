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
							<h1 class="h2">Get started</h1>
							<!-- <p class="lead">
								Start creating the best possible user experience for you customers.
							</p> -->
						</div>

						<div class="card">
							<div class="card-body">
								<div class="m-sm-4">
									<form method="post" action="signup.php">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group mb-3 ms-2">
                                                    <label class="form-label">First Name</label>
                                                    <input class="form-control form-control-lg" type="text" id="firstName" 
                                                    name="firstName" value="<?php echo htmlspecialchars($firstName); ?>" />
                                                    <div class="mb-2 bg-danger text-white"><?php echo $validatSign['firstName']; ?></div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group mb-3 ms-2">
                                                    <label class="form-label">Last Name</label>
                                                    <input class="form-control form-control-lg" type="text" id="lastName" 
                                                    name="lastName" value="<?php echo htmlspecialchars($lastName); ?>"/>
                                                    <div class="mb-2 text-danger"><?php echo $validatSign['lastName']; ?></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group mb-3 ms-2">
                                                    <label class="form-label">Birth Date</label>
                                                    <input class="form-control form-control-lg" type="date" id="birthDate" 
                                                    name="birthDate" value="<?php echo htmlspecialchars($birthDate); ?>"/>
                                                    <div class="mb-2 bg-danger text-white"><?php echo $validatSign['birthDate']; ?></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group mb-3 ms-2">
                                                    <label class="form-label">Email</label>
                                                    <input class="form-control form-control-lg" type="email" id="email" placeholder="Enter your email"
                                                    name="email" value="<?php echo htmlspecialchars($email); ?>"/>
                                                    <div class="mb-2 bg-danger text-white"><?php echo $validatSign['email']; ?></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group mb-3 ms-2">
                                                    <label class="form-label">Password</label>
                                                    <input class="form-control form-control-lg" type="password" id="password" placeholder="Enter password"
                                                    name="password" value="<?php echo htmlspecialchars($password); ?>"/>
                                                    <div class="mb-2 bg-danger text-white"><?php echo $validatSign['password']; ?></div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="mb-4">
                                            <div class="form-check mb-3 ms-2">
                                                <label class="form-check-label text-muted">
                                                <input type="checkbox" class="form-check-input" id="sub_agreement" name="sub_agreement" value="1"> I agree to all Terms & Conditions </label>
                                            </div>
                                        </div> -->
										        <div class="text-center mt-3">
											<!-- <a href="index.html" class="btn btn-lg btn-primary">Sign up</a> -->
											<button name="reg_user" type="submit" class="btn btn-lg btn-primary">Sign up</button>
										</div>
                                        <div class="text-center mt-4 font-weight-light"> Already have an account? 
                                            <a href="login.php" class="text-primary">Log in</a>
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