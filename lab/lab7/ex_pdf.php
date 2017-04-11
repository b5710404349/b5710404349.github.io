<?php
require('mysql_table.php');

class PDF extends PDF_MySQL_Table
{
function Header()
{
	//Title
	$this->SetFont('Arial','',18);
	$this->Cell(0,6,'Average rent group by type',0,1,'C');
	$this->Ln(10);
	//Ensure table header is output
	parent::Header();
}
}

//Connect to database
mysql_connect('localhost','napat','mypass');
mysql_select_db('dreamhome');

$pdf=new PDF();
$pdf->AddPage();
$pdf->AddCol('type', 40, 'Type', 'C');
$pdf->AddCol('avg(rent)', 40, 'Avg', 'C');
$pdf->Table('SELECT type, avg(rent) FROM propertyforrent GROUP BY type');
$pdf->AddPage();
$pdf->Output();
?>