


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
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
    a {
        text-decoration: none;
    }
    </style>

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

<script src="js/watch.js"></script>

</head>

<body>


    <!-- ////// -->

    <body id="body-pd">
        <header class="header" id="header">
            <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
            <div class="fs-3 font-weight-bold"> Admin Profile </div>
            <div>
                Active &#128994; :

                <!-- ///////////////////////admin name-navbar////////////////////////// -->
                <?php if (1) {?>
                <?php $n=$_SESSION['userid']?>
                
                <?php echo $n?>
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
                            <span class="nav_name">Dashboard</span> </a> <a href="department.php" class="nav_link"> <i class='fas fa-sitemap'></i><span class="nav_name">Departments</span> </a> <a
                            href="course.php" class="nav_link"> <i class='fas fa-book-open'></i> <span
                                class="nav_name">Courses</span> </a> <a href="instructor_admin.php" class="nav_link"> 
                          <i class='fas fa-chalkboard-teacher'></i> <span class="nav_name"> Manage Instructors</span> </a> <a
                            href="adduser.php" class="nav_link "> <i class='fas fa-user-plus'></i> <span class="nav_name">Add
                                User</span> </a>
								 <a href="admin_profile.php" class="nav_link active"> <i class='fas fa-id-card-alt'></i> <span class="nav_name">Admin Profile</span>
                                    </a> 
					
									<!-- <a class="nav_link <?php echo ($page == 'settings')? 'active' : '' ?>" aria-current="page" href="./?page=settings"><i class="fa fa-cogs"></i> Settings</a> -->
					</div>
                </div> <a href="logout.php" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span
                        class="nav_name">SignOut</span> </a>
            </nav>
        </div>
        <!--Container Main start-->
		<br/>
        <div class="my-5  height-100 bg-light">
            

            <div class="row my-5">
               <!-- Admin-profile -->
<div class="card">
<div class="row">
    <div class="col">
  <h5 class="card-header">Username: <?php echo $n ?> <i style="color:green;"class="bi bi-patch-check-fill"></i></h5>
  </div>
  <div class="col-md-auto">
  <h5 class="card-header"><a href="logout.php" > <i class='bx bx-log-out nav_icon'></i> SignOut</a></h5>
  </div>
  <!-- watch -->
<div class="col col-lg-2">
<div class=" bg-success text-white">
<h3 class=" text-center">
<div class="d-flex flex-wrap justify-content-center mt-2">
<a><span class="badge hours"></span></a> :
<a><span class="badge min"></span></a> :
<a><span class="badge sec"></span></a>
</div>
</h3>
</div>
</div>


 </div>
<div class="card-body">
 <div class="row">
    <div class="col col-lg-2">
    <!-- <h5 class="card-title"> -->
    
  <img class="card-img-top" src="img/admin.png" alt="Card image cap " style="width:100px;height:100px;border-radius:50%; object-fit:cover; ">

    <!-- </h5> -->
     </div>
     <div class="col">
     <h5><i class="bi bi-arrow-right-circle"></i> <?php echo $n ?></h5>
     </div>
    <!-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a> -->
  </div>
</div>
</div>


<!-- Data hide/view -->
<style>
/* 	 */
#MyTable{
display: none;
width: 100%;
border: 1px solid #ccc;
padding: 14px;
background: #ececec;
}	
</style>
<script>
$(document).ready(function(){
$('#Mybtn_table').click(function(){
$('#MyTable').toggle(500);
});
});
</script>

<!-- ///// -->
<style>
/* 	 */
#My_instructor_table{
display: none;
width: 100%;
border: 1px solid #ccc;
padding: 14px;
background: #ececec;
}	
</style>
<script>
$(document).ready(function(){
$('#Mybtn_instructor_table').click(function(){
$('#My_instructor_table').toggle(500);
});
});
</script>


<!-- /// -->
<!-- <div class="container"> -->
<div class="row my-5  border-top border-left border-right">
 <div class="col col-lg-6 border-right">
    
  <!-- <img src="..." class="card-img-top" alt="..."> -->
  
    <h5 class="text-center">Student information</h5>
   
    <div class="container"><div class="row justify-content-center">
        <button id="Mybtn_table" class="btn btn-outline-success "><i class="fa fa-eye"></i> View Data</button>
    </div></div>



 <!-- ////// -->
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
                <th scope="col bg-dark">PID</th>
                <th scope="col">FullName</th>
                <th scope="col">PassWord</th>
                <!-- <th scope="col">Name</th> -->
                
                </tr>
            </thead>
            <tbody>
            <?php
     $sql = "SELECT * FROM student,person where student.personid=person.personid";

     $result = mysqli_query($conn, $sql);
     $sn=0;

     while ($row = mysqli_fetch_assoc($result)) {
      $sn=$sn+1;
      $fn=$row['FirstName'];
      $mn=$row['MiddleName'];
      $ln=$row['LastName'];
      $username = $fn." ".$mn." ".$ln;
    
      echo " <tr>
      <th>".$sn."</th>
      <th scope='row'>".$row['PersonID']."</th>
      <td>".$username."</td> 
      
     <td>".$row['PassHash']."</td>
      
     </tr> ";
  
     }
     ?>

            </tbody>
        </table>
    </div>
    </div>
 <!-- new tab -->

 
 <div class="col col-lg-6 border-left">
 
  <!-- <img src="..." class="card-img-top" alt="..."> -->
 
    <h5 class=" text-center">Instructor information</h5>
   
    <div class="container"><div class="row justify-content-center"><button id="Mybtn_instructor_table" class="btn btn-outline-success"><i class="fa fa-eye"></i> View Data</button></div></div>

<!-- /// -->
<!-- new table -->
<div class="container" id="My_instructor_table">
        <h3>
            <span>View Data</span>
            <input type="search" placeholder="Search..." class="form-control search-input" data-table="customers-list"/>
        </h3>
        <table class="table table-striped mt32 customers-list">
            <thead>
                <tr>
                <th scope="col bg-dark">S.No.</th>
                <th scope="col">PID</th>
                <th scope="col">FullName</th>
                <th scope="col">Password</th>
                
                </tr>
            </thead>
            <tbody>
            <?php
     $sql = "SELECT * FROM instructor,person where instructor.personid=person.personid";

     $result = mysqli_query($conn, $sql);
     $sn=0;

     while ($row = mysqli_fetch_assoc($result)) {
      $sn=$sn+1;
      
    
      echo " <tr>
      <th>".$sn."</th>
      <td>".$row['PersonID']."</td>
     <td>".$row['FirstName']."</td>
      <td>".$row['PassHash']."</td>
      
     </tr> ";
  
     }
     ?>

            </tbody>
        </table>
    </div>



 <!-- //// -->
 </div>
<!-- </div> -->

 
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
        <!-- <a href="logout.php" class="btn btn-dark">Logout</a> -->
        </div>
        </div> -->
        <?php } ?>

    </body>

</html>
<?php }else{
	header("Location: index.php");
} ?>