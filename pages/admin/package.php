<?php
class admin
{




  	function admin()
	{

	}

    
    function getstructuretableonly($dbname, $tbname)
    {
      $con=mysqli_connect("localhost","risinola_ironman","ironman123");
      @mysqli_select_db($dbname);

        $array = array(); 
         $result = $con->query("SHOW COLUMNS FROM ".$tbname);
         if (!$result) { return 0; }
         if (mysqli_num_rows($result) > 0)
          { echo "hello";
            while ($row = mysqli_fetch_assoc($result))
           {
            foreach ($result as $key => $value)
              {
                foreach ($value as $key2 => $value2) 
                  {
                    array_push($array, $value2); break; 
                  } 
                } 
              } 
            }

        return $array;
    }

    function getstructuretable($dbname, $tbname)
    {      
    $con=mysqli_connect("localhost","risinola_ironman","ironman123");
 $db=mysqli_select_db($con,$dbname);
    

        $array = array(); $array2D =array();
         $result = $con->query("SHOW COLUMNS FROM ".$tbname);
         if (!$result) { return 0; }
         if (mysqli_num_rows($result) > 0) { while ($row = mysqli_fetch_assoc($result))
           { foreach ($result as $key => $value) { foreach ($value as $key2 => $value2) { array_push($array, $value2); break; } } } }

        array_push($array2D, $array);
        $sql  = "select * from ".$tbname;
        $result = $con->query($sql);
        if ($result->num_rows > 0)
          {   
          while($row = $result->fetch_assoc())
             { $arraytemp = array(); for ($i=0; $i < sizeof($array) ; $i++) {  array_push($arraytemp, $row[$array[$i]]);  } 
               array_push($array2D, $arraytemp);
             }
          
          } array_push($array2D, "adesh");
    return $array2D;
    }
    
}
?>