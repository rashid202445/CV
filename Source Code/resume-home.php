<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location:student-login.php");
    exit;
}
?>

<?php

// Include config file
require_once "config.php";
if($_SERVER["REQUEST_METHOD"] == "GET"){
        
    // Get URL parameter
    $username = $_SESSION["username"] ;


// ================================ ============= personal ====================================>==

    // Prepare a select statement
    $sql = "SELECT * FROM personal WHERE username = ?";
    
    if($stmt = $mysqli->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("s", $param_username);

        // Set parameters
        $param_username = $username;

        // Attempt to execute the prepared statement
        if($stmt->execute()){

            $result = $stmt->get_result();

            if($result->num_rows == 1){
            /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
            $row = $result->fetch_array(MYSQLI_ASSOC);

            // Retrieve individual field value
            $first_name     =       $row["firstname"];
            $last_name      =       $row["lastname"];
            $dob            =       $row["dob"] ;
            $address        =       $row["address"] ;
            $city           =       $row["city"] ;
            $state          =       $row["state"] ;
            $zipcode        =       $row["zipcode"] ;
            $email          =       $row["email"] ;
            $phone          =       $row["phone"];
            $profile_img    =       $row["image"];

            }else{
                // URL doesn't contain valid id. Redirect to error page
                header("location: error.php");
                exit();
            }

        }else{
            echo "Oops! Something went wrong. Please try again later.";
        }
        

    }

    // Close statement
    $stmt->close();

// =========================================== close personal ==============================



// ================================ ============= EDUCATION  ====================================>==

    // Prepare a select statement
    $sql = "SELECT * FROM education WHERE username = ?";
    
    if($stmt = $mysqli->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("s", $param_username);

        // Set parameters
        $param_username = $username;

        // Attempt to execute the prepared statement
        if($stmt->execute()){

            $result = $stmt->get_result();

            if($result->num_rows == 1){
            /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
            $row = $result->fetch_array(MYSQLI_ASSOC);

            // Retrieve individual field value
            $school_name            = $row["school_name"] ;         
            $school_marks           = $row["school_marks"] ;
            $college_name           = $row["college_name"] ;
            $college_marks          = $row["college_marks"] ;
            $eng_college_name       = $row["eng_college_name"] ;
            $eng_branch             = $row["eng_branch"] ;
            $eng_marks              = $row["eng_marks"] ;

            }else{
                // URL doesn't contain valid id. Redirect to error page
                header("location: error.php");
                exit();
            }

        }else{
            echo "Oops! Something went wrong. Please try again later.";
        }
        

    }

    // Close statement
    $stmt->close();

// =========================================== close education ==============================



// ================================ ============= SKILLS  ====================================>==

    // Prepare a select statement
    $sql = "SELECT * FROM skills WHERE username = ?";
    
    if($stmt = $mysqli->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("s", $param_username);

        // Set parameters
        $param_username = $username;

        // Attempt to execute the prepared statement
        if($stmt->execute()){

            $result = $stmt->get_result();

            if($result->num_rows == 1){
            /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
            $row = $result->fetch_array(MYSQLI_ASSOC);

            // Retrieve individual field value
            $skill_name      =  $row["skill_name"];
            $skill_level     =  $row["skill_level"];

            }else{
                // URL doesn't contain valid id. Redirect to error page
                header("location: error.php");
                exit();
            }

        }else{
            echo "Oops! Something went wrong. Please try again later.";
        }
        

    }

    // Close statement
    $stmt->close();

// =========================================== close skills ==============================


// ================================ ============= project  ====================================>==

    // Prepare a select statement
    $sql = "SELECT * FROM project WHERE username = ?";
    
    if($stmt = $mysqli->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("s", $param_username);

        // Set parameters
        $param_username = $username;

        // Attempt to execute the prepared statement
        if($stmt->execute()){

            $result = $stmt->get_result();

            if($result->num_rows == 1){
            /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
            $row = $result->fetch_array(MYSQLI_ASSOC);

            // Retrieve individual field value
            $project_title      = $row["project_title"];
            $project_desc       = $row["project_desc"]; 

            }else{
                // URL doesn't contain valid id. Redirect to error page
                header("location: error.php");
                exit();
            }

        }else{
            echo "Oops! Something went wrong. Please try again later.";
        }
        

    }

    // Close statement
    $stmt->close();

// =========================================== close project ==============================


// ================================ ============= internship  ====================================>==

    // Prepare a select statement
    $sql = "SELECT * FROM intership WHERE username = ?";
    
    if($stmt = $mysqli->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("s", $param_username);

        // Set parameters
        $param_username = $username;

        // Attempt to execute the prepared statement
        if($stmt->execute()){

            $result = $stmt->get_result();

            if($result->num_rows == 1){
            /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
            $row = $result->fetch_array(MYSQLI_ASSOC);

            // Retrieve individual field value
            $company_name     = $row["company_name"];
            $start_date       = $row["start_date"];
            $end_date         = $row["end_date"];
            $intern_desc      = $row["intern_desc"]; 

            }else{
                // URL doesn't contain valid id. Redirect to error page
                header("location: error.php");
                exit();
            }

        }else{
            echo "Oops! Something went wrong. Please try again later.";
        }
        

    }

    // Close statement
    $stmt->close();

// =========================================== close project ==============================

    // Close connection
    $mysqli->close();



}else{
    // URL doesn't contain id parameter. Redirect to error page
    header("location: error.php");
    exit();
}




?>

<!-- ==================================== HTML ============================================================== -->

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- link css files -->
    <link rel="stylesheet" type="text/css" href="resume-home.css?<?php echo time(); ?>" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title> Resume Home </title>
  </head>
  <body>
  <div id="bgimg">
  </div>  
  <!------------------------------------ Nav Bar ------------------------------>
  <nav class="navbar navbar-expand-sm navbar-dark ">
            <div class="container">
                 <a class="navbar-brand" href="homepage.php"> CV DEVELOPER </a>
       
                 <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                         aria-expanded="false" aria-label="Toggle navigation"></button>
        
                 <div class="collapse navbar-collapse" id="collapsibleNavId">
                     <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                            <li class="nav-item active">
                                <a class="nav-link" href="resume-home.php"> Resume <span class="sr-only">(current)</span></a>
                            </li>
                    
                            <li class="nav-item">
                                <a class="nav-link" href="details.php">Details</a>
                            </li>

                            <li class="nav-item">
                                    <a class="nav-link" href="logout.php">Log Out</a>
                            </li>
               
                      </ul>
                 </div>
            </div>     
     </nav>

     <!------------------------------------- Nav Bar ---------------------->

<div id="card">
            
            <!-- left-box -->
            <div class=" left-box">
               
                <!-- profile pic -->
                <div class=" profile-img">
                    <img src="img/codercat.jpg">
               </div>
               
               <!-- personal details -->
               <div class="pdetails">
                    <h2>
                        Personal Details 
                    </h2>
                    
                    <div id="nameid" > 
                    <?php echo $first_name ?> 
                    <?php echo $last_name ?>
                    </div>
                    
                    <div id="emailid" class="mt-2" >
                    <h4 > Email </h4>
                        <h5><?php echo $email ?></h5>
                    </div>

                    <div id="phoneid" >
                    <h4> Phone  </h4>
                      <h5><?php echo $phone ?>   </h5>
                    </div>

                    <div id="adressid">
                    <h4>Adress </h4>
                      <h5><?php echo $address ?> </h5>
                    </div>

               </div>
               
            </div>
            
            <!-- right-box -->
            <div class=" right-box">
                
                <div class="details">
                    <h2>
                        Education Details
                    </h2>  
                    
                   <div >
                    <h4> school </h4>
                     <h5>  <?php echo $school_name ?>  </h5>
                     <h5>  <?php  echo $school_marks ?>  </h5>

                   </div>

                  <div>
                    <h4> college </h4>
                     <h5>  <?php echo $college_name ?>  </h5>
                     <h5>  <?php echo $college_marks ?> </h5>  
                  </div>

                    <div>
                        <h4> Engineering</h4>
                         <h5>  <?php echo $eng_college_name  ?>  </h5>
                         <h5>  <?php echo  $eng_branch ?> </h5>
                         <h5>  <?php echo  $eng_marks  ?> </h5>
                    </div>

                </div>

                <div class="line">

                </div>

                <div class="details">
                        <h2>
                            Skills Details
                        </h2>  
                        
                        <div>
                        <h4> Skill name </h4>
                         <h5>  <?php echo $skill_name ?></h5>
                        <h4>skill level</h4>
                         <h5>  <?php echo  $skill_level ?> </h5>
                        </div>
        
                </div>
    
                <div class="line">
    
                </div>

                <div class="details">
                        <h2>
                            Project Details
                        </h2>  
                        
                        <div>
                        <h4> Project name</h4>
                         <h5>  <?php echo  $project_title ?> </h5>
                        </div>
    
                        <div>
                        <h4> Project Description : </h4>
                         <h5>  <?php echo $project_desc ?> </h5>
                        </div>
    
                </div>
    
                <div class="line">
    
                </div>

                <div class="details">
                        <h2>
                            Internship Details
                        </h2>  
                        
                        <div>
                        <h4> Company name</h4>
                             <h5> <?php echo $company_name ?></h5>
                        </div>
    
                        <div class="row" >
                            <div class="col"  >
                                <label id="man" > Start date :</label><label id="dat"> <?php echo $start_date ?></label>
                            </div> 
                            <div class="col" >
                                <label id="man" > End Date </label>    <label id="dat"> <?php echo $end_date ?></label>                            </div>
                        </div>          

                        <div>
                            <h4> Internship Description : </h4>
                             <h5> <?php echo $intern_desc ?> </h5>
                        </div>
    
                </div>
    
                
    
            </div>            
            
</div>
  
    



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>