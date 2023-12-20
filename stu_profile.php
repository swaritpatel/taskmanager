<?php
  session_start();
?>

<!DOCTYPE html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profile</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@700&family=Quicksand:wght@500&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="style.css"> -->

    <script src="js/filter.js"></script>


</head>

<body>
  
    <!-- ////php start -->
    <?php
  $servname = "localhost";
  $conn = new mysqli($servname, "root", "", "dbms_project");

  if ($conn->connect_error)
    die("Connection failed: " . $conn->connect_error);
?>


    <?php




  if(isset($_POST['course'])){
    $sql="INSERT INTO `undertakes` (`StudentID`, `CourseID`, `Attendance`, `InternalMarks`, `PaperMarks`) VALUES (".$_SESSION['userid'].", '".$_POST['course']."', '0', '0', '0')";
    $res = $conn->query($sql);

  }
    $sql = "SELECT StudentID, PersonID FROM STUDENT WHERE STUDENT.StudentID = ".$_SESSION["userid"];
           
    $res = $conn->query($sql);

    $pid = -1;
    if ($res->num_rows > 0) {
      while ($row = $res->fetch_assoc()) {
        $pid = $row['PersonID'];
      }
    }

    $sql = "SELECT * FROM PERSON WHERE PERSON.PersonID = ".$pid;
    $res = $conn->query($sql);

    if ($res->num_rows > 0) {
      while ($row = $res->fetch_assoc()) {
        $name = $row['FirstName']." ";
        if ($row['MiddleName'] != "")
          $name .= $row['MiddleName']." ";
        $name .= $row['LastName'];
      }
    }





    //echo "<span>$name</span>";
    //echo "<span>"; echo $_SESSION["userid"]; echo "</span>";
  ?>



    <!-- ///////////////php end-->
  

    <nav class="navbar fixed-top bg-dark">
        <div class="container-fluid" style="text-decoration:none; color:white;">
            Online &#128994; :


            <?php echo $name ?>
            <a href="logout.php" style="text-decoration:none; color:white;">Logout <i class="fa fa-sign-out"></i></a>
        </div>
    </nav>

    <br><br><br><br>

      <!-- Data hide/view -->
      <style>
                #MyForm {
                    display: none;
                    width: 100%;
                    border: 1px solid #ccc;
                    padding: 14px;
                    background: #ececec;
                }

                #MyTable {
                    display: none;
                    width: 100%;
                    border: 1px solid #ccc;
                    padding: 14px;
                    background: #ececec;
                }
                </style>
                <script>
                $(document).ready(function() {
                    $('#Mybtn').click(function() {
                        $('#MyForm').toggle(500);
                    });
                });
                </script>
                <script>
                $(document).ready(function() {
                    $('#Mybtn_table').click(function() {
                        $('#MyTable').toggle(500);
                    });
                });
                </script>
   

    </div>


    <div style="margin-top:2rem;display:flex;flex-direction:column;align-items: center;justify-content:space-between;" >
        <div class="row my-3 " style="margin-top:2rem;display:flex;align-items: center;justify-content:space-between;">

            <div class="col-4">
                <div class="card" style="width: 25rem;">
                    <!-- <img src="..." class="card-img-top" alt="..."> -->
                    <div class="card-body">
                        <h5 class=" text-center">View Exam timetable</h5>
                        <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                        <a href="ttdisplay1.php" class="btn  stretched-link"></a>
                    </div>
                </div>
            </div>
        </div>
                


        <a href="stu_profile.php?update=c" >
        
         <button type="button" class="btn btn-outline-success">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
  <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"></path>
</svg>
                Enroll in Course
              </button>
        </a>





        <?php
        if(isset($_GET['update'])){ 
          echo'
          <form style=" margin:1rem;" method="post" class="d-flex justify-content-around">
          <br><br><br><br>
          <label for="deptlist" class="font-weight-bold">Select Course</label>
          <div class="container"id="dept-drop">
        
              <select name="course" class="form-select form-select-sm" aria-label=".form-select-sm example">';
               
                      $sql="select courseid, coursename from course ";
                      $result=mysqli_query($conn,$sql);
        
                      while ($row = mysqli_fetch_assoc($result)) {
                          echo '<option value="'.$row['courseid'].'">'.$row['coursename'].'</option>';
                      }
                      
            
              echo'</select>
              <center>
                    <input style=" margin:1rem;" class="btn btn-primary" type="submit" value="Enroll" name="update-btn">
                    </center>
          </div>
          </form>
          ';
          
        }
        ?>

        <div class="wrapper">
            <div class="name_pic ">
                <div class="image ">
                    <img src="img/avatar.png" alt="" class="image_pic">
                </div>

                <div class="name">
                    <!-- ///////////////////////admin name-navbar////////////////////////// -->


                    <?php echo $name ?>
                    </br>


                    <p style="font-size:1rem; text-align:center">ID :
                        <?php echo "<span>"; echo $_SESSION["userid"]; echo "</span>"; ?></p>

                </div>

            </div>

            <!-- information -->

            <?php
  
  $courses = array();

  $sql = "SELECT * FROM UNDERTAKES, COURSE, DEPARTMENT
          WHERE UNDERTAKES.StudentID =".$_SESSION["userid"].
          " AND UNDERTAKES.CourseID = COURSE.CourseID
          AND DEPARTMENT.DeptNo = COURSE.DeptNo";
  $res = $conn->query($sql);
  
  if ($res->num_rows > 0) {
    while ($row = $res->fetch_assoc()) {
      array_push($courses,
        array($row['DeptName'], $row['CourseID'], $row['CourseName'],
          $row['ClassesTaken'], $row['Attendance'], $row['InternalMarks'], $row['PaperMarks']));
    }
  }


  for ($i = 0; $i < count($courses); $i++) {
    // echo 'Hello';
    $total = $courses[$i][5] + $courses[$i][6];
    $grdpt = min(floor($total / 10) + 1, 10);

    echo
    '
   
  <div class="container">
  <div class="row border-bottom">
    <div class="col text-truncate bg-info"><strong>DID:</strong>
     '.$courses[$i][0].'
    </div>
    |
    <div class="col bg-success"><strong>CID:</strong>
     '.$courses[$i][1].'
    </div>
    |
    <div class="col bg-warning"><strong>CName:</strong>
      '.$courses[$i][2].'
    </div>
  </div>
  </div>
    
    
    
    <table class="table">
    <thead>
      <tr class="bg-secondary">
        
        <th scope="col">Information</th>
        <th scope="col">|</th>
        <th scope="col">Performance</th>
      </tr>
    </thead>
    <tbody>
      <tr>
      
        <td>Total Classes</td>
        <td>::</td>
        <td>'.$courses[$i][3].'</td>
      </tr>
  
      <tr>
        
        <td>Classes Attended:</td>
        <td>::</td>
        <td>'.$courses[$i][4].'</td>
      </tr>
      
      <tr>
        
        <td>Attendance:</td>
        <td>::</td>
        <td>'.round(intval($courses[$i][4]) / intval($courses[$i][3]) * 100).'%</td>
      </tr>
      
      <tr>
        
        <td>Internal Marks:</td>
        <td>::</td>
        <td>'.$courses[$i][5].'</td>
      </tr>
      
      <tr>
        
        <td>Paper Marks:</td>
        <td>::</td>
        <td>'.$courses[$i][6].'</td>
      </tr>
      
      <tr>
        
        <td>Total:</td>
        <td>::</td>
        <td>'.$total.'</td>
      </tr>
      
      <tr>
        
        <td>Grade Point</td>
        <td>::</td>
        <td>'.$grdpt.'</td>
      </tr>
      
  
    </tbody>
  </table>

  
  ';
  }
  
?>



            <!-- info end -->
        </div>

    
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>


</body>

</html>