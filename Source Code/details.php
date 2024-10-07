<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<?php

// Include config file
require_once "config.php";

// ================================================ DEFINE VARIABLES =============================================
// Define variables and initialize with empty values
$first_name = $last_name = $dob = $address = $city = $state = $zipcode = $email = $phone = $profile_img= "";
$first_name_err = $last_name_err = $address_err = $city_err = $state_err = $zipcode_err = $email_err = "";
$school_name =$school_marks =$college_name =$college_marks =$eng_college_name =$eng_branch =$eng_marks = "";
$school_name_err =$school_marks_err =$college_name_err =$college_marks_err =$eng_college_name_err =$eng_branch_err =$eng_marks_err = "";
$skill_name = $skill_level = "" ;
$skill_name_err = "" ;
$project_title = $project_desc = "" ;
$project_title_err = "" ;
$company_name = $start_date = $end_date = $intern_desc = "" ;
$company_name_err = "" ;
$username = " "  ;

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $username = $_SESSION["username"] ;
// =============================================== VALIDATE personal =====================================================

    // Validate first name
    $input_fname = trim($_POST["first_name"]);
    if(empty($input_fname)){
        $first_name_err = "Please enter first  name.";
    } else{
        $first_name = $input_fname;
    }

    // validate last name
    $input_lname = trim($_POST["last_name"]);
    if(empty($input_lname)){
        $last_name_err = "Please enter last name.";
    } else{
        $last_name = $input_fname;
    }

    // validate last dob
    $input_dob = trim($_POST["dob"]);
    $dob = $input_dob;
 
    // Validate address
    $input_address = trim($_POST["address"]);
    if(empty($input_address)){
        $address_err = "Please enter an address.";     
    } else{
        $address = $input_address;
    }

    // Validate city
    $input_city = trim($_POST["city"]);
    if(empty($input_city)){
        $city_err = "Please enter city.";     
    } else{
        $city = $input_city;
    }

    // Validate state
    $input_state = trim($_POST["state"]);
    if(empty($input_state)){
        $state_err = "Please enter state.";     
    } else{
        $state = $input_state;
    }
    

    // Validate zipcode
    $input_zipcode = trim($_POST["zipcode"]);
    if(empty($input_zipocde)){
        $zipcode_err = "Please enter the zipcode.";     
    } else{
        $zipcode = $input_zipcode;
    }

    // Validate email
    $input_email = trim($_POST["email"]);
    if(empty($input_email)){
        $email_err = "Please enter the valid email adress.";     
    } else{
        $email = $input_email;
    }

    // Validate phone
    $input_phone = trim($_POST["phone"]);
    $salary = $input_phone;

    // Validate image
    $input_image = trim($_POST["profile_img"]);
    $profile_img = $input_image;

// =========================================insert personal

  if(  empty($first_name_err) && empty($last_name_err) && empty($address_err)  && empty($city_err) && empty($state_err) && empty($email_err) ){

    // Prepare an insert statement
    $sql = "UPDATE personal SET  firstname= ? , lastname= ? ,dob = ? ,address =? ,city = ? ,state = ? ,zipcode = ? ,email = ? ,phone = ? ,image = ?  WHERE username = ? ";
 
    if($stmt = $mysqli->prepare($sql)){
    // Bind variables to the prepared statement as parameters
    $stmt->bind_param("sssssssssss", $param_first_name, $param_last_name,$param_dob,$param_address,$param_city,$param_state,$param_zipcode,$param_email,$param_phone,$param_profile_img ,$param_username);
    
    // Set parameters
    $param_first_name = $first_name ;
    $param_last_name = $last_name ;
    $param_dob = $dob ;
    $param_address = $address ;
    $param_city = $city ;
    $param_state = $state ;
    $param_zipcode = $zipcode ;
    $param_email = $email ;
    $param_phone= $phone ;
    $param_profile_img = $profile_img  ;
    $param_username = $username ;
    
    // Attempt to execute the prepared statement
    if($stmt->execute()){
        // Records created successfully
        echo "Records created successfully";
    } else{
        echo "Something went wrong. Please try again later.";
        }
    }
    
    // Close statement
    $stmt->close();
    
    }

// =============================================== VALIDATE EDUCATION ==================================================
    // Validate school name
    $input_school_name = trim($_POST["school_name"]);
    if(empty($input_school_name)){
     $school_name_err = "Please enter the valid email adress.";     
    } else{
     $school_name = $input_school_name;
    }

    // Validate phone
    $input_school_marks = trim($_POST["school_marks"]);
    $school_marks = $input_school_marks;

    // Validate phone
    $input_college_name = trim($_POST["college_name"]);
    $college_name = $input_college_name; 


    // Validate phone
    $input_college_marks = trim($_POST["college_marks"]);
    $college_name = $input_college_name; 

    // Validate school name
    $input_eng_college_name = trim($_POST["eng_college_name"]);
    if(empty($input_eng_college_name)){
        $eng_college_name_err = "Please enter ";     
    } else{
        $eng_college_name = $input_eng_college_name;
    }

    // Validate phone
    $input_eng_branch = trim($_POST["eng_branch"]);
    $eng_branch = $input_eng_branch;

    
    // Validate phone
    $input_eng_marks = trim($_POST["eng_marks"]);
    $eng_marks = $input_eng_marks;



// ==================================insert education

    if(  empty($school_name_err) && empty($eng_college_name_err)  ){

    // Prepare an insert statement
    $sql = "UPDATE education SET school_name = ?, school_marks = ?,college_name = ?,college_marks = ? ,eng_college_name = ?,eng_branch = ?,eng_marks = ?  WHERE  username = ? ";
    
    if($stmt = $mysqli->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("sisissis", $param_school_name,$param_school_marks ,$param_college_name,$param_college_marks,$param_eng_college_name,$param_eng_branch,$param_eng_marks,$param_username);
        
        // Set parameters
        $param_school_name          =    $school_name ;       
        $param_school_marks         =    $school_marks;
        $param_college_name         =    $college_name ;
        $param_college_marks        =    $college_marks ;
        $param_eng_college_name     =    $eng_college_name ; 
        $param_eng_branch           =    $eng_branch ;
        $param_eng_marks            =    $eng_marks;
        
        
    // Attempt to execute the prepared statement
    if($stmt->execute()){
        // Records created successfully
        echo "Records created successfully";
        } else{
        echo "Something went wrong. Please try again later.";
        }
    
    }

    // Close statement
    $stmt->close(); 
    }

// =============================================== VALIDATE skill  ==================================================
    // Validate skill name
    $input_skill_name = trim($_POST["skill_name"]);
    if(empty($input_skill_name)){
        $skill_name_err = "Please enter the valid email adress.";     
    } else{
        $skill_name = $input_skill_name;
    }

    // Validate phone
    $input_skill_level = trim($_POST["skill_level"]);
    $skill_level = $input_skill_name;

// ==============================insert skills 

    if(  empty($skill_name_err)  ){

    // Prepare an insert statement
    $sql = "UPDATE skills SET skill_name = ?, skill_level = ?  WHERE username = ?";
    
    if($stmt = $mysqli->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("sis", $param_skill_name,$param_skill_level,$param_username );
        
        // Set parameters
        $param_skill_name  = $skill_name;
        $param_skill_level = $skill_level;
        
    // Attempt to execute the prepared statement
    if($stmt->execute()){
        // Records created successfully
        echo "Records created successfully";
        } else{
        echo "Something went wrong. Please try again later.";
        }
    
    }
    
    // Close statement
    $stmt->close(); 
    }   

// =============================================== VALIDATE project  ==================================================
    // Validate project name
    $input_project_title = trim($_POST["project_title"]);
    if(empty($input_project_title)){
        $project_title_err = "Please enter the valid email adress.";     
    } else{
        $project_title = $input_project_title;
    }

    // Validate phone
    $input_project_desc = trim($_POST["project_desc"]);
    $project_desc = $input_project_desc;

// ==============================insert project 

    if(  empty($project_title_err)  ){

    // Prepare an insert statement
    $sql = "UPDATE project SET project_title = ? , project_desc = ?  WHERE username = ?";
 
     if($stmt = $mysqli->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("sss", $param_project_title ,$param_project_desc ,$param_username );
        
        // Set parameters
        $param_project_title = $project_title ;
        $param_project_desc  = $project_desc ;    
    if($stmt->execute()){
        // Records created successfully
        echo "Records created successfully";
        } else{
        echo "Something went wrong. Please try again later.";
        }
    
    }
    
    // Close statement
    $stmt->close(); 
    }   

// =============================================== VALIDATE internship  ==================================================
    // Validate company name
    $input_company_name = trim($_POST["company_name"]);
    if(empty($input_company_name)){
        $company_name_err = "Please enter the valid email adress.";     
    } else{
        $company_name = $input_company_name;
    }

    // Validate satrt date
    $input_start_date = trim($_POST["start_date"]);
    $start_date = $input_start_date;

   // Validate end date
   $input_end_date = trim($_POST["end_date"]);
   $end_date = $input_end_date;

    // Validate phone
    $input_intern_desc = trim($_POST["intern_desc"]);
    $intern_desc = $input_intern_desc;

// ==============================insert instership

    if(  empty($company_name_err)  ){

    
    // Prepare an insert statement
    $sql = "UPDATE intership SET company_name = ?, start_date = ? ,end_date = ?,intern_desc = ?  WHERE username = ?";
    
    if($stmt = $mysqli->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("sssss", $param_company_name ,$param_start_date,$param_end_date,$param_intern_desc,$param_username );
        
        // Set parameters
        $param_company_name           = $company_name ;
        $param_start_date             = $start_date ;
        $param_end_date               = $end_date ;
        $param_intern_desc            = $intern_desc ;
        
        
    
        if($stmt->execute()){
        // Records created successfully
        echo "Records created successfully";
        } else{
        echo "Something went wrong. Please try again later.";
        }
    
    }
    
    // Close statement
    $stmt->close(); 
    }   

 // Close connection
 $mysqli->close(); 
} else{
    // Check existence of id parameter before processing further
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

}


?>


<!-- ============================= HTML ======================================= -->

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- css link --> 
    <link rel="stylesheet" type="text/css" href="details.css?<?php echo time(); ?>" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title> Resume Details </title>
  </head>
  
  <!--====================================== ==========BODY=========== ================================================  -->
<body>
<div id="bgimg">
</div>  
    <!------------------------- Nav Bar ------------------------------>
  <nav class="navbar navbar-expand-sm navbar-dark ">
        <div class="container">
             <a class="navbar-brand" href="homepage.php"> CV DEVELOPER </a>
   
             <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                     aria-expanded="false" aria-label="Toggle navigation"></button>
    
             <div class="collapse navbar-collapse" id="collapsibleNavId">
                 <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        <li class="nav-item ">
                            <a class="nav-link" href="resume-home.php"> Resume </a>
                        </li>
                
                        <li class="nav-item active">
                            <a class="nav-link" href="details.php">Details</a>
                        </li>

                        <li class="nav-item">
                                <a class="nav-link" href="logout.php">Log Out</a>
                        </li>
           
                  </ul>
             </div>
        </div>     
 </nav>

 <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">     
<!-------------------------------------------- personal info starts ----------------------------------- -->
    <div id="card1">
        <!-- left-box -->
        <div class=" left-box1">
            <div class="personal">
                <img src="img/personal_info.svg" >
            </div>
            <div class="container">
                <h3> personla Info </h3> 
                <p style="text-justify: auto;"> 
                    This section is about personal info 
                    this section is is helpful for contacting you fill the info correctly 
                    first name,last name,email id,and other fields has to be compulsory filled.
                </p> 
            </div>
            
        </div>
        <!-- right-box -->
        <div class=" right-box1">
            
                    <div class=" form-group heading">
                        <h2>Personal Info </h2>
                    </div>

                    <div class="form-group">
                            <div class="form-row">

                                    <div class="col <?php echo (!empty($first_name_err)) ? 'has-error' : ''; ?>">
                                          <label for="text">First Name</label>
                                          <input type="text" class="form-control" placeholder="First name" name="first_name" required value="<?php echo $first_name; ?>">
                                          <span class="help-block"><?php echo $first_name_err;?></span>
                                    </div>
                                  
                                    <div class="col <?php echo (!empty($last_name_err)) ? 'has-error' : ''; ?> ">
                                        <label for="text">Last Name</label>
                                        <input type="text" class="form-control" placeholder="Last name" name="last_name" required value="<?php echo $last_name; ?>">
                                        <span class="help-block"><?php echo $last_name_err;?></span>
                                    </div>
        
                            </div>
                                
                    </div>
                    
                    
                    <div class="form-group">
                            <div class="form-row">

                                    <div class="col col-lg-5 col-md-5  ">
                                          <label for="date">Date Of Birth</label>
                                          <input type="date" class="form-control " name="dob"   value="<?php echo $dob; ?>"  >
                                           
                                    </div>
                            </div>
                                
                    </div> 

                    <div class="form-group <?php echo (!empty($address_err)) ? 'has-error' : ''; ?> ">
                          <label for="inputAddress">Address</label>
                          <input type="text" class="form-control" id="inputAddress" placeholder="#123 Main Street" name="address"  required value="<?php echo $address; ?>">
                           <span class="help-block"><?php echo $address_err;?></span>
                    </div>
         
                    <div class="form-row">
                          <div class="form-group col-md-5 <?php echo (!empty($city_err)) ? 'has-error' : ''; ?> ">
                                <label for="inputCity">City</label>
                                <input type="text" class="form-control" id="inputCity" placeholder="City" name="city" required  value="<?php echo $city; ?>">
                                 <span class="help-block"><?php echo $city_err;?></span>
                          </div>
                          
                          <div class="form-group col-md-5 <?php echo (!empty($state_err)) ? 'has-error' : ''; ?> ">
                                <label for="inputState">State/Province</label>
                                <input type="text" class="form-control" id="inputState" placeholder="State" name="state" required value="<?php echo $state; ?>" > 
                                 <span class="help-block"><?php echo $state_err;?></span>    
                          </div>
                          
                          <div class="form-group col-md-2 <?php echo (!empty($zipcode_err)) ? 'has-error' : ''; ?> ">
                                <label for="inputZip">Zip</label>
                                <input type="text" class="form-control" id="inputZip" placeholder="Zip " name="zipcode" required  value="<?php echo $zipcode; ?>" >
                                    
                          </div>
                    </div>

                    <div class="form-group">
                            <div class="form-row">

                                    <div class="col <?php echo (!empty($email_err)) ? 'has-error' : ''; ?> ">
                                          <label >Email</label>
                                          <input type="email" class="form-control" placeholder="Email" name="email" required value="<?php echo $email; ?>" >
                                           <span class="help-block"><?php echo $email_err;?></span>
                                    </div>
                                  
                                    <div class="col">
                                        <label >Phone</label>
                                        <input type="text" class="form-control" placeholder="+91" name="phone" required value="<?php echo $phone; ?>" >
                                    </div>
                            </div>                                
                    </div>

                    <div class="form-group">
                    
                        <label >Upload Your Photo</label>
                        <br>
                        <input type="file" class="btn btn-outline-info " id="exampleFormControlFile1" name="profile_img" value="<?php echo $profile_img; ?>" >
                    
                    </div>
            

        </div>
    </div>
<!-- ----------------------------------------- persnal ends here---------------------------------->

<!-- ======================================================================================================= -->

<!-------------------------------------------- Education info starts ------------------------------->
<div id="card2">
        <!-- left-box -->
        <div class=" left-box2">
            <div class="education">
                <img src="img/edu_info.svg">
            </div>
            <div class="container">
                <h3> Education Info </h3> 
                <p style="text-justify: auto;"> 
                    This section is about educaational deatils 
                    the edcuation deatils has to filled from your school to the current studying semsters
                    fill the perscentage obtanied by for school and pre-university 
                    for enginering enter the branch use short forms like CSE,ISE for filling bracnh
                    for engeineering fill the agrigate maks.
                </p> 
            </div>
            
        </div>
        <!-- right-box -->
        <div class=" right-box2">
           
                    <div class=" form-group heading">
                        <h2>Education Info </h2>
                    </div>

                    <div class="form-group from-row  <?php echo (!empty($school_name_err)) ? 'has-error' : ''; ?>" >
                            <label for="text">School Name</label>
                            <input type="text" class="form-control" placeholder="Schoool name" required name=school_name value="<?php echo $school_name; ?>"   >
                            <small > 10th School Name </small>
                            <span class="help-block"><?php echo $school_name_err;?></span>
                    </div>
                          
                                
                    <div class="form-row">
                            <div class="form-group col">
                                <label > Result : </label>
                                <input type="number" class="form-control col-4"  placeholder="Obtained "  name="school_marks"  value="<?php echo $school_marks; ?>"   >
                                <small > Percentage Obtained in 10th exam </small>
                            </div>          
                    </div>  
                    
                    <div class="form-group from-row">
                            <label for="text"> College Name</label>
                            <input type="text" class="form-control" placeholder="College Name" name="college_name" required value="<?php echo $college_name; ?>"    >
                            <small > 12th / PUC College Name </small>
                    </div>

                    <div class="form-row">
                            <div class="form-group col">
                                <label > Result : </label>
                                <input type="number" class="form-control col-4"  placeholder="Obtained " name="college_marks" value="<?php echo $college_marks; ?>"   >
                                <small > Percentage Obtained in 12th / 2nd PUC exam  </small>
                            </div>          
                    </div> 
                    
                    <div class="form-group from-row <?php echo (!empty($eng_college_name_err)) ? 'has-error' : ''; ?> ">
                            <label >Engineering College Name</label>
                            <input type="text" class="form-control" placeholder="College name" name="eng_college_name" required value="<?php echo $eng_college_name; ?>" >  
                            <small > Currently Studying Enginerring College Name </small>
                            <span class="help-block"><?php echo $eng_college_name_err;?></span>
                    </div>
                    
                    

                    <div class="form-group from-row">
                            <label >Engineering branch Name</label>
                            <input type="text" class="form-control" placeholder="College name" name="eng_branch" required value="<?php echo $eng_branch; ?>"   >
                            <small >  Enginerring branch Name </small>
                    </div>
                   
                    <div class="form-row">
                            <div class="form-group col">
                                <label > Result : </label>
                                <input type="number" class="form-control col-4"  placeholder="Obtained " name="eng_marks" value="<?php echo $eng_marks; ?>"   >
                                <small > Percentage Obtained for aggrigate of the prvious semesters </small>
                            </div>          
                    </div>     
             
         </div>
    </div>
<!-- -------------------------------------- education ends here---------------------------------->

<!-- ============================================================================================================== -->

<!------------------------------------------Skills info starts ----------------------------------- -->
<div id="card3">
        <!-- left-box -->
        <div class=" left-box3">
            <div class="skill">
                <img src="img/skill_info.svg">
            </div>
            <div class="container">
                <h3> Skill Info </h3> 
                <p style="text-justify: auto;"> 
                This section caontains the field to fill the skills
                fill your best skills,know your streenths and fill the skills that u have obtained
                skill name is compulsory,also give a rating to your skill level give a number from 1-10 on the scale 1 being the beginner and 10 being expert. 
                </p> 
            </div>
            
        </div>
        <!-- right-box -->
        <div class=" right-box3">
            
                    <div class=" form-group heading">
                        <h2>Skill Info </h2>
                        <small> Enter the 3 top skills </small>
                        <small> give the number between 1 - 10 according to the skills level </small>
                    </div>

                    <div class="form-group">
                            <div class="form-row">

                                    <div class="col-12 <?php echo (!empty($skill_name_err)) ? 'has-error' : ''; ?>">
                                          <label for="text">Skill Name</label>
                                          <input type="text" class="form-control" placeholder="Skill Name" required name="skill_name" value="<?php echo $skill_name; ?>" >
                                          <span class="help-block"><?php echo $skill_name_err;?></span>
                                    </div>
                                   
                                    <div class="col-6">
                                          <label for="text">Skill level </label>
                                          <input type="number" class="form-control" placeholder="Skill level" name="skill_level" value="<?php echo $skill_level; ?>" >
                                          
                                    </div>
                            </div>      
                    </div>
        </div>
</div>
<!-- -------------------------------------- Skills  info ends here---------------------------------->


<!-- ======================================================================================================= -->

<!-------------------------------------------- projects info starts -------------------------------->
<div id="card4">
        <!-- left-box -->
        <div class=" left-box4">
            <div class="project">
                <img src="img/project_info.svg">
            </div>
            <div class="container">
                <h3> Projects Info </h3> 
                <p style="text-justify: auto;"> 
                This filed conatins the forms to showcase your projects
                Enter the name of the project you have done and also description about it 
                makesure you convey the project aim in short and sweet.
                </p> 
            </div>
            
        </div>
        <!-- right-box -->
        <div class=" right-box4">
                    <div class=" form-group heading">
                        <h2>Projects Info </h2>
                    </div>

                    <div class="form-group">
                            <div class="form-row">

                                    <div class=" form-group col-12 <?php echo (!empty($project_title_err)) ? 'has-error' : ''; ?>">
                                          <label for="text">Project Name</label>
                                          <input type="text" class="form-control" placeholder="project title" name="project_title" required value="<?php echo $project_title; ?>" >
                                          <span class="help-block"><?php echo $project_title_err;?></span>
                                    </div>
                                  
                                    <div class="form-group col">
                                        <label for="exampleFormControlTextarea1">Example textarea</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Give a descrition about the project...." rows="7" name="project_desc" value="<?php echo $project_desc; ?>" ></textarea>
                                    </div>
                            </div>      
                    </div>  
        </div>
    </div>
<!-- -------------------------------------- peojects ends here---------------------------------->

<!-- ======================================================================================================== -->

<!-------------------------------------------- internship info starts ---------------------------->
<div id="card5">
        <!-- left-box -->
        <div class=" left-box5">
            <div class="internship">
                <img src="img/intern_info.svg">
            </div>
            <div class="container">
                <h3> Internship Info </h3> 
                <p style="text-justify: auto;"> 
                This sections gives ana oppurtunity to show the internships that you have completed.
                Give the company name where you have done the intershiip 
                give the start date and end so that duration can be considered 
                give small desction about the intership and mention the technology stack you have worked in the intership.
                </p> 
            </div>
            
        </div>
        <!-- right-box -->
        <div class=" right-box5">
            
                    <div class=" form-group heading">
                        <h2>Internship Info </h2>
                    </div>

                    <div class="form-group">
                        <div class="form-row">

                        <div class=" form-group col-12 <?php echo (!empty($company_name_err)) ? 'has-error' : ''; ?>">
                             <label for="text">Company Name</label>
                              <input type="text" class="form-control" required placeholder="project title" name="company_name"value="<?php echo $company_name; ?>" >
                              <span class="help-block"><?php echo $company_name_err;?></span>
                        </div>

                        <div class="form-row col ">
                            <label class="col-6 ml-1 " > start date </label><label class="col-4 ml-2 "> End date </label>
                            <input type="date" class=" form-control col mr-3 ml-2" placeholder="start date"  name="start_date" value="<?php echo $start_date; ?>" >
                            <input type="date" class=" form-control col ml-3  " placeholder="end date" name="end_date" value="<?php echo $end_date; ?>" >
                        </div>                      
                    </div>   
                    <div class=" form-group  mt-3 ">
                            <label for="exampleFormControlTextarea1">Example textarea</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"   placeholder="Give description..." name="intern_desc" value="<?php echo $intern_desc; ?>" ></textarea>
                    </div>   
                    <input class="btn btn-outline-success btn-block mt-5 col-6" id="sub" type="submit" value="submit" >      
        </div>
    </div>
<!-- -------------------------------------- intership ends here---------------------------------->
</form>
<!-- ========================================================================================================== -->


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>