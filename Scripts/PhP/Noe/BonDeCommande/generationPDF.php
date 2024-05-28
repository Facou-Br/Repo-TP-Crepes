<?php
    require('tfpdf.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $fournisseur = $_POST['fournisseur'];
        $nom = $_POST['nom'];
        $date = $_POST['date'];
        $ingredients = $_POST['ingredients'];
        $quantites = $_POST['quantite'];

        $pdf = new tFPDF();
        $pdf->AddPage();

        // Titre de la page
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->Cell(0, 10, 'Bon de commande : ' . $fournisseur, 0, 1, 'C');
        $pdf->Ln(10);

        // Informations de la commande : Nom et Date de livraison
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(0, 10, 'Informations de la commande', 0, 1);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(12, 10, 'Nom : ', 0, 0);
        $pdf->Cell(0, 10, $nom, 0, 1);
        $pdf->Cell(35, 10, 'Date de livraison : ', 0, 0);
        $pdf->Cell(0, 10, $date, 0, 1);
        $pdf->Ln(10);

        // Détails de la commande : Ingrédient + Quantité
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(0, 10, 'Details de la commande', 0, 1);
        $pdf->SetFont('Arial', '', 12);

        for ($i = 0; $i < count($ingredients); $i++) {
            $pdf->Cell(22, 10, 'Ingredient : ', 0, 0);
            $pdf->Cell(0, 10, $ingredients[$i], 0, 1);
            $pdf->Cell(19, 10, 'Quantite : ', 0, 0);
            $pdf->Cell(0, 10, $quantites[$i], 0, 1);
            $pdf->Ln(5);
        }

        $nomFichier = 'Bon de commande ' . $fournisseur . ' (' . $date . ').pdf';
        $repertoire = 'HistoriqueBonDeCommande/';
        $fichier = $repertoire . $nomFichier;

        $pdf->Output($fichier, 'F');    // On enregistre le PDF dans le répertoire spécifié

        header("Location: bonDeCommande.php");
        exit();
    }
?>
