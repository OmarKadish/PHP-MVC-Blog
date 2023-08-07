<?php
	if (isset($_SESSION['user'])){
		if (isset($_SESSION['loginToken']) && $_SESSION['loginToken']=='0136877') {
		  if ($_SESSION['admin']) {
			header('location: '.BASE_URL.'/admin/index.php');
		  }else
		  	header('location: '.BASE_URL.'/index.php');
		}
	}


?>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="Omar">
	
	<link rel="preconnect" href="https://fonts.gstatic.com">

	<title>Registration</title>

	<link href="<?php echo BASE_URL.'/style/auth/app.css' ?>" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>