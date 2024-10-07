
<!-- ====================================== HTML ================================================ -->

<!doctype html>
<html lang="en"> 
  <head>

  <link rel="stylesheet" type="text/css" href="homepage.css?<?php echo time(); ?>" />

     <!-- Font Icon -->
     <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  
    <title>CV Developer</title>
    <script type="text/javascript" src="https://platform.linkedin.com/badges/js/profile.js" async defer></script>
    <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
     
  </head>
  <body data-spy="scroll" data-target="#navbarResponsive">
      <div id="home">

        <div></div>

        <nav class="navbar navbar-expand-md navbar-dark fixed-top">
                <a class="navbar-brand brand navc" href="new.html"  style="padding-top:0;">CV DEVELOPER</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
                  <span class="navbar-toggler-icon"></span>
                </button>
        
                <div class="navbar-collapse" id="navbarResponsive">
                  <ul class="navbar-nav ml-auto nav">
                   
                    <li class="nav-item">
                        <a class="nav-link " href="#home"> home </a>
                    </li> 
                    
                    <li class="nav-item">
                        <a class="nav-link " href="#about"> about </a>
                    </li> 
        
                    <li class="nav-item">
                        <a class="nav-link" href="#features"> features </a>
                    </li>
        
                    <li class="nav-item">
                        <a class="nav-link" href="#contact"> contact </a>
                    </li>
        
                    <li class="nav-item">
                      <button class="btn btn-outline-success btn-sm but" onclick="document.getElementById('modal-wrapper').style.display='block'" >
                        <a  class="nav-link" href="#"> LOGIN </a>
                      </button>
                    </li>
        
                    <li class="nav-item" >
                        <button class="btn btn-outline-primary btn-sm but">
                        <a class="nav-link" href="signup.php"> SIGN-UP </a>
                        </button>
                    </li>
                    
                  </ul>
        
                </div>
        
              </nav> <!--nav  bar close-->
    </div>

<!-- background image -->        
<div id="bgimg">
    <div class="land-text text-center" >
        <h1>Welcome to cv developer </h1>
        <h3>Build ur dream here  </h3>
        <a class="btn btn-outline-light btn-lg" href="signup.php" > Get Started </a>
    </div>
</div>


<!-------------------------------------------- start about section  ------------------------------------ -->
<div id="about"class="offset ">
    <div class="col-12  text-center ab">
        <h2 class="heading ">About</h2>
        <div class="heading-underline"></div>
   </div>
    
  <div class="col-12 narrow text-center">
        
      <div class="padding">
            
            <div class="container">
                
                <div class="row">
                  
                    <div class="col-sm-6" id="abt-img" >
                       <img src="img/about-cvd.svg" >
                    </div>
                  
                    <div class="col-sm-6 text-center" id="abt-text">
                        <h3> About CV Developer.</h3>
                       <p class="lead"> CV Developer is project built keeping in the mind to help both students and teacher. 
                            CV Developer is an gateway for the students to build the resume in early and start developing it,
                            whereas for teacher this a place where all the data will be available ,they dont need to ask data
                            each time they  want an info about the student.
                       </p>
                        <p class="lead">
                          This is the project diretly open with a landing page where the students and teacher can login 
                          both have been given a separate login poral, the site can be used anytime you want upgrade your skill
                          or if you want to access the info its all HERE... 
                        </p>
                    </div>

                </div>

            </div>

      </div>
  
  </div>

</div>
<!-------------------------------- end of about section ---------------------------------------- -->

<div id="features"class="offset ">
      
      <div class="col-12  text-center ab">
          <h2 class="heading ">Features</h2>
          <div class="heading-underline"></div>
      </div>

    <div class="col-12 narrow text-center  pad"> 

          <div class="continer">
                
              <div class="row" >
                    
                    <div class="col-lg-3 col-md-3 col-sm-6 col-12 " id="pad-text1"  >
                        <h4 > Student </h4>
                        <p> Students are the primary users of this site, they build their profile throught 
                          the 4 years of college, they can even access the site after they leave college 
                          they can constatly update thier profile whenever they want.They can store all the info in a single place. 
                          This is built FOR students.
                          
                        </p>
                    </div> 
              
                    <div class="col-lg-3 col-md-3 col-sm-6 col-12" id="pad-img" >
                          <img src="img/feature-student.svg" class="img-responsive"> 
                    </div> 
    
                    <div class="col-lg-3 col-md-3 col-sm-6 col-12"  id="pad-text">
                          <h4> College </h4>
                          <p>College includes teachers,department,placement all these users can access this portal,
                              using this portal teacher can get info about students easliy and for the college can have 
                              access about the students required info, placement cell can get the full access of this portal,
                              they can diretly filter the resume accourding to thier needs. 
                          </p>
                    </div> 
    
                    <div class="col-lg-3 col-md-3 col-sm-6 col-12" id="pad-img" >
                          <img src="img/feature-college.svg" class="img-responsive">
                    </div> 
              </div>
         </div>
   </div>
</div>


<div id="fixed">

</div>

<div class="pad1">
    <div class="container">
        <div class="row" >
            <div class="col-sm-6 cv-text ">
                <h4 class="mb-3">All About CV Developer.</h4>
              
                <p class="lead"> A CV (short for the Latin phrase curriculum vitae, which means “course of life”) is a detailed 
                  document highlighting your professional and academic history. You may be asked to submit a CV when 
                  applying for jobs in academia or a job outside the US. </p>

                <p class="lead">CVs typically include information like: Work experience : 
                  <ul>
                      <li>  Achievements and awards  
                      <li>  Academic coursework 
                      <li>  Research projects 
                      <li>  Publications of your work
                  </ul>         
                </p>
                  
            </div> 
          <div class="col-sm-6" >
            <img src="img/cvinfo.svg" >
          </div>
        </div>
    </div>
  </div>


  <footer id="contact" class="container-fluid text-center">
      <div class="row">
          <div class="col-sm-4">
              <h3>Contact Us</h3>
              <br>
              <h4>Our Address and contact info here</h4>
              <h5>mcabhishekpatel2017@gmail.com</h5>
              <h5>Computer Science Engineering</h5>
              <h5> VVIET,MYSORE</h5>
          </div>
          <div class="col-sm-4">
              <h3>Connect</h3>
              <a href="" target="_blank">  <i class="fab fa-facebook"></i> </a>
              <a href="" target="_blank">  <i class="fab fa-instagram"></i> </a>
              <a href="" target="_blank">  <i class="fab fa-github"></i> </a>
              <a href="" target="_blank">  <i class="fab fa-twitter-square"></i> </a>
          </div>

        <div class="link">
          <h3 class="mb-4" > Developer </h3>
          
           <div class="LI-profile-badge"  data-version="v1" data-size="large" data-locale="en_US" data-type="horizontal" data-theme="dark" data-vanity="abhishekpatelmc"><a class="LI-simple-link" href='https://in.linkedin.com/in/abhishekpatelmc?trk=profile-badge'>Abhishek Patel</a></div>
                  
        </div>
        
      </div>

    </footer>


 <!--------------------------------------- Login pop ---------------------------------------->
         
  <div id="modal-wrapper" class="modal text-center">

      <div class="modal-content  animate"  >
              
                <div class="face">

                  <span onclick="document.getElementById('modal-wrapper').style.display='none'" class="close" title="Close PopUp">&times;</span>    
                        <!-- <div class="col-12 user-img">
                              <img src="img/face.svg" >
                        </div> -->
                    
                        <div class=" log">   
                            <h1>User</h1>
                        </div>
                
                  
                    <div class="row" id="box">
                        <div class="left-box col user-img zoom" >
                            <a href="student-login.php">
                              <img src="img/student.svg"  style="width:42px;height:42px;border:0;">
                            </a>
                            <h3> student </h3>
                        </div>
                        <div class="right-box col user-img zoom">
                            <a href="college-login.php">
                              <img src="img/college.svg"  style="width:42px;height:42px;border:0;">
                            </a>
                            <h3> college </h3>
                        </div>
                    </div> 
                  
                </div>       
                                          
        </div>
          
  </div>






  <!-- Optional JavaScript -->
 <script>
  // If user clicks anywhere outside of the modal, Modal will close
  
  var modal = document.getElementById('modal-wrapper');
  window.onclick = function(event) {
      if (event.target == modal) {
          modal.style.display = "none";
      }
  }
  </script>





    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script type="text/javascript" src="https://platform.linkedin.com/badges/js/profile.js" async defer></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  </body>
</html>