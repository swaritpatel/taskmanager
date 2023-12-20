


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
                            <span class="nav_name">Dashboard</span> </a> <a href="department.php" class="nav_link active"> <i class='fas fa-sitemap'></i><span class="nav_name">Departments</span> </a> <a
                            href="course.php" class="nav_link"> <i class='fas fa-book-open'></i> <span
                                class="nav_name">Courses</span> </a> <a href="instructor_admin.php" class="nav_link"> 
                          <i class='fas fa-chalkboard-teacher'></i> <span class="nav_name">Manage Instructors</span> </a> <a
                            href="adduser.php" class="nav_link"> <i class='fas fa-user-plus'></i> <span class="nav_name">Add
                                User</span> </a>
								 <a href="admin_profile.php" class="nav_link"> <i class='fas fa-id-card-alt'></i> <span class="nav_name">Admin Profile</span>
                                    </a> 
					
									<!-- <a class="nav_link aria-current="page" href="./?page=settings"><i class="fa fa-cogs"></i> Settings</a> -->
					</div>
                </div> <a href="logout.php" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span
                        class="nav_name">SignOut</span> </a>
            </nav>
        </div>

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

// else{
//   echo" ";
// }

// if($_SERVER['REQUEST_METHOD']=='POST'){
// $DepartmentNo=$_POST['DepartmentNo'];
// $DepartmentName=$_POST['DepartmentName'];
// $Head=$_POST['Head'];
// // $password=$_POST['password'];



// $exist_data="SELECT * FROM department where DeptNo='$DepartmentNo'";
// $result=mysqli_query($conn,$exist_data);
// $numRows=mysqli_num_rows($result);

// if($numRows>0){
//   echo'error';
// }
// else{
// $sql=" INSERT INTO 'department' ('DeptNo', 'DeptName','Head') VALUES ( '$DepartmentNo', '$DepartmentName', '$Head')";
// $sql="INSERT INTO 'department' ('DeptNo', 'DeptName', 'Head') VALUES ('12', 'EE', '565555')";
// $result=mysqli_query($conn,$sql);

// echo '<div class=" my-3 text-center alert alert-success alert-dismissible fade show" role="alert">
//  Successfully Added.
//    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
//      <span aria-hidden="true">&times;</span>
//    </button>
//  </div> ';
// }



// }

?>





		<br/>
    
            <div class="row my-5">
                <?php 
    
// counting courses
$sql = "SELECT count(*) FROM department ";
$result = $conn->query($sql);
  
// Display data on web page
while($row = mysqli_fetch_array($result)) {
    echo ' 
    
	<div class="col-sm-12">
	  <div class="card">
		<div class="card-body bg-primary">
		  <h1 class="card-title text-center ">Total Departments : '. $row['count(*)'].'
		
</h1>


		</div>
	  </div>

	</div>';



}


 ?>





<!-- new table -->
<div class="container" id="MyTable">
        <h3>
            <span>View Data</span>
            <input type="search" placeholder="Search..." class="form-control search-input" data-table="customers-list"/>
        </h3>
        <table class="table table-striped mt32 customers-list">
            <thead>
                <tr>
                <th scope="col bg-dark">S.No.</th>
          <th scope="col ">Department No.</th>
          <th scope="col">Department Name</th>
          <th scope="col">Head</th>
          
                </tr>
            </thead>
            <tbody>
            <?php
     $sql = "SELECT * FROM `department`";

     $result = mysqli_query($conn, $sql);
     $sn=0;

     while ($row = mysqli_fetch_assoc($result)) {
      $sn=$sn+1;
      
    
      echo " <tr>
      <th scope='row'>".$sn."</th>
      <td>".$row['DeptNo']."</td>
     <td>".$row['DeptName']."</td>
      <td>".$row['Head']."</td>
     </tr> ";
  
     }
     ?>

            </tbody>
        </table>
    </div>
<!-- new tab -->




<!-- table-end -->


            </div>

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
<?php }else{
	header("Location: index.php");
} ?>