<?php
class admin
{
    // additing global variable
  	function admin()
	{

	}

	function getstructuretable($dbname, $tbname)
    {      
      $conn=mysqli_connect("localhost","risinola_ironman","ironman123");
      $db=mysqli_select_db($conn,$dbname);

        $array = array(); $array2D =array();
         $result = $conn->query("SHOW COLUMNS FROM ".$tbname);
         if (!$result) { return 0; }
         if (mysqli_num_rows($result) > 0) { while ($row = mysqli_fetch_assoc($result))
           { foreach ($result as $key => $value) { foreach ($value as $key2 => $value2) { array_push($array, $value2); break; } } } }

        array_push($array2D, $array);
        $sql  = "select * from ".$tbname;
        $result = $conn->query($sql);
        if ($result->num_rows > 0)
          {   
          while($row = $result->fetch_assoc())
             { $arraytemp = array(); for ($i=0; $i < sizeof($array) ; $i++) {  array_push($arraytemp, $row[$array[$i]]);  } 
               array_push($array2D, $arraytemp);
             }
           
          }
    return $array2D;
    }
    
   
     function generateoption()
    {
    $array = array();
      $conn=mysqli_connect("localhost","risinola_ironman","ironman123");
      $db=mysqli_select_db($conn,"risinola_academics");
            $sql = "select LId from logindetail where UType='faculty' or UType='hod'";
              $result = $conn->query($sql);
               if ($result->num_rows > 0)
                  {   
                   while($row = $result->fetch_assoc())
                      { 
                        $lid = $row['LId'];
                        array_push($array, $lid);
                      }
                  }
      return $array;
    }
    
    
    function UpdateValue($db, $tb, $getpos, $setpos, $getcond, $setcond)
    {
     $conn=mysqli_connect("localhost","risinola_ironman","ironman123");
      $db=mysqli_select_db($conn,$db);
      
        $sql = "UPDATE $tb SET $getpos='$setpos' WHERE $getcond='$setcond'";
       $result = $conn->query($sql);
    }
}
?>