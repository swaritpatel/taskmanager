
<?php
  session_start();
?>

<?php
  $servname = "localhost";
  $conn = new mysqli($servname, "root", "", "dbms_project");

  if ($conn->connect_error)
    die("Connection failed: " . $conn->connect_error);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Instructor</title>

    <link rel="stylesheet" href="css/instructor.css">
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">

    <link href="https://fonts.googleapis.com/css?family=Be+Vietnam:400,600,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <style>
    .wrapt {
        background-color: rgba(53, 183, 212, 0.9);
        color: white;
        width: 400px;
        height:50px;
        border-radius:25px;
        display:flex;
        justify-content:center;
        align-items:center;
        cursor:pointer;
        padding:1rem;
        margin:1rem;
        margin-left:1rem;
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
    </style>



<!-- signout icon -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <?php
$n="to be decided";
?>
    <nav class="navbar navbar-expand-lg  text-white bg-dark">
        Online🟢:
    <?php echo $_SESSION["userid"] ?> 


        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active ">
                    <!-- <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a> -->
                </li>
              
            </ul>
            
            <div class="col-md-auto " onClick="logout()">
                    <h5 class='card-header'>
                        <span class="rect-circ bx bx-log-out nav_icon"><i class="fa fa-sign-out"></i></span>
                    </h5>
                </div>
        </div>
    </nav>
    <center>
    <div class="user-label rect-circ wrapt">
        <span class="rect-circ">INSTRUCTOR</span>
    </div>
  </center>
 

    <div class="container my-2">
        <div class="card">
            <div class="row">
                <div class="col">
                    <h5 class="card-header">UserID: <?php echo $_SESSION["userid"] ?> <i style="color:green;"
                            class="bi bi-patch-check-fill"></i></h5>
                </div>
                
        
  <!-- watch -->
  <div class="col col-lg-2 bg-success "style="font-size:20px; text-align:center; color:white; padding: 0px 0px">

 <script >
function myClock() {         
  setTimeout(function() {   
    const d = new Date();
    const n = d.toLocaleTimeString();
    document.getElementById("demo").innerHTML = n; 
    myClock();             
  }, 1000)
}
myClock();


</script> 

      <div id="demo"></div>


</div>
</div>

</div>




            <div class="card-body">
                <div class="row">
                    <div class="col col-lg-2">
                        <!-- <h5 class="card-title"> -->

                        <img class="card-img-top" src="img/instruct_avatar.png" alt="Card image cap "
                            style="width:100px;height:100px;border-radius:50%; object-fit:cover; ">

                        <!-- </h5> -->
                    </div>
                    <div class="wra col">



                        <?php
    $sql = "SELECT InstructorID, PersonID FROM INSTRUCTOR
            WHERE INSTRUCTOR.InstructorID = ".$_SESSION["userid"];
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

    echo '<div class="row">
    <h5>Name : </h5>
    <span> &nbsp; '.$name.'</span>
</div>';
echo '<div class="row">
    <h5>ID : </h5>
    <span> &nbsp; '.$_SESSION["userid"].'</span>
</div>';
  ?>




                        <!-- <div class="row">
                            <h5>Name : </h5>
                            <h5> &nbsp; Hari</h5>
                        </div> -->







                        <div class="row">
                            <h5>Department : </h5>





                            <?php
                            
                            $sql = "SELECT DEPARTMENT.DeptNo, DEPARTMENT.DeptName
                                    FROM INSTRUCTOR, DEPARTMENT
                                    WHERE INSTRUCTOR.InstructorID = ".$_SESSION["userid"].
                                    " AND INSTRUCTOR.DeptNo = DEPARTMENT.DeptNo";
                            $res = $conn->query($sql);
                          
                            if ($res->num_rows > 0) {
                              while ($row = $res->fetch_assoc()) {
                                echo "<span> &nbsp".$row['DeptName']."</span>";
                                $_SESSION["deptid"] = $row['DeptNo'];
                              }
                            }
                          ?>





                        </div>
                    </div>
                    <!-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a> -->
                </div>
            </div>

        </div>
    </div>

    <div class="page-container">


        <div class="dept-label">

        </div>

        <?php
if(isset($_SESSION["userid"])){
      $sql = "SELECT * FROM Department WHERE Head = '";
      $sql .= $_SESSION["userid"]."'";
      $res = $conn->query($sql);
      $data_array = $res->fetch_assoc();
      
      if ( $res->num_rows > 0) {
      
        echo

        '<center><div  onclick="location.href = '."'course-info.php'".'">
        
          <span class=" wrapt"style="min-width:400px;">EDIT DEPARTMENT COURSES</span>
        
    </div></center>
';
      }
}
?>

        




        <div class="container">
            <table class="table table-striped">
                <thead>
                    <tr>

                        <th scope="col">S.No.</th>
                        <th scope="col">CourseID</th>
                        <th scope="col">Course</th>
                        <th scope="col">Students</th>
                        <th scope="col">Classes</th>
                        <th scope="col">Update</th>
                    </tr>
                </thead>
                <tbody>


                    <?php
  $courses = array();

  $sql = "SELECT COURSE.CourseID, COURSE.CourseName, CCOUNT.Cnt, COURSE.ClassesTaken
          FROM COURSE, (
                        SELECT UNDERTAKES.CourseID, COUNT(UNDERTAKES.StudentID) AS Cnt
                        FROM COURSE, UNDERTAKES
                        WHERE COURSE.InstructorID = ".$_SESSION["userid"].
                        " AND COURSE.CourseID = UNDERTAKES.CourseID
                        GROUP BY UNDERTAKES.CourseID) CCOUNT
          WHERE COURSE.CourseID = CCOUNT.CourseID";
  $res = $conn->query($sql);

  if ($res->num_rows > 0) {
    while ($row = $res->fetch_assoc()) {
      array_push($courses,
        array($row['CourseID'], $row['CourseName'], $row['Cnt'], $row['ClassesTaken']));
    }
  }

  $ii=0;

  for ($i = 0; $i < COUNT($courses); $i++) 
  {
    $ii=$i+1;
    echo
    ' <tr>
    <th scope="row">'.$ii.'</th>
    <td>'.$courses[$i][0].'</td>
    <td>'.$courses[$i][1].'</td>
    <td>'.$courses[$i][2].'</td>
    <td>'.$courses[$i][3].'</td>
    <td><button type="button"  class="mybut" id="'.$courses[$i][0].'" onClick="send('.$courses[$i][0].')"><i class="bi bi-pencil-square"></i></button></td>
</tr>';
  }
?>
                </tbody>
            </table>


        </div>

    </div>

    <script>
    function logout() {
        document.cookie = "courseid" + '=;expires=Thu, 01 Jan 1970 00:00:01 GMT;';
        document.cookie = "loggedin" + '=;expires=Thu, 01 Jan 1970 00:00:01 GMT;';
        document.cookie = "logout=yes";
        window.location.href = 'index.php';
    }

    function send(str) {
        document.cookie = "courseid=" + str.id;
        window.location.href = "instructor-data.php";
    }
    </script>

</body>

</html>