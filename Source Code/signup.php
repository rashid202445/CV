
<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // store result
                $stmt->store_result();
                
                if($stmt->num_rows == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        $stmt->close();
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
         
        if($stmt = $mysqli->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("ss", $param_username, $param_password);
            
            
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            
            session_start();
                            
            // Store data in session variables
            $_SESSION["loggedin"] = true;
            $_SESSION["id"] = $id;
            $_SESSION["username"] = $username;

            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Redirect to login page
                header("location:details.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        $stmt->close();

    

        $sql = "INSERT INTO personal (username) VALUES (?)";

        if($stmt = $mysqli->prepare($sql)){
         
            $stmt->bind_param("s", $param_username);
            $param_username = $username;
            
            if($stmt->execute()){
                // Redirect to login page
                echo "success fully put into personal";
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
        // Close statement
        $stmt->close();

        
        $sql = "INSERT INTO education (username) VALUES (?)";

        if($stmt = $mysqli->prepare($sql)){
         
            $stmt->bind_param("s", $param_username);
            $param_username = $username;
            
            if($stmt->execute()){
                // Redirect to login page
                echo "success fully put into personal";
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
        // Close statement
        $stmt->close();

        $sql = "INSERT INTO skills (username) VALUES (?)";

        if($stmt = $mysqli->prepare($sql)){
         
            $stmt->bind_param("s", $param_username);
            $param_username = $username;
            
            if($stmt->execute()){
                // Redirect to login page
                echo "success fully put into personal";
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
        // Close statement
        $stmt->close();

        $sql = "INSERT INTO project (username) VALUES (?)";

        if($stmt = $mysqli->prepare($sql)){
         
            $stmt->bind_param("s", $param_username);
            $param_username = $username;
            
            if($stmt->execute()){
                // Redirect to login page
                echo "success fully put into personal";
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
        // Close statement
        $stmt->close();

        $sql = "INSERT INTO intership (username) VALUES (?)";

        if($stmt = $mysqli->prepare($sql)){
         
            $stmt->bind_param("s", $param_username);
            $param_username = $username;
            
            if($stmt->execute()){
                // Redirect to login page
                echo "success fully put into personal";
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
        // Close statement
        $stmt->close();

    }
    
    // Close connection
    $mysqli->close();
}
?>

<!DOCTYPE html>
<html>
<head>
	<title> Student Sign Up</title>
	<link rel="stylesheet" type="text/css" href="signup.css?<?php echo time(); ?>" />
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
</head>
<body>
	<img class="wave" src="img/wave2.svg">
	<div class="container">
			<div class="img">
				<h1 class="welcome">welcome</h1>
				<img src="img/welcome.svg">
			</div> 
		
		<div class="login-content">
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" >
						<img src="img/profile.svg">
						<h2 class="title">Sign Up</h2>
			
			   
			   		<div class="input-div one">
						<div class="i">
							<i class="fas fa-user"></i>
						</div>
					
				  <div class="div form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?> ">
							<h5>Username</h5>
							<input type="text" class="input" name="username" value="<?php echo $username; ?>" >
							<span class="help-block"><?php echo $username_err; ?></span>
				   </div>
		</div>
				   
				<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?> ">
           		    	<h5>Password</h5>
						   <input type="password" class="input" name="password" value="<?php echo $password; ?>" >
						   <span class="help-block"><?php echo $password_err; ?></span>
            	   </div>
				</div>

				<div class="input-div pass">
					<div class="i"> 
						 <i class="fas fa-lock"></i>
					</div>
					<div class="div form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
						 <h5>Re-Type Password</h5>
						 <input type="password" class="input" name="confirm_password" value="<?php echo $confirm_password; ?>" >
						 <span class="help-block"><?php echo $confirm_password_err; ?></span>
				 </div>
			  </div>
				
				<p> Alredy have an account <a href="student-login.php"> Login here</a> </p>
            	<div class="form-group">
					<input type="submit" class="btn" value="submit" >
				</div>
            </form>
        </div>
    </div>	
	
<!-- Scripting  -->

<script>
	const inputs = document.querySelectorAll(".input");


	function addcl(){
	let parent = this.parentNode.parentNode;
	parent.classList.add("focus");
	}

	function remcl(){
	let parent = this.parentNode.parentNode;
		if(this.value == ""){
			parent.classList.remove("focus");
		}
	}	


	inputs.forEach(input => {
	input.addEventListener("focus", addcl);
	input.addEventListener("blur", remcl);
	});

</script>


</body>
</html>