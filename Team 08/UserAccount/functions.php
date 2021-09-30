<?php

function clean($string)
{
   return htmlentities($string);
}

function redirect($location)
{
   return header("Location: {$location}");
}

function set_message($message)
{
   if (!empty($message)) {
      $_SESSION['message']   = $message;
   }
   
   else {
      $message = "";
   }
}

function display_message()
{
   if (isset($_SESSION['message'])) {

      echo $_SESSION['message'];

      unset($_SESSION['message']);
   }
}


function token_generator()
{
   $token = $_SESSION['token'] = md5(uniqid(mt_rand(), true));
   return $token;
}

//error messages
function validation_errors($error_message)
{
   $error_message = <<<DELIMITER

        <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong=Warning</Strong> $error_message 
        </div>

DELIMITER;

   return $error_message;
}

function email_exists($email)
{
   $sql = "SELECT id FROM users WHERE email ='$email'";

   $result = query($sql);

   if (row_count($result) == 1) {
      return true;
   } else {
      return false;
   }
}

function send_email($email, $subject, $msg, $headers)
{
   return (mail($email, $subject, $msg, $headers));
}

//User validation
function validate_user_registration()
{
   $errors = [];

   $min = 3;
   $max = 20;

   if ($_SERVER['REQUEST_METHOD'] == "POST") {

      $first_name = clean($_POST['first_name']);
      $last_name = clean($_POST['last_name']);
      $username = clean($_POST['username']);
      $email = clean($_POST['email']);
      $password = clean($_POST['password']);
      $confirm_password = clean($_POST['confirm_password']);

      if (strlen($first_name) < $min) {

         $errors[] = "Your first name cannor be less than {$min} characters ";
      }

      if (strlen($first_name) > $max) {

         $errors[] = "Your first name cannor be greater than {$max} characters ";
      }

      if (empty($first_name)) {

         $errors[] = "Your Firstname cannot be empty";
      }

      if (strlen($last_name) < $min) {

         $errors[] = "Your last name cannor be less than {$min} characters ";
      }

      if (strlen($last_name) > $max) {

         $errors[] = "Your last name cannot be greater than {$max} characters ";
      }

      if (strlen($username) > $max) {

         $errors[] = "Your username cannot be greater than {$max} characters ";
      }

      if (strlen($username) < $min) {

         $errors[] = "Your user name cannot be less than {$min} characters ";
      }

      if (email_exists($email)) {

         $errors[] = "Sorry that email is already registered ";
      }

      if (strlen($email) < $min) {

         $errors[] = "Enter a valid Email ";
      }

      if ($password !== $confirm_password) {

         $errors[] = "Your passwords does not match";
      }


      if (!empty($errors)) {
         
         foreach ($errors as $error) {


            echo validation_errors($error);
         }
      } else {

         if (register_user($first_name, $last_name, $username, $email, $password)) {

            set_message("<p class='bg-success text-center'> Please Check Your Email for Activation Link</p>");

            redirect("message.php");

            echo "Users Registered";
         } else {

            set_message("<p class='bg-danger text-center'> we could not register the user</p>");
         }
      }

   } 
} 

//Registering user
function register_user($first_name, $last_name, $username, $email, $password)
{
   $first_name = escape($first_name);
   $last_name  = escape($last_name);
   $username   = escape($username);
   $email      = escape($email);
   $password   = escape($password);

   if (email_exists($email)) {
      return false;
   }else {
      $password        = md5($password);

      $validation_code = md5($email . microtime());

      $sql = "INSERT INTO users(first_name, last_name, username, email, password, validation_code, active)";
      $sql .= " VALUES('$first_name','$last_name','$username','$email','$password','$validation_code', 0)";
      $result = query($sql);
      confirm($result);


      $subject = "Activate Your User Account";
      $msg = "Please click the below link to activate your sportsman.lk user account,
        http://localhost/Team%2008/UserAccount/activate.php?email=$email&code=$validation_code";

      $headers = "From: slspotsman.lk@gmail.com";

      send_email($email, $subject, $msg, $headers);

      return true;
   }
}
if(!empty($email) && !empty($subject) && !empty($msg) && !empty($headers)){
   set_message("Check your email for verification code");
}

//Activating User
function activate_user()
{
   if ($_SERVER['REQUEST_METHOD'] == "GET") {

      if (isset($_GET['email'])) {

         echo $email = clean($_GET['email']);

         echo $validation_code = clean($_GET['code']);

         $sql = "SELECT id FROM users WHERE email = '" . escape($_GET['email']) . "' AND validation_code ='" . escape($_GET['code']) . "' ";
         $result = query($sql);
         confirm($result);

         if (row_count($result) == 1) {

            $sql2 = "UPDATE users SET active =1, validation_code = 0 WHERE email ='" . escape($email) . "' AND validation_code ='" . escape($validation_code) . "' ";
            $result2 = query($sql2);
            confirm($result2);

            set_message("<p class='bg-success'>Your account has been activated. Please login </p>");

            redirect("login.php");
         } 
         else {
            set_message("<p class='bg-danger'>Sorry, your account is not activated</p>");
            redirect("login.php");
         }
      }
   }
}


//Validate user login 
function validate_user_login()
{
   $errors = [];

   $min = 3;
   $max = 20;

   if ($_SERVER['REQUEST_METHOD'] == "POST") {

      $email    = clean($_POST['email']);
      $password = clean($_POST['password']);
      $remember = isset($_POST['remember']);

      if (empty($email)) {   
         $errors[] = "Enter Your Enail";
      }

      if (empty($password)) {
         $errors[] = "Enter Your Password";
      }


      if (!empty($errors)) {
         foreach ($errors as $error) {
            echo  validation_errors($error);
         }
      }
      
      else {
         if (login_user($email, $password, $remember)) {
            header("Location: ../newhomepage.php?usermail=".$email);
            
           
         } 
         else {
            echo validation_errors("Your Credenials are not correct");
         }
      }
   }
} 

//loging user
function login_user($email, $password, $remember)
{
   $sql = "SELECT password, id FROM users WHERE email = '" . escape($email) . "' AND active =1";

   $result = query($sql);

   if (row_count($result) == 1) {

      $row = fetch_array($result);

      $db_password = $row['password'];

      if (md5($password) == $db_password) {
         if ($remember == "on") 
         {
            setcookie('email', $email, time() + 86400);
         }

         $_SESSION['email'] = $email;
         return true;
      } else 
      {
         return false;
      }

      return true;
   } else {
      return false;
   }
}

//After logged in
function logged_in()
{
   if (isset($_SESSION['email']) || isset($_COOKIE['email'])) {
   
         redirect("../newhomepage.php");
   
     
   } else {
      return false;
   }
}


