<?php
require("../../fpdf/fpdf.php");
$x= "Adesh Kumar Singh";

$arrayrollno =explode(',', $_POST['vpdfroll']);

$arrayname=explode(',', $_POST['result']);

$arraypresent =explode(',', $_POST['vpdfpresence']);

$arrayTotal =$_POST['vpdftotal'];
$arraysubname=$_POST['vpdfsubname'];
$arraysemester=$_POST['vpdfsemester'];
$arraysession=$_POST['vpdfsession'];


$pdf= new FPDF();
$pdf->AddPage();
$pdf->SetAutoPageBreak(true);

$pdf->Image('../../defaultimg/biet-logo.png',8,8, 30, 30);

$pdf->SetFont("Arial", "B", 15.5);

    // Cell(width, height, data, border, sameOrNextLine, Allignment); height and width are default auto
$pdf->Cell(0, 8, "Bundelkhand Institute of Engineering & Technology, Jhansi", 0, 1, "R");

$pdf->SetFont("Arial", "I", 8);
$pdf->Cell(0, 8, "(A Constituent College of Dr. A.P.J. Abdul Kalam Technical University U.P. Lucknow)", 0, 1, "R");
$pdf->SetFont("Arial", "B", 12);

$pdf->Cell(0, 8, "ATTENDANCE, ASSIGNMENT, CLASS TEST,SESSIONAL MARKS     ", 0, 1, "R");
$pdf->Cell(0, 8, "AND LECTURE NOTES UPLOADING SYSTEM                     ", 0, 1, "R");
$pdf->SetFont("Arial", "" , 9);
$pdf->Cell(0, 8, "STUDENT PERFORMANCE REPORT", 1, 1, "C");

//$pdf->Image('a.jpg',8,8,-300);

$pdf->Ln(2);
$pdf->SetFont("Arial", "" , 10);
$pdf->Cell(30, 8, "Course       :", 0, 0);
$pdf->Cell(70, 8, "B. Tech", 0, 0);

$pdf->Cell(30, 8, "Subject Code:", 0, 0);
$pdf->Cell(70, 8, "$arraysubname", 0, 1);

$pdf->Cell(30, 8, "Session      :", 0, 0);
$pdf->Cell(70, 8, "$arraysession", 0, 0);

$pdf->Cell(30, 8, "Semester         :", 0, 0);
$pdf->Cell(70, 8, "$arraysemester", 0, 1);


//$txt = "adesh kumar singhadesh kumar singhadesh kumar singhadesh kumar singhadesh kumar singhadesh kumar singhadesh kumar singhadesh kumar singhadesh kumar singhadesh kumar singhadesh kumar singhadesh kumar singhadesh kumar singhadesh kumar singhadesh kumar singhadesh kumar singhadesh kumar singhadesh kumar singhadesh kumar singhadesh kumar singhadesh kumar singhadesh kumar singhadesh kumar singhadesh kumar singhadesh kumar singhadesh kumar singhadesh kumar singhadesh kumar singhadesh kumar singh";   
//$pdf->MultiCell(0,5,$txt);

$pdf->SetFont("Arial", "B" , 12);
$pdf->Cell(0, 8, "Attendance Detail", 0, 1, "C");

        $pdf->Cell(50, 8, "RollNo", 0, 0);
  	$pdf->Cell(50, 8, "Name", 0, 0);
  	$pdf->Cell(50, 8, "Total Present", 0, 0);
  	$pdf->Cell(50, 8, "Total Class", 0, 1);
  	
  	$pdf->SetFont("Arial", "" , 12);
foreach ($arrayrollno  as $key => $value) {
  	$pdf->Cell(50, 8, "$arrayrollno[$key]", 0, 0);
  	$pdf->Cell(50, 8, "$arrayname[$key]", 0, 0);
  	$pdf->Cell(50, 8, "$arraypresent[$key]", 0, 0);
  	$pdf->Cell(50, 8, "$arrayTotal", 0, 1);
  }

     $pdf->SetY(0);
    // Select Arial italic 8
    $pdf->SetFont('Arial','I',8);
    // Print centered page number
    $pdf->Cell(0,10,'Page '.$pdf->PageNo(),0,0,'C');

$pdf->Output();
?>