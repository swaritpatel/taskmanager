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
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>


    <style>
    a {
        text-decoration: none;
    }
    </style>
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
                    <div class="nav_list"> <a href="home.php" class="nav_link active"> <i
                                class='bx bx-grid-alt nav_icon'></i>
                            <span class="nav_name">Dashboard</span> </a> <a href="department.php" class="nav_link"> <i
                                class='fas fa-sitemap'></i><span class="nav_name">Departments</span> </a>
                        <a href="course.php" class="nav_link"> <i class='fas fa-book-open'></i> <span
                                class="nav_name">Courses</span> </a> <a href="instructor_admin.php" class="nav_link">
                            <i class='fas fa-chalkboard-teacher'></i> <span class="nav_name">Manage Instructors</span>
                        </a> <a href="adduser.php" class="nav_link"> <i class='fas fa-user-plus'></i> <span
                                class="nav_name">Add
                                User</span> </a>
                        <a href="admin_profile.php" class="nav_link"> <i class='fas fa-id-card-alt'></i> <span
                                class="nav_name">Admin Profile</span>
                        </a>

                        <!-- <a class="nav_link <?php //echo ($page == 'settings')? 'active' : '' ?>" aria-current="page" href="./?page=settings"><i class="fa fa-cogs"></i> Settings</a> -->
                    </div>
                </div> <a href="logout.php" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span
                        class="nav_name">SignOut</span> </a>
            </nav>
        </div>
        <!--Container Main start-->
        <br />
        <div class="my-5  height-100 bg-light">


            <div class="row my-5">
                <!-- Fetch all the categories and use a loop to iterate through categories -->
                <?php 
    // counting users    
$sql = "SELECT count(*) FROM student  ";
$result = $conn->query($sql);
  
// Display data on web page
while($user = mysqli_fetch_array($result)) {
    echo ' 
    
	<div class="col-sm-3">
	  <div class="card">
		<div class="card-body bg-primary">
		  <h1 class="card-title text-center">'. $user['count(*)'].'</h1>
		  <h3 class="text-center">Students</h3>
		</div>
	  </div>
	</div>';



} 

// counting admins
$sql = "SELECT count(*) FROM instructor  ";
$result = $conn->query($sql);
  
// Display data on web page
while($row = mysqli_fetch_array($result)) {
    echo ' 
    
	<div class="col-sm-3">
	  <div class="card">
		<div class="card-body bg-primary">
		  <h1 class="card-title text-center">'. $row['count(*)'].'</h1>
		  <h3 class="text-center">Instructors</h3>
		</div>
	  </div>

	</div>';



}

// counting courses
$sql = "SELECT count(*) FROM course ";
$result = $conn->query($sql);
  
// Display data on web page
while($row = mysqli_fetch_array($result)) {
    echo ' 
    
	<div class="col-sm-3">
	  <div class="card">
		<div class="card-body bg-primary">
		  <h1 class="card-title text-center">'. $row['count(*)'].'</h1>
		  <h3 class="text-center">courses</h3>
		</div>
	  </div>

	</div>';



}

// counting courses
$sql = "SELECT count(*) FROM department ";
$result = $conn->query($sql);
  
// Display data on web page
while($row = mysqli_fetch_array($result)) {
    echo ' 
    
	<div class="col-sm-3">
	  <div class="card">
		<div class="card-body bg-primary">
		  <h1 class="card-title text-center">'. $row['count(*)'].'</h1>
		  <h3 class="text-center">Departments</h3>
		</div>
	  </div>

	</div>';



}


 ?>


            </div>
            <!-- updation card -->

            <div class="row my-3 justify-content-center">
                <div class="col-4">
                    <div class="card" style="width: 25rem;">
                        <!-- <img src="..." class="card-img-top" alt="..."> -->
                        <div class="card-body">
                            <h5 class=" text-center">Update Student information</h5>
                            <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                            <a href="student_admin.php" class="btn  stretched-link"></a>
                        </div>
                    </div>
                </div>

                <div class="col-4">
                    <div class="card" style="width: 25rem;">
                        <!-- <img src="..." class="card-img-top" alt="..."> -->
                        <div class="card-body">
                            <h5 class="text-center">Update Instructor information</h5>
                            <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                            <a href="instructor_admin.php" class="btn  stretched-link"></a>
                        </div>
                    </div>
                </div>



                <div class="col-4">
                    <div class="card" style="width: 25rem;">
                        <!-- <img src="..." class="card-img-top" alt="..."> -->
                        <div class="card-body">
                            <h5 class=" text-center">Update /View timetable</h5>
                            <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                            <a href="tt.php" class="btn  stretched-link"></a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- updation card-end -->




        </div>

        <!--Container Main end-->
        <!-- /////////// -->





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



        </h5>
        <a href="logout.php" class="btn btn-dark">Logout</a>
        </div>
        </div> -->
        <?php } ?>

    </body>

</html>
<?php } ?>