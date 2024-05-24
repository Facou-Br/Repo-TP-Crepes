<?php
    require('tfpdf.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $fournisseur = $_POST['fournisseur'];
        $nom = $_POST['nom'];
        $date = $_POST['date'];
        $ingredients = $_POST['ingredients'];
        $quantites = $_POST['quantite'];

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
        $pdf->Cell(50, 10, 'Nom : ', 0, 0);
        $pdf->Cell(0, 10, $nom, 0, 1);
        $pdf->Cell(50, 10, 'Date de livraison : ', 0, 0);
        $pdf->Cell(0, 10, $date, 0, 1);
        $pdf->Ln(10);

        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(0, 10, 'Détails de la commande', 0, 1);
        $pdf->SetFont('Arial', '', 12);

        for ($i = 0; $i < count($ingredients); $i++) {
            $pdf->Cell(50, 10, 'Ingrédient : ', 0, 0);
            $pdf->Cell(0, 10, $ingredients[$i], 0, 1);
            $pdf->Cell(50, 10, 'Quantité : ', 0, 0);
            $pdf->Cell(0, 10, $quantites[$i], 0, 1);
            $pdf->Ln(5);
        }

        $pdf->Output('bonDeCommande.pdf', 'D');
    }
?>
