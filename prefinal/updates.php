<?php
include 'functions.php';
$results = getbyid($_GET['id'])

 ?>

 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
     <a href="update.php"><<< Back</a><br>
     <h1>UPDATE ID #<?php echo $results->id ?></h1>
     <form method="POST" action="process.php">
       <input type="hidden" name="id" value="<?php echo $results->id ?>">
       <input type="text" name="gname" placeholder="Given Name" value="<?php echo $results->given ?>"><br>
       <input type="text" name="mname" placeholder="Middle Name" value="<?php echo $results->middle ?>"><br>
       <input type="text" name="lname" placeholder="Last Name" value="<?php echo  $results->last ?>"><br>
       <input type="text" name="nick" placeholder="Nick Name" value="<?php echo  $results->nick ?>"><br>
       <select class="" name="sex">
         <option><?php echo  $results->sex ?></option>
         <option value="Male">Male</option>
         <option value="Female">Female</option>
       </select>
       <select class="" name="stat">
         <option ><?php echo  $results->status ?></option>
         <option value="Single">Single</option>
         <option value="Married">Married</option>
         <option value="Divorced">Divorced</option>
         <option value="Widowed">Widowed</option>
       </select><br>
       <input type="text" name="age" value="<?php echo  $results->age ?>"><br>
       <input type="text" name="add" value="<?php echo  $results->address ?>"><br>
       <input type="text" name="sch" placeholder="School" value="<?php echo  $results->school ?>"><br>
       <button type="submit" name="update">Submt</button>
   </body>
 </html>
