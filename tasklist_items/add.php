<html>
<head>

  <link rel="stylesheet" href="../css/add_edit.css" media="screen" type="text/css" />
  </head>
<body>
<div class="form-style-3"> 
<fieldset><legend>2-D0 LIST</legend>
<form method = 'post' action='index.php'>
<label for="field1"><span>Task:</span>  <input type='text' name='task'/></label><br><br>
 <label for="field2"><span>Description:</span> <input type='text' name='description'/><br><br>
<label for="field3"><span>Date:</span> <input type="date" name = "datetodo"><br><br>
<label for="field4"><span>Time:</span><input type="time" name="timetodo"><br><br>
<input type="hidden" name="userid" value="<?php echo $_COOKIE['my_id']; ?>">
<input type = 'hidden' name = 'action' value='add'><br>
<label><span>&nbsp;</span> <input type="submit" value="Add Task"/></label>
</form>
</div>
</body>
</html>
