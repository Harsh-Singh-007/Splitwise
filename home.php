<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>

	<div class="center">

    <div class = "scroll" style="text-align: center; background: #114856;">
    <img src="b.png" alt="">
  </div>
      
      <h1>Login</h1>
      
      <form method="post" action="login.php">
        
        <div class="txt_field">
          
          <input type="email" name= "email" required>
          
          <span></span>
          
          <label>Email</label>
        
        </div>
        
        <div class="txt_field">
          
          <input type="password" name = "pass" required>
        
          <span></span>
        
          <label>Password</label>
        
        </div>
        
        <input type="submit" value="Login" name = "submit">
        
        <div class="signup_link">
        
          Haven't Created Account ? <a href="signup.php">Signup</a>
        </div>
      </form>
    </div>
</body>
</html>