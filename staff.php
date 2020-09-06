<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>staffs</title>
    
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/staff.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</head>
<body style="background-color:rgb(244, 253, 244);">


<?php
       require 'connection.php';
       
    error_reporting(E_ALL & ~ E_NOTICE);
// =========================UPLOADING IMAGE============================//

       $uploadOk = 0;
        $target_dir = "imgUploads/";
        $target_file = $target_dir.basename($_FILES['uploadImg']['name']);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
       

        if(isset($_POST['uploadbtn'])){
                $verifyImage = getimagesize($_FILES['uploadImg']['tmp_name']);
                if($verifyImage==true){
                    echo 'file is an image';
                    $uploadOk=1;
                }else{
                    $uploadOk=0;
                }



                if($uploadOk==1){
                    if(move_uploaded_file($_FILES['uploadImg']['tmp_name'], $target_file)){
                         echo 'image uploaded successfully';
                    }else{
                        echo 'there was a problem uploading this image. please choose another';
                    }
                 }

               

    



} // upload btn terminal






//=========================================FORM VALIDATION=======================================//
        $errMsg ='';
        $SerrMsg='';
        $regOk = 0;
        
       if(isset($_POST['register'])){
        
           $name = $_POST['username'];
           $password = $_POST['password'];
           $class = $_POST['class'];
           $matric = $_POST['matric'];
           $gender = $_POST['gender'];
           $profile = $_POST['profile'];       
           $staff = $_POST['staff'];
           
           
           $selectpsw = "SELECT * FROM students WHERE password = '$password' LIMIT 1";
           $selectPswQuery = mysqli_query($connect, $selectpsw);
           $comfirm = mysqli_num_rows($selectPswQuery);
           
      
            if($comfirm == 0){
                if($staff=='12345'){
                    $insert = "INSERT INTO students(names, password, matric, gender, class, Images)VALUES ('$name', '$password', '$matric', '$gender', '$class', '$profile')";
                    $insertQuery = mysqli_query($connect, $insert);
                            if($insertQuery){
                                echo "<script>alert('student registered successfully')</script>";  
                            }
                }else{
                    $SerrMsg='You are not a staff!!! /n Please get the permission of the modrosa to register student';
                }
            }else{
                $errMsg='password already exist. Please select a new password';
            }

        
           
       }// if isset register terminal


       ?>







        
        <div class="mx-auto d-block text-center" id="head">
            <span data-toggle="modal" data-target="#myModal" id="icon" class="float-left"> &#9776;</span>
            <span id="title" class="name"> مدرسة خير الأدب للدراسات العربية والإسلامية</span>
       
       </div>
       
       
       
       <div id="forms" class="mx-auto d-block text-center">
       
            <?php
            
            echo "<img src='$target_file' width='100px' height='100px' style=' margin-top:30px; border-radius:50%;' alt=''>"
            
            ?>
            
            <form action="staff.php" enctype="multipart/form-data" method="post">
                <div><span name= "errMsg" class="errmsg" style="color:red"> Select student's Image</span></div>
                <input type="file" name="uploadImg" id="uploadImg"><br> 
                <input type="submit" name="uploadbtn" value="click to view selected Image" style="width:100px" id="uploadbtn">
            </form>  
        
       
            <h2 style="color:goldenrod">New Student's Account</h2>
                
                <form action="staff.php" class="reg" method="post">
                    
                    <input type="hidden" name = "profile" value = "<?php echo $target_file?>" >
                    <div class="form-group">
                        <label for="staff">Staff ID </label> <br>
                        <input type="text" class="" name="staff" id="staff"  required>
                        <span name= "errMsg" class="errmsg" style="color:red"><?php echo "$SerrMsg" ?></span>
                    </div>

                    
                    <div class="form-group">
                        <label for="username"> Student's name </label> <br>
                        <input type="text" class="" name="username" id="username"  required>
                    </div>

                    
                    <div class="form-group">
                        <label for="class"> class </label> <br>
                        <input type="class" class="" name="class" id="class"  required>
                    </div>

                    
                    <div class="form-group">
                        <label for="password">Set Student's Password </label> <br>
                        <input type="password" class="" name="password" id="password"  required>
                        <span name= "errMsg" class="errmsg" style="color:red"><?php echo "$errMsg" ?></span>
                    </div>

                    
                    <div class="form-group">
                        <label for="firstname"> matric number </label> <br>
                        <input type="text" class="" name="matric"  id="year" required>
                    </div>
                   
                    
                    <div class="form-group">
                        <label for="gender"> Gender </label> <br>
                        <select name="gender" id="gender" class="" >
                            <option>Male</option>
                            <option>Female</option>
                        </select>
                    </div>
                    
                    
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Register" id="register" name="register">  
                    </div>
                </form>
       
       
       
       
       
       
        </div>  
       
   


        <div class="modal fade" id="myModal">
        <div class="modal-dialog">
          <div class="modal-content">
          
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">PAGE ICON</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body" style="color:goldenrod">
              <div class="list-group">
                  <a href="index.html" class="list-group-item list-group-item-action" style="color: goldenrod; font-weight: bold;">Home</a>
                  <a href="login.php" class="list-group-item list-group-item-action" style="color: goldenrod; font-weight: bold;">  Students </a>
                  <a href="staff.php" class="list-group-item list-group-item-action" style="color: goldenrod; font-weight: bold;">Registration Portal</li></a>
                  <a href="stud_list.php" id="list" class="list-group-item list-group-item-action" style="color: goldenrod; font-weight: bold;">Student List</a>
                  <a href="about.html" class="list-group-item list-group-item-action" style="color: rgb(153, 19, 19); font-weight: bold;" >About Developer</a>
              </div>
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
            
          </div>
        </div>
      
      
    </div>

</body>
</html>