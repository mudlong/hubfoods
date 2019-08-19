<!Doctype html>
<html>
<head>

<title>register</title>
<h1>Register an Account</h1>
<link rel = "stylesheet" type="text/css" href="reg.css">
</head>
<body>
<?php

$user="root";
$pass='';
$db_name='network';
$db = mysqli_connect('localhost',$user, $pass, $db_name) or die("unable to connect");
if (!$db)
	echo'connnection failed</br>';
	$query = "select * from `ipad`";
               
		$result1 = mysqli_query($db,$query) or die("query failed: ".mysql_error());
		$resultt = "select `username` from `ipad`";
		$options = "";
		while($row2 = mysqli_fetch_array($result1))
		{
			$options=$options."<option>$row2[1]</option>";
		}  
if(isset($_POST ['register']) ){
	session_start();
        $username = $_POST['username'];
        $password = $_POST['password'];
    /* @var $confirmpassword type */
        $confirmpassword = $_POST['confirmpassword'];
		 $email =  $_POST['email'];
         $phone=  $_POST['phone'];
		 $name =  $_POST['name'];
		if($password == $confirmpassword){
			$password = md5($password);
			$sql = "INSERT  INTO ipad(username,name , email, password) 
			VALUES ('$username','$name','$email','$password')";
			if($sql==$options)
                   
			$_session['message'] = "<br>username exits"; 
                        echo 'username already exits';
		
		mysqli_query($db,$sql);
		}
		else
		{
			
			$_session['message'] = "<br>password no match";
			echo "password no match";
		}
		
		
}			
		
		
?>

<form METHOD="post" action="";>
<div>
<input type="text" placeholder="username" name="username" required/>
<input type="email" placeholder="email" name="email" required />
<input type="password" placeholder="password" name="password" autocomplete="new-password" required/>
<input type="password" placeholder="confirmpassword" name="confirmpassword" autocomplete="new-password" required/>
<input type="text" placeholder="name" name="name" required/>
<input type="phone" placeholder="phone" name="phone" required/>
<select>
  <?php echo $options;?>
</select>
<input type="submit" value="register" name="register" class="btn btn-block btn-prmary"/>
</div>
</form>

</body>



</html>