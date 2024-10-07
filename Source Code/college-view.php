
<!-- ============================================= HTML ================================================== -->

<!doctype html> 

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- link css -->
    <link rel="stylesheet" type="text/css" href="college-view.css?<?php echo time(); ?>" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title> College </title>
  </head>

<body>
<div id="bgimg">
</div>   
<!------------------------------------------ Nav Bar ------------------------------------------>

    <nav class="navbar navbar-expand-sm navbar-dark ">
            <div class="container">
                <a class="navbar-brand" href="homepage.php"> CV Developer </a>
   
                 <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                     aria-expanded="false" aria-label="Toggle navigation"></button>
    
                <div class="collapse navbar-collapse" id="collapsibleNavId">
                        
                        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                                <li class="nav-item active">
                                    <a class="nav-link" href="#">Home</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="logout.php">Log Out</a>
                                </li>
                        </ul>
                </div>

            </div>     
    </nav>

<!------------------------------------------ Nav Bar ------------------------------------------>

<div class="container">

    <?php 

         // Include config file
         require_once "config.php";

            // Attempt select query execution
            $sql = "SELECT * FROM personal p, education e ,skills s  WHERE  e.username = p.username and s.username = p.username ";

            if($result = $mysqli->query($sql)){

                if($result->num_rows > 0){


                    while($row = $result->fetch_array()){

                    echo  " <div id='card'>";

                    echo  "      <!-- left-box -->";
                    echo  "           <div class='left-box '>";
                    echo  "                <img src='img/desk.png'>";
                    echo  "           </div>";

                    echo  "      <!-- right-box -->";
                    echo  "          <div class='right-box card-body'";
                    echo  "                <h1 > Info </h1><br>";
                    echo  "                <label id='q-head' > Name :</label><label id='a-head'>".$row['firstname']." ".$row['lastname']."</label><br>";
                    echo  "                <label id='ques' > Email :</label><label id='ans'>".$row['email']."</label><br>";
                    echo  "                <label id='ques' > Departmnet :</label><label id='ans'>".$row['eng_branch']."</label><br>";
                    echo  "                <label id='ques' > Skils :</label><label id='ans'>".$row['skill_name']."</label><br>";
                    echo  "                <a href='' class='btn btn-primary btn-sm mt-2'>View </a>";                                          
                    echo  "          </div>";

                    echo  " </div>";

                    }

                    // Free result set
                    $result->free();

                } else{
                    echo "<p class='lead'><em>No records were found.</em></p>";
            }
        } else{
            echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
        }

        // Close connection
        $mysqli->close();

    ?>

</div>  
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  
    </body>
</html>