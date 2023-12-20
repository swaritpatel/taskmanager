<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Instructor</title>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Be+Vietnam:400,600,800&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <style>
    .wrapt {
        background-color: rgba(53, 183, 212, 0.9);
        color: white;
    }

    .nav_icon {
        cursor: pointer;
    }

    .mybut {
        color: gray;
        border: none;
        transform: scale(1.5);
        background: transparent;
    }

    .mybut:hover {
        color: rgba(53, 183, 212, 0.9);
    }

    .wrapt {
        background-color: rgba(53, 183, 212, 0.9);
        color: white;4

    }
    .wrapt:hover {
      background:gray;
    }

    .nav_icon {
        cursor: pointer;
    }

    @media screen and (max-width: 567px) {
        .card-text {
            margin-bottom: 0.5em;
        }
    }

    .card {
        margin: 5%;
        flex-direction: row;
    }

    .card-body {
        padding: 0.5em 1em;
        display: flex;
        flex-direction: column;
    }

    .card1.card img {
        max-width: 12em;
        height: 100%;
        border-bottom-left-radius: calc(0.25rem - 1px);
        border-top-left-radius: calc(0.25rem - 1px);
    }

    .myc {
        border-radius: 10px;
    }

    .box {
        display: flex;

    }

    .cc {
        display: flex;
    }

    .ccc {
        display: flex;

    }
    .mybb {
      background:tranparent;
      color:black;
    }
    </style>
     <link rel="stylesheet" href="css/instructor.css">


	<!-- Including jQuery -->
	<script src=
"https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js">
	</script>

	<!-- Including Bootstrap JS -->
	<script src=
"https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js">
	</script>

<!-- signout icon -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>

<?php
 
 $servname = "localhost";
  $conn = new mysqli($servname, "root", "", "dbms_project");

  if ($conn->connect_error)
    die("Connection failed: " . $conn->connect_error);
  
  if (!isset($_COOKIE["courseid"]))
    echo "Enable Cookies";
?>












    <nav class="navbar navbar-expand-lg  text-white bg-dark">
<div class="row " style="width:100%">
  <div class="col">
  Online🟢:
    <?php echo $_SESSION["userid"] ?>
  </div>

  <div class="col-md-auto">
      
    </div>
<div class="col col-lg-2">
<button class="btn btn-outline- my-2 my-sm-0 mx-5 text-white"  onClick="logout()" >

 <i class="fa fa-sign-out"></i> Logout

</button>
</div>

</div>
   
   
  
  
   </nav>
    <div class="user-label rect-circ wrapt">
        <span class="rect-circ">INSTRUCTOR</span>
    </div>

    



    <div class="container">
        <div class="card2 card mb-3 myc" style="width: 840px;">
            <div class="align-items-center cc" style="width: 540px;">
                <div class="col-sm-4 col-5">
                    <img src="img/instruct_avatar.png" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-sm-8 col-7">
                    <div class="card-body">

                        <div class="dept-label">
                            <?php
    $sql = "SELECT DEPARTMENT.DeptName
            FROM INSTRUCTOR, DEPARTMENT
            WHERE INSTRUCTOR.InstructorID = ".$_SESSION["userid"].
            " AND INSTRUCTOR.DeptNo = DEPARTMENT.DeptNo";
    $res = $conn->query($sql); ?>
    <?php

    if ($res->num_rows > 0) {
      while ($row = $res->fetch_assoc()) {
        echo "<h5 class='card-title'>".$row['DeptName']."</h5>";
      }
    }
  ?>
                        </div>

                        <form method="post" action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>">


                            <?php
  if(isset($_POST["clsInp"] , $_COOKIE["courseid"])){
    $sql = "UPDATE COURSE SET COURSE.ClassesTaken = '".$_POST["clsInp"].
            "' WHERE COURSE.CourseId = '".$_COOKIE["courseid"]."'";
    $conn->query($sql);

  }
    
    $sql = "SELECT * FROM UNDERTAKES WHERE UNDERTAKES.CourseID = '".$_COOKIE["courseid"];
    $sql .= "'ORDER BY UNDERTAKES.StudentID";
    $res = $conn->query($sql);

    $students = array();
    if ($res->num_rows > 0) {
      while ($row = $res->fetch_assoc()) {
        array_push($students, $row['StudentID']);
      }
    }
    
    for ($i = 0; $i < COUNT($students); $i++) {
      if(isset($_POST['cls'.$i], $_POST['pap'.$i], $_POST['int'.$i])){
      $sql = "UPDATE UNDERTAKES SET Attendance = '";
      $sql .= $_POST['cls'.$i]."', PaperMarks = '";
      $sql .= $_POST['pap'.$i]."', InternalMarks = '";
      $sql .= $_POST['int'.$i]."' WHERE StudentID = '".$students[$i]."' AND CourseID='".$_COOKIE["courseid"]."'";
      $res = $conn->query($sql);
      }
    }

    $sql = "SELECT COURSE.CourseID, COURSE.CourseName, COURSE.ClassesTaken FROM COURSE
            WHERE COURSE.CourseID = '".$_COOKIE["courseid"]."'";
    $res = $conn->query($sql);

    $course = null;
    if ($res->num_rows > 0) {
      while ($row = $res->fetch_assoc()) {
        $course = array($row['CourseID'], $row['CourseName'], $row['ClassesTaken']);
      }
    }

    echo
      '
      <div class="ccc">
      <h5 class="card-text">CouserID&nbsp;:&nbsp;</h5>
          <h5 class="card-text">'.$course[0].'</h5>
      </div>
        <div class="box">

             

              <h5 style="display:flex;flex-direction:row;">Course&nbsp;Name&nbsp:&nbsp;</h5>
              <h5 style="display:flex;flex-direction:row;">'.$course[1].'</h5>
              
              <div class="col-md-auto mybb">
              <input  class="btn btn-primary mybb" type="button" value="-" name="update-btn" onClick="decrClass()">
          </div>
      <div class="rect-round-sm">
      <div class="col-md-auto mybb" style=" margin:none;padding:none;">


<span style="display:flex;justify-content:center;align-items;center;"><strong><span id="numClass">'.$course[2].'</span></strong>classes</span>            </div>
        
        <input id="clsInp" type="hidden" name="clsInp" value="'.$course[2].'"/>
      </div>
      <div class="col-md-auto mybb">
                <input class="btn btn-primary mybb" type="button" value="+" name="update-btn" onClick="incrClass()">
            </div>
            </div>
            <input type="submit" value="Update Course" style="transform:scale(0.7);font-weight:bold;" class="btn-submit rect-circ wrapt"/>
          </div>
        </div>
      </div>
      </div>
    
  </div>';


  ?>

<div class="container  p-3 mx-auto">
        <form method="post" class="d-flex justify-content-around">
            <?php
              if(isset($_GET['update'])){ //if click on update button
                $stdid = $_GET['update']; //geting update id from search query
                $query = "SELECT * FROM undertakes WHERE studentid={$stdid} and courseid='";
                $query.= $_COOKIE["courseid"]."'";
                // echo $query;
                $getData = mysqli_query($conn, $query); //getting data based on query
                while($rx=mysqli_fetch_assoc($getData)){ //keep data rx variable afte fetch

            //       $fn=$rx['FirstName'];
            // $mn=$rx['MiddleName'];
            // $ln=$rx['LastName'];
            // $username = $fn." ".$mn." ".$ln;
            $marks = $rx['PaperMarks'];
            $ta = $rx['InternalMarks'];
            $attendd = $rx['Attendance'];
          


                  $stdid = $rx['StudentID'];
            
               
            ?>
            <div class="row">

                <div class="col">
                    <h5 name="name_t" value="<?php echo $stdid ?>">Student ID: <?php echo $stdid ?></h5>
                </div>
                <div class="col">
                    <input class="form-control me-3" type="number" name="attend" value="<?php echo $attendd ?>">
                </div>
                <div class="col">
                    <input class="form-control me-3" type="text" name="marks" value="<?php echo $marks ?>">
                </div>
                <div class="col">
                    <input class="form-control me-3" type="text" name="ta" value="<?php echo $ta ?>">
                </div>


                <div class="col-md-auto">
                    <input class="btn btn-primary" type="submit" value="Update" name="update-btn">
                </div>

            </div>



            <div class="col col-lg-2">
                <?php 
                } 
              } ?>


<!-- script for automatic dismiss alert -->
          <script type="text/javascript">
                      setTimeout(function () {
                  
                        // Closing the alert
                        $('#ale').alert('close');
                      }, 1000);
                    </script>



                <?php
                if(isset($_POST['update-btn'])){
                  $attend=$_POST['attend'];
                  $marks=$_POST['marks'];
                  $ta=$_POST['ta'];
                 if(!empty($attend) && !empty($marks) &&  !empty($ta) ){
                  $query = "UPDATE undertakes SET attendance='$attend', internalmarks='$ta', papermarks='$marks' WHERE   studentid={$stdid} and courseid='".$_COOKIE["courseid"]."'";
                  // echo $query;
                  $updateQuery = mysqli_query($conn, $query);
                  if($updateQuery){
                    // echo '<i class="fa fa-check"></i>';
                    echo '
                   <div class="row">
                    <div id="ale" class="alert alert-success">
                     successful!
                    </div> 
                    </div>
                  ';
                  }
                 }

                }
              ?>
            </div>
    </div>
    </form>
    </div>




                            <div class="container">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>

                                            <th scope="col">S.No.</th>
                                            <th scope="col">StudentID</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Classes</th>
                                            <th scope="col">Marks</th>
                                            <th scope="col">TA</th>
                                            <th scope="col">Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                        <?php
  $courses = array();

  $sql = "SELECT *
  FROM UNDERTAKES, STUDENT, PERSON
  WHERE UNDERTAKES.CourseID = '".$_COOKIE["courseid"];
$sql .= "'AND UNDERTAKES.StudentID = STUDENT.StudentID
  AND PERSON.PersonID = STUDENT.PersonID
  ORDER BY STUDENT.StudentID";

    

$res = $conn->query($sql);
  if ($res->num_rows > 0) {
    while ($row = $res->fetch_assoc()) {
      $fn=$row['FirstName'];
    $mn=$row['MiddleName'];
    $ln=$row['LastName'];
    $sname=$fn." ".$mn." ".$ln;
      array_push($courses,
        array($row['StudentID'], $sname, $row['Attendance'],$row['PaperMarks'], $row['InternalMarks']));
    }
  }

  $ii=0;

  for ($i = 0; $i < COUNT($courses); $i++) 
  {
    $ii=$i+1;
    $stdi=$courses[$i][0];
    $name=$courses[$i][1];
    $attend=$courses[$i][2];
    $marksp=$courses[$i][3];
    $ta=$courses[$i][4];

    ?>
                                        <tr>
                                            <th scope="row"><?php echo"$ii" ?></th>
                                            <td><?php echo"$stdi" ?></td>
                                            <td><?php echo"$name" ?></td>
                                            <td><?php echo"$attend" ?></td>
                                            <td><?php echo"$marksp" ?></td>
                                            <td><?php echo"$ta" ?></td>
                                            <td><a href="instructor-data.php?update=<?php echo"$stdi" ?>">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                            </td>



                                        </tr>
                                        <?php
  }
?>
                                    </tbody>
                                </table>


                            </div>


















                            <script>
                            function logout() {
                                document.cookie = "courseid" + '=;expires=Thu, 01 Jan 1970 00:00:01 GMT;';
                                document.cookie = "loggedin" + '=;expires=Thu, 01 Jan 1970 00:00:01 GMT;';
                                document.cookie = "logout=yes";
                                window.location.href = 'index.php';
                            }

                            function incrClass() {
                                var temp = document.getElementById("numClass").innerHTML;
                                document.getElementById("numClass").innerHTML = parseInt(temp) + 1;
                                document.getElementById("clsInp").value = parseInt(temp) + 1;
                            }

                            function decrClass() {
                                var temp = document.getElementById("numClass").innerHTML;
                                document.getElementById("numClass").innerHTML = parseInt(temp) - 1;
                                document.getElementById("clsInp").value = parseInt(temp) - 1;
                            }
                            </script>

</body>

</html>