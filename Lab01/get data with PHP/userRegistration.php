<!--file simplePHP.php -->

<HTML XMLns="http://www.w3.org/1999/xHTML"> 
  <head> 
    <title>A Simple Example</title> 
  </head> 
  <body>
  <H1>Fetching data with PHP</H1>

  <form>
	    <label>User Name:  <input type="text" name="namefield" placeholder="User Name" > </label>

 	    <label><br>Password: <input type="text" name="pwdfield" placeholder="Password"> <br><br> </label>

		<label for="gender">
			Gender <input type="radio" name="genfield" value="Male" >Male <input type="radio" name="genfield" Value="Female"> Female
		</label><br><br>

		<label for="age">
			<input type="number" name="agefield" placeholder="age" >
		</label><br><br>

		<label for="email">
			<input type="email" name="emailfield" id="" placeholder="lab1@gmail.com">
		</label> <br><br>

		<input type="submit" value="Submit" />
  </form>
  
  <p> The result data will refresh current page.</p>
  </body> 

<?php 
	// get the inputs data passed from client
	if(isset($_GET['namefield']) && isset($_GET['pwdfield']) && isset($_GET['genfield']) && isset($_GET['agefield']) && isset($_GET['emailfield']))
	{
		$name = $_GET['namefield'];
		$pwd = $_GET['pwdfield'];
		$gen =  $_GET['genfield'];
		$age = $_GET['agefield'];
		$email = $_GET['emailfield'];
		// sleep for 10 seconds to slow server response down
		// sleep(10);
        //setting the default timezone using the default function of php
		date_default_timezone_set('America/New_York');

		// write back the password and date and time concatenated to end of the name
		//storing the whole long msg in a variable 
		$msg = "Registration Success "."</br>". "Name: ". $name."</br>"."Password: ".$pwd. "</br>"."Gender: ".
		$gen . "</br>". "Age: ". $age. "</br>".  "Email: ". $email. "</br>". "Registration Time: ".  date('D M d H:i:s T Y');
		

		//printing the above mentioned variable 
		ECHO $msg;


		// ECHO $name." : ".$pwd. "</br> ". date('D M d H:i:s T Y');//displaying in a new line
		/* I ccan to this in a different line:
			ECHO date('D M d H:i:s T Y'); 
		 but choose to append in a same line just to reduce the lines of code and time complexity */
	}
?>

</HTML>