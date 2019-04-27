<?php

include_once("../fpdf/fpdf.php");
include_once("manage.php");


if ($_GET["id_facture"]) {

    $m = new Manage();
    $row = $m->getSingleRecord("invoice", "invoice_no", $_GET["id_facture"]);


    $result = $m->manageInvoice($_GET["id_facture"]);
    $rows = $result["rows"];

    $f = new NumberFormatter("fr_FR", NumberFormatter::SPELLOUT);
    $number_text = $f->format($row["net_total"]);

    $year = date("y");

    $pdf = new FPDF();
    $pdf->AddPage();

    $pdf->Cell(50, 10, "", 0, 1);
    $pdf->Cell(50, 10, "", 0, 1);
    $pdf->Cell(50, 10, "", 0, 1);
    $pdf->Cell(50, 10, "", 0, 1);
    $pdf->Cell(50, 10, "", 0, 1);

    $pdf->setFont("Arial", "B", 20);
    $pdf->Cell(120, 10, "FACTURE", 1, 0, "C");
    $pdf->Cell(20, 10, "", 0, 0);
    $pdf->setFont("Arial", "B", 12);
    $pdf->Cell(50, 10, "CLIENT", 1, 1, "C");
    $pdf->setFont("Arial", "B", 10);
    $pdf->Cell(20, 5, "Numero", 1, 0, "C");
    $pdf->Cell(30, 5, "Date", 1, 0, "C");
    $pdf->Cell(70, 5, "Reference", 1, 0, "C");
    $pdf->Cell(20, 5, "", 0, 0);
    if ($row["client_type"] == "Personne") {
        $pdf->Cell(50, 5, "'Mme/M'", "LR", 1, "C");
    } else {
        $pdf->Cell(50, 5, "'Etablissement'", "LR", 1, "C");
    }
    $pdf->setFont("Arial", "", 10);
    $pdf->Cell(20, 7, "" . $row["invoice_no"] . "/" . $year . "", 1, 0, "C");
    $pdf->Cell(30, 7, "" . $row["order_date"] . "", 1, 0, "C");
    $pdf->Cell(70, 7, "----", 1, 0, "C");
    $pdf->Cell(20, 7, "", 0, 0);
    $pdf->setFont("Arial", "I", 15);
    $pdf->Cell(50, 7, "" . $row["customer_name"] . "", "LBR", 1, "C");
    $pdf->Cell(140, 7, "", 0, 0);
    if ($row["client_type"] != "Personne") {
        $pdf->setFont("Arial", "B", 10);
        $pdf->Cell(50, 5, "ICE : ".$row["ice"]."", 1, 1, "C");
    }

    $pdf->Cell(50, 3, "", 0, 1);
    $pdf->Cell(50, 10, "", 0, 1);

    $pdf->setFont("Arial", "B", 9);

    $pdf->Cell(10, 10, "NUM", 1, 0, "C");
    $pdf->Cell(75, 10, "DESCRIPTION", 1, 0, "C");
    $pdf->Cell(40, 10, "NOM DE PRODUIT", 1, 0, "C");
    $pdf->Cell(20, 10, "QUANTITE", 1, 0, "C");
    $pdf->Cell(25, 10, "PRIX UNITAIRE", 1, 0, "C");
    $pdf->Cell(20, 10, "TOTALE", 1, 1, "C");

    /* for ($i = 0; $i < count($_GET["pid"]); $i++) {
      $pdf->Cell(10, 10, ($i + 1), 1, 0, "C");
      $pdf->Cell(70, 10, $_GET["pro_name"][$i], 1, 0, "C");
      $pdf->Cell(30, 10, $_GET["qty"][$i], 1, 0, "C");
      $pdf->Cell(40, 10, $_GET["price"][$i], 1, 0, "C");
      $pdf->Cell(40, 10, ($_GET["qty"][$i] * $_GET["price"][$i]), 1, 1, "C");
      } */
    $pdf->setFont("Arial", "", 9);
    if (count($rows) > 0) {
        $i = 0;
        foreach ($rows as $rowi) {
            $pdf->Cell(10, 6, ($i + 1), 1, 0, "C");
            $pdf->Cell(75, 6, $rowi["description"], 1, 0, "C");
            $pdf->Cell(40, 6, $rowi["product_name"], 1, 0, "C");
            $pdf->Cell(20, 6, $rowi["qty"], 1, 0, "C");
            $pdf->Cell(25, 6, $rowi["price"], 1, 0, "C");
            $pdf->Cell(20, 6, ($rowi["qty"] * $rowi["price"]), 1, 1, "C");
            $i++;
        }
    }
    $pdf->Cell(50, 10, "", 0, 1);


    $pdf->setFont("Arial", "B", 12);


    $pdf->Cell(130, 8, "", 0, 0);
    $pdf->Cell(60, 8, "MONTANT TOTALE ", 1, 1, "C");
    $pdf->setFont("Arial", "B", 8);
    $pdf->Cell(130, 6, "", 0, 0);
    $pdf->Cell(20, 6, "Totale HT", 1, 0, "C");
    $pdf->Cell(20, 6, "Totale TVA ", 1, 0, "C");
    $pdf->Cell(20, 6, "Totale TTC ", 1, 1, "C");
    $pdf->setFont("Arial", "", 8);
    $pdf->Cell(130, 5, "", 0, 0);
    $pdf->Cell(20, 5, "" . $row["sub_total"], 1, 0, "C");
    $pdf->Cell(20, 5, "" . $row["gst"], 1, 0, "C");
    $pdf->Cell(20, 5, "" . $row["net_total"], 1, 1, "C");

    $pdf->Cell(50, 10, "", 0, 1);
    $pdf->Cell(50, 10, "", 0, 1);
    $pdf->Cell(50, 10, "", 0, 1);



    $pdf->setFont("Arial", "B", 10);

    $pdf->Cell(180, 10, "Nous vous remercions de votre confiance", 0, 1, "L");
    //$pdf->setFont("Arial", "B", 14);
    //$pdf->Cell(70, 10, "", 0, 0, "C"); 
    //$pdf->Cell(120, 10, $number_text . " dhs", 0, 0, "L");


    $pdf->Output("../PDF_INVOICE/PDF_DEVIS_" . $row["invoice_no"] . ".pdf", "F");

    $pdf->Output();
}
?>
