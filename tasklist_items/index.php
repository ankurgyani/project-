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
  include('./login.php');
}else if($action == 'test_user')
{
  $username = $_POST['email'];
  $password = $_POST['password'];
  $suc = isUserValid($username,$password);
  if($suc == true)
  {
     $id = $_SESSION['id'];
    $result = finditems($id);
   $result2 = done_Items($id);
    include('list_item.php');
  }else{
    header("Location: ../exception/incorrect.php");
  }
}else if ($action == 'register')
{
// echo " we want to create a new account";
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
      // echo "already exist";
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
         $id = $_SESSION['id'];
      $result = finditems($id);
      $result2 = done_Items($id);
      include('list_item.php');
      }

}

else if($action == 'edit'){
     $editid = filter_input(INPUT_POST, 'user_id');
  
     $result3 = fetchTask($editid);
     include('edit.php');
   
}
else if ($action == 'delete'){
    
     $taskid = filter_input(INPUT_POST, 'user_id');
    
     $task = delete($taskid);
     if($task == true){
       $id = $_SESSION['id'];
     $result = finditems($id);
     $result2 = done_Items($id);
     include('list_item.php');
   
     }
     }
else if ($action == 'new_task'){
     $etask = filter_input(INPUT_POST, 'edtask');
     $edescription = filter_input(INPUT_POST, 'edescription');
     $edate = filter_input(INPUT_POST, 'date');
     $etime = filter_input(INPUT_POST, 'time');
     $eid = filter_input(INPUT_POST, 'user_id');
    // echo $eid;
     $editvalue = edit($etask,$edescription,$etime,$edate,$eid);
     if($editvalue == true){
       $id = $_SESSION['id'];
     $result = finditems($id);
     $result2 = done_Items($id);
     include('list_item.php');
     }

}
else if ($action == 'complete_task'){
      $id = filter_input(INPUT_POST, 'user_id');
      $status = "complete";
      $statusupdate = checked($status,$id);
      if($statusupdate == true){
         $id = $_SESSION['id'];
         $result = finditems($id);
         $result2 = done_Items($id);
	 include('list_item.php');
     }
     }
?>
