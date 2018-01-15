<?php
$dept = $_POST['dept'];
$branch = array('it', 'cs', 'me', 'ee', 'ec', 'ce', 'ch');
if (in_array($dept, $branch))
 {
     $conn=mysqli_connect("localhost","risinola_ironman","ironman123");
  $db=mysqli_select_db($conn,"risinola_academics");
 
 $dbf = "select * from currentsession";
 $r2= $conn->query($dbf);
 if ($r2->num_rows > 0)
   {          
    while($row1 = $r2->fetch_assoc())
     {
       $dbname =  $row1[$dept]; 
     }
   }
  
     
     // getting database information risinola_it_2016_2017
// $dbname =  "risinola_it_2016_2017" ;
  $conn=mysqli_connect("localhost","risinola_ironman","ironman123");
  $db=mysqli_select_db($conn,$dbname);

  $sql = "SHOW TABLES FROM $dbname";
  $result = $conn->query($sql);
  if (!$result) 
    {
    echo "DB Error, could not list tables\n";
    echo 'MySQL Error: ' . mysql_error();
    exit;
    }




//collecting table attributes
$tbname = Array();
$tbnamearchieve = Array();
$array = array();
while ($row = mysqli_fetch_row($result))
    {
   // echo "Table: {$row[0]}\n";
    array_push($tbname , $row[0]);
    
    }
//print_r($tbname);
for($i = 0 ; $i<4 ; $i = $i +1 )
   { 
         $temptbname = $tbname[$i];
         $result = $conn->query("SHOW COLUMNS FROM ".$temptbname );
         
         if (!$result) { continue; }
         if (mysqli_num_rows($result) > 0)
          {         
                    $tablenameforarchieve = date("dmY").date("hisa").$temptbname;
                    array_push($tbnamearchieve , $tablenameforarchieve );
                    $tablestmt = "CREATE TABLE "." ".$tablenameforarchieve." (";
            while ($row = mysqli_fetch_assoc($result))
           {  $count = 0;
            foreach ($row as $key => $value)
              {
                   if($count >1){ continue ; }
                   // array_push($array, $value2); break; 
                  // echo $value2."</br>"; $tablestmt .= " ".$key ." ".$value;
                   else { $tablestmt .= " ".$value; $count = $count +1; }
                   
                  
                } 
                $tablestmt .= ",";
              } 
              $l = strlen($tablestmt);
              $tablestmt = substr($tablestmt, 0,$l-1);
              $tablestmt .= ")";
             // echo "</br>".$tablestmt ; 
               array_push($array, $tablestmt );
            }
           
            echo "</br>";
    }
    

print_r($array);


    
//creating new tables in archieve database and updating index
$conn=mysqli_connect("localhost","risinola_ironman","ironman123");
$db=mysqli_select_db($conn,"risinola_archieve");

    foreach ($array as $key => $value)
              {
                 $sql2 = '$value';
                 $result = $conn->query($value);
              }
      $archievedate = date("Y-m-d");        
    foreach ($tbnamearchieve as $key => $value)
              {
                 $sql2 = "INSERT INTO `risinola_archieve`.`index` (`id`, `tablename`, `oldtbname`, `dept`, `date`) VALUES (NULL, '$value', '$tbname[$key]', '$dept', '$archievedate')";
                 $result = $conn->query($sql2 );
              }
              


//now moving data to new tables in archieve database and clearing table for new semester 
$truncatetable = array('tutemgmt', 'submgmt', 'tasks', 'studentlist');
$conn=mysqli_connect("localhost","risinola_ironman","ironman123");
foreach ($tbnamearchieve as $key => $value)
              {
                 $sql2 = "INSERT INTO risinola_archieve.$tbnamearchieve[$key] SELECT * from $dbname.$tbname[$key]";
                 $result = $conn->query($sql2);
                 
                 
                 if (in_array($tbname[$key], $truncatetable))
                 {  $sql2 = "truncate $dbname.$tbname[$key]"; $result = $conn->query($sql2); }
                 else
                 {  $sql2 = "DROP TABLE $dbname.$tbname[$key] ;"; $result = $conn->query($sql2); }
              }



mysql_free_result($result);
return ;
 }
 else
 { return ; }

?>