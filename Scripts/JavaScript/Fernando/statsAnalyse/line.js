function creerLignePoints(dateDebut, dateFin) {
    const nomsMois = ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet",
        "Août", "Septembre", "Octobre", "Novembre", "Décembre"];

    let moisLabel = [];

    for(let i = dateDebut; i <= dateFin; i++) {
        moisLabel.push(nomsMois[i]);
    }
    console.log(moisLabel);

    const data = {
        labels: moisLabel,
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