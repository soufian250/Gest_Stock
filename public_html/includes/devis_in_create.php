<?php
include_once("../fpdf/fpdf.php");


if ($_GET["order_date"] && $_GET["invoice_no"]) {

    $year = date("y");

    $pdf = new FPDF();
    $pdf->AddPage();

    $pdf->Cell(50, 10, "", 0, 1);
    $pdf->Cell(50, 10, "", 0, 1);
    $pdf->Cell(50, 10, "", 0, 1);
    $pdf->Cell(50, 10, "", 0, 1);
    $pdf->Cell(50, 10, "", 0, 1);

    $pdf->setFont("Arial", "B", 20);
    $pdf->Cell(120, 10, "DEVIS", 1, 0, "C");
    $pdf->Cell(20, 10, "", 0, 0);
    $pdf->setFont("Arial", "B", 12);
    $pdf->Cell(50, 10, "ClIENT", 1, 1, "C");
    $pdf->setFont("Arial", "B", 10);
    $pdf->Cell(20, 5, "Numero", 1, 0, "C");
    $pdf->Cell(30, 5, "Date", 1, 0, "C");
    $pdf->Cell(70, 5, "Reference", 1, 0, "C");
    $pdf->Cell(20, 5, "", 0, 0);
    $pdf->Cell(50, 5, "MR", "LR", 1, "C");
    $pdf->setFont("Arial", "", 10);
    $pdf->Cell(20, 7, "" . $_GET["invoice_no"] . "/" . $year . "", 1, 0, "C");
    $pdf->Cell(30, 7, "" . $_GET["order_date"] . "", 1, 0, "C");
    $pdf->Cell(70, 7, "----", 1, 0, "C");
    $pdf->Cell(20, 7, "", 0, 0);
    $pdf->setFont("Arial", "I", 15);
    $pdf->Cell(50, 7, "" . $_GET["cust_name"] . "", "LBR", 1, "C");


    $pdf->Cell(50, 10, "", 0, 1);
    $pdf->Cell(50, 10, "", 0, 1);

    $pdf->setFont("Arial", "B", 9);

    $pdf->Cell(10, 10, "NUM", 1, 0, "C");
    $pdf->Cell(75, 10, "DESCRIPTION", 1, 0, "C");
    $pdf->Cell(40, 10, "NOM DE PRODUIT", 1, 0, "C");
    $pdf->Cell(20, 10, "QUANTITE", 1, 0, "C");
    $pdf->Cell(25, 10, "PRIX UNITAIRE", 1, 0, "C");
    $pdf->Cell(20, 10, "TOTALE", 1, 1, "C");

    $pdf->setFont("Arial", "", 9);
    for ($i = 0; $i < count($_GET["pid"]); $i++) {
        $pdf->Cell(10, 6, ($i + 1), 1, 0, "C");
        $pdf->Cell(75, 6, "------", 1, 0, "C");
        $pdf->Cell(40, 6, $_GET["pro_name"][$i], 1, 0, "C");
        $pdf->Cell(20, 6, $_GET["qty"][$i], 1, 0, "C");
        $pdf->Cell(25, 6, $_GET["price"][$i], 1, 0, "C");
        $pdf->Cell(20, 6, ($_GET["qty"][$i] * $_GET["price"][$i]), 1, 1, "C");
    }

    /* if (count($rows) > 0) {
      $i = 0;
      foreach ($rows as $rowi) {
      $pdf->Cell(10, 6, ($i + 1), 1, 0, "C");
      $pdf->Cell(75, 6, "------", 1, 0, "C");
      $pdf->Cell(40, 6, $rowi["product_name"], 1, 0, "C");
      $pdf->Cell(20, 6, $rowi["qty"], 1, 0, "C");
      $pdf->Cell(25, 6, $rowi["price"], 1, 0, "C");
      $pdf->Cell(20, 6, ($rowi["qty"] * $rowi["price"]), 1, 1, "C");
      }
      } */

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
    $pdf->Cell(20, 5, "" . $_GET["sub_total"], 1, 0, "C");
    $pdf->Cell(20, 5, "" . $_GET["gst"], 1, 0, "C");
    $pdf->Cell(20, 5, "" . $_GET["net_total"], 1, 1, "C");

    $pdf->Cell(50, 10, "", 0, 1);
    $pdf->Cell(50, 10, "", 0, 1);


    $pdf->setFont("Arial", "I", 12);

    $pdf->Cell(180, 10, "Signature", 0, 0, "L");

    $pdf->Output("../PDF_INVOICE/PDF_DEVIS_" . $_GET["invoice_no"] . ".pdf", "F");

    $pdf->Output();
}
?>
