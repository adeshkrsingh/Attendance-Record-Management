<?php


$start = 1404313001;
$end   = 1404313005;
$cat = "R";
$sem = "4";
$academic = "2015-2016";
$k = 0;

for ($i=$start; $i < $end ; $i++)
{   echo "<br>".++$k."<br>";
	 $ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "http://anujtestmodule.online/pages/admin/curl2.php");
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_POST, 1);
    $stmt = "rollno=".$i."&resultCat=".$cat."&seme=".$sem."&Acedemic=".$academic;
    curl_setopt($ch, CURLOPT_POSTFIELDS, $stmt);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER , 1);  // RETURN THE CONTENTS OF THE CALL
    $res = curl_exec($ch);

    print_r(json_decode($res)); echo "<br>";
    curl_close($ch);
}






/*

curl_setopt($ch, CURLOPT_URL, "http://localhost/1/curl2.php");
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "rollno=1404313006&resultCat=R&seme=4&Acedemic=2015-2016");
curl_setopt($ch, CURLOPT_RETURNTRANSFER , 1);  // RETURN THE CONTENTS OF THE CALL
$res = curl_exec($ch);

print_r(json_decode($res));
curl_close($ch);

*/

?>