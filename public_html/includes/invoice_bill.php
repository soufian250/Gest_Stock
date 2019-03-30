<?php

include_once("../fpdf/fpdf.php");
include_once("manage.php");


if ($_GET["id_facture"]) {

    $m = new Manage();
    $row = $m->getSingleRecord("invoice", "invoice_no", $_GET["id_facture"]);


    $result = $m->manageInvoice($_GET["id_facture"]);
    $rows = $result["rows"];

    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->setFont("Arial", "B", 20);
    $pdf->Cell(190, 10, "Facture N " . $row["invoice_no"] . "", 1, 1, "C");
    $pdf->Cell(50, 10, "", 0, 1);
    $pdf->setFont("Arial", null, 12);

    $pdf->Cell(20, 10, "", 0, 0);
    $pdf->Cell(20, 10, "Date ", 0, 0);
    $pdf->Cell(70, 10, ": " . $row["order_date"], 0, 0);
    $pdf->Cell(40, 10, "Nom de Client ", 0, 0);
    $pdf->Cell(50, 10, ": " . $row["customer_name"], 0, 1);

    $pdf->Cell(50, 10, "", 0, 1);


    $pdf->Cell(10, 10, "#", 1, 0, "C");
    $pdf->Cell(70, 10, "Nom de Produit", 1, 0, "C");
    $pdf->Cell(30, 10, "Quantite", 1, 0, "C");
    $pdf->Cell(40, 10, "Prix", 1, 0, "C");
    $pdf->Cell(40, 10, "Totale (DH)", 1, 1, "C");

    /* for ($i = 0; $i < count($_GET["pid"]); $i++) {
      $pdf->Cell(10, 10, ($i + 1), 1, 0, "C");
      $pdf->Cell(70, 10, $_GET["pro_name"][$i], 1, 0, "C");
      $pdf->Cell(30, 10, $_GET["qty"][$i], 1, 0, "C");
      $pdf->Cell(40, 10, $_GET["price"][$i], 1, 0, "C");
      $pdf->Cell(40, 10, ($_GET["qty"][$i] * $_GET["price"][$i]), 1, 1, "C");
      } */
    if (count($rows) > 0) {
        $i = 0;
        foreach ($rows as $rowi) {
            $pdf->Cell(10, 10, ($i + 1), 1, 0, "C");
            $pdf->Cell(70, 10, $rowi["product_name"], 1, 0, "C");
            $pdf->Cell(30, 10, $rowi["qty"], 1, 0, "C");
            $pdf->Cell(40, 10, $rowi["price"], 1, 0, "C");
            $pdf->Cell(40, 10, ($rowi["qty"] * $rowi["price"]), 1, 1, "C");
        }
    }
    $pdf->Cell(50, 10, "", 0, 1);

    $pdf->Cell(60, 10, "", 0, 0);
    $pdf->Cell(50, 10, "Totale HT ", 0, 0);
    $pdf->Cell(50, 10, ":     " . $row["sub_total"], 0, 1);
    $pdf->Cell(60, 10, " ", 0, 0);
    $pdf->Cell(50, 10, "Totale TVA ", 0, 0);
    $pdf->Cell(50, 10, ":     " . $row["gst"], 0, 1);
    $pdf->Cell(60, 10, "", 0, 0);
    $pdf->Cell(50, 10, "Totale TTC ", 0, 0);
    $pdf->Cell(50, 10, ":     " . $row["net_total"], 0, 1);

    $pdf->Cell(50, 10, "", 0, 1);
    $pdf->Cell(50, 10, "", 0, 1);

    $pdf->Cell(180, 10, "Signature", 0, 0, "R");

    $pdf->Output("../PDF_INVOICE/PDF_FACTURE_" . $row["invoice_no"] . ".pdf", "F");

    $pdf->Output();
}
?>