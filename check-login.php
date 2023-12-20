<?php  
session_start();
include "./db_conn.php";

if (isset($_POST['userid']) && isset($_POST['password']) ) {

	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}

	$userid = test_input($_POST['userid']);
	$password = test_input($_POST['password']);

	if (empty($userid)) {
		header("Location: ./index.php?error=User Name is Required");
	}else if (empty($password)) {
		header("Location: ./index.php?error=Password is Required");
	}else {

		// Hashing the password
		// $password = md5($password);
        

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$username = $_REQUEST['userid'];
			$password = $_REQUEST['password'];
			#$password = md5($password);
			
			// $servname = "localhost";
			// $conn = new mysqli($servname, "root", "", "dbms_project");
			
			// if ($conn->connect_error)
			//   die("Connection failed: " . $conn->connect_error);
			
			$sql = "SELECT StudentID, PassHash FROM STUDENT";
			$res = $conn->query($sql);
			
			$login = "none";
			if ($res->num_rows > 0) {
			  while ($row = $res->fetch_assoc()) {
				if ($row['StudentID'] == $username && $password == $row['PassHash']) {
				  $login = "student";
				  break;
				}
			  }
			}
		
			$sql = "SELECT InstructorID, PassHash FROM INSTRUCTOR";
			$res = $conn->query($sql);
			
			if ($res->num_rows > 0) {
			  while ($row = $res->fetch_assoc()) {
				if ($row['InstructorID'] == $username && $password == $row['PassHash']) {
				  $login = "instructor";
				  break;
				}
			  }
			}
		
			if ($username == 'admin' && $password == "1")
			  $login = "admin";
			
			$conn->close();
			
			if ($login == "none") {
			  echo
			  '<script>
				document.getElementById("invalid-login").innerHTML = "Invalid User Id or Password";
			  </script>';
			  session_unset();
			  session_abort();
			  header("Location: ./index.php?error=Incorect User name or password");
			}
			else {
			  echo
			  '<script>
				document.getElementById("invalid-login").innerHTML = "";
			  </script>';
			  
			  $_SESSION["userid"] = $username;
		
			  if ($_REQUEST["remember"] == "on") {
				setcookie("loggedin", "yes");
			  }
				  
			  if ($login == "admin") {
				
				$_SESSION["usertype"] = "admin";
				if ($_REQUEST["remember"] == "on")
				  setcookie("usertype", "admin");
		
				header("Location: home.php");
			  }
		
			  elseif ($login == "student") {
				$_SESSION["usertype"] = "student";
				if ($_REQUEST["remember"] == "on")
				  setcookie("usertype", "student");
		
				header("Location: stu_profile.php");
			  }
			  
			  elseif  ($login == "instructor") {
				$_SESSION["usertype"] = "instructor";
				if ($_REQUEST["remember"] == "on")
				  setcookie("usertype", "instructor");
		
				header("Location: instructor_profile.php");
			  }
			}
		  }






        // $sql = "SELECT * FROM users WHERE userid='$userid' AND password='$password'";
        // $result = mysqli_query($conn, $sql);

        // if (mysqli_num_rows($result) === 1) {
        // 	// the user name must be unique
        // 	$row = mysqli_fetch_assoc($result);
        // 	if ($row['password'] === $password && $row['role'] == $role) {
        // 		$_SESSION['name'] = $row['name'];
        // 		$_SESSION['id'] = $row['id'];
        // 		$_SESSION['role'] = $row['role'];
        // 		$_SESSION['userid'] = $row['userid'];

		// 		if($row['role']=='admin'){
        // 		header("Location: ./home.php");}
		// 		if($row['role']=='user'){
		// 			header("Location: ./stu_profile.php");
		// 		}

        // 	}else {
        // 		header("Location: ./index.php?error=Incorect User name or password");
        // 	}
        // }else {
        // 	header("Location: ./index.php?error=Incorect User name or ");
        // }

	}
	
}else {
	echo "adfadsfadsf";
}