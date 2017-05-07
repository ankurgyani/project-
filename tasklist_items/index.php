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
    header("Location: ../exception/incorrect.php");
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
     
        header("Location: ../exception/existinguser.php");
   }else{
       header("Location: ../login.php");

   }
  }
  else if ($action == 'add')
{
 $user_id = filter_input(INPUT_POST, 'userid',FILTER_VALIDATE_INT);
 $task = filter_input(INPUT_POST, 'task');
 $description = filter_input(INPUT_POST, 'description');
 $date = filter_input(INPUT_POST, 'datetodo');
 $time = filter_input(INPUT_POST, 'timetodo');
 $status = "incomplete";
 $addtask = addlist($user_id,$description,$task,$date,$time,$status);
      if($addtask == true){
      $result = finditems($_COOKIE['my_id']);
      $result2 = done_Items($_COOKIE['my_id']);
      include('list_item.php');
      }

}

else if($action == 'edit'){
     $editid = filter_input(INPUT_POST, 'user_id');
  
     $result3 = fetchTask($editid);
     include('edit.php');
   }




?>
