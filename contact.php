<?php 
     require_once("config.php");
     $name = $subject = $email = $contents ='';
     $validationArr = array('name'=>'','email'=>'','subject'=>'','contents'=>'');
     if(isset($_POST['submit']))//check if the submit button has been pressed.
     {
          //validate the name
          if (empty($_POST['name'])) {
               $validationArr['name'] = 'Please Enter Your Name.';
          } else{
               $name = $_POST['name'];
               if (!preg_match("/^[a-zA-Z\s]+$/", $name)) {
                    $validationArr['name'] = "The Name is not Valid.";
               }
          }
          //validate the email
          if (empty($_POST['email'])) {
               $validationArr['email'] = 'Please Enter Your Email.';
          } else{
               $email=$_POST['email'];
               if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $validationArr['email'] = 'The Email is Not valid!!';
               }
          }
          //validate the subject
          if (empty($_POST['subject'])) {
               $validationArr['subject'] = 'Please Enter a subject.';
          } else{
               $subject = $_POST['subject'];
               if (!preg_match('/^([a-zA-Z\s\,]+)(\s*[a-zA-Z\s\,]*)*$/', $subject)) {
                    $validationArr['subject'] = 'The Subject You Entered is Not valid !!';
               }
          }
          //validate the contents
          if (empty($_POST['contents'])) {
               $validationArr['contents'] = 'Please Enter Your Message.';
          } else{
               $contents = $_POST['contents'];
               if (!preg_match('/^([a-zA-Z\s\w\.\,]+)(\s*[a-zA-Z\s\w\.\,]*)*$/', $contents)) {
                    $validationArr['contents'] = 'Not valid message!!';
               }
          }
          if(!array_filter($validationArr)){
               //save the data to DB after the values have been validated, then go to homepage.
               $sql = "INSERT INTO messages(name, email, subject, content,status) VALUES(?,?,?,?,true)";
               $conn->prepare($sql)->execute([$name,$email,$subject,$contents]);
               header('location: '.BASE_URL.'/contact.php');
          } else {
               //echo error in the form.
          }
     }

 ?>
<!DOCTYPE html>
<html lang="en">

<?php include(ROOT_PATH.'/layout/header.php'); ?>
<?php include(ROOT_PATH.'/layout/navbar.php'); ?>

<!-- Home Section -->

<section id="home" class="main-contact parallax-section">
     <div class="overlay"></div>
     <div class="container">
          <div class="row">
               <div class="col-md-12 col-sm-12">
                    <h1>Contact Us</h1>
               </div>

          </div>
     </div>
</section>

<!-- Contact Section -->

<section id="contact">
     <div class="container">

          <div class="row">
          
               <div class="col-md-offset-1 col-md-10 col-sm-12">
                    <h2>Tell us what's in your mind...</h2>
                    <p>We would love to hear your opinion, question, complaint, or thougts 
                         so we can improve our selves and see how the contents impact on others.</p>

                    <form action="contact.php" method="post">
                         <div class="col-md-4 col-sm-4">
                              <input name="name" type="text" class="form-control" id="name" 
                              placeholder="Name" value="<?php echo htmlspecialchars($name); ?>" >
                                  <!-- oninvalid="this.setCustomValidity('?php echo $validationArr['name'] ?>')"
                                   onvalid="this.setCustomValidity('')"-->
                              <div class="p-3 mb-2 bg-danger text-white"><?php echo $validationArr['name']; ?></div>
                         </div>
                         <div class="col-md-4 col-sm-4">
                              <input name="email" type="email" class="form-control" id="email" 
                              placeholder="Email" value="<?php echo htmlspecialchars($email); ?>">
                              <div class="p-3 mb-2 bg-danger text-white"><?php echo $validationArr['email']; ?></div>
                         </div>
                         <div class="col-md-4 col-sm-4">
                              <input name="subject" type="text" class="form-control" id="subject" 
                              placeholder="Subject" value="<?php echo htmlspecialchars($subject); ?>">
                              <div class="p-3 mb-2 bg-danger text-white"><?php echo $validationArr['subject']; ?></div>
                         </div>
                         <div class="col-md-12 col-sm-12">
                              <textarea name="contents" rows="5" class="form-control" id="contents" 
                              placeholder="Contents" value="<?php echo htmlspecialchars($contents); ?>"></textarea>
                              <div class="p-3 mb-2 bg-danger text-white"><?php echo $validationArr['contents']; ?></div>
                         </div>
                         <div class="col-md-3 col-sm-6">
                              <input name="submit" type="submit" class="form-control" id="submit" value="Send">
                         </div>
                    </form>
               </div>

          </div>
     </div>
</section>

<?php include(ROOT_PATH.'/layout/footer.php'); ?>