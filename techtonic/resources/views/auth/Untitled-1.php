task1.css:
  .employeeList tbody tr td.blue {
    border-bottom: 2px solid #93b2cf;
    color: #95bbdf;
    font-weight: bold;
  }
  
  .employeeList td {
    padding: 14px;
  }

  .employeeList {
    border-collapse: collapse;
    box-shadow: 0 0 18px rgba(0, 0, 0, 0.19);
    color: #474a48;
  }

  
  .employeeList th {
    padding: 18px 14px;
  }
  
  .employeeList tbody tr {
    border-bottom: 1px solid #ccc8c8;
  }
  
  
  .employeeList thead tr {
    background-color: #81acd4;
    color: #f5f5f5;
    text-align: left;
  }

  
  img {
    object-fit: cover;
  }
  

 
  

index.php:
<?php

include_once("./config.php");

$query_output = mysqli_query($sql_handler, 
        "SELECT 
            emp1.picPath,
            CONCAT(emp1.firstName, ' ' ,emp1.lastName) AS fullName, 
            emp1.email, 
            emp1.jobTitle, 
            CONCAT(of.addressLine1, ' ', CONCAT_WS(', ', of.addressLine2, of.city, of.state, of.country)) AS officeAddress,
            CONCAT(emp2.firstName, ' ' ,emp2.lastName, ', ', emp2.jobTitle) AS reportsTo,
            emp1.employeeNumber
        FROM employees emp1 
        JOIN offices of ON emp1.officeCode = of.officeCode 
        JOIN employees emp2 ON emp1.reportsTo = emp2.employeeNumber");
?>

<html>
<head>
    <title>All Employees</title>
    <link rel="stylesheet" href="task1.css">
</head>

<body>
    
    <table class="employeeList" width="85%">
        <thead>
            <tr>
                <th></th>
                <th>Name</th>
                <th>Email</th>
                <th>Job Title</th>
                <th>Emp Office Address</th>
                <th>Reports To</th>
                <th>Update</th>
            </tr>
        </thead>
        <?php
        while($row = mysqli_fetch_assoc($query_output)) {
            $row['picPath'] = is_null($row['picPath']) ? "https://www.kindpng.com/picc/m/24-248253_user-profile-default-image-png-clipart-png-download.png" : $row['picPath'];     
            echo "<tbody><tr>"; 
            echo "<td><a href=\"edit.php?id=$row[employeeNumber]\"><img width='110px' height='125px' src='".$row['picPath']."'/></a></td>";     
            echo "<td class='blue'>".$row['fullName']."</td>";
            echo "<td>".$row['email']."</td>";
            echo "<td>".$row['jobTitle']."</td>";
            echo "<td>".$row['officeAddress']."</td>";
            echo "<td>".$row['reportsTo']."</td>";
            echo "<td><a href=\"edit.php?id=$row[employeeNumber]\">Edit</a> | <a href=\"delete.php?id=$row[employeeNumber]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";   
            echo "</tbody></tr>";   
        }
        $sql_handler->close();
        ?>
    </table>    
</body>
</html>



Task 1 screenshot:
 

 

Task 2:
add.php:
<html>
<head>
    <title>Add Employee</title>
</head>

<body>
<?php

include_once("config.php");
$imgPrepend = './imgs/';
if(isset($_POST['Submit'])) {   
    $id = mysqli_real_escape_string($sql_handler, $_POST['id']);
    $fname = mysqli_real_escape_string($sql_handler, $_POST['firstName']);
    $lname = mysqli_real_escape_string($sql_handler, $_POST['lastName']);
    $extension = 'x' . mysqli_real_escape_string($sql_handler, $_POST['extension']);
    $email = mysqli_real_escape_string($sql_handler, $_POST['email']);
    $offCode = mysqli_real_escape_string($sql_handler, $_POST['officeCode']);
    $reportsTo = mysqli_real_escape_string($sql_handler, $_POST['reportsTo']);
    $jobName = mysqli_real_escape_string($sql_handler, $_POST['jobTitle']);
    $imgPath = mysqli_real_escape_string($sql_handler, $_POST['picPath']);
        
    // checking empty fields                           ||empty($imgPath)
    if(empty($id) ||empty($fname) ||empty($lname) || empty($extension) || empty($email)||empty($offCode) ||empty($reportsTo)||empty($jobName)) {
                
        if(empty($id)) {
            echo "<font color='red'>ID field is empty.</font><br/>";
        }
        if(empty($fname)) {
            echo "<font color='red'>First Name field is empty.</font><br/>";
        }
        if(empty($lname)) {
            echo "<font color='red'>Last Name field is empty.</font><br/>";
        }
        
        if(empty($extension)) {
            echo "<font color='red'>Extension field is empty.</font><br/>";
        }
        
        if(empty($email)) {
            echo "<font color='red'>Email field is empty.</font><br/>";
        }
        if(empty($offCode)) {
            echo "<font color='red'>Office Code field is empty.</font><br/>";
        }
        if(empty($reportsTo)) {
            echo "<font color='red'>Reports To field is empty.</font><br/>";
        }
        if(empty($jobName)) {
            echo "<font color='red'>Job Title field is empty.</font><br/>";
        }
        if(empty($imgPath)) {
            echo "<font color='red'>Profile Picture field is empty.</font><br/>";
        }
        
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else { 
            
        $imgPath = $imgPrepend . $imgPath;
        $result = mysqli_query($sql_handler, "INSERT INTO `employees`(`picPath`, `employeeNumber`, `lastName`, `firstName`, `extension`, `email`, `officeCode`, `reportsTo`, `jobTitle`) VALUES ('$imgPath','$id','$fname','$lname','$extension','$email','$offCode','$reportsTo','$jobName')");    
        echo "<font color='green'><strong>Employee Added Successfully</strong>";
        echo "<br/><a href='index.php'>View Employees</a>";
    }
    
    $sql_handler->close();
}
?>
</body>
</html>


index.html:
<html>
  <head>
    <title>Add Employee</title>
    <link rel="stylesheet" href="task1.css">

  </head>

  <body>
    <a href="index.php">Home</a>
    <br /><br />

    <form action="add.php" method="post" name="form1">
      <div style="width: 20%">
        <div class="row">
          <label>ID</label>
          <input type="number" name="id" required />
        </div>
        <div class="row">
          <label>First Name</label>
          <input type="text" name="firstName" required />
        </div>
        <div class="row">
          <label>Last Name</label>
          <input type="text" name="lastName" required />
        </div>
        <div class="row">
          <label>Extension</label>
          <input type="number" name="extension" required />
        </div>
        <div class="row">
          <label>Email</label>
          <input type="email" name="email" required />
        </div>
        <div class="row">
          <label>Office Code</label>
          <input type="number" name="officeCode" required />
        </div>
        <div class="row">
          <label>Reports To</label>
          <input type="number" name="reportsTo" required />
        </div>
        <div class="row">
          <label>Job Title</label>
          <input type="text" name="jobTitle" required />
        </div>
        <div class="row">
          <label for="img">Profile Picture:</label>
          <input type="file" name="picPath" accept="image/*" />
        </div>
        <div class="row">
          <input type="submit" name="Submit" value="Add" />
        </div>
      </div>
    </form>
  </body>
</html>



 edit.php:
<?php

include_once("./config.php");
$imgPrepend = './imgs/';

if(isset($_POST['Edit'])){    

    

    $reportsTo = mysqli_real_escape_string($sql_handler, $_POST['reportsTo']);
    $id = mysqli_real_escape_string($sql_handler, $_POST['id']);
    $extension = 'x' . mysqli_real_escape_string($sql_handler, $_POST['extension']);
    $email = mysqli_real_escape_string($sql_handler, $_POST['email']);
    $jobName = mysqli_real_escape_string($sql_handler, $_POST['jobTitle']);
    $offCode = mysqli_real_escape_string($sql_handler, $_POST['officeCode']);
    $imgPath = mysqli_real_escape_string($sql_handler, $_POST['picPath']);
    $fname = mysqli_real_escape_string($sql_handler, $_POST['firstName']);
    $lname = mysqli_real_escape_string($sql_handler, $_POST['lastName']);
    

    
    // checking empty fields
    if(empty($id) ||empty($fname) ||empty($lname) || empty($extension) || empty($email)||empty($offCode) ||empty($reportsTo)||empty($jobName)) {
                
      
        if(empty($reportsTo)) {
            echo "<font color='red'>Reports To field is empty.</font><br/>";
        }

        if(empty($fname)) {
            echo "<font color='red'>First Name field is empty.</font><br/>";
        }
        if(empty($lname)) {
            echo "<font color='red'>Last Name field is empty.</font><br/>";
        }

        if(empty($jobName)) {
            echo "<font color='red'>Job Title field is empty.</font><br/>";
        }
        
        if(empty($extension)) {
            echo "<font color='red'>Extension field is empty.</font><br/>";
        }
        
        if(empty($email)) {
            echo "<font color='red'>Email field is empty.</font><br/>";
        }

     
        if(empty($id)) {
            echo "<font color='red'>ID field is empty.</font><br/>";
        }
       

        if(empty($offCode)) {
            echo "<font color='red'>Office Code field is empty.</font><br/>";
        }

       
        
        
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else {    
      $imgPath = $imgPrepend . $imgPath;
        $query_output = mysqli_query($sql_handler, "UPDATE employees SET firstName='$fname',lastName='$lname',extension='$extension',email='$email',officeCode='$offCode',reportsTo='$reportsTo',jobTitle='$jobName',picPath='$imgPath' WHERE employeeNumber=$id");
        
        $sql_handler->close();
        header("Location: index.php");
    }
}
?>

<?php
$id = $_GET['id'];

$query_output = mysqli_query($sql_handler, "SELECT * FROM employees WHERE employeeNumber=$id");

while($res = mysqli_fetch_array($query_output)){
    $fname =  $res['firstName'];
    $lname =  $res['lastName'];
    $extension =  substr($res['extension'],1);
    $email =  $res['email'];
    $offCode =  $res['officeCode'];
    $reportsTo = $res['reportsTo'];
    $jobName =  $res['jobTitle'];
    $imgPath =  $res['picPath'];

}
$sql_handler->close();
?>

<html>
<head>  
    <title>Edit Data</title>
    <link rel="stylesheet" href="task1.css">

    
</head>

<body>
    <a href="index.php">Home</a>
    <br/><br/>
    <form action="edit.php" method="post" name="form1">
      <div style="width: 80%">
        <div class="row">
          <label>First Name</label>
          <input type="text" name="firstName" required value="<?php echo $fname ;   ?>"/>
        </div>
        <div class="row">
          <label>Last Name</label>
          <input type="text" name="lastName" required value="<?php echo $lname ;   ?>"/>
        </div>
        <div class="row">
          <label>Extension</label>
          <input type="number" name="extension" required value="<?php echo $extension ;   ?>"/>
        </div>
        <div class="row">
          <label>Email</label>
          <input type="email" name="email" required value="<?php echo $email ;   ?>"/>
        </div>
        <div class="row">
          <label>Office Code</label>
          <input type="number" name="officeCode" required value="<?php echo $offCode ;   ?>"/>
        </div>
        <div class="row">
          <label>Reports To</label>
          <input type="number" name="reportsTo" required value="<?php echo $reportsTo ;   ?>"/>
        </div>
        <div class="row">
          <label>Job Title</label>
          <input type="text" name="jobTitle" required value="<?php echo $jobName ;   ?>"/>
        </div>
        <div class="row">
          <label for="img">Profile Picture:</label>
          <input type="file" name="picPath" accept="image/*" />
        </div>
        <div class="row">
            <td><input type="hidden" name="id" value="<?php echo $_GET['id'];?>"></td>
            <td><input type="submit" name="Edit" value="Edit"></td>
        </div>
      </div>
    </form>
            
        
</body>
</html>




Task 2 screenshot:
  
 


 
Task 3:
sign-in.php:
<?php

session_start();
$_SESSION['user'] = "Fatima";
$_SESSION['cms'] = 284892;

setcookie("Class", "SE-10B", time() + (46400), "/"); 
echo($_SESSION['user']. '! You have logged In.');
echo("<br>Cookies have been set");
echo "<br/><a href='index.php'>View Content</a>";

?>


sign-up.php:
<?php

session_start();
session_unset();
session_destroy();

echo("Signed out!<br>");
echo('Sign In again to view content');
echo ("<br/><a href='sign-in.php'>Sign In Page</a>");
?>



Task 3 screenshot:
 
 
