<?php

include_once("../fpdf/fpdf.php");

if (1 == 1) {
    $pdf = new FPDF();
    $pdf->AddPage();

    $pdf->Output("S");
}
?>