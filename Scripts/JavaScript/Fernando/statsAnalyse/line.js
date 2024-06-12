function creerLignePoints(dateDebut, dateFin, jourDebut, jourFin, type) {
    let anneeLabel = [];
    const nomsMois = ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet",
        "Août", "Septembre", "Octobre", "Novembre", "Décembre"];

    if (type === "annee") {
        for (let i = dateDebut; i <= dateFin; i++) {
            anneeLabel.push(nomsMois[i]);
        }
    }
    else if (type === 'mois') {
        if(dateDebut === dateFin){
            for (let j = jourDebut; j <= jourFin; j++) {
                anneeLabel.push(j + "/" + nomsMois[dateDebut]);
            }
        } else {
            for (let i = dateDebut; i <= dateFin; i++) {
                for (let j = jourDebut; j <= 30; j++) {
                    anneeLabel.push(j + "/" + nomsMois[i]);
                }
            }
        }
        
    }
    console.log(anneeLabel);

    const data = {
        labels: anneeLabel,
        datasets: [{
            label: 'Ventes des crêpes au chocolat',
            data: [65, 59, 80, 81, 56, 55, 40],
            fill: false,
            borderColor: 'rgb(75, 192, 192)',
            tension: 0.1
        }]
    };

    const config = {
        type: 'line',
        data: data,
    };

    let lineChart = new Chart("lineChart", config);
}