<?php
require('fpdf.php');

$equipment='STETHOSCOPE';

   

class PDF extends FPDF
{
// Page header
//global $title;
function Header()
{
    // Logo

    $this->Image('logo.png',15,15,22,30);
    // Arial bold 15
    $this->SetFont('Arial','B',20);
    // Move to the right
    // Title
    $this->Cell(0,20,"PSG COLLEGE OF TECHNOLOGY",0,0,'C');$this->Cell(0,45);
    $this->Ln(3);
    $this->SetFont('Arial','',14);
    $this->Cell(0,28,"PSG Center for Industrial Research & Development",0,0,'C');
    $this->Ln(1);
    $this->Cell(0,36,"Calibration and Test Center",0,0,'C');
    $this->Ln(5);
    $this->SetFont('Arial','',11);
    $this->Cell(0,39,"New Admin Block, PSGCT Campus, Peelamedu, Coimbatore-641004",0,0,'C');
    $this->Ln(5);
   // $this->SetFont('Arial','',11);
    $this->Cell(0,39,"Email: ask@ird.psgitech.ac.in Ph : 422 4344762, 4344223",0,0,'C');
    $this->Ln(30);
}
function LoadData($file)
{
    // Read file lines
    $lines = file($file);
    $data = array();
    foreach($lines as $line)
        $data[] = explode(';',trim($line));
    return $data;
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
   // $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}

 
function DescriptionTable($header, $data)
{
        $this->SetFont('Arial','UB',11);
     $this->Cell(0,0,"Description Unit Under Test",0,0,'C');//$this->Cell(0,45);
     $this->Ln(5);
    // Column widths
    $w = array(70, 19, 18, 18,45);
    // Header
    $this->SetFont('Arial','B',11);
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C');
    $this->Ln();
    // Data
    $this->SetFont('Arial','',10);
    //$this->SetLineWidth(1);
    foreach($data as $row)
    {
        
        $this->Cell($w[0],6,$row[0],'LR');
       // $this->Cell($w[0]/2,30,$row[0],'LR');
        $this->Cell($w[1],6,$row[1],'LR');
        $this->Cell($w[2],6,$row[2],'LR');
        $this->Cell($w[3],6,$row[3],'LR');
         $this->Cell($w[4],6,$row[4],'LR');
        $this->Ln();
    }
    // Closing line
    $this->Cell(array_sum($w),0,'','T');
         $this->Ln(5);
    }

function CalibrationEquipmentTable($header, $data)
{
        $this->SetFont('Arial','UB',11);
     $this->Cell(0,0,"Standards/Calibration equipment used",0,0,'C');//$this->Cell(0,45);
     $this->Ln(5);
    // Column widths
    $w = array(60, 20, 35, 25,30);
    // Header
    $this->SetFont('Arial','B',11);
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C');
    $this->Ln();
    // Data
    $this->SetFont('Arial','',10);
    //$this->SetLineWidth(1);
    foreach($data as $row)
    {
        
        $this->Cell($w[0],6,$row[0],'LR');
       // $this->Cell($w[0]/2,30,$row[0],'LR');
        $this->Cell($w[1],6,$row[1],'LR');
        $this->Cell($w[2],6,$row[2],'LR');
        $this->Cell($w[3],6,$row[3],'LR');
         $this->Cell($w[4],6,$row[4],'LR');
        $this->Ln();
    }
    // Closing line
    $this->Cell(array_sum($w),0,'','T');
    $this->Ln(0);
    $this->SetFont('Arial','B',10);
$this->Cell(170,7,'Environmental Conditions at the time of calibration ',1,1,'C');
$this->Cell(170/3,8,'Temperature',1,0,'C');
$this->Cell(170/3,8,'Relative Humidity',1,0,'C');
$this->Cell(170/3,8,'Calibrating Technician',1,1,'C');
$this->SetFont('ARIAL','',10);
$this->Cell(170/3,8,'(24'.utf8_decode('±').'4)'.utf8_decode('°C'),1,0,'C');
$this->Cell(170/3,8,'(50'.utf8_decode('±').'20)%',1,0,'C');
$this->Cell(170/3,8,'Mr.Sampath Kumar',1,1,'C');
     $this->Ln(5);
    }
     
}


//$equipment='AUTOCLAVE';
// Instanciation of inherited class
//$pdf = new FPDF('P','mm','A4');
    $pdf=new PDF();
    $title='Die';
    $pdf->SetLeftMargin(18);
    $pdf->SetTitle($title);
    $pdf->AliasNbPages();
    $pdf->AddPage();

//start table index
     $pdf->SetFont('Arial','B',10);
    
    $pdf->Cell(170,8,'' ,0,1,'L');
    $pdf->Cell(170/6+10,8,'Certificate No.' ,1,0,'L');
    $pdf->Cell(170/6-10,8,'PSG' ,1,0,'L');
    $pdf->Cell(170/6,8,'CIRD/' ,1,0,'L');
    $pdf->Cell(170/6,8,'BMCC/' ,1,0,'L');
    $pdf->Cell(170/6,8,'/2017' ,1,0,'R');
    $pdf->Cell(170/6,8,date("d/m/y") ,1,1,'C');
   // $pdf->Ln(6);

    
    
//Calibration certificate table
    $pdf->SetFont('Arial','UB',10);



    $pdf->Cell(170,9,'CALIBRATION CERTIFICATE FOR - '.$equipment,1,1,'C');
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(170/4,15*2,'UUC Owner Address' ,1,0,'C');
    $pdf->Cell(170/4,15,'M/s PSG Hospitals' ,1,0,'C');
    $pdf->Cell(170/4,15/2,'Calibration Date' ,1,0,'C');
    $pdf->Cell(170/4,15/2,date("d/m/Y") ,1,1,'C');
    $pdf->Cell(170/4,15,'' ,0,0,'C');
    $pdf->Cell(170/4,15,'' ,0,0,'C');
    $pdf->Cell(170/4,15/2,'Calibration due' ,1,0,'C');
    $d=strtotime("+364 days");
    $pdf->Cell(170/4,15/2,date("d/m/Y",$d) ,1,1,'C');
    $pdf->Cell(170/4,15,'' ,0,0,'C');
    //$pdf->Cell(170/4,15,'' ,0,0,'C');
    $pdf->Cell(170/4,15,'Coimbatore' ,1,0,'C');
    $pdf->Cell(170/4,15/2,'Procedure Number' ,1,0,'C');
    $pdf->Cell(170/4,15/2,'PSGIRDACLV' ,1,1,'C');
    $pdf->Cell(170/4,15,'' ,0,0,'C');
    $pdf->Cell(170/4,15,'' ,0,0,'C');
    $pdf->Cell(170/4,15/2,'Location' ,1,0,'C');
    $pdf->Cell(170/4,15/2,'PSGIMSR' ,1,1,'C');
    
    $pdf->Ln(5);
    
//description table

    $header = array('UUC', 'Make', 'Model', 'Sl.No','ID');
// Data loading
    $data = $pdf->LoadData('StethoscopeDescriptionTable.txt');
    //$pdf->AddPage();
    $pdf->DescriptionTable($header,$data);
    
    //Calibration Equipment Table
    $header = array('Nomenclature', 'Make', 'Model', 'Sl.No','Tracebility.ID');
    // Data loading
    $data = $pdf->LoadData('StethoscopeCalibrationEquipmentTable.txt');
    //$pdf->AddPage();
    $pdf->CalibrationEquipmentTable($header,$data);
    $pdf->Ln(6);
    
    
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(170,7,'Note' ,0,1,'L');
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(170,5,utf8_decode('*').' The measurements made in support of this certificate are traceable to national or international standards.' ,0,1,'L');
    $pdf->Cell(170,5,utf8_decode('*').' This certificate should not be reproduced expect in full without our prior permission in writing.' ,0,1,'L');
    $pdf->Cell(170,5,utf8_decode('*').' Results reported are valid at the time of and under the stated conditions of measurement.' ,0,1,'L');
    $pdf->Cell(170,5,utf8_decode('*').' UUC-Unit Under Calibration.' ,0,1,'L');
    $pdf->Cell(170,5,utf8_decode('*').' The Calibration certificate relates only to the above mentioned calibrated item and annexed test results.' ,0,1,'L');
    $pdf->Cell(170,5,'Measurement uncertanly reported is at approximately 95% confidence level with k=2.' ,0,1,'L');
//$pdf->Cell(170,15,'Note' ,1,1,'L');

//$pdf=new PDF_HTML();

//Sign pallete
    $pdf->Ln(20);
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(170/2,7,'TESTED BY' ,0,0,'L');
    $pdf->Cell(170/2,7,'APPROVED BY' ,0,1,'R');


    $pdf->Output();
?>