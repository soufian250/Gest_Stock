<?php
session_start();

include_once("../fpdf/fpdf.php");

if ($_GET["order_date"] && $_GET["invoice_no"]) {
	$pdf = new FPDF();
	$pdf->AddPage();
	$pdf->setFont("Arial","B",20);
	$pdf->Cell(190,10,"Devis N°".$_GET["invoice_no"]."",1,1,"C");
        $pdf->Cell(50,10,"",0,1);
	$pdf->setFont("Arial",null,12);

        $pdf->Cell(20,10,"",0,0);
	$pdf->Cell(20,10,"Date ",0,0);
	$pdf->Cell(70,10,": ".$_GET["order_date"],0,0);
	$pdf->Cell(40,10,"Nom de Client ",0,0);
	$pdf->Cell(50,10,": ".$_GET["cust_name"],0,1);

	$pdf->Cell(50,10,"",0,1);


	$pdf->Cell(10,10,"#",1,0,"C");
	$pdf->Cell(70,10,"Nom de Produit",1,0,"C");
	$pdf->Cell(30,10,"Quantite",1,0,"C");
	$pdf->Cell(40,10,"Prix",1,0,"C");
	$pdf->Cell(40,10,"Totale (DH)",1,1,"C");

	for ($i=0; $i < count($_GET["pid"]) ; $i++) { 
		$pdf->Cell(10,10, ($i+1) ,1,0,"C");
		$pdf->Cell(70,10, $_GET["pro_name"][$i],1,0,"C");
		$pdf->Cell(30,10, $_GET["qty"][$i],1,0,"C");
		$pdf->Cell(40,10, $_GET["price"][$i],1,0,"C");
		$pdf->Cell(40,10, ($_GET["qty"][$i] * $_GET["price"][$i]) ,1,1,"C");
	}

	$pdf->Cell(50,10,"",0,1);

        $pdf->Cell(60,10,"",0,0);
	$pdf->Cell(50,10,"Sous Totale ",0,0);
	$pdf->Cell(50,10,":     ".$_GET["sub_total"],0,1);
        $pdf->Cell(60,10," ",0,0);
	$pdf->Cell(50,10,"Gst Taxe ",0,0);
	$pdf->Cell(50,10,":     ".$_GET["gst"],0,1);
        $pdf->Cell(60,10,"",0,0);
	$pdf->Cell(50,10,"Remise ",0,0);
	$pdf->Cell(50,10,":     ".$_GET["discount"],0,1);
        $pdf->Cell(60,10,"",0,0);
	$pdf->Cell(50,10,"Prix Totale ",0,0);
	$pdf->Cell(50,10,":     ".$_GET["net_total"],0,1);
        $pdf->Cell(60,10,"",0,0);
	$pdf->Cell(50,10,"Montant Paie ",0,0);
	$pdf->Cell(50,10,":     ".$_GET["paid"],0,1);
        $pdf->Cell(60,10,"",0,0);
	$pdf->Cell(50,10,"Reste à payer ",0,0);
	$pdf->Cell(50,10,":     ".$_GET["due"],0,1);
        $pdf->Cell(60,10,"",0,0);
	$pdf->Cell(50,10,"Type de paiement ",0,0);
	$pdf->Cell(50,10,":     ".$_GET["payment_type"],0,1);
        
        $pdf->Cell(50,10,"",0,1);
        $pdf->Cell(50,10,"",0,1);
        
	$pdf->Cell(180,10,"Signature",0,0,"R");

	$pdf->Output("../PDF_INVOICE/PDF_INVOICE_".$_GET["invoice_no"].".pdf","F");

	$pdf->Output();	

}


?>