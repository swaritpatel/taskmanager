<?php 
   session_start();
   include "db_conn.php";

   $page = isset($_GET['page']) ? $_GET['page'] : 'student';
        // if($cat=='website-setting' && $subcat=='add-website-menu'){
          
        //   include('scripts/multilevel-script.php');
        // }
   if (isset($_SESSION['userid']) ) {   ?>

<!DOCTYPE html>
<html>

<head>
    <title>HOME</title>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <link rel="stylesheet" href="css/prop.css">
    <script src="js/scrpt.js"></script>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>


    <!-- for table search -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="js/filter.js"></script>
    <style type="text/css">
    h3 span {
        font-size: 22px;
    }

    h3 input.search-input {
        width: 300px;
        margin-left: auto;
        float: right
    }

    .mt32 {
        margin-top: 32px;
    }
    </style>
    <!-- table end -->

    <style>
    a {
        text-decoration: none;
    }
    </style>


    <!-- Including jQuery for alert dismiss -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js">
    </script>

    <!-- Including Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js">
    </script>
    <!-- script for automatic dismiss alert -->
    <script type="text/javascript">
    setTimeout(function() {

        // Closing the alert
        $('#ale').alert('close');
    }, 1000);
    </script>






</head>

<body>


    <!-- ////// -->

    <body id="body-pd">
        <header class="header" id="header">
            <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
            <div>
                Active &#128994; :

                <!-- ///////////////////////admin name-navbar////////////////////////// -->
                <?php if (1) {?>
                <?=$_SESSION['userid']?>

                <!-- //////////////////////////////// -->

                <img src="img/adminicon.png" alt="">
            </div>
        </header>
        <div class="l-navbar" id="nav-bar">
            <nav class="nav">
                <div> <a href="home.php" class="nav_logo"> <span class="nav_logo-name admi">
                            <img src="img/administrator.png" alt="">Administrator
                        </span> </a>
                    <div class="nav_list"> <a href="home.php" class="nav_link "> <i class='bx bx-grid-alt nav_icon'></i>
                            <span class="nav_name">Dashboard</span> </a> <a href="department.php" class="nav_link"> <i
                                class='fas fa-sitemap'></i><span class="nav_name">Departments</span> </a> <a
                            href="course.php" class="nav_link"> <i class='fas fa-book-open'></i> <span
                                class="nav_name">Courses</span> </a> <a href="instructor_admin.php" class="nav_link">
                            <i class='fas fa-chalkboard-teacher'></i> <span class="nav_name">Manage Instructors</span>
                        </a> <a href="adduser.php" class="nav_link active"> <i class='fas fa-user-plus'></i> <span
                                class="nav_name">Add
                                User</span> </a>
                        <a href="admin_profile.php" class="nav_link"> <i class='fas fa-id-card-alt'></i> <span
                                class="nav_name">Admin
                                Profile</span>
                        </a>

                        <!-- <a class="nav_link <?php echo ($page == 'settings')? 'active' : '' ?>" aria-current="page" href="./?page=settings"><i class="fa fa-cogs"></i> Settings</a> -->
                    </div>
                </div> <a href="logout.php" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span
                        class="nav_name">SignOut</span> </a>
            </nav>
        </div>


        <!--Container Main start-->
        <br />
        <div class="my-5  height-100 bg-light">


            <div class="container my-5">


                <!-- inserting data -->

                <!-- connection -->
                <?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "dbms_project";

$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
  die("Sorry we are unable to connect due to " . mysqli_connect_error());
}


if($_SERVER['REQUEST_METHOD']=='POST'){
  $query="select max(personid) as pid from person";
  $res=mysqli_query($conn,$query);
  $dat=$res->fetch_assoc();
  $perid=$dat['pid'];
  $perid=$perid+1;
  $query="select max(studentid) as sid from student";
  $res=mysqli_query($conn,$query);
  $dat=$res->fetch_assoc();
  $stuid=$dat['sid'];
  $stuid=$stuid+1;
  $query="select max(instructorid) as iid from instructor";
  $res=mysqli_query($conn,$query);
  $dat=$res->fetch_assoc();
  $iid=$dat['iid'];
  $iid=$iid+1;
// $name=$_POST['name'];
$fname=$_POST['fname'];
$mname=$_POST['mname'];
$lname=$_POST['lname'];
$gen=$_POST['gender'];
$usertype=$_POST['usertype'];
$password=$_POST['password'];
$deptno=$_POST['deptlist'];



$exist_data="SELECT * FROM person WHERE personid='$perid'";
$result=mysqli_query($conn,$exist_data);
$numRows=mysqli_num_rows($result);

if(0){
  echo'<div  id="ale" class="alert bg-danger alert-dismissible fade show" style="width:100%;" role="alert">
  <strong>Something went wrong!</strong> Please Enter new data or refresh this page.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}
else{
  

  $sql="INSERT INTO `person` (`PersonID`, `FirstName`, `MiddleName`, `LastName`, `Gender`) VALUES ('$perid', '$fname', '$mname', '$lname', '$gen');";

  $result=mysqli_query($conn,$sql);
  $user_t="";
  if($usertype=="s"){
    $user_t="Student";
    $sql=" INSERT INTO `student` (`StudentID`, `PassHash`,`PersonID`) VALUES ( '$stuid', '$password', '$perid' )";
  }
  else if($usertype=="i"){
    $sql=" INSERT INTO `instructor` (`InstructorID`, `PassHash`,`PersonID`,`DeptNo`) VALUES ( '$iid', '$password', '$perid',$deptno )";

    $user_t="Instructor";
  }

  $result=mysqli_query($conn,$sql);

echo '<div id="ale" class="alert bg-success alert-dismissible fade show" style="width:100%;" role="alert">
<strong>Successfully Added!</strong>&emsp;<strong>'.$fname.' '.$mname.' '.$lname.'</strong> added as <strong>'.$user_t.'</strong>.
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>
</div>';
}



}

?>











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




                <div class="container">
                    <div class="row justify-content-md-center " style=" background:#b7d3f1!important">
                        <div class="col col-lg-2">
                            <button id="Mybtn" class="btn "><i class='fas fa-user-plus'></i> Add Users</button>
                        </div>
                        <div class="col-md-auto">
                            <!-- Variable width content -->
                        </div>
                        <div class="col col-lg-2">
                            <button id="Mybtn_table" class="btn "><i class="fa fa-eye"></i> View Data</button>
                        </div>
                    </div>

                </div>



                <!-- Data hide/view end-->
                <!-- /////form -->

                <div id="MyForm" class="container">
                    <h4>Add New Student / Instructor</h4>
                    <form action="adduser.php" method="post" style="margin:0 2rem ">

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="usertype" id="Student" value="s" >
                            <label class="form-check-label" for="Student">Student</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="usertype" id="Instructor" value="i" >
                            <label class="form-check-label" for="Instructor">Instructor</label>
                        </div>


                        <div class="form-group">
                            <label for="fname" class="font-weight-bold">Enter Name</label>
                            <div class="container">

                                <div class="row">

                                    <input style="margin-right:1rem;" class="form-control col" id="fname" name="fname"
                                        rows="3" placeholder="First Name" required>
                                    <input style="margin-right:1rem;" class="form-control col" id="mname" name="mname"
                                        rows="3" placeholder="Middle Name">
                                    <input style="margin-right:1rem;" class="form-control col" id="lname" name="lname"
                                        rows="3" placeholder="Last Name">
                                </div>
                            </div>

                        </div>
                        <label for="deptlist" class="font-weight-bold">Select Department (applicable for instructor )</label>
                        <div class="container"id="dept-drop">

                            <select name="deptlist" class="form-select form-select-sm" aria-label=".form-select-sm example">
                                <?php
                                    $sql="select deptno,deptname from department ";
                                    $result=mysqli_query($conn,$sql);
    
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo '<option value="'.$row['deptno'].'">'.$row['deptname'].'</option>';
                                    }
                                    
                                ?>
                            </select>
                        </div>





                        <label for="#" class="font-weight-bold">Gender</label>
                        <br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="M">
                            <label class="form-check-label" for="inlineRadio1">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="F">
                            <label class="form-check-label" for="inlineRadio2">Female</label>
                        </div>




                        <div class="form-group">
                            <label for="username" class="font-weight-bold">Enter Password</label>
                            <input class="form-control" id="password" name="password" rows="3" placeholder="password"
                                required>
                        </div>

                        <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                </div>

                <!-- ////from-end -->

                <!-- new table -->
                <div class="container" id="MyTable">
                    <h3>
                        <span>View Data</span>
                        <input type="search" placeholder="Search..." class="form-control search-input"
                            data-table="customers-list" />
                    </h3>
                    <table class="table table-striped mt32 customers-list">
                        <thead>
                            <tr>
                                <th scope="col bg-dark">S.No.</th>
                                <th scope="col">Person ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
     $sql = "SELECT * FROM person";

     $result = mysqli_query($conn, $sql);
     $sn=0;

     while ($row = mysqli_fetch_assoc($result)) {
      $sn=$sn+1;
      
    
      echo " <tr>
      <th scope='row'>".$sn."</th>
      <td>".$row['PersonID']."</td>
     <td>".$row['FirstName']." ".$row['MiddleName']." ".$row['LastName']."</td>
      <td>".$row['Gender']."</td>
      <td> Successfully Enrolled </td>
     </tr> ";
  
     }
     ?>

                        </tbody>
                    </table>
                </div>
                <!-- new tab -->



                <!--Container Main end-->



                <!-- all users start -->
                <!-- <div class="p-3">
				<?php include 'php/members.php'; 
                 if (mysqli_num_rows($res) > 0) {?>
				<?php }?>
			</div> -->
                <!-- all users end -->


                <!-- user -->
                <?php }
		 else { ?>


                <?=$_SESSION['name']?>
                </h5>
                <a href="logout.php" class="btn btn-dark">Logout</a>
            </div>
        </div> 
        <?php } ?>

    <script>
   
    </script>
    </body>

</html>
<?php }else{
	header("Location: index.php");
} ?>