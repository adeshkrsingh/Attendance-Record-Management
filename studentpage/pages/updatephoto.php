include('connect.php');

// $post_image="profile/".$Email."/".$_FILES['image']['name']; //Original
    $file_size=$_FILES['image']['size'];
    $image_tmp=$_FILES['image']['tmp_name'];
    
      
     $root = filter_input(INPUT_SERVER, 'DOCUMENT_ROOT');
     $post_image = $_FILES['image']['name'];


 
    if ($file_size > 5000000) { echo "<script>alert('Sorry, your file is too large.')</script>"; }
    else
        {
         move_uploaded_file($image_tmp,$dir = $root . '/studentpage/pages/profile/'.$Email.'/'.$post_image);
         $sql3="UPDATE studentlogin set img='$post_image' where rollno='$UserID'";
         $result3 = $conn->query($sql3);
         echo "<script>alert('$post_image Updated successfully')</script>";
         echo "<script>window.open('student_profile.php','_self')</script>";
         }