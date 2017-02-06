
 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
     <a href="index.php"><<< Back</a><br>
     <h1>INSERT DATA</h1>
     <form method="POST" action="process.php">
       <input type="text" name="gname" placeholder="Given Name"><br>
       <input type="text" name="mname" placeholder="Middle Name"><br>
       <input type="text" name="lname" placeholder="Last Name"><br>
       <input type="text" name="nick" placeholder="Nick Name"><br>
       <select class="" name="sex">
         <option value="Male">Male</option>
         <option value="Female">Female</option>
       </select>
       <select class="" name="stat">
         <option value="Single">Single</option>
         <option value="Married">Married</option>
         <option value="Divorced">Divorced</option>
         <option value="Widowed">Widowed</option>
       </select><br>
       <input type="text" name="age" placeholder="Age"><br>
       <input type="text" name="add" placeholder="Address"><br>
       <input type="text" name="sch" placeholder="School"><br>

       <button type="submit" name="submit">Submt</button>

   </body>
 </html>
