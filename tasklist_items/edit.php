<?php
foreach ($result3 as $res3):

endforeach;
?>
<html>
<head>

<link rel="stylesheet" href="../css/add_edit.css" media="screen" type="text/css" />
  </head>
<body>
<div class="form-style-3">
<fieldset><legend>2-D0 LIST</legend> 
<h3>Old Values</h3>
<label for="field1"><span>Task:</span> <input type="text" name="" value=" <?php echo $res3['todo']; ?>"><br><br></label>
<label for="field2"><span>Description:</span> <input type="text" name="" value=" <?php echo $res3['description']; ?>"><br><br></label>
<label for="field3"><span>Date:</span> <input type="text" name="" value=" <?php echo $res3['date']; ?>"><br><br></label>
<label for="field4"><span>Time:</span> <input type="text" name="" value=" <?php echo $res3['time']; ?>"><br><br></label>
<br>
 <h3>Enter New Values</h3>
 <form method='post'; action='index.php'>
 <label for="field1"><span>Task:</span> <input type="text" name="edtask"><br><br></label>
 <label for="field1"><span>Description:</span> <input type="text" name="edescription"><br><br></label>
 <label for="field1"><span>Date:</span> <input type="date" name="date" ><br><br></label>
 <label for="field1"><span>Time:</span> <input type="time" name="time" ><br><br></label>
 <input type="hidden" name="user_id" value="<?php echo $res3['id']; ?>">
 <label><span>&nbsp;</span><input type="submit" value="Edit"></label>
 <input type="hidden" name='action' value="new_task">
 </form>
 </div>
</body>

</html>
