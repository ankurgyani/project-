<?php
require('../model/db_config.php');
require('../model/db.php');
$action = filter_input(INPUT_POST, "action");
if($action == NULL)
{
  $action = "show_login_page";
}
if($action == "show_login_page")
{
  include('./index.php');
}else if($action == 'test_user')
{
  $username = $_POST['email'];
  $password = $_POST['password'];
  $suc = isUserValid($username,$password);
  if($suc == true)
  {
    $result = finditems($_COOKIE['my_id']);
   $result2 = done_Items($_COOKIE['my_id']);
    include('list_item.php');
  }else{
    header("Location: ../error/badinfo.php");
  }
}else if ($action == 'register')
{

       $fname = filter_input(INPUT_POST, 'firstname');
       $lname = filter_input(INPUT_POST, 'lastname');
       $contact = filter_input(INPUT_POST, 'contact');
       $email = filter_input(INPUT_POST, 'mailid');
       $username = filter_input(INPUT_POST, 'user');
       $password = filter_input(INPUT_POST, 'password');
       $birth = filter_input(INPUT_POST, 'dob');
       $gender = filter_input(INPUT_POST, 'gender');
       $exit = userSignup($fname,$lname,$contact,$email,$username,$password,$birth,$gender);
       if($exit == true)
       {
     
        header("Location: ../error/userexist.php");
   }else{
       header("Location: ../index.php");

   }
  }



?>
