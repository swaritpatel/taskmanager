

<?php 
   session_start();
   include "db_conn.php";

   $page = isset($_GET['page']) ? $_GET['page'] : 'student';
        // if($cat=='website-setting' && $subcat=='add-website-menu'){
          
        //   include('scripts/multilevel-script.php');
        // }
   if (isset($_SESSION['userid'])) {   ?>




<!DOCTYPE html>
<html>

<head>
    <title>HOME</title>

  <!-- new -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



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
<script src=
"https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js">
	</script>

	<!-- Including Bootstrap JS -->
	<script src=
"https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js">
	</script>
<!-- script for automatic dismiss alert -->
<script type="text/javascript">
                      setTimeout(function () {
                  
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
            <div class="fs-3 font-weight-bold"> Update Student information </div>
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
                    <div class="nav_list"> <a href="home.php" class="nav_link active"> <i class='bx bx-grid-alt nav_icon'></i>
                            <span class="nav_name">Dashboard</span> </a> <a href="department.php" class="nav_link"> <i class='fas fa-sitemap'></i><span class="nav_name">Departments</span> </a> <a
                            href="course.php" class="nav_link"> <i class='fas fa-book-open'></i> <span
                                class="nav_name">Courses</span> </a> <a href="instructor_admin.php" class="nav_link"> 
                          <i class='fas fa-chalkboard-teacher'></i> <span class="nav_name">Manage Instructors</span> </a> <a
                            href="adduser.php" class="nav_link"> <i class='fas fa-user-plus'></i> <span class="nav_name">Add
                                User</span> </a>
								 <a href="admin_profile.php" class="nav_link"> <i class='fas fa-id-card-alt'></i> <span class="nav_name">Admin Profile</span>
                                    </a> 
                                    <!-- <a href="student_admin.php" class="nav_link"> <span class="nav_name">update data</span></a> -->
									<!-- <a class="nav_link <?php echo ($page == 'settings')? 'active' : '' ?>" aria-current="page" href="./?page=settings"><i class="fa fa-cogs"></i> Settings</a> -->
					</div>
                </div> <a href="logout.php" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span
                        class="nav_name">SignOut</span> </a>
            </nav>
        </div>
        <!--Container Main start-->
		<br/>
        
<!-- updation starts -->

<div class="container my-5">


<?php
    //creating connection
    // $conn = mysqli_connect('localhost','root','','dbms_project');
    // //checking connection
    // if($conn){
    //     echo "Connection Established";
    // }

    //if click on button take filed value & insert to db
    if(isset($_POST['btn'])){
        //finding input filed value into variable
        $username = $_POST['username'];
        $password = $_POST['password'];

        //if username & password field not empty perform insert operation
        if(!empty($username) && !empty($password)){
            //sql query // username string that's why keeping like string/text
            $query = "INSERT INTO users(username,password) VALUE('$username',$password)";

            //sending data to database
            $createQuery = mysqli_query($conn, $query);
            if($createQuery){
              echo '<div class="alert bg-success alert-dismissible fade show "style="width:100%;" role="alert">
  <strong>Data insertion successful!</strong> &emsp;<strong>'.$username.'</strong> added in our record.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
            }
        }
        else{
            echo '<div class="alert alert-warning alert-dismissible fade  show"style="width:100%;"  role="alert">
            <strong>Sorry!</strong> &emsp;Data field should not be empty.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
        }
    }
?>

<!-- code for delete  -->
<?php
  //if click on delete
  if(isset($_GET['delete'])){
    $stdid = $_GET['delete']; //keeping the delete id in stdid
    $query = "DELETE FROM student WHERE studentid={$stdid}";
    $deleteQuery = mysqli_query($conn, $query);
    if($deleteQuery){
      echo '<div class="alert alert-success alert-dismissible fade  show" style="width:100%;"  role="alert">
      <strong>Deletion Successful!</strong> &emsp;Data removed from our record.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
    }
  }

  
?>
    
    <div class=" p-4 mx-auto ">
        <form method="post" class="d-flex justify-content-around">
            <input class="form-control me-3" type="text" name="username" placeholder="Enter Name">
            <input class="form-control me-3" type="number" name="password" placeholder="Password">
            
            <!-- <input class="btn btn-outline-success" type="submit" value="Submit" name="btn"> -->

            <button type="button" class="btn btn-success">
                <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" fill="currentColor" class="bi bi-person-plus" viewBox="0 0 16 16">
  <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"></path>
  <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"></path>
</svg>
        
              </button>
        </form>
    </div>

    <div class="container  p-3 mx-auto">
        <form method="post" class="d-flex justify-content-around">
            <?php
              if(isset($_GET['update'])){ //if click on update button
                $stdid = $_GET['update']; //geting update id from search query
                $query = "SELECT * FROM student,person WHERE student.personid=person.personid And studentid={$stdid} ";
                $getData = mysqli_query($conn, $query); //getting data based on query

                while($rx=mysqli_fetch_assoc($getData)){ //keep data rx variable afte fetch

                  $fn=$rx['FirstName'];
            $mn=$rx['MiddleName'];
            $ln=$rx['LastName'];
            $username = $fn." ".$mn." ".$ln;
            $password = $rx['PassHash'];
          


                  $stdid = $rx['StudentID'];
            
               
            ?>
            <div class="row">
              
               
                  <div class="col">
                  <input class="form-control me-3" type="text" name="fname" value="<?php echo $fn ?>" >
                </div>
                  <div class="col">
                  <input class="form-control me-3" type="text" name="mname" value="<?php echo $mn ?>" >
                </div>
                  <div class="col">
                  <input class="form-control me-3" type="text" name="lname" value="<?php echo $ln ?>" >
                </div>
                
              <div class="col">
              <input class="form-control me-3" type="text" name="password" value="<?php echo $password ?>">
              </div>
            
            </div>
              
            
            
            <div class="col-md-auto">
            <input class="btn btn-primary" type="submit" value="Update" name="update-btn">
            </div>
            <div class="col col-lg-2">
            <?php 
                } 
              } ?>

              <?php
                if(isset($_POST['update-btn'])){
                  $password = $_POST['password'];
                  $fn=$_POST['fname'];
                  $mn=$_POST['mname'];
                  $ln=$_POST['lname'];
                 if(!empty($fn) && !empty($password)){
                  $query = "UPDATE person,student SET firstname='$fn', middlename='$mn', lastname='$ln', passHash='$password' WHERE student.personid=person.personid And studentid=$stdid";
                  $updateQuery = mysqli_query($conn, $query);
                  if($updateQuery){
                    // echo '<i class="fa fa-check"></i>';
                    echo '<div class="row">
                    <div id="ale" class="alert alert-success">
                     successful!
                    </div> 
                    </div>

                  </div>';
                  }
                 }

                }
              ?>
              </div>
              </div>
        </form>
    </div>

    <div class="container">

    <h3>
            <span>Search Data: </span>
            <input type="search" placeholder="Search..." class="form-control search-input" data-table="customers-list"/>
        </h3>

      <table class="table table-bordered  table-striped mt32 customers-list">
       <tr>
         <th>Person ID</th>
         <th>Full Name</th>.

         <th>Password</th>
         <th>Updation</th>
         <th>Deletion</th>
       </tr>
       
       <?php
       //select all query
        $query = "SELECT * FROM person,student Where person.personid=student.personid";
        //reading data from databse
        $readQuery = mysqli_query($conn, $query);
        // if table has more than 0 row then it will read data
        if($readQuery->num_rows >0){
          // if tables row > 0 read data from db and store the data into rd variable
          while($rd=mysqli_fetch_assoc($readQuery)){
            //'id' is the table column name which col will be read
            $stdid = $rd['StudentID']; // keeping data from db table to variable
            $fn=$rd['FirstName'];
            $mn=$rd['MiddleName'];
            $ln=$rd['LastName'];
            $username = $fn." ".$mn." ".$ln;
            $password = $rd['PassHash'];
          
       ?>
       <tr>
         <td><?php echo"$stdid" ?></td>
         <td><?php echo"$username" ?></td>
         <td><?php echo"$password" ?></td>
         <td><a href="student_admin.php?update=<?php echo"$stdid" ?>" >
        
         <button type="button" class="btn btn-outline-success">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
  <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"></path>
</svg>
                Edit
              </button>
        </a></td>
         <!-- passing query parameter id for perform delete while click on delete btn -->
         <td><a href="student_admin.php?delete=<?php echo"$stdid" ?>" >
        
         <button type="button" class="btn btn-outline-danger">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
</svg>
                delete
              </button>
        </a></td>
       </tr>
       <?php
          }
        }
        else{
          echo "No data to show";
        }
       
       ?>
        <!-- closing whitle & if php backet after using html -->
      </table>




    </div>
</div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>



    <!-- updation end -->
   
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
        </div> -->
        <?php } ?>

    </body>

</html>
<?php }else{
	header("Location: index.php");
} ?>