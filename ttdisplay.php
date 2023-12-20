<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam Time Table</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">

    <link href="https://fonts.googleapis.com/css?family=Be+Vietnam:400,600,800&display=swap" rel="stylesheet">

    <style>
        .datetime:hover {
            opacity: 0.5;
        }
        .wrap {
          display:flex;
          justify-content:center;
          position: relative;
          align-items:center;
          
        }
        .ww{
           position: absolute;
           left:0%;
           background-color: #2f4e78;
           height:40px ;
           border-radius: 2px;
           padding : 7px 13px;
           cursor: pointer;
           color: white;

           font-size: 0.8rem;
           font-weight: 600;
           transition: color 150ms ease-out;
           transition: background-color 150ms ease-out;
       }
       .ww:hover {
           color: #2f4e78;
           background-color: #A8DADC;
       }
       .www{
background:rgb(50 140 200);;

    height:40px ;
    border-radius: 2px;
    padding : 10px 15px;
  
    color: white;
    font-size: 0.8rem;
    font-weight: 600;
    transition: color 150ms ease-out;
    transition: background-color 100ms ease-out;
}
    </style>
</head>

<body>
<nav class="navbar navbar-expand-lg  text-white bg-dark">
<button type="button" class="btn btn-dark" onClick="logout1()">Logout</button>


</nav>
  <div class="container">
    <br><br>
<div class="wrap">
  <input type="button" value="Edit timetable" class="ww" onClick="logout()" />
<span class="www">EXAM TIME TABLE</span>
</div>


    <?php $servname = "localhost";
    $conn = new mysqli($servname, "root", "", "dbms_project");

    if ($conn->connect_error)
        die("Connection failed: " . $conn->connect_error);

    $courses = array();
    // if (isset($_SESSION["deptid"])) {
    # code...

    $sql = "SELECT DeptName, CourseID, CourseName, DateTime FROM TIMETABLE;";
    $res = $conn->query($sql);

    if ($res->num_rows > 0) {
        while ($row = $res->fetch_assoc()) {
            array_push(
                $courses,
                array($row['DeptName'], $row['CourseID'], $row['CourseName'], $row['DateTime'])
            );
        }
        // }
    }


    echo
        '
        <table class="table table-striped">
        <thead >
          <tr>
            <th scope="col">Department</th>
            <th scope="col">Course ID</th>
            <th scope="col">Course Name</th>
            <th scope="col">Date & Time</th>
            
          </tr>
        </thead>
        <tbody>
    ';
    for ($i = 0; $i < COUNT($courses); $i++) {
        echo
        '

  
  
    <tr>
      <td scope="row" class=" std-course-name"  name="crsnm' . $i . '" maxlength=45  value="' . $courses[$i][0] . '">' . $courses[$i][0] . '</th>
      <td scope="row" class=" std-course-name" name="crsnm' . $i . '" maxlength=45 value="' . $courses[$i][1] . '">' . $courses[$i][1] . '</th>
      <td scope="row" class=" std-course-name" name="crsnm' . $i . '" maxlength=45 value="' . $courses[$i][2] . '">' . $courses[$i][2] . '</th>
      <td scope="row" class=" std-course-name" name="crsnm' . $i . '" maxlength=45 value="' . $courses[$i][3] . '">' . $courses[$i][3] . '</th>
      
    </tr>
 
        

        
        
     

      ';
    }
    echo ' </tbody>
    </table>
  ';
    ?>
    </div>
    <script>
      function logout() {
                        
                        window.location.href = 'tt.php';
                    }
                    function logout1() {
                        document.cookie = "courseid" + '=;expires=Thu, 01 Jan 1970 00:00:01 GMT;';
                        document.cookie = "loggedin" + '=;expires=Thu, 01 Jan 1970 00:00:01 GMT;';
                        document.cookie = "logout=yes";
                        window.location.href = 'index.php';
                    }
    </script>
</body>

</html>