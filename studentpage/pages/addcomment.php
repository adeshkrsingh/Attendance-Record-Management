<?php
		include "include/db.php";
		$postid = $_POST['postid'];
		 $sql="SELECT count(comment_Id) AS Maxc_id FROM tblcomment WHERE post_id='$postid'";
$result=mysqli_query($con,$sql);
$rows=mysqli_fetch_array($result);

// add + 1 to highest answer number and keep it in variable name "$Max_id". if there no answer yet set it = 1 
if ($rows) {
$Max_id = $rows['Maxc_id']+1;
}
else {
$Max_id = 1;
}
        $comment = mysqli_real_escape_string($con,$_POST['comment']);
       $commentId= $_POST['cmtId'];
       $userid = $_POST['userid'];
        
        date_default_timezone_set("Asia/India");
        $datetime=date("Y-m-d h:i:sa");
        $total = $commentId - 17;
        $comment = mysqli_query($con,"Insert into tblcomment (comment,post_Id,datetime) values ('$comment','$postid','$datetime') ");
        $sql = mysqli_query($con,"SELECT * from tblcomment  where post_Id='$postid' order by comment_Id desc ");
           echo "<div id='location'>";
	 while($row=mysqli_fetch_assoc($sql)){
                    if ($total < 0) { break ; }
                    else
                    {
                     echo "<p class='well'>"."<span id='".$row['comment_Id']."'></span>".$row['comment']."</p>";
                     $total = $toatal - 1;
                      $tbl_name2="tblpost";
$sql3="UPDATE $tbl_name2 SET reply='$Max_id' WHERE post_id='$postid'";
$result3=mysqli_query($con,$sql3);
                     }
              }

           echo "</div>";

              ?>