<html>
<head>

  <link rel="stylesheet" href="../css/list_items.css" media="screen" type="text/css" />
</style>
</head>
  <body>
  <div class="welcome">
 <h1> To do list system</h1>
  <strong> <p> Welcome, <?php $fname = $_SESSION['first_name']; echo $fname;?> <?php $lname = $_SESSION['last_name']; echo $lname;?></p></strong>
  </div>
  <h2><strong>2do!!</strong></h2><br>
  <form class='bg' method = 'post' action='add.php'>
  <input type="submit" value="+"/>
    </form>
<br>  
       <table>
       <tr>
      <th style="text-align: center;">Task</th>
      <th style="text-align: center;">Description</th>
      <th style="text-align: center;">Date</th>
      <th style="text-align: center;">Time</th>
      <th>&nbsp;</th>
      <th>&nbsp;</th>
      <th>&nbsp;</th>
      </tr>
        <?php foreach($result as $res):?>
      <tr>
        <td style="text-align: center;"> <?php echo $res['todo']; ?> </td>
	<td style="text-align: center;"> <?php echo $res['description']; ?> </td>
        <td style="text-align: center;"> <?php echo $res['date']; ?>  </td>
	<td style="text-align: center;"> <?php echo $res['time']; ?> </td>

	<td><form style="margin-top: 15px;" action="index.php" method="post">
            <input type="hidden" name="user_id" value="<?php echo $res['id']; ?>">
	    <input style="text-align: center;" type="submit" value="Delete">
	    <input type="hidden" name='action' value="delete">
            </form>
        </td>
	<td><form style="margin-top: 15px;" action="index.php" method="post">
	    <input type="hidden" name="user_id" value="<?php echo $res['id']; ?>">
	    <input type="submit" style="text-align: center;" value="Completed task">
	    <input type="hidden" name='action' value="complete_task">
	    </form>
        </td>
        <td>
	   <form style="margin-top: 15px;" action="index.php" method= "post">
	   <input type="hidden" name= "user_id" value="<?php echo $res['id']; ?>">
	   <input type="submit" style="text-align: center;" value = "Edit">
	   <input type="hidden" name='action' value="edit">
	   </form>
	</td>
      </tr>  
	<?php endforeach;?>
      
    </table>
      
 <h3><strong>Done Tasks</strong></h3>
    <table>
           <tr>
	   <th style="text-align: center;">Task</th>
	   <th style="text-align: center;">Description</th>
	   <th style="text-align: center;">Date</th>
	   <th style="text-align: center;">Time</th>
	   <th>&nbsp;</th>
	   </tr>
	   <?php foreach($result2 as $res2):?>
	   <tr>
	   <td style="text-align: center;"> <?php echo $res2['todo']; ?>  </td>
	   <td style="text-align: center;"> <?php echo $res2['description']; ?>  </td>
	   <td style="text-align: center;"> <?php echo $res2['date']; ?>  </td>
           <td style="text-align: center;"> <?php echo $res2['time']; ?>  </td>
           <td><form style="margin-top: 15px;" action="index.php" method="post">
               <input type="hidden" name="user_id" value="<?php echo $res2['id']; ?>">
               <input type="submit" value="Delete">
	       <input type="hidden" name='action' value="delete">
	       </form>
	  </td>
          </tr>																									         <?php endforeach;?>
    </table>

  </body>
</html>
