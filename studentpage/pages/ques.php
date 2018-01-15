<?php
session_start();
if (!isset($_SESSION['userRollNo'])) {
    header("location:/index.php");}

else{     
    include('connect.php');

    $userRollNo= $_SESSION["userRollNo"];
    
    $sql = "select * from studentlogin";
        $result = $conn->query($sql);
                  
          if ($result->num_rows > 0)
          {         
            while($row = $result->fetch_assoc())
              {
                 if ($row['rollno']==$userRollNo)
                       {
                        $UserID = $userRollNo;
                        $Name = $row['name'];
                        

                        
                        $email = $row['email'];
                        $dept = $row['dept'];
                        $sem= $row['semester'];
                        

                        $imgpresence = $row['img'];
                        if(!empty($imgpresence)) { $img = "/studentpage/pages/profile/".$UserID."/".$imgpresence ; }
                        else { $img = ""; }
                        $default='/defaultimg/user.png';
                                                        }
                                                 }
                                        }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Welcome</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

   

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">
    <link href="plugins/sweetalert/sweetalert.css" rel="stylesheet" />
    <link href="plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
<script src="plugins/sweetalert/sweetalert.min.js"></script>

   
    </head>
    <body>
<?php
include('include/db.php');

date_default_timezone_set("Asia/India");
                        $datetime=date("Y-m-d h:i:sa");
if(isset($_POST['submit'])){

$title=$_POST['title'];
$content=$_POST['content'];
$sql = "INSERT INTO tblpost(title,content,user_Id,datetime) VALUES ('$title','$content','$Name','$datetime')";
$res = mysqli_query($con,$sql);

if($res==true)
                            {
                                   echo '<script language="javascript">';
                                    echo 'swal({
  title: "Good job!",
  text: "You have successfully submit ths post",
  type: "success",
  showConfirmButton: false

});';
                                    echo '</script>';
                                    echo '<meta http-equiv="refresh" content="2;url=view.php" />';
                            }
else{
	echo "not Successfully";
}
}
?>
<?php } ?>
</body>
</html>