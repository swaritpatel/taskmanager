<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam Time Table</title>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">

    <link href="https://fonts.googleapis.com/css?family=Be+Vietnam:400,600,800&display=swap" rel="stylesheet">

    <style>
        .datetime:hover{
            opacity: 0.5;
        }
        .rect-circ-t{
          background:gray;
          height: 80px;
          border-radius:40px;
          padding:10px;
          box-sizing:border-box;
          margin:3rem;

        }
        .wrap {
          display:flex;
          justify-content:space-between;
          align-items:center;
          
        }
        .apply-btn {
         
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

.apply-btn:hover {
    color: #2f4e78;
    background-color: #A8DADC;
}
.ww{
           
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
.mybutton {
  background:blue;
  border:none;
  border-radius:5px;
  height:30px;
}
.mybutton:hover {
  background:aqua;
  color:white;
}

    </style>
</head>

<body>
<nav class="navbar navbar-expand-lg  text-white bg-dark">
<button type="button" class="btn btn-dark" onClick="logout1()">Logout</button>


</nav>
  <div class="container">
 




       <?php
    $servname = "localhost";
    $conn = new mysqli($servname, "root", "", "dbms_project");

    if ($conn->connect_error)
        die("Connection failed: " . $conn->connect_error);

    ?>


    <form class="course-info-container" method="post" action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>">
      <div class="wrap">
      <input type="button" style="border:none;" value="view timetable" class="apply-btn" onClick="logout()" />
      <span class="www"  >EDIT EXAM TIME TABLE</span>
      <input type="submit"  value="Commit Changes" class="ww" />
    </div>

        <?php
        $courses = array();
        // if (isset($_SESSION["deptid"])) {
        # code...

        $sql = "SELECT DEPARTMENT.DeptName, COURSE.CourseID, COURSE.CourseName FROM COURSE, DEPARTMENT WHERE course.DeptNo = department.DeptNo;";
        $res = $conn->query($sql);

        if ($res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
                array_push(
                    $courses,
                    array($row['DeptName'], $row['CourseID'], $row['CourseName'])
                );
            }
            // }
        }

     

        for ($i = 0; $i < COUNT($courses); $i++) {
            // echo "d";
            $j = $i + 1;
            if (isset($_POST['datetime'.$i]) && $_POST['datetime'.$i]!="") {
                # code...

                // $sql = "UPDATE COURSE SET InstructorID = '";
                // $sql .= $_POST['insid' . $i] . "', CourseName = '";
                // $sql .= $_POST['crsnm' . $i] . "', CourseID = '";
                // $sql .= $_POST['crsid' . $i] . "' WHERE CourseID = '" . $courses[$i][0] . "'";
                // $res = $conn->query($sql);

                $sql = "UPDATE TIMETABLE SET TIMETABLE.DateTime = '";
                $sql .= $_POST['datetime'.$i]."' WHERE timetable.id = '$j'";
         
                $res = $conn->query($sql);
                // $dat=$res->fetch_assoc();
                // echo $dat;

                // echo 'chutiye';

            }
        }



// 
        
      //     <tr>
      //       <th scope="row">2</th>
      //       <td>Jacob</td>
      //       <td>Thornton</td>
      //       <td>@fat</td>
      //     </tr>
      //     <tr>
      //       <th scope="row">3</th>
      //       <td>Larry</td>
      //       <td>the Bird</td>
      //       <td>@twitter</td>
      //     </tr>
      //   </tbody>
      // </table>
      






        echo
        '
        <table class="table table-striped">
        <thead >
          <tr>
            <th scope="col">Department</th>
            <th scope="col">Course&nbsp;ID</th>
            <th scope="col">Course Name</th>
            <th scope="col">Edit</th>
            
          </tr>
        </thead>
        <tbody>
    ';
   

        for ($i = 0; $i < COUNT($courses); $i++) {
            echo
            '

           
  
    <tr>
      <td  class=" std-course-name"  name="crsnm' . $i . '" maxlength=45  value="'. $courses[$i][0] .'">' . $courses[$i][0] . '</th>
      <td  class=" std-course-name" name="crsnm' . $i . '" maxlength=45 value="'. $courses[$i][1] .'">' . $courses[$i][1] . '</th>
      <td  class=" std-course-name" name="crsnm' . $i . '" maxlength=45 value="'. $courses[$i][2] .'">' . $courses[$i][2] . '</th>
      <td  class=" std-course-name" ><input type="datetime-local" id="datetime" class="datetime" name="datetime' . $i . '" ></th>

    </tr>
  
            
          
        

        
        
    

      ';
        }
        echo '</tbody></table>';
        // class="course-info-course"

        // class="form-group col-md-4"
        // class="form-control"

        // <input value="'.$courses[$i][0].'" name="crsnm'.$i.'"
        //     class="rect-round-sm std-course-name" maxlength=45/>

        //       <input value="'.$courses[$i][1].'" name="crsid'.$i.'"
        //         class="rect-round-sm std-course-id" maxlength=5/>

        //       <input value="'.$courses[$i][2].'" name="crsnm'.$i.'"
        //         class="rect-round-sm std-course-name" maxlength=45/>
        ?>
    </form>
<!-- JavaScript Bundle with Popper -->
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script>
  function logout() {
                        
                        window.location.href = 'ttdisplay.php';
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