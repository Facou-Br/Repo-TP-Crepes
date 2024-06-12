class SelectProduits {
    #dateDebut;
    #dateFin;
    #produitChoisi;
    #topProduits = {};

    constructor(dateDebut, dateFin, produitChoisi) {
        this.dateDebut = dateDebut;
        this.dateFin = dateFin;
        this.produitChoisi = produitChoisi;
    }

    setDateDebut(dateDebut) {
        this.dateDebut = dateDebut;
    }
    setDateFin(dateFin) {
        this.dateFin = dateFin;
    }


    chargerProduits() {
        $.ajax({
            url: "/Scripts/PhP/Fernando/statsAnalyse/getProduits.php",
            type: "GET",
            datatype: "json",
            success: function (data) {
                let arrayProduits = JSON.parse(data);
            },
            error: function () {
                alert("Erreur lors de la récupération des fournisseurs.");
            },
        });
    }
}