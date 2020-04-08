<?php

include('fpdf/fpdf.php');

class PDF extends FPDF
{
	function mycell($w,$h,$x,$t)
	{
		$height = $h/3;
		$first = $height+2;
		$second = $height+$height+$height+3;
		$len = strlen($t);
		if($len>15)
		{
			$txt = str_split($t,15);
			$this->SetX($x);
			$this->Cell($w,$first,$txt[0],'','','');
			$this->SetX($x);
			$this->Cell($w,$second,$txt[1],'','','');
			$this->SetX($x);
			$this->Cell($w,$h,'','LTRB',0,'L',0);
		}else
			{
				$this->SetX($x);
				$this->Cell($w,$h,$t,'LTRB',0,'L',0);
			}
	}
	
	function Header()
		{
   		 $this->Image('ArchivoMixtliLogo.png',10,8,20,20,'png');
   		 $this->SetFont('Arial','B',12);
   		 $this->Cell(70);
   		 $this->Cell(50,10,'Archivo Mixtli',0,0,'C');
		 $this->SetDrawColor(32,160,56);
		 $this->SetLineWidth(1.2);
		 $this->Line(90, $this->GetY()+10, 120, $this->GetY()+10);
   		 $this->Ln(25);
		 
		 $this->SetFillColor(255,255,255);
		 $this->SetTextColor(40,40,40);
		 $this->SetDrawColor(32,160,56);
		 $this->SetLineWidth(1);
		 $this->Line(10,32,190,32);
		 
			
			require 'conexion_tabla.php';
			$SelectImagen_1 = $_GET['coleccion'];
		 	$SelectGrupo = $_GET['grupo'];
			$SelectImage = $_GET['id_origen'];
			
			
			$query = "SELECT * FROM colecciones 
			 where coleccion='$SelectImagen_1' and grupo='$SelectGrupo' and id_origen='$SelectImage' ";
			 
			$resultado = $conexion_tabla->query($query);
			
			 while($row = $resultado->fetch_assoc()){

		       if($SelectImagen_1 == $row['coleccion'] && $SelectGrupo == $row['grupo'] && $SelectImage == $row['id_origen']){

				   $this->SetFont('Arial','I',9);
				   $this->Cell(20,5,utf8_decode('Colección: '));
				   $this->SetFont('Arial','B',9);
				   $this->Cell(12,5,utf8_decode($row['coleccion']));
				   $this->Ln();
				   
				   $this->SetFont('Arial','I',9);
				   $this->Cell(20,5,'Autor: ');
				   $this->SetFont('Arial','B',9);
				   $this->Cell(12,5,utf8_decode($row['autor']));
				   $this->Ln();
				   $this->Ln();
				   
				   $this->SetFont('Arial','I',9);
				   $this->Cell(20,5,utf8_decode('Descripción: '));
				   $this->SetFont('Arial','',9);
				   $this->MultiCell(120,5,utf8_decode($row['descripcion_serie'])  );
				   $this->Ln();
				   
				   $this->SetFont('Arial','I',9);
				   $this->Cell(20,5,'Grupo: ');
				   $this->SetFont('Arial','',9);
				   $this->Cell(12,5,utf8_decode($row['grupo']));
				   $this->Ln();
				   
				   $this->SetFont('Arial','I',9);
				   $this->Cell(20,5,'Serie: ');
				   $this->SetFont('Arial','',9);
				   $this->Cell(12,5,utf8_decode($row['serie']));
				   $this->Ln();
				   
				   $this->SetFont('Arial','I',9);
				   $this->Cell(20,5,'Lugar: ');
				   $this->SetFont('Arial','',9);
				   $this->Cell(12,5,utf8_decode($row['lugar']));
				   $this->Ln();
				   $this->Ln();
				   
				   $this->SetFont('Arial','I',9);
				   $this->Cell(20,5,'Imagen: ');
				   $this->SetFont('Arial','',9);
				   $this->Cell(12,5,utf8_decode($row['descripcion_img']));
				   $this->Ln();
				   
				   $pic = 'data:image/png;base64,'.base64_encode($row['img']); 
				   $info = getimagesize($pic);
				   
				   $this->SetFont('Arial','',9);
				   $this->Image($pic,30,120,150,100,'jpg');
				   $this->Ln();
				   
			   
			   
			   
			   
			   
			   
			
			}
			else{
				
				}
		   }
			 
			
        
		}

		function Footer()
		{
		    $this->SetY(-15);
		    $this->SetFont('Arial','I',8);
		    $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
		}
}


$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',8);

$pdf->SetFillColor(240,240,240);
$pdf->SetTextColor(40,40,40);
$pdf->SetDrawColor(255,255,255);
$pdf->Ln();




$pdf->Output();


?>