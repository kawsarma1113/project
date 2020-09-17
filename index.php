<?php

 

    include "includes/db_connect.inc.php";
    session_start();
    $uPass = $uName = $message = $usertype = "";
    $u_name_err = $pass_err = "";

 

    if($_SERVER["REQUEST_METHOD"] == "POST"){
    
        if(empty($_POST['u_name'])){
            $u_name_err = "Username cannot be empty!";
        }
        else{
            $uName = mysqli_real_escape_string($conn, $_POST['u_name']);
        }
        if(empty($_POST['u_pass'])){
            $pass_err = "Password cannot be empty!";
        }
        else{
            $uPass = mysqli_real_escape_string($conn, $_POST['u_pass']);
        }
    
        $sqlUserCheck = "SELECT user_id, password,usertype FROM login WHERE user_id = '$uName'";
        
        $result = mysqli_query($conn, $sqlUserCheck);
        
        $rowCount = mysqli_num_rows($result);
    
        if($rowCount < 1){
            if($uName== "" || $uPass==""){
 
            }
            else{
                $message = "User does not exist!";
            }
        }
        else{
            while($row = mysqli_fetch_assoc($result)){
                $uPassInDB = $row['password'];
                $utypeInDB = $row['usertype'];
    
                if($uPass==$uPassInDB && $utypeInDB=="admin"){
                    $_SESSION['user_id'] = $user_id ;
                    header("Location: repo/admin.php");
				}
					else if($uPass==$uPassInDB && $utypeInDB=="user"){
                    $_SESSION['user_id'] = $user_id ;
                    header("Location: repo/user.php");
                }
                else{
                    $message = "Wrong Password!";
                }
            }
        }
    }

 

 

?>

 

<html>
    <head>
        <title>Login</title>

 <script>
function showHint(str) {
  if (str.length == 0) {
    document.getElementById("txtHint").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "repo/gethint.php?q=" + str, true);
    xmlhttp.send();
  }
}
</script>

        <link rel="stylesheet" href="css/login.css">
    
    </head>

 

    <body>
    <div class="header">
        <form action="index.php" name="loginform" onsubmit="return validateForm()" method="post">
            
                <label Class="pName bounce" >ONLINE POLLING SYSTEM</label>
                <label Class="ins">Sign in with your organizational id number.</label>
                    <input type="text" name="u_name" placeholder="username" value="" class="lll" onkeyup="showHint(this.value)"><br>
					<p class="sp">Suggestions: <span id="txtHint"></span></p>
                    <label style="color:red"><?php echo $u_name_err; ?></label>
                    <input type="password" name="u_pass" placeholder="password" value="" class="lll" id="myInput"><br>
					<p class="sp"><input type="checkbox" onclick="myFunction()">Show Password</p>
                    <label style="color:red"><?php echo $pass_err; ?></label>
                    <button type="submit" name="login" class="lbutton">Login</button><br>
                    <span class="lll" style="color:red"><?php echo $message; ?></span><br>
                    
                    
            
        </form>
    </div> 
					
    

							<script>
							function myFunction() {
							  var x = document.getElementById("myInput");
							  if (x.type === "password") {
								x.type = "text";
							  } else {
								x.type = "password";
							  }
							}
							</script>


						

						<script>
						function validateForm() {
						var x = document.forms["loginform"]["u_name"].value;
						var y = document.forms["loginform"]["u_pass"].value;
						if (x == "") {
						alert("username must be filled out");
						return false;
									} else if (y == "") {
						alert("password must be filled out");
						return false;
									} else if (x == "" && y == "") {
						alert("username and password must be filled out");
						return false;
									}
								}
						</script>
						
						


	
	
    </body>
</html>