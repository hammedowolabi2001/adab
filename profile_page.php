<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profile_page</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/profile_page.css">
</head>
<body class= "bg-success">
    <?php
    error_reporting(E_ALL &~ E_NOTICE);
    require 'connection.php';
    
    
//     $name = $_POST['username'];
//     $password = $_POST['password'];

//     $_SESSION['name']= $name;
//     $_SESSION['password'] = $password;

//     $sname=  $_SESSION['name'];
//     $spassword =  $_SESSION['password'];

//     $select = "SELECT * FROM students WHERE matric = '$sname' AND password= '$spassword'";
//     $query= mysqli_query($connect, $select);

//    $row = mysqli_fetch_assoc($query);

//    $studName = $row['names'];
//    $studMatric = $row['matric'];
//    $studClass = $row['class'];
//    $studGender = $row['gender'];
//    $images = $row['Images'];
   
      
    
    
    
    
    
    ?>
    
        <div id="title" class="mx-auto d-block text-center">
            <span class="modrosaName"> مدرسة خير الأدب للدراسات العربية والإسلامية</span>
        </div>
    


    <div class="head" id="head">
        <a href="index.html"><span id="home" class="tabs">Home</span></a> 
        <a href="login.php"><span id="students" class="tabs">Students</span></a>
        <a href="staff.php"><span id="staff" class="tabs">Staff</a></span></a>
        <span id="contacts" class="tabs">Contacts</span>
       
    </div>
    
        
        <div class="mx-auto d-block text-center" id="image">
           <?php
           $images = $_SESSION['Images'];
              echo "<img src='$images' alt =''>";
           ?>
        
        </div>
    

    
    <div class="mx-auto d-block text-center">
            <span class="nameLabel">اسم الطالب: </span> <span class="name"><?php echo $_SESSION['names']; ?></span> <br>
            <span class="nameLabel">رقم التسجيل: </span> <span class="name"><?php echo $_SESSION['matric']; ?></</span> <br>
            <span class="nameLabel">صف: </span> <span class="name"><?php echo $_SESSION['class']; ?></</span> <br>
            <span class="nameLabel">جنس: </span> <span class="name"><?php echo $_SESSION['gender']; ?></</span> <br>
         </div>

        
    
    
</body>
</html>