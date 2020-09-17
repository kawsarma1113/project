<!DOCTYPE html>
<html>
<head><title>USER</title>
 <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
   <style>

#demo{
background:red;
width:120px;
height:110px;
color:#ffffff;}
 </style>
</head>
<body>

				
				
				<h1 class="animate__animated animate__bounce">You have succesfully login as USER</h1>

              <button type="button"
onclick="document.getElementById('demo').innerHTML = Date()">
Click me  </button>

<p id="demo"></p>
		<input type="submit" name="submit_button" value="Log Out" onclick="window.location.href='logout.php';">
		
		
		
		 
		
</body>
</html>

