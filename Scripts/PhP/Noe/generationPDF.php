<?php
    require('tfpdf.php');

    $fournisseur = $_POST['fournisseur'];
    $nom = $_POST['nom'];
    $date = $_POST['date'];
    $ingredient = $_POST['ingredients'];
    $quantite = $_POST['quantite'];

    class PDF extends tFPDF {
        function Header() {
            $this->SetFont('Arial', 'B', 14);
            $this->Cell(0, 10, 'Bon de commande : ' . $_POST['fournisseur'], 0, 1, 'C');
            $this->Ln(10);
        }

        function Footer() {
            $this->SetY(-15);
            $this->SetFont('Arial', 'I', 8);
            $this->Cell(0, 10, 'Page ' . $this->PageNo(), 0, 0, 'C');
        }
    }

    $pdf = new PDF();
    $pdf->AddPage();

    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(0, 10, 'Informations de la commande', 0, 1);
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(0, 10, 'Nom : ' . $nom, 0, 1);
    $pdf->Cell(0, 10, 'Date de livraison : ' . $date, 0, 1);
    $pdf->Ln(10);

    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(0, 10, 'Détails de la commande', 0, 1);
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(0, 10, 'Ingrédient : ' . $ingredient, 0, 1);
    $pdf->Cell(0, 10, 'Quantité : ' . $quantite, 0, 1);

    $pdf->Output('bonDeCommande.pdf', 'D');
?>
