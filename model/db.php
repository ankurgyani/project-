<?php
   
  function addlist($user_id,$description,$task,$date,$time,$status){
        global $db;
	$query = 'INSERT INTO todo_items(todo, user_id, status, description, date, time) VALUES (:task, :userid, :status, :todo_text, :date, :time)';
	$statement = $db->prepare($query);
	$statement->bindValue(':userid',$user_id);
	$statement->bindValue(':todo_text',$description);
	$statement->bindValue(':task',$task);
	$statement->bindValue(':date',$date);
	$statement->bindValue(':time',$time);
	$statement->bindValue(':status',$status);
	$statement->execute();
	$statement->closeCursor();
	return true;
   }

   function checked($status,$id){
        global $db;
	$query = 'UPDATE todo_items SET status = :status WHERE id = :id';
	$statement = $db->prepare($query);
	$statement->bindValue(':status',$status);
	$statement->bindValue(':id',$id);
	$statement->execute();
	$statement->closeCursor();
	return true;

   }

   function delete($taskid){
     global $db;
     $query = 'DELETE FROM todo_items WHERE id = :task';
     $statement = $db->prepare($query);
     $statement->bindValue(':task',$taskid);
     $statement->execute();
     $statement->closeCursor();
     return true;
   }
   function finditems($user_id){
     global $db;
     $query = 'SELECT * from todo_items WHERE user_id= :userid AND status = :status';
     $statement = $db->prepare($query);
     $statement->bindValue(':userid',$user_id);
     $statement->bindValue(':status','incomplete');
     $statement->execute();
     $result= $statement->fetchAll();
     $statement->closeCursor();
     return $result;
   }
   function done_Items($user_id){
        global $db;
	$query = 'SELECT * from todo_items WHERE user_id= :userid AND status = :status';
	$statement = $db->prepare($query);
	$statement->bindValue(':userid',$user_id);
	$statement->bindValue(':status','complete');
	$statement->execute();
	$result= $statement->fetchAll();
	$statement->closeCursor();
	return $result;
  }
  function edit($etask,$edescription,$edate,$etime,$eid){
        global $db;
	$query = 'UPDATE todo_items SET todo = :etask, description = :edescription, date = :etime, time = :edate WHERE id = :eid';
        $statement = $db->prepare($query);
        $statement->bindValue(':etask',$etask);
        $statement->bindValue(':eid',$eid);
	$statement->bindValue(':edescription',$edescription);
	$statement->bindValue(':edate',$edate);
	$statement->bindValue(':etime',$etime);
        $statement->execute();
        $statement->closeCursor();
        return true;

  }
  function fetchTask($editid){
        global $db;
	$query = 'SELECT * FROM todo_items WHERE id = :eid';
	$statement = $db->prepare($query);
	$statement->bindValue(':eid',$editid);
	$statement->execute();
	$result= $statement->fetchAll();
	$statement->closeCursor();
	return $result;
  }

   function userSignup($fname,$lname,$contact,$email,$username,$password,$birth,$gender){
   global $db;
   $query = 'SELECT * FROM user_profile WHERE username = :uname';
   $statement = $db->prepare($query);
//   $statement->bindValue(':fname',$fname);
 //  $statement->bindValue(':lname',$lname);
  // $statement->bindValue(':cont',$contact);
 //  $statement->bindValue(':emailid',$email);
   $statement->bindValue(':uname',$username);
 //  $statement->bindValue(':pass',$password);
   $statement->execute();
   $result = $statement->fetchAll();
   $statement->closeCursor();
   $count= $statement->rowCount();
   if($count > 0){
   return true;
   }
   else{
   $query = 'INSERT into user_profile(first_name,last_name,contact_no,email,username,password,birth,gender)
             VALUES
	     (:fname,:lname,:cont,:emailid,:uname,:pass,:birth,:gender)';
   $statement = $db->prepare($query);
   $statement->bindValue(':fname',$fname);
   $statement->bindValue(':lname',$lname);
   $statement->bindValue(':cont',$contact);
   $statement->bindValue(':emailid',$email);
   $statement->bindValue(':uname',$username);
   $statement->bindValue(':pass',$password);
   $statement->bindValue(':birth',$birth);
   $statement->bindValue(':gender',$gender);
   $statement->execute();
   $statement->closeCursor();
   return false;
   }
   
   }

   function isUserValid($username,$password){
     global $db;
     $query = 'SELECT * FROM user_profile WHERE email = :name AND 
     password = :pass';
     $statement = $db->prepare($query);
     $statement->bindValue(':name',$username);
     $statement->bindValue(':pass',$password);
     $statement->execute();
     $result= $statement->fetchAll();
     $statement->closeCursor();

     $count = $statement->rowCount();
     if($count == 1){
       setcookie('login',$username);
       setcookie('my_id',$result[0]['id']);
       setcookie('my_name',$result[1]['first_name']);
       setcookie('islogged',true);
       return true;
     }else{
       unset($_COOKIE['login']);
       setcookie('login',false);
       setcookie('islogged',false);
       setcookie('id',false);
       return false;
     }

   }

?>
