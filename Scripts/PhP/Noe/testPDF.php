<?php
    require('tfpdf.php');

    $pdf = new tFPDF();
    $pdf->AddPage();

    $pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
    $pdf->SetFont('DejaVu','',14);

    $pdf->Cell(0, 10, 'Bon de commande : "NOMFOURNISSEUR"', 0, 1, 'C');

    $filename = 'bonDeCommande.pdf';
    $pdf->Output($filename, 'F');
    $pdf->Output();
?>
