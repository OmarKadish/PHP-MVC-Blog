<?php
    require_once("../config.php");  
    // initializing variables
    $firstName = $lastName = $birthDate = $email = $password = $sub_agreement = '';
    $validatSign = array('firstName'=>'','lastName'=>'','birthDate'=>'','password'=>'',
    'email'=>'','sub_agreement'=>'');
    $validateLog = array('success'=>'','failure'=>'','email'=>'','password'=>'');

    // REGISTER USER
    if (isset($_POST['reg_user'])) {
        // receive all input values from the form
        //validate the firstName
        if (empty($_POST['firstName'])) {
            $validatSign['firstName'] = 'This Field is required.';
        } else{
            $firstName = $_POST['firstName'];
            if (!preg_match("/^[a-zA-Z\s]+$/", $firstName)) {
                $validatSign['firstName'] = "Entered value is not Valid.";
            }
        }
        //validate the lastName
        if (empty($_POST['lastName'])) {
            $validatSign['lastName'] = 'This Field is required.';
        } else{
            $lastName = $_POST['lastName'];
            if (!preg_match("/^[a-zA-Z\s]+$/", $lastName)) {
                $validatSign['lastName'] = "Entered value is not Valid.";
            }
        }
        //validate the birthDate
        if (empty($_POST['birthDate'])) {
            $validatSign['birthDate'] = 'This Field is required.';
        } else{
            $birthDate = $_POST['birthDate'];
            if ($birthDate> date('m/d/Y') AND $birthDate<strtotime("01/01/1950")) {
                $validatSign['birthDate'] = "Entered Birthdate is not Valid.";
            }
        }
        //validate the email
        if (empty($_POST['email'])) {
            $validatSign['email'] = 'This Field is required.';
        } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $validatSign['email'] = 'Entered Email is Not valid!!';
            } else{
                $email=$_POST['email'];
                //check the database to make sure a user does not already exist with the same email
                $user_check_query = "SELECT * FROM users WHERE email=? LIMIT 1";
                $result= $conn->prepare($user_check_query);
                $result->execute([$email]);
                $user = $result->fetch();
    
                if ($user) { // if user exists
                    $validatSign['email']= "Email already exists";
                }
            }

        //validate the password
        if (empty($_POST['password'])) {
            $validatSign['password'] = 'This Field is required.';
        } else{
            $password = $_POST['password'];
            if (!preg_match('/^([a-zA-Z\s\.\d]+)(\s*[a-zA-Z\s\.\d]*)*$/', $password)) {
                $validatSign['password'] = 'Not valid Password!! Must not content special characters';
            }
        }


        // Finally, register user if there are no errors in the form
        if (!array_filter($validatSign)) {
            $enc_password = md5($password);//encrypt the password before saving in the database

            $query = "INSERT INTO users (firstName, lastName, birthDate, email, password, sub_agreement) 
                    VALUES(?,?,?,?,?,?)";
                    //todo: handle the agreement.
            $conn->prepare($query)->execute([$firstName, $lastName, $birthDate, $email, $enc_password, true]);

            header('location: '.BASE_URL.'/registration/login.php');
        }
    }


    
    // LogIn USER
    if (isset($_POST['log_user'])) {
        
        //validate the email
        if (empty($_POST['email'])) {
            $validateLog['email'] = 'Your Email is required.';
        } else{
            $email=$_POST['email'];
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $validateLog['email'] = 'The Email is Not valid!!';
            }
        }
        //validate the password
        if (empty($_POST['password'])) {
            $validateLog['password'] = 'Your Password is required to log in.';
        } else{
            $password = $_POST['password'];
        }

        if (!array_filter($validateLog)) {
            //hashing the password to compare it.
            $chk_password = md5($password);
            //check the database to make sure a user does not already exist with the same email
            $user_check_query = "SELECT * FROM users WHERE email=? AND password=?";
            $result= $conn->prepare($user_check_query);
            $result->execute([$email,$chk_password]);
            $user = $result->fetch();

            if ($user) { // if user exists
                $validateLog['success'] = 'you are logged in now';
                $_SESSION['loginToken'] = '0136877';//more secure, it will be something only I know. Todo: make it generic.

                $_SESSION['user'] = $user;
                $_SESSION['timeout'] = time()+(60*60);

                //$_SERVER['REMOTE_ADDR'];
                // Getting The Ip.
                $uip=getHostByName(getHostName());
                $query = "INSERT INTO userlogs (user_id , user_ip) 
                    VALUES(?,?)";
                $conn->prepare($query)->execute([$user['id'], $uip]);
                if($user['roll']=='manager'){
                    $_SESSION['admin'] = true;
                    header('refresh:1;url='.BASE_URL.'/admin/index.php');
                }else {
                    $_SESSION['admin'] = false;
                    header('refresh:1;url='.BASE_URL.'/');
                }
            } else
                $validateLog['failure'] = 'Invalid login, Incorrect Email or Password';
        }
    }

?>